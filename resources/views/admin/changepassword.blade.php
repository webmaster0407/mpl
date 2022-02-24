{{-- Extends layout --}}
@extends('layout.admin')

{{-- Content --}}
@section('content')
<!--begin::Profile Change Password-->
<div class="d-flex flex-row">
    <!--begin::Aside-->
    <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
        <!--begin::Profile Card-->
        <div class="card card-custom card-stretch">
            <!--begin::Body-->
            <div class="card-body pt-4">
                <!--begin::User-->
                <div class="d-flex align-items-center">
                	@if(session('admin_photo_url') !== null)
                	<?php $admin_photo_url = session('admin_photo_url'); ?>
                	@else 
                	<?php $admin_photo_url = ""; ?>
                	@endif
                	<div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                		<div class="symbol-label" style="background-image:url('{{ $admin_photo_url }}')"></div>
                		<i class="symbol-badge bg-success"></i>
                	</div>
                    <div>
                        <p class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">
                        	@if(session('admin')->name !== null)
                        	{{session('admin')->name }}
                        	@else 
                        	{{ '----' }}
                        	@endif
                        </p>
                        <div class="text-muted">{{ __('Administrator')}}</div>
                    </div>
                </div>
                <!--end::User-->
                <!--begin::Contact-->
                <div class="py-9">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">{{ __('Email')}}:</span>
                        <p class="text-muted text-hover-primary">
                        	@if(session('admin')->email !== null)
                        	{{session('admin')->email}}
                        	@else
                        	{{ '----' }}
                        	@endif
                        </p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">{{ __('Created At')}}:</span>
                        <p class="text-muted text-hover-primary">
                        	@if(session('admin')->created_at !== null)
                        	{{session('admin')->created_at}}
                        	@else
                        	{{ '----' }}
                        	@endif
                        </p>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">{{ __('Updated At')}}:</span>
                        <p class="text-muted text-hover-primary">
                        	@if(session('admin')->updated_at !== null)
                        	{{session('admin')->updated_at}}
                        	@else
                        	{{ '----' }}
                        	@endif
                        </p>
                    </div>
                </div>
                <!--end::Contact-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Profile Card-->
    </div>
    <!--end::Aside-->
    <!--begin::Content-->
    <div class="flex-row-fluid ml-lg-8">
        <!--begin::Card-->
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                    <h3 class="card-label font-weight-bolder text-dark">{{ __('Change Password')}}</h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">{{ __('Change your account password')}}</span>
                </div>
                <div class="card-toolbar">
                    <button type="button" id = "changePassword" class="btn btn-success mr-2">{{ __('Save Changes')}}</button>
                    <button type="button" id = "resetBtn" class="btn btn-secondary">{{ __('Reset')}}</button>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form class="form">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-alert" for="current_password">{{ __('Current Password')}}</label>
                        <div class="col-lg-9 col-xl-6">
                            <input id="current_password" name="current_password" type="password" class="form-control form-control-lg form-control-solid mb-2" value="" placeholder="Current password" />
                            <div class="alert alert-danger current_password_error" style="display: none;">{{ __('The field is required!')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-alert" for="new_password">{{ __('New Password')}}</label>
                        <div class="col-lg-9 col-xl-6">
                            <input id="new_password" name="new_password" type="password" class="form-control form-control-lg form-control-solid" value="" placeholder="New password" />
                            <div class="alert alert-danger new_password_error" style="display: none;">{{ __('The field is required!')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-alert" for="verify_password">{{ __('Verify Password')}}</label>
                        <div class="col-lg-9 col-xl-6">
                            <input id="verify_password" name="verify_password" type="password" class="form-control form-control-lg form-control-solid" value="" placeholder="Verify password" />
                            <div class="alert alert-danger verify_password_error" style="display: none;">{{ __('The field is required!')}}</div>
                            <div class="alert alert-danger same_password_error" style="display: none;">{{ __('Verify password must be same as new password!')}}</div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
    <!--end::Content-->
</div>
<!--end::Profile Change Password-->
<script type="text/javascript">
	var CHANGE_PASSWORD_URL = "{{ route('admin.doChangePassword') }}";
</script>
@endsection