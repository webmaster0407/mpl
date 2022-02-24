{{-- Extends layout --}}
@extends('layout.auth_layout')

{{-- Content --}}
@section('content')
<section id="section-clientsignup">
    <div class="clientsignup-wrapper">
        <div class="clientsignup-container">
            <div id="clientsignup-form">
                <h3>{{ __('Register')}} <span class="color-bluelight">{{ __('as Client')}}</span></h3>
                
                <div class="row">
                    <div class="col-xs-6">
                        <label for="name">{{ __('Full name')}}:</label>
                        <div class="form-group">
                            <i class="icon-user"></i>
                            <input type="text" id="name" name="name" />
                        </div>
						<div class="alert alert-danger name_error" style="display: none;">{{ __('This field is required')}}!</div>

                        <label for="email">{{ __('Email')}}:</label>
                        <div class="form-group">
                            <i class="icon-email"></i>
                            <input type="email" id="email" name="email" />
                        </div>
                        <div class="alert alert-danger email_error" style="display: none;">{{ __('This field is required')}}!</div>

                        <label for="telephone">{{ __('Phone')}}:</label>
                        <div class="form-group">
                            <i class="icon-view"></i>
                            <input type="tel" id="telephone" name="telephone" />
                        </div>
                        <div class="alert alert-danger telephone_error" style="display: none;">{{ __('This field is required')}}!</div>
                    </div>

                    <div class="col-xs-6">
                        <label for="password">{{ __('Password')}}:</label>
                        <div class="form-group">
                            <i class="icon-password"></i>
                            <input type="password" id="password" name="password" />
                        </div>
                        <div class="alert alert-danger password_error" style="display: none;">{{ __('This field is required')}}!</div>

                        <label for="verify_password">{{ __('Confirm password')}}:</label>
                        <div class="form-group">
                            <i class="icon-password"></i>
                            <input type="password" id="verify_password" name="verify_password" />
                        </div>
                        <div class="alert alert-danger verify_password_error" style="display: none;">{{ __('This field is required')}}!</div>
                        <div class="alert alert-danger same_password_error" style="display: none;">{{ __('Not match with Password')}}!</div>

                        <label for="company">{{ __('Company name')}}:</label>
                        <div class="form-group">
                            <i class="icon-view"></i>
                            <input type="text" id="company" name="company" />
                        </div>
                        <div class="alert alert-danger company_error" style="display: none;">{{ __('This field is required')}}!</div>
                    </div>
                </div>
                <div class="actions">
                    <a href="#" id="registerAsClientBtn" class="btn btn-secondary">{{ __('Submit')}}</a>
                </div>
                <p class="text-right">{{ __('Already registered')}}? <a href="{{ route('login') }}">{{ __('Login here')}}</a></p>
            </div>
            <div class="social-logins">
                <div class="social-logins-desc">
                    <label><span class="separator"></span><span>{{ __('Or Sign up using')}}</span><span class="separator"></span></label>
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
	var DO_REGISTER_URL = "{{ route('doRegister') }}";	
	var LOGIN_URL = "{{ route('login') }}";
</script>
@endsection