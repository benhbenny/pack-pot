<?php


namespace App\App\Domain\ValueObject;


/**
 * Class Currency
 * @package App\App\Domain\ValueObject
 */
final class Currency
{
    /**
     * @var string
     */
    private string $code;

    /**
     * Currency constructor.
     * @param string $code
     */
    public function __construct(string $code)
    {
        $code = strtoupper($code);
        if (!in_array($code, ['EUR', 'USD', 'CAD', 'FCFA'], true)) {
            throw new \InvalidArgumentException('Unsupported currency.');
        }
        $this->code = $code;
    }

    /**
     * @param Currency $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        return $this->code === $other->code;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }
}