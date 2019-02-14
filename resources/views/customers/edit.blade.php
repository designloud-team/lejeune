@extends('admin_template')

@section('breadcrumbs')
    {!! Breadcrumbs::render('customers.edit', $customer) !!}
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Display Validation Errors -->
        @if($customer)
            @include('common.errors')

            {!! Form::model($customer, [
                'method' => 'PATCH',
                'route' => ['customers.update', $customer->id]
            ]) !!}

            <div class="col-sm-12 fieldset">
                <div class="box box-default">
                    <div class="box-header">
                      <h3 class="box-title">Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <div class="form-group">
                            {!! Form::label('company', 'Company:', ['class' => 'control-label']) !!}
                            {!! Form::text('company', $customer->company, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
                            {!! Form::text('name',  $customer->name, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone_number', 'Phone number: *', ['class' => 'control-label']) !!}
                            {!! Form::text('phone_number',  $customer->phone_number, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('mobile', 'Mobile:', ['class' => 'control-label']) !!}
                            {!! Form::text('mobile',  $customer->mobile, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                            {!! Form::text('email',  $customer->email, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('display_name', 'Display Name:', ['class' => 'control-label']) !!}
                            {!! Form::text('display_name',  $customer->display_name, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>
                                {!! Form::checkbox('use_display_name',$customer->use_display_name == 1 ? '1' : '0', ['class' => 'form-control']) !!}  Use Display name?
                            </label>

                        </div>
                        <div class="form-group">
                            {!! Form::label('website', 'Website:', ['class' => 'control-label']) !!}
                            {!! Form::text('website', $customer->website, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('shipping_address', 'Shipping Address, City, State, Zip:', ['class' => 'control-label']) !!}
                            {!! Form::text('shipping_address', $customer->shipping_address, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('billing_address', 'Billing Address, City, State, Zip:', ['class' => 'control-label']) !!}
                            {!! Form::text('billing_address',  $customer->billing_address, ['class' => 'form-control']) !!}
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col-sm-6 -->


        {!! Form::submit('Update Customer', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
        @endif
    </div>
</div>
@endsection
