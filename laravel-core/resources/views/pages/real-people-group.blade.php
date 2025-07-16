<x-guest-layout>
    @push('styles') 
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{asset('css/swiper/swiper-bundle.css')}}" />
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">    
        <style>@media screen and (max-width:767px){
            #page-title{
                    height: 200px!important;
            } 
            #page-title h2{ font-size: 20px;line-height: 1.2;}
        }</style>
    @endpush
    <!-- Implement Slider From Brand Database -->
    <!-- Page Title
    ============================================= -->
    <x-page-title image-url="{{ asset('images/banner--group-page.webp') }}" container="true" page-title="REAL PEOPLE, REAL PERFORMANCE<br>– THE EXPERTS BEHIND RADAR TIRES" class="page-title--bottom el-height-70 uppercase pb-3" />
    
    <!-- Content -->
    <section id="content" class="pb-4">
        <div class="container">
            <div class="grid">
                <div class="col-md-12 col-bleed-y mb-4">
                    <h3 class="no-top-margin dark-100">{{ __("At Radar Tires, we believe that premium performance isn't just about technology—it’s about the passion and expertise of the people who push the limits of innovation, safety and design.")}}</h3>
                    <p>{{ __("Our commitment to making premium, high-quality tires accessible to all is driven by these world-class professionals who ensure every tire meets the highest standards.")}}</p>
                </div>
            </div>
            
            <div class="grid grid-bleed align-center">
                <div class="col-md-6 col-sm-12">
                    <a href="{{ safeRoute('pages.olli-seppala') }}">
                        <img src="{{asset('images/Olli.webp')}}" alt="">
                    </a>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="ma-xxs-2 ma-xs-2 ma-sm-2 ma-md-2 mx-lg-7">
                        <h3 class="dark-100  no-top-margin">{{ __("CUTTING-EDGE R&D") }}</h3>
                        <p>{{ __("Olli Seppälä, Head of R&D, leads the charge in engineering tires that combine state-of-the-art materials and advanced manufacturing techniques. His vision is to deliver premium quality through a world-class global manufacturing network—without the premium price. ") }}<br><a class="knopf link red heading-font sharp ls-1" href="{{ safeRoute('pages.olli-seppala') }}">{{ __("READ MORE") }}</a></p>
                        <a class="knopf red heading-font sharp ls-1" href="https://youtu.be/LVP-xecALQk" target="_blank">{{__('WATCH VIDEO')}}</a>
                    </div>
                </div>
            </div>
            <div class="grid grid-bleed align-center">
                <div class="col-md-6 col-sm-12 order-md-2" >
                    <a href="{{ safeRoute('pages.stephane-clepkens') }}">
                        <img src="{{asset('images/Stephane.webp')}}" alt="">
                    </a>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="ma-xxs-2 mx-lg-7">
                        <h3 class="dark-100  no-top-margin">{{ __("TESTING EXCELLENCE") }}</h3>
                        <p>{{ __("Test driver Stéphane Clepkens pushes every Radar tire to the limit, rejecting anything that doesn’t outperform expectations. His mission? To ensure Radar Tires rival and even surpass premium brands in real-world performance.") }} <br><a class="knopf link red heading-font sharp ls-1" href="{{ safeRoute('pages.stephane-clepkens') }}">{{ __("READ MORE") }}</a></p>
                        <a class="knopf red heading-font sharp ls-1" href="https://youtu.be/WiIYifeGdIY" target="_blank">{{__('WATCH VIDEO')}}</a>
                        <!-- <h5 class="black">DIMAX SPORT | DIMAX SPRINT | DIMAX ALL SEASON | DIMAX WINTER</h5> -->
                    </div>
                </div>
            </div>
            <div class="grid grid-bleed align-center">
                <div class="col-md-6 col-sm-12">
                    <a href="{{ safeRoute('pages.fabrizio-giugiaro') }}">
                        <img src="{{asset('images/Fabrizio.webp')}}" alt="">
                    </a>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="ma-xxs-2 ma-xs-2 ma-sm-2 ma-md-2 mx-lg-7">
                        <h3 class="dark-100  no-top-margin">{{ __("ICONIC DESIGN") }}</h3>
                        <p>{{ __("Fabrizio Giugiaro, the visionary designer behind some of the world’s most iconic automotive creations and the founder of GFG Style. Now, he brings his expertise to Radar Tires, redefining what tire design means in terms of aesthetics, performance, and accessibility.") }} <br><a class="knopf link red heading-font sharp ls-1" href="{{ safeRoute('pages.fabrizio-giugiaro') }}">{{ __("READ MORE") }}</a></p>
                        <a class="knopf red heading-font sharp ls-1" href="https://youtu.be/oGc5hAfOeIA" target="_blank">{{__('WATCH VIDEO')}}</a>
                        <!-- <h5 class="black">DIMAX SPORT | DIMAX SPRINT | DIMAX ALL SEASON | DIMAX WINTER</h5> -->
                    </div>
                </div>
            </div>
            <div class="grid">
                <div class="col-md-12 col-bleed-y mt-4">
                    <p>{{ __("With their passion and expertise, Radar Tires is redefining what it means to drive on premium tires—delivering world-class quality, safety, and style at a price that’s within reach. Because real performance starts with real people.") }}
                    </p>
                </div>
            </div>


        </div>
        <div class="section no-padding">
        </div>
        
    </section>
    
</x-guest-layout>