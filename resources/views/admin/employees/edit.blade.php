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
                <li class="breadcrumb-item">
                    <a href="{{ route('administration.index') }}">
                        Administrative Users
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    Create
                </li>
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">

        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <form action="{{ route('administration.users.update', $item) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required value="{{ $item->user->first_name . ' ' . $item->user->last_name }}">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="username" id="username" disabled value="{{ $item->user->username }}" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" id="btn-generate-username" disabled type="button">Auto Generate</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Email Address</label>
                                <input type="text" value="{{ $item->user->email }}" name="email" id="email" class="form-control" placeholder="Enter Email Address" required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Phone Numebr</label>
                                <input type="text" value="{{ $item->user->phone }}" name="phone" id="phone" class="form-control" placeholder="Enter phone number" required>
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="blood_group">Blood Group</label>
                                <select name="blood_group" id="blood_group" class="form-control">
                                    <option value="">Choose an option</option>
                                    <option value="A+" @if($item->user->blood_group == "A+") selected @endif>A+</option>
                                    <option value="A-" @if($item->user->blood_group == "A-") selected @endif>A-</option>
                                    <option value="B+" @if($item->user->blood_group == "B+") selected @endif>B+</option>
                                    <option value="B-" @if($item->user->blood_group == "B-") selected @endif>B-</option>
                                    <option value="AB+" @if($item->user->blood_group == "AB+") selected @endif>AB+</option>    
                                    <option value="AB-" @if($item->user->blood_group == "AB-") selected @endif>AB-</option>
                                    <option value="O+" @if($item->user->blood_group == "O+") selected @endif>O+</option>
                                    <option value="O-" @if($item->user->blood_group == "O-") selected @endif>O-</option>
                                </select>
                                @error('blood_group')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="role_id">Role</label>
                                <select name="role_id" id="role_id" class="form-control">
                                    <option value="">Choose an option</option>
                                    @foreach (App\Models\RoleManager::where('id', '!=', 1)->where('slug', '!=', 'launch-manager')->get() as $role)
                                        <option value="{{ $role->id }}" @if($item->user->role_id == $role->id) selected @endif>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Choose an option</option>
                                    <option value="1" @if($item->user->status == 1) selected @endif>Active</option>
                                    <option value="0" @if($item->user->status == 0) selected @endif>Inactive</option>
                                </select>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="checkbox" id="chk-password-visibility">Show Password
                                <div class="input-group mb-3">
                                    <input type="password" name="password"  id="password" class="form-control" placeholder="Enter password" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" id="btn-password-generate" type="button">Auto Generate</button>
                                    </div>
                                </div>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="awards_won">Awards Won</label>
                                <input type="number" value="{{ $item->awards_won }}" name="awards_won" id="awards_won" class="form-control" placeholder="Enter Number of Awards Won">
                                @error('awards_won')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="monthly_salary">Monthly Salary</label>
                                <input type="number" value="{{ $item->monthly_salary }}" name="monthly_salary" id="monthly_salary" class="form-control" placeholder="Enter Monthly Salary">
                                @error('monthly_salary')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="joining_date">Join Date</label>
                                <input type="date" value="{{ $item->joining_date }}" name="joining_date" id="joining_date" class="form-control" placeholder="Enter Joining Date">
                                @error('joining_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="department_id">Department</label>
                                <select name="department_id" id="department_id" class="form-control">
                                    <option value="">Choose an option</option>
                                    @foreach (App\Models\Department::all() as $department)
                                        <option value="{{ $department->id }}" @if($item->department_id == $department->id) selected @endif >{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="designation_id">Designation</label>
                                <select name="designation_id" id="designation_id" class="form-control">
                                    <option value="">Choose an option</option>
                                    @foreach (App\Models\EmployeeRole::all() as $designation)
                                        <option value="{{ $designation->id }}" @if($item->designation_id == $designation->id) selected @endif>{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                                @error('designation_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="team_lead_id">Team Lead</label>
                                <select name="team_lead_id" id="team_lead_id" class="form-control">
                                    <option value="">Choose an option</option>
                                    @foreach (App\Models\User::all() as $user)
                                        <option value="{{ $user->id }}" @if($item->team_lead_id == $user->id) selected @endif>{{ $user->first_name . ' ' . $user->last_name }}</option>
                                    @endforeach
                                </select>
                                @error('team_lead_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image">Profile Image</label>
                                <input type="file" class="dropify" name="image" id="dp-image" data-default-file="url_of_your_file" />
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-3 text-center">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection