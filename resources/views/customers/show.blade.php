@extends('admin_template')
@section('breadcrumbs')
    {!! Breadcrumbs::render('customers.show', $customer) !!}
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
                        <a href="/customers/{{ $customer->id }}/edit" class="btn btn-danger">Edit</a>
                       <a href="/customers" class="btn btn-danger">Back</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="">
                    <div class="box box-default col-md-6 col-sm-12">
                        <div class="box-header">
                            <h3>Customer:</h3>
{{--                          <h3 class="box-title">Customer: {{ $customer->use_display_name == 1 ? $customer->display_name: $customer->name }}</h3>--}}
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <p><strong>Name: </strong>{{ $customer->name }}</p>
                            <p><strong>Company: </strong>{{ $customer->company }}</p>
                            <p><strong>Display: </strong>{{ $customer->display_name }}</p>
                            <p><strong>Use Display Name: </strong>{{ $customer->use_display_name == 1 ? 'Yes': 'No' }}</p>
                            <p><strong>Website: </strong>{{ $customer->website }}</p>
                        </div>
                        
                    </div>
                </div><!-- /.col-xs-12 -->
                <div class="">
                    <div class="box box-default col-md-6 col-sm-12">
                        <div class="box-header">
                            <h3 class="box-title">Contact Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <p><strong>Email: </strong><a href="mailto:{{$customer->email}}">{{ $customer->email }}</a></p>
                            <p><strong>Phone: </strong><a href="tel:{{$customer->phone_number}}">{{ $customer->phone_number }}</a></p>
                            <p><strong>Billing: </strong><a data-toggle="tooltip" data-placement="top" title="Click to copy" class="copy" style="font-size: 14px"> {{ $customer->billing_address }} </a></p>
                            <p><strong>Shipping: </strong> <a data-toggle="tooltip" data-placement="top" title="Click to copy" class="copy" style="font-size: 14px" >{{ $customer->shipping_address }} </a></p>
                        </div>

                    </div>
                </div><!-- /.col-xs-12 -->
            </div><!-- /.row -->
            @if($jobs->count() || $invoices->count() )

                <hr style="width: 100%;height: 1px; color: gray;background-color: gray">

                <div class="row">
                <div class="box box-default col-md-12 col-sm-12">
                    <div class="box-header">
                    </div>
                    <div class="box-body">
                        <ul class="nav nav-tabs">
                            <li role="presentation" class="active"><a data-toggle="tab" href="#jobs">Jobs</a></li>
                            <li role="presentation"><a data-toggle="tab" href="#invoices">Invoices</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="jobs">
                                <table class="table table-condensed tbl-jobs">
                                    <thead>
                                    <tr>
                                        <th>Registered ID</th>
                                        <th>Client</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane" id="invoices">
                                <table class="table table-condensed tbl-invoices">
                                    <thead>
                                    <tr>
                                        <th>Invoice Number</th>
                                        <th>Job Registered ID</th>
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
    <div class="row">
        <div class="box">

        </div>
    </div>

</div>
@endsection
