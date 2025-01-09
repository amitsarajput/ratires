@props(['seasons','parentel','active','show'])
<div class="t-season-nav {{$show ?'':'hide'}}">
    <div class="t-season-nav--title">
        <h6 class="uppercase">Season</h6>
    </div>
    <ul class="t-season--tabs-nav">
    @foreach ($seasons as $oneseason)
        <li class="t-season--tabs-tab {{$oneseason->icon_id==$active->icon_id?' t-season--tabs-tab-active':''}}"><a href="#{{ $parentel.'-'.$oneseason->slug }}" scroll-to="#{{  $parentel.'-'.$oneseason->slug }}" data-offset="200"><i class="{{$oneseason->icon->class}}"></i>{{$oneseason->name}}</a></li>
    @endforeach
    </ul>
</div>