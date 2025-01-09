@props([])

<!-- Slider main container -->
<section {{ $attributes->merge(['class' => 'slider']) }}>
    <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper" >
                <!-- Slides -->
                <a href="#" class="swiper-slide bg-image" style="background-image:url(images/slides/radar-eu-banner-renegade-at-sport.webp)"></a>
                <a href="#" class="swiper-slide bg-image" style="background-image:url(images/slides/radar-eu-carbon-neutral-banner.webp)"></a>
                <div class="swiper-slide bg-image" style="background-image:url(images/slides/RadarEU_Performance-Collection.webp)"></div>
                <div class="swiper-slide bg-image" style="background-image:url(images/slides/RadarEU_BCRF-Banner_1920x950.webp)"></div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
            <a href="#" data-scrollto="#content" data-offset="70" class="light one-page-arrow">
                <i class="icon-angle-down infinite animate__animated animate__fadeInDown animate__infinite"></i>
            </a>
    </div>
</section>