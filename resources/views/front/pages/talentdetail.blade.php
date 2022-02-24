{{-- Extends layout --}}
@extends('layout.app')

{{-- Content --}}
@section('content')
<section id="section-talentdetails" class="d-flex flex-column justify-content-center">
    <div class="container">
        
        <div class="talent-meta">
            <div class="basic">
                <span class="talent-category">{{__($talent_detail_info->category)}}</span>
                <h1 class="talent-fullname">{{ $talent_detail_info->name }}</h1>
            </div>
            @if(Auth::user()->role == 'client')
            <div class="contact-info">
                <a href="{{ 'https://wa.me/' . $talent_detail_info->phone}}"><i class="icon-whatsapp"></i></a>
                <span class="vseparator"></span>
                <a href="{{('mailto:' . $talent_detail_info->email )}}"><i class="icon-envelop-lg"></i></a>
            </div>
            @endif
        </div>
        
        <div class="personal-information-wrapper">
            <h5>Personal Information</h5>
            <div class="personal-information">
                <div class="feature">
                    <div class="feature-key">{{ __('Height')}}</div>
                    <div class="feature-value">{{ $talent_detail_info->height }}cm</div>
                </div>
                <div class="feature">
                    <div class="feature-key">{{ __('Weight')}}</div>
                    <div class="feature-value">{{ $talent_detail_info->weight }}</div>
                </div>
                <div class="feature">
                    <div class="feature-key">{{ __('Chest')}}</div>
                    <div class="feature-value">{{ $talent_detail_info->chest }}</div>
                </div>
                <div class="feature">
                    <div class="feature-key">{{__('Hip')}}</div>
                    <div class="feature-value">{{ $talent_detail_info->hips }}</div>
                </div>
                <div class="feature">
                    <div class="feature-key">{{ __('Shoes')}}</div>
                    <div class="feature-value">{{ $talent_detail_info->shoes }}</div>
                </div>
            </div>
        </div>

        <h5>{{ __('Job Reference')}}</h5>
        <div class="job-reference">
            <?php echo  $talent_detail_info->job_reference ; ?>
        </div>
        <?php // echo $talent_detail_info->photo_paths ; ?>
        <div class="photo-grid-container">
            <div class="grid-row">
                @if( isset($talent_photos) && (count($talent_photos) > 0) )
                <div class="column">
                    <?php 
                        $item_cnt = count($talent_photos) / 2;
                        $lp = 0;
                        for( $lp = 0; $lp < $item_cnt; $lp++) {
                    ?>
                        <img src="{{ $talent_photos[$lp]->path }}" alt="" title="" />
                    <?php
                        }
                    ?>
                </div>
                <div class="column">
                    <?php 
                        for( ; $lp < count($talent_photos); $lp++) {
                    ?>
                        <img src="{{ $talent_photos[$lp]->path }}" alt="" title="" />
                    <?php
                        }
                    ?>
                </div>   
                @else
                    <h5>{{ __('No photos')}}</h5>    
                @endif

            </div>
        </div>
    </div>
</section>
@endsection