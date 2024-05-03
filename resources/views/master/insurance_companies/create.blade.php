@extends('layouts.master')

@section('title')
Insurance Company | Add
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
                            <h5>Add Insurance Company</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('insurance_company.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group-customer customer-additional-form">
                                    <div class="row">

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Company Name : <span class="text-danger">*</span></b></label>
                                                <input type="text" id="company_name" name="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" placeholder="Enter Company Name">

                                                @error('company_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Upload Company Logo : <span class="text-danger">*</span></b></label>
                                                <input type="file" id="logo_doc" name="logo_doc" class="form-control @error('logo_doc') is-invalid @enderror" value="{{ old('logo_doc') }}" accept=".jpg, .jpeg, .png, .pdf">
                                                <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                                                <br>
                                                <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .</b></small>
                                                <br>
                                                @error('logo_doc')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Description : </b></label>
                                                <input type="text" id="description" name="description" class="form-control" value="{{ old('description') }}" placeholder="Enter Description">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="input-block mb-3" >
                                                <label><b>Commision Type : <span class="text-danger">*</span></b></label>
                                                <select class="@error('commision_type') is-invalid @enderror select" id="commision_type" name="commision_type">
                                                    <option value="">Select Commision Type</option>
                                                    <option value="01" {{ (old("commision_type") == '01' ? "selected":"") }}>Percentage</option>
                                                    <option value="02" {{ (old("commision_type") == '02' ? "selected":"") }}>Fixed</option>
                                                </select>
                                                @error('commision_type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 col-sm-12 01 box" style="display:none">
                                            <div class="input-block mb-3" >
                                                <label><b>Percentage : </b></label>
                                                <input type="text" id="percentage_amt" name="percentage_amt" class="form-control" value="{{ old('percentage_amt') }}" placeholder="Enter Percentage">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 col-sm-12 02 box" style="display:none">
                                            <div class="input-block mb-3" >
                                                <label><b>Fixed :</b></label>
                                                <input type="text" id="fixed_amt" name="fixed_amt" class="form-control" value="{{ old('fixed_amt') }}" placeholder="Enter Fixed Amount">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="add-customer-btns text-end">
                                    <a href="{{ route('insurance_company.index') }}" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success">Submit</button>
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
