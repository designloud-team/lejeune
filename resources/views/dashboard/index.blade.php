@extends('admin_template')
<style>
    .card {padding-bottom:15%!important;margin: 0 1%; background:linear-gradient(#E8D9B5,#fff); border: 2px outset  #E8D9B5;height:200px }
    .card-body {text-align: center }
</style>
@section('content')
<h2>Welcome to the Admin Home Page!</h2>
            <p>
            As you can see, the top of each page in this area includes a row of text hyperlinks that will take you to the various options available to you. You can also use the quick-link buttons below:<br><br>
         </p>

    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">&nbsp;</div>
                <div class="card-body">
                    <h4><a href="{{url('/customers-dashboard')}}">Customer<br> Administration</a></h4>
                    <p>Add/Edit/Delete Customers</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">&nbsp;</div>
                <div class="card-body">
                    <h4><a href="{{url('/notaries-dashboard')}}">Notary<br> Administration</a></h4>
                    <p>Search/Add/Edit/Delete Notaries</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">&nbsp;</div>
                <div class="card-body">
                    <h4><a href="{{url('/jobs-dashboard')}}">Active Job<br> Administration</a></h4>
                    <p>Search/Add/Edit/Delete Jobs</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">&nbsp;</div>
                <div class="card-body">
                    <h4><a href="{{url('/invoices-dashboard')}}">Invoicing<br> Center</a></h4>
                    <p>Search/Add/Edit/Delete Invoices</p>
                </div>
            </div>
        </div>
    </div>

@endsection
