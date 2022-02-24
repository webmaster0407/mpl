{{-- Extends layout --}}
@extends('layout.auth_layout')

{{-- Content --}}
@section('content')

<section id="section-presignup">
    <div class="presignup-wrapper">
        <div class="presignup-container">
            <div id="presignup-form">
                <h3><span class="color-bluelight">{{ __('How would you like to')}}</span> {{ __('register')}}?</h3>
                <p>{{ __('Register yourself as a talented new artist, Lorem ipsum.')}}</p>
                <div class="form-group">
                    <a href="{{ route('talentRegister') }}" class="btn btn-third">{{ __('Talent Signup')}}<i class="icon-right-white"></i></a>
                </div>
                <div class="form-group">
                    <a href="{{ route('clientRegister') }}" class="btn btn-fourth">{{ __('Client Signup')}}<i class="icon-right-blue"></i></a>
                </div>
                <div class="actions">
                    <a href="{{ route('login') }}" class="btn btn-fifth"><i class="icon-back"></i>{{ __('Back')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection