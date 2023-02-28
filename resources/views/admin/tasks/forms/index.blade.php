@extends("admin.layouts.app")

@section("body")
<div class="block-header">
    <div class="row">
        @include('admin.includes.breadcrumb-v2')

        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <a class="btn btn-primary" href="{{ route('admin.tasks.forms.create') }}"><i class="fa fa-plus"></i> Add New Form</a>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="table-header-actions row">
                    <div class="col-md-6">
                        <h2>Holidays List</h2>
                        <div class="holiday-scheme">
                            <label for="expired" class="expired-sp">
                                <span class=""></span>
                                Date Expired
                            </label>
                            <label for="available" class="available-sp">
                                <span></span>
                                Available
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 justify-content-end d-flex">
                        
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover m-b-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Active Fields</th>
                                <th>Status</th>
                                <th width="160">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($taskForms as $item)
                                <tr class="">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        @php
                                            $total_fields = 15;
                                            $active_fields = 0;
                                            for($i = 1; $i <= $total_fields; $i++){
                                                $lkey_name = 'field_'.$i.'_label';
                                                if(!empty($item->$lkey_name)){
                                                    $active_fields++;
                                                }
                                            }
                                            echo $active_fields.'/'.$total_fields;
                                        @endphp
                                    </td>
                                    <td>{{ ($item->status == 1) ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#md-edit-holidays"><i class="fa fa-edit"></i></button>
                                        
                                        
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#md-delete-holidays"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection