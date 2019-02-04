@include('html_head')
<body class="fix-header page-template-default page page-id-14 fl-builder fl-theme-builder-header fl-theme-builder-footer fl-preset-default fl-fixed-width fl-search-active">
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
                        <p id="tick2" class="pull-right" style="font-size:12px;color:#800000">Today is {{date('F j, Y')}} <span id="clock"></span></p>
                        <!-- Your Page Content Here -->
                    @yield('content')
                </div>
            </div>

            <!-- Sidebar -->
        </div>
        @include('footer')
    </div>
</div>
<!-- ./wrapper -->
@include('html_footer')
