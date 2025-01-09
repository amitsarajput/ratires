@props([
    'title',
    'image',
    'url',
])
<a {{ $attributes->merge(['class' => 'linked-omni-image-box']) }}  class="linked-omni-image-box" href="{{ $url }}">
    <div class="omni-image-box">
        <img src="{{ $image }}" alt="title">
        <div class="img-overflow">
            <span>{{$title}}</span>
        </div>
    </div>
</a>