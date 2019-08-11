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
                    <div class="box box-default col-md-6">
                        <div class="box-header">
                            <h3>Customer:</h3>
{{--                          <h3 class="box-title">Customer: {{ $customer->use_display_name == 1 ? $customer->display_name: $customer->name }}</h3>--}}
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <p><strong>Name: </strong>{{ $customer->name }}</p>
                            <p><strong>Company: </strong>{{ $customer->company }}</p>
                            <p><strong>Display: </strong>{{ $customer->display_name }}</p>
                            <p><strong>Use Display Name: </strong>{{ $customer->use_display_name == 1 ? 'yes': 'no' }}</p>
                            <p><strong>Website: </strong>{{ $customer->website }}</p>
                        </div>
                        
                    </div>
                </div><!-- /.col-xs-12 -->
                <div class="">
                    <div class="box box-default col-md-6">
                        <div class="box-header">
                            <h3 class="box-title">Contact Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <p><strong>Email: </strong><a href="mailto:{{$customer->email}}">{{ $customer->email }}</a></p>
                            <p><strong>Phone: </strong><a href="tel:{{$customer->phone_number}}">{{ $customer->phone_number }}</a></p>
                            <p><strong>Billing: </strong>{{ $customer->billing_address }} <a class=""> Copy </a></p>
                            <p><strong>Shipping: </strong>{{ $customer->shipping_address }} <a class=""> Copy </a></p>
                        </div>

                    </div>
                </div><!-- /.col-xs-12 -->
            </div><!-- /.row -->
        </section>
    </div>
</div>
@endsection
