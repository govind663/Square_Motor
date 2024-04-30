@extends('layouts.master')

@section('title')
Policy | Create
@endsection

@push('styles')
<style>
    .form-control {
        border: 1px solid #6525ed;
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
                            <h5>Add Policy</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('policy.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group-customer customer-additional-form">
                                    <div class="row">

                                        <div class="card-body">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active text-primary" href="#basictab1" data-bs-toggle="tab">Agent</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-primary" href="#basictab2" data-bs-toggle="tab">Retailer</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane show active" id="basictab1">
                                                    <div class="row">
                                                        <h5 class="card-title">Agent Details</h5>
                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Select Agent :</b></label>
                                                                <select class="form-control js-example-basic-single select2" id="vehicle_id" name="vehicle_id">
                                                                    <option value="">Select Agent</option>
                                                                    @foreach ($agents as $value )
                                                                    <option value="{{ $value->id }}" {{ (old("vehicle_id") == $value->id ? "selected":"") }}>{{ $value->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Customer Name : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="customer_name" customer_name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" value="{{ old('customer_name') }}" placeholder="Enter Customer Name">

                                                                @error('customer_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Vehicle Registration Number : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="vehicle_reg_no" vehicle_reg_no="vehicle_reg_no" class="form-control @error('vehicle_reg_no') is-invalid @enderror" value="{{ old('vehicle_reg_no') }}" placeholder="Enter Vehicle Registration Number">

                                                                @error('vehicle_reg_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Select RTO : <span class="text-danger">*</span></b></label>
                                                                <select class="form-control js-example-basic-single select2" id="vehicle_id" name="vehicle_id">
                                                                    <option value="">Select RTO</option>
                                                                    @foreach ($Rto as $value )
                                                                    <option value="{{ $value->id }}" {{ (old("vehicle_id") == $value->id ? "selected":"") }}>{{ $value->city }} - {{ $value->pincode }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Select Vehicle Type : <span class="text-danger">*</span></b></label>
                                                                <select class="form-control js-example-basic-single select2" id="vehicle_id" name="vehicle_id">
                                                                    <option value="">Select Vehicle Type</option>
                                                                    @foreach ($vehicles as $value )
                                                                    <option value="{{ $value->id }}" {{ (old("vehicle_id") == $value->id ? "selected":"") }}>{{ $value->vehicle_type }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Vehicle Configruation : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="vehicle_reg_no" vehicle_reg_no="vehicle_reg_no" class="form-control @error('vehicle_reg_no') is-invalid @enderror" value="{{ old('vehicle_reg_no') }}" placeholder="Enter Vehicle Configruation">

                                                                @error('vehicle_reg_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Insurance Type : <span class="text-danger">*</span></b></label>
                                                                <select class="form-control js-example-basic-single select2" id="vehicle_id" name="vehicle_id">
                                                                    <option value="">Select Vehicle Type</option>
                                                                    <option value="1" {{ (old("vehicle_id") == "1" ? "selected":"") }}>1st Party</option>
                                                                    <option value="2" {{ (old("vehicle_id") == "2" ? "selected":"") }}>2nd Party</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Select Company Policy : <span class="text-danger">*</span></b></label>
                                                                <select class="form-control js-example-basic-single select2" id="vehicle_id" name="vehicle_id">
                                                                    <option value="">Select Vehicle Type</option>
                                                                    @foreach ($insuranceCompany as $value )
                                                                    <option value="{{ $value->id }}" {{ (old("vehicle_id") == $value->id ? "selected":"") }}>{{ $value->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <h5 class="card-title">Commercial Details</h5>
                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Main Price : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="vehicle_reg_no" vehicle_reg_no="vehicle_reg_no" class="form-control @error('vehicle_reg_no') is-invalid @enderror" value="{{ old('vehicle_reg_no') }}" placeholder="Enter Main Price">

                                                                @error('vehicle_reg_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Profit Amount : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="vehicle_reg_no" vehicle_reg_no="vehicle_reg_no" class="form-control @error('vehicle_reg_no') is-invalid @enderror" value="{{ old('vehicle_reg_no') }}" placeholder="Enter Profit Amount">

                                                                @error('vehicle_reg_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>TDS Deduction (10%) : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="vehicle_reg_no" vehicle_reg_no="vehicle_reg_no" class="form-control @error('vehicle_reg_no') is-invalid @enderror" value="{{ old('vehicle_reg_no') }}" placeholder="Enter TDS Deduction (10%)">

                                                                @error('vehicle_reg_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Actual Profit : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="vehicle_reg_no" vehicle_reg_no="vehicle_reg_no" class="form-control @error('vehicle_reg_no') is-invalid @enderror" value="{{ old('vehicle_reg_no') }}" placeholder="Enter Actual Profit">

                                                                @error('vehicle_reg_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Agent Commission (%) : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="vehicle_reg_no" vehicle_reg_no="vehicle_reg_no" class="form-control @error('vehicle_reg_no') is-invalid @enderror" value="{{ old('vehicle_reg_no') }}" placeholder="Enter Agent Commission (%)">

                                                                @error('vehicle_reg_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Agent Commission (in rupees) : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="vehicle_reg_no" vehicle_reg_no="vehicle_reg_no" class="form-control @error('vehicle_reg_no') is-invalid @enderror" value="{{ old('vehicle_reg_no') }}" placeholder="Enter Agent Commission (in rupees)">

                                                                @error('vehicle_reg_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <h5 class="card-title">Policy Period</h5>
                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>From Date : <span class="text-danger">*</span></b></label>
                                                                <input type="date" id="from_dt" name="from_dt" class="form-control @error('from_dt') is-invalid @enderror" value="{{ old('from_dt') }}" placeholder="Enter From Date">

                                                                @error('from_dt')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>To Date : <span class="text-danger">*</span></b></label>
                                                                <input type="date" id="to_date" name="to_date" class="form-control @error('to_date') is-invalid @enderror" value="{{ old('to_date') }}" placeholder="Enter To Date">

                                                                @error('to_date')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Issue Date : <span class="text-danger">*</span></b></label>
                                                                <input type="date" id="issue_dt" name="issue_dt" class="form-control @error('issue_dt') is-invalid @enderror" value="{{ old('issue_dt') }}" placeholder="Enter Issue Date">

                                                                @error('issue_dt')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <h5 class="card-title">Payment Details</h5>
                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Payment By : <span class="text-danger">*</span></b></label>
                                                                <select class="form-control js-example-basic-single select2" id="vehicle_id" name="vehicle_id">
                                                                    <option value="">Select Payment By</option>
                                                                    <option value="1" {{ (old("vehicle_id") == "1" ? "selected":"") }}>Agent</option>
                                                                    <option value="2" {{ (old("vehicle_id") == "2" ? "selected":"") }}>Company</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Payment Through : <span class="text-danger">*</span></b></label>
                                                                <select class="form-control js-example-basic-single select2" id="vehicle_id" name="vehicle_id">
                                                                    <option value="">Select Payment Through</option>
                                                                    <option value="1" {{ (old("vehicle_id") == "1" ? "selected":"") }}>Online</option>
                                                                    <option value="2" {{ (old("vehicle_id") == "2" ? "selected":"") }}>Float</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Upload Policy : </b></label>
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

                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="basictab2">
                                                    <div class="row">
                                                        <h5 class="card-title">Retailer Details</h5>
                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Customer Name : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="customer_name" customer_name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" value="{{ old('customer_name') }}" placeholder="Enter Customer Name">

                                                                @error('customer_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Vehicle Registration Number : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="vehicle_reg_no" vehicle_reg_no="vehicle_reg_no" class="form-control @error('vehicle_reg_no') is-invalid @enderror" value="{{ old('vehicle_reg_no') }}" placeholder="Enter Vehicle Registration Number">

                                                                @error('vehicle_reg_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Select RTO : <span class="text-danger">*</span></b></label>
                                                                <select class="form-control js-example-basic-single select2" id="vehicle_id" name="vehicle_id">
                                                                    <option value="">Select RTO</option>
                                                                    @foreach ($Rto as $value )
                                                                    <option value="{{ $value->id }}" {{ (old("vehicle_id") == $value->id ? "selected":"") }}>{{ $value->city }} - {{ $value->pincode }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Select Vehicle Type : <span class="text-danger">*</span></b></label>
                                                                <select class="form-control js-example-basic-single select2" id="vehicle_id" name="vehicle_id">
                                                                    <option value="">Select Vehicle Type</option>
                                                                    @foreach ($vehicles as $value )
                                                                    <option value="{{ $value->id }}" {{ (old("vehicle_id") == $value->id ? "selected":"") }}>{{ $value->vehicle_type }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Vehicle Configruation : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="vehicle_reg_no" vehicle_reg_no="vehicle_reg_no" class="form-control @error('vehicle_reg_no') is-invalid @enderror" value="{{ old('vehicle_reg_no') }}" placeholder="Enter Vehicle Configruation">

                                                                @error('vehicle_reg_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Insurance Type : <span class="text-danger">*</span></b></label>
                                                                <select class="form-control js-example-basic-single select2" id="vehicle_id" name="vehicle_id">
                                                                    <option value="">Select Vehicle Type</option>
                                                                    <option value="1" {{ (old("vehicle_id") == "1" ? "selected":"") }}>1st Party</option>
                                                                    <option value="2" {{ (old("vehicle_id") == "2" ? "selected":"") }}>2nd Party</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Select Company Policy : <span class="text-danger">*</span></b></label>
                                                                <select class="form-control js-example-basic-single select2" id="vehicle_id" name="vehicle_id">
                                                                    <option value="">Select Vehicle Type</option>
                                                                    @foreach ($insuranceCompany as $value )
                                                                    <option value="{{ $value->id }}" {{ (old("vehicle_id") == $value->id ? "selected":"") }}>{{ $value->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <h5 class="card-title">Commercial Details</h5>
                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Main Price : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="vehicle_reg_no" vehicle_reg_no="vehicle_reg_no" class="form-control @error('vehicle_reg_no') is-invalid @enderror" value="{{ old('vehicle_reg_no') }}" placeholder="Enter Main Price">

                                                                @error('vehicle_reg_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Profit Amount : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="vehicle_reg_no" vehicle_reg_no="vehicle_reg_no" class="form-control @error('vehicle_reg_no') is-invalid @enderror" value="{{ old('vehicle_reg_no') }}" placeholder="Enter Profit Amount">

                                                                @error('vehicle_reg_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>TDS Deduction (10%) : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="vehicle_reg_no" vehicle_reg_no="vehicle_reg_no" class="form-control @error('vehicle_reg_no') is-invalid @enderror" value="{{ old('vehicle_reg_no') }}" placeholder="Enter TDS Deduction (10%)">

                                                                @error('vehicle_reg_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Actual Profit : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="vehicle_reg_no" vehicle_reg_no="vehicle_reg_no" class="form-control @error('vehicle_reg_no') is-invalid @enderror" value="{{ old('vehicle_reg_no') }}" placeholder="Enter Actual Profit">

                                                                @error('vehicle_reg_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Agent Commission (%) : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="vehicle_reg_no" vehicle_reg_no="vehicle_reg_no" class="form-control @error('vehicle_reg_no') is-invalid @enderror" value="{{ old('vehicle_reg_no') }}" placeholder="Enter Agent Commission (%)">

                                                                @error('vehicle_reg_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Agent Commission (in rupees) : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="vehicle_reg_no" vehicle_reg_no="vehicle_reg_no" class="form-control @error('vehicle_reg_no') is-invalid @enderror" value="{{ old('vehicle_reg_no') }}" placeholder="Enter Agent Commission (in rupees)">

                                                                @error('vehicle_reg_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <h5 class="card-title">Policy Period</h5>
                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>From Date : <span class="text-danger">*</span></b></label>
                                                                <input type="date" id="from_dt" name="from_dt" class="form-control @error('from_dt') is-invalid @enderror" value="{{ old('from_dt') }}" placeholder="Enter From Date">

                                                                @error('from_dt')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>To Date : <span class="text-danger">*</span></b></label>
                                                                <input type="date" id="to_date" name="to_date" class="form-control @error('to_date') is-invalid @enderror" value="{{ old('to_date') }}" placeholder="Enter To Date">

                                                                @error('to_date')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Issue Date : <span class="text-danger">*</span></b></label>
                                                                <input type="date" id="issue_dt" name="issue_dt" class="form-control @error('issue_dt') is-invalid @enderror" value="{{ old('issue_dt') }}" placeholder="Enter Issue Date">

                                                                @error('issue_dt')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <h5 class="card-title">Payment Details</h5>
                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Payment By : <span class="text-danger">*</span></b></label>
                                                                <select class="form-control js-example-basic-single select2" id="vehicle_id" name="vehicle_id">
                                                                    <option value="">Select Payment By</option>
                                                                    <option value="1" {{ (old("vehicle_id") == "1" ? "selected":"") }}>Company</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Payment Through : <span class="text-danger">*</span></b></label>
                                                                <select class="form-control js-example-basic-single select2" id="vehicle_id" name="vehicle_id">
                                                                    <option value="">Select Payment Through</option>
                                                                    <option value="1" {{ (old("vehicle_id") == "1" ? "selected":"") }}>Online</option>
                                                                    <option value="2" {{ (old("vehicle_id") == "2" ? "selected":"") }}>Float</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Upload Policy : </b></label>
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

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="add-customer-btns text-end">
                                    <a href="{{ route('retailer.index') }}" class="btn btn-danger">Cancel</a>
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
