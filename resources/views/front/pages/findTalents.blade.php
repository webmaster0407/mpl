{{-- Extends layout --}}
@extends('layout.app')

{{-- Content --}}
@section('content')


<?php 
	$default_paths = array(
		asset('assets/front/images/talent-categories/dancer.jpg'),
		asset('assets/front/images/talent-categories/showgirl.jpg'),
		asset('assets/front/images/talent-categories/promoter.jpg'),
		asset('assets/front/images/talent-categories/model.jpg'),
		asset('assets/front/images/talent-categories/dj.jpg'),
		asset('assets/front/images/talent-categories/mc.jpg'),
		asset('assets/front/images/talent-categories/dancer.jpg'),
		asset('assets/front/images/talent-categories/showgirl.jpg'),
		asset('assets/front/images/talent-categories/promoter.jpg'),
		asset('assets/front/images/talent-categories/model.jpg'),
		asset('assets/front/images/talent-categories/dj.jpg'),
		asset('assets/front/images/talent-categories/mc.jpg'),
		asset('assets/front/images/talent-categories/dancer.jpg'),
		asset('assets/front/images/talent-categories/showgirl.jpg'),
		asset('assets/front/images/talent-categories/promoter.jpg'),
		asset('assets/front/images/talent-categories/model.jpg'),
		asset('assets/front/images/talent-categories/dj.jpg'),
		asset('assets/front/images/talent-categories/mc.jpg'),
		asset('assets/front/images/talent-categories/dancer.jpg'),
		asset('assets/front/images/talent-categories/showgirl.jpg'),
		asset('assets/front/images/talent-categories/promoter.jpg'),
		asset('assets/front/images/talent-categories/model.jpg'),
		asset('assets/front/images/talent-categories/dj.jpg'),
		asset('assets/front/images/talent-categories/mc.jpg'),
	);

	$lp = 0;
	$paths = [];
	
	if ( isset($categories) && (count($categories) > 0) ) {
		foreach($categories as $category) {
			
			$photo_path = "";
			$photo_paths = $category->photo_paths;
			$photo_selected = $category->photo_selected;

			if ( isset($photo_paths) ) {
			    $selectedArray = explode(',', $photo_selected);
			    $pathArray = explode(',', $photo_paths);
			    $k = -1;
			    for ( $i = 0; $i < count( $selectedArray ); $i++ ) {
			        if ( $selectedArray[$i] == 'yes' ) {
			            $k = $i;
			            break;
			        }
			    }
			    if ( $k == -1 ) {   // have photos , but all of photos are  not allowed 
			        $photo_path = $default_paths[$lp];
			    } else {
			        $photo_path = route('base_url') . '/' . $pathArray[$k];
			    }
			} else {            // have no photo
			    $photo_path =  $default_paths[$lp];
			}
			$path[] =  $photo_path;
			$lp++;
		}
	}
?>


<section id="section-talentcategories" class="text-center d-flex flex-column justify-content-center">
    <div class="container">
        <h1 class="section-title"><span class="color-bluelight">{{ __('Find')}}</span> {{ __('Talents')}}</h1>
        <div class="talent-categories">
        	<?php 
        		if (  isset($categories) && (count($categories) > 0) ) {
        	 ?>
        		<?php  
        			$lp = 0;
        			foreach ( $categories as $category ) {   // begin:: foreach
        		?>
        			@if( $lp == 0 )
        			<div class="box"><a href="{{ route('listTalentsByCategory') . '?cat_id=' . $category->id . '&page=1&keyword='}}"><img src="{{  $path[$lp] }}" alt="" title="" /><h3 class="category-title">{{ __($category->name) }}</h3></a></div>
        			@elseif( $lp == 1 )
        			<div class="box" style="grid-column: 4; grid-row: 1;"><a href="{{ route('listTalentsByCategory') . '?cat_id=' . $category->id . '&page=1&keyword=' }}"><img src="{{  $path[$lp] }}" alt="" title="" /><h3 class="category-title">{{ __($category->name) }}</h3></a></div>
        			@else
        			<div class="box" style="grid-column: {{ ($lp - 1 ) % 4 }}; grid-row: {{ ( $lp + 1 ) / 4 + 1  }};"><a href="{{ route('listTalentsByCategory') . '?cat_id=' . $category->id . '&page=1&keyword=' }}"><img src="{{  $path[$lp] }}" alt="" title="" /><h3 class="category-title">{{ __($category->name) }}</h3></a></div>
        			@endif
        		<?php  
        				$lp++;
        			} 										// end::foreach
        		?>
        	<?php
        		} else {
        	?>
        		<div class="box">
        			<h1>No categories.</h1>
        		</div>
        	<?php  
        		}
        	?>
        </div>
    </div>
</section>
@endsection