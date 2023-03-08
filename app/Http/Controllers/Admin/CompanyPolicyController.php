<?php
namespace App\Http\Controllers\Admin;

use App\Models\CompanyPolicy;
use App\Models\CompanyDetail;
use App\Http\Requests\StoreCompanyPolicyRequest;
use App\Http\Requests\UpdateCompanyPolicyRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class CompanyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    'menu_active' => 'company_policy',
                    'page_title' => 'Company Policy',
                    'page_title_description' => 'Manage Company Policy & Details',
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Company Policy' => route('company-policy.index'),
                    ],
                ]
            );
            $company_policy = CompanyPolicy::first();
            $company_details = CompanyDetail::first();

            return view('admin.company-policy.index', compact('company_policy', 'company_details'));
        }
    }

    public function show(CompanyPolicy $companyPolicy){
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            return redirect()->route('company-policy.index', $companyPolicy);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyPolicy  $companyPolicy
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyPolicy $companyPolicy)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    'menu_active' => 'company_policy',
                    'page_title' => 'Company Policy',
                    'page_title_description' => 'Manage Company Policy & Details',
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Company Policy' => route('company-policy.index'),
                        'Edit' => route('company-policy.edit', $companyPolicy->id),
                    ],
                ]
            );
            $company_policy = CompanyPolicy::first();
            
            return view('admin.company-policy.edit', compact('company_policy'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyPolicyRequest  $request
     * @param  \App\Models\CompanyPolicy  $companyPolicy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyPolicyRequest $request, CompanyPolicy $companyPolicy)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $company_policy = CompanyPolicy::first();
            $company_policy->update($request->all());
            return redirect()->route('company-policy.index')->with('success', 'Company Policy updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyPolicy  $companyPolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyPolicy $companyPolicy)
    {
        //
    }
}
