{{-- Extends layout --}}
@extends('layout.auth_layout')

{{-- Content --}}
@section('content')

<section id="section-login">
    <div class="login-wrapper">
        <div class="login-container">
            <div id="login-form">
                <h1>{{ __('Login')}}</h1>
                <p>{{ __('Login Your Account')}}</p>
                <label for="email">{{__('Email')}}:</label>
                <div class="form-group">
                    <i class="icon-email"></i>
                    <input type="email" id="email" name="email" />
                </div>
                <div class="alert alert-danger email_error" style="display: none;">{{ __('The field is required')}}!</div>
                <label for="password">{{ __('Password')}}:</label>
                <div class="form-group">
                    <i class="icon-password"></i>
                    <input type="password" id="password" name="password" />
                </div>
                <div class="alert alert-danger password_error" style="display: none;">{{ __('The field is required')}}!</div>
                <div class="actions">
                    <a href="#" class="btn btn-secondary" id="loginBtn">{{ __('Login')}}</a>
                </div>
                <p>{{ __('Forgot password')}}? <a href="#">{{ __('Reset here')}}</a></p>
            </div>
            <div class="social-logins">
                <div class="social-logins-desc">
                    <p>{{ __("Don't have account") }}? <a href="{{ route('register') }}">{{ __('Signup here')}}</a></p>
                    <label><span class="separator"></span><span>{{ __('Or Login with')}}</span><span class="separator"></span></label>
                </div>
                <ul>
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-gmail"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
	var LOGIN_URL = "{{ route('doLogin') }}";
	var BASE_URL = "{{ route('base_url') }}";
</script>
@endsection




