<div class="floating-buttons">
<a 
    @if( request()->routeIs('home') )
        href="#tires" 
        scroll-to="#tires" 
    @else
        href="{{ route('home').'#tires'}}"
    @endif
        class="black"><x-icon-tyre-line-2/>TIRES</a>
<a 
    @if( request()->routeIs('home') )
        href="#dealer-locator" 
        scroll-to="#dealer-locator" 
    @else
        href="{{ route('home').'#dealer-locator'}}"
    @endif
    class="red"><x-icon-location-pin/>DEALER LOCATOR</a>
</div>