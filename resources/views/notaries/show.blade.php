@extends('admin_template')
@section('breadcrumbs')
    {!! Breadcrumbs::render('notaries.show', $notary) !!}
@stop

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
                <div class="col-xs-12">
                    <div class="box box-default">
                        <div class="box-header">
                          <h3 class="box-title">{{$notary->business_name ?$notary->business_name.', ':'' }}{{ $notary->first_name }} {{ $notary->last_name }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <p><strong>State: </strong>{{ $notary->state }}</p>
                            <p><strong>Business Name: </strong>{{ $notary->business_name }}</p>
                            <p><strong>Display: </strong>{{ $notary->display_name }}</p>
                            <p><strong>Email: </strong>{{ $notary->email }}</p>
                            <p><strong>Phone: </strong>{{ $notary->phone }}</p>
                            <p><strong>Alt Phone: </strong>{{ $notary->alternate_phone }}</p>
                            <p><strong>Fax: </strong>{{ $notary->fax }}</p>
                            <p><strong>Website: </strong>{{ $notary->website }}</p>
                            <p><strong>Mailing: </strong>{{ $notary->mailing_address }}</p>
                            <p><strong>Deliver: </strong>{{ $notary->delivery_address }}</p>
                        </div>
                        
                    </div>
                </div><!-- /.col-xs-12 -->
            </div><!-- /.row -->
        </section>
    </div>
</div>


@endsection
