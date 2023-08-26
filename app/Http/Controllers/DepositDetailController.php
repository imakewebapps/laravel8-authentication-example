<?php

namespace App\Http\Controllers;

use App\Models\DepositDetail;
use App\Http\Requests\StoreDepositDetailRequest;
use App\Http\Requests\UpdateDepositDetailRequest;

class DepositDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreDepositDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepositDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DepositDetail  $depositDetail
     * @return \Illuminate\Http\Response
     */
    public function show(DepositDetail $depositDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DepositDetail  $depositDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(DepositDetail $depositDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepositDetailRequest  $request
     * @param  \App\Models\DepositDetail  $depositDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepositDetailRequest $request, DepositDetail $depositDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DepositDetail  $depositDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepositDetail $depositDetail)
    {
        //
    }
}
