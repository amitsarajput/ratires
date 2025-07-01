<x-guest-layout>
    @push('styles') 
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{asset('css/swiper/swiper-bundle.css')}}" />
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    @endpush
    <!-- Implement Slider From Brand Database -->
    <!-- Page Title
    ============================================= -->
    <x-page-title image-url="{{ asset('images/banner--tyre-grid.webp') }}" container="true" page-title="EVERYONE SHOULD HAVE THE RIGHT<br>TO ACCESS PREMIUM TIRES AT<br>AFFORDABLE PRICES" button="true" button-text="READ MORE ABOUT RADAR TIRES" button-Link="{{ route('pages.about-us') }}" greet="true" greet-text="Welcome to Radar Tires - USA" class="page-title--left el-height-60 uppercase mb-0" />
    
    <!-- Content -->
    <section id="content">
        <div class="section no-padding">
            <div class="grid grid-bleed align-center">
                <div class="col-md-6 col-sm-12">
                    <a href="{{ route('pages.premium-collection') }}">
                        <img src="{{asset('images/tyre-grid/premium-col.webp')}}" alt="Premium Collection">
                    </a>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="ma-xxs-2 ma-xs-2 ma-sm-2 ma-md-2 mx-lg-7">
                        <h5>{{ __("WHY RADAR") }}</h5>
                        <h2 class="dark-100  no-top-margin">HIGH PERFORMANCE AND SAFETY, BUT WITHOUT THE HEFTY PRICE TAG</h2>
                        <a  class="knopf red heading-font sharp ls-1" href="{{ route('pages.why-radar') }}">READ MORE</a>
                        <!-- <h5 class="black">DIMAX SPORT | DIMAX SPRINT | DIMAX ALL SEASON | DIMAX WINTER</h5> -->
                    </div>
                </div>
            </div>
            <div class="grid grid-bleed align-center">
                <div class="col-md-6 col-sm-12 order-md-2 bg-image" style="background-image:url({{asset('images/tyre-grid/wet-braking.webp')}})">
                    <div class="mx-xxs-2 mx-lg-7 py-xxs-5 py-sm-7 py-lg-9 py-7">
                        <h5>TESTING</h5>
                        <h2 class="white no-top-margin">
                            EXTENSIVELY TESTED AGAINST PREMIUM BRANDS
                        </h2>
                        <a  class="knopf red heading-font sharp ls-1" href="{{ route('pages.testing') }}">READ MORE</a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="ma-xxs-2 mx-lg-7">
                        <h5>MESSAGE FROM CEO</h5>
                        <h2 class="dark-100 no-top-margin">
                            OUR MISSION IS TO OFFER PREMIUM HIGH-QUALITY TIRES THAT ARE AFFORDABLE FOR ALL
                        </h2>
                        <a  class="knopf red heading-font sharp ls-1" href="{{route('pages.ceo-message')}}">READ MORE</a>
                    </div>
                </div>
            </div>
            <div class="grid grid-bleed align-center">
                <div class="col-md-6 col-sm-12">
                    <a href="{{ route('pages.premium-collection') }}">
                        <img src="{{asset('images/tyre-grid/group-t.webp')}}" alt="">
                    </a>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="ma-xxs-2 ma-xs-2 ma-sm-2 ma-md-2 mx-lg-7">
                        <h5>{{ __("REAL PEOPLE. REAL PERFORMANCE.") }}</h5>
                        <h2 class="dark-100  no-top-margin">{{ __("MEET THE EXPERTS DRIVING RADAR TIRES TO THE NEXT LEVEL") }}</h2>
                        <a  class="knopf red heading-font sharp ls-1" href="{{ route('pages.real-people') }}">{{__('READ MORE')}}</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tyres widget -->
        <div class="section bg-white no-padding" id="tires">
            <div class="container "><h2 class="center uppercase black mb-2">TIRES</h2></div>
            <div class="container ">
                <div id="tabs" class="navs-with-text">
                    <div class="tabs-navigation">
                        <div class="tabs-navigation--title">
                            <h6 class="uppercase">vehicle type</h6>
                        </div>
                        <ul >
                            @foreach ($search_tags as $search_tag)
                                @if($search_tag->external_link)
                                    <li><a href="{{ $search_tag->external_link }}"><i class="{{ $search_tag->icon->class }}"></i>{{ $search_tag->name }}</a></li>
                                @else
                                    <li><a href="#tabs-{{ $search_tag->slug }}"><i class="{{ $search_tag->icon->class }}"></i>{{ $search_tag->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @foreach ($search_tags as $search_tag)
                        <div id="tabs-{{ $search_tag->slug }}">
                            @php
                                $filtered = $tyres->where('search_tag_id', $search_tag->id);
                                $collect=collect($filtered);
                                $total_season=$collect->pluck('season_id')->unique();
                                $show_season_menu=true;
                                if(count($total_season)<=1){$show_season_menu=false;}
                                //print_r($total_season);
                            @endphp
                            
                            @foreach ($seasons as $oneseason)
                                <div id="{{$search_tag->slug.'-'.$oneseason->slug}}">
                                    @php
                                        $season_tyres = $filtered->where('season_id', $oneseason->id);
                                    @endphp
                                    @if(count($season_tyres))
                                        <x-season-navs :seasons="$seasons" :parentel="$search_tag->slug" :active="$oneseason" :show="$show_season_menu"/>
                                        <x-tyre-grid :tyres='$season_tyres' />
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>

        <!-- Dealer locator widget -->
        <div class="section bg-white pt-0" id="dealer-locator">
            <div class="container">
                <h2 class="uppercase center dark-100 mb-2">DEALER LOCATOR</h2>
                
                <div class="grid align-center">
                    <div class="col-12">
						<x-dealer-locator-widget />
                    </div>
                </div>
                
                <div id="dealerform" >
                    <x-dealer-locator-form />
                </div>
                
            </div>
        </div>
        <!-- Responsibility -->
        <div class="section  bg-gray" id="responsiblity">
            <div class="container">
                <div class="grid">
                    <div class="col-12">
                        <div class="center">
                            <h2 class="uppercase center dark-100 mb-2">OUR COMMITMENT TO THE COMMUNITY</h2>
                        </div>
                    </div>
                </div>
                
                <div class="grid align-center">
                    <div class="col-md-6 col-sm-12 col-bleed">
                        <img src="{{asset('images/tyre-grid/social-responsibility.webp')}}" alt="Social Responsibility">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="ma-xxs-0 ma-xs-0 ma-sm-0 ml-md-2">
                            <h5 class="dark-100 mt-0 uppercase">SOCIAL RESPONSIBILITY</h5>
                            <p>We have always believed in giving back and this is one of the pillars that Radar Tires has been built on. It was these beliefs that led us to partner with the Breast Cancer Research Foundation (BCRF) in 2011, the leading and highest-rated breast cancer organization in the US. We have been supporting BCRF in their mission to prevent and cure breast cancer by advancing the world’s most promising research.</p>
                            <a class="knopf red heading-font sharp ls-1" href="{{ route('pages.responsibility-social') }}">READ MORE</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="grid align-center">
                    <div class="col-md-6 col-sm-12 col-bleed order-md-2">
                        <img src="{{asset('images/tyre-grid/environmental-responsibility.webp')}}" alt="Environmental Responsibility">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="ma-xxs-0 ma-xs-0 ma-sm-0 mr-md-2">
                            <h5 class="dark-100 mt-0 uppercase">ENVIRONMENT</h5>
                            <p>{{ __("We continually strive to minimise our impact through sustainable practices. By late 2013, Radar Tires became the first carbon-neutral tire brand. We have extended this commitment to carbon neutrality from cradle to grave for certain products and geographies, aiming to remain carbon neutral until 2030, in line with requirements of PAS 2060.") }}</p>
                            <a class="knopf red heading-font sharp ls-1" href="{{ route('pages.responsibility-environment') }}">READ MORE</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    @push('scripts')

    <!-- Swiper JS -->
    <script src="{{asset('js/swiper/swiper-bundle.js')}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script async src="https://js.testfreaks.com/onpage/omni-united.com-radar/head.js"></script>
    <script async src="{{asset('js/testfreaks.js')}}"></script>
    
    <script type="text/javascript">
        $( function() {
            
            $( "#tabs" ).tabs({
                collapsible: true,
                beforeActivate: function (event, ui) {
                    if( $(ui.newTab).find('a').attr('href').indexOf('#') != 0 ){ //check if it is hash link
                        window.open($(ui.newTab).find('a').attr('href'), '_blank');
                    }
                },
                activate:function( event, ui ) {
                    var current = $(window).scrollTop();
                        window.location.hash = ui.newTab[0].firstChild.hash;
                        $(window).scrollTop(current);
                }
            });            

            var hash = window.location.hash;
            if (hash!='' && hash.substring(1,5)==='tabs') {
                $(window).scrollTop($('#tabs').offset().top-80);
            }
        });
        const swiper = new Swiper('.swiper', {
            loop: true,
            autoplay: {
                delay: 5000,
            },

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },
        });
    </script>
    @endpush
</x-guest-layout>