@extends('public_template')
<style>

</style>
@section('content')
    <div class="fl-page-content" itemprop="mainContentOfPage">
        <div class="fl-content-full container">
            <div class="row">
                <div class="fl-content col-md-12">
                    <article class="fl-post post-29 page type-page status-publish hentry" id="fl-post-29" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <div class="fl-post-content clearfix" itemprop="text">
                            <div class="fl-builder-content fl-builder-content-29 fl-builder-content-primary" data-post-id="29"><div class="fl-row fl-row-fixed-width fl-row-bg-none fl-node-597024aa3a04d" data-node="597024aa3a04d">
                                    <div class="fl-row-content-wrap">
                                        <div class="fl-row-content fl-row-fixed-width fl-node-content">
                                            <div class="fl-col-group fl-node-597024aa3b763" data-node="597024aa3b763">
                                                <div class="fl-col fl-node-597024aa3b8ce" data-node="597024aa3b8ce">
                                                    <div class="fl-col-content fl-node-content">
                                                        <div class="fl-module fl-module-rich-text fl-node-597024aa39c32" data-node="597024aa39c32">
                                                            <div class="fl-module-content fl-node-content">
                                                                <div class="fl-rich-text">
                                                                    <h1>New Notary</h1>
                                                                    <p><strong>All fields marked with an asterisk (*) are Required</strong></p>
                                                                    <div class="col-sm-12 fieldset">
                                                                        {!! Form::open([
                                                                          'route' => 'notaries.save'
                                                                            ]) !!}
                                                                        <div class="box box-default">

                                                                            <!-- /.box-header -->
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
                                                                                    {!! Form::label('last_name', 'Last name:', ['class' => 'control-label']) !!}
                                                                                    {!! Form::text('last_name', null, ['class' => 'form-control', 'required']) !!}
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    {!! Form::label('business_name', 'Business name:', ['class' => 'control-label']) !!}
                                                                                    {!! Form::text('business_name', null, ['class' => 'form-control']) !!}
                                                                                </div>

                                                                                <div class="form-group col-md-12">
                                                                                    {!! Form::label('mailing_address', 'Mailing Address:', ['class' => 'control-label']) !!}
                                                                                    {!! Form::text('mailing_address', null, ['class' => 'form-control', 'required',  'id' => 'mailing_address']) !!}
                                                                                </div>
                                                                                <div class="form-group col-md-12">
                                                                                    {!! Form::label('same_as_mailing', 'Delivery same as Mailing address?', ['class' => 'control-label']) !!}
                                                                                    {!! Form::checkbox('same_as_mailing', 0, null, ['class' => 'form-control', 'id' => 'same_as_mailing']) !!}
                                                                                </div>
                                                                                <div class="form-group col-md-12">
                                                                                    {!! Form::label('delivery_address', 'Delivery Address:', ['class' => 'control-label']) !!}
                                                                                    {!! Form::text('delivery_address', null, ['class' => 'form-control', 'id' => 'delivery_address' ]) !!}
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                                                                                    {!! Form::text('email', $email? $email: '', ['class' => 'form-control']) !!}
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    {!! Form::label('phone', 'Phone:', ['class' => 'control-label']) !!}
                                                                                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    {!! Form::label('alternate_phone', 'Alternate phone:', ['class' => 'control-label']) !!}
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
                                                                                        {!! Form::checkbox('e_docs', 0, null, ['class' => 'form-control']) !!}  Do you use E Docs?
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
                                                                            </div>
                                                                        </div><!-- /.box-body -->
                                                                        <div class="form-group col-md-12">
                                                                            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                                                        </div>
                                                                        {!! Form::close() !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

@endsection
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