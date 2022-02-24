{{-- Extends layout --}}
@extends('layout.auth_layout')

{{-- Content --}}
@section('content')

<section id="section-talentsignup">
    <div class="talentsignup-wrapper">
        <div class="talentsignup-container">
            <div id="talentsignup-form">
                <h3>{{ __('Register')}} <span class="color-bluelight">{{ __('as Talent')}}</span></h3>
                <p>{{ __('All male and female models are welcome to join, just fill in the following information and upload three photos of work, after approval, you can become a part of us without any fees')}}!</p>
                <div class="row">
                    <div class="col-xs-6">
                        <label for="name">{{ __('Full name')}}:</label>
                        <div class="form-group">
                            <i class="icon-user"></i>
                            <input type="text" id="name" name="name" />
                        </div>
                        <div class="alert alert-danger name_error" style="display: none;">{{ __('This field is required')}}!</div>
                    </div>

                    <div class="col-xs-6">
                        <label>{{ __('Gender')}}:</label>
                        <div class="form-group form-group-inline">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender-male" value="male">
                                <label class="form-check-label" for="gender-male">{{ __('Male')}}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender-female" value="female">
                                <label class="form-check-label" for="gender-female">{{ __('Female')}}</label>
                            </div>
                        </div>
                        <div class="alert alert-danger gender_error" style="display: none;">{{ __('This field is required')}}!</div>
                    </div>

                    <div class="col-xs-6">
                        <label for="email">{{ __('Email')}}:</label>
                        <div class="form-group">
                            <i class="icon-email"></i>
                            <input type="email" id="email" name="email" />
                        </div>
                        <div class="alert alert-danger email_error" style="display: none;">{{ __('This field is required')}}!</div>
                    </div>

                    <div class="col-xs-6">
                        <label for="phone">{{ __('Phone')}}:</label>
                        <div class="form-group">
                            <i class="icon-view"></i>
                            <input type="tel" id="phone" name="phone" />
                        </div>
                        <div class="alert alert-danger phone_error" style="display: none;">{{ __('This field is required')}}!</div>
                    </div>

                    <div class="col-xs-6">
                        <label for="password">{{ __('Password')}}:</label>
                        <div class="form-group">
                            <i class="icon-password"></i>
                            <input type="password" id="password" name="password" />
                        </div>
                        <div class="alert alert-danger password_error" style="display: none;">{{ __('This field is required')}}!</div>
                    </div>

                    <div class="col-xs-6">
                        <label for="verify_password">{{ __('Confirm password')}}:</label>
                        <div class="form-group">
                            <i class="icon-password"></i>
                            <input type="password" id="verify_password" name="verify_password" />
                        </div>
                        <div class="alert alert-danger verify_password_error" style="display: none;">{{ __('This field is required')}}!</div>
                        <div class="alert alert-danger same_password_error" style="display: none;">{{ __('Password does not match')}}!</div>
                    </div>
                    <div class="col-xs-6">
                        <label for="cat_id">{{__('Talent category')}}:</label>
                        <div class="form-group">     
		                    @if ( isset($categories) && (count($categories) > 0) )
		                    <select id="cat_id" name="cat_id">
			                    @foreach($categories as $category)
									<option value="{{ $category->id }}">{{ __($category->name) }}</option>
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
                            <input type="number" id="birthday_year" name="birthday_year" />
                        </div>
                        <div class="alert alert-danger birthday_year_error" style="display: none;">{{ __('This field is required')}}!</div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="height">{{ __('Height')}}:</label>
                                <div class="form-group">
                                    <input type="number" id="height" name="height" />
                                </div>
                                <div class="alert alert-danger height_error" style="display: none;">{{ __('This field is required')}}!</div>
                            </div>
                            <div class="col-sm-6">
                                <label for="weight">{{ __('Weight')}}:</label>
                                <div class="form-group">
                                    <input type="number" id="weight" name="weight" />
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
                                    <input type="number" id="chest" name="chest" />
                                </div>
                                <div class="alert alert-danger chest_error" style="display: none;">{{ __('This field is required')}}!</div>
                            </div>
                            <div class="col-sm-6">
                                <label for="hips">{{ __('Hips')}}:</label>
                                <div class="form-group">
                                    <input type="number" id="hips" name="hips" />
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
                                    <input type="number" id="shoes" name="shoes" />
                                </div>
                                <div class="alert alert-danger shoes_error" style="display: none;">{{ __('This field is required')}}!</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <label>{{ __('Upload work photos')}}:</label>
                <div class="form-group form-group-upload">
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
                    <textarea rows="10" name="job_reference" id="job_reference"></textarea>
                </div>
                <div class="alert alert-danger job_reference_error" style="display: none;">{{ __('This field is required')}}!</div>
                
                <div class="actions">
                    <a href="#" class="btn btn-secondary" id="registerAsTalentBtn">{{ __('Submit')}}</a>
                </div>
                <p class="text-right">{{ __('Already registered')}}? <a href="{{ route('login') }}">{{ __('Login here')}}</a></p>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
	var DO_REGISTER_URL                    = "{{ route('doRegister') }}";	
	var LOGIN_URL                          = "{{ route('login') }}";
</script>
@endsection