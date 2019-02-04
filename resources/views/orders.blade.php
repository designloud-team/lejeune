@extends('public_template')
<style>
    label {
        font-size: 18px!important;
        font-weight:bold
    }
    input[type="radio"]+span{
        font-size: 16px!important;
        font-weight: 600;

    }
    input[type="radio"]:checked+span{
        font-size: 16px!important;
        color: #821a1a;
        font-weight: 600;
    }
    .btn.btn-primary {
       padding: 10px 20px;
        width: 200px;
        text-align: center;
    }
    .underline {
        text-decoration:underline
    }
    #order-form {
        width:95%;
        padding: 2%;
        height: 100%;
        margin:2% auto;
        background:#fff;
        border-left: 5px solid #821a1a;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        /*border-left: 3px solid #821a1a;*/
        -webkit-box-shadow: 5px 12px 18px -6px rgba(0,0,0,0.3)!important;
        -moz-box-shadow:  5px 12px 18px -6px rgba(0,0,0,0.3)!important;
        box-shadow: 5px 12px 18px -6px rgba(0,0,0,0.3)!important;
    }
</style>
@section('content')
    <div class="fl-page-content" itemprop="mainContentOfPage">
        <div class="fl-content-full container">
            <div class="row">
                <div class="fl-content col-md-12">
                    <article class="fl-post post-27 page type-page status-publish hentry" id="fl-post-27" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <div class="fl-post-content clearfix" itemprop="text">
                            <div class="fl-builder-content fl-builder-content-27 fl-builder-content-primary" data-post-id="27"><div class="fl-row fl-row-fixed-width fl-row-bg-none fl-node-59716e03432a9" data-node="59716e03432a9">
                                    <div class="fl-row-content-wrap">
                                        <div class="fl-row-content fl-row-fixed-width fl-node-content">
                                            <div class="fl-col-group fl-node-59716e034451f" data-node="59716e034451f">
                                                <div class="fl-col fl-node-59716e0344691" data-node="59716e0344691">
                                                    <div class="fl-col-content fl-node-content">
                                                        <div class="fl-module fl-module-rich-text fl-node-59716e0342eaf" data-node="59716e0342eaf">
                                                            <div class="fl-module-content fl-node-content">
                                                                <div class="fl-rich-text">
                                                                    <h1>Schedule Your Signing Online/Request a FREE Quote</h1>
                                                                    <p>We are pleased to provide our mobile notary services 24 hours a day, 7 days a week, 365 days a year. If you would like to schedule our services, or simply receive a FREE quote for services, please fill out the request form below:</p>
                                                                    <hr>
                                                                    <h3>Notary Request Form</h3>
                                                                    <p>Please use the form below to submit your request for our mobile notary services and/or recieve a FREE quote. All fields marked with an asterisk (*) are required.</p>
                                                                    <p><span style="font-size: 14px; color: #821a1a;">IMPORTANT NOTE: If you need a notary within the next 24 hours or less, please DO NOT use the online form below; call us at&nbsp;<a href="tel:7036265911"><u>703.626.5911</u></a></span></p>
                                                                </div>
                                                                {!! Form::open(['action' => 'OrderController@store', 'id'=> 'order-form']) !!}
                                                                        <div class="form-group">
                                                                            {!! Form::label('type', 'Request Type:', ['class' => 'control-label underline'])  !!}
                                                                            <br><label>{!! Form::radio('type','quote',['class' => 'form-control radio']); !!} <span>FREE Quote</span></label>
                                                                            <br><label>{!! Form::radio('type' ,'appointment',['class' => 'form-control radio']); !!} <span>Schedule An Appointment</span></label>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            {!! Form::label('is_business', 'I/We are:', ['class' => 'control-label underline'])  !!}
                                                                            <br>{!! Form::radio('is_business','business',['class' => 'form-control radio']); !!} <span>A Business or Corporation</span>
                                                                            <br>{!! Form::radio('is_business' ,'individual',['class' => 'form-control radio']); !!} <span>An Individual</span>
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            {!! Form::label('name', 'Name', ['class' => 'control-label'])  !!}
                                                                            {!! Form::text('name',null,['class' => 'form-control', 'placeholder'=> 'Your name']); !!}

                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            {!! Form::label('company', 'Company Name', ['class' => 'control-label'])  !!}
                                                                            {!! Form::text('company',null,['class' => 'form-control','placeholder'=> 'Your company name']); !!}
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            {!! Form::label('phone', 'Phone', ['class' => 'control-label'])  !!}
                                                                            {!! Form::text('phone',null,['class' => 'form-control','placeholder'=> 'Your phone']); !!}
                                                                        </div>
                                                                        <div class="form-group col-md-8">
                                                                            {!! Form::label('service_address', 'Location of Signing', ['class' => 'control-label'])  !!}
                                                                            {!! Form::text('service_address',null,['class' => 'form-control','placeholder'=> 'Signing Address']); !!}
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            {!! Form::label('service_date', 'Date Needed', ['class' => 'control-label'])  !!}
                                                                            {!! Form::date('service_date',null,['class' => 'form-control']); !!}
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            {!! Form::label('service_time', 'Time Needed', ['class' => 'control-label'])  !!}
                                                                            {!! Form::time('service_time',null,['class' => 'form-control']); !!}
                                                                        </div>
                                                                        <h4 class="underline">To help us serve you better, please provide the following information
                                                                            (Optional)</h4>
                                                                        <div class="form-group col-md-2">
                                                                            {!! Form::label('people', 'No. of People', ['class' => 'control-label'])  !!}
                                                                            {!! Form::number('people',1,['class' => 'form-control','placeholder'=> '1-100', 'min'=> '1', 'max'=> '100']); !!}
                                                                        </div>
                                                                        <div class="form-group col-md-2">
                                                                            {!! Form::label('packages', 'No. of Packages', ['class' => 'control-label'])  !!}
                                                                            {!! Form::number('packages',1,['class' => 'form-control','placeholder'=> '1-100', 'min'=> '1', 'max'=> '100']); !!}
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            {!! Form::label('service','Service',['class' => 'control-label']); !!}
                                                                            {!! Form::text('service', null,['class' => 'form-control','placeholder'=> 'POA, Title, Will, Loan .. etc']); !!}
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            {!! Form::label('comment','Comments',['class' => 'control-label']); !!}
                                                                            {!! Form::textarea('comment', null,['class' => 'form-control','placeholder'=> 'Your comments .. ', 'rows'=> '5']); !!}
                                                                        </div>
                                                                        <div class="form-group">
                                                                            {!! Form::submit('Submit', ['class' => 'btn btn-primary pull-left']); !!}
                                                                        </div>

                                                                {!! Form::close() !!}

                                                            </div>
                                                        </div>


                                                        <div id="notary-registration-form" class="fl-module fl-module-widget fl-node-59716e3fdcef8" data-node="59716e3fdcef8">
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
