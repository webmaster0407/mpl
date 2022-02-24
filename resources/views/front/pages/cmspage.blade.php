{{-- Extends layout --}}
@extends('layout.cms')

{{-- Content --}}
@section('content')
<section id="section-talentcategories" class="d-flex align-items-center">
    <div class="container">
		<h3 class="cms-page-title">{{ $cmsPage->page_sub_title }}</h3>
		<div class="cms-page-content">
			<?php echo  $cmsPage->description ; ?>	
		</div>
	</div>
</section>
@endsection