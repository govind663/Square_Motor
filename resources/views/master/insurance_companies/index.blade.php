@extends('layouts.master')

@section('title')
Insurance Company | List
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
        padding-right: 0px !important;
    }
    table.dataTable th.dt-type-numeric, table.dataTable th.dt-type-date, table.dataTable td.dt-type-numeric, table.dataTable td.dt-type-date {
        text-align: left !important;
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
                    <h3 class="page-title">Manage Insurance Company</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Insurance Company List</li>
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
                            <h5 class="card-title">All Insurance Company List</h5>
                        </div>
                        <div class="col-2 float-right">
                            <a href="{{ route('insurance_company.create') }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Insurance Company
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="data-table-export1 table table-nowrap">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Company Name</th>
                                        <th class="text-start no-export">Company Logo</th>
                                        <th>Commission Type</th>
                                        <th class="no-export">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($insuranceCompanies as $key=>$value )
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $value->company_name }}</td>
                                        <td class="text-start no-export">
                                            @if(!empty($value->logo_doc))
                                                <img src="{{url('/')}}/company_policy/logo_doc/{{ $value->logo_doc }}" alt="{{ $value->logo_doc }}" style="height:20% !important; width: 20% !important" >
                                            @endif
                                        </td>
                                        <td>
                                        @if($value->commision_type == '1')
                                        <span class="badge bg-success" >Percentage</span>
                                        @elseif($value->commision_type == '2')
                                        <span class="badge bg-success" >Fixed</span>
                                        @endif
                                        </td>
                                        <td class="no-export d-flex">
                                            <a href="{{ route('insurance_company.edit', $value->id) }}" class="btn btn-warning btn-sm text-dark">
                                                <i class="far fa-edit me-2"></i>Edit
                                            </a>
                                            &nbsp;
                                            <form action="{{ route('insurance_company.destroy', $value->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-sm " onclick="return confirm('Are you sure to delete?')">
                                                    <i class="far fa-trash-alt me-2"></i>Delete
                                                </button>
                                            </form>
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
