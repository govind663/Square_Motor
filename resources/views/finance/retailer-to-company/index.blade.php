@extends('layouts.master')

@section('title')
Retailer to Company | List
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
                    <h3 class="page-title">Retailer to Company</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Retailer to Company List</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('retailer_to_company.search_retailer_wise_tranx') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group-customer customer-additional-form">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>From Date : <span class="text-danger">*</span></b></b></label>
                                            <div class="cal-icon cal-icon-info">
                                                <input type="text"  id="from_date" name="from_date" class="form-control datetimepicker @error('from_date') is-invalid @enderror" value="{{ old('from_date', request('from_date')) }}" placeholder="DD-MM-YYYY">
                                                @error('from_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label><b>To Date : <span class="text-danger">*</span></b></b></label>
                                            <div class="cal-icon cal-icon-info">
                                                <input type="text"  id="to_date" name="to_date" class="form-control datetimepicker @error('to_date') is-invalid @enderror" value="{{ old('to_date', request('to_date')) }}" placeholder="DD-MM-YYYY">
                                                @error('to_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <div class="input-block mb-3" >
                                            <label><b>Retailer Name : <span class="text-danger">*</span></b></label>
                                            <select  class="form-control @error('retailer_id') is-invalid @enderror select" id="retailer_id" name="retailer_id">
                                                <option value="">Select Retailer</option>
                                                @foreach ($retailer as $value )
                                                <option value="{{ $value->id }}" {{ (old('retailer_id', request('retailer_id')) == $value->id ? "selected":"") }}>{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('retailer_id')
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

                        <div class="row d-flex">
                            <div class="col-4">
                                <h5 class="card-title">
                                    Total Debit : {{ $debitTranxTotal }} Rs
                                </h5>
                            </div>
                            <div class="col-4">
                                <h5 class="card-title">
                                    Total Credit : {{ $creditTranxTotal }} Rs
                                </h5>
                            </div>
                            <div class="col-4">
                                <h5 class="card-title">
                                    Total Earning : {{ $balance }} Rs
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="data-table-export1 table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Retailer Name</th>
                                        <th>Date</th></th>
                                        <th>Particular</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $tbalance = 0;
                                    @endphp

                                    @foreach ($retailerDebitCreditLog as $key => $value)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $value->retailers?->name }}</td>
                                        <td>{{ date("d-m-Y", strtotime($value->tranx_dt)) }}</td>

                                            @if($value->tranx_type == '1')
                                                <td>{{ $value->policy_id }}</td>
                                            @elseif($value->tranx_type == '2')
                                                <td>
                                                    @if($value->policy_id == '1')
                                                        <span class="badge bg-success" >Cash</span>
                                                    @elseif($value->policy_id == '2')
                                                        <span class="badge bg-primary" >Cheque</span>
                                                    @elseif($value->policy_id == '3')
                                                        <span class="badge bg-info" >Online Transfer</span>
                                                    @elseif($value->policy_id == '4')
                                                        <span class="badge bg-warning text-dark" >GooglePay</span>
                                                    @elseif($value->policy_id == '5')
                                                        <span class="badge bg-dark" >PhonePay</span>
                                                    @endif
                                                </td>
                                            @endif

                                        <td>{{ $value->debit_tranx }}</td>
                                        <td>{{ $value->credit_tranx }}</td>
                                        <td>
                                            <?php
                                                 $chkbala = ($value->credit_tranx - $value->debit_tranx);
                                                 echo $tbalance += $chkbala;
                                            ?>
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
