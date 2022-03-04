{{-- Extends layout --}}
@extends('layout.admin')

{{-- Content --}}
@section('content')
<!--begin::Card-->
<div class="card card-custom">
	<!--begin::Header-->
	<div class="card-header flex-wrap border-0 pt-6 pb-0">
		<div class="card-title">
			<h3 class="card-label">{{ __('Contacts Management')}}
		</div>
		<div class="card-toolbar">
			<form class="ml-5">
				<div class="input-group input-group-sm input-group-solid" style="max-width: 175px">
					<input type="text" class="form-control" id="contacts_search_form" placeholder="{{ __('Search...') }}" />
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
		<div class="datatable datatable-bordered datatable-head-custom" id="contacts_datatable"></div>
		<!--end: Datatable-->

		<!--begin:: View Contact form-->
		<div class="view_contact_section row" style="display: none;">
			<div class="col-md-3">
				<h4><b class="text-primary">{{ __('Name')}} : </b><span id="name"></span></h4>
			</div>
			<div class="col-md-5">
				<h4><b class="text-primary">{{ __('Email')}} : </b><span id="email"></span></h4>
			</div>
			<div class="col-md-4">
				<h4><b class="text-primary">{{ __('Phone')}} : </b><span id="phone"></span></h4>
			</div>
			<div class="col-md-12" style="margin-top: 20px;">
				<h4><b class="text-primary">{{ __('Subject')}} : </b><span id="subject"></span></h4>
			</div>
			<div class="col-md-12" style="margin-top: 20px;">
				<h5><b class="text-primary">{{ __('Message')}} : </b></h5>
				<h6><span id="message"></span></h6>
			</div>
			<div class="contacts_button_group col-md-12">
				<button class="back_contacts_btn btn btn-primary">{{ __('Back')}}</button>
			</div>
		</div>
		<!--begin:: Edit form-->
	</div>
	<!--end::Body-->
</div>
<!--end::Card-->
<script type="text/javascript">
	var CONTACTS_DATA_URL = "{{ route('admin.contacts.getContactsData') }}";
	var GET_CONTACT_DETAIL_URL = "{{ route('admin.contacts.getContactDetail') }}";
	var UPDATE_VISITED_STATUS_URL = "{{ route('admin.contacts.changeVisitedStates') }}";
	var DELETE_CONTACT_URL = "{{ route('admin.contacts.deleteContacts') }}";
</script>
@endsection