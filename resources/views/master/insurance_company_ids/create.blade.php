@extends('layouts.master')

@section('title')
Define In Commission | Add
@endsection

@push('styles')
<style>
    .form-control {
        border: 1px solid #387dff;
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
                            <h5>Add Define In Commission</h5>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <form method="POST" action="{{ route('insurance_company_id.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group-customer customer-additional-form">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Select Company Name : <span class="text-danger">*</span></b></label>
                                            <select class="form-select @error('insurance_company_id') is-invalid @enderror select" id="insurance_company_id" name="insurance_company_id">
                                                <option value="">Select Company Name</option>
                                                @foreach ($insuranceCompany as $value )
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
                                            <label><b>Select Company ID : <span class="text-danger">*</span></b></label>
                                            <select class="form-select @error('company_id_id') is-invalid @enderror select" id="company_id_id" name="company_id_id">
                                                <option value="">Select Company ID</option>
                                            </select>
                                            @error('company_id_id')
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
                                                <option value="{{ $value->id }}" {{ (old("r_t_o_id") == $value->id ? "selected":"") }}>{{ $value->pincode }} - {{ $value->state }}</option>
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
                                                <option value="{{ $value->id }}" {{ (old("vehicle_id") == $value->id ? "selected":"") }}>{{ $value->vehicle_name }} - [{{ $vehicleType }}]</option>
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
                                                <option value="01" {{ (old("comission_type") == '01' ? "selected":"") }}>Percentage</option>
                                                <option value="02" {{ (old("comission_type") == '02' ? "selected":"") }}>Fixed</option>
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
                                            <input type="text" id="commision_percentage" name="commision_percentage" class="form-control" value="{{ old('commision_percentage') }}" placeholder="Enter Percentage">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12 02 box" style="display:none">
                                        <div class="input-block mb-3" >
                                            <label><b>Fixed (Fixed) :</b></label>
                                            <input type="text" id="commision_fixed" name="commision_fixed" class="form-control" value="{{ old('commision_fixed') }}" placeholder="Enter Fixed Amount">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="text-start">
                                <a href="{{ route('insurance_company_id.index') }}" class="btn btn-danger">Cancel</a>
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

<script>
    $(document).ready(function(){
        $(document).on('change','#insurance_company_id', function() {
            let insurance_company_id = $(this).val();
            $('#company_id_id').show();
            $.ajax({
                method: 'POST',
                url: "{{ route('fetch_company_ids') }}",
                data: {
                    insuranceCompanyID: insurance_company_id,
                    _token : '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (result) {

                    $('#company_id_id').html('<option value="">Select Company ID</option>');
                    $.each(result.companyIds, function (key, value) {
                        $('#company_id_id').append('<option value="' + value.id + '">' + value.company_id + '</option>');
                    });
                },
            });
        });
    });
</script>

<script>
    $(document).ready(function(){
        $(document).on('change','#company_id_id', function() {
            let company_id_id = $(this).val();

            $('#comission_type').show();
            $.ajax({
                method: 'POST',
                url: "{{ route('fetch_company_commission') }}",
                data: {
                    companyID: company_id_id,
                    _token : '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (result) {

                    $('#comission_type').html('<option value="">Select Commision Type</option>');
                    $.each(result.companyCommission, function (key, value) {
                        // ===== value.commission_type == 1
                        if(value.commission_type == 1){
                            $('#comission_type').append('<option value="' + '01' + '">' + 'Percentage' + '</option>');
                        } else if (value.commission_type == 2){
                            $('#comission_type').append('<option value="' + '02' + '">' + 'Fixed' + '</option>');
                        }
                    });
                },
            });
        });
    });
</script>
@endpush
