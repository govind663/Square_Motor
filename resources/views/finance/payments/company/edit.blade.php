@extends('layouts.master')

@section('title')
  Payment | Edit
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
                        <h5>Edit Payment</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('payment.update', $payment->id) }}"  enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="text" id="id" name="id" hidden  value="{{ $payment->id }}" >

                            <div class="form-group-customer customer-additional-form">
                                <div class="row">

                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3" >
                                            <label><b>Agent Name : <span class="text-danger">*</span></b></label>
                                            <select  class="form-control @error('agent_id') is-invalid @enderror select" id="agent_id" name="agent_id">
                                                <option value="">Select Agent</option>
                                                @foreach ($agent as $value )
                                                <option value="{{ $value->id }}" {{ ( $payment->agent_id == $value->id ? "selected":"") }}>{{ $value->name }}</option>
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
                                            <label><b>Amount : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="amount" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ $payment->amount }}" placeholder="Enter Amount">

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
                                                <option value="1" {{ ( $payment->payment_mode == '1' ? "selected":"") }}>Cash</option>
                                                <option value="2" {{ ( $payment->payment_mode == '2' ? "selected":"") }}>Cheque</option>
                                                <option value="3" {{ ( $payment->payment_mode == '3' ? "selected":"") }}>Online Transfer</option>
                                                <option value="4" {{ ( $payment->payment_mode == '4' ? "selected":"") }}>GooglePay</option>
                                                <option value="5" {{ ( $payment->payment_mode == '5' ? "selected":"") }}>PhonePay</option>
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
                                            <textarea type="text" id="notes" name="notes" class="form-control @error('notes') is-invalid @enderror" value="{{ $payment->notes }}" placeholder="Enter Notes">{{ $payment->notes }}</textarea>
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
                                            <input type="date" id="payment_dt" name="payment_dt" class="form-control @error('payment_dt') is-invalid @enderror" value="{{ $payment->payment_dt }}" placeholder="Enter Date">
                                            @error('payment_dt')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="add-customer-btns text-start">
                                <a href="{{ route('payment.index') }}" class="btn btn-danger">Cancel</a>
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
@endpush