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
                                                                    <h1>Notary Registration</h1>
                                                                    <p>We work with companies all across the United States. If you provide Notary Services in any of the 50 states, please use the form below to add your business to our online database or update your existing information.</p>
                                                                    <p><strong>All fields marked with an asterisk (*) are Required</strong></p>
                                                                    {!! Form::open() !!}
                                                                    <div id="step-1">
                                                                        <p><span style="text-decoration: underline">Step 1: Check to see if you are already listed in our database</span> </p>
                                                                       <br>
                                                                        <div class="form-group">
                                                                        <div class="col-md-1">
                                                                            {!! Form::label('email','Email:',['class'=> 'control-label']) !!}
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            {!! Form::email('email',null,['class'=> 'form-control']) !!}
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            {!! Form::submit('Search',['class'=> 'btn btn-link']) !!}
                                                                        </div>
                                                                        <div id="step-2">

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
                    </article>

                </div>
            </div>
        </div>
    </div>
@endsection
