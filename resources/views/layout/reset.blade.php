<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="title" content="@if(isset($meta_title)){{ $meta_title }} @else {{ __('MPL - Marketing and Production Limited') }} @endif">
    <meta name="keyword" content="@if(isset($meta_keyword)){{ $meta_keyword }} @else {{ __('MPL, Marcketin, Production') }} @endif">
    <meta name="description" content="@if(isset($meta_description)){{ $meta_description }} @else {{ __('MPL - Marketing and Production Limited...') }} @endif" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/front/js/sweetalert/sweetalert.css')}}">
    @if(isset($page_sub_title) && ($page_sub_title == 'Profile'))
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    @endif
    <link rel="stylesheet" href="{{ asset('assets/front/css/styles.css')}}">
    <title> @if(isset($page_title) ) {{ __($page_title) }} @else {{__('MPL - Marketing and Production Limited')}} @endif</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/front/images/favicon//apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/front/images/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/front/images/favicon/favicon-16x16.png')}}">
    <link rel="shortcut icon" href="{{ asset('assets/front/images/favicon/favicon.ico')}}" />
    <link rel="manifest" href="{{ asset('assets/front/images/favicon//site.webmanifest')}}">
    </head>
<body>
<?php 
    $en_flg_img_src = asset('assets/front/images/en.png');
    $cn_flg_img_src = asset('assets/front/images/zh-cn.png');
    $hk_flg_img_src = asset('assets/front/images/zh-hk.png');
    $locale = "en";
    if (Session::has('locale')) {
        $locale = session('locale'); 
    }
    
    $prefix = "en";
    if ($locale === "zh-cn") $prefix = "cn";
    if ($locale === "zh-hk") $prefix = "hk";
?>   
<header>
    <div class="container d-flex justify-content-between align-items-center">
        <a href="{{ route('base_url') }}">
            <img src="{{ asset('assets/front/images/logo.png')}}" alt="Logo" title="Logo" class="visible-desktop" />
            <img src="{{ asset('assets/front/images/footer-logo.png')}}" width="131" class="hidden-desktop" alt="Logo" title="Logo" />
        </a>
        <div class="header-right">
            <ul id="main-menu">
                <li>
                    <a href="/" class="link-home"><i class="icon-home"></i></a>
                </li>
                <?php 
                    if ($prefix === 'en') {
                ?>
                    <li class="dropdown language-switcher">
                        <a href="{{ route('en') }}">
                            <img src="{{ $en_flg_img_src }}" width="21"><i class="icon-arrowdown"></i>
                        </a>
                        <ul>
                            <li><a href="{{ route('zh-cn') }}"><img src="{{ $cn_flg_img_src }}" width="21"></a></li>
                            <li><a href="{{ route('zh-hk') }}"><img src="{{ $hk_flg_img_src }}" width="21"></a></li>
                        </ul>
                    </li>
                <?php 
                    } else if ($prefix === 'cn') {
                ?>
                    <li class="dropdown language-switcher">
                        <a href="{{ route('zh-cn') }}">
                            <img src="{{ $cn_flg_img_src }}" width="21"><i class="icon-arrowdown"></i>
                        </a>
                        <ul>
                            <li><a href="{{ route('zh-hk') }}"><img src="{{ $hk_flg_img_src }}" width="21"></a></li>
                            <li><a href="{{ route('en') }}"><img src="{{ $en_flg_img_src }}" width="21"></a></li>
                        </ul>
                    </li>
                <?php 
                    } else {
                ?>
                    <li class="dropdown language-switcher">
                        <a href="{{ route('zh-hk') }}">
                            <img src="{{ $hk_flg_img_src }}" width="21"><i class="icon-arrowdown"></i>
                        </a>
                        <ul>
                            <li><a href="{{ route('zh-cn') }}"><img src="{{ $cn_flg_img_src }}" width="21"></a></li>
                            <li><a href="{{ route('en') }}"><img src="{{ $en_flg_img_src }}" width="21"></a></li>
                        </ul>
                    </li>
                <?php 
                    }
                ?>
            </ul>
            <!-- begin::mobile home  -->
            <ul class="mobile-home">
                <li>
                    <a href="/" class="link-home"><i class="icon-home"></i></a>
                </li>
            </ul>
            <!-- end::mobile home  -->
            <div class="mobile-menu-wrapper">
                <a href="javascript:;" class="mobile-menu-close">X</a>
                <ul id="mobile-menu">
                    <li>
                        <a href="/">{{ __('Home') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('viewFindTalent') }}" class="logout-link">{{ __('Find Talents')}}</a>
                    </li>
                    @if( Auth::user() !== null )
                    <li>
                        <a href="{{ route('profile') }}" class="logout-link">{{ __('My Account')}}</a>
                    </li>
                    <li>
                        <a href="{{ route('changePassword') }}" class="logout-link">{{ __('Change Password')}}</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="logout-link">{{ __('Logout')}}</a>
                    </li>
                    @else
                    <li><a href="{{ route('login') }}">{{ __('Login')}}</a></li>
                    <li><a href="{{ route('clientRegister') }}">{{ __('Register as client')}}</a></li>
                    <li><a href="{{ route('talentRegister') }}">{{ __('Register as talent')}}</a></li>
                    @endif
                </ul>

                <!-- begin::language bar -->
                <?php 
                    if ($prefix === 'en') {
                ?>
                    <ul class="language-switcher">
                        <li><a href="{{ route('zh-cn') }}"><img src="{{ $cn_flg_img_src }}" width="21"></a></li>
                        <li><a href="{{ route('zh-hk') }}"><img src="{{ $hk_flg_img_src }}" width="21"></a></li>
                    </ul>
                <?php 
                    } else if ($prefix === 'cn') {
                ?>
                    <ul class="language-switcher">
                        <li><a href="{{ route('zh-hk') }}"><img src="{{ $hk_flg_img_src }}" width="21"></a></li>
                        <li><a href="{{ route('en') }}"><img src="{{ $en_flg_img_src }}" width="21"></a></li>
                    </ul>
                <?php 
                    } else {
                ?>
                    <ul class="language-switcher">
                        <li><a href="{{ route('zh-cn') }}"><img src="{{ $cn_flg_img_src }}" width="21"></a></li>
                        <li><a href="{{ route('en') }}"><img src="{{ $en_flg_img_src }}" width="21"></a></li>
                    </ul>
                <?php 
                    }
                ?>
                <!-- end::language bar -->
            </div>
            <a href="javascript:;" class="mobile-menu-toggler"><i class="icon-hamburger"></i></a>
        </div>
    </div>
</header> 
<!-- <header>
    <div class="container d-flex justify-content-between align-items-center">
        <a href="{{ route('base_url') }}"><img src="{{ asset('assets/front/images/logo.png')}}" alt="Logo" title="Logo"/></a>
        <div class="header-right">

            <a href="javascript:;" class="mobile-menu-toggler"><i class="icon-hamburger"></i></a>
        </div>
    </div>
</header> -->
@yield('content')
<footer class="footer-talent">
    <div class="container">
        <p class="copyright">©{{ __('Copyright') }} <strong>MPL</strong>&nbsp;&nbsp; {{ __('All rights reserved')}}.</p>
    </div>
</footer>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="{{ asset('assets/front/js/jquery.blockUI.js')}}"></script>
<script src="{{ asset('assets/front/js/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{ asset('assets/front/js/main.js')}}"></script>
</html>