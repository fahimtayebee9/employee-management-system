@extends("admin.layouts.app")

@section("body")

<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>{{ session('page_title') }}</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>
                        Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    Administrative Users
                </li>
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <a href="{{ route('administration.users.create') }}" class="btn btn-prmary">
                <i class="fa fa-plus"></i>
                <span>Add New User</span>
            </a>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="table-header-actions row">
                    <div class="col-md-6">
                        <h2>Administrative Users List</h2>
                    </div>
                    <div class="col-md-6 justify-content-end d-flex">

                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    {{-- @if(!empty($users)) --}}
                    <table class="table table-hover js-basic-example dataTable table-custom table-striped m-b-0 c_list no-footer" id="administrative_users_tbl" role="grid" aria-describedby="administrative_users_tbl_info">
                        <thead class="thead-dark">
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="administrative_users_tbl" rowspan="1" colspan="1" aria-sort="ascending" aria-label=": activate to sort column descending" style="width: 119.984px;">
                                    <label class="fancy-checkbox">
                                        <input class="select-all" type="checkbox" name="checkbox">
                                        <span></span>
                                    </label>
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="administrative_users_tbl" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 245.812px;">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="administrative_users_tbl" rowspan="1" colspan="1" aria-label="Employee ID: activate to sort column ascending" style="width: 168.344px;">Employee ID</th>
                                <th class="sorting" tabindex="0" aria-controls="administrative_users_tbl" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 181.422px;">Phone</th>
                                <th class="sorting" tabindex="0" aria-controls="administrative_users_tbl" rowspan="1" colspan="1" aria-label="Join Date: activate to sort column ascending" style="width: 143.297px;">Join Date</th>
                                <th class="sorting" tabindex="0" aria-controls="administrative_users_tbl" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 199.969px;">Role</th>
                                <th class="sorting" tabindex="0" aria-controls="administrative_users_tbl" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 108.172px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr role="row" class="odd">
                                <td class="width45 sorting_1">
                                    <label class="fancy-checkbox">
                                        <input class="checkbox-tick" type="checkbox" name="checkbox">
                                        <span></span>
                                    </label>
                                    <img src="../assets/images/xs/avatar1.jpg" class="rounded-circle avatar" alt="">
                                </td>
                                <td>
                                    <h6 class="mb-0">Marshall Nichols</h6>
                                    <span>marshall-n@gmail.com</span>
                                </td>
                                <td><span>LA-0215</span></td>
                                <td><span>+ 264-625-2583</span></td>
                                <td>24 Jun, 2015</td>
                                <td>Web Designer</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                            <tr role="row" class="even">
                                <td class="width45 sorting_1">
                                    <label class="fancy-checkbox">
                                        <input class="checkbox-tick" type="checkbox" name="checkbox">
                                        <span></span>
                                    </label>
                                    <img src="../assets/images/xs/avatar2.jpg" class="rounded-circle avatar" alt="">
                                </td>
                                <td>
                                    <h6 class="mb-0">Susie Willis</h6>
                                    <span>sussie-w@gmail.com</span>
                                </td>
                                <td><span>LA-0216</span></td>
                                <td><span>+ 264-625-2583</span></td>
                                <td>28 Jun, 2015</td>
                                <td>Web Developer</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- @else --}}
                    <div class="alert alert-info">No Administrative Roles Found</div>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection