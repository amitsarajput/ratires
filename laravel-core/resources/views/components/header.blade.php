<!-- Header -->
<header id="header">
    <div class="inner-header "><!-- search-opened -->
        <div class="logo">
            <a href="{{route('home')}}"><img src="{{asset('images/logos/radar-tires-light-red.svg')}}" alt="Radar Tires"></a>
        </div>
        <div class="right-menu-wrapper">
            <ul class="menu">
                <li class="menu-item"><a 
                                @if( request()->routeIs('home') )
                                    href="#tires" 
                                    scroll-to="#tires" 
                                @else
                                    href="{{ route('home').'#tires'}}"
                                @endif
                                >Tires</a></li>
                <li class="menu-item"><a href="{{ route('pages.why-radar')}}">Why Radar</a></li>
                <li class="menu-item"><a 
                                        @if( request()->routeIs('home') )
                                            href="#dealer-locator" 
                                            scroll-to="#dealer-locator" 
                                        @else
                                            href="{{route('home').'#dealer-locator'}}"
                                        @endif
                                        >Dealer Locator</a></li>
                <li class="menu-item"><a href="{{ route('pages.contact')}}">Contact us</a></li>
            </ul>
            @php
                $bubble_closed=session('omni_data.bubble_closed');
            @endphp
            <div class="location-picker--small">
                <x-small-location-picker  :bubbleclosed="$bubble_closed" />
            </div>
            <div id="top-search">
                <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                <form action="search" method="post">
                    <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." />
                </form>
            </div><!-- #top-search end -->
            <!-- <div class="search-opener">
                <i class="fas fa-search"></i>
            </div> -->
            
            
            <div class="collapsed-menu-trigger">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </div>
</header>