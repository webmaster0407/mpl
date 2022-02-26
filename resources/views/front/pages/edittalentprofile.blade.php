{{-- Extends layout --}}
@extends('layout.app')

{{-- Content --}}
@section('content')
<section id="section-talentcategories">
    <div class="container">
        <div id="talent_profile_eidt">
            <form>
                <div id="talentsignup-form">
                    <h3>{{ __('Update')}} <span class="color-bluelight">{{ __('your profile')}}</span></h3>
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="name">{{ __('Full name')}}:</label>
                            <div class="form-group">
                                <i class="icon-user"></i>
                                <input type="text" id="name" name="name"  value="{{ Auth::user()->name }}" />
                            </div>
                            <div class="alert alert-danger name_error" style="display: none;">{{ __('This field is required')}}!</div>
                        </div>

                        <div class="col-xs-6">
                            <label>{{ __('Gender')}}:</label>
                            <div class="form-group form-group-inline">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender-male" value="male" @if($userdata->gender == 'male') checked @endif>
                                    <label class="form-check-label" for="gender-male">{{ __('Male')}}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender-female" value="female" @if($userdata->gender == 'female') checked @endif>
                                    <label class="form-check-label" for="gender-female">{{ __('Female')}}</label>
                                </div>
                            </div>
                            <div class="alert alert-danger gender_error" style="display: none;">{{ __('This field is required')}}!</div>
                        </div>

                        <div class="col-xs-6">
                            <label for="email">{{ __('Email')}}:</label>
                            <div class="form-group">
                                <i class="icon-email"></i>
                                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}"/>
                            </div>
                            <div class="alert alert-danger email_error" style="display: none;">{{ __('This field is required')}}!</div>
                        </div>

                        <div class="col-xs-6">
                            <label for="phone">{{ __('Phone')}}:</label>
                            <div class="form-group">
                                <i class="icon-view"></i>
                                <input type="tel" id="phone" name="phone" value="{{ $userdata->phone }}" />
                            </div>
                            <div class="alert alert-danger phone_error" style="display: none;">{{ __('This field is required')}}!</div>
                        </div>

                        <div class="col-xs-6">
                            <label for="cat_id">{{__('Talent category')}}:</label>
                            <div class="form-group">     
                                @if ( isset($categories) && (count($categories) > 0) )
                                <select id="cat_id" name="cat_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($userdata->cat_id == $category->id) selected  @endif>{{ __($category->name) }}</option>
                                    @endforeach
                                </select>
                                @else 
                                <select id="cat_id" name="cat_id" disabled>
                                    <option value="">{{ __('No Categories')}}</option>
                                </select>
                                @endif
                            </div>
                            <div class="alert alert-danger cat_id_error" style="display: none;">{{ __('This field is required')}}!</div>
                        </div>
                        <div class="col-xs-6">
                            <label for="birthday_year">{{ __('Year')}}:</label>
                            <div class="form-group">
                                <i class="icon-view"></i>
                                <input type="number" id="birthday_year" name="birthday_year" value="{{ $userdata->birthday_year }}"/>
                            </div>
                            <div class="alert alert-danger birthday_year_error" style="display: none;">{{ __('This field is required')}}!</div>
                        </div>
                        <div class="col-xs-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="height">{{ __('Height')}}:</label>
                                    <div class="form-group">
                                        <input type="number" id="height" name="height" value="{{ $userdata->height }}"/>
                                    </div>
                                    <div class="alert alert-danger height_error" style="display: none;">{{ __('This field is required')}}!</div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="weight">{{ __('Weight')}}:</label>
                                    <div class="form-group">
                                        <input type="number" id="weight" name="weight" value="{{ $userdata->weight }}"/>
                                    </div>
                                    <div class="alert alert-danger weight_error" style="display: none;">{{ __('This field is required')}}!</div>
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="chest">{{ __('Chest')}}:</label>
                                    <div class="form-group">
                                        <input type="number" id="chest" name="chest" value="{{ $userdata->chest }}"/>
                                    </div>
                                    <div class="alert alert-danger chest_error" style="display: none;">{{ __('This field is required')}}!</div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="hips">{{ __('Hips')}}:</label>
                                    <div class="form-group">
                                        <input type="number" id="hips" name="hips" value="{{ $userdata->hips }}" />
                                    </div>
                                    <div class="alert alert-danger hips_error" style="display: none;">{{ __('This field is required')}}!</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="shoes">{{ __('Shoes')}}:</label>
                                    <div class="form-group">
                                        <input type="number" id="shoes" name="shoes" value="{{ $userdata->shoes }}" />
                                    </div>
                                    <div class="alert alert-danger shoes_error" style="display: none;">{{ __('This field is required')}}!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label>{{ __('Uploaded Photos') }}</label>
                    <div class="form-group">
                        <div class="uploaded_photos">
                            @if($photos !== null && (count($photos) > 0) )
                                @foreach($photos as $photo)
                                    <?php
                                        $path = route('base_url') . '/' . $photo->path;
                                        $path_array = explode('/', $path);
                                        $cnt = count($path_array);
                                        $path_array[$cnt-2] = $path_array[$cnt-2] . '/thumbnail';
                                        $thumbnailpath = implode('/', $path_array);
                                    ?>
                                    <div class="photo_item">
                                        <img src="{{ $thumbnailpath }}" data-val="{{ $photo->id }}" style="width: 100%; height: auto;">
                                        <a href="#" class="photo_action_btn" data-val="{{ $photo->id }}"><svg width="54" height="54" fill="#fff"><path d="m26.293 20.293-7.086-7.086a1 1 0 0 0-1.414 0l-4.586 4.586a1 1 0 0 0 0 1.414l7.086 7.086a1 1 0 0 1 0 1.414l-7.086 7.086a1 1 0 0 0 0 1.414l4.586 4.586a1 1 0 0 0 1.414 0l7.086-7.086a1 1 0 0 1 1.414 0l7.086 7.086a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7.086-7.086a1 1 0 0 1 0-1.414l7.086-7.086a1 1 0 0 0 0-1.414l-4.586-4.586a1 1 0 0 0-1.414 0l-7.086 7.086a1 1 0 0 1-1.414 0Z"></path></svg></a>
                                    </div>
                                @endforeach
                            @else
                            <h5>{{ __('No photos uploaded')}}.</h5>
                            @endif
                        </div>
                    </div>
                    <label>{{ __('Upload work photos')}}:</label>
                    <div class="form-group form-group-upload" >
                        <div class="dropzone dropzone-default dropzone-success" id="kt_dropzone_3">
                            <div class="dropzone-msg dz-message needsclick" style="padding: 30px;">
                                <h6 class="dropzone-msg-title">Drop files here or click to upload.</h6>
                                <span class="dropzone-msg-desc">Only image files are allowed to upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-danger photos_error" style="display: none;">{{ __('Photos is required')}}!</div>
                    
                    <label for="job_reference">{{ __('Job Reference')}}:</label>
                    <div class="form-group form-group-editor">
                        <textarea rows="10" name="job_reference" id="job_reference" >{{ $userdata->job_reference }}</textarea>
                    </div>
                    <div class="alert alert-danger job_reference_error" style="display: none;">{{ __('This field is required')}}!</div>
                    
                    <div class="actions">
                        <a href="#" class="btn btn-secondary" id="edit_talent_profile_form_submit_btn">{{ __('Submit')}}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script type="text/javascript">
	var EDIT_PROFILE_URL = "{{ route('editProfile') }}";
	var UPLOAD_PHOTO_URL = "{{ route('uploadPhotos') }}";
	var DELETE_PHOTO_URL = "{{ route('deletePhotos') }}";
    var DELETE_PHOTO_DROPZONE_URL =  "{{ route('deletePhotoUploadedJustByDropzone') }}";
    var BASE_URL = "{{ route('base_url') }}";
</script>
@endsection