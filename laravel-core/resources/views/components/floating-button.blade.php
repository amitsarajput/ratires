<div class="floating-buttons">
<a 
    @if( request()->routeIs('home') )
        href="#tyres" 
        scroll-to="#tyres" 
    @else
        href="{{ route('home').'#tyres'}}"
    @endif
        class="black"><x-icon-tyre-line-2/>TYRES</a>
<a 
    @if( request()->routeIs('home') )
        href="#dealer-locator" 
        scroll-to="#dealer-locator" 
    @else
        href="{{ route('home').'#dealer-locator'}}"
    @endif
    class="red"><x-icon-location-pin/>DEALER LOCATOR</a>
</div>