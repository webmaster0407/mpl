{{-- Extends layout --}}
@extends('layout.admin')

{{-- Content --}}
@section('content')

<?php 
	$admin = session('admin'); 
	$admin_photo_url = session('admin_photo_url'); 
?>

<!--begin::Content-->
<div class="flex-row-fluid">
    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">{{ __('Update Profile')}}</h3>
                <span class="text-muted font-weight-bold font-size-sm mt-1">{{ __('Update your profile')}}</span>
            </div>
            <div class="card-toolbar">
                <button type="button" id = "update_profile" class="btn btn-success mr-2">{{ __('Save Changes')}}</button>
                <button type="button" id = "back_btn" class="btn btn-secondary">{{ __('Back')}}</button>
            </div>
        </div>
        <!--end::Header-->
        <div class="card-body">
	        <!--begin::Form-->
			<form class="form">
				<div class="form-group row">
					<label class="col-xl-3 col-lg-3 text-right col-form-label">{{ __('Avatar')}}</label>
					<div class="col-lg-9 col-xl-9">
						<div class="image-input image-input-outline" id="user_avatar" style="background-image: url('{{ asset('assets/admin/media/users/blank.png') }}')">
							<div class="image-input-wrapper" style="background-image: url('{{ $admin_photo_url }}')"></div>
							<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
								<i class="fa fa-pen icon-sm text-muted"></i>
								<input type="file" name="profile_avatar" class="photo" accept=".png, .jpg, .jpeg" />
								<input type="hidden" name="profile_avatar_remove" />
							</label>
							<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
								<i class="ki ki-bold-close icon-xs text-muted"></i>
							</span>
							<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
								<i class="ki ki-bold-close icon-xs text-muted"></i>
							</span>
						</div>
						<div class="alert alert-danger photo_error" style="display: none;">{{ __('You should select Photo')}}</div>
					</div>

				</div>

				<div class="form-group row">
					<label class="col-xl-3 col-lg-3 text-right col-form-label" for="name">{{ __('Name') }}</label>
					<div class="col-lg-9 col-xl-6">
						<input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $admin->name }}" />
						<div class="alert alert-danger name_error" style="display: none;">This field is required!</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-xl-3 col-lg-3 text-right col-form-label" for="email">{{ __('Email') }}</label>
					<div class="col-lg-9 col-xl-6">
						<input class="form-control form-control-lg form-control-solid"  type="email" name="email" id="email" value="{{ $admin->email }}" />
						<div class="alert alert-danger email_error" style="display: none;">This field is required!</div>
					</div>
				</div>
			</form>
	        <!--end::Form-->
        </div>

    </div>
</div>
<!--end::Content-->

<script type="text/javascript">
	var DO_UPDATE_PROFILE_URL = "{{ route('admin.doUpdateProfile') }}";
</script>
@endsection