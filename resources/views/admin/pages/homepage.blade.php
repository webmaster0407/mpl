{{-- Extends layout --}}
@extends('layout.admin')

{{-- Content --}}
@section('content')
<style type="text/css">
	.section_btn_wrapper {
		display: flex;
		justify-content: flex-end;
	}
	.section_btn_wrapper button {
		margin-left: 20px;
	}
</style>
	<div class="row">
		<div class="col-lg-6">
			<!--begin::Card-->
			<div class="card card-custom gutter-b example example-compact">
				<div class="card-header">
					<h3 class="card-title">{{ __('Welcome Section')}} </h3>

				</div>
				<!--begin::Form-->
				<form id="section1">
					<div class="card-body">
						<div class="form-group">
							<label  for="section1_language">{{ __('Language')}}
							<span class="text-danger">*</span></label>	
							<select class="form-control" id="section1_language" name="section1_language">
								<option value="en">{{__('English')}}</option>
								<option value="zh-cn">{{__('Chinese')}}</option>
								<option value="zh-hk">{{__('Hong Kong')}}</option>
							</select>					
						</div>
						<div class="form-group">
							<label>{{ __('Title') }}</label>
							<input class="form-control" type="text" value="Artisanal kale" name="section1_title" id="section1_title" />
						</div>
						<div class="form-group">
							<label for="section1_link">{{ __('Link') }}</label>
							<input class="form-control" type="url" value="https://" name="section1_link" id="section1_link" />
						</div>
						<div class="form-group">
							<div class="form-check">
								<input type="checkbox" class="form-check-input" id="section1_newtab">
								<label class="form-check-label" for="section1_newtab">{{ __('Open in a new tab') }}</label>
							</div>
						</div>	
						<div class="form-group">
							<label >{{ __('Description')}}</label>
							<div class="summernote" id="section1_description"></div>
						</div>
						<!--begin: Code-->
						<div class="example-code mt-10">
							<ul class="example-nav nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-2x">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#example_code_html">HTML</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#example_code_js">JS</a>
								</li>
							</ul>
							<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
							<div class="tab-content">
								<div class="tab-pane active" id="example_code_html" role="tabpanel">
									<div class="example-highlight">
									</div>
								</div>
								<div class="tab-pane" id="example_code_js">
									<div class="example-highlight">
									</div>
								</div>
							</div>
						</div>
						<!--end: Code-->
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-lg-12 section_btn_wrapper">
								<button type="button" id="section1_submitBtn" class="btn btn-primary mr-2">{{__('Save')}}</button>
								<button type="button" id="section1_cancelBtn" class="btn btn-secondary">{{__('Cancel')}}</button>
							</div>
						</div>
					</div>
				</form>
				<!--end::Form-->
			</div>
			<!--end::Card-->
		</div>
		<div class="col-lg-6">
			<!--begin::Card-->
			<div class="card card-custom gutter-b example example-compact">
				<div class="card-header">
					<h3 class="card-title">{{ __('Visual Service Section')}} </h3>

				</div>
				<!--begin::Form-->
				<form id="section2">
					<div class="card-body">
						<div class="form-group">
							<label for="section2_language">{{ __('Language')}}
							<span class="text-danger">*</span></label>
							<select class="form-control" id="section2_language" name="section2_language">
								<option value="en">{{__('English')}}</option>
								<option value="zh-cn">{{__('Chinese')}}</option>
								<option value="zh-hk">{{__('Hong Kong')}}</option>
							</select>					
						</div>
						<div class="form-group">
							<label >{{ __('Title') }}</label>
							<input class="form-control" type="text" value="Artisanal kale" name="section2_title" id="section2_title" />
						</div>
						<div class="form-group">
							<label for="section2_link">{{ __('Link') }}</label>
							<input class="form-control" type="url" value="https://" name="section2_link" id="section2_link" />
						</div>
						<div class="form-group">
							<div class="form-check">
								<input type="checkbox" class="form-check-input" id="section2_newtab">
								<label class="form-check-label" for="section2_newtab">{{ __('Open in a new tab') }}</label>
							</div>
						</div>
						<div class="form-group ">
							<label>{{ __('Description')}}</label>
							<div class="summernote" id="section2_description"></div>
						</div>
						<!--begin: Code-->
						<div class="example-code mt-10">
							<ul class="example-nav nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-2x">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#example_code_html">HTML</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#example_code_js">JS</a>
								</li>
							</ul>
							<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
							<div class="tab-content">
								<div class="tab-pane active" id="example_code_html" role="tabpanel">
									<div class="example-highlight">
									</div>
								</div>
								<div class="tab-pane" id="example_code_js">
									<div class="example-highlight">
									</div>
								</div>
							</div>
						</div>
						<!--end: Code-->
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-lg-12 section_btn_wrapper">
								<button type="button" id="section2_submitBtn" class="btn btn-primary mr-2">{{__('Save')}}</button>
								<button type="button" id="section2_cancelBtn" class="btn btn-secondary">{{__('Cancel')}}</button>
							</div>
						</div>
					</div>
				</form>
				<!--end::Form-->
			</div>
			<!--end::Card-->
		</div>
		<div class="col-lg-6">
			<!--begin::Card-->
			<div class="card card-custom gutter-b example example-compact">
				<div class="card-header">
					<h3 class="card-title">{{ __('Talent Service Section')}} </h3>

				</div>
				<!--begin::Form-->
				<form id="section3">
					<div class="card-body">
						<div class="form-group">
							<label for="section3_language">{{ __('Language')}}
							<span class="text-danger">*</span></label>
							<select class="form-control" id="section3_language" name="section3_language">
								<option value="en">{{__('English')}}</option>
								<option value="zh-cn">{{__('Chinese')}}</option>
								<option value="zh-hk">{{__('Hong Kong')}}</option>
							</select>					
						</div>
						<div class="form-group">
							<label>{{ __('Title') }}</label>
							<input class="form-control" type="text" value="Artisanal kale" name="section3_title" id="section3_title" />
						</div>
						<div class="form-group">
							<label for="section3_link">{{ __('Link') }}</label>
							<input class="form-control" type="url" value="https://" name="section3_link" id="section3_link" />
						</div>
						<div class="form-group">
							<div class="form-check">
								<input type="checkbox" class="form-check-input" id="section3_newtab">
								<label class="form-check-label" for="section3_newtab">{{ __('Open in a new tab') }}</label>
							</div>
						</div>
						<div class="form-group">
							<label>{{ __('Description')}}</label>
							<div class="summernote" id="section3_description"></div>
						</div>
						<!--begin: Code-->
						<div class="example-code mt-10">
							<ul class="example-nav nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-2x">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#example_code_html">HTML</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#example_code_js">JS</a>
								</li>
							</ul>
							<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
							<div class="tab-content">
								<div class="tab-pane active" id="example_code_html" role="tabpanel">
									<div class="example-highlight">
									</div>
								</div>
								<div class="tab-pane" id="example_code_js">
									<div class="example-highlight">
									</div>
								</div>
							</div>
						</div>
						<!--end: Code-->
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-lg-12 section_btn_wrapper">
								<button type="button" id="section3_submitBtn" class="btn btn-primary mr-2">{{__('Save')}}</button>
								<button type="button" id="section3_cancelBtn" class="btn btn-secondary">{{__('Cancel')}}</button>
							</div>
						</div>
					</div>
				</form>
				<!--end::Form-->
			</div>
			<!--end::Card-->
		</div>
		<div class="col-lg-6">
			<!--begin::Card-->
			<div class="card card-custom gutter-b example example-compact">
				<div class="card-header">
					<h3 class="card-title">{{ __('Copywriting section')}} </h3>

				</div>
				<!--begin::Form-->
				<form id="section4">
					<div class="card-body">
						<div class="form-group">
							<label for="section4_language">{{ __('Language')}}
							<span class="text-danger">*</span></label>
							<select class="form-control" id="section4_language" name="section4_language">
								<option value="en">{{__('English')}}</option>
								<option value="zh-cn">{{__('Chinese')}}</option>
								<option value="zh-hk">{{__('Hong Kong')}}</option>
							</select>					
						</div>
						<div class="form-group">
							<label>{{ __('Title') }}</label>
							<input class="form-control" type="text" value="Artisanal kale" name="section4_title" id="section4_title" />
						</div>
						<div class="form-group">
							<label for="section4_link" >{{ __('Link') }}</label>
							<input class="form-control" type="url" value="https://" name="section4_link" id="section4_link" />
						</div>
						<div class="form-group">
							<div class="form-check">
								<input type="checkbox" class="form-check-input" id="section4_newtab">
								<label class="form-check-label" for="section4_newtab">{{ __('Open in a new tab') }}</label>
							</div>
						</div>	
						<div class="form-group ">
							<label >{{ __('Description')}}</label>
							<div class="summernote" id="section4_description"></div>
						</div>
						<!--begin: Code-->
						<div class="example-code mt-10">
							<ul class="example-nav nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-2x">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#example_code_html">HTML</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#example_code_js">JS</a>
								</li>
							</ul>
							<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
							<div class="tab-content">
								<div class="tab-pane active" id="example_code_html" role="tabpanel">
									<div class="example-highlight">
									</div>
								</div>
								<div class="tab-pane" id="example_code_js">
									<div class="example-highlight">
									</div>
								</div>
							</div>
						</div>
						<!--end: Code-->
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-lg-12 section_btn_wrapper">
								<button type="button" id="section4_submitBtn" class="btn btn-primary mr-2">{{__('Save')}}</button>
								<button type="button" id="section4_cancelBtn" class="btn btn-secondary">{{__('Cancel')}}</button>
							</div>
						</div>
					</div>
				</form>
				<!--end::Form-->
			</div>
			<!--end::Card-->
		</div>
	</div>
	<?php 
		$locale = "en";
	    if (Session::has('locale')) {
	        $locale = session('locale'); 
	    }
	?>
	<script type="text/javascript">
		var GET_SECTION_DATA_URL = "{{ route('admin.pages.homepage.getSectionData')}}";
		var UPDATE_SECTION_DATA_URL = "{{ route('admin.pages.homepage.update') }}";
		var LOCALE_VAL = "{{ $locale }}";
	</script>


@endsection