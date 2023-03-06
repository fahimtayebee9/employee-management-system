@extends("employee.layouts.app")

@section("content")

<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date </th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($launchList as $launch)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($launch->date)->format('d M, Y') }}</td>
                            <td>
                                @if($launch->status == 1)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div><!-- end row-->

@endsection