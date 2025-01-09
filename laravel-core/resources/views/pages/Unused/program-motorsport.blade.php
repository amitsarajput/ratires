<x-guest-layout>
	<!-- Page Title
		============================================= -->
		<BreezePageTitle imageUrl="images/motorsports-banner.jpg" />

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				
				<div class="section">
					<div class="container">
						<div class="heading-block  center">
		    				<h2>Radar Motorsport </h2>
		    			</div>
					</div>
	    			<div class="container">
	    				<BreezeQuote author="G.S.Sareen, President and CEO, Omni United " content="Radar Tire’s continued success against some of the top tier tire brands in the world, further reassures the quality and brand commitment to our customers, reinforcing our promise to provide robust products at a reasonable price point. " />
	    			</div>
	    			<div class="container">
						<div class="heading-block">
		    				<h3>Sponsorship with Radar Tyres</h3>
		    			</div>
		    			<p>Radar Tires entered the world of Motorsport back in 2013 with its first set of tires that were designed for extreme off-road desert racing. Within its first year of competition the team won an inaugural Baja 500 race and in just a few seasons, Radar Tires became a quality-demanded product in desert and short course racing</p>
		    			<p>Over the years Radar Tires has had multiple wins with its Renegade series of tires and has expanded its program to include sponsored participation with a variety of Renegade series products in multiple desert and short course series and classes. </p>
	    			</div>
				</div>
				<div class="section bg-white">
	    			<div class="container">
						<div class="heading-block">
		    				<h3>2021 Race Calendar</h3>
		    			</div>
		    			<p class="races">
		    				<BreezeRaceCalender :races="races" />
		    			</p>
	    			</div>
				</div>
				<div class="section">
	    			<div class="container">
						<div class="heading-block">
		    				<h3>Race Wins</h3>
		    			</div>
		    			<p class="racewins">
		    				<BreezeRaceWins :wins="wins" />
		    			</p>
	    			</div>
				</div>
				<div class="section bg-white">
	    			<div class="container">
						<div class="heading-block">
		    				<h3>Racing Tires</h3>
		    			</div>
	    			</div>
				</div>
				<div class="section">
	    			<div class="container">
						<div class="heading-block">
		    				<h3>Gallery</h3>
		    			</div>
		    			<p>
		    			<BreezeFlexSlider :classname="'timelineslider'"  :animation="slide" :thumbs="true" :arrows="ture" :speed="1200" :pause="8000"  :slides="slides" :pagination="false"  />
		    			</p>
	    			</div>
				</div>
				<div class="section bg-white">
	    			<div class="container">
						<div class="heading-block">
		    				<h3>Renegade Program</h3>
		    			</div>
		    			<p>The Renegade Program is about sharing our underdog spirit with drivers, athletes and sports persons across different fields. This program was launched in 2012 and it nurtures those who have world-class talent and a burning desire to achieve their ambitions but may be under represented in their fields. Through this program Radar Tires provides a helping hand to those who dare to push the boundaries and undertake feats that others wouldn’t dare to think of.</p>
	    			</div>
				</div>
			</div>
		</section><!-- #content end -->
</x-guest-layout>