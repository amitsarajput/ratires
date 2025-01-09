<!-- Side Panel -->
<div id="side-panel" class="dark">

	<div id="side-panel-trigger-close" class="side-panel-trigger"><s href="#"><i class="icon-line-cross"></i></s></div>

	<div class="side-panel-wrap">
		<a class="side-panel-logo" :href="route('home')"><img src="{{asset('images/omni-logo.png')}}"></a>
		<nav class="nav-tree nobottommargin">
			<ul>
				<li class="sub-menu {{ request()->routeIs('pages.about.*') ? 'active':'' }}"><a href="#">About Us</a> 
					<ul>
						<li class="{{ request()->routeIs('pages.about.who-we-are')?'active':'' }}">
							<a href="{{ route('pages.about.who-we-are') }}">Who Are We</a>
						</li>
						<li class="{{ request()->routeIs('pages.about.mission-vision')?'active':'' }}">
							<a href="{{ route('pages.about.mission-vision') }}" >Our Mission and Vision</a>
						</li>
						<li class="{{ request()->routeIs('pages.about.our-values')?'active':'' }}">
							<a href="{{ route('pages.about.our-values') }}" >Our Values</a>
						</li>
						<li class="{{ request()->routeIs('pages.about.ceo-messages')?'active':'' }}">
							<a href="{{ route('pages.about.ceo-messages') }}">Message from the CEO</a>
						</li>
						<li class="{{ request()->routeIs('pages.about.leadership')?'active':'' }}">
							<a href="{{ route('pages.about.leadership') }}" >Leadership Team</a>
						</li>
						<li class="{{ request()->routeIs('pages.about.awards')?'active':'' }}">
							<a href="{{ route('pages.about.awards') }}">Awards</a>
						</li>
						<li class="{{ request()->routeIs('pages.about.our-story')?'active':'' }}">
							<a href="{{ route('pages.about.our-story')}}">Our Story</a>
						</li>
					</ul>
				</li>
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
						<li class="{{ request()->routeIs('pages.dealerlocator.northamerica')?'active':''}}">
							<a href="{{ route('pages.dealerlocator.northamerica') }}">Dealer Locator - North America</a>
						</li>
						<li class="{{ request()->routeIs('pages.dealerlocator.uk')?'active':'' }}">
							<a href="{{ route('pages.dealerlocator.uk') }}">Dealer Locator - UK/Europe</a>
						</li>
					</ul>
				</li>
				<li class="{{ request()->routeIs('pages.warranty.*')?'active':''}}" ><a href="#">Warranty</a>
					<ul>
						<li class="{{ request()->routeIs('pages.warranty.radarus')?'active':''}}" >
							<a href="{{ route('pages.warranty.radarus')}}" >Radar - North America</a>
						</li>
						<li class="{{ request()->routeIs('pages.warranty.radar')?'active':''}}" >
							<a href="{{ route('pages.warranty.radar')}}">Radar - Rest of the world</a>
						</li>
						<li class="{{ request()->routeIs('pages.warranty.patriotus')?'active':''}}" >
							<a href="{{ route('pages.warranty.patriotus')}}" >Patriot</a>
						</li>
						<li class="{{ request()->routeIs('pages.warranty.americantourerus')?'active':''}}" >
							<a href="{{ route('pages.warranty.americantourerus') }}">American Tourer</a>
						</li>
					</ul>
				</li>
				<li class="{{ request()->routeIs('pages.program.*')?'active':''}}" ><a href="#">Renegade Program</a>
					<ul>
						<li class="{{ request()->routeIs('pages.program.motorsport')?'active':''}}" >
							<a href="{{ route('pages.program.motorsport')}}">Motorsports</a>
						</li>
						<li class="{{ request()->routeIs('pages.program.golf')?'active':''}}" >
							<a href="{{ route('pages.program.golf')}}">Golf</a>
						</li>
					</ul>
				</li>
				<li class="{{ request()->routeIs('pages.responsibility.*')?'active':''}}" ><a href="#">Responsibility</a>
					<ul>
						<li class="{{ request()->routeIs('pages.responsibility.social')?'active':''}}" >
							<a href="{{ route('pages.responsibility.social')}}">Social</a>
						</li>
						<li class="{{ request()->routeIs('pages.responsibility.environmental')?'active':''}}" >
							<a href="{{ route('pages.responsibility.environmental')}}">Environmental</a>
						</li>
						<li class="{{ request()->routeIs('pages.responsibility.climatechange')?'active':''}}" >
							<a href="{{ route('pages.responsibility.climatechange')}}">Climate Change</a>
						</li>
					</ul>
				</li>
				<li class="{{ request()->routeIs('pages.mediacentre.*')?'active':''}}" ><a href="#">Media Centre</a>
					<ul>
						<li class="{{ request()->routeIs('pages.mediacentre.pressreleases')?'active':''}}" >
							<a href="{{ route('pages.mediacentre.pressreleases')}}">Press Releases</a>
						</li>
						<li class="{{ request()->routeIs('pages.mediacentre.mediacoverage')?'active':''}}" >
							<a href="{{ route('pages.mediacentre.mediacoverage')}}">Media Coverages</a>
						</li>
					</ul>
				</li>
				<li class="{{ request()->routeIs('pages.contact')?'active':''}}" >
					<a href="{{ route('pages.contact')}}">Contact Us</a> 
				</li>
			</ul>
		</nav>
	</div>

</div>