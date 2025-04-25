@php
    $sizes_with_data=json_decode($sizes, true);
    $extra_cols=$sizes_with_data['extra_cols'];
    $legend=$sizes_with_data['legends'];
    $sizes=collect($sizes_with_data['sizes']);
    //dd($sizes);
    $grouped_sizes= $sizes->groupBy('size');
    $navs=$grouped_sizes->keys()->unique();
@endphp
@if($sizes->isEmpty())
    <div class="grid">
        <div class="col-lg-12">
            <p class="center">Coming Soon</p>
        </div>
    </div>
@else
    <div class="grid">
        <div class="col-lg-12">
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-all">All</a></li>
                    @foreach ($navs as $nav)
                        <li><a href="#tabs-{{ $nav }}">{{ $nav.'"' }}</a></li>
                    @endforeach
                </ul>
                    <!-- Table for all sizes -->
                    <div id="tabs-all" class="tab-content">
                            <x-size-all-table :sizes="$grouped_sizes" :extra-cols="$extra_cols" :all="true" />
                    </div>

                <!-- Table for single sizes -->
                @foreach ($navs as $nav)
                    <div id="tabs-{{ $nav }}" class="tab-content">
                        @php
                            $sizeTable=$grouped_sizes->get($nav);
                        @endphp
                        <x-size-table :size-table="$sizeTable" :nav="$nav" :extra-cols="$extra_cols" :all="true"  />   
                    </div>
                @endforeach
                
            </div>
        </div>
        <div class="col-lg-12">
            <div class="tyre--legends">
                {!! preg_replace_array('/:url[a-z_-]+/', [route('pages.eu-labeling')], htmlspecialchars_decode($legend)) !!}
            </div>
        </div>
    </div>
@endif