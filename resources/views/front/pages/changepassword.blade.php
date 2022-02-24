{{-- Extends layout --}}
@extends('layout.app')

{{-- Content --}}
@section('content')
<style type="text/css">
	#changepassword_form {
		width: 50%;
		margin: auto;
	}
</style>
<section id="section-talentcategories">
    <div id="changepassword_form">
        <label for="password">{{ __('Password')}}:</label>
        <div class="form-group">
            <i class="icon-password"></i>
            <input type="password" id="password" name="password" />
        </div>
        <div class="alert alert-danger password_error" style="display: none;">{{ __('The field is required')}}!</div>
        <label for="new_password">{{ __('New Password')}}:</label>
        <div class="form-group">
            <i class="icon-password"></i>
            <input type="password" id="new_password" name="new_password" />
        </div>
        <div class="alert alert-danger new_password_error" style="display: none;">{{ __('The field is required')}}!</div>
        <label for="verify_password">{{ __('Confirm Password')}}:</label>
        <div class="form-group">
            <i class="icon-password"></i>
            <input type="password" id="verify_password" name="verify_password" />
        </div>
        <div class="alert alert-danger verify_password_error" style="display: none;">{{ __('The field is required')}}!</div>
        <div class="alert alert-danger same_password_error" style="display: none;">{{ __('Not match with new password')}}!</div>
        <div class="actions">
            <a href="#" class="btn btn-secondary" id="changePasswordBtn">{{ __('Change Password')}}</a>
        </div>
    </div>
</section>
<script type="text/javascript">
	var DO_CHANGE_PASSWORD_URL = "{{ route('doChangePassword') }}";
</script>
@endsection