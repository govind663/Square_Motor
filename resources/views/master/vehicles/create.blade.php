@extends('layouts.master')

@section('title')
Vehicle | Add
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
                            <h5>Add Vehicle</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('vehicle.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group-customer customer-additional-form">
                                    <div class="row">

                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Vehicle Type : <span class="text-danger">*</span></b></label>
                                                <input type="text" id="vehicle_type" name="vehicle_type" class="form-control @error('vehicle_type') is-invalid @enderror" value="{{ old('vehicle_type') }}" placeholder="Enter Vehicle Type">

                                                @error('vehicle_type')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label><b>Description :</b></label>
                                                <input type="text" id="description" name="description" class="form-control" value="{{ old('description') }}" placeholder="Enter Description">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="add-customer-btns text-end">
                                    <a href="{{ route('vehicle.index') }}" class="btn btn-danger">Cancel</a>
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
