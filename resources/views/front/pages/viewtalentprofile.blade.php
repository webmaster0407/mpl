{{-- Extends layout --}}
@extends('layout.app')

{{-- Content --}}
@section('content')
<section id="section-talentcategories">

	<div class="container">
		<div id="talent_profile_view">
			<h1>{{ Auth::user()->name }}</h1>
			<h2>{{ Auth::user()->email }}</h2>
			@if(isset($userdata))
			<h1> {{ $userdata->category }} </h1>
			<h4>{{ $userdata->phone }}</h4>
			<h4>{{ $userdata->birthday_year }}</h4>
			<h4>{{ $userdata->gender }}</h4>
			<h4>{{ $userdata->height }}</h4>
			<h4>{{ $userdata->weight }}</h4>
			<h4>{{ $userdata->chest }}</h4>
			<h4>{{ $userdata->hips }}</h4>
			<h4>{{ $userdata->shoes }}</h4>
			<h4>{{ $userdata->job_reference }}</h4>
			<hr />
			@endif

	<div id="talent_profile_view">

		<h1>{{ Auth::user()->name }}</h1>
		<h2>{{ Auth::user()->email }}</h2>
		@if(isset($userdata))
		<h1>{{ $userdata->category }}</h1>
		<h4>{{ $userdata->phone }}</h4>
		<h4>{{ $userdata->birthday_year }}</h4>
		<h4>{{ $userdata->gender }}</h4>
		<h4>{{ $userdata->height }}</h4>
		<h4>{{ $userdata->weight }}</h4>
		<h4>{{ $userdata->chest }}</h4>
		<h4>{{ $userdata->hips }}</h4>
		<h4>{{ $userdata->shoes }}</h4>
		<h4>{{ $userdata->job_reference }}</h4>
		<hr />
		@endif
		<div class="talent_profile_view_photos">
			@if($photos !== null && (count($photos) > 0) )
				@foreach($photos as $photo)
					<div style="width: 300px; height: 300px;">
						<img src="{{ route('base_url') . '/' . $photo->path }}" data-val="{{ $photo->id }}" style="width: 100%; height: auto;">
					</div>
				@endforeach
			@else
				<h5>{{ __('No photos uploaded')}}.</h5>
>>>>>>> 132911f (category-fix)
			@endif
			<div class="talent_profile_view_photos">
				@if($photos !== null && (count($photos) > 0) )
					@foreach($photos as $photo)
						<div style="width: 300px; height: 300px;">
							<img src="{{ route('base_url') . '/' . $photo->path }}" data-val="{{ $photo->id }}" style="width: 100%; height: auto;">
						</div>
					@endforeach
				@else
					<h5>{{ __('No photos uploaded')}}.</h5>
				@endif
			</div>
			<div class="actions">
				<a href="{{ route('editTalentprofile') }}" class="btn btn-secondary">{{ __('Edit Profile')}}</a>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	var EDIT_PROFILE_URL = "{{ route('editProfile') }}";
	var UPLOAD_PHOTO_URL = "{{ route('uploadPhotos') }}";
</script>
@endsection