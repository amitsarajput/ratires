<x-guest-layout>
    @push('styles') 
        <link rel="stylesheet" href="{{url('css/swiper/swiper-bundle.css')}}" />
        <link rel="stylesheet" href="{{url('css/jquery-ui.css')}}">
    @endpush

    <section id="content">
        <!-- Bredcrumbs -->
        <div class="container">
        <div class="grid">
        <div class="col-lg-12">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><i class="icon-angle-right"></i>
                    <a href="{{ route('tyre.grid', $tyre->brand->slug) }}">
                        {{ ucfirst($tyre->brand->name) }}
                    </a>
                </li>
                <li class="breadcrumb-item uppercase"><i class="icon-angle-right"></i>
                    <a href="{{route('tyre.grid', $tyre->brand->slug).'#tabs-'.$tyre->search_tag->slug}}">
                    {{ $tyre->search_tag->name }}
                    </a>
                </li>
                <li class="breadcrumb-item"><i class="icon-angle-right"></i>{!! htmlspecialchars_decode($tyre->preview_name) !!}</li>
                </ol>
        </div>
        </div>
        </div>
        <!-- Product Details -->
        <div class="container">
            <div class="grid align-start">
                <!-- Premium tyre badge -->
                 @if($tyre->premium_tyre)
                <div class="col-lg-12 col-bleed-y">
                    <a href="{{route('pages.premium-collection')}}" class="premium-tyre--badge">PREMIUM COLLECTION</a>
                </div>
                @endif
                <!-- Tyre Details -->
                <div class="col-lg-6">
                    <h2 class="tyre--title uppercase mt-0">{!! htmlspecialchars_decode($tyre->preview_name) !!}</h2>
                    <h5 class="black">{{ implode(" | ", json_decode($tyre->tyre_categories->pluck('name'))) }}</h5>
                    <div class="tyre--description">
                        <p>{!! htmlspecialchars_decode($tyre->description) !!}</p>
                    </div>
                    @php
                        $tyre_icons=$tyre->icons;
                    @endphp
                    <div class="tyre--icons">
                        @foreach ($tyre_icons as $tyre_icon)
                            <div class="tyre-icon"><i class="{{$tyre_icon->class}}"></i>{{$tyre_icon->name}}</div>
                        @endforeach
                    </div>
                </div>
                <!-- Tyre Images -->
                <div class="col-lg-6">
                    @php
                        $product_images=json_decode($tyre->product_images);
                    @endphp
                    <x-tyre-image-slider class="tyre--image-slider {{ $tyre->country->code==='EU'?'carbon-n':''}} " :slides="$product_images" />
                </div>
            </div>
        </div>
        <!-- Features and Benifits -->
        <div class="section top-padding bg-grey">
            <div class="container">
                <div class="grid">
                    <div class="col-lg-12"> <h2 class="uppercase dark-80 center mt-0">features</h2></div>
                    <div class="col-md-12 col-bleed-y center">
                        @php
                            $features=json_decode($tyre->features_benifits )
                        @endphp
                        <x-tyre-fb-slider class="tyre--fb-slider"  :slides="$features" />
                    </div>
                </div>
            </div>
        </div>
        <!-- Sizes -->
        <div class="section bg-white tyre-sizes">
            <div class="container">
                <div class="grid">
                    <div class="col-md-12">
                        <h2 class="uppercase dark-80 center">sizes</h2>
                    </div>
                </div>
                <x-size-tabs :sizes="$tyre->sizes" />
            </div>
        </div>

    </section>
    @push('scripts') 
    <!-- Swiper JS -->
    <script src="{{url('js/swiper/swiper-bundle.js')}}"></script>
    
    <script src="{{url('js/jquery-ui.js')}}"></script>
    <script type="text/javascript">
        
        const swiper = new Swiper('.swiper', {
            loop: true,
            autoplay: {
                delay: 6000,
            },

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            }, 
            
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });
        jQuery( function() {
            jQuery( "#tabs" ).tabs();
        } );
    </script>
     @endpush
</x-guest-layout>