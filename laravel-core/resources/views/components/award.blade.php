@props(['award'=>''])
@php
//dd($award);
@endphp
<div class="award">
    <div class="award-image"><img src="{{ $award['image'] }}" alt="{{ $award['title'] }}"></div>
    <div class="award-description">
        <div class="year">{{$award['year'] }}</div>
        <h4 class="title">{{$award['title'] }}</h4>
        <p>{{ $award['content'] }}</p>
    </div>
</div>