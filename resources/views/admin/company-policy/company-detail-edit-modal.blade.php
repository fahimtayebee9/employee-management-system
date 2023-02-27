<div class="modal fade" id="mdl-edit-company-detail" tabindex="-1" role="dialog" aria-labelledby="departmentEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="departmentModalLabel">Update Company Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('company-details.update', $company_details) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group text-left">
                        <label for="company_name">Company Name</label>
                        <input type="text" name="company_name" id="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ $company_details->company_name }}" required>
                        @error('company_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group text-left">
                        <label for="company_address">Company Address</label>
                        <input type="text" name="company_address" id="company_address" class="form-control @error('company_address') is-invalid @enderror" 
                            value="{{ $company_details->company_address }}">
                        @error('company_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group text-left">
                        <label for="company_phone">Company Phone</label>
                        <input type="text" name="company_phone" id="company_phone" class="form-control @error('company_phone') is-invalid @enderror" 
                            value="{{ $company_details->company_phone }}">
                        @error('company_phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group text-left">
                        <label for="company_email">Company Email</label>
                        <input type="text" name="company_email" id="company_email" class="form-control @error('company_email') is-invalid @enderror" 
                            value="{{ $company_details->company_email }}" >
                        @error('company_email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group text-left">
                        <label for="company_website">Company Website URL</label>
                        <input type="text" name="company_website" id="company_website" class="form-control @error('company_website') is-invalid @enderror" 
                            value="{{ $company_details->company_website }}">
                        @error('company_website')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group text-left">
                        <label for="image">Logo Image</label>
                        <input type="file" class="dropify" name="company_logo" id="dp-image" data-default-file="url_of_your_file" />
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