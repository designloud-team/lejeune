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
                                {!! Form::checkbox('local', 0, null, ['class' => 'form-control']) !!} Is this a Local Notary?
                            </label>
                        </div>
                        <div class="box-body pad">
                            <div class="form-group col-md-12" style="">
                                <div class="form-group col-md-6">
                                    {!! Form::label('state', 'State:', ['class' => 'control-label']) !!}
                                    {!! Form::select('state', ['Select State' => $states], 'NC',['class' => 'form-control selectpicker', 'required']) !!}
                                </div>

                                <div class="form-group col-md-6">
                                    {!! Form::label('first_name', 'First name: *', ['class' => 'control-label']) !!}
                                    {!! Form::text('first_name', null, ['class' => 'form-control', 'required']) !!}
                                </div>

                                <div class="form-group col-md-6">
                                    {!! Form::label('last_name', 'Last name:*', ['class' => 'control-label']) !!}
                                    {!! Form::text('last_name', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('business_name', 'Business name:', ['class' => 'control-label']) !!}
                                    {!! Form::text('business_name', null, ['class' => 'form-control']) !!}
                                </div>
                                <hr class="hr">
                                <div class="form-group col-md-6">
                                    {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                                    {!! Form::text('email', null, ['class' => 'form-control', 'required']) !!}
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
                                <hr class="hr">


                                <div class="form-group col-md-6">
                                    {!! Form::label('mailing_address', 'Mailing Address:', ['class' => 'control-label']) !!}
                                    {!! Form::text('mailing_address', null, ['class' => 'form-control', 'required',  'id' => 'mailing_address']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('delivery_address', 'Delivery Address:', ['class' => 'control-label']) !!}
                                    {!! Form::text('delivery_address', null, ['class' => 'form-control', 'id' => 'delivery_address' ]) !!}
                                </div>
                                <div class="form-group col-md-12">
                                    {!! Form::checkbox('same_as_mailing', 0, null, ['class' => 'form-control', 'id' => 'same_as_mailing']) !!}
                                    {!! Form::label('same_as_mailing', 'Delivery same as Mailing address?', ['class' => 'control-label']) !!}
                                </div>

                                <hr class="hr">


                                <div class="form-group col-md-12" style="">
                                    <label>
                                        {!! Form::checkbox('e_docs', 0, null,['class' => 'form-control']) !!}  Do you use E Docs?
                                    </label>
                                </div>
                                <div class="form-group col-md-12" style="">
                                    <label>
                                        {!! Form::checkbox('insurance', 0, null, ['class' => 'form-control', 'id' => 'insurance']) !!}  Do you have insurance?
                                    </label>
                                </div>
                                <div class="form-group col-md-6" id="insurance_amount">
                                    {!! Form::label('insurance_amount', 'Insurance Amount:', ['class' => 'control-label']) !!}
                                    {!! Form::text('insurance_amount', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group col-md-6">
                                    {!! Form::label('ssn_or_ein', 'SSN or EIN:', ['class' => 'control-label']) !!}
                                    {!! Form::text('ssn_or_ein', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-12">
                                    {!! Form::label('notes', 'Notes:', ['class' => 'control-label']) !!}
                                    {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
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
    </div>
@endsection

@push('scripts')
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
        $('#insurance_amount').css('display', 'none');
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
    @endpush