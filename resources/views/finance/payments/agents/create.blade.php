@extends('layouts.master')

@section('title')
Agent Payment | Add
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
                            <h5>Add Agent Payment</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('payment.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group-customer customer-additional-form">
                                    <div class="row">

                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="input-block mb-3" >
                                                <label><b>Agent Name : <span class="text-danger">*</span></b></label>
                                                <select  class="form-control @error('agent_id') is-invalid @enderror select" id="agent_id" name="agent_id">
                                                    <option value="">Select Agent</option>
                                                    @foreach ($agent as $value )
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
                                                <label><b>Payment Type : <span class="text-danger">*</span></b></label>
                                                <select class="form-control @error('payment_type') is-invalid @enderror select" id="payment_type" name="payment_type">
                                                    <option value="">Select Payment Type</option>
                                                    <option value="1" {{ (old("payment_type") == '1' ? "selected":"") }}>Debit</option>
                                                    <option value="2" {{ (old("payment_type") == '2' ? "selected":"") }}>Credit</option>
                                                </select>
                                                @error('payment_type')
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
                                                    <option value="6" {{ (old("payment_mode") == '6' ? "selected":"") }}>UPI</option>
                                                    <option value="7" {{ (old("payment_mode") == '7' ? "selected":"") }}>Card</option>
                                                    <option value="8" {{ (old("payment_mode") == '8' ? "selected":"") }}>Net Banking</option>
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
                                    <a href="{{ route('payment.index') }}" class="btn btn-danger">Cancel</a>
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
{{-- Adding Search Agent Name --}}
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

{{-- Adding Search Payment Type --}}
<script>
    var typed = "";
    $('#payment_type').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#payment_type').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#payment_type').find("option[value='" + typed + "']").length) {
                $('#payment_type').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#payment_type').append(newOption).trigger('change');
            }
        }
    });
</script>

{{-- Adding Search Payment Mode --}}
<script>
    var typed = "";
    $('#payment_mode').select2({
        language: {
            noResults: function(term) {
                typed = $('.select2-search__field').val();
            }
        }

    });
    $('#payment_mode').on('select2:select', function(e) {
        typed = ""; // clear
    });
    $("#but").on("click", function() {
        if (typed) {
            // var value = prompt("Do you have a state abbriviation for "+typed+"?"); // change typed to value where necessary

            // Set the value, creating a new option if necessary
            if ($('#payment_mode').find("option[value='" + typed + "']").length) {
                $('#payment_mode').val(typed).trigger('change');
            } else {
                // Create a DOM Option and pre-select by default

                var newOption = new Option(typed, typed, true, true);
                // Append it to the select
                $('#payment_mode').append(newOption).trigger('change');
            }
        }
    });
</script>
@endpush
