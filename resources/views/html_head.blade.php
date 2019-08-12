<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="https://lejeunenotaries.com" />
    <link rel='shortlink' href='https://lejeunenotaries.com/' />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>Lejeune Notaries &#8211; Notary Services</title>
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel='dns-prefetch' href='//maxcdn.bootstrapcdn.com' />

    <link rel='stylesheet' id='fl-builder-layout-14-css' href="{{asset('/css/layout.css')}}" type='text/css' media='all' />
    <link rel='stylesheet' id='fl-builder-layout-bundle-css' href="{{asset('/css/layout-bundle.css')}}" type='text/css' media='all' />
    {{--<link rel='stylesheet' id='af-form-style-css' href='http://lejeunenotaries.itestwebpageshere.biz/wp-content/plugins/advanced-forms/assets/css/form.css?ver=4.8.8' type='text/css' media='all' />--}}
    <link rel='stylesheet' id='fl-builder-google-fonts-css' href='//fonts.googleapis.com/css?family=Merriweather%3A400&#038;ver=4.8.8' type='text/css' media='all' />
    <link rel='stylesheet' id='font-awesome-css' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?ver=1.10.6.3' type='text/css' media='all' />
    {{--<link rel='stylesheet' id='mono-social-icons-css' href='http://lejeunenotaries.itestwebpageshere.biz/wp-content/themes/bb-theme/css/mono-social-icons.css?ver=1.6.1' type='text/css' media='all' />--}}
    {{--<link rel='stylesheet' id='jquery-magnificpopup-css' href='http://lejeunenotaries.itestwebpageshere.biz/wp-content/plugins/bb-plugin/css/jquery.magnificpopup.css?ver=1.10.6.3' type='text/css' media='all' />--}}
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/minimal/red.css" />
    <!-- Latest compiled and minified JavaScript -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel='stylesheet' id='fl-automator-skin-css' href={{asset('/css/skin.css')}} type='text/css' media='all' />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" integrity="sha256-k66BSDvi6XBdtM2RH6QQvCz2wk81XcWsiZ3kn6uFTmM=" crossorigin="anonymous" />    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" />
    <style type="text/css">
        /*
You can add your own CSS here.

Click the help icon above to learn more.
*/     .alert {background: #fff!important;}

        h1.fl-post-title {
            display:none;
        }
        .post-edit-link {
            float:right
        }
        #menu-main-menu li a,#menu-main-menu-1 li a {
            color:#3d3d3d
        }
        #menu-main-menu li:hover a, #menu-main-menu-1 li:hover a, #menu-main-menu li.current_page_item a, #menu-main-menu-1 li.current_page_item a {
            color:#821a1a!important;
        }
        #wppb-submit,.login-remember label{
            float:right;
        }

        #menu-main-menu {background-color: #E8D9B5;padding:10px 0 0 0;}

        #menu-main-menu li {
            position: relative;
            background-color: #F8F2E4;
        }

        header .fl-module-menu {background-color: #E8D9B5;}


        .pagination {
            margin: 0 0 0 35%!important;
        }
        .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
        background-color: #821a1a!important;
        border-color: #821a1a!important;
        }
        @media (min-width:768px) {
            #menu-main-menu {background-color: #E8D9B5;padding:10px 0 0 0;}

            #menu-main-menu li {
                position: relative;
                background-color: #F8F2E4;
            }
            #menu-main-menu li a:before {
                position: absolute;
                content: '';
                height: 18px;
                width: 30px;
                background-image: url(/img/pen-tip.png);
                background-repeat: no-repeat;
                background-size: cover;
                top: 8px;
                background-position: center;
                left:0;
            }

            #menu-main-menu li a {position:relative;padding-left:35px;font-size:13px !important;}



            #menu-main-menu li {
                border: 1px solid #d8c9a3;
                background: linear-gradient(top, #E8D9B5 50%, #d8c9a3 100%);
                display: inline-block;
                position:relative;
                z-index: 0;
                border-top-left-radius: 6px;
                border-top-right-radius: 6px;
                box-shadow: 0 -1px 3px rgba(0, 0, 0, 0.1), inset 0 1px 0 #d8c9a3;
                text-shadow: 0 1px #d8c9a3;
                margin: 0 5px;
                padding: 0 18px;
            }

            #menu-main-menu li:before,
            #menu-main-menu li:after {
                border: 1px solid #d8c9a3;
                position: absolute;
                bottom: -1px;
                width: 6px;
                height: 6px;
                content: "";
            }

            #menu-main-menu li:before {
                left: -6px;
                border-bottom-right-radius: 7px;
                border-width: 0px 3px 0px 0px;
                box-shadow: 5px 0px 0px #F8F2E4;
            }

            #menu-main-menu li:after {
                right: -6px;
                border-bottom-left-radius: 7px;
                border-width: 0px 0px 0px 3px;
                box-shadow: -5px 0px 0 #F8F2E4;
            }

            #menu-main-menu li.selected:before {
                box-shadow: 2px 0px 0 #d8c9a3;
            }

            #menu-main-menu li.selected:after {
                box-shadow: -2px 0px 0 #d8c9a3;
            }
            .white-box {background-color:#fff!important;padding:2%;border-bottom:none!important;border-left:10px outset #E8D9B5!important;border-right:10px inset #E8D9B5!important;border-top:0!important;margin-top:-1px;}button,.btn-danger{background: #821a1a!important;border: 1px solid #821a1a!important;}a.btn-link {color:#821a1a}.card {padding:2% 5%}a:hover{color:#000!important;}
            .fl-page, .fl-photo-content img {
                min-width: 1080px;
                width: 1080px!important;
            }
            #footer1 {
                border: none!important;
                background-image: linear-gradient(to left,rgba(0,0,0,.03),#eee,#fff);

            }

            #footer1 .fl-row-content-wrap {
                padding: 0;
                z-index: 0;
                border: none!important;

            }
            #footer1 .fl-node-59e01ba221439, .fl-node-59e01af35878b {
                border-left:10px outset #E8D9B5!important;
                border-right: 10px inset #E8D9B5!important;;
                border-top:none!important;
                /*margin-top: -10px;*/
                width: 100%;
                min-width: 1080px;
                z-index: -1;
            }
            .fl-node-59e01af35878b {
                padding-bottom: 40px;
                /*border-bottom:10px inset rgba(232, 217, 181,.05)!important;*/
                z-index: 0;
                position: relative;
            }
            /*ul#menu-main-menu {*/
                /*position: relative;*/
                /*left: -1.5%;*/
            /*}*/
            form label{
                font-size: 1.5em;
                font-weight: 400!important;
            }
            body, ul, li,#menu-main-menu li.menu-item a {
                font-size: 14px!important;
            }
            #footer1 .fl-row-content-wrap {
                background-image: url(/img/footer2.jpg);
                background-position: bottom left;
                background-repeat: no-repeat;
                background-size: 100% auto;
                min-width: 1080px!important;
                background-color:transparent;
                /*background: linear-gradient(to left,rgba(0,0,0,.03),#eee,#fff);*/
                margin: 0;
                padding: 0;
                margin-bottom:0;
                z-index: 30000;
                position: relative;

            }
           .fl-node-59e01b915f443{
               border: none;
           }
            .col-md-12,.col-md-6,.col-md-1,.col-md-2,.col-md-4,.col-md-3,.col-md-8,.col-md-3{
                padding-left:0!important;
            }
            .alert-danger {
                color:#821a1a;
                background: #E8D9B5!important;
                font-size: 18px;
                font-weight: 700;

        }
        a.btn-link:visited,a.btn-link:active,a.btn-link:focus {
            background-color: black;
            color: #fff;
        }
            #menu-main-menu li:hover a:after, #menu-main-menu li.active a:after {
                z-index: 5000;
                width: 20px;
                position: absolute;
                top:12px;
                left:10px;
                content: url(/uploads/2019/01/red-1.png);
            }
        }
    </style>
    {{--<script>--}}
        {{--window.Laravel = {!! json_encode([--}}
            {{--'csrfToken' => csrf_token(),--}}
       {{--!!};--}}

    {{--</script>--}}
</head>