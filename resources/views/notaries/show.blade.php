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
                          <h3 class="box-title">{{ $notary->first_name }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <p><strong>Last name: </strong>{{ $notary->last_name }}</p>
                            <p><strong>State: </strong>{{ $notary->state }}</p>
                            <p><strong>Address: </strong>{{ $notary->delivery_address }}</p>
                        </div>
                        
                    </div>
                </div><!-- /.col-xs-12 -->
            </div><!-- /.row -->
        </section>
    </div>
</div>


@endsection
