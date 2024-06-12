@extends('layouts.master')

@section('title')
Policy | List
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
                    <h3 class="page-title">Manage Policy</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Policy List</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="row card-body">
                        <div class="col-10">
                            <h5 class="card-title">All Policy List</h5>
                        </div>
                        <div class="col-2 float-right">
                            <a href="{{ route('policy.create') }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus me-2" aria-hidden="true"></i>Policy
                            </a>
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
                                        <th>Amount (Rs)</th>
                                        <th>Issue Date</th>
                                        <th>Policy Document</th>
                                        <th>Policy Type</th>
                                        <th class="no-export">Action</th>
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

                                            if($value->policy_type == '1'){
                                                $totalAmount = $value->profit_amt;
                                            }elseif($value->policy_type == '2'){
                                                $totalAmount = $value->payable_amount;
                                            }
                                        @endphp
                                        <td>{{ $totalAmount }}</td>
                                        <td>{{ date('d-m-y', strtotime($value->issue_dt) ) }}</td>

                                        @php
                                            $policyDoc = '';

                                            if($value->policy_type == '1'){
                                                $policyDoc = $value->policy_doc;
                                            }elseif($value->policy_type == '2'){
                                                $policyDoc = $value->retailer_policy_doc;
                                            }
                                        @endphp
                                        <td>
                                            @if(!empty($value->policy_doc))
                                                <a href="{{url('/')}}/company_policy/policy_doc/{{ $policyDoc }}" target="_blank" class="btn btn-info btn-sm text-light">
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
                                        <td class="no-export">
                                            <a href="{{ route('policy.edit', $value->id) }}" class="btn btn-warning btn-sm text-black">
                                                <i class="far fa-edit me-2"></i>Edit
                                            </a>
                                            &nbsp;
                                            <a>
                                                <form action="{{ route('policy.destroy', $value->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm " onclick="return confirm('Are you sure to delete?')">
                                                        <i class="far fa-trash-alt me-2"></i>Delete
                                                    </button>
                                                </form>
                                            </a>
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
