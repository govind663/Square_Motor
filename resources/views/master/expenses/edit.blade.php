@extends('layouts.master')

@section('title')
Expenses | Edit
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
                        <h5>Edit Expenses</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('expenses.update', $expenses->id) }}"  enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="text" id="id" name="id" hidden  value="{{ $expenses->id }}" >

                            <div class="form-group-customer customer-additional-form">
                                <div class="row">

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Title : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $expenses->title }}" placeholder="Enter Title">

                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Amount : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="amount" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ $expenses->amount }}" placeholder="Enter Amount">

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
                                                <option value="1" {{ ( $expenses->payment_mode == '1' ? "selected":"") }}>Cash</option>
                                                <option value="2" {{ ( $expenses->payment_mode == '2' ? "selected":"") }}>Cheque</option>
                                                <option value="3" {{ ( $expenses->payment_mode == '3' ? "selected":"") }}>Online Transfer</option>
                                                <option value="4" {{ ( $expenses->payment_mode == '4' ? "selected":"") }}>GooglePay</option>
                                                <option value="5" {{ ( $expenses->payment_mode == '5' ? "selected":"") }}>PhonePay</option>
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
                                            <textarea type="text" id="notes" name="notes" class="form-control @error('notes') is-invalid @enderror" value="{{ $expenses->notes }}" placeholder="Enter Notes">{{ $expenses->notes }}</textarea>
                                            @error('notes')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="add-customer-btns text-start">
                                <a href="{{ route('expenses.index') }}" class="btn btn-danger">Cancel</a>
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
