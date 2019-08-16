@extends('public_template')
<style>
    .content {
        padding: 2% 10%!important;
    }
    .form-group label {
        font-size: 14px!important;
    }
</style>
@section('breadcrumbs')
    {{--{!! Breadcrumbs::render('notaries.show', $notary) !!}--}}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <div class="pull-right">
                            <p><a href="#" class="btn btn-danger" id="verify">Edit</a></p>
                        </div>
                        <p>We found one match in our database. You can update your information. You will be asked to verify your email</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <div class="box box-default">
                            <div class="row padd-left">
                                <div class="">
                                    <div class="box box-default col-md-6 col-sm-12">
                                        <div class="box-header">
                                            <h3 class="box-title">Notary</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body pad">
                                            <p><strong>State: </strong>{{ $notary->state }}</p>
                                            <p><strong>Business Name: </strong>{{ $notary->business_name }}</p>
                                            <p><strong>State: </strong>{{ $states[$notary->state] }}</p>
                                            <p><strong>Website: </strong>{{ $notary->website }}</p>
                                            <p><strong>E-Docs: </strong>{{ $notary->edocs == 1 ? 'Yes': 'No' }}</p>
                                            <p><strong>Has Insurance: </strong>{{ $notary->insurance == 1 ? 'Yes': 'No' }}</p>
                                            @if($notary->insurance == 1)<p><strong>Insurance Amount: </strong>{{ $notary->insurance_amount }}</p>@endif
                                            <p><strong>SSN or EIN: </strong>{{ $notary->ssn_or_ein }}</p>

                                        </div>

                                    </div>
                                </div>
                                <div class="">
                                    <div class="box box-default col-md-6 col-sm-12">
                                        <div class="box-header">
                                            <h3 class="box-title">Contact Info</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body pad">
                                            <p><strong>Email: </strong><a href="mailto:{{ $notary->email }}">{{ $notary->email }}</a> </p>
                                            <p><strong>Phone: </strong><a href="tel:{{ $notary->phone }}"> {{ $notary->phone }}</a></p>
                                            <p><strong>Alt Phone: </strong><a href="tel:{{ $notary->alternate_phone }}">{{ $notary->alternate_phone }}</a></p>
                                            <p><strong>Fax: </strong>{{ $notary->fax }}</p>
                                            <p><strong>Mailing: </strong>{{ $notary->mailing_address }}</p>
                                            <p><strong>Deliver: </strong>{{ $notary->delivery_address }}</p>
                                            <p><strong>Notes: </strong>{{ $notary->notes }}</p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                    </div><!-- /.col-xs-12 -->
                </div><!-- /.row -->
            </section>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#verify').click(function (e) {
            e.preventDefault()
            e.stopImmediatePropagation()
            $.post('/notaries/{{ $notary->id }}/verify').done(function (data) {
                alert(data.message)
            })
        })
    })
</script>