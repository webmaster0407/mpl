{{-- Extends layout --}}
@extends('layout.home')

{{-- Content --}}
@section('content')

<section id="section-welcome" class="full-page text-center d-flex flex-column justify-content-center">
    <div class="container">
        <h1 class="section-title">
            @if( isset($sectionData1->title) && ( $sectionData1->title !== "" ) )
                {{ __($sectionData1->title) }}
            @else
                <span class="color-bluelight">{{ __('Welcome to')}}</span> {{__('MPL')}}
            @endif
        </h1>
        <div class="section-description">
            @if( isset($sectionData1->description) && ( $sectionData1->description !== '' ) )
                <?php echo $sectionData1->description; ?>
            @else
                <p>{{__('A trusted Hong Kong event artist agency which offers professional model, DJ, promoter, dancer, as well as MC booking. Having the footprint across Asia, we are the best partner for your next lorem ipsum events.')}}</p>
            @endif
        </div>
        <a href="@if( isset($sectionData1->link) && ( $sectionData1->link !== '' ) ) {{ $sectionData1->link }} @else '#' @endif" class="btn btn-primary">{{ __('JOIN NOW')}}</a>
    </div>
</section>
<section id="section-visualservice" class="full-page d-flex flex-column justify-content-center">
    <div class="container">
        <h1 class="section-title section-title-style-1">
            @if( isset($sectionData2->title) && ( $sectionData2->title !== "" ) )
                {{ __($sectionData2->title) }}
            @else
                <span class="color-bluelight">{{ __('Visual')}} <span class="color-blue">{{ __('Service')}}</span>
            @endif
        </h1>
        <div class="section-description">
            @if( isset($sectionData2->description) && ( $sectionData2->description !== '' ) )
                <?php echo $sectionData2->description; ?>
            @else
               <p>{{__('We provide indoor & outdoor LED wall with one stop buy and constructions management services, as well as short or long term rental services.')}}</p>
            @endif
        </div>
        <a href="@if( isset($sectionData2->link) && ( $sectionData2->link !== '' ) ) {{ $sectionData2->link }} @else '#' @endif" class="btn btn-primary">{{ __('Learn More')}}</a>
    </div>
</section>
<section id="section-talentservice" class="full-page text-center d-flex flex-column justify-content-end">
    <div class="container">
        <h1 class="section-title section-title-style-2">
            @if( isset($sectionData3->title) && ( $sectionData3->title !== "" ) )
                {{ __($sectionData3->title) }}
            @else
                <span class="color-bluelight">{{ __('Talent')}}</span> {{ __('Service')}}
            @endif
        </h1>
        <div class="section-description">
            @if( isset($sectionData3->description) && ( $sectionData3->description !== '' ) )
                <?php echo $sectionData3->description; ?>
            @else
               <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed tortor vitae purus finibus imperdiet eget at magna. Vivamus condimentum, odio sed pretium posuere, sem mauris placerat nulla, ac consectetur nisl libero vel orci. In ut nisl odio. Aliquam sed molestie est. Praesent iaculis, nibh vel facilisis mollis, felis nunc tristique mi, nec maximus lorem nunc ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In vel ante et velit porttitor gravida sed quis ipsum. Fusce in quam libero. Sed nec fringilla tellus, lobortis cursus lacus. Vestibulum nec molestie ex. Integer a metus ut enim convallis lacinia.')}}</p>
            @endif
        </div>
        <a href="@if( isset($sectionData3->link) && ( $sectionData3->link !== '' ) ) {{ $sectionData3->link }} @else '#' @endif" class="btn btn-primary">{{ __('Find Talent')}}</a>
    </div>
</section>
<section id="section-copywriting" class="d-flex flex-column justify-content-end">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <h1 class="section-title section-title-style-3">
                    @if( isset($sectionData4->title) && ( $sectionData4->title !== "" ) )
                        {{ __($sectionData4->title) }}
                    @else
                        {{ __('Copywriting')}}
                    @endif
                </h1>
                <div class="section-description">
                    @if( isset($sectionData4->description) && ( $sectionData4->description !== '' ) )
                        <?php echo $sectionData4->description; ?>
                    @else
                        <ul>
                            <li>{{ __('Creative Copywriting')}}</li>
                            <li>{{ __('Proofreading and Editing')}}</li>
                            <li>{{ __('Translation and Localization')}}</li>
                            <li>{{ __('Product Brochures')}}</li>
                            <li>{{ __('Digital Marketing')}}</li>
                            <li>{{ __('Proposals and Tenders')}}</li>
                            <li>{{ __('SEO Copywriting')}}</li>
                            <li>{{ __('Graphic Design')}}</li>
                        </ul>
                        <p>{{ __('Each of our projects is unique.')}} <br />
                            {{ __('We take pride in the rich diversity of our deliverables.')}}</p>
                    @endif
                </div>
                <a href="@if( isset($sectionData4->link) && ( $sectionData4->link !== '' ) ) {{ $sectionData4->link }} @else '#' @endif" class="btn btn-primary">{{ __('Get Quote')}}</a>
            </div>
        </div>
    </div>
    <div class="typewriter"><img src="{{asset('assets/front/images/homepage/typewriter.jpg')}}" title="" alt="" /></div>
</section>
@endsection
