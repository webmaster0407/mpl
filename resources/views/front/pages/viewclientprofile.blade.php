{{-- Extends layout --}}
@extends('layout.app')

{{-- Content --}}
@section('content')
<section id="section-talentcategories" class="d-flex align-items-center">
    <div class="container">
        <div id="edit_client_profile_form">
            <form id="clientsignup-form">
                <div class="row">
                    <div class="col-xs-6">
                        <label for="name">{{ __('Full name')}}:</label>
                        <div class="form-group">
                            <i class="icon-user"></i>
                            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" />
                        </div>
                        <div class="alert alert-danger name_error" style="display: none;">{{ __('This field is required')}}!</div>

                        <label for="email">{{ __('Email')}}:</label>
                        <div class="form-group">
                            <i class="icon-email"></i>
                            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" />
                        </div>
                        <div class="alert alert-danger email_error" style="display: none;">{{ __('This field is required')}}!</div>
                    </div>
                    <div class="col-xs-6">
                        <label for="company">{{ __('Company name')}}:</label>
                        <div class="form-group">
                            <i class="icon-view"></i>
                            <input type="text" id="company" name="company" value="{{ $userdata->company }}" />
                        </div>
                        <div class="alert alert-danger company_error" style="display: none;">{{ __('This field is required')}}!</div>

                        <label for="telephone">{{ __('Phone')}}:</label>
                        <div class="form-group">
                            <i class="icon-view"></i>
                            <input type="tel" id="telephone" name="telephone"  value="{{ $userdata->telephone }}" />
                        </div>
                        <div class="alert alert-danger telephone_error" style="display: none;">{{ __('This field is required')}}!</div>
                    </div>
                </div>
                <div class="actions">
                    <a href="#" id="edit_client_profile_form_submit_btn" class="btn btn-secondary">{{ __('Submit')}}</a>
                </div>
            </form>
        </div>
    </div>
</section>
<script type="text/javascript">
	var EDIT_PROFILE_URL = "{{ route('editProfile') }}";
	var UPLOAD_PHOTO_URL = "{{ route('uploadPhotos') }}";
	var DELETE_PHOTO_URL = "{{ route('deletePhotos') }}";
</script>
@endsection