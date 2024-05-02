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
                            <div class="form-group-customer customer-additional-form">
                                <div class="row">
                                    <div class="nav nav-pills navtab-bg nav-justified col-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active show mb-1" id="v-pills-agent-tab" data-bs-toggle="pill" href="#v-pills-agent" role="tab" aria-controls="v-pills-agent" aria-selected="true">Agent</a>
                                        <a class="nav-link mb-1" id="v-pills-retailer-tab" data-bs-toggle="pill" href="#v-pills-retailer" role="tab" aria-controls="v-pills-retailer" aria-selected="false">Retailer</a>
                                    </div>

                                    <div class="tab-content">
                                        <div class="tab-pane fade active show border border-2 border-black p-4" style="border-radius: 5px;" id="v-pills-agent" role="tabpanel" aria-labelledby="v-pills-agent-tab">
                                            <form method="POST" action="{{ route('policy.store') }}" enctype="multipart/form-data">
                                                @csrf

                                                <input type="hidden" name="policy_type" id="policy_type" value="1" selected>

                                                <div class="row">
                                                    <h5 class="card-title text-primary mb-2">Agent Details</h5>
                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Select Agent :</b></label>
                                                            <select class="form-control select" id="agent_id" name="agent_id">
                                                                <option value="">Select Agent</option>
                                                                @foreach ($agents as $value )
                                                                <option value="{{ $value->id }}" {{ (old("agent_id") == $value->id ? "selected":"") }}>{{ $value->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Customer Name : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="customer_name" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" value="{{ old('customer_name') }}" placeholder="Enter Customer Name">

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
                                                            <input type="text" id="vehicle_reg_no" name="vehicle_reg_no" class="form-control @error('vehicle_reg_no') is-invalid @enderror" value="{{ old('vehicle_reg_no') }}" placeholder="Enter Vehicle Registration Number">

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
                                                            <select class="form-control select" id="agent_rto_id" name="rto_id">
                                                                <option value="">Select RTO</option>
                                                                @foreach ($Rto as $value )
                                                                <option value="{{ $value->id }}" {{ (old("rto_id") == $value->id ? "selected":"") }}>{{ $value->city }} - {{ $value->pincode }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Select Vehicle Type : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control select" id="agent_vehicle_id" name="vehicle_id">
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
                                                            <input type="text" id="vehicle_config" name="vehicle_config" class="form-control @error('vehicle_config') is-invalid @enderror" value="{{ old('vehicle_config') }}" placeholder="Enter Vehicle Configruation">

                                                            @error('vehicle_config')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Insurance Type : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control select" id="agent_insurance_type" name="insurance_type">
                                                                <option value="">Select Insurance Type</option>
                                                                <option value="1" {{ (old("insurance_type") == "1" ? "selected":"") }}>1st Party</option>
                                                                <option value="2" {{ (old("insurance_type") == "2" ? "selected":"") }}>3rd Party</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Select Company Policy : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control select" id="agent_company_id" name="company_id">
                                                                <option value="">Select Company Policye</option>
                                                                @foreach ($insuranceCompany as $value )
                                                                <option value="{{ $value->id }}" {{ (old("company_id") == $value->id ? "selected":"") }}>{{ $value->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <h5 class="card-title text-primary mb-2">Commercial Details</h5>
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Main Price : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="main_price" name="main_price" class="form-control @error('main_price') is-invalid @enderror" value="{{ old('main_price') }}" placeholder="Enter Main Price">

                                                            @error('main_price')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Profit Amount : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="profit_amt" name="profit_amt" class="form-control @error('profit_amt') is-invalid @enderror" value="{{ old('profit_amt') }}" placeholder="Enter Profit Amount">

                                                            @error('profit_amt')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>TDS Deduction (10%) : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="tds_deduction" name="tds_deduction" class="form-control @error('tds_deduction') is-invalid @enderror" value="{{ old('tds_deduction') }}" placeholder="Enter TDS Deduction (10%)">

                                                            @error('tds_deduction')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Actual Profit : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="actual_profit_amt" name="actual_profit_amt" class="form-control @error('actual_profit_amt') is-invalid @enderror" value="{{ old('actual_profit_amt') }}" placeholder="Enter Actual Profit">

                                                            @error('actual_profit_amt')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Agent Commission (%) : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="commission_percentage" name="commission_percentage" class="form-control @error('commission_percentage') is-invalid @enderror" value="{{ old('commission_percentage') }}" placeholder="Enter Agent Commission (%)">

                                                            @error('commission_percentage')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Agent Commission (in rupees) : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="comission_rupees" name="comission_rupees" class="form-control @error('comission_rupees') is-invalid @enderror" value="{{ old('comission_rupees') }}" placeholder="Enter Agent Commission (in rupees)">

                                                            @error('comission_rupees')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <h5 class="card-title text-primary mb-2">Policy Period</h5>
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>From Date : <span class="text-danger">*</span></b></label>
                                                            <div class="cal-icon cal-icon-info">
                                                                <input type="text" id="from_dt" name="from_dt" class="form-control datetimepicker @error('from_dt') is-invalid @enderror" value="{{ old('from_dt') }}" placeholder="Enter From Date">
                                                            </div>
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
                                                            <div class="cal-icon cal-icon-info">
                                                            <input type="text" id="to_date" name="to_date" class="form-control datetimepicker @error('to_date') is-invalid @enderror" value="{{ old('to_date') }}" placeholder="Enter To Date">
                                                            </div>
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
                                                            <div class="cal-icon cal-icon-info">
                                                            <input type="text" id="agent_issue_dt" name="issue_dt" class="form-control datetimepicker @error('issue_dt') is-invalid @enderror" value="{{ old('issue_dt') }}" placeholder="Enter Issue Date">
                                                            </div>
                                                            @error('issue_dt')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <h5 class="card-title text-primary mb-2">Payment Details</h5>
                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Payment By : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control select" id="agent_payment_by" name="payment_by">
                                                                <option value="">Select Payment By</option>
                                                                <option value="1" {{ (old("payment_by") == "1" ? "selected":"") }}>Agent</option>
                                                                <option value="2" {{ (old("payment_by") == "2" ? "selected":"") }}>Company</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Payment Through : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control select" id="agent_payment_through" name="payment_through">
                                                                <option value="">Select Payment Through</option>
                                                                <option value="1" {{ (old("payment_through") == "1" ? "selected":"") }}>Online</option>
                                                                <option value="2" {{ (old("payment_through") == "2" ? "selected":"") }}>Float</option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3 ">
                                                            <label><b>Upload Policy : </b></label>
                                                            <input type="file" onchange="agentPreviewFile()" id="agent_policy_doc" name="policy_doc" class="form-control @error('policy_doc') is-invalid @enderror" value="{{ old('policy_doc') }}" accept=".pdf, .png, .jpg, .jpeg">
                                                            <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                                                            <br>
                                                            <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .</b></small>
                                                            <br>
                                                            @error('class="form-control select"policy_doc')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div id="agent-preview-container">
                                                            <div id="agent-file-preview"></div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="add-customer-btns text-end">
                                                    <a href="{{ route('policy.index') }}" class="btn btn-danger">Cancel</a>
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade  border border-2 border-black p-4" style="border-radius: 5px;" id="v-pills-retailer" role="tabpanel" aria-labelledby="v-pills-retailer-tab">
                                            <form method="POST" action="{{ route('policy.store') }}" enctype="multipart/form-data">
                                                @csrf

                                                <input type="hidden" name="policy_type" id="policy_type" value="2" selected>

                                                <div class="row">
                                                    <h5 class="card-title text-primary mb-2">Retailer Details</h5>
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Customer Name : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="customer_name" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" value="{{ old('customer_name') }}" placeholder="Enter Customer Name">

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
                                                            <input type="text" id="vehicle_reg_no" name="vehicle_reg_no" class="form-control @error('vehicle_reg_no') is-invalid @enderror" value="{{ old('vehicle_reg_no') }}" placeholder="Enter Vehicle Registration Number">

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
                                                            <select class="form-control select" id="rto_id" name="rto_id">
                                                                <option value="">Select RTO</option>
                                                                @foreach ($Rto as $value )
                                                                <option value="{{ $value->id }}" {{ (old("rto_id") == $value->id ? "selected":"") }}>{{ $value->city }} - {{ $value->pincode }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Select Vehicle Type : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control select" id="vehicle_id" name="vehicle_id">
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
                                                            <input type="text" id="vehicle_config" name="vehicle_config" class="form-control @error('vehicle_config') is-invalid @enderror" value="{{ old('vehicle_config') }}" placeholder="Enter Vehicle Configruation">

                                                            @error('vehicle_config')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Insurance Type : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control select" id="insurance_type" name="insurance_type">
                                                                <option value="">Select Vehicle Type</option>
                                                                <option value="1" {{ (old("insurance_type") == "1" ? "selected":"") }}>1st Party</option>
                                                                <option value="2" {{ (old("insurance_type") == "2" ? "selected":"") }}>2nd Party</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Select Company Policy : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control select" id="company_id" name="company_id">
                                                                <option value="">Select Vehicle Type</option>
                                                                @foreach ($insuranceCompany as $value )
                                                                <option value="{{ $value->id }}" {{ (old("company_id") == $value->id ? "selected":"") }}>{{ $value->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <h5 class="card-title text-primary mb-2">Commercial Details</h5>
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Main Price : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="main_price" name="main_price" class="form-control @error('main_price') is-invalid @enderror" value="{{ old('main_price') }}" placeholder="Enter Main Price">

                                                            @error('main_price')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Company Profit : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="profit_amt" name="profit_amt" class="form-control @error('profit_amt') is-invalid @enderror" value="{{ old('profit_amt') }}" placeholder="Enter Company Profit">

                                                            @error('profit_amt')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>TDS Deduction (10%) : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="tds_deduction" name="tds_deduction" class="form-control @error('tds_deduction') is-invalid @enderror" value="{{ old('tds_deduction') }}" placeholder="Enter TDS Deduction (10%)">

                                                            @error('tds_deduction')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Profit After TDS : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="actual_profit" name="actual_profit" class="form-control @error('actual_profit') is-invalid @enderror" value="{{ old('actual_profit') }}" placeholder="Enter Profit After TDS">

                                                            @error('actual_profit')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Retailer Discount (%) : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="commission_percentage" name="commission_percentage" class="form-control @error('commission_percentage') is-invalid @enderror" value="{{ old('commission_percentage') }}" placeholder="Enter Retailer Discount (%)">

                                                            @error('commission_percentage')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Payable Amount : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="commission_rupees" name="commission_rupees" class="form-control @error('commission_rupees') is-invalid @enderror" value="{{ old('commission_rupees') }}" placeholder="Enter Retailer Discount Amount (in rupees)">

                                                            @error('commission_rupees')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Payable Amount : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="payable_amount" name="payable_amount" class="form-control @error('payable_amount') is-invalid @enderror" value="{{ old('payable_amount') }}" placeholder="Enter Payable Amount">

                                                            @error('payable_amount')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <h5 class="card-title text-primary mb-2">Policy Period</h5>
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>From Date : <span class="text-danger">*</span></b></label>
                                                            <div class="cal-icon cal-icon-info">
                                                                 <input type="text" id="from_dt" name="from_dt" class="form-control datetimepicker @error('from_dt') is-invalid @enderror" value="{{ old('from_dt') }}" placeholder="Enter From Date">
                                                            </div>
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
                                                            <div class="cal-icon cal-icon-info">
                                                                  <input type="text" id="to_date" name="to_date" class="form-control datetimepicker @error('to_date') is-invalid @enderror" value="{{ old('to_date') }}" placeholder="Enter To Date">
                                                            </div>
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
                                                            <div class="cal-icon cal-icon-info">
                                                                <input type="text" id="retailer_issue_dt" name="issue_dt" class="form-control datetimepicker @error('issue_dt') is-invalid @enderror" value="{{ old('issue_dt') }}" placeholder="Enter Issue Date">
                                                            </div>
                                                            @error('issue_dt')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <h5 class="card-title text-primary mb-2">Payment Details</h5>
                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Payment By : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control select" id="payment_by" name="payment_by">
                                                                <option value="">Select Payment By</option>
                                                                <option value="1" {{ (old("payment_by") == "1" ? "selected":"") }}>Company</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Payment Through : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control select" id="payment_through" name="payment_through">
                                                                <option value="">Select Payment Through</option>
                                                                <option value="1" {{ (old("payment_through") == "1" ? "selected":"") }}>Online</option>
                                                                <option value="2" {{ (old("payment_through") == "2" ? "selected":"") }}>Float</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Upload Policy : </b></label>
                                                            <input type="file" onchange="retailerPreviewFile()" id="retailer_policy_doc" name="policy_doc" class="form-control @error('policy_doc') is-invalid @enderror" value="{{ old('policy_doc') }}" accept=".pdf, .png, .jpg, .jpeg">
                                                            <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                                                            <br>
                                                            <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .</b></small>
                                                            <br>
                                                            @error('policy_doc')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div id="retailer-preview-container">
                                                            <div id="retailer-file-preview"></div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="add-customer-btns text-end">
                                                    <a href="{{ route('policy.index') }}" class="btn btn-danger">Cancel</a>
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script>
    $(document).ready(function(){
        $("#agent_issue_dt").datepicker({
        });
        var myDate = new Date();
        var month = myDate.getMonth() + 1;
        var prettyDate = myDate.getDate() + '-' + month + '-' + myDate.getFullYear();
        $("#agent_issue_dt").val(prettyDate);
    });
</script>
<script>
    $(document).ready(function(){
        $("#retailer_issue_dt").datepicker({
        });
        var myDate = new Date();
        var month = myDate.getMonth() + 1;
        var prettyDate = myDate.getDate() + '-' + month + '-' + myDate.getFullYear();
        $("#retailer_issue_dt").val(prettyDate);
    });
</script>

{{-- preview both agent image and PDF --}}
<script>
    function agentPreviewFile() {
        const fileInput = document.getElementById('agent_policy_doc');
        const previewContainer = document.getElementById('agent-preview-container');
        const filePreview = document.getElementById('agent-file-preview');
        const file = fileInput.files[0];

        if (file) {
            const fileType = file.type;
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            const validPdfTypes = ['application/pdf'];

            if (validImageTypes.includes(fileType)) {
                // Image preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" width="100%" height="80px">`;
                };
                reader.readAsDataURL(file);
            } else if (validPdfTypes.includes(fileType)) {
                // PDF preview using an embed element
                filePreview.innerHTML =
                    `<embed src="${URL.createObjectURL(file)}" type="application/pdf" width="100%" height="150px" />`;
            } else {
                // Unsupported file type
                filePreview.innerHTML = '<p>Unsupported file type</p>';
            }

            previewContainer.style.display = 'block';
        } else {
            // No file selected
            previewContainer.style.display = 'none';
        }

    }

</script>

{{-- preview both retailer image and PDF --}}
<script>
    function retailerPreviewFile() {
        const fileInput = document.getElementById('retailer_policy_doc');
        const previewContainer = document.getElementById('retailer-preview-container');
        const filePreview = document.getElementById('retailer-file-preview');
        const file = fileInput.files[0];

        if (file) {
            const fileType = file.type;
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            const validPdfTypes = ['application/pdf'];

            if (validImageTypes.includes(fileType)) {
                // Image preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" width="100%" height="80px">`;
                };
                reader.readAsDataURL(file);
            } else if (validPdfTypes.includes(fileType)) {
                // PDF preview using an embed element
                filePreview.innerHTML =
                    `<embed src="${URL.createObjectURL(file)}" type="application/pdf" width="100%" height="150px" />`;
            } else {
                // Unsupported file type
                filePreview.innerHTML = '<p>Unsupported file type</p>';
            }

            previewContainer.style.display = 'block';
        } else {
            // No file selected
            previewContainer.style.display = 'none';
        }

    }

</script>
@endpush
