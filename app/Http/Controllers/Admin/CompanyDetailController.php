<?php

namespace App\Http\Controllers\Admin;

use App\Models\CompanyDetail;
use App\Http\Requests\StoreCompanyDetailRequest;
use App\Http\Requests\UpdateCompanyDetailRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Auth;

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
    public function update(Request $request, $companyDetail)
    {
        // dd($request->all(), $companyDetail);
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $companyDetail = CompanyDetail::find($companyDetail);

            if(!empty($companyDetail)){
                $companyDetail->company_name = $request->company_name;
                $companyDetail->company_address = $request->company_address;
                $companyDetail->company_phone = $request->company_phone;
                $companyDetail->company_email = $request->company_email;
                $companyDetail->company_website = $request->company_website;

                // dd($request->hasFile('company_logo'));

                if ($request->hasFile('company_logo')) {
                    // delete old image
                    if ($companyDetail->image != 'default.png' && $companyDetail->image != '') {
                        $old_image = public_path('storage/uploads/company/' . $companyDetail->image);
                        if (file_exists($old_image)) {
                            unlink($old_image);
                        }
                    }
                    $file = $request->file('company_logo');
                    $filename = 'img_' . time() . '.' . $file->getClientOriginalExtension();
                    $location = public_path('storage/uploads/company/' . $filename);
                    Image::make($file)->save($location);
                    $companyDetail->company_logo = $filename;
                }

                $companyDetail->update();

                return redirect()->route('company-policy.index')->with('success', 'Company Detail Updated Successfully');
            }

            return redirect()->route('company-policy.index')->with('error', 'Company Detail Not Updated');
        }
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
