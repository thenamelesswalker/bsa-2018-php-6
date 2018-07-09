<?php

namespace App\Http\Controllers;

use App\Services\Currency;
use App\Services\CurrencyPresenter;
use App\Services\CurrencyRepositoryInterface;
use Illuminate\Http\Request;

class AdminCurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(CurrencyPresenter::presentArray(
            app(CurrencyRepositoryInterface::class)->findAll()));
    }

    public function viewIndex() {
        return view('admin_currencies', [
            'currencies' => CurrencyPresenter::presentArray(
                app(CurrencyRepositoryInterface::class)->findAll())]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $repository = app(CurrencyRepositoryInterface::class);
        $currency = new Currency(
            $repository->getInsertId(),
            $request['name'],
            $request['short_name'],
            $request['actual_course'],
            $request['actual_course_date'],
            $request['active']
        );
        $repository->save($currency);
        return response()->json(CurrencyPresenter::present($currency));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currency = app(CurrencyRepositoryInterface::class)->findById($id);
        return $currency == null
            ? response()->json("Not found", 404)
            : response()->json(CurrencyPresenter::present($currency));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $repository = app(CurrencyRepositoryInterface::class);
        $currency = $repository->findById($id);
        if($currency == null) {
            return response()->json('Not found',404);
        }
        if($request->has('name')) {
            $currency->setName($request['name']);
        }
        if($request->has('short_name')) {
            $currency->setShortName($request['short_name']);
        }
        if($request->has('actual_course')) {
            $currency->setActualCourse($request['actual_course']);
        }
        if($request->has('actual_course_date')) {
            $currency->setActualCourseDate($request['actual_course_date']);
        }
        if($request->has('active')) {
            $currency->setActive($request['active']);
        }
        $repository->save($currency);
        return response()->json(CurrencyPresenter::present($currency));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $repository = app(CurrencyRepositoryInterface::class);
        $currency = $repository->findById($id);
        if($currency == null) {
            return response()->json("Not found", 404);
        }
        $repository->delete($currency);
        return response()->json("Deleted");
    }
}
