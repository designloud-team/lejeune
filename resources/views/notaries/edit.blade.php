@extends('admin_template')

@section('breadcrumbs')
    {!! Breadcrumbs::render('notaries.edit', $notary) !!}
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Display Validation Errors -->
            @if($notary)
                @include('common.errors')

                {!! Form::model($notary, [
                    'method' => 'PATCH',
                    'route' => ['notaries.update', $notary->id]
                ]) !!}

                <div class="col-sm-12 fieldset">
                    <div class="box box-default">
                        <div class="box-header">
                            <h3 class="box-title">Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <div class="form-group col-md-12" style="">
                                <label>
                                    {!! Form::checkbox('local', null, ['class' => 'form-control']) !!}  Use Display name?
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('state', 'State:', ['class' => 'control-label']) !!}
                                {!! Form::select('state', ['states' => 'States','state' => 'States'], ['class' => 'form-control selectpicker']) !!}
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
                                {!! Form::label('phone', 'phone:', ['class' => 'control-label']) !!}
                                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('alternate_phone', 'alternate_phone:', ['class' => 'control-label']) !!}
                                {!! Form::text('alternate_phone', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('fax', 'fax:', ['class' => 'control-label']) !!}
                                {!! Form::text('fax', null, ['class' => 'form-control']) !!}
                            </div>  <div class="form-group col-md-6">
                                {!! Form::label('website', 'Website:', ['class' => 'control-label']) !!}
                                {!! Form::text('website', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-12" style="">
                                <label>
                                    {!! Form::checkbox('e_docs', null, ['class' => 'form-control']) !!}  e_docs?
                                </label>
                            </div>
                            <div class="form-group col-md-12" style="">
                                <label>
                                    {!! Form::checkbox('insurance', null, ['class' => 'form-control']) !!}  insurance?
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('insurance_amount', 'insurance_amount:', ['class' => 'control-label']) !!}
                                {!! Form::text('insurance_amount', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('ssn_or_ein', 'ssn_or_ein:', ['class' => 'control-label']) !!}
                                {!! Form::text('ssn_or_ein', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('notes', 'notes:', ['class' => 'control-label']) !!}
                                {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col-sm-6 -->
                <div class="col-md-12">

                {!! Form::submit('Update Customer', ['class' => 'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            @endif
        </div>
    </div>
@endsection
