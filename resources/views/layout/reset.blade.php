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
<header>
    <div class="container d-flex justify-content-between align-items-center">
        <a href="{{ route('base_url') }}"><img src="{{ asset('assets/front/images/logo.png')}}" alt="Logo" title="Logo"/></a>
        <div class="header-right">

            <a href="javascript:;" class="mobile-menu-toggler"><i class="icon-hamburger"></i></a>
        </div>
    </div>
</header>
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