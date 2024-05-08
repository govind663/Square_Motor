@extends('layouts.master')

@section('title')
Report | List
@endsection

@push('styles')
<style>
    .btn-secondary {
        color: #fff;
        background-color: #387dff !important;
        border-color: #387dff !important;
    }
    .pagination li.active a.page-link {
        background: #387dff !important;
        border-color: #387dff !important;
        border-radius: 5px;
    }
    table.dataTable thead > tr > th.dt-orderable-asc, table.dataTable thead > tr > th.dt-orderable-desc, table.dataTable thead > tr > th.dt-ordering-asc, table.dataTable thead > tr > th.dt-ordering-desc, table.dataTable thead > tr > td.dt-orderable-asc, table.dataTable thead > tr > td.dt-orderable-desc, table.dataTable thead > tr > td.dt-ordering-asc, table.dataTable thead > tr > td.dt-ordering-desc {
        position: relative;
        padding-left: 2px !important;
    }
    table.dataTable th.dt-type-numeric, table.dataTable th.dt-type-date, table.dataTable td.dt-type-numeric, table.dataTable td.dt-type-date {
        text-align: left !important;
    }
    .form-control {
        border: 1px solid #387dff !important;
    }
    .form-group-customer {
        border-bottom: 0px;
        margin: 0px;
        padding: 0px;
    }
</style>
@endpush

@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Manage Report</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Report List</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('serch.policy.list') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group-customer customer-additional-form">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>From Date : <span class="text-danger">*</span></b></b></label>
                                            <input type="text"  id="from_date" name="from_date" class="form-control datetimepicker @error('from_date') is-invalid @enderror" value="{{ old('from_date') }}" placeholder="DD/MM/YYYY">
                                            @error('from_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>To Date : <span class="text-danger">*</span></b></b></label>
                                            <input type="text"  id="to_date" name="to_date" class="form-control datetimepicker @error('to_date') is-invalid @enderror" value="{{ old('to_date') }}" placeholder="DD/MM/YYYY">
                                            @error('to_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <div class="input-block mb-3" >
                                            <label><b>Policy Type : <span class="text-danger">*</span></b></label>
                                            <select class="form-control-sm @error('policy_type') is-invalid @enderror select" id="policy_type" name="policy_type">
                                                <option value="">Select Policy Type</option>
                                                <option value="1" {{ (old("policy_type") == '1' ? "selected":"") }}>Agent</option>
                                                <option value="2" {{ (old("policy_type") == '2' ? "selected":"") }}>Retailer</option>
                                            </select>
                                            @error('policy_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <div class="input-block mt-2 text-start">
                                            <br>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <div class="col-10">
                            <h5 class="card-title">
                                Total Earning : {{ $totalEarning }} Rs
                            </h5>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="data-table-export1 table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Policy Id</th></th>
                                        <th>Customer Name</th>
                                        <th>Agent Name</th>
                                        <th>Amount</th>
                                        <th>Issue Date</th>
                                        <th>Policy Document</th>
                                        <th>Policy Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($policy as $key=>$value )
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $value->policy_no }}</td>
                                        <td>{{ $value->customer_name }}</td>
                                        <td>{{ $value->agents?->name }}</td>
                                        @php
                                            $totalAmount = '';

                                            if(!empty($value->policy_type == '1')){
                                                $totalAmount = $value->comission_rupees;
                                            }elseif(!empty($value->policy_type == '2')){
                                                $totalAmount = $value->payable_amount;
                                            }
                                        @endphp
                                        <td>{{ $totalAmount }}</td>
                                        <td>{{ date('d-m-y', strtotime($value->issue_dt) ) }}</td>
                                        <td>
                                            @if(!empty($value->policy_doc))
                                                <a href="{{url('/')}}/company_policy/policy_doc/{{ $value->policy_doc }}" target="_blank" class="btn btn-info btn-sm text-light">
                                                    <b> View </b>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->policy_type == '1')
                                            <span class="badge bg-success" >Agent</span>
                                            @elseif($value->policy_type == '2')
                                            <span class="badge bg-primary" >Retailer</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
<script>
    $('.data-table-export1').DataTable({
        scrollCollapse: true,
        autoWidth: true,
        responsive: true,
        columnDefs: [{
            targets: "datatable-nosort",
            orderable: false,
        }],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "language": {
            "info": "_START_-_END_ of _TOTAL_ entries",
            searchPlaceholder: "Search",
            // paginate: {
            //     next: '<i class="ion-chevron-right"></i>',
            //     previous: '<i class="ion-chevron-left"></i>'
            // }
        },
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                text: 'Copy',
                className: 'btn btn-default',
                exportOptions: {
                    columns: ':not(.no-export)'
                }
            },
            {
                extend: 'csv',
                text: 'Excel',
                className: 'btn btn-default',
                exportOptions: {
                    columns: ':not(.no-export)'
                }
            },
            {
                extend: 'pdf',
                text: 'PDF',
                className: 'btn btn-default',
                exportOptions: {
                    columns: ':not(.no-export)',
                },
               header: true,
               title: 'Report',
               orientation: 'landscape',
               pageSize: 'A4',
               customize: function(doc) {
                  doc.defaultStyle.fontSize = 16; //<-- set fontsize to 16 instead of 10
                  doc.defaultStyle.fontFamily = "sans-serif";
                // doc.defaultStyle.font = 'Arial';

               }
            },
            {
                extend: 'print',
                text: 'Print',
                className: 'btn btn-default',
                exportOptions: {
                    columns: ':not(.no-export)'
                }
            },
        ]
    });
</script>
@endpush
