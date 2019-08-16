@extends('public_template')
<style>
    .fieldset {
        /*border: 1px solid gray!important;*/
        min-height: 400px!important;
        padding: 40px!important;
    }
    #submitBtn {
        position: relative;
        top: 25px!important;
    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Display Validation Errors -->
            @if($report)
                @include('common.errors')

                {!! Form::model($report, [
                    'method' => 'PATCH',
                    'route' => ['report.save', $report->id]
                ]) !!}

                <div class="col-sm-12 fieldset">
                    <div class="box box-default">
                        <div class="box-header">
                            <h3 class="box-title">Completion Report {{$job->registered_id}}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">

                            <div class="box-body pad">
                                <div class="form-group col-md-12" style="">

                                    <div class="form-group col-md-6">
                                        {!! Form::label('tracking', 'Tracking:*', ['class' => 'control-label'])  !!}
                                        {!! Form::text('tracking',null,['class' => 'form-control', 'placeholder'=> 'Tracking number']); !!}
                                    </div>

                                    <div class="form-group col-md-6">
                                        {!! Form::label('Carrier', 'Carrier:* ', ['class' => 'control-label'])  !!}
                                        {!! Form::select('carrier',['Fedex'=> 'Fedex', 'UPS'=> 'UPS', 'USPS'=> 'USPS', ],null,['class' => 'form-control', 'placeholder'=> 'Carrier']); !!}

                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="clearfix"></div>

                                    <div class="form-group col-md-4">
                                        {!! Form::label('completion_date', 'Completion Date:', ['class' => 'control-label'])  !!}
                                        {!! Form::date('completion_date',null,['class' => 'form-control', 'required']); !!}
                                    </div>
                                    <div class="form-group col-md-4">
                                        {!! Form::label('shipping_date', 'Shipping Date:', ['class' => 'control-label'])  !!}
                                        {!! Form::date('shipping_date',null, ['class' => 'form-control', 'required']); !!}
                                    </div>

                                    <div class="form-group col-md-4">
                                        {!! Form::label('is_completed', 'Completed: *', ['class' => 'control-label']) !!}
                                        {!! Form::select('is_completed', [1 => 'Yes', 0 => 'No', 2 => 'Completed With Issues'], isset($job->customer_id)? $job->customer_id: null,['class' => 'form-control selectpicker is_completed', 'placeholder' => 'Select status']) !!}
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="form-group col-md-12" id ="explanation">
                                        {!! Form::label('explanation', 'Explanation: *', ['class' => 'control-label']) !!}
                                        {!! Form::textarea('explanation', null, ['class' => 'form-control', 'placeholder' => '' ]) !!}
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col-sm-6 -->
                    <div class="col-md-12">
                        {!! Form::hidden('job', $job->id, null, ['class' => 'form-control']) !!}
                        {!! Form::hidden('report', $report->id, null, ['class' => 'form-control']) !!}
                        {!! Form::submit('Submit Report', ['class' => 'btn btn-primary', 'id' => 'submitBtn']) !!}
                    </div>

                    {!! Form::close() !!}
                    @endif
                </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#explanation').hide();
        $('.is_completed').change(function (e) {
            if($(this).find('option:selected').val() !== 'completed') {
                $('#explanation').show();
                $('#explanation').prop('required', true)
            }
        })
    })
</script>
