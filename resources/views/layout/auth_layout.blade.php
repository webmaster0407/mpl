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

    @include('front.inc.auth_header')

    <title> @if(isset($page_title) ) {{ __($page_title) }} @else {{__('MPL - Marketing and Production Limited')}} @endif</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/front/images/favicon//apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/front/images/favicon//favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/front/images/favicon//favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('assets/front/images/favicon//site.webmanifest')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/front/js/sweetalert/sweetalert.css')}}">
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/front/css/styles.css')}}">
    </head>
<body>

@yield('content')

@include('front.inc.auth_footer')

</body>
</html>