<?php


namespace App\Pack\Domain\Service;

use App\Pack\Domain\Models\LotteryDraw;
use App\Pack\Domain\Transformer\LotteryDrawTransformer;
use App\Project\App\Support\FractalService;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use League\Fractal\Pagination\PagerfantaPaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

class LotteryDrawService
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
     * @var LotteryDrawTransformer
     */
    private $lotteryDrawTransformer;

    /**
     * LotteryDrawService constructor.
     * @param EntityManagerInterface $entityManager
     * @param FractalService $fractalService
     * @param LotteryDrawTransformer $lotteryDrawTransformer
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        FractalService $fractalService,
        LotteryDrawTransformer $lotteryDrawTransformer)
    {
        $this->entityManager = $entityManager;
        $this->fractalService = $fractalService;
        $this->lotteryDrawTransformer = $lotteryDrawTransformer;
    }

    public function listAllLotteryDraw(Request $request, RouterInterface $router)
    {
        $page = NULL !== $request->get('page') ? (int) $request->get('page') : 1;
        $perPage = NULL !== $request->get('per_page') ? (int) $request->get('per_page') : 10;

        $lotteriesDraw = $this->entityManager->getRepository(LotteryDraw::class);

        $doctrineAdapter = new DoctrineORMAdapter($lotteriesDraw->findAll());
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

        $resource = new Collection($filteredResults, $this->lotteryDrawTransformer, 'lotteryDraw');
        $resource->setPaginator($paginatorAdapter);
        return $resource;
    }

    public function getLotteryDrawById($id)
    {
        $lotteryDraw = $this->entityManager->getRepository(LotteryDraw::class)->findOneById($id);

        if (!$lotteryDraw) {
            throw new EntityNotFoundException('lotteryDraw not found');
        }

        return new Item($lotteryDraw, $this->lotteryDrawTransformer, 'lotteryDraw');
    }


}