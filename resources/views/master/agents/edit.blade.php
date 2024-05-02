@extends('layouts.master')

@section('title')
  Agents | Edit
@endsection

@push('styles')
@endpush

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="card mb-0">
            <div class="card-body">

                <div class="page-header">
                    <div class="content-page-header">
                        <h5>Edit Agent</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('agent.update', $agent->id) }}"  enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="text" id="id" name="id" hidden  value="{{ $agent->id }}" >

                            <div class="form-group-customer customer-additional-form">
                                <div class="row">

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Name : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $agent->name }}" placeholder="Enter Name">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Email Id :</b></label>
                                            <input type="email" id="email" name="email" class="form-control" value="{{ $agent->email }}" placeholder="Enter Email Id">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Mobile number :</b></label>
                                            <input type="text" id="phone_no" name="phone_no" maxlength="10" class="form-control" value="{{ $agent->phone_no }}" placeholder="Enter Mobile Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Address :</b></label>
                                            <input type="text" id="address" name="address" class="form-control" value="{{ $agent->address }}" placeholder="Enter Address">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Pincode :</b></label>
                                            <input type="text" id="pincode" name="pincode" class="form-control" value="{{ $agent->pincode }}" placeholder="Enter Pincode">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>City :</b></label>
                                            <input type="text" id="city" name="city" class="form-control" value="{{ $agent->city }}" placeholder="Enter City">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>State :</b></label>
                                            <input type="text" id="state" name="state" class="form-control" value="{{ $agent->state }}" placeholder="Enter State">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3" >
                                            <label><b>Commision Type : <span class="text-danger">*</span></b></label>
                                            <select class="form-control @error('comission_type') is-invalid @enderror js-example-basic-single select2" id="comission_type" name="comission_type">
                                                <option value="">Select Commision Type</option>
                                                <option value="01" {{ ($agent->comission_type == "01" ? "selected":"") }}>Percentage</option>
                                                {{-- <option value="02" {{ ($agent->comission_type == "02" ? "selected":"") }}>Fixed</option> --}}
                                            </select>
                                            @error('comission_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12 01 box" style="display:none">
                                        <div class="input-block mb-3" >
                                            <label><b>Percentage : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="percentage_amt" name="percentage_amt" class="form-control @error('percentage_amt') is-invalid @enderror" value="{{ $agent->percentage_amt }}" placeholder="Enter Percentage">
                                            @error('percentage_amt')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12 02 box" style="display:none">
                                        <div class="input-block mb-3" >
                                            <label><b>Fixed :</b></label>
                                            <input type="text" id="fixed_amt" name="fixed_amt" class="form-control" value="{{ $agent->fixed_amt }}" placeholder="Enter Fixed Amount">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="add-customer-btns text-end">
                                <a href="{{ route('agent.index') }}" class="btn btn-danger">Cancel</a>
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
