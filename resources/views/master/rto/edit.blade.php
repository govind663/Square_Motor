@extends('layouts.master')

@section('title')
  RTO | Update
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
                        <h5>Edit RTO</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('rto.update', $Rto->id) }}"  enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="text" id="id" name="id" hidden  value="{{ $Rto->id }}" >

                            <div class="form-group-customer customer-additional-form">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>Region : <span class="text-danger">*</span></b></label>
                                            <input type="text" id="city" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ $Rto->city }}" placeholder="Enter Region">

                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>RTO Code : <span class="text-danger">*</span></b></label>
                                            <input type="text" maxlength="6" id="pincode" name="pincode" class="form-control @error('city') is-invalid @enderror" value="{{ $Rto->pincode }}" placeholder="Enter RTO Code">
                                            @error('pincode')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>State : </b></label>
                                            <input type="text" id="state" name="state" class="form-control" value="{{ $Rto->state }}" placeholder="Enter State">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-customer-btns text-start">
                                <a href="{{ route('rto.index') }}" class="btn btn-danger">Cancel</a>
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
