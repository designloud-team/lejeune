@extends('admin_template')
@section('breadcrumbs')
    {!! Breadcrumbs::render('orders.show', $order) !!}
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
                        <a href="/orders/{{ $order->id }}/edit" class="btn btn-danger">Edit</a>
                        <a href="/orders/{{ $order->id }}/pdf" class="btn btn-danger">Print/Download</a>
                        <a href="#" class="btn btn-danger">Convert to Job</a>
                        <a href="/orders" class="btn btn-danger">All Orders</a>
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="">
                    <div class="box box-default col-md-6 col-sm-12">
                        <div class="box-header">
                          <h3 class="box-title">Order Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <p><strong>Type: </strong>{{ $order->type }}</p>
                            <p><strong>Is Business Name: </strong>{{ $order->is_business?'Yes':'No' }}</p>
                            <p><strong>Name: </strong>{{ $order->name }}</p>
                            <p><strong>Company: </strong>{{ $order->company }}</p>
                            <p><strong>Phone: </strong><a href="tel:{{ $order->phone }}">{{ $order->phone }}</a></p>
                            <p><strong>Email: </strong><a href="mailto:{{ $order->email }}">{{ $order->email }}</a></p>

                        </div>
                    </div>
                    </div>

                <div class="">
                    <div class="box box-default col-md-6 col-sm-12">
                        <div class="box-header">
                            <h3 class="box-title">Service </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">

                            <p><strong>Service Address: </strong>{{ $order->service_address }}</p>
                            <p><strong>Service Date & Time: </strong><a id="service_date_time" >{{ date('l F jS, Y', strtotime($order->service_date)) }} {{ date('g:i A', strtotime($order->service_time) )}}</a></p>
                            <p><strong>People: </strong>{{ $order->people }}</p>
                            <p><strong>Packages: </strong>{{ $order->packages }}</p>
                            <p><strong>Service: </strong>{{ $order->service }}</p>
                            <p><strong>Comments: </strong>{{ $order->comment }}</p>

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
