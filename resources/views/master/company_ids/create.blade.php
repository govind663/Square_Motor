@extends('layouts.master')

@section('title')
Company Id | Add
@endsection

@push('styles')
<style>
    .form-control {
        border: 1px solid #387dff !important;
    }
</style>
@endpush

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="card mb-0">
                <div class="card-body">

                    <div class="page-header">
                        <div class="content-page-header">
                            <h5>Add Company Id</h5>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <form method="POST" action="{{ route('company_id.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group-customer customer-additional-form">
                                <div class="row">

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Select Company Name : <span class="text-danger">*</span></b></label>
                                            <select class="@error('insurance_company_id') is-invalid @enderror select" id="insurance_company_id" name="insurance_company_id">
                                                <option value="">Select Company Name</option>
                                                @foreach ($insuranceCompanies as $value )
                                                <option value="{{ $value->id }}" {{ (old("insurance_company_id") == $value->id ? "selected":"") }}>{{ $value->company_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('insurance_company_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Company ID : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="company_id" name="company_id" class="form-control @error('company_id') is-invalid @enderror" value="{{ old('company_id') }}" placeholder="Enter Company ID">
                                            @error('company_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3" >
                                            <label><b>TDS (%) : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="tds_in_percentage" name="tds_in_percentage" class="form-control @error('tds_in_percentage') is-invalid @enderror" value="{{ old('tds_in_percentage') }}" placeholder="Enter TDS (%)">
                                            @error('tds_in_percentage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3 row">
                                            <label><b>Commission Type : <span class="text-danger">*</span></b></label>
                                            <div class="col-lg-9">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input @error('commission_type') is-invalid @enderror" type="radio" name="commission_type" id="commission_type_percentage" value="1" @if(old('commission_type') == '1') checked @endif>
                                                    <label class="form-check-label" for="commission_type_percentage">
                                                        Percentage
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-inpu @error('commission_type') is-invalid @enderror" type="radio" name="commission_type" id="commission_type_fixed" value="2" @if(old('commission_type') == '2') checked @endif>
                                                    <label class="form-check-label" for="commission_type_fixed">
                                                        Fixed
                                                    </label>
                                                </div>
                                                @error('commission_type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="text-start">
                                <a href="{{ route('company_id.index') }}" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    var typed = "";
    $('#insurance_company_id').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#insurance_company_id').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#insurance_company_id').find("option[value='" + typed + "']").length) {
                $('#insurance_company_id').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#insurance_company_id').append(newOption).trigger('change');
            }
        }
    });
</script>
@endpush
