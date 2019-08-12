@include('html_head')
<style>
    .dash {
        padding: 2% 5%;
        border: 2px solid #eee;
        background-color: #eee;
        list-style: square;
        /*box-shadow: -1px -1px 7px #ddd ;*/
    }
    .fieldset {
        padding: 2.5%;
        border: 2px solid #eee;
        background-color: #eee;
    }

    input.dt-checkboxes {
        position: absolute;
        margin-left: 0!important;
    }
    .btn-group {height: 35px;}

    .caret-toggle {height: 97%;}
</style>
<body id="main-body" class="fix-header page-template-default page page-id-14 fl-builder fl-theme-builder-header fl-theme-builder-footer fl-preset-default fl-fixed-width fl-search-active">

<div id="wrapper">
    <!-- Header -->

<div class="fl-page">
@include('header')
<div class="container-fluid">
        <!--<div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>-->
            <div class="row bg-title">
                <!-- .page title -->
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    {{--<h4 class="page-title">{{ $page_title or null }}</h4>--}}
                </div>
                <!-- /.page title -->
                <!-- /.breadcrumb -->
            </div>
    <!-- .row -->


        <!-- Main content -->
        <div class="row" id="main-body">
                <div class="white-box">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {!! Session::get('flash_message') !!}
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {!! Session::get('error') !!}
                        </div>
                    @endif
                    {{-- TODO: add error message block for Session::has('errors') --}}
                    @if(Session::has('errors'))
                        <div class="alert alert-danger">
                            {!! Session::get('errors') !!}
                        </div>
                    @endif
                <!-- Your Page Content Here -->
                        {{--<a href="javascript:history.back()" class="btn btn-primary">Back</a>--}}

                        <div width="862" background="{{asset('/img/paper2.jpg')}}" height="600" class="padded" valign="top">
                            <span id="tick2" class="pull-left" style="font-size:12px;color:#800000"><a href="/orders"> {{new_orders() > 0 ? ' You have '. new_orders() . ' New Orders!': 'No New Orders.'}}</a></span>
                            <span id="tick2" class="pull-right" style="font-size:12px;color:#800000">Today is {{date('F j, Y')}} <span id="clock"></span></span>
                        </div>

                        <div class="col-md-12" style="margin:1% auto; text-align: center">
                            <hr>
                            <a href="/dashboard"> Admin Home</a> &nbsp;|&nbsp;<a href="/customers-dashboard">Customer Administration</a>  &nbsp;|&nbsp;<a href="/notaries-dashboard">Notary Administration</a> &nbsp;|&nbsp;<a href="/jobs-dashboard">Job Administration</a> &nbsp;|&nbsp;<a href="/invoices-dashboard">Invoice: Customers</a> &nbsp;|&nbsp;<a href="/invoices-dashboard">Invoice: Notaries</a> &nbsp;|&nbsp;<a href="{{ url('/logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form1').submit();">
                                Logout</a>
                            <form id="logout-form1" action="{{ url('/logout') }}" method="POST"
                                  style="display: none;">{{ csrf_field() }}</form>
                            <hr>
                        </div>
                    @yield('content')
            </div>
        </div>

<!-- Sidebar -->
    </div>
    @include('footer')
</div>
</div>

<!-- ./wrapper -->
@push('scripts')
@endpush

@include('html_footer')
