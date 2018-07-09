<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 08.07.18
 * Time: 20:01
 */

namespace App\Services;

class CurrencyGenerator
{
    public static function generate(): array
    {
        return [
            new Currency(1,
                "Bitcoin",
                "btc",
                6642.45,
                new \DateTime(),
                true),
            new Currency(2,
                "Ethereum",
                "eth",
                473.47,
                new \DateTime(),
                true),
            new Currency(3,
                "XRP",
                "xpr",
                0.471026,
                new \DateTime(),
                true),
            new Currency(4,
                "Bitcoin Cash",
                "btcc",
                725.53,
                new \DateTime(),
                false),
            new Currency(5,
                "EOS",
                "eos",
                8.62,
                new \DateTime(),
                false)
        ];
    }
}