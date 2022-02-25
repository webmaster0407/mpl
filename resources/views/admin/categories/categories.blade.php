{{-- Extends layout --}}
@extends('layout.admin')

{{-- Content --}}
@section('content')
<!--begin::Card-->
<div class="card card-custom">
	<div class="card-header flex-wrap border-0 pt-6 pb-0">
		<div class="card-title">
			<h3 class="card-label">{{ __('Categories')}} 
			<span class="d-block text-muted pt-2 font-size-sm">{{ __('Add, Edit, Delete categories')}}</span></h3>
		</div>
	</div>
	<div class="card-body">
		<!--begin::Search Form-->
		<div class="mb-7">
			<div class="row align-items-center">
				<div class="col-lg-12 col-xl-12">
					<div class="row align-items-center">
						<div class="col-md-3 my-2 my-md-0">
							<div class="input-icon">
								<input type="text" class="form-control" placeholder="{{ __('Search...') }}" id="kt_datatable_search_query" />
								<span>
									<i class="flaticon2-search-1 text-muted"></i>
								</span>
							</div>
						</div>
						<div class="col-md-3 my-2 my-md-0">
						</div>
						<div class="col-md-3 my-2 my-md-0">
						</div>
						<div class="col-md-3 my-2 my-md-0">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end::Search Form-->
		<div class="row">
			<div class="col-md-8">
				<!--begin: Datatable-->
				<div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
				<!--end: Datatable-->
			</div>
			<div class="col-md-4">
				<!--begin: Add/Edit Category-->
				<input type="hidden" name="cat_hidden" id="cat_hidden">
				<div class="form-group">
					<label for="cat_name">{{ __('Name')}} <span class="text-danger">*</span></label>
					<input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="...">
					<div class="alert alert-danger cat_name_error" style="display: none;"></div>
				</div>
				<div class="form-group">
					<label for="cat_name">{{ __('Description')}}</label>
					<textarea name="cat_description" id="cat_description" class="form-control" rows="10"></textarea>
				</div>
				<div class="category_form_btns">
					<button class="btn btn-primary cat_add_btn">{{ __('Add Category')}}</button>
					<button class="btn btn-warning cat_reset_btn">{{ __('Reset')}}</button>
					<button class="btn btn-success cat_save_btn">{{ __('Save Changes')}}</button>
					<button class="btn btn-warning cat_cancel_btn">{{ __('Cancel')}}</button>	
				</div>
				
				<!--end: Add/Edit Category-->
			</div>
		</div>

	</div>
</div>
<!--end::Card-->
<script type="text/javascript">
	var CATEGORIES_DATA_URL = "{{ route('admin.categories.getCategoriesData') }}";
	var GET_CATEGORIY_DETAIL_URL = "{{ route('admin.categories.getCategoryDetail') }}";
	var ADD_CATEGORIY_DETAIL_URL = "{{ route('admin.categories.addCategory') }}";
	var UPDATE_CATEGORIY_DETAIL_URL = "{{ route('admin.categories.updateCategory') }}";
	var UPDATE_PERMISSION_STATE_URL = "{{ route('admin.categories.updatePermissionState') }}";
	var DELETE_CATEGORIY_DETAIL_URL = "{{ route('admin.categories.deleteCategory') }}";
</script>
@endsection