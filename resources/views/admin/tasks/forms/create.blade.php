@extends("admin.layouts.app")

@section("body")

<div class="block-header">
    <div class="row">
        @include('admin.includes.breadcrumb-v2')

        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end"></div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <form action="{{ route('admin.tasks.forms.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Form Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Form Title" required>
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="designation_id">For Designation</label>
                                <select name="designation_id" id="designation_id" class="form-control">
                                    <option value="">Choose an option</option>
                                    @foreach($designations as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Choose an option</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="field_1_label">Field Label 1</label>
                                        <input type="text" name="field_1_label" id="field_1_label" class="form-control" placeholder="Enter Field Label">
                                        @error('field_1_label')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field_1_type">Field Type</label>
                                        <select name="field_1_type" id="field_1_type" class="form-control">
                                            <option value="">Choose an option</option>
                                            <option value="1">Small Text Field</option>
                                            <option value="2">Long Text Field</option>
                                        </select>
                                        @error('field_1_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="field_2_label">Field Label 2</label>
                                        <input type="text" name="field_2_label" id="field_2_label" class="form-control" placeholder="Enter Field Label">
                                        @error('field_2_label')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field_2_type">Field Type</label>
                                        <select name="field_2_type" id="field_2_type" class="form-control">
                                            <option value="">Choose an option</option>
                                            <option value="1">Small Text Field</option>
                                            <option value="2">Long Text Field</option>
                                        </select>
                                        @error('field_2_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="field_3_label">Field Label 3</label>
                                        <input type="text" name="field_3_label" id="field_3_label" class="form-control" placeholder="Enter Field Label">
                                        @error('field_3_label')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field_3_type">Field Type</label>
                                        <select name="field_3_type" id="field_3_type" class="form-control">
                                            <option value="">Choose an option</option>
                                            <option value="1">Small Text Field</option>
                                            <option value="2">Long Text Field</option>
                                        </select>
                                        @error('field_3_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="field_4_label">Field Label 4</label>
                                        <input type="text" name="field_4_label" id="field_4_label" class="form-control" placeholder="Enter Field Label">
                                        @error('field_4_label')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field_4_type">Field Type</label>
                                        <select name="field_4_type" id="field_4_type" class="form-control">
                                            <option value="">Choose an option</option>
                                            <option value="1">Small Text Field</option>
                                            <option value="2">Long Text Field</option>
                                        </select>
                                        @error('field_4_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="field_5_label">Field Label 5</label>
                                        <input type="text" name="field_5_label" id="field_5_label" class="form-control" placeholder="Enter Field Label">
                                        @error('field_5_label')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field_5_type">Field Type</label>
                                        <select name="field_5_type" id="field_5_type" class="form-control">
                                            <option value="">Choose an option</option>
                                            <option value="1">Small Text Field</option>
                                            <option value="2">Long Text Field</option>
                                        </select>
                                        @error('field_5_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="field_6_label">Field Label 6</label>
                                        <input type="text" name="field_6_label" id="field_6_label" class="form-control" placeholder="Enter Field Label">
                                        @error('field_6_label')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field_6_type">Field Type</label>
                                        <select name="field_6_type" id="field_6_type" class="form-control">
                                            <option value="">Choose an option</option>
                                            <option value="1">Small Text Field</option>
                                            <option value="2">Long Text Field</option>
                                        </select>
                                        @error('field_6_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="field_7_label">Field Label 7</label>
                                        <input type="text" name="field_7_label" id="field_7_label" class="form-control" placeholder="Enter Field Label">
                                        @error('field_7_label')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field_7_type">Field Type</label>
                                        <select name="field_7_type" id="field_7_type" class="form-control">
                                            <option value="">Choose an option</option>
                                            <option value="1">Small Text Field</option>
                                            <option value="2">Long Text Field</option>
                                        </select>
                                        @error('field_7_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="field_8_label">Field Label 8</label>
                                        <input type="text" name="field_8_label" id="field_8_label" class="form-control" placeholder="Enter Field Label">
                                        @error('field_8_label')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field_8_type">Field Type</label>
                                        <select name="field_8_type" id="field_8_type" class="form-control">
                                            <option value="">Choose an option</option>
                                            <option value="1">Small Text Field</option>
                                            <option value="2">Long Text Field</option>
                                        </select>
                                        @error('field_8_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="field_9_label">Field Label 9</label>
                                        <input type="text" name="field_9_label" id="field_9_label" class="form-control" placeholder="Enter Field Label">
                                        @error('field_9_label')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field_9_type">Field Type</label>
                                        <select name="field_9_type" id="field_9_type" class="form-control">
                                            <option value="">Choose an option</option>
                                            <option value="1">Small Text Field</option>
                                            <option value="2">Long Text Field</option>
                                        </select>
                                        @error('field_9_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="field_10_label">Field Label 10</label>
                                        <input type="text" name="field_10_label" id="field_10_label" class="form-control" placeholder="Enter Field Label">
                                        @error('field_2_label')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field_10_type">Field Type</label>
                                        <select name="field_10_type" id="field_10_type" class="form-control">
                                            <option value="">Choose an option</option>
                                            <option value="1">Small Text Field</option>
                                            <option value="2">Long Text Field</option>
                                        </select>
                                        @error('field_10_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="field_11_label">Field Label 11</label>
                                        <input type="text" name="field_11_label" id="field_11_label" class="form-control" placeholder="Enter Field Label">
                                        @error('field_11_label')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field_11_type">Field Type</label>
                                        <select name="field_11_type" id="field_11_type" class="form-control">
                                            <option value="">Choose an option</option>
                                            <option value="1">Small Text Field</option>
                                            <option value="2">Long Text Field</option>
                                        </select>
                                        @error('field_11_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="field_12_label">Field Label 12</label>
                                        <input type="text" name="field_12_label" id="field_12_label" class="form-control" placeholder="Enter Field Label">
                                        @error('field_12_label')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field_12_type">Field Type</label>
                                        <select name="field_12_type" id="field_12_type" class="form-control">
                                            <option value="">Choose an option</option>
                                            <option value="1">Small Text Field</option>
                                            <option value="2">Long Text Field</option>
                                        </select>
                                        @error('field_12_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="field_13_label">Field Label 13</label>
                                        <input type="text" name="field_13_label" id="field_13_label" class="form-control" placeholder="Enter Field Label">
                                        @error('field_13_label')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field_13_type">Field Type</label>
                                        <select name="field_13_type" id="field_13_type" class="form-control">
                                            <option value="">Choose an option</option>
                                            <option value="1">Small Text Field</option>
                                            <option value="2">Long Text Field</option>
                                        </select>
                                        @error('field_13_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="field_14_label">Field Label 14</label>
                                        <input type="text" name="field_14_label" id="field_14_label" class="form-control" placeholder="Enter Field Label">
                                        @error('field_14_label')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field_14_type">Field Type</label>
                                        <select name="field_214type" id="field_14_type" class="form-control">
                                            <option value="">Choose an option</option>
                                            <option value="1">Small Text Field</option>
                                            <option value="2">Long Text Field</option>
                                        </select>
                                        @error('field_14_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="field_15_label">Field Label 15</label>
                                        <input type="text" name="field_15_label" id="field_15_label" class="form-control" placeholder="Enter Field Label">
                                        @error('field_15_label')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field_15_type">Field Type</label>
                                        <select name="field_15_type" id="field_15_type" class="form-control">
                                            <option value="">Choose an option</option>
                                            <option value="1">Small Text Field</option>
                                            <option value="2">Long Text Field</option>
                                        </select>
                                        @error('field_15_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="field_2_label">Field Label 2</label>
                                        <input type="text" name="field_2_label" id="field_2_label" class="form-control" placeholder="Enter Field Label">
                                        @error('field_2_label')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field_2_type">Field Type</label>
                                        <select name="field_2_type" id="field_2_type" class="form-control">
                                            <option value="">Choose an option</option>
                                            <option value="1">Small Text Field</option>
                                            <option value="2">Long Text Field</option>
                                        </select>
                                        @error('field_2_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> -->
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