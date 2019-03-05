@extends('admin_template')

@section('breadcrumbs')
    {!! Breadcrumbs::render() !!}
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Display Validation Errors -->
            @include('common.errors')
            <h3 class="box-title">Add new notary details</h3>
            <div class="col-sm-12 fieldset">
                {!! Form::open([
                  'route' => 'notaries.store'
                    ]) !!}
                <div class="box box-default">

                <!-- /.box-header -->
                    <div class="box-body pad">
                        <div class="form-group col-md-12" style="">
                            <label>
                                {!! Form::checkbox('local', null, ['class' => 'form-control']) !!} Is this a Local Notary?
                            </label>
                        </div>
                        <div class="box-body pad">
                            <div class="form-group col-md-12" style="">
                                <div class="form-group col-md-6">
                                    {!! Form::label('state', 'State:', ['class' => 'control-label']) !!}
                                    {!! Form::select('state', ['Select State' => $states], 'NC',['class' => 'form-control selectpicker']) !!}
                                </div>

                                <div class="form-group col-md-6">
                                    {!! Form::label('first_name', 'First name: *', ['class' => 'control-label']) !!}
                                    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-6">
                                    {!! Form::label('last_name', 'Last name:', ['class' => 'control-label']) !!}
                                    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('business_name', 'Business name:', ['class' => 'control-label']) !!}
                                    {!! Form::text('business_name', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-12">
                                    {!! Form::label('mailing_address', 'Mailing Address:', ['class' => 'control-label']) !!}
                                    {!! Form::text('mailing_address', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-12">
                                    {!! Form::label('delivery_address', 'Delivery Address:', ['class' => 'control-label']) !!}
                                    {!! Form::text('delivery_address', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('phone', 'Phone:', ['class' => 'control-label']) !!}
                                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('alternate_phone', 'Alternate Phone:', ['class' => 'control-label']) !!}
                                    {!! Form::text('alternate_phone', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('fax', 'Fax:', ['class' => 'control-label']) !!}
                                    {!! Form::text('fax', null, ['class' => 'form-control']) !!}
                                </div>  <div class="form-group col-md-6">
                                    {!! Form::label('website', 'Website:', ['class' => 'control-label']) !!}
                                    {!! Form::text('website', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-12" style="">
                                    <label>
                                        {!! Form::checkbox('e_docs', null, ['class' => 'form-control']) !!}  Do you use E Docs?
                                    </label>
                                </div>
                                <div class="form-group col-md-12" style="">
                                    <label>
                                        {!! Form::checkbox('insurance', null, ['class' => 'form-control']) !!}  Do you have insurance?
                                    </label>
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('insurance_amount', 'Insurance Amount:', ['class' => 'control-label']) !!}
                                    {!! Form::text('insurance_amount', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('ssn_or_ein', 'SSN or EIN:', ['class' => 'control-label']) !!}
                                    {!! Form::text('ssn_or_ein', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                <div class="form-group col-md-12">
                    {!! Form::submit('Create New Notary', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div><!-- /.col-sm-12 -->
        </div>
    </div>
    </div>
@endsection

