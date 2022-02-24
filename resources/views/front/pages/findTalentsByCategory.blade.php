{{-- Extends layout --}}
@extends('layout.app')

{{-- Content --}}
@section('content')
<section id="section-talentcategories" class="d-flex flex-column justify-content-center">
    <div class="container">
    	@if (isset($talents) && ( count($talents) > 0 ) )
        <h1 class="section-title text-center">
        	{{count($talents)}} {{ __( $talents[0]->category )}} <span>{{ __('Found')}}</span>
        </h1>
        <div class="search-wrapper">
            <div class="search-container">
                
            	@if (isset($categories) && ( count($categories) > 0 ))
            	<select id="categories">
                	@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ __( $category->name ) }}</option>
                	@endforeach
 				<input type="text" id="keyword" name="keyword" placeholder="Search keyword" />
                <a href="#" id="searchBtn"><i class="icon-search"></i></a>
                </select>
                @else
                <select disabled>
                	<option value="">{{ __('')}}</option>
                </select>
 				<input type="text" id="keyword" name="keyword" placeholder="Search keyword"  readonly />
                <a href="javascript:;" disabled><i class="icon-search"></i></a>
                @endif
               
            </div>
        </div>
        <div class="talent-list">
        	<?php 
        	$lp = 0;
        	foreach ($talents as $talent) {
        		?>
	            <div class="grid">
	                <img src="{{ $path[$lp++] }}" alt="{{ $talent->name }}" title="{{ $talent->name }}" />
	                <div class="talent-info">
	                    <h5>{{ $talent->name }}</h5>
	                    <p><?php // echo  $talent->job_reference; ?></p>
	                    <div class="text-right">
	                    	<a href="{{ route('viewTalentDetail') . '?id=' . $talent->id }}">{{ __('Detail')}}</a>
	                    </div>
	                </div>
	            </div>
        		<?php
        		}  
        	?>
        </div>
        <div class="loadmore"><span class="separator"></span>
        	<a href="#" id="loadmoreBtn" @if( count($talents) < $talentsPerPage ) style="display: none;" @endif><i class="icon-down"></i></a>
        	<span class="separator"></span></div>
        @else
        <h1 class="section-title text-center">0 {{ __($cat_name)}} <span>{{ __('Found')}}</span></h1>
        @endif
    </div>
</section>
<script type="text/javascript">
	var SEARCH_URL = "{{ route('searchTalents') }}";
	var TALENTS_PER_PAGE = "{{ $talentsPerPage }}";
	var DETAIL_PAGE_URL = "{{ route('viewTalentDetail') }}";
</script>
@endsection