<x-guest-layout>
	<!-- Content
		============================================= -->
		<section id="content">
			<div class="container">
				<div class="heading-block center">
	              <h2>Press Releases</h2>
	            </div>
	        </div>

			<div class="section bg-white">
				<div class="container">
					<div class="media-posts-wrapper">
						<div class="media-posts">
							<div class="media-posts-data">
								<BreezePressReleasePost :posts="posts" />
							</div>
							<BreezePagination :links="posts.links" />
						</div>

						<BreezeMediaSidebar />

					</div>
				</div>
			</div>

		</section><!-- #content end -->
</x-guest-layout>

