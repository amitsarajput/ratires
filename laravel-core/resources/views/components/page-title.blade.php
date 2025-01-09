@props(['imageUrl'=>'','pageTitle'=>'','pageSubTitle'=>'','container'=>false,'button'=>false,'buttonText'=>'READ MORE','buttonLink'=>'#'])
            
<!-- Page Title Module -->
<section id="page-title" {{ $attributes->merge(['class' => '']) }} style="background-image: url({{ $imageUrl }})">
    @if ($container)
    <div class="container">
        <div class="grid">
    @endif
        <div class="page-title-wrapper">
            <h2>{!! $pageTitle !!}</h2> 
            @if ($pageSubTitle)
                <p >{{$pageSubTitle}}</p>
            @endif
            @if ($button)
                <a class="knopf red heading-font sharp ls-1 mt-1" href="{{ $buttonLink }}">{{ $buttonText }}</a>
            @endif
        </div>
    @if ($container)
        </div>
    </div>
    @endif
</section>
