<footer>
    <div id="section-footertop" class="text-center d-flex flex-column justify-content-end" style="background: #1F2326 url('{{ asset('assets/front/images/homepage/footer-top.jpg')}}') center/cover no-repeat;">
    </div>
    <div id="footer-middle" class="container">
        <div class="row align-items-center">
            <div class="col-sm-4">
                <div class="footer-logo">
                    <a href="/"><img src="{{ asset('assets/front/images/footer-logo.png')}}" title="Footer Logo" /></a>
                    <p>{{ __('MPL has state of the art production handling small to large format of events, activities and exhibitions Hong Kong wide with an unrivalled name in the industry for excellence, reliability and innovation.')}}</p>
                </div>
            </div>
            <div class="col-sm-1">
            </div>
            <div class="col-sm-4">
                <ul class="footer-menu">
      <!--               <li><a href="#">About Us</a></li>
                    <li><a href="#">Model Service</a></li> -->
                    @if( isset($cmsPages) && (count($cmsPages) > 0 ))
                        @foreach($cmsPages as $cmspage)
                            <li><a href="{{ route('base_url') . '/' . $cmspage->slug }}">{{ __($cmspage->slug) }}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <p class="copyright">©Copyright <strong>MPL</strong>. {{ __('All rights reserved')}}</p>
    </div>
</footer>
