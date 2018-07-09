<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 08.07.18
 * Time: 18:19
 */

namespace App\Services;


class CurrencyRepository implements CurrencyRepositoryInterface
{

    private $currencies = [];
    private $lastInsertId = PHP_INT_MAX;

    public function getInsertId(): int {
        return $this->lastInsertId--;
    }

    /**
     * CurrencyRepository constructor.
     * @param array $currencies
     */
    public function __construct(array $currencies)
    {
        $this->currencies = $currencies;
    }

    public function findAll(): array
    {
        return $this->currencies;
    }

    public function findActive(): array
    {
        return array_filter($this->currencies, function(Currency $currency){return $currency->isActive();});
    }

    public function findById(int $id): ?Currency
    {
        return isset($this->currencies[$id]) ? $this->currencies[$id] : null;
    }

    public function save(Currency $currency): void
    {
        $this->currencies[($currency->getId())] = $currency;
    }

    public function delete(Currency $currency): void
    {
        unset($this->currencies[$currency->getId()]);
    }
}