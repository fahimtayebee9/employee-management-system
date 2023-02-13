<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>{{ session('page_title') }}</h2>
            <ul class="breadcrumb">
                <!-- get breadcrumb array from session -->
                @php
                    $breadcrumbs = session()->get('breadcrumb');
                @endphp

                @if(!empty($breadcrumbs))
                    <!-- loop through breadcrumb array -->
                    @foreach($breadcrumbs as $key => $value)
                        @if($key === array_search(end($breadcrumbs), $breadcrumbs))
                            <li class="breadcrumb-item active">
                                {{ $key }}
                            </li>
                        @else
                            <li class="breadcrumb-item">
                                <a href="{{ $value }}"><i class="fa fa-dashboard"></i>
                                    {{ $key }}
                                </a>
                            </li>
                        @endif
                    
                    @endforeach
                
                @endif
                
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <!-- <div class="d-flex flex-row-reverse">
                <div class="page_action">
                    <button type="button" class="btn btn-primary"><i class="fa fa-download"></i> Download report</button>
                    <button type="button" class="btn btn-secondary"><i class="fa fa-send"></i> Send report</button>
                </div>
            </div> -->
        </div>
    </div>
</div>