<x-guest-layout>

    <!-- Page Title
    ============================================= -->
    <x-page-title image-url="{{ asset('images/why-radar-banner.jpg') }}" container="true" page-title="Radar Tyres<br>provides worldwide<br>proven safety and<br>performance" class="page-title--left el-height-60 uppercase" />
    

	<!-- Content
	============================================= -->
	<section id="content">

		<div class="content-wrap">
		
			<div class="section bg-white pt-0">

				<div class="fillter-bar ptlg">
					<div class="container clearfix">
						<div class="heading-block center mb-2">
							<h2 class="dark">Dealer Locator</h2>
						</div>
						<x-dealer-locator-widget />
					</div>
				</div>				
			</div>

			<div class="section">
				<div class="container clearfix">
					<div class="heading-block center">
						<h3 class="dark">Buy Radar Tyres Online</h3>
					</div>					
					<div class="mx-auto" style="max-width: 880px;">
						<div class="retailers clearfix">
							<div class="retailer">
								<a target="_blank" href="https://www.edentyres.com/radar-tyres/">
										<img class="lozad" src="{{ asset('images/retailerslogo/eden-tyres-servicing.webp') }}" alt="" width="250">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="section bg-white">
				<div class="container clearfix">
					<div class="heading-block center">
						<h3 class="dark">Still Can’t Find Us?</h3>
					</div>
					
					<form name="dealerform" class="omniform" action="{{ url('dealerlocatorform/submit') }}" id="dealerform" method="POST">					
						<div class="grid clearfix">
							<div class="col-md-12">
								<p class="form-text">
									If you still can’t find a dealer near you or if you may need any additional information from us on sizes, specifications, warranties or anything else, please get in touch with us via the below form and we will get back to you as soon as we can. 
								</p>
							</div>
							<div class="col-md-4">
								<input type="text" id="name" name="name" placeholder="Name*" value="" class="sm-form-control required">
							</div>
							<div class="col-md-4">
								<input type="email" id="email" name="email" placeholder="Email*" value="" class="sm-form-control email required">
							</div>
							<div class="col-md-4">
								<input type="text" id="location" name="location" placeholder="Location*" value="" class="sm-form-control required">
							</div>
							<div class="hidden">
								<input type="hidden" id="current_page" name="current_page" value="">
								<input type="text" id="g-recaptcha" name="g-recaptcha" value="" />
								<input type="text" id="g-recaptcha-action" name="g-recaptcha-action" value="" />
							</div>
							<div class="col-md-12">
								<textarea class="required sm-form-control" id="message" name="message" placeholder="Message" rows="6" ></textarea>
							</div>
							<div class="col-md-12">
								<button class="knopf uppercase sharp red hover-black-80 heading-font" type="submit" id="submit" name="submit" value="submit">Submit</button><br>
								<small class="font-sm">*Required Fields</small>
							</div>
							
							<div class="result"></div>
							<div class="error"></div>
						</div>
					</form>

				</div>
			</div>

			<div class="section" >
				<div class="container">
					<div class="grid">
						<div class="col-lg-6 offset-lg-3">
							<div class="heading-block center">
								<h3 class="dark">View our Product Range</h3>
							</div>
							<x-image-box-two  title="" image="{{asset('images/RT_plus-R8_plus-RPX800-Banner.webp')}}" url="" />
						</div>
					</div>
				</div>
			</div>
			
		</div><!-- content-wrap end -->

	</section><!-- content end-->

    @push('scripts')  
    <!-- Swiper JS -->
    <script src="{{asset('js/swiper/swiper-bundle.js')}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    
    <script type="text/javascript">
        $( function() {
            $( "#tabs" ).tabs();
        } );
        const swiper = new Swiper('.swiper', {
            loop: true,
            autoplay: {
                delay: 5000,
            },

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },
        });
    </script>
    @endpush
	
</x-guest-layout>