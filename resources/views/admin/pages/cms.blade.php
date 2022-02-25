{{-- Extends layout --}}
@extends('layout.admin')

{{-- Content --}}
@section('content')
<!--begin::Card-->
<div class="card card-custom">
	<div class="card-header flex-wrap border-0 pt-6 pb-0">
		<div class="card-title">
			<h3 class="card-label">{{ __('CMS')}} 
			<span class="d-block text-muted pt-2 font-size-sm">{{ __('CMS management')}}</span></h3>
		</div>
	</div>
	<div class="card-body">
		<!--begin::Search Form-->
		<div class="mb-7 cms_search_section">
			<div class="row align-items-center">
				<div class="col-lg-12 col-xl-12">
					<div class="row align-items-center">
						<div class="col-md-6 my-2 my-md-0">
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
							<a href="#" class="btn btn-light-primary px-6 font-weight-bold add_new_cms_btn">{{ __('Add New CMS')}}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end::Search Form-->
		<div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
		<div id="add_edit_cms_section" style="display: none;">
			<input type="hidden" name="cms_hidden_id" id="cms_hidden_id">
			<div class="row">
				<div class="form-group col-md-3">
					<label for="slug">{{ __('Slug')}} <span class="text-danger">*</span></label>
					<input type="text" class="form-control" name="slug" id="slug" placeholder="slug...">
					<div class="alert alert-danger slug_error" style="display: none;">{{ __('The field is required')}}!</div>
				</div>
				<?php 
			        $locale = "en";
			        if (Session::has('locale')) {
			            $locale = session('locale'); 
			        }
			    ?>
				<div class="form-group col-md-3">
					<label for="lang">{{ __('Language')}} <span class="text-danger">*</span></label>
					<select class="form-control" id="lang" name="lang">
						<option value="en" @if($locale == 'cn') selected @endif>{{ __('English')}}</option>
						<option value="zh-cn" @if($locale == 'zh-cn') selected @endif>{{ __('Chinese')}}</option>
						<option value="zh-hk" @if($locale == 'zh-hk') selected @endif>{{ __('Hong Kong')}}</option>
					</select>
				</div>
				<div class="form-group col-md-3">
					<label for="page_title">{{ __('Page Title')}} <span class="text-danger">*</span></label>
					<input type="text" class="form-control" name="page_title" id="page_title" placeholder="Title...">
					<div class="alert alert-danger page_title_error" style="display: none;">{{ __('The field is required')}}!</div>
				</div>
				<div class="form-group col-md-3">
					<label for="meta_title">{{ __('Meta Title')}} <span class="text-danger">*</span></label>
					<input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Meta Title...">
					<div class="alert alert-danger meta_title_error" style="display: none;">{{ __('The field is required')}}!</div>
				</div>
				<div class="form-group col-md-12">
					<label for="meta_keyword">{{ __('Meta Keyword')}} <span class="text-danger">*</span></label>
					<textarea class="form-control" name="meta_keyword" id="meta_keyword" rows="2"></textarea>
					<div class="alert alert-danger meta_keyword_error" style="display: none;">{{ __('The field is required')}}!</div>
				</div>
				<div class="form-group col-md-12">
					<label for="meta_description">{{ __('Meta Description')}} <span class="text-danger">*</span></label>
					<textarea class="form-control" name="meta_description" id="meta_description" rows="4"></textarea>
					<div class="alert alert-danger meta_description_error" style="display: none;">{{ __('The field is required')}}!</div>
				</div>
				<div class="form-group col-md-6">
					<label for="page_sub_title">{{ __('Page Sub Title')}} <span class="text-danger">*</span></label>
					<input type="text" class="form-control" name="page_sub_title" id="page_sub_title" placeholder="Sub title...">
					<div class="alert alert-danger page_sub_title_error" style="display: none;">{{ __('The field is required')}}!</div>
				</div>
				<div class="form-group col-md-6">
					<label for="page_sub_group">{{ __('Page Sub Group')}} <span class="text-danger">*</span></label>
					<input type="text" class="form-control" name="page_sub_group" id="page_sub_group" placeholder="Sub group...">
					<div class="alert alert-danger page_sub_group_error" style="display: none;">{{ __('The field is required')}}!</div>
				</div>
				<div class="form-group col-md-12">
					<label for="short_desc">{{ __('Short Description')}} <span class="text-danger">*</span></label>
					<textarea class="form-control" name="short_desc" id="short_desc" rows="2"></textarea>
					<div class="alert alert-danger short_desc_error" style="display: none;">{{ __('The field is required')}}!</div>
				</div>

				<div class="form-group col-md-12">
					<label>{{ __('States')}}</label>
					<div class="checkbox-inline">
						<label class="checkbox checkbox-lg">
						<input type="checkbox" name="is_active" id="is_active" />
						<span></span>{{ __('Is Activate')}}</label>
						<label class="checkbox checkbox-lg">
						<input type="checkbox" name="is_menu" id="is_menu" />
						<span></span>{{ __('Is Menu')}}</label>
						<label class="checkbox checkbox-lg">
						<input type="checkbox" name="is_header" id="is_header"/>
						<span></span>{{ __('Is Header')}}</label>
						<label class="checkbox checkbox-lg">
						<input type="checkbox" name="is_footer" id="is_footer" />
						<span></span>{{ __('Is Footer')}}</label>
					</div>
				</div>

				<div class="form-group col-md-12">
					<label>{{ __('Description')}} <span class="text-danger"> *</span></label>
					<div class="summernote" id="cms_description"></div>
					<div class="alert alert-danger cms_description_error" style="display: none;">{{ __('The field is required')}}!</div>
				</div>
				<div class="add_edit_btn_group col-md-12">
					<button class="btn btn-success cms_add_btn">{{ __('Add')}}</button>
					<button class="btn btn-success cms_save_btn">{{ __('Save')}}</button>
					<button class="btn btn-warning cms_cancel_btn">{{ __('Cancel')}}</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
    $locale = "en";
    if (Session::has('locale')) {
        $locale = session('locale'); 
    }
?>
<!--end::Card-->
<script type="text/javascript">
	var LANGUAGE = "<?php echo $locale; ?>" 
	var CMS_DATA_URL = "{{ route('admin.cms.getCmsData') }}";
	var UPDATE_IS_ACTIVE_STATE_URL = "{{ route('admin.cms.updateIsActiveState') }}";
	var UPDATE_IS_MENU_STATE_URL = "{{ route('admin.cms.updateIsMenuState') }}";
	var UPDATE_IS_HEADER_STATE_URL = "{{ route('admin.cms.updateIsHeaderState') }}";
	var UPDATE_IS_FOOTER_STATE_URL = "{{ route('admin.cms.updateIsFooterState') }}";
	var UPDATE_CMS_PAGE_URL = "{{ route('admin.cms.updateCmsPage') }}";
	var DELETE_CMS_PAGE_URL = "{{ route('admin.cms.deleteCmsPage') }}";
	var ADD_NEW_CMS_PAGE_URL = "{{ route('admin.cms.addNewCmsPage') }}";
	var GET_CMS_DETAIL_URL = "{{ route('admin.cms.getCmsDetail') }}";
	var GET_CMS_DETAIL_BY_LANGUAGE = "{{ route('admin.cms.getCmsDetailByLanguage') }}";
</script>
@endsection