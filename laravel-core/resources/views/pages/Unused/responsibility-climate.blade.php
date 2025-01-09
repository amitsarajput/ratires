<x-guest-layout>
	<!-- Page Title
		============================================= -->
		<BreezePageTitle imageUrl="images/climate-change-banner.jpg" pageTitle="#CLIMATECHANGE"/>
		<!-- Content
		============================================= -->
		<section id="content">
				
				<div class="section">
					<div class="container">
						<div class="heading-block  center">
		    				<h2>CLIMATE CHANGE</h2>
		    			</div>
		    			<p>Climate change continues to impact all regions of the world and all segments of society. Right from shifting weather patterns that threaten food production, to rising sea levels that increase the risk of catastrophic flooding, to the recent forest fires in Australia and California, hurricanes in the US, the impacts of climate change are global in scope and unprecedented in scale. These catastrophic events not only threaten the global economy but also cause severe damage to property and loss of life. If we don't take drastic action today, adapting to these impacts in the future will be more difficult and costly to both the present and future generations. Omni United is committed and doing its part to help save the world’s climate for today’s and tomorrow’s generations.</p>
		    			<p>Our commitment to climate change dates back to 2012 when we first engaged EY(Ernst & Young) to conduct a twelve-month assessment on Radar Tyres’ total greenhouse gas emissions between April 2011 and March 2012. EY’s study involved a rigorous and independent assessment that examined and quantified the amount of greenhouse gases (primarily carbon dioxide) produced from procuring raw materials to manufacturing, distribution, and energy used in the company’s offices and employees' travel. Based on the study recommendations, we undertook a number of changes to our business processes and actions geared to offset the carbon footprint, such as investing in projects that removed or reduced carbon dioxide from the environment. As a result, Radar Tyres became the first tyre brand to be 100% carbon neutral by late 2013 and we have maintained this certification to date.</p>
		    			<p>Our work continues in this direction and we are currently defining new sustainability goals in line with the UNGC’s Sustainable Development Goals (SDGs) for beyond 2021. The goals will be inclusive of the entire value chain right from raw material technology and procurement to the end of tyre life. We aim to make a positive impact across each of these stages in our value chain.</p>
					</div>
				</div>
				<div class="section bg-white">
					<div class="container">
						<div class="heading-block center">
		    				<h2>NEWS</h2>
		    			</div>

		    			<BreezeClimatePosts :posts="posts" />
						
						<BreezePagination v-if="posts.links.length > 3" :links="posts.links" />
					</div>
				</div>
				
		</section><!-- #content end -->
</x-guest-layout>