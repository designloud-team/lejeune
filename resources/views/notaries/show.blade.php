@extends('admin_template')
@section('breadcrumbs')
    {!! Breadcrumbs::render('notaries.show', $notary) !!}
@stop
<style>
    .box .box-body ,.box-header {
        padding: 0 5%;
    }
</style>
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="pull-right">
                        <p><a href="/notaries/{{ $notary->id }}/edit" class="btn btn-danger">Edit</a></p>
                    </div>
                </div>
            </div>

            <div class="row">
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
                        </div>
                    </div>
                </div>
            </div>
            @if($jobs->count() || $invoices->count() || $reports->count() )

            <hr style="width: 100%;height: 1px; color: gray;background-color: gray">

            <div class="row">
                <div class="box box-default col-md-12 col-sm-12">
                    <div class="box-header">
                    </div>
                    <div class="box-body">
                        <ul class="nav nav-tabs">
                            <li role="presentation" class="active"><a data-toggle="tab" href="#jobs">Jobs</a></li>
                            <li role="presentation"><a data-toggle="tab" href="#invoices">Invoices</a></li>
                            <li role="presentation"><a data-toggle="tab" href="#reports">Completion Reports</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="jobs">
                                <table class="table table-condensed tbl-jobs">
                                    <thead>
                                    <tr>
                                        <th>Registered ID</th>
                                        <th>Client</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane" id="invoices">
                                <table class="table table-condensed tbl-invoices">
                                    <thead>
                                    <tr>
                                        <th>Invoice Number</th>
                                        <th>Job Registered ID</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane" id="reports">
                                <table class="table table-condensed tbl-reports">
                                    <thead>
                                    <tr>
                                        <th>Job Registered ID</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endif

        </section>
    </div>
</div>



@endsection
