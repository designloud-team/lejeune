@extends('admin_template')
@push('styles')
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" media="screen">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="{{ asset('/css/DT_bootstrap.css') }}" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css" />
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css" rel="stylesheet" />
    <style>
        .table-btn {
            padding: 6px 5px;
            font-size: 12px;
            color: #ccc;
        }

        .table-btn button {
            border: 0;
            background-color: transparent;
            padding: 0;
        }


        div.top .dataTables_filter label {
            float: right!important;
        }

    </style>
@endpush
@section('breadcrumbs')
    {!! Breadcrumbs::render('notaries.show', $notary) !!}
@stop

<style>
    .box .box-body ,.box-header {
        padding: 0 5%;
    }
</style>
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="pull-right">
                        <p><a href="/notaries/{{ $notary->id }}/edit" class="btn btn-danger">Edit</a></p>
                    </div>
                </div>
            </div>

            <div class="row padd-left">
                    <div class="">
                    <div class="box box-default col-md-6 col-sm-12">
                        <div class="box-header">
                          <h3 class="box-title">Notary</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <p><strong>State: </strong>{{ $notary->state }}</p>
                            <p><strong>Business Name: </strong>{{ $notary->business_name }}</p>
                            <p><strong>State: </strong>{{ $states[$notary->state] }}</p>
                            <p><strong>Website: </strong>{{ $notary->website }}</p>
                            <p><strong>E-Docs: </strong>{{ $notary->edocs == 1 ? 'Yes': 'No' }}</p>
                            <p><strong>Has Insurance: </strong>{{ $notary->insurance == 1 ? 'Yes': 'No' }}</p>
                            @if($notary->insurance == 1)<p><strong>Insurance Amount: </strong>{{ $notary->insurance_amount }}</p>@endif
                            <p><strong>SSN or EIN: </strong>{{ $notary->ssn_or_ein }}</p>

                        </div>
                        
                    </div>
                    </div>
                <div class="">
                    <div class="box box-default col-md-6 col-sm-12">
                        <div class="box-header">
                            <h3 class="box-title">Contact Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <p><strong>Email: </strong><a href="mailto:{{ $notary->email }}">{{ $notary->email }}</a> </p>
                            <p><strong>Phone: </strong><a href="tel:{{ $notary->phone }}"> {{ $notary->phone }}</a></p>
                            <p><strong>Alt Phone: </strong><a href="tel:{{ $notary->alternate_phone }}">{{ $notary->alternate_phone }}</a></p>
                            <p><strong>Fax: </strong>{{ $notary->fax }}</p>
                            <p><strong>Mailing: </strong>{{ $notary->mailing_address }}</p>
                            <p><strong>Deliver: </strong>{{ $notary->delivery_address }}</p>
                            <p><strong>Notes: </strong>{{ $notary->notes }}</p>

                        </div>
                    </div>
                </div>

            </div>


            <hr style="width: 100%;height: 1px; color: gray;background-color: gray">

            <div class="row">
                <div class="box box-default col-md-12 col-sm-12">
                    <div class="box-header">
                    </div>
                    <div class="box-body">
                        <ul class="nav nav-tabs nav-justified">
                            <li role="presentation" class="active"><a data-toggle="tab" href="#jobs">Jobs</a></li>
                            <li role="presentation"><a data-toggle="tab" href="#invoices">Invoices</a></li>
                            <li role="presentation"><a data-toggle="tab" href="#reports">Completion Reports</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="jobs">
                                <table class="table table-bordered tbl-jobs" id="tbl-jobs" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Registered ID</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane" id="invoices">
                                <table class="table table-bordered tbl-invoices" id="tbl-invoices" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Invoice Number</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane" id="reports">
                                <table class="table table-bordered tbl-reports" id="tbl-reports" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Completion Date</th>
                                        <th>Tracking ID</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
<script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.colVis.min.js"></script>
@if(isset($notary))
    {{--Script for time enteris--}}
    console.log({{$notary->id}})
    <script>
        jQuery(document).ready(function($){
            var url = "{!! route('notaries.json',[$notary->id,'jobs']) !!}";
            var table_selector = '.tbl-jobs';
            var table =  $('.table');

            var ooTable = $(table_selector).dataTable({

                "dom": '<"top"f>rt<"bottom"ilp><"clear">',
                processing: true,
                serverSide: true,
                "ajax": {
                    "url": "{!! route('notaries.json',[$notary->id,'jobs']) !!}",
                    "data": function ( d ) {
                        return $.extend( {}, d, {
                        } );
                    }
                },
                "searching": false,
                columns: [
                    { data: 'registered_id', name: 'registered_id' , 'width': '20%'},
                    { data: 'date', name: 'date', 'width': '30%'},
                    { data: 'status', name: 'status', 'width': '20%'},
                    { data: 'actions', name: 'Actions',searchable: "false", orderable: "false" , 'width': '20%'},
                ],
                "aoColumnDefs" : [
                    {
                        "aTargets" : [0]
                    }
                ],
                "oLanguage" : {
                    //  sProcessing: '<span style="width:100%;"><img src="http://www.snacklocal.com/images/ajaxload.gif"></span>',
                },
                "bStateSave": true,
                "aaSorting" : [[0, 'asc']],
                "bSortClasses": false,
                "aLengthMenu" : [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] // change per page values here
                ],
                // set the initial value

                "iDisplayLength" : 10,
                // "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                //     //var id = aData[0];
                //     var href =  $(nRow).find('td > .btn-group > .btn-view').attr('href');
                //     $(nRow).attr("data-href", href);
                //     return nRow;
                // }
            });
            // $(table_selector).on('click', 'tbody tr td:not(:last-child)', function () {
            //     var path = $(this).parent('tr').data('href');
            //     window.location = path;
            // });
            // $('.dataTables_filter input[type="search"]').addClass('form-control'); // <-- add this line
        });
    </script>
    {{--Scripts for Invoice--}}
    <script>
        jQuery(document).ready(function($){
            var url = "{!! route('notaries.json',[$notary->id,'invoices']) !!}";
            var table_selector = '.tbl-invoices';
            var table =  $('.table');

            var ooTable = $(table_selector).dataTable({

                "dom": '<"top"f>rt<"bottom"ilp><"clear">',
                processing: true,
                serverSide: true,
                "ajax": {
                    "url": "{!! route('notaries.json',[$notary->id,'invoices']) !!}",
                    "data": function ( d ) {
                        return $.extend( {}, d, {
                        } );
                    }
                },
                "searching": false,
                columns: [
                    { data: 'invoice_number', name: 'invoice_number', 'width': '20%'},
                    { data: 'due_date', name: 'due_date', 'width': '30%'},
                    { data: 'status', name: 'status', 'width': '20%'},
                    { data: 'actions', name: 'actions',searchable: "false", orderable: "false", 'width': '20%'},

                ],
                "aoColumnDefs" : [
                    {
                        "aTargets" : [0]
                    }
                ],
                "oLanguage" : {
                    //  sProcessing: '<span style="width:100%;"><img src="http://www.snacklocal.com/images/ajaxload.gif"></span>',
                },
                "bStateSave": true,
                "aaSorting" : [[0, 'asc']],
                "bSortClasses": false,
                "aLengthMenu" : [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] // change per page values here
                ],
                // set the initial value

                "iDisplayLength" : 10
            });

            // $('.dataTables_filter input[type="search"]').addClass('form-control'); // <-- add this line
        });
    </script>

    {{--Scripts for Estimates--}}
    <script>
        jQuery(document).ready(function($){
            var url = "{!! route('notaries.json',[$notary->id,'reports']) !!}";
            var table_selector = '.tbl-reports';
            var table =  $('.table');

            var ooTable = $(table_selector).dataTable({

                "dom": '<"top"f>rt<"bottom"ilp><"clear">',
                processing: true,
                serverSide: true,
                "ajax": {
                    "url": "{!! route('notaries.json',[$notary->id,'reports']) !!}",
                    "data": function ( d ) {
                        return $.extend( {}, d, {
                        } );
                    }
                },
                "searching": false,
                columns: [
                    { data: 'completion_date', name: 'completion_date', 'width': '30%'},
                    { data: 'tracking', name: 'tracking' ,'width': '20%'},
                    { data: 'is_completed', name: 'is_completed' ,  'width': '20%'},
                    { data: 'actions', name: 'actions',searchable: "false", orderable: "false", 'width': '20%'},

                ],
                "aoColumnDefs" : [
                    {
                        "aTargets" : [0]
                    }
                ],
                "oLanguage" : {
                    "sEmptyTable": "No Reports Under Notary"
                },
                "bStateSave": true,
                "aaSorting" : [[0, 'asc']],
                "bSortClasses": false,
                "aLengthMenu" : [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] // change per page values here
                ],
                // set the initial value

                "iDisplayLength" : 10
            });

            // $('.dataTables_filter input[type="search"]').addClass('form-control'); // <-- add this line
        });
    </script>
    {{--Scripts for contracts--}}
@endif