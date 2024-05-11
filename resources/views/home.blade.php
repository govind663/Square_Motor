@extends('layouts.master')

@section('title')
  Square Motor | Home
@endsection

@push('styles')
<style>
    img {
        max-width: 100%;
        height: 100% !important;
    }
</style>
@endpush

@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="row">

            {{-- Total Earning Money --}}
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card border border-primary">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-1">
                                <img src="{{ asset('assets/img/indian_rupees_curancy.png') }}" alt="">
                                {{-- <i class="fa fa-rupee-sign"></i> --}}
                            </span>
                            <div class="dash-count">
                                <div class="dash-title text-dark">Amount Due</div>
                                <div class="dash-counts text-dark">
                                    <p>{{ $totalEarningBalance }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Agents Count --}}
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card border border-primary">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-2">
                                <i class="fas fa-users"></i>
                            </span>
                            <div class="dash-count">
                                <div class="dash-title text-dark">Total Agents</div>
                                <div class="dash-counts text-dark">
                                    <p>{{ $totalAgents }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Retailer Count --}}
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card border border-primary">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-2">
                                <i class="fas fa-user"></i>
                            </span>
                            <div class="dash-count">
                                <div class="dash-title text-dark">Total Retailer</div>
                                <div class="dash-counts text-dark">
                                    <p>{{ $totalRetailer }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Policy Count --}}
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card border border-primary">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-3">
                                <i class="fas fa-file-alt"></i>
                            </span>
                            <div class="dash-count">
                                <div class="dash-title text-dark">Policy</div>
                                <div class="dash-counts text-dark">
                                    <p>{{ $totalPolicy }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /Page Wrapper -->
@endsection

@push('scripts')
@endpush
