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
                <ol class="breadcrumb uppercase">
                <li class="breadcrumb-item"><a href="{{ safeRoute('home') }}">{{__('Home')}}</a></li>
                <li class="breadcrumb-item"><i class="icon-angle-right"></i>
                    <a href="{{ safeRoute('tyre.grid', ['brand' =>$tyre->brand->slug]) }}">
                        {{ ucfirst($tyre->brand->name) }}
                    </a>
                </li>
                <li class="breadcrumb-item uppercase"><i class="icon-angle-right"></i>
                    <a href="{{safeRoute('tyre.grid', ['brand' =>$tyre->brand->slug]).'#tabs-'.$tyre->search_tag->slug}}">
                    {{ __($tyre->search_tag->name) }}
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
                    <a href="{{safeRoute('pages.premium-collection')}}" class="premium-tyre--badge">{{__('PREMIUM COLLECTION')}}</a>
                </div>
                @endif
                <!-- Tyre Details -->
                <div class="col-lg-6">
                    <h2 class="tyre--title uppercase mt-0">{!! htmlspecialchars_decode($tyre->preview_name) !!}</h2>
                    <h5 class="black">{{ __(implode(" | ", json_decode($tyre->tyre_categories->pluck('name')))) }}</h5>
                    <div id="testfreaks-badge"></div>
                    <div class="tyre--description">
                        {!! __(preg_replace_array('/:url[a-z_-]+/', [safeRoute('pages.warranty')], htmlspecialchars_decode($tyre->description))) !!}
                        <!-- <p>{!! __(htmlspecialchars_decode($tyre->description)) !!}</p> -->
                    </div>
                    @php
                        $tyre_icons=$tyre->icons;
                    @endphp
                    <div class="tyre--icons">
                        @foreach ($tyre_icons as $tyre_icon)
                            <div class="tyre-icon"><i class="{{$tyre_icon->class}}"></i>{{__($tyre_icon->name)}}</div>
                        @endforeach
                    </div>
                </div>
                <!-- Tyre Images -->
                <div class="col-lg-6">
                    @php
                        $product_images=json_decode($tyre->product_images);
                    @endphp
                    <x-tyre-image-slider class="tyre--image-slider {{ $tyre->region->code==='EU'?'car-n':''}} " :slides="$product_images" />
                </div>
            </div>
        </div>
        <!-- Features and Benifits -->
        <div class="section top-padding bg-grey">
            <div class="container">
                <div class="grid">
                    <div class="col-lg-12"> <h2 class="uppercase dark-80 center mt-0">{{__("FEATURES")}}</h2></div>
                    <div class="col-md-12 col-bleed-y center">
                        @php
                            $features=json_decode($tyre->features_benifits )
                        @endphp
                        @if(!empty($features))
                            <x-tyre-fb-slider class="tyre--fb-slider"  :slides="$features" />
                        @else
                            <p class="center mb-5">Coming Soon</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    
        <!--Test Freaks Reviews-->
        
        <div class="section bg-white py-0">
            <div class="container clearfix">
                <div class="row" style="display:block;">
                    <div id="testfreaks-reviews"></div>
                </div>
            </div>
        </div>
        <!-- Sizes -->
        <div class="section bg-white tyre-sizes">
            <div class="container">
                <div class="grid">
                    <div class="col-md-12">
                        <h2 class="uppercase dark-80 center">{{__('SIZES')}}</h2>
                    </div>
                </div>
                <x-size-tabs :sizes="$tyre->sizes" />
            </div>
        </div>

    </section>
    @push('scripts') 
    <!-- Swiper JS -->
    <script src="{{url('js/swiper/swiper-bundle.js')}}"></script>
    <script async src="https://js.testfreaks.com/onpage/omni-united.com-radar/head.js"></script>
    <script async src="{{asset('js/testfreaks.js')}}"></script>
    <script>
    testFreaks = window.testFreaks || [];
    testFreaks.push(["setProductId", "{{$tyre->slug }}" ]);
    testFreaks.push(["load", ["badge", "reviews"]]);
    </script>
    
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