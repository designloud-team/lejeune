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
                            <li><a class="chan" href="/customers/create"><b>Add a NEW Customer</b></a><br>
                                This option allows you to add a new Customer to your online Database.<br><br>
                            </li>
                            <li><a class="chan" href="/customers"><b>View/Edit/Delete Existing Customers</b></a><br>
                                This option allows you to View/Edit/Delete existing Customers in your online Database.<br><br>
                            </li>
                            <li><a class="chan" href="/cgi-bin/admin.cgi?auth=admin.674&amp;action=vendor_center"><b>Customer Invoices</b></a><br>
                                This option allows you to View/Apply Payments to all outstanding invoices owed to you for completed jobs.<br><br>
                            </li>
                        </ul>

                    </div><!-- /.box-body -->
                </div><!--/.box -->
            </div>
        </div>
    </div>
@endsection
@include('customers.partials.scripts')