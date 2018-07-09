<?php

namespace App\Http\Controllers;

use App\Services\CurrencyPresenter;
use App\Services\CurrencyRepositoryInterface;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function currencyActive() {
        return response()->json(CurrencyPresenter::presentArray(
            app(CurrencyRepositoryInterface::class)->findActive()));
    }

    public function currencyById($id) {
        $currency = app(CurrencyRepositoryInterface::class)->findById($id);
        return $currency == null
            ? response()->json("Not found", 404)
            : response()->json(CurrencyPresenter::present($currency));
    }

}
