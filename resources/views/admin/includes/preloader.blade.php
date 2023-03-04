<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30">
            <!-- <img src="../assets/images/logo-icon.svg" width="48"  alt="Iconic"> -->
            @if(!empty(\App\Models\CompanyDetail::orderby('id','desc')->first()->company_logo))
                <img src="{{ asset('storage/uploads/company/'. \App\Models\CompanyDetail::orderby('id','desc')->first()->company_logo) }}" alt="company logo" class="w-25 img-fluid">
            @else
                <img src="{{ asset('storage/assets/images/browser.png') }}" alt="company logo" height="48" class="img-fluid w-50">
            @endif
        </div>
        <p>Please wait...</p>
    </div>
</div>