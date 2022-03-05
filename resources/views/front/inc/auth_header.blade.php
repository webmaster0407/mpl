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