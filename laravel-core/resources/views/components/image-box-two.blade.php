@props([
    'title',
    'image',
    'buttontext'=>'Know More',
    'url',
])

<div class="pro-img-bar">
    <img class="lozad" src="{{ $image }}" alt="{{ $title }}">
    <div class="img-overflow">
        <a href="{{ $url }}" class="knopf uppercase sharp red hover-black-80 heading-font">{{ $buttontext }}</a>
    </div>
</div>