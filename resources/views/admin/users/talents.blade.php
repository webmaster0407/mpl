{{-- Extends layout --}}
@extends('layout.admin')

{{-- Content --}}
@section('content')
<!--begin::Card-->
<div class="card card-custom">
	<!--begin::Header-->
	<div class="card-header flex-wrap border-0 pt-6 pb-0">
		<div class="card-title">
			<h3 class="card-label">{{ __('Talent Management')}}
		</div>
		<div class="card-toolbar">
			<form class="ml-5">
				<div class="input-group input-group-sm input-group-solid" style="max-width: 175px">
					<input type="text" class="form-control" id="talents_search_form" placeholder="Search..." />
					<div class="input-group-append">
						<span class="input-group-text">
							<span class="svg-icon">
								<!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
										<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
							<!--<i class="flaticon2-search-1 icon-sm"></i>-->
						</span>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!--end::Header-->
	<!--begin::Body-->
	<div class="card-body">
		<!--begin: Datatable-->
		<div class="datatable datatable-bordered datatable-head-custom" id="talents_datatable"></div>
		<!--end: Datatable-->

		<!--begin:: Edit form-->
		<div class="view_talents_section" style="display: none;">
			
			<div class="view_talents_button_group">
				<button class="return_talents_btn btn btn-success">{{ __('Go Back')}}</button>
			</div>
		</div>
		<!--begin:: Edit form-->

		<!--begin:: Edit form-->
		<div class="edit_talents_section row" style="display: none;">
			<input type="hidden" name="talents_hidden_id" id="talents_hidden_id">
			<div class="form-group col-md-4">
				<label for="name">{{ __('Name')}} <span class="text-danger">*</span></label>
				<input type="text" class="form-control" name="name" id="name" >
				<div class="alert alert-danger name_error" style="display: none;">{{ __('The Field is required')}}!</div>
			</div>
			<div class="form-group col-md-6">
				<label for="email">{{ __('Email')}} <span class="text-danger">*</span></label>
				<input type="text" class="form-control" name="email" id="email" >
				<div class="alert alert-danger email_error" style="display: none;">{{ __('The Field is required')}}!</div>
			</div>
			<div class="form-group col-md-2">
				<label for="gender">{{ __('Gender')}} <span class="text-danger">*</span></label>
				<select name="gender" class="form-control" id="gender">
					<option value="male">{{ __('Male')}}</option>
					<option value="female">{{ __('Female')}}</option>
				</select>
				<div class="alert alert-danger gender_error" style="display: none;">{{ __('The Field is required')}}!</div>
			</div>
			<div class="form-group col-md-3">
				<label for="phone">{{ __('Phone')}} <span class="text-danger">*</span></label>
				<input type="text" class="form-control" name="phone" id="phone" >
				<div class="alert alert-danger phone_error" style="display: none;">{{ __('The Field is required')}}!</div>
			</div>
			<div class="form-group col-md-3">
				<label for="birthday_year">{{ __('Birth Year')}} <span class="text-danger">*</span></label>
				<input type="number" class="form-control" name="birthday_year" id="birthday_year" >
				<div class="alert alert-danger birthday_year_error" style="display: none;">{{ __('The Field is required')}}!</div>
			</div>
			<div class="form-group col-md-2">
				<label for="height">{{ __('Height')}} <span class="text-danger">*</span></label>
				<input type="number" class="form-control" name="height" id="height" >
				<div class="alert alert-danger height_error" style="display: none;">{{ __('The Field is required')}}!</div>
			</div>
			<div class="form-group col-md-2">
				<label for="weight">{{ __('Weight')}} <span class="text-danger">*</span></label>
				<input type="number" class="form-control" name="weight" id="weight" >
				<div class="alert alert-danger weight_error" style="display: none;">{{ __('The Field is required')}}!</div>
			</div>
			<div class="form-group col-md-2">
				<label for="chest">{{ __('Chest')}} <span class="text-danger">*</span></label>
				<input type="number" class="form-control" name="chest" id="chest" >
				<div class="alert alert-danger chest_error" style="display: none;">{{ __('The Field is required')}}!</div>
			</div>
			<div class="form-group col-md-2">
				<label for="hips">{{ __('Hips')}} <span class="text-danger">*</span></label>
				<input type="number" class="form-control" name="hips" id="hips" >
				<div class="alert alert-danger hips_error" style="display: none;">{{ __('The Field is required')}}!</div>
			</div>
			<div class="form-group col-md-2">
				<label for="shoes">{{ __('Shoes')}} <span class="text-danger">*</span></label>
				<input type="number" class="form-control" name="shoes" id="shoes" >
				<div class="alert alert-danger shoes_error" style="display: none;">{{ __('The Field is required')}}!</div>
			</div>
			<div class="form-group col-md-8">
				<label for="category">{{ __('Category')}} <span class="text-danger">*</span></label>
				<select class="form-control" name="category" id="category">
					@if ( isset($categories) && (count($categories) > 0 ) )
						@foreach ($categories as $category)
							<option value="{{ $category->id }}">{{ __($category->name) }}</option>
						@endforeach
					@endif
				</select>
				<div class="alert alert-danger category_error" style="display: none;">{{ __('The Field is required')}}!</div>
			</div>
			<div class="form-group col-md-12">
				<label for="job_reference">{{ __('Job Reference')}} <span class="text-danger">*</span></label>
				<div class="summernote" id="job_description"></div>
				<div class="alert alert-danger job_description_error" style="display: none;">{{ __('The Field is required')}}!</div>
			</div>
			<div class="form-group col-md-12">
				<label>{{ __('Uploaded Photos')}}</label>
				<div class="row talent_uploaded_photos">
					<!-- Uploaded photos will be here -->
				</div>
			</div>
			<div class="edit_talents_button_group col-md-12">
				<button class="save_talents_btn btn btn-success">{{ __('Save')}}</button>
				<button class="cancel_talents_btn btn btn-warning">{{ __('Cancel')}}</button>
			</div>
		</div>
		<!--begin:: Edit form-->
	</div>
	<!--end::Body-->
</div>
<!--end::Card-->
<script type="text/javascript">
	var TALENTS_DATA_URL = "{{ route('admin.users.getTalentsData') }}";
	var GET_TALENT_DETAIL_URL = "{{ route('admin.users.getTalentDetail') }}";
	var UPDATE_TALENT_URL = "{{ route('admin.users.updateTalent') }}";
	var UPDATE_TALENT_STATE_URL = "{{ route('admin.users.updateTalentState') }}";
	var DELETE_TALENT_URL = "{{ route('admin.users.deleteTalent') }}";
	var BASE_URL = "{{ route('base_url') }}";
	var CHANGE_PHOTO_STATE_URL = "{{ route('admin.users.photoPermissionStateChange') }}";
	var DELETE_PHOTO_URL = "{{ route('admin.users.deleteTalentPhoto') }}";
</script>
@endsection