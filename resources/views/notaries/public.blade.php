@extends('admin_template')
<style>
    .content {
        padding: 2% 5%;
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
                            <p><a href="/notaries/{{ $notary->id }}/verify" class="btn btn-danger">Edit Notary</a></p>
                        </div>
                        <p>We found one match in our database.</p>

                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <div class="box box-default">
                            <div class="box-header">
                                <h3 class="box-title">{{ $notary->first_name }}  {{ $notary->last_name }}</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">
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
