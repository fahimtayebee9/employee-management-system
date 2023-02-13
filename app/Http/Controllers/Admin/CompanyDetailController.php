<?php

namespace App\Http\Controllers\Admin;

use App\Models\CompanyDetail;
use App\Http\Requests\StoreCompanyDetailRequest;
use App\Http\Requests\UpdateCompanyDetailRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyDetailController extends Controller
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
     * @param  \App\Http\Requests\StoreCompanyDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyDetail  $companyDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyDetail $companyDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyDetail  $companyDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyDetail $companyDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyDetailRequest  $request
     * @param  \App\Models\CompanyDetail  $companyDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyDetailRequest $request, CompanyDetail $companyDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyDetail  $companyDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyDetail $companyDetail)
    {
        //
    }
}
