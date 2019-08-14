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
                        <ul class="dash">
                            <li><a href="/notaries-search"><b>Find a Notary by State</b></a><br>
                                This option allows you to quickly search for Notaries in a specific state.<br><br>
                            </li>
                            <li><a class="chan" href="/notaries/create"><b>Add a NEW Notary</b></a><br>
                                This option allows you to add a new Notary to your online Database.<br><br>
                            </li>
                            <li><a class="chan" href="/notaries"><b>Search/Edit/Delete Existing Notaries</b></a><br>
                                This option allows you to View/Edit/Delete existing Notaries in your online Database.<br><br>
                            </li>
                            <li><a class="#" href="#"><b>Go To Vendor Center</b></a><br>
                                This option allows you to View/Pay all outstanding invoices due for completed jobs.<br><br></li>
                        </ul>
                    </div><!-- /.box-body -->
                </div><!--/.box -->
            </div>
        </div>
    </div>
@endsection
@include('customers.partials.scripts')