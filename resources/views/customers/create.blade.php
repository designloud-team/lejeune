@extends('admin_template')

@section('breadcrumbs')
    {!! Breadcrumbs::render() !!}
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
            <!-- Display Validation Errors -->
            @include('common.errors')

            {!! Form::open([
                'route' => 'customers.store'
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
                            {!! Form::text('item', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description: *', ['class' => 'control-label']) !!}
                            {!! Form::text('description', null, ['class' => 'form-control',  'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('amount', 'Amount: *', ['class' => 'control-label']) !!}
                            {!! Form::text('amount', '0.00', ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('quantity', 'Quantity: *', ['class' => 'control-label']) !!}
                            {!! Form::text('quantity', '1.0', ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <div class="form-group">
                            <label>
                                {!! Form::checkbox('taxable', '1', ['class' => 'form-control']) !!}  Taxable
                            </label>
                            {!! Form::hidden('global', '1', array('id' => 'global')) !!}
                        </div>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col-sm-12 -->

        {!! Form::submit('Create New Line Item', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>

@endsection

