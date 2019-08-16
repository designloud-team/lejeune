@extends('public_template')
<style>
    .container-fluid {
        /*border: 1px solid gray!important;*/
        min-height: 200px!important;
    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Display Validation Errors -->
            <h3 class="text-center">Thanks for completing the report</h3>
            <h3 class="text-center">Complete another <a href="/signin" style="color: #821a1a">report?</a></h3>
        </div>
        </div>
@endsection
