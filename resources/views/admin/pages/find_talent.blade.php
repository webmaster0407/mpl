{{-- Extends layout --}}
@extends('layout.admin')

{{-- Content --}}
@section('content')
<div class="row">
	<div class="col-lg-12">
		@if( isset($categories) && ( count($categories) > 0 ) )
		<div class="card card-custom">
			<div class="card-header card-header-tabs-line">
		  		<div class="card-toolbar">
		   			<ul class="nav nav-tabs nav-bold nav-tabs-line">
					    <li class="nav-item">
					    	<a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_4">
					     		<span class="nav-icon"><i class="flaticon-upload"></i></span>
					     		<span class="nav-text">{{ __('Upload')}}</span>
					     	</a>
					    </li>
		    			<li class="nav-item">
		     				<a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_4" id="call_ft_images">
		     					<span class="nav-icon"><i class="flaticon2-image-file"></i></span>
		     					<span class="nav-text">{{ __('Banners')}}</span>
		     				</a>
		    			</li>
		   			</ul>
		  		</div>
		 	</div>
		 	<div class="card-body">
		  		<div class="tab-content">
		   			<div class="tab-pane fade show active" id="kt_tab_pane_1_4" role="tabpanel" aria-labelledby="kt_tab_pane_1_4">
		    			<div id="dropArea" class="card card-custom gutter-b">
		    				<form method="post" action="{{ route('admin.pages.uploadftphotos') }}" enctype="multipart/form-data">
		    					@csrf  
						        <div class="card-body">
									<div class="form-group">
										<select class="form-control" id="category" name="category">
											@foreach($categories as $category)
												<option value="{{ $category->id }}">{{ __( $category->name ) }}</option>
											@endforeach
										</select>					
									</div>
						            <div class="form-group row">
						                <div class="col-lg-12 col-md-9 col-sm-12">
						                    <div class="dropzone dropzone-default dropzone-success" id="kt_dropzone_3">
						                        <div class="dropzone-msg dz-message needsclick">
						                            <h3 class="dropzone-msg-title">{{__('Drop files here or click to upload.')}}</h3>
						                            <span class="dropzone-msg-desc">{{ __('Only image files are allowed for upload')}}</span>
						                        </div>
						                    </div>
						                </div>
						            </div>
						        </div>
		    				</form>
		    			</div>
		   			</div>
		   			<div class="tab-pane fade" id="kt_tab_pane_2_4" role="tabpanel" aria-labelledby="kt_tab_pane_2_4">
		    			<div class="card card-custom gutter-b">
		    				<div class="card-body">
		    					<div class="form-group">
									<select class="form-control" id="banner_category" name="banner_category">
										@foreach($categories as $category)
											<option value="{{ $category->id }}">{{ __( $category->name ) }}</option>
										@endforeach
									</select>
		    					</div>
		    					<div id="current_banner">
		    						<!-- current banner for each categories will be here -->
		    					</div>
		    					<hr /> 
		    					<div id="banner-images-wrapper" class='row images_wrapper'>
		    						<!-- images will be here -->
		    					</div>
		    				</div>
		    			</div>
		   			</div>
		  		</div>
		 	</div>
		</div>
		@else
		<div class="card card-custom">
			<div class="card-header">
				<h1>{{ __('No Activated Category found!') }}</h1>
			</div>
			<div class="card-body">
				<h6>{{ __('You should add and active categories before edit find talent page!') }}</h6>
			</div>
		</div>
		@endif
	</div>
</div>


<script type="text/javascript">
	var UPLOAD_FT_PHOTOS_URL 		= "{{ route('admin.pages.uploadftphotos') }}";
	var GET_UPLOADED_FT_PHOTOS_URL 	= "{{ route('admin.pages.getUploadedftPhotos') }}";
	var BASE_URL					= "{{ route('base_url') }}";
	var SELECT_AS_BANNER_URL		= "{{ route('admin.pages.selectftPhoto') }}";
	var DELETE_FT_PHOTO_URL			= "{{ route('admin.pages.deleteftPhoto') }}";
</script>
@endsection