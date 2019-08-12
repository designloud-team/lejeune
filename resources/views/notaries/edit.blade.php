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
                                    {!! Form::checkbox('local', $notary->local, null, ['class' => 'form-control']) !!} Is this a Local Notary?
                                </label>
                            </div>
                            <div class="box-body pad">
                                <div class="form-group col-md-12" style="">
                                    <div class="form-group col-md-6">
                                        {!! Form::label('state', 'State:', ['class' => 'control-label']) !!}
                                        {!! Form::select('state', ['Select State' => $states], $notary->state,['class' => 'form-control selectpicker']) !!}
                                    </div>

                                    <div class="form-group col-md-6">
                                        {!! Form::label('first_name', 'First name: *', ['class' => 'control-label']) !!}
                                        {!! Form::text('first_name', $notary->first_name, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group col-md-6">
                                        {!! Form::label('last_name', 'Last name:', ['class' => 'control-label']) !!}
                                        {!! Form::text('last_name', $notary->last_name, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('business_name', 'Business name:', ['class' => 'control-label']) !!}
                                        {!! Form::text('business_name', $notary->business_name, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group col-md-12">
                                        {!! Form::label('mailing_address', 'Mailing Address:', ['class' => 'control-label']) !!}
                                        {!! Form::text('mailing_address', $notary->mailing_address, ['class' => 'form-control', 'required',  'id' => 'mailing_address']) !!}
                                    </div>
                                    <div class="form-group col-md-12">
                                        {!! Form::checkbox('same_as_mailing',$notary->mailing_address == $notary->delivery_address? 1: 0, null, ['class' => 'form-control', 'id' => 'same_as_mailing']) !!}
                                        {!! Form::label('same_as_mailing', 'Delivery same as Mailing address?', ['class' => 'control-label']) !!}
                                    </div>
                                    <div class="form-group col-md-12">
                                        {!! Form::label('delivery_address', 'Delivery Address:', ['class' => 'control-label']) !!}
                                        {!! Form::text('delivery_address', $notary->delivery_address, ['class' => 'form-control', 'id' => 'delivery_address' ]) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                                        {!! Form::text('email', $notary->email, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('phone', 'Phone:', ['class' => 'control-label']) !!}
                                        {!! Form::text('phone', $notary->phone, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('alternate_phone', 'Alternate Phone:', ['class' => 'control-label']) !!}
                                        {!! Form::text('alternate_phone',  $notary->alternate_phone, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('fax', 'Fax:', ['class' => 'control-label']) !!}
                                        {!! Form::text('fax', $notary->fax, ['class' => 'form-control']) !!}
                                    </div>  <div class="form-group col-md-6">
                                        {!! Form::label('website', 'Website:', ['class' => 'control-label']) !!}
                                        {!! Form::text('website', $notary->website, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-md-12" style="">
                                        <label>
                                            {!! Form::checkbox('e_docs', $notary->edocs,null, ['class' => 'form-control']) !!}  Do you use E Docs?
                                        </label>
                                    </div>
                                    <div class="form-group col-md-12" style="">
                                        <label>
                                            {!! Form::checkbox('insurance', $notary->insurance, null , ['class' => 'form-control', 'id' => 'insurance']) !!}  Do you have insurance?
                                        </label>
                                    </div>
                                    <div class="form-group col-md-6" id="insurance_amount">
                                        {!! Form::label('insurance_amount', 'Insurance Amount:', ['class' => 'control-label']) !!}
                                        {!! Form::text('insurance_amount', $notary->insurance_amount, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('ssn_or_ein', 'SSN or EIN:', ['class' => 'control-label']) !!}
                                        {!! Form::text('ssn_or_ein', $notary->ssn_or_ein, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col-sm-6 -->
                <div class="col-md-12">

                {!! Form::submit('Update Notary', ['class' => 'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            @endif
        </div>
    </div>
@endsection
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#same_as_mailing').on('ifChecked', function (e) {
                    // if($(this).is(':checked')) {
                    $('#delivery_address').val($('#mailing_address').val());
                    // }
                })
                $('#same_as_mailing').on('ifUnchecked', function (e) {
                    // if($(this).is(':checked')) {
                    $('#delivery_address').val('');
                    // }
                })
                // $('#insurance_amount').css('display', 'none');
                $('#insurance').on('ifChecked', function (e) {
                    // if($(this).is(':checked')) {
                    $('#insurance_amount').css('display', 'block');
                    // }
                })
                $('#insurance').on('ifUnchecked', function (e) {
                    // if($(this).is(':checked')) {
                    $('#insurance_amount').css('display', 'none');
                    // }
                })
            })
        </script>
