<!-- Side Panel -->
<div id="side-panel" class="dark">

	<div id="side-panel-trigger-close" class="side-panel-trigger"><s href="#"><i class="icon-line-cross"></i></s></div>

	<div class="side-panel-wrap">
		<a class="side-panel-logo" :href="route('home')"><img src="{{asset('images/omni-logo.png')}}"></a>
		<nav class="nav-tree nobottommargin">
			<ul>
				<li class="sub-menu {{ request()->routeIs(['tyre.grid','tyre.single','pages.dealerlocator.*'])?'active':''}}"><a href="#">Our Brands</a>
					@php
						$country=strtolower(session('omni_data.preffered_location'));
						
					@endphp
					<ul>
						<li class="{{ (request()->routeIs('tyre.grid') && session('omni_data.brand')=='radar')?'active':''}}">
							<a href="{{ route('tyre.grid',['brand'=>'radar','country'=>$country])}}" >Radar</a>
						</li>
							<li class="{{ (request()->routeIs('tyre.grid') && session('omni_data.brand')=='patriot')?'active':'' }}">
							<a href="{{ route('tyre.grid',['brand'=>'patriot','country'=>$country]) }}">Patriot</a>
							</li> 
							<li class="{{ (request()->routeIs('tyre.grid') && session('omni_data.brand')=='americantourer')?'active':'' }}">
							<a href="{{ route('tyre.grid',['brand'=>'americantourer','country'=>$country]) }}">American Tourer</a>
							</li> 
						<li class="{{ (request()->routeIs('tyre.grid') && session('omni_data.brand')=='roadlux')?'active':'' }}">
							<a href="{{ route('tyre.grid',['brand'=>'roadlux','country'=>$country])}}">Roadlux</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>

</div>