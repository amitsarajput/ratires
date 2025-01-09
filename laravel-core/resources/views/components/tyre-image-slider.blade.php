@push('styles') 
@endpush
<div {{ $attributes->merge(['class' => 'swiper']) }} >
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper" >
        <!-- Slides -->
        @foreach ($slides as $slide)
            <div class="swiper-slide" style=""><img class="lozad" src="{{asset('storage/tire_images/other/'.$slide)}}"></div>
        @endforeach
    </div>
    <!-- If we need pagination -->
    <!-- <div class="swiper-pagination"></div> -->
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"><i class="icon-angle-left"></i></div>
    <div class="swiper-button-next"><i class="icon-angle-right"></i></div>

    <!-- If we need scrollbar -->
    <!-- <div class="swiper-scrollbar"></div> -->
</div>

@push('scripts') 
@endpush