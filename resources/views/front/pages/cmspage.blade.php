{{-- Extends layout --}}
@extends('layout.cms')

{{-- Content --}}
@section('content')
	<div class="breadcrumb">
		<h1>{{ $cmsPage->page_sub_group }}</h1>
		<h2>{{ $cmsPage->page_sub_title }}</h2>
	</div>
	<div class="container">
		<?php echo  $cmsPage->description ; ?>	
	</div>
@endsection