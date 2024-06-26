@extends('layouts.master')

@section('title')
Policy | Create
@endsection

@push('styles')
<style>
    .form-control {
        border: 1px solid #387dff !important;
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
        padding-right: 69px;
    }
    .css-equal-heights, .css-equal-content {
        display: flex;
        display: -webkit-flex;
        flex-wrap: nowrap;
        -webkit-flex-wrap: wrap;
        flex-direction: row;
        align-content: center;
        justify-content: space-between;
        align-items: self-start;
    }
    .border {
        border: var(--bs-border-width) var(--bs-border-style) #000000 !important;
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
                                        <div class="tab-pane fade active show border p-4" style="border-radius: 5px; border-color: 1px solid black;" id="v-pills-agent" role="tabpanel" aria-labelledby="v-pills-agent-tab">
                                            <form method="POST" action="{{ route('policy.store') }}" enctype="multipart/form-data">
                                                @csrf

                                                <input type="hidden" name="policy_type" id="policy_type" value="1" >

                                                <div class="row">
                                                    <h5 class="card-title text-primary mb-2">Agent Details</h5>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Select Agent : <span class="text-danger">*</span></b></label>
                                                                <select  class="form-control @error('agent_id') is-invalid @enderror select" id="agent_id" name="agent_id">
                                                                    <option value="">Select Agent</option>
                                                                    @foreach ($agents as $value )
                                                                    <option value="{{ $value->id }}" {{ (old("agent_id") == $value->id ? "selected":"") }}>{{ $value->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('agent_id')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Customer Name : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="customer_name" name="customer_name"  class="form-control @error('customer_name') is-invalid @enderror" value="{{ old('customer_name') }}" placeholder="Enter Customer Name">
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
                                                                <input type="text" onkeypress="allowAlphaNumericSpace(event)" id="vehicle_reg_no" name="vehicle_reg_no"  class="form-control @error('vehicle_reg_no') is-invalid @enderror" value="{{ old('vehicle_reg_no') }}" placeholder="Enter Vehicle Registration Number">
                                                                @error('vehicle_reg_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Select Company Name : <span class="text-danger">*</span></b></label>
                                                                <select  class="form-control select @error('insurance_company_id') is-invalid @enderror" id="agent_insurance_company_id" name="insurance_company_id">
                                                                    <option value="">Select Company Namee</option>

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
                                                                <select  class="form-control select @error('agent_company_id') is-invalid @enderror" id="agent_company_id" name="agent_company_id">
                                                                    <option value="">Select Company ID</option>

                                                                </select>
                                                                @error('agent_company_id')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Select RTO : <span class="text-danger">*</span></b></label>
                                                                <select  class="form-control select @error('r_t_o_id') is-invalid @enderror" id="agent_rto_id" name="r_t_o_id">
                                                                    <option value="">Select RTO</option>

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
                                                                <input type="text" hidden id="agent_vehicle_type" name="agent_vehicle_type"  class="form-control" value="{{ old('agent_vehicle_type') }}">
                                                                <select  class="form-control select @error('vehicle_id') is-invalid @enderror" id="agent_vehicle_id" name="vehicle_id">
                                                                    <option value="">Select Vehicle Type</option>

                                                                </select>
                                                                @error('vehicle_id')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Vehicle Configuration : </b></label>
                                                                <input type="text" id="vehicle_config" name="vehicle_config"  class="form-control @error('vehicle_config') is-invalid @enderror" value="{{ old('vehicle_config') }}" placeholder="Enter Vehicle Configuration">
                                                                @error('vehicle_config')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Insurance Type : <span class="text-danger">*</span></b></label>
                                                                <select  class="form-control select @error('insurance_type') is-invalid @enderror" id="agent_insurance_type" name="insurance_type">
                                                                    <option value="">Select Insurance Type</option>
                                                                    <option value="1" {{ (old("insurance_type") == "1" ? "selected":"") }}>1st Party (Comprehensive)</option>
                                                                    <option value="2" {{ (old("insurance_type") == "2" ? "selected":"") }}>3rd Party(Liability)</option>
                                                                    <option value="3" {{ (old("insurance_type") == "3" ? "selected":"") }}>OD Only</option>
                                                                </select>
                                                                @error('insurance_type')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                    </div>

                                                    <h5 class="card-title text-primary mb-2">Commercial Details</h5>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>NET Premium : <span class="text-danger">*</span></b></label>
                                                                <input type="text"  id="agent_net_premimum" name="agent_net_premimum"  class="form-control @error('agent_net_premimum') is-invalid @enderror" value="{{ old('agent_net_premimum') }}" placeholder="Enter NET Premium">
                                                                @error('agent_net_premimum')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>OD Premium : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="agent_main_price" name="main_price"  class="form-control @error('main_price') is-invalid @enderror" value="{{ old('main_price') }}" placeholder="Enter OD Premium">
                                                                @error('main_price')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>TP Premium : <span class="text-danger">*</span></b></label>
                                                                <input type="text" readonly id="agent_tp_premimum" name="agent_tp_premimum"  class="form-control @error('agent_tp_premimum') is-invalid @enderror" value="{{ old('agent_tp_premimum') }}" placeholder="Enter TP Premium">
                                                                @error('agent_tp_premimum')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Gross : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="agent_gross" name="agent_gross"  class="form-control @error('agent_gross') is-invalid @enderror" value="{{ old('agent_gross') }}" placeholder="Enter Gross">
                                                                @error('agent_gross')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>GST : <span class="text-danger">*</span></b></label>
                                                                <input type="text" readonly id="agent_gst" name="agent_gst"  class="form-control @error('agent_gst') is-invalid @enderror" value="{{ old('agent_gst') }}" placeholder="Enter GST">
                                                                @error('agent_gst')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Company Commission (%) : </b></label>
                                                                <input type="hidden" id="agent_company_commission_type" name="agent_company_commission_type"  class="form-control" value="{{ old('agent_company_commission_type') }}">
                                                                <input type="text" id="company_commission_percentage" readonly name="company_commission_percentage" class="form-control" value="{{ old('company_commission_percentage') }}" placeholder="Enter Company Profit (%)">

                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Company Commission (Fixed): </b></label>
                                                                <input type="text" id="agent_company_comission_rupees" readonly name="agent_company_comission_rupees" class="form-control" value="{{ old('agent_company_comission_rupees') }}" placeholder="Enter Company Commission (Fixed)">

                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Company Commission Amount (Rs): <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="agent_profit_amt" readonly name="profit_amt" class="form-control @error('profit_amt') is-invalid @enderror" value="{{ old('profit_amt') }}" placeholder="Enter Company Commission Amount (Rs)">
                                                                @error('profit_amt')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>TDS Deduction (%) : <span class="text-danger">*</span></b></label>
                                                                <input type="text" readonly id="agent_tds_deduction" name="tds_deduction"  class="form-control @error('tds_deduction') is-invalid @enderror" value="{{ old('tds_deduction') }}" placeholder="Enter TDS Deduction (10%)">
                                                                @error('tds_deduction')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Agent Commission (%) : </b></label>
                                                                <input type="hidden" id="agent_commission_type" name="agent_commission_type"  class="form-control" value="{{ old('agent_commission_type') }}" >
                                                                <input type="text" readonly id="agent_commission_percentage" name="commission_percentage"  class="form-control @error('commission_percentage') is-invalid @enderror" value="{{ old('commission_percentage') }}" placeholder="Enter Agent Commission (%)">
                                                                @error('commission_percentage')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Agent Commission (Fixed) : </b></label>
                                                                <input type="text" readonly id="agent_comission_rupees" name="agent_comission_rupees"  class="form-control @error('agent_comission_rupees') is-invalid @enderror" value="{{ old('comission_rupees') }}" placeholder="Enter Agent Commission (Rs)">
                                                                @error('agent_comission_rupees')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Actual Agent Commission (Rs) : <span class="text-danger">*</span></b></label>
                                                                <input type="text" readonly id="agent_actual_commission_amt" name="agent_actual_comission"  class="form-control @error('agent_actual_comission') is-invalid @enderror" value="{{ old('agent_actual_comission') }}" placeholder="Enter Agent Commission (Rs)">
                                                                @error('agent_actual_comission')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Actual Profit (Rs): <span class="text-danger">*</span></b></label>
                                                                <input type="text" readonly id="agent_actual_profit_amt" name="actual_profit_amt"  class="form-control @error('actual_profit_amt') is-invalid @enderror" value="{{ old('actual_profit_amt') }}" placeholder="Enter Actual Profit (Rs)">
                                                                @error('actual_profit_amt')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h5 class="card-title text-primary mb-2">Policy Period</h5>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Start Date : <span class="text-danger">*</span></b></label>
                                                                <input type="date" id="agent_from_dt" name="from_dt"  class="form-control last:@error('from_dt') is-invalid @enderror" value="{{ old('from_dt') }}" placeholder="Enter Start Date">
                                                                @error('from_dt')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>End Date : <span class="text-danger">*</span></b></label>
                                                                <input type="text" readonly id="agent_to_dt" name="to_dt"  class="form-control @error('to_dt') is-invalid @enderror" value="{{ old('to_dt') }}" placeholder="Enter End Date">
                                                                @error('to_dt')
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
                                                                    <input type="text" id="agent_issue_dt" name="issue_dt"  class="form-control datetimepicker @error('issue_dt') is-invalid @enderror" value="{{ old('issue_dt') }}" placeholder="Enter Issue Date">
                                                                    @error('issue_dt')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h5 class="card-title text-primary mb-2">Payment Details</h5>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Payment By : <span class="text-danger">*</span></b></label>
                                                                <select  class="form-control select @error('payment_by') is-invalid @enderror" id="agent_payment_by" name="payment_by">
                                                                    <option value="">Select Payment By</option>
                                                                    <option value="1" {{ (old("payment_by") == "1" ? "selected":"") }}>Agent</option>
                                                                    <option value="2" {{ (old("payment_by") == "2" ? "selected":"") }}>Company</option>
                                                                </select>
                                                                @error('payment_by')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Payment Through : <span class="text-danger">*</span></b></label>
                                                                <select  class="form-control select @error('payment_through') is-invalid @enderror" id="agent_payment_through" name="payment_through">
                                                                    <option value="">Select Payment Through</option>
                                                                    <option value="1" {{ (old("payment_through") == "1" ? "selected":"") }}>Online</option>
                                                                    <option value="2" {{ (old("payment_through") == "2" ? "selected":"") }}>Float</option>
                                                                </select>
                                                                @error('payment_through')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3 ">
                                                                <label><b>Upload Policy : </b></label>
                                                                <input type="file" onchange="agentPreviewFile()" id="agent_policy_doc" name="policy_doc"  class="form-control @error('policy_doc') is-invalid @enderror" value="{{ old('policy_doc') }}" accept=".pdf, .png, .jpg, .jpeg">
                                                                <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                                                                <br>
                                                                <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .</b></small>
                                                                @error('policy_doc')
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

                                                </div>

                                                <div class="add-customer-btns text-start">
                                                    <a href="{{ route('policy.index') }}" class="btn btn-danger">Cancel</a>
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade  border p-4" style="border-radius: 5px;" id="v-pills-retailer" role="tabpanel" aria-labelledby="v-pills-retailer-tab">
                                            <form method="POST" action="{{ route('policy.store') }}" enctype="multipart/form-data">
                                                @csrf

                                                <input type="hidden" name="policy_type" id="policy_type" value="2" selected>

                                                <div class="row">
                                                    <h5 class="card-title text-primary mb-2">Retailer Details</h5>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Retailer Name : <span class="text-danger">*</span></b></label>
                                                                <ul class="form-group-plus css-equal-heights">
                                                                    <li>
                                                                        <select style="width: 314px !important;" class="form-control select @error('retailer_id') is-invalid @enderror" id="retailer_id" name="retailer_id">
                                                                            <option value="">Select Retailer Name</option>
                                                                            @foreach ($retailerUser as $value )
                                                                            <option value="{{ $value->id }}" {{ (old("retailer_id") == $value->id ? "selected":"") }}>{{ $value->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('retailer_id')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </li>

                                                                    <li>
                                                                        <a href="{{ route('retailer.create') }}" class="btn btn-primary form-plus-btn">
                                                                            <i class="fa fa-plus-circle me-2" aria-hidden="true"></i> Add
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Customer Name : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="retailer_customer_name" name="retailer_customer_name"  class="form-control @error('retailer_customer_name') is-invalid @enderror" value="{{ old('retailer_customer_name') }}" placeholder="Enter Customer Name">
                                                                @error('retailer_customer_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Vehicle Registration Number : <span class="text-danger">*</span></b></label>
                                                                <input type="text" onkeypress="allowAlphaNumericSpace(event)" id="retailer_vehicle_reg_no" name="retailer_vehicle_reg_no"  class="form-control @error('retailer_vehicle_reg_no') is-invalid @enderror" value="{{ old('retailer_vehicle_reg_no') }}" placeholder="Enter Vehicle Registration Number">
                                                                @error('retailer_vehicle_reg_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Select RTO : <span class="text-danger">*</span></b></label>
                                                                <select  class="form select @error('retailer_r_t_o_id') is-invalid @enderror" id="retailer_r_t_o_id" name="retailer_r_t_o_id">
                                                                    <option value="">Select RTO</option>
                                                                    @foreach ($Rto as $value )
                                                                    <option value="{{ $value->id }}" {{ (old("retailer_r_t_o_id") == $value->id ? "selected":"") }}>{{ $value->city }} - {{ $value->pincode }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('retailer_r_t_o_id')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Select Vehicle Type : <span class="text-danger">*</span></b></label>
                                                                <select  class="form select @error('retailer_vehicle_id') is-invalid @enderror" id="retailer_vehicle_id" name="retailer_vehicle_id">
                                                                    <option value="">Select Vehicle Type</option>
                                                                    @foreach ($vehicles as $value )
                                                                    <option value="{{ $value->id }}" {{ (old("retailer_vehicle_id") == $value->id ? "selected":"") }}>{{ $value->vehicle_type }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('retailer_vehicle_id')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Vehicle Configuration : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="retailer_vehicle_config" name="retailer_vehicle_config"  class="form-control @error('retailer_vehicle_config') is-invalid @enderror" value="{{ old('retailer_vehicle_config') }}" placeholder="Enter Vehicle Configuration">
                                                                @error('retailer_vehicle_config')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Insurance Type : <span class="text-danger">*</span></b></label>
                                                                <select  class="form select @error('retailer_insurance_type') is-invalid @enderror" id="retailer_insurance_type" name="retailer_insurance_type">
                                                                    <option value="">Select Vehicle Type</option>
                                                                    <option value="1" {{ (old("insurance_type") == "1" ? "selected":"") }}>1st Party (Comprehensive)</option>
                                                                    <option value="2" {{ (old("insurance_type") == "2" ? "selected":"") }}>3rd Party(Liability)</option>
                                                                    <option value="3" {{ (old("insurance_type") == "3" ? "selected":"") }}>OD Only</option>
                                                                </select>
                                                                @error('retailer_insurance_type')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Select Company Policy : <span class="text-danger">*</span></b></label>
                                                                <select  class="form select @error('retailer_insurance_company_id') is-invalid @enderror" id="retailer_company_id" name="retailer_insurance_company_id">
                                                                    <option value="">Select Vehicle Type</option>
                                                                    @foreach ($insuranceCompany as $value )
                                                                    <option value="{{ $value->id }}" {{ (old("retailer_insurance_company_id") == $value->id ? "selected":"") }}>{{ $value->company_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('retailer_insurance_company_id')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h5 class="card-title text-primary mb-2">Commercial Details</h5>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Main Price : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="retailer_main_price" name="retailer_main_price"  class="form-control @error('retailer_main_price') is-invalid @enderror" value="{{ old('retailer_main_price') }}" placeholder="Enter Main Price">
                                                                @error('retailer_main_price')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Company Commission (%) : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="retailer_company_commission_percentage" readonly name="retailer_company_commission_percentage" readonly class="form-control @error('retailer_company_commission_percentage') is-invalid @enderror" value="{{ old('retailer_company_commission_percentage') }}" placeholder="Enter Company Profit (%)">
                                                                @error('retailer_company_commission_percentage')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Company Profit : <span class="text-danger">*</span></b></label>
                                                                <input type="text" readonly id="retailer_profit_amt" name="retailer_profit_amt"  class="form-control @error('retailer_profit_amt') is-invalid @enderror" value="{{ old('retailer_profit_amt') }}" placeholder="Enter Company Profit">
                                                                @error('retailer_profit_amt')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>TDS Deduction (%) : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="retailer_tds_deduction" name="retailer_tds_deduction"  class="form-control @error('retailer_tds_deduction') is-invalid @enderror" value="{{ old('retailer_tds_deduction') }}" placeholder="Enter TDS Deduction (10%)">
                                                                @error('retailer_tds_deduction')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Profit After TDS : <span class="text-danger">*</span></b></label>
                                                                <input type="text" readonly id="retailer_actual_profit_amt" name="retailer_actual_profit_amt"  class="form-control @error('retailer_actual_profit_amt') is-invalid @enderror" value="{{ old('retailer_actual_profit_amt') }}" placeholder="Enter Profit After TDS">
                                                                @error('retailer_actual_profit_amt')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Retailer Discount (%) : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="retailer_commission_percentage" name="retailer_commission_percentage"  class="form-control @error('retailer_commission_percentage') is-invalid @enderror" value="{{ old('retailer_commission_percentage') }}" placeholder="Enter Retailer Discount (%)">
                                                                @error('retailer_commission_percentage')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Retailer Discount Amount (in RS) : <span class="text-danger">*</span></b></label>
                                                                <input type="text" readonly id="retailer_commission_rupees" name="retailer_comission_rupees"  class="form-control @error('retailer_comission_rupees') is-invalid @enderror" value="{{ old('retailer_comission_rupees') }}" placeholder="Enter Retailer Discount Amount (in RS)">
                                                                @error('retailer_comission_rupees')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Payable Amount : <span class="text-danger">*</span></b></label>
                                                                <input type="text" id="retailer_payable_amount" name="retailer_payable_amount"  class="form-control @error('retailer_payable_amount') is-invalid @enderror" value="{{ old('retailer_payable_amount') }}" placeholder="Enter Payable Amount">
                                                                @error('retailer_payable_amount')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h5 class="card-title text-primary mb-2">Policy Period</h5>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Start Date : <span class="text-danger">*</span></b></label>
                                                                <div class="cal-icon cal-icon-info">
                                                                     <input type="text" id="retailer_from_dt" name="retailer_from_dt"  class="form-control datetimepicker @error('retailer_from_dt') is-invalid @enderror" value="{{ old('retailer_from_dt') }}" placeholder="Enter Start Date">
                                                                     @error('retailer_from_dt')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>End Date : <span class="text-danger">*</span></b></label>
                                                                <div class="cal-icon cal-icon-info">
                                                                      <input type="text" id="retailer_to_dt" name="retailer_to_dt"  class="form-control datetimepicker @error('retailer_to_dt') is-invalid @enderror" value="{{ old('retailer_to_dt') }}" placeholder="Enter End Date">
                                                                      @error('retailer_to_dt')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Issue Date : <span class="text-danger">*</span></b></label>
                                                                <div class="cal-icon cal-icon-info">
                                                                    <input type="text" id="retailer_issue_dt" name="retailer_issue_dt"  class="form-control datetimepicker @error('retailer_issue_dt') is-invalid @enderror" value="{{ old('retailer_issue_dt') }}" placeholder="Enter Issue Date">
                                                                    @error('retailer_issue_dt')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h5 class="card-title text-primary mb-2">Payment Details</h5>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Payment By : <span class="text-danger">*</span></b></label>
                                                                <select  class="form-control select @error('retailer_payment_by') is-invalid @enderror" id="retailer_payment_by" name="retailer_payment_by">
                                                                    <option value="">Select Payment By</option>
                                                                    <option value="1" {{ (old("retailer_payment_by") == "1" ? "selected":"") }}>Company</option>
                                                                </select>
                                                                @error('retailer_payment_by')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Payment Through : <span class="text-danger">*</span></b></label>
                                                                <select  class="form-control select @error('retailer_payment_through') is-invalid @enderror" id="retailer_payment_through" name="retailer_payment_through">
                                                                    <option value="">Select Payment Through</option>
                                                                    <option value="1" {{ (old("retailer_payment_through") == "1" ? "selected":"") }}>Online</option>
                                                                    <option value="2" {{ (old("retailer_payment_through") == "2" ? "selected":"") }}>Float</option>
                                                                </select>
                                                                @error('retailer_payment_through')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <div class="input-block mb-3">
                                                                <label><b>Upload Policy : </b></label>
                                                                <input type="file" onchange="retailerPreviewFile()" id="retailer_policy_doc" name="retailer_policy_doc"  class="form-control @error('retailer_policy_doc') is-invalid @enderror" value="{{ old('retailer_policy_doc') }}" accept=".pdf, .png, .jpg, .jpeg">
                                                                <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                                                                <br>
                                                                <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .</b></small>
                                                                <br>
                                                                @error('retailer_policy_doc')
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
                                                </div>

                                                <div class="add-customer-btns text-start">
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
    function allowAlphaNumericSpace(e) {
            var code = ('charCode' in e) ? e.charCode : e.keyCode;

            if (!(code == 32) && // space
            !(code > 47 && code < 58) && // numeric (0-9)
            !(code > 64 && code < 91) && // upper alpha (A-Z)
            !(code > 96 && code < 123)) { // lower alpha (a-z)
            e.preventDefault();
        }
    }
</script>

{{-- Current Date javascript for agent_issued_dt  --}}
<script>
    $(document).ready(function(){
        $("#agent_issue_dt").datetimepicker({
        });
        var myDate = new Date();
        var month = myDate.getMonth() + 1;
        var prettyDate = myDate.getDate() + '-' + month + '-' + myDate.getFullYear();
        $("#agent_issue_dt").val(prettyDate);
    });
</script>

{{-- Calculate Finicial Year --}}
<script>
    $(document).ready(function() {
        $('#agent_from_dt').change(function() {
            var agentFromDate = $(this).val();
            $('#agent_to_dt').val('');
            $.ajax({
                url: "{{ route('calculate_financial_year') }}",
                method: 'POST',
                data: {
                    agent_from_dt: agentFromDate,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(data) {
                    $('#agent_to_dt').val(data.financialYear);
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });
    });
</script>

{{-- Current Date javascript for retailer_issued_dt  --}}
<script>
    $(document).ready(function(){
        $("#retailer_issue_dt").datetimepicker({
        });
        var myDate = new Date();
        var month = myDate.getMonth() + 1;
        var prettyDate1 = myDate.getDate() + '-' + month + '-' + myDate.getFullYear();
        $("#retailer_issue_dt").val(prettyDate1);
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

{{-- Fetch by Retailer Commission --}}
<script>
    $(document).ready(function(){
        $(document).on('change','#retailer_id', function() {
            let retailer_id = $(this).val();
            $('#retailer_commission_percentage').show();
            $.ajax({
                method: 'post',
                url: "{{ route('fetch_retailer_commission_percentage') }}",
                data: {
                    retailerId: retailer_id,
                    _token : '{{ csrf_token() }}'
                },
                success: function(data) {
                    // === aler the data percentage amt
                    $('#retailer_commission_percentage').val(data.retailerCommissionPercentage);

                }
            })
        });
    });
</script>

{{-- Fetch by Agent Commission --}}
<script>
    $(document).ready(function(){
        // ==== pass multiple parameter in onChange
        $(document).on('change','#agent_vehicle_id', function() {
            let agent_vehicle_id = $(this).val();
            // get agent_id, agent_insurance_company_id, agent_company_id, agent_rto_id, agent_vehicle_id
            let agent_id = $('#agent_id').val();
            let agent_insurance_company_id = $('#agent_insurance_company_id').val();
            let agent_company_id = $('#agent_company_id').val();
            let agent_rto_id = $('#agent_rto_id').val();

            $('#agent_commission_percentage').show();
            $.ajax({
                method: 'post',
                url: "{{ route('agent_commission_percentage') }}",
                data: {
                    agentId: agent_id,
                    agentInsuranceCompanyId: agent_insurance_company_id,
                    agentCompanyId: agent_company_id,
                    agentRtoId: agent_rto_id,
                    agentVehicleId: agent_vehicle_id,
                    _token : '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data.comissionType == 1){
                        $('#agent_commission_type').val(data.comissionType);
                        $('#agent_commission_percentage').val(data.commissionPercentage);
                    } else if(data.comissionType == 2){
                        $('#agent_commission_type').val(data.comissionType);
                        $('#agent_comission_rupees').val(parseInt(data.commissionAmount));
                    } else {
                        $('#agent_commission_type').val('');
                        $('#agent_comission_rupees').val('');
                        $('#agent_commission_percentage').val('');
                    }
                }
            })
        });
    });
</script>

{{-- Fetch Company Name --}}
<script>
    $(document).ready(function(){
        $(document).on('change','#agent_id', function() {
            let agent_id = $(this).val();
            $('#agent_insurance_company_id').show();
            $.ajax({
                method: 'POST',
                url: "{{ route('fetch_insurance_company') }}",
                data: {
                    agentID: agent_id,
                    _token : '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (result) {
                    // display in  agent_insurance_company_id in select option
                    $('#agent_insurance_company_id').html('<option value="">Select Company Name</option>');
                    $.each(result.insuranceCompany, function (key, value) {
                        // === check value is selected or not
                        if (value.id == agent_id) {
                            $('#agent_insurance_company_id').append('<option value="' + value.insurance_company_id + '" >' + value.insurance_company.company_name + '</option>');
                        }
                        else {
                            $('#agent_insurance_company_id').append('<option value="' + value.insurance_company_id + '">' + value.insurance_company.company_name + '</option>');
                        }
                    });
                },
            });
        });
    });
</script>

{{-- Fetch Company ID --}}
<script>
    $(document).ready(function(){
        $(document).on('change','#agent_insurance_company_id', function() {
            let agent_insurance_company_id = $(this).val();
            $('#agent_company_id').show();
            $.ajax({
                method: 'POST',
                url: "{{ route('fetch_insurance_company_id') }}",
                data: {
                    insuranceCompanyID: agent_insurance_company_id,
                    _token : '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (result) {
                    // display in  agent_company_id in select option
                    $('#agent_company_id').html('<option value="">Select Company ID</option>');
                    $.each(result.insuranceCompanyID, function (key, value) {
                        // === check value is selected or not
                        if (value.company_id_id == agent_insurance_company_id) {
                            $('#agent_company_id').append('<option value="' + value.company_id_id + '" >' + value.company_ids.company_id + '</option>');
                        }
                        else {
                            $('#agent_company_id').append('<option value="' + value.company_id_id + '">' + value.company_ids.company_id + '</option>');
                        }
                    });
                },
            });
        });
    });
</script>

{{-- Fetch TDS --}}
<script>
    $(document).ready(function(){
        $(document).on('change','#agent_company_id', function() {
            let agent_company_id = $(this).val();
            $('#agent_tds_deduction').show();
            $.ajax({
                method: 'POST',
                url: "{{ route('fetch_company_tds') }}",
                data: {
                    agentCompanyID: agent_company_id,
                    _token : '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (data) {
                    // display in  agent_tds_deduction in input fied after companyTds
                    $('#agent_tds_deduction').val(data.companyTds);
                },
            });
        });
    });
</script>

{{-- Fetch RTO --}}
<script>
    $(document).ready(function(){
        $(document).on('change','#agent_company_id', function() {
            let agent_company_id = $(this).val();
            $('#agent_rto_id').show();
            $.ajax({
                method: 'POST',
                url: "{{ route('fetch_rto_name') }}",
                data: {
                    agentCompanyIDs: agent_company_id,
                    _token : '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (result) {

                    $('#agent_rto_id').html('<option value="">Select RTO</option>');
                    $.each(result.rtoData, function (key, value) {
                        // === check value is selected or not
                        if (value.id == agent_company_id) {
                            $('#agent_rto_id').append('<option value="' + value.r_t_o_id + '" >' + value.rto.pincode + ' - ' + value.rto.state + '</option>');
                        }
                        else {
                            $('#agent_rto_id').append('<option value="' + value.r_t_o_id + '">' + value.rto.pincode + ' - ' + value.rto.state + '</option>');
                        }
                    });
                },
            });
        });
    });
</script>

{{-- Fetch Vehicle --}}
<script>
    $(document).ready(function(){
        $(document).on('change','#agent_rto_id', function() {
            let agent_rto_id = $(this).val();
            $('#agent_vehicle_id').show();
            $.ajax({
                method: 'POST',
                url: "{{ route('fetch_vehicle_type') }}",
                data: {
                    agentRtoID: agent_rto_id,
                    _token : '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (result) {
                    // display in  agent_vehicle_id in select option
                    $('#agent_vehicle_id').html('<option value="">Select Vehicle Type</option>');
                    $.each(result.vehicleType, function (key, value) {
                        // === check value is selected or not
                        if (value.id == agent_rto_id) {
                            $('#agent_vehicle_id').append('<option value="' + value.vehicle_id + '" selected>' + value.vehicle.vehicle_name + '</option>');
                        }
                        else {
                            $('#agent_vehicle_id').append('<option value="' + value.vehicle_id + '">' + value.vehicle.vehicle_name + '</option>');
                        }
                    });
                },
            });
        });
    });
</script>

{{-- Fetch Vehicle Type --}}
<script>
    $(document).ready(function(){
        $(document).on('change','#agent_vehicle_id', function() {
            let agent_vehicle_id = $(this).val();
            $('#agent_vehicle_type').show();
            $.ajax({
                method: 'POST',
                url: "{{ route('fetch_current_vehicle_type') }}",
                data: {
                    agentVehicleID: agent_vehicle_id,
                    _token : '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (result) {
                    // display in  agent_vehicle_type in input value field
                    $('#agent_vehicle_type').val(result.agentVehicleType);
                },
            });
        });
    });
</script>

{{-- Fetch Company Commission for Agent --}}
<script>
    $(document).ready(function(){
        $(document).on('change','#agent_vehicle_id', function() {
            let agent_vehicle_id = $(this).val();
            $('#company_commission_percentage').show();
            $.ajax({
                method: 'post',
                url: "{{ route('fetch_agent_profit_amt') }}",
                data: {
                    agentVehicleId: agent_vehicle_id,
                    _token : '{{ csrf_token() }}'
                },
                success: function(data) {
                    // === check data.companyComissionType == 01 in if condition
                    if(data.companyComissionType == 01) {
                        $('#agent_company_commission_type').val(data.companyComissionType);
                        $('#company_commission_percentage').val(data.companyCommissionPercentage);
                    } else if (data.companyComissionType == 02){
                        $('#agent_company_comission_rupees').val(parseInt(data.companyCommissionRupees));
                        $('#agent_company_commission_type').val(data.companyComissionType);
                    }else{
                        $('#agent_company_commission_type').val('');
                        $('#company_commission_percentage').val('');
                        $('#agent_company_comission_rupees').val('');
                    }
                }
            })
        });
    });
</script>

{{-- Fetch Company Commission for Retailer --}}
<script>
    $(document).ready(function(){
        $(document).on('change','#retailer_company_id', function() {
            let retailer_company_id = $(this).val();
            $('#retailer_company_commission_percentage').show();
            $.ajax({
                method: 'post',
                url: "{{ route('fetch_agent_profit_amt') }}",
                data: {
                    agentCompanyId: retailer_company_id,
                    _token : '{{ csrf_token() }}'
                },
                success: function(data) {
                    // === aler the data percentage amt
                    $('#retailer_company_commission_percentage').val(data.agentProfitAmount);

                }
            })
        });
    });
</script>

{{-- Agent Commercial Caluation --}}
<script>
    $(document).ready(function () {

        // Calculate Net Preimum
        $('#agent_main_price, #agent_net_premimum').on('keyup', function () {
            agent_main_price = $('#agent_main_price').val();
            agent_net_premimum = $('#agent_net_premimum').val();

            if (agent_main_price != '' && agent_net_premimum != '') {
                var agent_main_price = $('#agent_main_price').val();
                var agent_net_premimum = $('#agent_net_premimum').val();
                var total_net_premimum_amt = (parseInt(agent_net_premimum) - parseInt(agent_main_price));
                $('#agent_tp_premimum').val(total_net_premimum_amt);
            }
            else {
                $('#agent_tp_premimum').val('');
            }

        });

        // Calculate GST
        $('#agent_net_premimum, #agent_gross').on('keyup', function () {
            agent_net_premimum = $('#agent_net_premimum').val();
            agent_gross = $('#agent_gross').val();

            if (agent_net_premimum != '' && agent_gross != '') {
                var agent_net_premimum = $('#agent_net_premimum').val();
                var total_gst_amt = (parseInt(agent_gross) - parseInt(agent_net_premimum));
                $('#agent_gst').val(total_gst_amt);
            }
            else {
                $('#agent_gst').val('');
            }
        });

        // Calculate Company Commission
        $('#agent_company_commission_type, #company_commission_percentage, #agent_company_comission_rupees, #agent_main_price, #agent_vehicle_type, #agent_net_premimum').on('keyup', function () {

            // ==== get all values
            agent_company_commission_type = $('#agent_company_commission_type').val();
            company_commission_percentage = $('#company_commission_percentage').val();
            agent_company_comission_rupees = $('#agent_company_comission_rupees').val();
            agent_main_price = $('#agent_main_price').val();
            agent_net_premimum = $('#agent_net_premimum').val();


            // ==== check agent_company_commission_type
            if ($('#agent_vehicle_type').val() == '1') {
                if (agent_company_commission_type == 1) {
                    if (agent_main_price != '' && company_commission_percentage != '') {
                        var company_commission_percentage = $('#company_commission_percentage').val();
                        var agent_main_price = $('#agent_main_price').val();
                        var totalCompanyCommissionAmt = (parseInt(company_commission_percentage) / 100) * parseInt(agent_main_price);

                        $('#agent_profit_amt').val(parseFloat(totalCompanyCommissionAmt.toFixed(4)));
                    } else {
                        $('#agent_profit_amt').val('');
                    }
                } else if (agent_company_commission_type == 2) {
                    if (agent_company_comission_rupees != '' && company_commission_percentage != '') {

                        var agent_company_comission_rupees = $('#agent_company_comission_rupees').val();
                        var agent_main_price = $('#agent_main_price').val();
                        var totalCompanyCommissionRupees = (parseInt(agent_main_price) - parseInt(agent_company_comission_rupees));
                        $('#agent_profit_amt').val(totalCompanyCommissionRupees);
                    } else {
                        $('#agent_profit_amt').val('');
                    }
                }
            } else if ($('#agent_vehicle_type').val() == '2') {
                if (agent_company_commission_type == 1) {
                    if (agent_net_premimum != '' && company_commission_percentage != '') {
                        var company_commission_percentage = $('#company_commission_percentage').val();
                        var agent_net_premimum = $('#agent_net_premimum').val();
                        var totalCompanyCommissionAmt = (parseInt(company_commission_percentage) / 100) * parseInt(agent_net_premimum);
                        $('#agent_profit_amt').val(parseFloat(totalCompanyCommissionAmt.toFixed(4)));
                    } else {
                        $('#agent_profit_amt').val('');
                    }
                } else if (agent_company_commission_type == 2) {
                    if (agent_company_comission_rupees != '' && agent_net_premimum != '') {

                        var agent_company_comission_rupees = $('#agent_company_comission_rupees').val();
                        var agent_net_premimum = $('#agent_net_premimum').val();
                        var totalCompanyCommissionRupees = (parseInt(agent_net_premimum) - parseInt(agent_company_comission_rupees));
                        $('#agent_profit_amt').val(totalCompanyCommissionRupees);
                    } else {
                        $('#agent_profit_amt').val('');
                    }
                }
            }

        });

        // Calculate Agent Commission
        $('#agent_commission_type, #agent_comission_rupees, #agent_commission_percentage, #agent_main_price, #agent_vehicle_type, #agent_net_premimum').on('keyup', function () {

            agent_commission_type = $('#agent_commission_type').val();
            agent_commission_percentage = $('#agent_commission_percentage').val();
            agent_comission_rupees = $('#agent_comission_rupees').val();
            agent_main_price = $('#agent_main_price').val();
            agent_net_premimum = $('#agent_net_premimum').val();

            // ==== check agent_vehicle_type
            if ($('#agent_vehicle_type').val() == '1') {
                if (agent_commission_type == 1) {
                    if (agent_commission_percentage != '' && agent_main_price != '') {
                        var agent_commission_percentage = $('#agent_commission_percentage').val();
                        var agent_main_price = $('#agent_main_price').val();
                        var total_commission_amt = ((agent_commission_percentage) / 100) * (agent_main_price);
                        $('#agent_actual_commission_amt').val(parseFloat(total_commission_amt.toFixed(4)));
                    } else {
                        $('#agent_actual_commission_amt').val('');
                    }
                } else if (agent_commission_type == 2) {
                    if (agent_comission_rupees != '' && agent_main_price != '') {
                        var agent_comission_rupees = $('#agent_comission_rupees').val();
                        var agent_main_price = $('#agent_main_price').val();
                        var total_commission_amt = ((agent_main_price) - (agent_comission_rupees));
                        $('#agent_actual_commission_amt').val(agent_comission_rupees);
                    } else {
                        $('#agent_actual_commission_amt').val('');
                    }
                }
            } else if ($('#agent_vehicle_type').val() == '2') {
                if (agent_commission_type == 1) {
                    if (agent_commission_percentage != '' && agent_net_premimum != '') {
                        var agent_commission_percentage = $('#agent_commission_percentage').val();
                        var agent_net_premimum = $('#agent_net_premimum').val();
                        var total_commission_amt = ((agent_commission_percentage) / 100) * (agent_net_premimum);
                        $('#agent_actual_commission_amt').val(parseFloat(total_commission_amt.toFixed(4)));
                    } else {
                        $('#agent_actual_commission_amt').val('');
                    }
                } else if (agent_commission_type == 2) {
                    if (agent_comission_rupees != '' && agent_net_premimum != '') {
                        var agent_comission_rupees = $('#agent_comission_rupees').val();
                        var agent_net_premimum = $('#agent_net_premimum').val();
                        var total_commission_amt = ( (agent_net_premimum) - (agent_comission_rupees));
                        $('#agent_actual_commission_amt').val(agent_comission_rupees);
                    } else {
                        $('#agent_actual_commission_amt').val('');
                    }
                }
            }

        });

        // Calculate Company Profit
        $('#agent_profit_amt, #agent_company_comission_rupees, #agent_main_price, #agent_tds_deduction, #agent_actual_commission_amt, #agent_vehicle_type, #agent_company_commission_type').on('keyup', function () {

            agent_profit_amt = $('#agent_profit_amt').val();
            agent_tds_deduction = $('#agent_tds_deduction').val();
            agent_company_commission_type = $('#agent_company_commission_type').val();
            agent_actual_commission_amt = $('#agent_actual_commission_amt').val();
            agent_company_comission_rupees = $('#agent_company_comission_rupees').val();
            agent_main_price = $('#agent_main_price').val();

            // ==== check agent_vehicle_type
            if ($('#agent_vehicle_type').val() == '1') {
                if (agent_profit_amt != '' && agent_actual_commission_amt != '' && agent_tds_deduction != '') {
                        var agent_profit_amt = $('#agent_profit_amt').val();
                        var agent_actual_commission_amt = $('#agent_actual_commission_amt').val();
                        var agent_tds_deduction = $('#agent_tds_deduction').val();

                        // ==== Calculate TDS Deduction in Percentage
                        var one_percent_value = ((agent_profit_amt) / 100);
                        var total_tds_deduction_amt = ((one_percent_value) * (agent_tds_deduction));

                        // ==== Calculate Company Profit
                        var total_company_profit = ((agent_profit_amt) - (total_tds_deduction_amt)) - (agent_actual_commission_amt);
                        $('#agent_actual_profit_amt').val(parseFloat(total_company_profit.toFixed(4)));

                    } else {
                        $('#agent_actual_profit_amt').val('');
                    }
            } else if ($('#agent_vehicle_type').val() == '2') {
                if (agent_profit_amt != '' && agent_actual_commission_amt != '' && agent_tds_deduction != '') {
                        var agent_profit_amt = $('#agent_profit_amt').val();
                        var agent_actual_commission_amt = $('#agent_actual_commission_amt').val();
                        var agent_tds_deduction = $('#agent_tds_deduction').val();

                        // ==== Calculate TDS Deduction in Percentage
                        var one_percent_value = ((agent_profit_amt) / 100);
                        var total_tds_deduction_amt = ((one_percent_value) * (agent_tds_deduction));

                        // ==== Calculate Company Profit
                        var total_company_profit = ((agent_profit_amt) - (total_tds_deduction_amt)) - (agent_actual_commission_amt);
                        var actual_profit_amy = ((agent_actual_commission_amt) - (total_company_profit))
                        $('#agent_actual_profit_amt').val(parseFloat(total_company_profit.toFixed(4)));

                    } else {
                        $('#agent_actual_profit_amt').val('');
                    }
            }

        });

    });
</script>

{{-- Retailer Commercial Caluation --}}
<script>
    $(document).ready(function () {
        $('#retailer_main_price, #retailer_company_commission_percentage').on('keyup', function () {
            retailer_main_price = $('#retailer_main_price').val();
            retailer_company_commission_percentage = $('#retailer_company_commission_percentage').val();

            if (retailer_main_price != '' && retailer_company_commission_percentage != '') {
                var one_percent_value = (parseInt(retailer_main_price) / 100);
                var total_percent_value = (parseInt(one_percent_value) * parseInt(retailer_company_commission_percentage));
                $('#retailer_profit_amt').val(total_percent_value);
            }
        });

        $('#retailer_tds_deduction, #retailer_profit_amt, #retailer_commission_percentage').on('keyup', function () {
            retailer_profit_amt = $('#retailer_profit_amt').val();
            retailer_tds_deduction = $('#retailer_tds_deduction').val();
            retailer_commission_percentage = $('#retailer_commission_percentage').val();

            if (retailer_profit_amt != '' && retailer_tds_deduction != '') {
                var retailer_profit_amt_minus_tds = (parseInt(retailer_profit_amt) / 100 ) * parseInt(retailer_tds_deduction);
                var retailer_profit = (parseInt(retailer_profit_amt)) - parseInt(retailer_profit_amt_minus_tds)
                $('#retailer_actual_profit_amt').val(parseInt(retailer_profit));
            }

            if (retailer_commission_percentage != '' && retailer_actual_profit_amt != '') {
                // === Retailer Profit Amount minus TDS deduction in percentage
                var retailer_actual_profit_amt = $('#retailer_actual_profit_amt').val();
                var retailer_commission_percentage = $('#retailer_commission_percentage').val();
                var retailer_commission_rupees_minus_with_commissionInDiscount = parseInt(retailer_actual_profit_amt) * (parseInt(retailer_commission_percentage) / 100);
                $('#retailer_commission_rupees').val(parseInt(retailer_commission_rupees_minus_with_commissionInDiscount));

                // === Calculate (retailer_main_price - retailer_commission_rupees)
                var retailer_main_price = $('#retailer_main_price').val();
                var retailer_commission_rupees = $('#retailer_commission_rupees').val();
                var retailer_main_price_minus_commission_rupees = parseInt(retailer_main_price) - parseInt(retailer_commission_rupees);
                $('#retailer_payable_amount').val(parseInt(retailer_main_price_minus_commission_rupees));
            }
        });
    });
</script>


{{-- Agent start sarch Filter --}}
{{-- Adding Search Filter Agent Name --}}
<script>
    var typed = "";
    $('#agent_id').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#agent_id').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#agent_id').find("option[value='" + typed + "']").length) {
                $('#agent_id').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#agent_id').append(newOption).trigger('change');
            }
        }
    });
</script>

{{-- Adding Search Filter Company Name --}}
<script>
    var typed = "";
    $('#agent_insurance_company_id').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#agent_insurance_company_id').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#agent_insurance_company_id').find("option[value='" + typed + "']").length) {
                $('#agent_insurance_company_id').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#agent_insurance_company_id').append(newOption).trigger('change');
            }
        }
    });
</script>

{{-- Adding Search Filter Company ID --}}
<script>
    var typed = "";
    $('#agent_company_id').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#agent_company_id').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#agent_company_id').find("option[value='" + typed + "']").length) {
                $('#agent_company_id').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#agent_company_id').append(newOption).trigger('change');
            }
        }
    });
</script>

{{-- Adding Search Filter RTO ID --}}
<script>
    var typed = "";
    $('#agent_rto_id').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#agent_rto_id').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#agent_rto_id').find("option[value='" + typed + "']").length) {
                $('#agent_rto_id').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#agent_rto_id').append(newOption).trigger('change');
            }
        }
    });
</script>

{{-- Adding Search Vehicle Type --}}
<script>
    var typed = "";
    $('#agent_vehicle_id').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#agent_vehicle_id').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#agent_vehicle_id').find("option[value='" + typed + "']").length) {
                $('#agent_vehicle_id').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#agent_vehicle_id').append(newOption).trigger('change');
            }
        }
    });
</script>

{{-- Adding Search Insurance Type --}}
<script>
    var typed = "";
    $('#agent_insurance_type').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#agent_insurance_type').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#agent_insurance_type').find("option[value='" + typed + "']").length) {
                $('#agent_insurance_type').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#agent_insurance_type').append(newOption).trigger('change');
            }
        }
    });
</script>

{{-- Adding Search Payment By --}}
<script>
    var typed = "";
    $('#agent_payment_by').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#agent_payment_by').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#agent_payment_by').find("option[value='" + typed + "']").length) {
                $('#agent_payment_by').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#agent_payment_by').append(newOption).trigger('change');
            }
        }
    });
</script>

{{-- Adding Search Payment Through --}}
<script>
    var typed = "";
    $('#agent_payment_through').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#agent_payment_through').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#agent_payment_through').find("option[value='" + typed + "']").length) {
                $('#agent_payment_through').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#agent_payment_through').append(newOption).trigger('change');
            }
        }
    });
</script>

{{-- Retailer start sarch Filter --}}
{{-- Adding Search Filter Retailer Name --}}
<script>
    var typed = "";
    $('#retailer_id').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#retailer_id').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#retailer_id').find("option[value='" + typed + "']").length) {
                $('#retailer_id').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#retailer_id').append(newOption).trigger('change');
            }
        }
    });
</script>

{{-- Adding Search Filter RTO --}}
<script>
    var typed = "";
    $('#retailer_r_t_o_id').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#retailer_r_t_o_id').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#retailer_r_t_o_id').find("option[value='" + typed + "']").length) {
                $('#retailer_r_t_o_id').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#retailer_r_t_o_id').append(newOption).trigger('change');
            }
        }
    });
</script>

{{-- Adding Search Filter Vehicle Type --}}
<script>
    var typed = "";
    $('#retailer_vehicle_id').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#retailer_vehicle_id').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#retailer_vehicle_id').find("option[value='" + typed + "']").length) {
                $('#retailer_vehicle_id').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#retailer_vehicle_id').append(newOption).trigger('change');
            }
        }
    });
</script>

{{-- Adding Search Filter Insurance Type --}}
<script>
    var typed = "";
    $('#retailer_insurance_type').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#retailer_insurance_type').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#retailer_insurance_type').find("option[value='" + typed + "']").length) {
                $('#retailer_insurance_type').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#retailer_insurance_type').append(newOption).trigger('change');
            }
        }
    });
</script>

{{-- Adding Search Filter Company Name --}}
<script>
    var typed = "";
    $('#retailer_company_id').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#retailer_company_id').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#retailer_company_id').find("option[value='" + typed + "']").length) {
                $('#retailer_company_id').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#retailer_company_id').append(newOption).trigger('change');
            }
        }
    });
</script>

{{-- Adding Search Payment By --}}
<script>
    var typed = "";
    $('#retailer_payment_by').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#retailer_payment_by').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#retailer_payment_by').find("option[value='" + typed + "']").length) {
                $('#retailer_payment_by').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#retailer_payment_by').append(newOption).trigger('change');
            }
        }
    });
</script>

{{-- Adding Search Payment Through --}}
<script>
    var typed = "";
    $('#retailer_payment_through').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#retailer_payment_through').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#retailer_payment_through').find("option[value='" + typed + "']").length) {
                $('#retailer_payment_through').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#retailer_payment_through').append(newOption).trigger('change');
            }
        }
    });
</script>
@endpush
