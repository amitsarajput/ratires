<x-guest-layout>
<!-- Page Title
============================================= -->
<x-page-title image-url="{{ asset('images/awards-topbanner.jpg') }}" />

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">

		@php
		$awards=[
					[
					'year'=>'2018', 
					'title'=>'Super Golden Bull Award 2018', 
					'content'=>'The Super Golden Bull Award recognizes Singapore registered corporations who have recorded substantial growth over the last 3 years.', 
					'image'=>'images/awards/super-goldenbull.jpg'
					],
					[
					'year'=>'2018', 
					'title'=>'Felicitated by the Government of Madhya Pradesh, India for having done pioneering work in his professional field and for his achievements.', 
					'content'=>'GS Sareen, Founder and CEO of Omni United and a native of the state of Madhya Pradesh, India was felicitated by the Honourable Chief Minister Mr. Chouhan Shivraj for making the state proud with his achievements and contribution to global economy.', 
					'image'=>'images/awards/gs-sareen.jpg'
					],
					[
					'year'=>'2017', 
					'title'=>'Enterprise 50 (E50) Awards – 5 Year Award', 
					'content'=>'Awarded for being among the top 50 Singapore-based, privately-held companies for 5 consecutive years.', 
					'image'=>'images/awards/enterprise-2017.jpg'
					],
					[
					'year'=>'2017', 
					'title'=>'Enterprise 50 (E50) Awards', 
					'content'=>'This is awarded to Singapore-based, privately-held companies who have contributed to economic development in Singapore and abroad. Omni United was ranked 17th in 2017.', 
					'image'=>'images/awards/enterprise-2017.jpg'
					],
					[
					'year'=>'2016', 
					'title'=>'Enterprise 50 (E50) Awards', 
					'content'=>'This is awarded to Singapore-based, privately-held companies who have contributed to economic development in Singapore and abroad. Omni United was ranked 10th in 2016.', 
					'image'=>'images/awards/enterprise-2016.jpg'
					],
					[
					'year'=>'2016', 
					'title'=>'WGSN Futures Award in the category of Sustainable Design', 
					'content'=>'The WGSN Futures Awards recognize the businesses who have done the most to push the boundaries of the international fashion market and span 14 categories covering core segments of the industry: design, retail, marketing and digital.', 
					'image'=>'images/awards/wgsn.jpg'
					],
					[
					'year'=>'2015', 
					'title'=>'Enterprise 50 (E50) Awards', 
					'content'=>'This is awarded to Singapore-based, privately-held companies who have contributed to economic development in Singapore and abroad. Omni United was ranked 11th in 2015.', 
					'image'=>'images/awards/enterprise-2015.jpg'
					],
					[
					'year'=>'2015', 
					'title'=>'Ethical Corporation’s Sixth Annual Responsible Business Awards', 
					'content'=>'Timberland Tyres was highly commended in the “Sustainable Innovation” category for its sustainable Timberland Tyres.', 
					'image'=>'images/awards/ethical-corporation.jpg'
					],
					[
					'year'=>'2014', 
					'title'=>'Enterprise 50 (E50) Awards', 
					'content'=>'This is awarded to Singapore-based, privately-held companies who have contributed to economic development in Singapore and abroad. Omni United was ranked 13th in 2014.', 
					'image'=>'images/awards/enterprise-2014.jpg'
					],
					[
					'year'=>'2014', 
					'title'=>'The Peak 30/30: The Game Changers by Peak Magazine', 
					'content'=>'GS Sareen, Founder and CEO, Omni United was recognized as one of Singapore’s top 30 influential business leaders.', 
					'image'=>'images/awards/peak-magazine.jpg'
					],
					[
					'year'=>'2014', 
					'title'=>'Power List – 100 of Singapore Most Powerful by Prestige Magazine', 
					'content'=>'GS Sareen, Founder and CEO, Omni United was featured among the 100 headlining movers and shakers in Singapore. This award is presented to personalities who have taken their unusual ideas and made them their own, turning them into leaders of their own field.', 
					'image'=>'images/awards/power-list.jpg'
					],
					[
					'year'=>'2013', 
					'title'=>'Enterprise 50 (E50) Awards 2013', 
					'content'=>'This is awarded to Singapore-based, privately-held companies who have contributed to economic development in Singapore and abroad. Omni United was ranked 25th in 2013.', 
					'image'=>'images/awards/enterprise-2013.jpg'
					],
					[
					'year'=>'2013', 
					'title'=>'Distinguished Business Award by Promising SME 500', 
					'content'=>'GS Sareen, Founder and CEO, Omni United was presented this award for his exceptional achievements in business, highlighting his commercial success and contributions to the economy and community at large.', 
					'image'=>'images/awards/promising-sme-500.jpg']
				];
		
		//$awards=collect($awards);
		
		@endphp
		<div class="container">
			<div class="grid">
				<div class="col-md-12">
					<!-- Awards module -->
					<div class="awards">
						@foreach ($awards as $award)
						<x-award  :award="$award" />
							
						@endforeach
					</div>
				</div>
			</div>
		</div>

	</div>
</section><!-- #content end -->
</x-guest-layout>

