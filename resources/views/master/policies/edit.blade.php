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
                            <h5>Edit Policy</h5>
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
                                            <form method="POST" action="{{ route('policy.update', $policy->id) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <input type="text" id="id" name="id" hidden  value="{{ $policy->id }}" >
                                                <input type="hidden" name="policy_type" id="policy_type" value="1" selected>

                                                <div class="row">
                                                    <h5 class="card-title text-primary mb-2">Agent Details</h5>
                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Select Agent :</b></label>
                                                            <select class="form-control   select" id="agent_id" name="agent_id">
                                                                <option value="">Select Agent</option>
                                                                @foreach ($agents as $value )
                                                                <option value="{{ $value->id }}" {{ ($policy->agent_id == $value->id ? "selected":"") }}>{{ $value->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Customer Name : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="customer_name" name="customer_name" class="form-control  " value="{{ $policy->customer_name }}" placeholder="Enter Customer Name">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Vehicle Registration Number : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="vehicle_reg_no" name="vehicle_reg_no" class="form-control   " value="{{ $policy->vehicle_reg_no }}" placeholder="Enter Vehicle Registration Number">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Select RTO : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control   select" id="agent_rto_id" name="rto_id">
                                                                <option value="">Select RTO</option>
                                                                @foreach ($Rto as $value )
                                                                <option value="{{ $value->id }}" {{ ( $policy->rto_id == $value->id ? "selected":"") }}>{{ $value->city }} - {{ $value->pincode }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Select Vehicle Type : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control   select" id="agent_vehicle_id" name="vehicle_id">
                                                                <option value="">Select Vehicle Type</option>
                                                                @foreach ($vehicles as $value )
                                                                <option value="{{ $value->id }}" {{ ($policy->vehicle_id == $value->id ? "selected":"") }}>{{ $value->vehicle_type }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Vehicle Configruation : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="vehicle_config" name="vehicle_config" class="form-control   " value="{{ $policy->vehicle_config }}" placeholder="Enter Vehicle Configruation">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Insurance Type : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control   select" id="agent_insurance_type" name="insurance_type">
                                                                <option value="">Select Insurance Type</option>
                                                                <option value="1" {{ ($policy->insurance_type == "1" ? "selected":"") }}>1st Party</option>
                                                                <option value="2" {{ ($policy->insurance_type == "2" ? "selected":"") }}>3rd Party</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Select Company Policy : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control   select" id="agent_company_id" name="insurance_company_id">
                                                                <option value="">Select Company Policye</option>
                                                                @foreach ($insuranceCompany as $value )
                                                                <option value="{{ $value->id }}" {{ ($policy->agent_company_id == $value->id ? "selected":"") }}>{{ $value->company_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <h5 class="card-title text-primary mb-2">Commercial Details</h5>
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Main Price : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="agent_main_price" name="main_price" class="form-control   " value="{{ $policy->main_price }}" placeholder="Enter Main Price">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Profit Amount : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="agent_profit_amt" readonly name="profit_amt" class="form-control   " value="{{ $policy->profit_amt }}" placeholder="Enter Profit Amount">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>TDS Deduction (%) : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="agent_tds_deduction" name="tds_deduction" class="form-control   " value="{{ $policy->tds_deduction }}" placeholder="Enter TDS Deduction (10%)">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Actual Profit : <span class="text-danger">*</span></b></label>
                                                            <input type="text" readony id="agent_actual_profit_amt" name="actual_profit_amt" class="form-control   " value="{{ $policy->actual_profit_amt }}" placeholder="Enter Actual Profit">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Agent Commission (%) : <span class="text-danger">*</span></b></label>
                                                            <input type="text" readonly id="agent_commission_percentage" name="commission_percentage" class="form-control   " value="{{ $policy->commission_percentage }}" placeholder="Enter Agent Commission (%)">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Agent Commission (in rupees) : <span class="text-danger">*</span></b></label>
                                                            <input type="text" readonly id="agent_comission_rupees" name="comission_rupees" class="form-control   " value="{{ $policy->comission_rupees }}" placeholder="Enter Agent Commission (in rupees)">

                                                        </div>
                                                    </div>

                                                    <h5 class="card-title text-primary mb-2">Policy Period</h5>
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>From Date : <span class="text-danger">*</span></b></label>
                                                            <div class="cal-icon cal-icon-info">
                                                                <input type="text" id="from_dt" name="from_dt" class="form-control   datetimepicker " value="{{ $policy->from_dt }}" placeholder="Enter From Date">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>To Date : <span class="text-danger">*</span></b></label>
                                                            <div class="cal-icon cal-icon-info">
                                                            <input type="text" id="to_date" name="to_date" class="form-control   datetimepicker " value="{{ $policy->to_date }}" placeholder="Enter To Date">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Issue Date : <span class="text-danger">*</span></b></label>
                                                            <div class="cal-icon cal-icon-info">
                                                            <input type="text" id="agent_issue_dt" name="issue_dt" class="form-control   datetimepicker " value="{{ $policy->issue_dt }}" placeholder="Enter Issue Date">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h5 class="card-title text-primary mb-2">Payment Details</h5>
                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Payment By : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control   select" id="agent_payment_by" name="payment_by">
                                                                <option value="">Select Payment By</option>
                                                                <option value="1" {{ ($policy->payment_by == "1" ? "selected":"") }}>Agent</option>
                                                                <option value="2" {{ ($policy->payment_by == "2" ? "selected":"") }}>Company</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Payment Through : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control   select" id="agent_payment_through" name="payment_through">
                                                                <option value="">Select Payment Through</option>
                                                                <option value="1" {{ ($policy->payment_through == "1" ? "selected":"") }}>Online</option>
                                                                <option value="2" {{ ($policy->payment_through == "2" ? "selected":"") }}>Float</option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3 ">
                                                            <label><b>Upload Policy : </b></label>
                                                            <input type="file" onchange="agentPreviewFile()" id="agent_policy_doc" name="policy_doc" class="form-control  " value="{{ old('policy_doc') }}" accept=".pdf, .png, .jpg, .jpeg">
                                                            <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                                                            <br>
                                                            <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .</b></small>

                                                        </div>
                                                        <div id="agent-preview-container">
                                                            <div id="agent-file-preview"></div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            @if(!empty($policy->policy_doc))
                                                                <a href="{{url('/')}}/company_policy/policy_doc/{{ $policy->logo_doc }}" target="_blank" class="btn btn-primary btn-sm">
                                                                    <b> View Document</b>
                                                                </a>
                                                            @endif
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
                                            <form method="POST" action="{{ route('policy.update', $policy->id) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <input type="text" id="id" name="id" hidden  value="{{ $policy->id }}" >
                                                <input type="hidden" name="policy_type" id="policy_type" value="2" selected>

                                                <div class="row">
                                                    <h5 class="card-title text-primary mb-2">Retailer Details</h5>
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Customer Name : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="customer_name" name="customer_name" class="form-control  " value="{{ $policy->customer_name }}" placeholder="Enter Customer Name">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Vehicle Registration Number : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="vehicle_reg_no" name="vehicle_reg_no" class="form-control   " value="{{ $policy->vehicle_reg_no }}" placeholder="Enter Vehicle Registration Number">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Select RTO : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control   select" id="rto_id" name="rto_id">
                                                                <option value="">Select RTO</option>
                                                                @foreach ($Rto as $value )
                                                                <option value="{{ $value->id }}" {{ ($policy->rto_id == $value->id ? "selected":"") }}>{{ $value->city }} - {{ $value->pincode }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Select Vehicle Type : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control   select" id="vehicle_id" name="vehicle_id">
                                                                <option value="">Select Vehicle Type</option>
                                                                @foreach ($vehicles as $value )
                                                                <option value="{{ $value->id }}" {{ ($policy->vehicle_id == $value->id ? "selected":"") }}>{{ $value->vehicle_type }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Vehicle Configruation : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="vehicle_config" name="vehicle_config" class="form-control  " value="{{ $policy->vehicle_config }}" placeholder="Enter Vehicle Configruation">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Insurance Type : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control   select" id="insurance_type" name="insurance_type">
                                                                <option value="">Select Vehicle Type</option>
                                                                <option value="1" {{ ($policy->insurance_type == "1" ? "selected":"") }}>1st Party</option>
                                                                <option value="2" {{ ($policy->insurance_type == "2" ? "selected":"") }}>2nd Party</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Select Company Policy : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control   select" id="company_id" name="insurance_company_id">
                                                                <option value="">Select Vehicle Type</option>
                                                                @foreach ($insuranceCompany as $value )
                                                                <option value="{{ $value->id }}" {{ ($policy->company_id == $value->id ? "selected":"") }}>{{ $value->company_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <h5 class="card-title text-primary mb-2">Commercial Details</h5>
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Main Price : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="retailer_main_price" name="main_price" class="form-control  " value="{{ $policy->main_price }}" placeholder="Enter Main Price">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Company Profit : <span class="text-danger">*</span></b></label>
                                                            <input type="text" readonly id="retailer_profit_amt" name="profit_amt" class="form-control  " value="{{ $policy->profit_amt }}" placeholder="Enter Company Profit">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>TDS Deduction (%) : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="retailer_tds_deduction" name="tds_deduction" class="form-control  " value="{{ $policy->tds_deduction }}" placeholder="Enter TDS Deduction (10%)">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Profit After TDS : <span class="text-danger">*</span></b></label>
                                                            <input type="text" readonly id="retailer_actual_profit_amt" name="actual_profit" class="form-control  " value="{{ $policy->actual_profit }}" placeholder="Enter Profit After TDS">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Retailer Discount (%) : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="retailer_commission_percentage" name="commission_percentage" class="form-control  " value="{{ $policy->commission_percentage }}" placeholder="Enter Retailer Discount (%)">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Retailer Discount Amount (in RS) : <span class="text-danger">*</span></b></label>
                                                            <input type="text" readonly id="retailer_commission_rupees" name="commission_rupees" class="form-control  " value="{{ $policy->commission_rupees }}" placeholder="Enter Retailer Discount Amount (in RS)">

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Payable Amount : <span class="text-danger">*</span></b></label>
                                                            <input type="text" id="retailer_payable_amount" name="payable_amount" class="form-control  " value="{{ $policy->payable_amount }}" placeholder="Enter Payable Amount">

                                                        </div>
                                                    </div>

                                                    <h5 class="card-title text-primary mb-2">Policy Period</h5>
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>From Date : <span class="text-danger">*</span></b></label>
                                                            <div class="cal-icon cal-icon-info">
                                                                 <input type="text" id="from_dt" name="from_dt" class="form-control   datetimepicker" value="{{ $policy->from_dt }}" placeholder="Enter From Date">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>To Date : <span class="text-danger">*</span></b></label>
                                                            <div class="cal-icon cal-icon-info">
                                                                  <input type="text" id="to_date" name="to_date" class="form-control   datetimepicker " value="{{ $policy->to_date }}" placeholder="Enter To Date">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Issue Date : <span class="text-danger">*</span></b></label>
                                                            <div class="cal-icon cal-icon-info">
                                                                <input type="text" id="retailer_issue_dt" name="issue_dt" class="form-control   datetimepicker " value="{{ $policy->issue_dt }}" placeholder="Enter Issue Date">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h5 class="card-title text-primary mb-2">Payment Details</h5>
                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Payment By : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control   select" id="payment_by" name="payment_by">
                                                                <option value="">Select Payment By</option>
                                                                <option value="1" {{ ($policy->payment_by == "1" ? "selected":"") }}>Company</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Payment Through : <span class="text-danger">*</span></b></label>
                                                            <select class="form-control   select" id="payment_through" name="payment_through">
                                                                <option value="">Select Payment Through</option>
                                                                <option value="1" {{ ($policy->payment_through == "1" ? "selected":"") }}>Online</option>
                                                                <option value="2" {{ ($policy->payment_through == "2" ? "selected":"") }}>Float</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                        <div class="input-block mb-3">
                                                            <label><b>Upload Policy : </b></label>
                                                            <input type="file" onchange="retailerPreviewFile()" id="retailer_policy_doc" name="policy_doc" class="form-control  " value="{{ old('policy_doc') }}" accept=".pdf, .png, .jpg, .jpeg">
                                                            <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                                                            <br>
                                                            <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .</b></small>
                                                            <br>
                                                        </div>

                                                        <div id="retailer-preview-container">
                                                            <div id="retailer-file-preview"></div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            @if(!empty($policy->policy_doc))
                                                                <a href="{{url('/')}}/company_policy/policy_doc/{{ $policy->logo_doc }}" target="_blank" class="btn btn-primary btn-sm">
                                                                    <b> View Document</b>
                                                                </a>
                                                            @endif
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

{{-- Agent Commission In Percentage fetch by agent_commission_percentage --}}
<script>
    $(document).ready(function(){
        $(document).on('change','#agent_id', function() {
            let agent_id = $(this).val();
            $('#agent_commission_percentage').show();
            $.ajax({
                method: 'post',
                url: "{{ route('agent_commission_percentage') }}",
                data: {
                    agentId: agent_id,
                    _token : '{{ csrf_token() }}'
                },
                success: function(data) {
                    // === aler the data percentage amt
                    $('#agent_commission_percentage').val(data.agentCommissionPercentage);

                }
            })
        });
    });
</script>

{{-- Agent Commercial Caluation --}}
<script>
    $(document).ready(function () {
        $('#agent_main_price,#agent_profit_amt').on('keyup', function () {
            agent_main_price = $('#agent_main_price').val();

            if (agent_main_price != '' && agent_profit_amt != '') {
                // === Agent Main Price dived by half 2
                var agent_main_price_div_by_half = agent_main_price / 2;
                agent_profit_amt = $('#agent_profit_amt').val(agent_main_price_div_by_half);
            }
        });

        $('#agent_tds_deduction, #agent_profit_amt').on('keyup', function () {
            agent_profit_amt = $('#agent_profit_amt').val();
            agent_tds_deduction = $('#agent_tds_deduction').val();

            if (agent_profit_amt != '' && agent_tds_deduction != '') {
                // === Agent Profit Amount minus TDS deduction in percentage
                var agent_profit_amt = $('#agent_profit_amt').val();
                var agent_tds_deduction = $('#agent_tds_deduction').val();
                var agent_profit_amt_minus_tds = agent_profit_amt - (agent_tds_deduction / 100);
                $('#agent_actual_profit_amt').val(agent_profit_amt_minus_tds);

                // === Agent Profit Amount minus TDS deduction in percentage
                var agent_actual_profit_amt = $('#agent_actual_profit_amt').val();
                var agent_commission_percentage = $('#agent_commission_percentage').val();
                var agent_comission_rupees_minus_with_commissionInDiscount = agent_actual_profit_amt * (agent_commission_percentage / 100);
                $('#agent_comission_rupees').val(agent_comission_rupees_minus_with_commissionInDiscount);
            }
        });
    });
</script>

{{-- Retailer Commercial Caluation --}}
<script>
    $(document).ready(function () {
        $('#retailer_main_price,#retailer_profit_amt').on('keyup', function () {
            retailer_main_price = $('#retailer_main_price').val();

            if (retailer_main_price != '' && retailer_profit_amt != '') {
                // === Retailer Main Price dived by half 2
                var retailer_main_price_div_by_half = retailer_main_price / 2;
                retailer_profit_amt = $('#retailer_profit_amt').val(retailer_main_price_div_by_half);
            }
        });

        $('#retailer_tds_deduction, #retailer_profit_amt').on('keyup', function () {
            retailer_profit_amt = $('#retailer_profit_amt').val();
            retailer_tds_deduction = $('#retailer_tds_deduction').val();

            if (retailer_profit_amt != '' && retailer_tds_deduction != '') {
                // === Retailer Profit Amount minus TDS deduction in percentage
                var retailer_profit_amt = $('#retailer_profit_amt').val();
                var retailer_tds_deduction = $('#retailer_tds_deduction').val();
                var retailer_profit_amt_minus_tds = retailer_profit_amt - (retailer_tds_deduction / 100);
                $('#retailer_actual_profit_amt').val(retailer_profit_amt_minus_tds);

            }
        });

        $('#retailer_commission_percentage, #retailer_actual_profit_amt').on('keyup', function () {
            retailer_commission_percentage = $('#retailer_commission_percentage').val();
            if (retailer_commission_percentage != '' && retailer_actual_profit_amt != '') {
                // === Retailer Profit Amount minus TDS deduction in percentage
                var retailer_actual_profit_amt = $('#retailer_actual_profit_amt').val();
                var retailer_commission_percentage = $('#retailer_commission_percentage').val();
                var retailer_commission_rupees_minus_with_commissionInDiscount = retailer_actual_profit_amt * (retailer_commission_percentage / 100);
                $('#retailer_commission_rupees').val(retailer_commission_rupees_minus_with_commissionInDiscount);

                // === Calculate (retailer_main_price - retailer_commission_rupees)
                var retailer_main_price = $('#retailer_main_price').val();
                var retailer_commission_rupees = $('#retailer_commission_rupees').val();
                var retailer_main_price_minus_commission_rupees = retailer_main_price - retailer_commission_rupees;
                $('#retailer_payable_amount').val(retailer_main_price_minus_commission_rupees);
            }
        });
    });
</script>
@endpush