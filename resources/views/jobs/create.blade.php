@extends('admin_template')
<link rel="stylesheet" type="text/css" href="{{asset('packages/jquery-steps/css/jquery.steps.css')}}">
<style>
    .hr {width:100%;height: 1px;background:#666;}
    #submit{visibility:hidden!important;}
    section{min-width: 100%;overflow-y: scroll}
</style>
@section('breadcrumbs')
    {!! Breadcrumbs::render() !!}
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Display Validation Errors -->
            @include('common.errors')
            <div class="col-sm-12 fieldset">
                {!! Form::open([
                  'route' => 'jobs.store',
                  'id' => 'job-form'
                    ]) !!}
                <div class="box box-default" >

                <!-- /.box-header -->
                        <div class="box-body pad" id="example-basic">
                            <h3 class="box-title">Add Job Details</h3>

                            <section>
                            <div class="form-group col-md-12" style="">
                                {!! Form::hidden('local', 0, null, ['class' => 'form-control']) !!}
                                {!! Form::hidden('status', 'new', ['class' => 'form-control']) !!}
                            </div>
                                <div class="clearfix"></div>

                                <div class="form-group col-md-6">
                                    {!! Form::label('borrower', 'Borrower:*', ['class' => 'control-label'])  !!}
                                    {!! Form::text('borrower',null,['class' => 'form-control', 'placeholder'=> 'Borrower\'s Full Name', 'required']); !!}

                                </div>

                                <div class="form-group col-md-6">
                                    {!! Form::label('coborrower', 'Co-Borrower: (If Applicable)', ['class' => 'control-label'])  !!}
                                    {!! Form::text('coborrower',null,['class' => 'form-control', 'placeholder'=> 'CoBorrower\'s Full Name']); !!}

                                </div>
                                <div class="clearfix"></div>

                                <div class="form-group col-md-4">
                                    {!! Form::label('daytime_phone', 'Daytime Phone:', ['class' => 'control-label'])  !!}
                                    {!! Form::text('daytime_phone',null,['class' => 'form-control','placeholder'=> 'Daytime phone number', 'required']); !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('evening_phone', 'Evening Phone:', ['class' => 'control-label'])  !!}
                                    {!! Form::text('evening_phone',null,['class' => 'form-control','placeholder'=> 'Evening phone number']); !!}
                                </div>
                                <div class="clearfix"></div>
                                <hr class="hr">
                                <div class="form-group col-md-6">
                                    {!! Form::label('property_address', 'Property Address:', ['class' => 'control-label'])  !!}
                                    {!! Form::text('property_address',null,['class' => 'form-control','placeholder'=> 'Property Address', 'required', 'required']); !!}
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('signing_address', 'Location of Signing:', ['class' => 'control-label'])  !!}
                                    {!! Form::text('signing_address',null,['class' => 'form-control','placeholder'=> 'Signing Address', 'required', 'required']); !!}
                                </div>
                                <div class="clearfix"></div>

                                <div class="form-group col-md-4">
                                    {!! Form::label('date', 'Date:', ['class' => 'control-label'])  !!}
                                    {!! Form::date('date',null,['class' => 'form-control', 'required']); !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('time', 'Time:', ['class' => 'control-label'])  !!}
                                    {!! Form::time('time',null,['class' => 'form-control', 'required']); !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('packages', 'No. of Packages:', ['class' => 'control-label'])  !!}
                                    {!! Form::number('packages',1,['class' => 'form-control','placeholder'=> '1-100', 'min'=> '1', 'max'=> '100','required']); !!}
                                </div>
                            </section>
                            <h3 class="box-title">Add A Notary</h3>

                            <section>
                                <div class="form-group col-md-12">
                                    {!! Form::label('notary_id', 'Notary:', ['class' => 'control-label']) !!}
                                    {!! Form::select('notary_id', ['Select Notary' => $notaries, 'new-notary' => 'New Notary'], null,['class' => 'form-control selectpicker', 'placeholder' => 'Select existing notary', 'id' => 'notary']) !!}
                                </div>
                                <div class="hidden" id="collapseExample">

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


                                </div>


                                <div class="form-group col-md-12">
                                    {!! Form::label('notary_fee', 'Notary Fee:', ['class' => 'control-label']) !!}
                                    {!! Form::text('notary_fee',null,['class' => 'form-control','placeholder'=> 'Fee for job    ']); !!}
                                </div>
                            </section>
                            <h3 class="box-title">Add A Customer</h3>

                            <section>
                                <div class="form-group col-md-4">
                                    {!! Form::label('customer_id', 'Customer: (Optional)', ['class' => 'control-label']) !!}
                                    {!! Form::select('customer_id', ['Customers' => $customers, 'new-customer' => 'New Customer'], null,['class' => 'form-control selectpicker', 'placeholder' => 'Select existing customer', 'id' => 'customer' ]) !!}
                                </div>
                            </section>
                            </div>
                        </div><!-- /.box-body -->
                </div><!-- /.col-sm-12 -->
                {!! Form::close() !!}
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js" integrity="sha256-VyFbbsL+4WS8IrWijL0olTxDKbsCymITRf7zwexscMc=" crossorigin="anonymous"></script>

    <script>

    jQuery(document).ready(function ($) {
        var form = $("form#job-form");
        form.find('#example-basic').steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            autoFocus: true,
            onFinished: function (event, currentIndex)
            {
                //Validate here before submission
                form.submit()

            }
        });

        $("#notary").change(function () {
            alert('es')
            if($(this).val() == 'new-notary') {

                // $('#collapseExample').removeClass('hidden')
            } else {
                // $('#collapseExample').addClass('hidden')

            }
        })
        $("#customer").change(function () {
            if($(this).val() == 'new-customer') {
                alert('customer')
            }

        });
    })


</script>
    @endpush