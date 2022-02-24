<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="title" content="@if(isset($cmsPage->meta_title)){{ $cmsPage->meta_title }} @else {{ __('MPL - Marketing and Production Limited') }} @endif">
    <meta name="keyword" content="@if(isset($cmsPage->meta_keyword)){{ $cmsPage->meta_keyword }} @else {{ __('MPL, Marcketin, Production') }} @endif">
    <meta name="description" content="@if(isset($cmsPage->meta_description)){{ $cmsPage->meta_description }} @else {{ __('MPL - Marketing and Production Limited...') }} @endif" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/front/js/sweetalert/sweetalert.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/cms.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/styles.css')}}">
    <title> @if(isset($cmsPage->page_title) ) {{ __($cmsPage->page_title) }} @else {{__('MPL - Marketing and Production Limited')}} @endif</title>
    </head>
<body>
<header>
</header>
@include('front.inc.app_header')
    @yield('content')
@include('front.inc.app_footer')
</body>
</html>