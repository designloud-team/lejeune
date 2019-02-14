@extends('admin_template')
@section('breadcrumbs')
    {!! Breadcrumbs::render('customers.show', $customer) !!}
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="pull-right">
                        <p><a href="/customers/{{ $customer->id }}/edit" class="btn btn-danger">Edit</a></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-default">
                        <div class="box-header">
                          <h3 class="box-title">{{ $customer->name }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <p><strong>Description: </strong>{{ $customer->name }}</p>
                            <p><strong>Amount: </strong>${{ $customer->company }}</p>
                        </div>
                        
                    </div>
                </div><!-- /.col-xs-12 -->
            </div><!-- /.row -->
        </section>
    </div>
</div>
@endsection
