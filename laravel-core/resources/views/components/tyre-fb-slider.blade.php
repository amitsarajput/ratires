@push('styles') 
@endpush
    
<div   {{ $attributes->merge(['class' => 'swiper']) }} > 
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper" >
        <!-- Slides -->
        @foreach ($slides as $slide)
            <div class="swiper-slide center tyre--fb-slider--slide" >
                <div class="h5 uppercase body-font t600 dark-80">{!! htmlspecialchars_decode($slide->title) !!}</div>
                <p class="center dark-80">{!! htmlspecialchars_decode($slide->description) !!}</p>
                <img class="lozad center" src="{{asset('storage/features/'.$slide->image)}}" alt="Radar">
            </div>
        @endforeach
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"><i class="icon-angle-left"></i></div>
    <div class="swiper-button-next"><i class="icon-angle-right"></i></div>

    <!-- If we need scrollbar -->
    <!-- <div class="swiper-scrollbar"></div> -->
</div>


@push('scripts') 
@endpush