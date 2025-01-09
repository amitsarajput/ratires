<x-guest-layout>
	<!-- Page Title
		============================================= -->
		<BreezePageTitle imageUrl="images/golf-banner.jpg" />
		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				
				<div class="section">
					<div class="container">
						<div class="heading-block  center">
		    				<h2>Jodi Ewart Shadoff</h2>
		    			</div>
					</div>
	    			<div class="container">
	    				<BreezeQuote author="Jodi Ewart Shadoff, LPGA Golfer" content="I am so pleased to have Omni United and Radar Tyres support and sponsor me. I have always been impressed with the company’s approach to making the tyre world more accessible and exciting for women drivers, for example, supporting the Breast Cancer Research Foundation since 2011 and also being the world's first tyre brand to be declared Carbon Neutral in 2013." />
	    			</div>
	    			<div class="container">
						<div class="heading-block">
		    				<h3>Sponsorship with Radar Tyres</h3>
		    			</div>
		    			<p>Jodi Ewart Shadoff is a fast-rising star in the prestigious Ladies Professional Golf Association ranking of women golfers worldwide. She is a professional golfer since 2010 and qualified for the LPGA Tour in 2011. Radar Tyres signed her as its brand ambassador back in April 2016. Jodi wears the Radar Tyres logo on her golf shirt, golf bag and other apparel at all tournaments where she plays. Jodi has been representing Radar Tyres at all major global ladies golf championships in the US, Europe and APAC. She has also been actively supporting the Breast Cancer Research Foundation(BCRF) with Radar Tyres since 2016.</p>
	    			</div>
				</div>
				<div class="section bg-white">
	    			<div class="container">
						<div class="heading-block">
		    				<h3>Career Highlights</h3>
		    			</div>
		    			<p class="career-highlights">
		    				<BreezeGolfHighlight :highlights="highlights" />
		    			</p>
	    			</div>
				</div>
				<div class="section">
	    			<div class="container">
						<div class="heading-block">
		    				<h3>2021 Tournaments</h3>
		    			</div>
		    			<p class="tournaments">
		    				<BreezeGolfTournament :tournaments="tournaments" />
		    			</p>
	    			</div>
				</div>
				<div class="section bg-white">
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
		    			<p>The Renegade Program is about sharing our underdog spirit with drivers, athletes and sports persons across different fields. This program was launched in 2012 and it nurtures those who have world-class talent and a burning desire to achieve their ambitions but may be under represented in their fields. Through this program Radar Tyres provides a helping hand to those who dare to push the boundaries and undertake feats that others wouldn’t dare to think of.</p>
	    			</div>
				</div>
			</div>
		</section><!-- #content end -->
</x-guest-layout>