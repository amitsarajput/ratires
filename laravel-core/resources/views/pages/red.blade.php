<x-guest-layout>
    
    <!-- Content
    ============================================= -->
    <section id="content" class="bg-image" style="background-image: url({{ asset('images/landing-pages/red/red-landing-bg.webp') }});">
        <div class="container">
            <div class="grid">
                <div class="col-md-12 center">
                    <div class="pa-2" style="background-color: #00000061;">
                        <img class="" src="{{asset('images/landing-pages/red/radar-red-logo.webp')}}" alt="" width="250">
                        <h2 class="white my-1">{{__('JOIN THE RADAR RED PROGRAM')}}</h2>                                   
                        <h3 class="white my-1">{{__("MORE BENEFITS. MORE SUPPORT. MORE GROWTH.")}}</h3>
                        <a target="_blank" href="https://youtu.be/haekaIqITu8" class="knopf red sharp uppercase hover-black-80 heading-font ls-2 my-1" >{{__('WATCH RED INTRODUCTION VIDEO')}}</a>
                    </div>
                </div>
            </div>
            <div class="grid">
                <div class="col-md-6 center">
                    <div class="pa-2" style="background-color: #00000061; height:100%;" >
                        <h3 class="white">{{__("WHAT IS RADAR RED?")}}</h3>
                        <ul class="white tleft">
                            <li>{{__("Radar RED is our exclusive partner program designed for trusted tire dealers")}}</li>
                            <li>{{__("Radar RED offers access to premium benefits, branding support, and a shared commitment  to growth")}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 center">
                    <div class="pa-2" style="background-color: #00000061;">
                        <h3 class="white">{{__("WHY PARTNER WITH RADAR?")}}</h3>
                        <ul class="white tleft">
                            <li>{{__("Exclusive branding and co-marketing opportunities")}}</li>
                            <li>{{__("Access to premium Radar product range")}}</li>
                            <li>{{__("Enhanced visibility via our dealer locator")}}</li>
                            <li>{{__("Invitation to local and global campaigns")}}</li>
                            <li>{{__("Priority support and tools to grow your business")}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="grid">
                <div class="col-md-12 center">
                    <div class="pa-2" style="background-color: #00000061;">                                 
                        <h3 class="white">{{__("READY TO ROLL WITH RADAR?")}}</h3>
                        <p class="white center">{{__("Fill in the form and we will contact you personally.")}}</p>
                        <x-red-landing-form class="bg-transparent " />
                    </div>
                </div>
            </div>
            
        </div>
        <div class="section bg-black">
            <div class="container">
                <div class="grid ">
                    <div class="col-md-12 center">
                        <h2 class="no-top-margin uppercase white">{{__("REAL PEOPLE. REAL GROWTH.")}}</h2>
                        <p class="white center mb-3">{{__("We grow together. Radar RED program is about people and partnership, not just products.")}}</p>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/haekaIqITu8?si=_wjrpq5RpY8jxKk3" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
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
