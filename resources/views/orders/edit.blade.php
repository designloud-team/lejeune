@extends('admin_template')

@section('breadcrumbs')
    {!! Breadcrumbs::render('orders.edit', $order) !!}
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Display Validation Errors -->
            @if($order)
                @include('common.errors')

                {!! Form::model($order, [
                    'method' => 'PATCH',
                    'route' => ['orders.update', $order->id]
                ]) !!}

                <div class="col-sm-12 fieldset">
                    <div class="box box-default">
                        <div class="box-header">
                            <h3 class="box-title">Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            {!! Form::open(['action' => 'OrderController@store', 'id'=> 'order-form', 'class' => 'dash']) !!}
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
                                {!! Form::text('name',$order->name,['class' => 'form-control', 'placeholder'=> 'Your name']); !!}

                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('company', 'Company Name', ['class' => 'control-label'])  !!}
                                {!! Form::text('company',$order->company,['class' => 'form-control','placeholder'=> 'Your company name']); !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('phone', 'Phone', ['class' => 'control-label'])  !!}
                                {!! Form::text('phone',$order->phone,['class' => 'form-control','placeholder'=> 'Your phone','required']); !!}
                            </div>
                            <div class="form-group col-md-8">
                                {!! Form::label('service_address', 'Location of Signing', ['class' => 'control-label'])  !!}
                                {!! Form::text('service_address',$order->service_address,['class' => 'form-control','placeholder'=> 'Signing Address', 'required']); !!}
                            </div>
                            <div class="form-group col-md-2">
                                {!! Form::label('service_date', 'Date Needed', ['class' => 'control-label'])  !!}
                                {!! Form::date('service_date',$order->service_date,['class' => 'form-control', 'service_date']); !!}
                            </div>
                            <div class="form-group col-md-2">
                                {!! Form::label('service_time', 'Time Needed', ['class' => 'control-label'])  !!}
                                {!! Form::time('service_time',$order->service_time,['class' => 'form-control', 'required']); !!}
                            </div>
                            <h4 class="underline">To help us serve you better, please provide the following information
                                (Optional)</h4>
                            <div class="form-group col-md-2">
                                {!! Form::label('people', 'No. of People', ['class' => 'control-label'])  !!}
                                {!! Form::number('people',$order->people,['class' => 'form-control','placeholder'=> '1-100', 'min'=> '1', 'max'=> '100','required']); !!}
                            </div>
                            <div class="form-group col-md-2">
                                {!! Form::label('packages', 'No. of Packages', ['class' => 'control-label'])  !!}
                                {!! Form::number('packages',$order->packages,['class' => 'form-control','placeholder'=> '1-100', 'min'=> '1', 'max'=> '100','required']); !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('service','Service',['class' => 'control-label']); !!}
                                {!! Form::text('service', $order->service,['class' => 'form-control','placeholder'=> 'POA, Title, Will, Loan .. etc']); !!}
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::label('comment','Comments',['class' => 'control-label']); !!}
                                {!! Form::textarea('comment', $order->comment,['class' => 'form-control','placeholder'=> 'Your comments .. ', 'rows'=> '5']); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Submit', ['class' => 'btn btn-primary pull-left']); !!}
                            </div>

                            {!! Form::close() !!}
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
