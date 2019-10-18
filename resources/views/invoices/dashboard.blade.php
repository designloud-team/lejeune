@extends('admin_template')
@push('styles')

@endpush

@section('breadcrumbs')
    {!! Breadcrumbs::render() !!}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-default">
                    <div class="box-body">
                            <p><a href="/customers"> View All Customers</a></p>
                        <p><a href="/customers/create"> Create New Customers</a></p>
                    </div><!-- /.box-body -->
                </div><!--/.box -->
            </div>
        </div>
    </div>

@endsection
@push('scripts')
@include('customers.partials.scripts')
@endpush