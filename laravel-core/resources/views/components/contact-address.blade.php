@props(['title','address','phone','workingHours'])

<div  {{ $attributes->merge(['class' => '']) }} >
    <div class="contact">
        <h5 class="title">{!! htmlspecialchars_decode($title) !!}</h5>
        <p class="address" >{!! htmlspecialchars_decode($address) !!}</p>
        <div class="phone" >{!! htmlspecialchars_decode($phone) !!}</div>
        <div class="working-hours" >{!! htmlspecialchars_decode($workingHours) !!}</div>
    </div>
</div>