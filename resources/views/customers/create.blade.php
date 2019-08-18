@extends('admin_template')
<style>
    .hr {
        width:100%;
        height: 1px;
        background:#666;
    }
</style>
@section('breadcrumbs')
    {!! Breadcrumbs::render() !!}
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
            <!-- Display Validation Errors -->
            @include('common.errors')
        <h3 class="page-header">Add new customer details</h3>
            <div class="col-sm-12 fieldset">
                {!! Form::open([
                  'route' => 'customers.store'
                    ]) !!}
                <div class="box box-default">
                    {{--<div class="box-header">--}}
                      {{--<h3 class="box-title">Customer Details</h3>--}}
                    {{--</div>--}}
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <div class="form-group col-md-6">
                            {!! Form::label('company', 'Company:', ['class' => 'control-label']) !!}
                            {!! Form::text('company', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-md-6">
                            {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>


                        <div class="form-group col-md-6">
                            {!! Form::label('display_name', 'Display Name:', ['class' => 'control-label']) !!}
                            {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-3" style="padding-top: 30px">
                            <label>
                                {!! Form::checkbox('use_display_name', 0, null, ['class' => 'form-control']) !!}  Use Display name?
                            </label>

                        </div>

                        <hr class="hr">

                        <div class="form-group col-md-6">
                            {!! Form::label('phone_number', 'Phone number: *', ['class' => 'control-label']) !!}
                            {!! Form::text('phone_number', null, ['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="form-group col-md-6">
                            {!! Form::label('mobile', 'Mobile:', ['class' => 'control-label']) !!}
                            {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('website', 'Website:', ['class' => 'control-label']) !!}
                            {!! Form::text('website', null, ['class' => 'form-control']) !!}
                        </div>

                        <hr class="hr">

                        <div class="form-group col-md-6">
                            {!! Form::label('shipping_address', 'Shipping Address:', ['class' => 'control-label']) !!}
                            {!! Form::text('shipping_address', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('billing_address', 'Billing Address:', ['class' => 'control-label']) !!}
                            {!! Form::text('billing_address', null, ['class' => 'form-control', 'id'=> 'billing_address', 'required']) !!}
                        </div>
                        <div class="form-group col-md-12">
                            {!! Form::checkbox('same_as_shipping', 0, null, ['class' => 'form-control', 'id' => 'same_as_shipping']) !!}
                            {!! Form::label('same_as_shipping', 'Billing same as Shipping address?', ['class' => 'control-label', 'id'=> 'shipping_address', 'required']) !!}
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                <div class="form-group col-md-12">
                {!! Form::submit('Create New Customer', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div><!-- /.col-sm-12 -->
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#same_as_shipping').on('ifChecked', function (e) {
            // if($(this).is(':checked')) {
            $('#billing_address').val($('#shipping_address').val());
            // }
        })
        $('#same_as_shipping').on('ifUnchecked', function (e) {
            // if($(this).is(':checked')) {
            $('#billing_address').val('');
            // }
        })
    })
</script>

