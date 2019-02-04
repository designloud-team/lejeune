@extends('admin_template')
@push('styles')

@endpush

@section('breadcrumbs')
    {!! Breadcrumbs::render('items.edit', $item) !!}
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Display Validation Errors -->
        @if ($item)
            @include('common.errors')

            {!! Form::model($item, [
                'method' => 'PATCH',
                'route' => ['items.update', $item->hash_id]
            ]) !!}

            <div class="col-sm-12">
                <div class="box box-default">
                    <div class="box-header">
                      <h3 class="box-title">Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <div class="form-group">
                            {!! Form::label('item', 'Item: *', ['class' => 'control-label']) !!}
                            {!! Form::text('item', $item->item ? $item->item : null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description: *', ['class' => 'control-label']) !!}
                            {!! Form::text('description', $item->description ?  $item->description : null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('amount', 'Amount: *', ['class' => 'control-label']) !!}
                            {!! Form::text('amount', $item->amount ?  $item->amount : null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('quantity', 'Quantity: *', ['class' => 'control-label']) !!}
                            {!! Form::text('quantity', $item->quantity ?  $item->quantity : null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            <label>
                                {!! Form::checkbox('taxable', '1', $item->taxable ? $item->taxable : null, ['class' => 'icheck']) !!}  Taxable
                            </label>
                            {!! Form::hidden('global', '1', array('id' => 'global')) !!}
                        </div>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col-sm-6 -->

            @if(count($fields) > 0)
                <div class="col-sm-12">
                    <div class="box box-default">
                        <div class="box-body pad">
                            @include("fields.customfield")
                        </div>
                    </div>
                </div>
            @endif
        {!! Form::submit('Update Line Item', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
        @endif
    </div>
</div>


@endsection

@push('scripts')


@endpush