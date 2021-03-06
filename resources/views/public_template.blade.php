@include('html_head')
<style>
    .fl-row-content-wrap {
        padding:  0 !important;
    }
    .white-box {
        padding: 0;
    }
    .card {background: #fff!important;}

    .dash {
        padding: 5%;
        /*border: 1px solid #eee;*/
        /*list-style: square;*/
        min-width: 100%;
        /*box-shadow: -1px -1px 7px #ddd ;*/
    }
</style>
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
                        <div class="alert alert-danger">
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
