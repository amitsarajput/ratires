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
						<div class="col-md-8">
							<p>
								If you are interested in distributing Radar Tyres, looking for a dealer near you or have any other query you can contact us via the below form or you can write to us at <span style="white-space:nowrap;"><a class="blue" href="mailto:info@omni-united.com">info@omni-united.com</a></span> and we will get back to you as soon as we can.
							</p>
							<x-ContactusForm class="mt-2" />
						</div>
						<div class="col-md-4">
							@php 
								$caddress=[ [
									'title'=>"SINGAPORE (HQ)", 
									'address'=>"<b>Omni United (S) Pte Ltd</b><br> 4 Shenton Way<br> #08-02 SGX Centre II<br> Singapore - 068807" ,
									'phone'=>"T: +65 6423 1431 <br>F: +65 6423 0938" ,
									'workingHours'=>"Business Hrs: 0900 – 1800 (UTC+8)<br> Monday – Friday" 
									]
									/*,[
									'title'=>"UNITED STATES", 
									'address'=>"<b>Omni United USA, Inc</b><br> 3750 S. Watson Rd.,<br> Suite 100,<br> Arlington, TX 76014" ,
									'phone'=>" T: 800-725-1482 (Toll Free) " ,
									'workingHours'=>"Business Hrs: 0900 – 1800 (UTC-5)<br>
									Monday – Friday" 
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

