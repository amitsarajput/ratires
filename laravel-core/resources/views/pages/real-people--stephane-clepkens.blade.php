<x-guest-layout>
    <!-- Page Title
    ============================================= -->
    <x-page-title image-url="{{ asset('images/banner--group-page.webp') }}" container="true" page-title="REAL PEOPLE, REAL PERFORMANCE<br>– THE EXPERTS BEHIND RADAR TYRES" class="page-title--bottom el-height-70 uppercase pb-3" />
    
    <!-- Content
    ============================================= -->
    <section id="content" class="pb-4">
        <div class="container">
            <div class="grid">
                <div class="col-md-12 col-bleed-y  mb-4">
                    <h3 class="no-top-margin dark-100 uppercase">{{ __("Behind the wheel: Stéphane Clepkens’ journey to redefining tire performance") }}</h3>
                    <p>{!! __("When it comes to tires, few individuals can match the expertise and passion of Stéphane Clepkens, Test Manager at Radar Tires. With a career spanning nearly 25 years in the automotive industry, Stéphane brings a unique perspective to the intricate art of tire testing and development.") !!}</p>
                </div>
            </div>
            
            <div class="grid grid-bleed align-center">
                <div class="col-md-6 col-sm-12 order-md-2 mb-4" >
                    <a href="{{ route('pages.stephane-clepkens') }}">
                        <img src="{{asset('images/Stephane.webp')}}" alt="">
                    </a>
                </div>
                <div class="col-md-6 col-sm-12 mb-4">
                    <div class="ma-xxs-2 mx-lg-3">
                        <h3 class="dark-100  no-top-margin uppercase">{{ __("A career forged on the track") }}</h3>
                        <p>{!! __("Stéphane began his journey in 2000 as a test driver for Continental Tires, focusing on Original Equipment (OE) tires for BMW. Over the next three years, he honed his skills in precision testing, learning the nuances of chassis and tire dynamics. In 2003, Stéphane took a bold leap into freelancing, collaborating with leading tire brands such as Dunlop, Yokohama, Hankook, and Bridgestone.") !!}</p>
                        <p>{!! __("A key highlight of Stéphane’s career has been his expertise on the legendary Nürburgring Nordschleife in Germany. For over a decade, he spent up to 15 weeks annually mastering the world’s most demanding racetrack, where he not only tested tires but also trained future test drivers.") !!}</p>
                        <a class="knopf red heading-font sharp ls-1" href="https://youtu.be/WiIYifeGdIY" target="_blank">{!! __("WATCH VIDEO") !!}</a>
                        <!-- <h5 class="black">DIMAX SPORT | DIMAX SPRINT | DIMAX ALL SEASON | DIMAX WINTER</h5> -->
                    </div>
                </div>
            </div>
            <div class="grid">
                <div class="col-md-12">
                    <h4 class="dark-100 uppercase">{{ __("Joining Radar Tires: a new chapter") }}</h4>
                    <p>{{ __("Stéphane’s decision to join Radar Tires was driven by the company’s progressive approach. “Radar Tires impressed me with their flat, horizontal management structure and the freedom they offer to innovate,” Stéphane shares. “Their mission to deliver premium-level performance at accessible prices aligns perfectly with my vision of democratizing tire safety and quality.”")}}</p>
                </div>
                <div class="col-md-12">
                    <h4 class="dark-100 uppercase">{{ __("A unique philosophy on tire testing") }}</h4>
                    <p>{{ __("For Stéphane, real-world testing is at the heart of tire development. “Tires are complex and highly technical products,” he explains. “Their performance can only be truly understood under real driving conditions, where we transform subjective customer feedback into objective targets for research and development.”") }}</p>
                </div>
                <div class="col-md-12">
                    <h4 class="dark-100 uppercase">{{ __("Redefining premium") }}</h4>
                    <p>{{ __("Stéphane’s mission at Radar Tires is clear: to elevate the brand to premium status while ensuring that its products remain affordable for all. “Every market is different, and in Europe, I know what customers and carmakers expect from their tires,” he says. “Reaching premium standards requires targeting the same benchmarks as the established leaders, but we’re committed to achieving this without compromising on cost-effectiveness.”") }} </p>
                </div>
                <div class="col-md-12">
                    <h4 class="dark-100 uppercase">{{ __("Making safety accessible") }}</h4>
                    <p>{{ __("Stéphane’s passion extends beyond performance metrics to the broader impact of his work. “Tires are the only points of contact between a car and the road,” he notes. “Democratizing premium tire performance means providing young drivers, retirees, and everyone in between with access to safe, reliable products.”") }}</p>
                </div>
                <div class="col-md-12">
                    <h4 class="dark-100 uppercase">{{ __("Looking ahead") }}</h4>
                    <p>{{ __("Despite his extensive experience, Stéphane continues to find joy and discovery in his work. “Every day, I learn something new,” he says. “When we develop a truly brilliant product, it’s a rewarding experience that reminds me why I’m passionate about what I do.”") }}</p>
                </div>
                <div class="col-md-12">
                    <h4 class="dark-100 uppercase">{{ __("Why choose Radar Tires?") }}</h4>
                    <p>{{ __("Radar Tires isn’t just about making great tires – it’s about making great tires accessible to everyone. With experts like Stéphane Clepkens leading the charge, we’re breaking barriers in the industry by creating tires that deliver safety, reliability, and performance without compromise. Whether you’re navigating winter roads, enjoying a spirited drive, or simply commuting to work, Radar Tires is here to keep you grounded – literally and figuratively.") }}</p>
                </div>
                
            </div>
        </div>

    </section><!-- #content end -->
</x-guest-layout>