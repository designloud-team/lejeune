@extends('admin_template')
@section('breadcrumbs')
    {!! Breadcrumbs::render('reports.show', $report) !!}
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
                    <div class="pull-right btn-group">
{{--                        <a href="/reports/{{ $report->id }}/edit" class="btn btn-danger">Edit</a>--}}
                        <a href="/reports/{{ $report->id }}/pdf" class="btn btn-danger">Print</a>
                        <a href="#" class="btn btn-danger">Create Invoice</a>
                        <a href="/reports" class="btn btn-danger">All Reports</a>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="">
                    <div class="box box-default col-md-6 col-sm-12">
                        <div class="box-header">
                            <h3 class="box-title">Job Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <p><strong>Job Registered ID: </strong>{{ $job->registered_id }}</p>
                            @if($report->notary_id)
                            <p><strong>Notary: </strong><a href="/notaries/{{$notary->id}}">{{$notary->first_name}} {{$notary->last_name}} {{$notary->business_name}} </a></p>
                            <p><strong>Notary Fee: </strong>${{ number_format($job->notary_fee, 2, '.', ',') }}</p>
                            @endif
                            @if($report->customer_id)
                                <p><strong>Customer: </strong><a href="/customers/{{$report->customer_id}}">{{ \App\Customer::find($report->customer_id)->name }} {{ \App\Customer::find($report->customer_id)->company }}</a></p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="box box-default col-md-6 col-sm-12">
                        <div class="box-header">
                            <h3 class="box-title">Report Details </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <p><strong>Completion Date </strong><a id="completion_date" >{{ date('l F jS, Y', strtotime($report->completion_date)) }}</a></p>
                            <p><strong>Shipping Date </strong><a id="shipping_date" >{{ date('l F jS, Y', strtotime($report->shipping_date)) }}</a></p>
                            <p><strong>Tracking: </strong>{{ $report->tracking }}</p>
                            <p><strong>Courier: </strong>{{ $report->courier }}</p>
                            <p><strong>Packages: </strong>{{ $job->packages }}</p>
                            @if(!isset($report->is_completed))
                                <p><strong>Status: </strong>Newly Scheduled</p>
                            @elseif($report->is_completed === 0)
                                <p><strong>Status: </strong>Not Completed</p>
                                <p><strong>Explanation: </strong>{{ $report->explanation }}</p>
                            @elseif($report->is_completed === 1)
                                <p><strong>Status: </strong>Completed</p>
                            @elseif($report->is_completed === 2)
                                <p><strong>Status: </strong>Completed With Issues</p>
                                <p><strong>Explanation: </strong>{{ $report->explanation }}</p>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
                        @if($job->invoices && $job->invoices->count())

                        <hr style="width: 100%;height: 1px; color: gray;background-color: gray">

                        <div class="row">
                            <div class="box box-default col-md-12 col-sm-12">
                                <div class="box-header">
                                </div>
                                <div class="box-body">
                                    <ul class="nav nav-tabs">
                                        <li role="presentation"><a data-toggle="tab" href="#invoices">Invoices</a></li>
                                    </ul>
                                    <div class="tab-content">

                                        <div class="tab-pane" id="invoices">
                                            <table class="table table-condensed tbl-invoices">
                                                <thead>
                                                <tr>
                                                    <th>Invoice Number</th>
                                                    <th>Report Registered ID</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
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
                        @endif

        </section>
    </div>
</div>



@endsection
