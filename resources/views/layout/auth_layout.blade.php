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
    </head>
<body>

<?php 
    $en_flg_img_src = asset('assets/front/images/en.png');
    $cn_flg_img_src = asset('assets/front/images/zh-cn.png');
    $hk_flg_img_src = asset('assets/front/images/zh-hk.png');
?>
<header>
    <div class="container d-flex justify-content-between align-items-center">
        <a href="{{ route('base_url') }}">
        	<img src="{{ asset('assets/front/images/logo.png')}}" alt="Logo" title="Logo" class="visible-desktop" />
        	<img src="{{ asset('assets/front/images/footer-logo.png')}}" width="131" class="hidden-desktop" alt="Logo" title="Logo" />
        </a>
        <div class="header-right">
            <ul id="main-menu">
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
        </div>
    </div>
</header>

@yield('content')

@include('front.inc.auth_footer')

</body>
</html>