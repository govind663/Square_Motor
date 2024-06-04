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
                                            <select class="form-select @error('insurance_company_id') is-invalid @enderror select" id="insurance_company_id" name="insurance_company_id">
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
                                            <label><b>Select Insurance Company ID : <span class="text-danger">*</span></b></label>
                                            <select  class="form select @error('insurance_company_i_d_id') is-invalid @enderror" id="insurance_company_i_d_id" name="insurance_company_i_d_id">
                                                <option value="">Select Insurance Company ID</option>

                                            </select>
                                            @error('insurance_company_i_d_id')
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
{{-- Fetch Company Name --}}
<script>
    $(document).ready(function(){
        $(document).on('change','#insurance_company_id', function() {
            let insurance_company_id = $(this).val();
            $('#insurance_company_i_d_id').show();
            $.ajax({
                method: 'POST',
                url: "{{ route('fetch_insurance_company_name') }}",
                data: {
                    insuranceCompanyID: insurance_company_id,
                    _token : '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (result) {
                    // display in  insurance_company_i_d_id in select option
                    $('#insurance_company_i_d_id').html('<option value="">Select Insurance Company ID</option>');
                    $.each(result.companyIds, function (key, value) {

                        // === check value is selected or not
                        if (value.id == insurance_company_i_d_id) {
                            $('#insurance_company_i_d_id').append('<option value="' + value.id + '" selected>' + value.company_id + '</option>');
                        }
                        else {
                            $('#insurance_company_i_d_id').append('<option value="' + value.id + '">' + value.company_id + '</option>');
                        }
                    });
                },
            });
        });
    });
</script>
@endpush
