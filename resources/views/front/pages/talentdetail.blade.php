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
            
            <div class="contact-info">
                <a href="{{ url()->previous() }}" alt="Back" title="Back"><i class="icon-talent-back"></i></a>
                @if( (Auth::user() !== null) && (Auth::user()->role == 'client'))
                <a href="{{ 'https://wa.me/' . $talent_detail_info->phone}}" class="link-whatsapp"><i class="icon-whatsapp"></i></a>
                <span class="vseparator"></span>
                <a href="{{('mailto:' . $talent_detail_info->email )}}"><i class="icon-envelop-lg"></i></a>
                @endif
            </div>
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
            @if( isset($talent_photos) && (count($talent_photos) > 0) )
                <?php
                    for( $lp = 0; $lp < count($talent_photos); $lp++) {    
                        $path = route('base_url') . '/' . $talent_photos[$lp]->path;
                        $path_array = explode('/', $path);
                        $cnt = count($path_array);
                        $path_array[$cnt-2] = $path_array[$cnt-2] . '/thumbnail';
                        $thumbnailpath = implode('/', $path_array);
                ?>
                    <a href="{{ $talent_photos[$lp]->path }}"><img src="{{ $thumbnailpath }}" alt="" title="" /></a>
                <?php
                    }
                ?>
            @else
                <h5 class="text-center">{{ __('No photos')}}</h5>    
            @endif
        </div>
    </div>
</section>
@endsection