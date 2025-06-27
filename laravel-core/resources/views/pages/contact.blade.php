<x-guest-layout>
	<!-- Content
		============================================= -->
		<section id="content">

			<div class="section bg-white">
				<div class="container">
					<div class="heading-block center">
					<h2>Contact US</h2>
					</div>
				</div>
				<div class="container">
					<div class="grid">
						<div class="col-md-10">
							<p>
								If you are interested in distributing Radar Tires, looking for a dealer near you or have any other query you can contact us via the below form or you can write to us at <span style="white-space:nowrap;"><a class="blue" href="mailto:info@radartires.com">info@radartires.com</a></span> and we will get back to you as soon as we can.
							</p>
							<x-ContactusForm class="mt-2" />
						</div>
						<div class="col-md-2">
							@php 
								$caddress=[ 
										[
										'title'=>"UNITED STATES", 
										'address'=>"<b>Omnisource United, Inc</b><br> 3750 S. Watson Rd.,<br> Suite 100,<br> Arlington, TX 76014" ,
										'phone'=>" T: 800-725-1482 (Toll Free) " ,
										'workingHours'=>"Business Hrs: 0900 – 1800 (UTC-6/UTC-5 DST)<br>
										Monday – Friday" 
										]
										/*,[
										'title'=>"SINGAPORE (HQ)", 
										'address'=>"<b>Omni United (S) Pte Ltd</b><br>2 Central Boulevard, <br>#08-04A West Tower, <br>IOI Central Boulevard, <br>Singapore 018916" ,
										'phone'=>"T: +65 6423 1431 <br>F: +65 6423 0938" ,
										'workingHours'=>"Business Hrs: 0900 – 1800 (UTC+8)<br> Monday – Friday" 
										]*/
									];
							@endphp
							@foreach($caddress as $address)
								<x-contact-address 
									:title="$address['title']" 
									:address="$address['address']" 
									:phone="$address['phone']" 
									:workingHours="$address['workingHours']" 
									class="col-12 col-bleed-y " 
								/>
							@endforeach
						</div>

					</div>
				</div>
			</div>

		</section><!-- #content end -->
</x-guest-layout>

