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
    <link rel="stylesheet" href="{{ asset('assets/front/css/styles.css')}}">
    <title> MPL | 404 </title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/front/images/favicon//apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/front/images/favicon//favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/front/images/favicon//favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('assets/front/images/favicon//site.webmanifest')}}">
    </head>
<body>
<header>
    <div class="container d-flex justify-content-between align-items-center">
        <a href="{{ route('base_url') }}"><img src="{{ asset('assets/front/images/logo.png')}}" alt="Logo" title="Logo"/></a>
        <div class="header-right">
            <ul id="main-menu">
                <!-- end::language bar -->
            </ul>
            <div class="mobile-menu-wrapper">
                <!-- end::language bar -->
            </div>
            <a href="javascript:;" class="mobile-menu-toggler"><i class="icon-hamburger"></i></a>
        </div>
    </div>
</header>

<section id="section-talentcategories" class="text-center d-flex flex-column justify-content-center">
    <h1 style="font-size: 100px;">404</h1>
    @if( (Auth::user() !== null) && (Auth::user()->role =='admin') )
    <div><a href="{{ route('base_url') }}" class="btn btn-secondary" style="width: 200px;">{{ __('Back To Home')}}</a></div>
    @else
    <div><a href="{{ route('admin.home') }}" class="btn btn-secondary" style="width: 200px;">{{ __('Back To Home')}}</a></div>
    @endif
    
</section>

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="{{ asset('assets/front/js/main.js')}}"></script>
</html>