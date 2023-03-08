<div class="modal fade" id="mdl-apply-leave" tabindex="-1" role="dialog" aria-labelledby="holidayModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="departmentModalLabel">Apply For Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('employee.leave.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                    <div class="form-group">
                        <label for="name">Subject</label>
                        <input type="text" name="subject" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="description">Start Date</label>
                                <input type="text" class="form-control" name="leave_from" placeholder="mm/dd/yyyy" id="leave-start-date">
                                @error('leave_from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="description">End Date</label>
                                <input type="text" class="form-control" name="leave_to" placeholder="mm/dd/yyyy" id="leave-end-date">
                                @error('leave_to')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="leave_type">Leave Type</label>
                                <select class="form-control custom-select select2-hidden-accessible" name="leave_type" id="leave-type-mdl">
                                    <option>Select Type</option>
                                    <option value="1">Full Day Paid Leave</option>
                                    <option value="2">Half Day Non-Paid Leave</option>
                                    <option value="3">Full Day Non-Paid Leave</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="summernote" style="display: none;" name="description">Hello Summernote</textarea>
                        <!-- <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea> -->
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>