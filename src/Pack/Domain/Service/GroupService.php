<?php


namespace App\Pack\Domain\Service;

use App\Pack\Domain\Models\Group;
use App\Pack\Domain\Transformer\GroupTransformer;
use App\Projetc\App\Support\FractalService;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use League\Fractal\Pagination\PagerfantaPaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

class GroupService
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var FractalService
     */
    private $fractalService;
    /**
     * @var GroupTransformer
     */
    private $groupTransformer;

    public function __construct(
        EntityManagerInterface $entityManager,
        FractalService $fractalService,
        GroupTransformer $groupTransformer
    )
    {

        $this->entityManager = $entityManager;
        $this->fractalService = $fractalService;
        $this->groupTransformer = $groupTransformer;
    }

    public function listGroups(Request $request, RouterInterface $router)
    {
        $page = NULL !== $request->get('page') ? (int) $request->get('page') : 1;
        $perPage = NULL !== $request->get('per_page') ? (int) $request->get('per_page') : 10;

        $groups = $this->entityManager->getRepository(Group::class);

        $doctrineAdapter = new DoctrineORMAdapter($groups->findAll());
        $paginator = new Pagerfanta($doctrineAdapter);
        $paginator->setCurrentPage($page);
        $paginator->setMaxPerPage($perPage);

        $filteredResults = $paginator->getCurrentPageResults();

        $paginatorAdapter = new PagerfantaPaginatorAdapter($paginator, function(int $page) use ($request, $router) {
            $route = $request->attributes->get('_route');
            $inputParams = $request->attributes->get('_route_params');
            $newParams = array_merge($inputParams, $request->query->all());
            $newParams['page'] = $page;
            return $router->generate($route, $newParams, 0);
        });

        $resource = new Collection($filteredResults, $this->groupTransformer, 'group');
        $resource->setPaginator($paginatorAdapter);
        return $resource;
    }

    public function getGroupById($id)
    {
        $group = $this->entityManager->getRepository(Group::class)->find($id);

        if (!$group) {
            throw new EntityNotFoundException('group not found');
        }

        return new Item($group, $this->groupTransformer, 'group');

    }
}