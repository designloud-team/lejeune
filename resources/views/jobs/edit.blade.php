@extends('admin_template')

@section('breadcrumbs')
    {!! Breadcrumbs::render('jobs.edit', $job) !!}
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Display Validation Errors -->
            @if($job)
                @include('common.errors')

                {!! Form::model($job, [
                    'method' => 'PATCH',
                    'route' => ['jobs.update', $job->id]
                ]) !!}

                <div class="col-sm-12 fieldset">
                    <div class="box box-default">
                        <div class="box-header">
                            <h3 class="box-title">Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">

                            <div class="box-body pad">
                                <div class="form-group col-md-12" style="">
                                    {!! Form::hidden('local', 0, null, ['class' => 'form-control']) !!}
                                    {!! Form::hidden('status','new',['class' => 'form-control']); !!}

                                    <div class="clearfix"></div>

                                    <div class="form-group col-md-6">
                                        {!! Form::label('borrower', 'Borrower:*', ['class' => 'control-label'])  !!}
                                        {!! Form::text('borrower',$job->borrower,['class' => 'form-control', 'placeholder'=> 'Borrower\'s Full Name']); !!}

                                    </div>

                                    <div class="form-group col-md-6">
                                        {!! Form::label('coborrower', 'Co-Borrower:* (If Applicable)', ['class' => 'control-label'])  !!}
                                        {!! Form::text('coborrower',$job->coborrower,['class' => 'form-control', 'placeholder'=> 'CoBorrower\'s Full Name']); !!}

                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="form-group col-md-4">
                                        {!! Form::label('daytime_phone', 'Daytime Phone:', ['class' => 'control-label'])  !!}
                                        {!! Form::text('daytime_phone',$job->daytime_phone,['class' => 'form-control','placeholder'=> 'Daytime phone number']); !!}
                                    </div>
                                    <div class="form-group col-md-4">
                                        {!! Form::label('evening_phone', 'Evening Phone:', ['class' => 'control-label'])  !!}
                                        {!! Form::text('evening_phone',$job->evening_phone,['class' => 'form-control','placeholder'=> 'Evening phone number']); !!}
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="form-group col-md-8">
                                        {!! Form::label('property_address', 'Property Address:', ['class' => 'control-label'])  !!}
                                        {!! Form::text('property_address',$job->property_address,['class' => 'form-control','placeholder'=> 'Property Address', 'required']); !!}
                                    </div>
                                    <div class="form-group col-md-8">
                                        {!! Form::label('signing_address', 'Location of Signing:', ['class' => 'control-label'])  !!}
                                        {!! Form::text('signing_address',$job->signing_address,['class' => 'form-control','placeholder'=> 'Signing Address', 'required']); !!}
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="form-group col-md-4">
                                        {!! Form::label('date', 'Date:', ['class' => 'control-label'])  !!}
                                        {!! Form::date('date',$job->date,['class' => 'form-control', 'required']); !!}
                                    </div>
                                    <div class="form-group col-md-4">
                                        {!! Form::label('time', 'Time:', ['class' => 'control-label'])  !!}
                                        {!! Form::time('time',$job->time,['class' => 'form-control', 'required']); !!}
                                    </div>
                                    <div class="form-group col-md-4">
                                        {!! Form::label('packages', 'No. of Packages:', ['class' => 'control-label'])  !!}
                                        {!! Form::number('packages',$job->packages,['class' => 'form-control','placeholder'=> '1-100', 'min'=> '1', 'max'=> '100','required']); !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('notary_id', 'Notary:', ['class' => 'control-label']) !!}
                                        {!! Form::select('notary_id', ['Select Notary' => $notaries, 'new-notary' => 'New Notary'],isset($job->notary_id)?$job->notary_id : null,['class' => 'form-control selectpicker', 'required', 'placeholder' => 'Select existing notary']) !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('notary_fee', 'Notary Fee:', ['class' => 'control-label']) !!}
                                        {!! Form::text('notary_fee',$job->notary_fee,['class' => 'form-control','placeholder'=> 'Notary Fee', 'required']); !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {!! Form::label('customer_id', 'Customer: (Optional)', ['class' => 'control-label']) !!}
                                        {!! Form::select('customer_id', ['Customers' => $customers, 'new-customer' => 'New Customer'], isset($job->customer_id)? $job->customer_id: null,['class' => 'form-control selectpicker', 'placeholder' => 'Select existing customer' ]) !!}
                                    </div>

                                </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col-sm-6 -->
                <div class="col-md-12">

                {!! Form::submit('Update Job', ['class' => 'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
        <script>
            $(document).ready(function () {

            })
        </script>

@endpush
