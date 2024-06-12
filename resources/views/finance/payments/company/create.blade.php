@extends('layouts.master')

@section('title')
Company Payment | Add
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
                            <h5>Add Company Payment</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('payment_to_company.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group-customer customer-additional-form">
                                    <div class="row">

                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="input-block mb-3" >
                                                <label><b>Select Company Name : <span class="text-danger">*</span></b></label>
                                                <select  class="form-control @error('insurance_company_id') is-invalid @enderror select" id="insurance_company_id" name="insurance_company_id">
                                                    <option value="">Select Company Name</option>
                                                    <optgroup label="Company Name">
                                                        @foreach ($insuranceCompany as $value )
                                                        <option value="{{ $value->id }}" {{ (old("insurance_company_id") == $value->id ? "selected":"") }}>{{ $value->company_name }}</option>
                                                        @endforeach
                                                    </optgroup>
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
                                                <label><b>Amount : <span class="text-danger">*</span></b></label>
                                                <input type="text" id="amount" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}" placeholder="Enter Amount">

                                                @error('amount')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="input-block mb-3" >
                                                <label><b>Payment Mode : <span class="text-danger">*</span></b></label>
                                                <select class="form-control @error('payment_mode') is-invalid @enderror select" id="payment_mode" name="payment_mode">
                                                    <option value="">Select Payment Mode</option>
                                                    <option value="1" {{ (old("payment_mode") == '1' ? "selected":"") }}>Cash</option>
                                                    <option value="2" {{ (old("payment_mode") == '2' ? "selected":"") }}>Cheque</option>
                                                    <option value="3" {{ (old("payment_mode") == '3' ? "selected":"") }}>Online Transfer</option>
                                                    <option value="4" {{ (old("payment_mode") == '4' ? "selected":"") }}>GooglePay</option>
                                                    <option value="5" {{ (old("payment_mode") == '5' ? "selected":"") }}>PhonePay</option>
                                                </select>
                                                @error('payment_mode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Notes : <span class="text-danger">*</span></b></label>
                                                <textarea type="text" id="notes" name="notes" class="form-control @error('notes') is-invalid @enderror" value="{{ old('notes') }}" placeholder="Enter Notes">{{ old('notes') }}</textarea>
                                                @error('notes')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Date : <span class="text-danger">*</span></b></label>
                                                <div class="cal-icon cal-icon-info">
                                                    <input type="text" id="payment_dt" name="payment_dt" class="form-control datetimepicker @error('payment_dt') is-invalid @enderror" value="{{ old('payment_dt') }}" placeholder="Enter Date">
                                                    @error('payment_dt')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="add-customer-btns text-start">
                                    <a href="{{ route('payment_to_company.index') }}" class="btn btn-danger">Cancel</a>
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
@endpush
