@extends('public_template')
<style>
    form label {
        font-size: 18px!important;
        /*width: auto!important;*/
    }
    form input {
        max-width: 300px!important;
        margin: 0 auto;
    }
    td.img {
        text-align: center;
    }
    td#td-first h3 {
        margin-left:-20px!important; ;
        margin-bottom:20px!important; ;
        /*border-bottom: 1px solid #000;*/
    }
    #submit-Btn {
        width: 100%!important;
        background: #821a1a!important;
        border:1px solid #821a1a!important;

    }
    @media (max-width:768px) {
        /*#td-first {*/

            /*display: block;*/
            /*width: 400px;*/
            /*margin: 0;*/
        /*}*/
    }
    @media (max-width:600px) {
        td.img {
            display: none!important;
        }
        #submit-Btn {
            width: 100%!important;
            background: #821a1a!important;
            border:1px solid #821a1a!important;

        }
        #td-first {
            width: 80%!important;
            padding: 0 5%;
        }
    }
</style>
@section('content')
    <div class="fl-page-content" itemprop="mainContentOfPage">
        <div class="fl-content-full container">
            <div class="row">
                <div class="fl-content col-md-12">
                    <article class="fl-post post-323 page type-page status-publish hentry" id="fl-post-323" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <div class="fl-post-content clearfix" itemprop="text">
                            <div class="fl-builder-content fl-builder-content-323 fl-builder-content-primary fl-builder-global-templates-locked" data-post-id="323"><div class="fl-row fl-row-fixed-width fl-row-bg-none fl-node-5c17f1c59d779" data-node="5c17f1c59d779">
                                    <div class="fl-row-content-wrap">
                                        <div class="fl-row-content fl-row-fixed-width fl-node-content">
                                            <div class="fl-col-group fl-node-5c17f1c59f6a0" data-node="5c17f1c59f6a0">
                                                <div class="" data-node="5c17f1c59f825">
                                                    <div class="fl-col-content fl-node-content">
                                                        <div class="fl-module fl-module-rich-text fl-node-5c17f1f77cf80" data-node="5c17f1f77cf80">
                                                            <div class="fl-module-content fl-node-content">
                                                                <div class="fl-rich-text">
                                                                    <table border="0" width="100%">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td class="img"><img src="http://lejeunenotaries.com/images/report.jpg"></td>
                                                                            <td valign="top" id="td-first">
                                                                                <h3 style="">Signing Completion Report</h3>

                                                                                <form method="POST" action="{{route('notary.login')}}">
                                                                                    @csrf
                                                                                    <div class="form-group row">
                                                                                        <label for="last" class="col-md-3 col-form-label text-md-right">{{ __('Username') }}</label>

                                                                                        <div class="col-md-6">
                                                                                            <input id="last" type="text" class="form-control" name="last" value="{{ old('last') }}" required autofocus placeholder="Last Name">
                                                                                        </div>
{{--                                                                                        <p class="col-md-3 text-md-left help-block">(Last Name)</p>--}}

                                                                                    </div>

                                                                                    <div class="form-group row">
                                                                                        <label for="job" class="col-md-3 col-form-label text-md-right">{{ __('Registered ID') }}</label>

                                                                                        <div class="col-md-6">
                                                                                            <input id="job" type="text" class="form-control" name="job" required placeholder="Job ID">

                                                                                        </div>
{{--                                                                                        <p class="col-md-3 text-md-left help-block">(Job ID)</p>--}}

                                                                                    </div>

                                                                                    <div class="form-group row">
                                                                                        <div class="col-md-6 offset-md-4">
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                                                                <label class="form-check-label" for="remember">
                                                                                                    {{ __('Remember Me') }}
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form-group row mb-0">
                                                                                        <div class="col-md-8 offset-md-4">
                                                                                            <button type="submit" class="btn btn-primary login-btn" id="submit-Btn">
                                                                                                {{ __('Find Report') }}
                                                                                            </button>


                                                                                        </div>
                                                                                    </div>
                                                                                </form>

                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <p align="center">Thank you for your interest in LejeuneNotaries.com.<br>
                                                                        We look forward to working with you.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>

                </div>
            </div>
        </div>
    </div>
@endsection
