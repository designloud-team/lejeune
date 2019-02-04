@extends('admin_template')
@section('breadcrumbs')
    {!! Breadcrumbs::render('items.show', $item) !!}
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="pull-right">
                        <p><a href="/items/{{ $item->hash_id }}/edit" class="btn btn-danger">Edit</a></p> 
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-default">
                        <div class="box-header">
                          <h3 class="box-title">{{ $item->item }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <p><strong>Description: </strong>{{ $item->description }}</p>
                            <p><strong>Amount: </strong>${{ $item->amount }}</p>
                            <p><strong>Quantity: </strong>{{ $item->quantity }}</p>
                            @php
                                if($item->taxable === 0){
                                    $taxable = 'No';
                                } else {
                                    $taxable = 'Yes';
                                }
                            @endphp
                            <p><strong>Taxable: </strong>{{ $taxable }}</p>
                            @include('fields.view')
                        </div>
                        
                    </div>
                </div><!-- /.col-xs-12 -->
            </div><!-- /.row -->
        </section>
    </div>
</div>


@endsection
