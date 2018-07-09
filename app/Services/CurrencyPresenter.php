<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 08.07.18
 * Time: 18:48
 */

namespace App\Services;


class CurrencyPresenter
{
    public static function present(Currency $currency): array {
        return [
            'id' => $currency->getId(),
            'name' => $currency->getName(),
            'short_name' => $currency->getShortName(),
            'actual_course' => $currency->getActualCourse(),
            'actual_course_date' => $currency->getActualCourseDate(),
            'active' => $currency->isActive()
        ];
    }

    public static function presentArray($currencies): array {
        return array_map(function ($currency) {
            return CurrencyPresenter::present($currency);
        }, $currencies);
    }
}