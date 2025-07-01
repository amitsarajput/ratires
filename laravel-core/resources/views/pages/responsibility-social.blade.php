<x-guest-layout>
    <!-- Page Title
    ============================================= -->
    <x-page-title image-url="{{ asset('images/social-responsibility--banner.webp') }}" container="true" page-title="" class="page-title--center el-height-70 uppercase mb-0" />
    
    <!-- Content
    ============================================= -->
    <section id="content" class="pb-4">
        <div class="section mb-4">
            <div class="container">
                <div class="grid">
                    <div class="col-md-12 col-bleed-y">
                        <h2 class="no-top-margin pink uppercase center ">Social Responsibility</h2>
                        <p class="text-lead center"><em> “ We cannot transform the world alone, but we want to demonstrate that if a company like ours can invest the time, effort and resources necessary to make a difference, then anyone can. ” </em></p>
                        <p class="center dark-50">G.S.Sareen, Director, Radar Tires </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="grid">
                <div class="col-md-12 col-bleed-y">
                    <h3 class="no-top-margin dark-100 uppercase">Giving Back to the Society</h3>
                    <p>We have always believed in giving back, both to the environment and to the society. This is one of the pillars that our company has been built on. It was these beliefs that led us to partner with the Breast Cancer Research Foundation (BCRF) in 2011. Together we launched “Mobilising Hope”, a corporate alliance program that supports BCRF’s mission to prevent and cure breast cancer by advancing the world's most promising research. Our support to the BCRF has not just been monetary but also heavily aimed at bringing awareness of their work into the forefront of our industry and society in general. Through this programme we continue to fund and support thousands of hours of critical life-saving research.</p>
                    <p>Over the years we have undertaken numerous initiatives to spread awareness for this cause. Some of these include launching a limited edition pink sidewall tyre that was sold through a major tyre distributor in the US, supporting BCRF in all major trade exhibitions and tyre fairs globally and encouraging our dealers with in-store promotion and awareness materials. We have also received tremendous support from our past racing teams as they have always displayed the BCRF logo on their race vehicles and our previous brand ambassador LPGA Golfer, Jodi Ewart Shadoff who helped us in bringing more awareness about this cause. </p>
                    <p>In 2025, Radar Tyres is donating a minimum of $50,000 to the Breast Cancer Research Foundation<sup>®</sup> regardless of sales. For more information about BCRF, please visit <a class="blue" target="_blank" href="https://www.bcrf.org/">www.bcrf.org</a>.</p>
                </div>
            </div>
        </div>        
        <div class="container">                
            <div class="grid">
                <div class="col-md-6 col-bleed-y">
                    <div class="number-text">
                        <div class="number-text--number pink">
                            us$ <span class="counter">1,387,750</span>
                        </div>
                        <div class="number-text--text">
                            donated to <br> BCRF to date
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-bleed-y">
                    <div class="number-text">
                        <div class="number-text--number pink">
                            <img style="margin-top:-10px;" class="lozad" data-src="{{ asset('images/ico-microscope.webp') }}" alt="" src="{{ asset('images/ico-microscope.webp') }}" data-loaded="true">
                             <span class="counter">27,755</span>
                        </div>
                        <div class="number-text--text">
                            hours of  <br> research funded
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <div class="container">
            <hr class="mt-5 mb-5">
        </div>   

            
        <!-- <div class="container mt-5">
            <div class="grid align-center">
                <div class="col-md-6 col-sm-12 col-bleed">
                    <img src="{{asset('images/BCRF_Donating-Banner-2024.webp')}}" alt="Social Responsibility">
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="ma-xxs-0 ma-xs-0 ma-sm-0 ml-md-2">
                        <h5 class="dark-100 mt-0 uppercase">FUND RAISING PROGRAMME
                        PARTNERING WITH UK BASED EDEN TYRES & SERVICING</h5>
                        <p>For the fifth consecutive year, Radar Tyres has tied up with its UK based tyre distributor, Eden Tyres & Servicing to raise funds for the BCRF. For every Radar Tyre sold at Eden Tyre outlets in the UK in 2024, both companies will collectively donate £2 to BCRF. Through this programme, the company aims to raise £20,000 this year for the BCRF.</p>
                    </div>
                </div>
            </div>
        </div>
          
        <div class="container">
            <hr class="mt-5 mb-5">
        </div>   -->

        <div class="container">
            <div class="grid">
                <div class="col-md-10 offset-md-1">
                    <h3 class="mt-0 mb-3 dark-100 uppercase center">Our Sustainability and Giving Back Philosophy </h3>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/51noIoC99xc?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div>
            </div>
        </div>

    </section><!-- #content end -->
    @push('scripts')  
        <script src="{{asset('js/jquery.fitvids.js')}}"></script>
        <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
        <script>
            $(document).ready(function(){
                $('iframe[src*="youtube"]').parent().fitVids();
                $('.counter').counterUp({
                    delay: 10,
                    time: 3000
                });
            });
        </script>
@endpush
</x-guest-layout>

    
   


