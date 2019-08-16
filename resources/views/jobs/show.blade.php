@extends('admin_template')
@section('breadcrumbs')
    {!! Breadcrumbs::render('jobs.show', $job) !!}
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
                        <a href="/jobs/{{ $job->id }}/edit" class="btn btn-danger">Edit</a>
                        <a href="/jobs/{{ $job->id }}/pdf" class="btn btn-danger">Print</a>
                        <a href="#" class="btn btn-danger">Convert Job</a>
                        <a href="/jobs" class="btn btn-danger">All Jobs</a>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="">
                    <div class="box box-default col-md-4 col-sm-12">
                        <div class="box-header">
                            <h3 class="box-title">Borrower Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <p><strong>Job Registered ID: </strong>{{ $job->registered_id }}</p>
                            <p><strong>Borrower: </strong>{{ $job->borrower }}</p>
                            <p><strong>Co-Borrower: </strong>{{ $job->coborrower }}</p>
                            <p><strong>Daytime phone: </strong><a href="tel:{{ $job->daytime_phone }}">{{ $job->daytime_phone }}</a></p>
                            <p><strong>Evening phone: </strong><a href="tel:{{ $job->evening_phone }}">{{ $job->evening_phone }}</a></p>
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="box box-default col-md-4 col-sm-12">
                        <div class="box-header">
                            <h3 class="box-title">Service Details </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <p><strong>Signing Address: </strong>{{ $job->signing_address }}</p>
                            <p><strong>Signing Date & Time: </strong><a id="service_date_time" >{{ date('l F jS, Y g:i A', strtotime($job->date . $job->time)) }}</a></p>
                            <p><strong>Property Address: </strong>{{ $job->property_address }}</p>
                            <p><strong>Packages: </strong>{{ $job->packages }}</p>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="box box-default col-md-4 col-sm-12">
                        <div class="box-header">
                            <h3 class="box-title">Job Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <p><strong>Job Registered ID: </strong>{{ $job->registered_id }}</p>
                            <p><strong>Status: </strong>{{ $job->status }}</p>
                            <p><strong>Report: </strong><a href="/reports/{{\App\Report::where('job_id',$job->id)->value('id')}}">View Report</a></p>
                        @if($job->customer_id)
                                <p><strong>Customer: </strong><a href="/customers/{{$job->customer_id}}">{{ \App\Customer::find($job->customer_id)->name }} {{ \App\Customer::find($job->customer_id)->company }}</a></p>
                            @endif
                            @if($job->notary_id)
                                <p><strong>Notary: </strong><a href="/notaries/{{$job->notary_id}}">{{ \App\Notary::find($job->notary_id)->first_name }} {{ \App\Notary::find($job->notary_id)->last_name }} {{ \App\Notary::find($job->notary_id)->business_name }}</a></p>
                            @endif
                            <p><strong>Notary Fee: </strong>${{ number_format($job->notary_fee, 2, '.', ',') }}</p>

                        </div>
                    </div>
                </div>

            </div>
            {{--            @if($jobs->count() || $invoices->count() || $reports->count() )--}}

            {{--            <hr style="width: 100%;height: 1px; color: gray;background-color: gray">--}}

            {{--            <div class="row">--}}
            {{--                <div class="box box-default col-md-12 col-sm-12">--}}
            {{--                    <div class="box-header">--}}
            {{--                    </div>--}}
            {{--                    <div class="box-body">--}}
            {{--                        <ul class="nav nav-tabs">--}}
            {{--                            <li role="presentation" class="active"><a data-toggle="tab" href="#jobs">Jobs</a></li>--}}
            {{--                            <li role="presentation"><a data-toggle="tab" href="#invoices">Invoices</a></li>--}}
            {{--                            <li role="presentation"><a data-toggle="tab" href="#reports">Completion Reports</a></li>--}}
            {{--                        </ul>--}}
            {{--                        <div class="tab-content">--}}
            {{--                            <div class="tab-pane active" id="jobs">--}}
            {{--                                <table class="table table-condensed tbl-jobs">--}}
            {{--                                    <thead>--}}
            {{--                                    <tr>--}}
            {{--                                        <th>Registered ID</th>--}}
            {{--                                        <th>Client</th>--}}
            {{--                                        <th>Date</th>--}}
            {{--                                        <th>Status</th>--}}
            {{--                                    </tr>--}}
            {{--                                    </thead>--}}
            {{--                                    <tbody>--}}

            {{--                                    </tbody>--}}
            {{--                                </table>--}}
            {{--                            </div>--}}

            {{--                            <div class="tab-pane" id="invoices">--}}
            {{--                                <table class="table table-condensed tbl-invoices">--}}
            {{--                                    <thead>--}}
            {{--                                    <tr>--}}
            {{--                                        <th>Invoice Number</th>--}}
            {{--                                        <th>Job Registered ID</th>--}}
            {{--                                        <th>Date</th>--}}
            {{--                                        <th>Status</th>--}}
            {{--                                    </tr>--}}
            {{--                                    </thead>--}}
            {{--                                    <tbody>--}}

            {{--                                    </tbody>--}}
            {{--                                </table>--}}
            {{--                            </div>--}}

            {{--                            <div class="tab-pane" id="reports">--}}
            {{--                                <table class="table table-condensed tbl-reports">--}}
            {{--                                    <thead>--}}
            {{--                                    <tr>--}}
            {{--                                        <th>Job Registered ID</th>--}}
            {{--                                        <th>Date</th>--}}
            {{--                                        <th>Status</th>--}}
            {{--                                    </tr>--}}
            {{--                                    </thead>--}}
            {{--                                    <tbody>--}}

            {{--                                    </tbody>--}}
            {{--                                </table>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}

            {{--                </div>--}}
            {{--            </div>--}}
            {{--            @endif--}}

        </section>
    </div>
</div>



@endsection
