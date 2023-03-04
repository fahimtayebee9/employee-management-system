@extends("employee.layouts.app")

@section("content")

<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5 class="page-title">Daily Tasks For {{ $taskForm->designation->name }}</h5>
                <p class="m-0">
                    @php
                        $total_fields = 15;
                        $active_fields = 0;
                        for($i = 1; $i <= $total_fields; $i++){
                            $lkey_name = 'field_'.$i.'_label';
                            if(!empty($taskForm->$lkey_name)){
                                $active_fields++;
                            }
                        }
                    @endphp
                    Total Tasks: {{ $active_fields }}
                </p>
            </div>
            <div class="card-body">
                <form action="{{ route('employee.task-management.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="task_form_id" value="{{ $taskForm->id }}">
                    <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                    <div class="row">
                        @php
                            $total_fields = 15;
                            $active_fields = 0;
                            for($i = 1; $i <= $total_fields; $i++){
                                $lkey_name = 'field_'.$i.'_label';
                                if(!empty($taskForm->$lkey_name)){
                                    @endphp
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="field_{{ $i }}">{{ $taskForm->$lkey_name }}</label>
                                                <!-- check field type -->
                                                @php
                                                    $ftype_name = 'field_'.$i.'_type';
                                                    $ftype = $taskForm->$ftype_name;
                                                    $fkey_name = 'field_'.$i.'_key';
                                                    $fkey = $taskForm->$fkey_name;
                                                @endphp
                                                @if($ftype == 2)
                                                    <textarea name="field_{{ $i }}" id="field_{{ $i }}" class="form-control" rows="3"></textarea>
                                                @elseif($ftype == 3)
                                                    @php
                                                        $fvalue_name = 'field_'.$i.'_value';
                                                        $fvalue = $taskForm->$fvalue_name;
                                                        $fvalue_arr = explode(',', $fvalue);
                                                    @endphp
                                                    <select name="field_{{ $i }}" id="field_{{ $i }}" class="form-control">
                                                        @foreach($fvalue_arr as $fvalue)
                                                            <option value="{{ $fvalue }}">{{ $fvalue }}</option>
                                                        @endforeach
                                                    </select>
                                                @elseif($ftype == 4)
                                                    <label for="">
                                                        <input type="checkbox" name="field_{{ $i }}" id="field_{{ $i }}" value="1">
                                                        Yes
                                                    </label>
                                                @else
                                                    <input type="text" name="field_{{ $i }}" id="field_{{ $i }}" class="form-control">
                                                @endif
                                            </div>
                                        </div>
                                    @php
                                }
                            }
                        @endphp
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div><!-- end row-->

@endsection