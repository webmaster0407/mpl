{{-- Extends layout --}}
@extends('layout.admin')

{{-- Content --}}
@section('content')
<!--begin::Card-->
<div class="card card-custom">
	<!--begin::Header-->
	<div class="card-header flex-wrap border-0 pt-6 pb-0">
		<div class="card-title">
			<h3 class="card-label">{{ __('Client Management')}}
		</div>
		<div class="card-toolbar">
			<form class="ml-5">
				<div class="input-group input-group-sm input-group-solid" style="max-width: 175px">
					<input type="text" class="form-control" id="clients_search_form" placeholder="{{ __('Search...') }}" />
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
		<div class="datatable datatable-bordered datatable-head-custom" id="clients_datatable"></div>
		<!--end: Datatable-->

		<!--begin:: Edit form-->
		<div class="edit_clients_section row" style="display: none;">
			<input type="hidden" name="clients_hidden_id" id="clients_hidden_id">
			<div class="form-group col-md-6">
				<label for="name">Name <span class="text-danger">*</span></label>
				<input type="text" class="form-control" name="name" id="name" >
				<div class="alert alert-danger name_error" style="display: none;">The Field is required!</div>
			</div>
			<div class="form-group col-md-6">
				<label for="email">Email <span class="text-danger">*</span></label>
				<input type="email" class="form-control" name="email" id="email" >
				<div class="alert alert-danger email_error" style="display: none;">The Field is required!</div>
			</div>
			<div class="form-group col-md-6">
				<label for="telephone">Telephone <span class="text-danger">*</span></label>
				<input type="text" class="form-control" name="telephone" id="telephone" >
				<div class="alert alert-danger telephone_error" style="display: none;">The Field is required!</div>
			</div>
			<div class="form-group col-md-6">
				<label for="company">Company <span class="text-danger">*</span></label>
				<input type="text" class="form-control" name="company" id="company" >
				<div class="alert alert-danger company_error" style="display: none;">The Field is required!</div>
			</div>
			<div class="edit_clients_button_group col-md-12">
				<button class="save_clients_btn btn btn-success">Save</button>
				<button class="cancel_clients_btn btn btn-warning">Cancel</button>
			</div>
		</div>
		<!--begin:: Edit form-->
	</div>
	<!--end::Body-->
</div>
<!--end::Card-->
<script type="text/javascript">
	var CLIENTS_DATA_URL = "{{ route('admin.users.getClientsData') }}";
	var GET_CLIENT_DETAIL_URL = "{{ route('admin.users.getClientDetail') }}";
	var UPDATE_CLIENT_URL = "{{ route('admin.users.updateClient') }}";
	var UPDATE_CLIENT_STATE_URL = "{{ route('admin.users.updateClientState') }}";
	var DELETE_CLIENT_URL = "{{ route('admin.users.deleteClient') }}";
</script>
@endsection