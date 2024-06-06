@extends('layouts.master')

@section('title')
Define In Commission | Edit
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
                        <h5>Edit Define In Commission </h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('insurance_company_id.update', $InsuranceCompanyID->id) }}"  enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="text" id="id" name="id" hidden  value="{{ $InsuranceCompanyID->id }}" >

                            <div class="form-group-customer customer-additional-form">
                                <div class="row">

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Select Company Name : <span class="text-danger">*</span></b></label>
                                            <select class="form-select @error('insurance_company_id') is-invalid @enderror select" id="insurance_company_id" name="insurance_company_id">
                                                <option value="">Select Company Name</option>
                                                @foreach ($insuranceCompany as $value )
                                                <option value="{{ $value->id }}" {{ ($InsuranceCompanyID->insurance_company_id == $value->id ? "selected":"") }}>{{ $value->company_name }}</option>
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
                                            <input type="text" id="company_id" name="company_id" class="form-control @error('company_id') is-invalid @enderror" value="{{ $InsuranceCompanyID->company_id }}" placeholder="Enter Company ID">
                                            @error('company_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Select RTO : <span class="text-danger">*</span></b></label>
                                            <select class="form-select @error('r_t_o_id') is-invalid @enderror select" id="r_t_o_id" name="r_t_o_id">
                                                <option value="">Select RTO</option>
                                                @foreach ($rtos as $value )
                                                <option value="{{ $value->id }}" {{ ($InsuranceCompanyID->r_t_o_id == $value->id ? "selected":"") }}>{{ $value->pincode }} - {{ $value->state }}</option>
                                                @endforeach
                                            </select>
                                            @error('r_t_o_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Select Vehicle Type : <span class="text-danger">*</span></b></label>
                                            <select  class="form select @error('vehicle_id') is-invalid @enderror" id="vehicle_id" name="vehicle_id">
                                                <option value="">Select Vehicle Type</option>
                                                @foreach ($vehicles as $value )
                                                @php
                                                    $vehicleType = '';
                                                    if($value->vehicle_type == '1'){
                                                        $vehicleType = 'Private';
                                                    } else if($value->vehicle_type == '2'){
                                                        $vehicleType = 'Other';
                                                    }
                                                @endphp
                                                <option value="{{ $value->id }}" {{ ( $InsuranceCompanyID->vehicle_id == $value->id ? "selected":"") }}>{{ $value->vehicle_name }} - [{{ $vehicleType }}]</option>
                                                @endforeach
                                            </select>
                                            @error('vehicle_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3" >
                                            <label><b>Commision Type : <span class="text-danger">*</span></b></label>
                                            <select class="@error('comission_type') is-invalid @enderror select" id="comission_type" name="comission_type">
                                                <option value="">Select Commision Type</option>
                                                <option value="01" {{ ($InsuranceCompanyID->comission_type == '01' ? "selected":"") }}>Percentage</option>
                                                <option value="02" {{ ($InsuranceCompanyID->comission_type == '02' ? "selected":"") }}>Fixed</option>
                                            </select>
                                            @error('comission_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-lg-4 col-md-6 col-sm-12 01 box" style="display:none">
                                        <div class="input-block mb-3" >
                                            <label><b>Percentage (%) : </b></label>
                                            <input type="text" id="commision_percentage" name="commision_percentage" class="form-control" value="{{ $InsuranceCompanyID->commision_percentage }}" placeholder="Enter Percentage">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12 02 box" style="display:none">
                                        <div class="input-block mb-3" >
                                            <label><b>Fixed (Rs) :</b></label>
                                            <input type="text" id="commision_fixed" name="commision_fixed" class="form-control" value="{{ $InsuranceCompanyID->comission_fixed }}" placeholder="Enter Fixed Amount">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="add-customer-btns text-start">
                                <a href="{{ route('insurance_company_id.index') }}" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $("select").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue){
                    $(".box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else{
                    $(".box").hide();
                }
            });
        }).change();
    });
</script>
@endpush
