<x-guest-layout>
    <!-- Page Title
    ============================================= -->
    <x-page-title image-url="{{ asset('images/environment-responsibility--banner.webp') }}" container="true" page-title="" class="page-title--center el-height-70 uppercase mb-0" />
    
    <!-- Content
    ============================================= -->
    <section id="content" class="pb-4">
        <div class="section mb-4">
            <div class="container">
                <div class="grid">
                    <div class="col-md-12 col-bleed-y">
                        <h2 class="no-top-margin green uppercase center">Environmental Responsibility</h2>
                        <p class="text-lead center"><em> “ We cannot transform the world alone, but we want to demonstrate that if a company like ours can invest the time, effort and resources necessary to make a difference, then anyone can. ”</em></p>
                        <p class="center dark-50">G.S.Sareen, President and CEO, Omni United</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="grid">
                <div class="col-md-12 col-bleed-y">
                    <h3 class="no-top-margin dark-100 uppercase">Giving Back to the Environment</h3>
                    <p>We at Omni United always strive to deliver outstanding qualitative and innovative products to our consumers. Over the last decade we have grown and with that, so has the impact of our activities. It is our role to proactively engage and influence all functions along our value chain towards sustainable mobility. We are aware of the impact of our operations and our products on the environment and we aim to reduce their negative effect progressively in collaboration with our external partners.</p>
                </div>
                <div class="col-md-12 col-bleed-y mt-5">
                    <h3 class="no-top-margin dark-100 uppercase">MANUFACTURED CARBON NEUTRAL</h3>
                    <p>In 2012, we commissioned EY (Ernst & Young) to do an in-depth study on the impact of the production footprint of Radar, our flagship brand on the environment. EY examined and quantified the amount of greenhouse gases (primarily carbon dioxide) produced, from procuring raw materials to manufacturing, distribution, and energy used in the company’s offices and employees' travel. Based on the study recommendations, we undertook a number of changes to our business processes and actions geared to offset the carbon footprint, such as investing in projects ranging from reforestation to agroforestry. As a result, Radar Tyres became the first tyre brand to be manufactured carbon neutral by late 2013. From 2021, furthering our plan on Carbon neutrality, we became Carbon Neutral from cradle to grave for certain geographies and products while working with our overall Carbon management plan to remain Carbon Neutral till 2030 in line with requirements of PAS 2060. Ernst and Young has provided external limited assurance over this.</p>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="grid">
                <div class="col-md-12 col-bleed-y">
                    <h4 class="no-top-margin dark-100 uppercase t600">2023</h4>
                    <p class="t600">VIEW OUR ANNUAL QUALIFYING EXPLANATORY STATEMENT(QES) <br>
                    <a href="{{ asset('storage/colletrals/carbon-neutral-certificate/QES_2023.pdf') }}" download >Download</a></p>
                    <p class="t600">VIEW OUR CARBON-NEUTRAL CERTIFICATES <br>
                    <a href="{{ asset('storage/colletrals/carbon-neutral-certificate/Assurance_Statement_2023.pdf') }}" download >Download</a>
                    </p>
                </div>
                <div class="col-md-12 col-bleed-y mt-3">
                    <h4 class="no-top-margin dark-100 uppercase t600">2022</h4>
                    <p class="t600">VIEW OUR ANNUAL QUALIFYING EXPLANATORY STATEMENT(QES) <br>
                    <a href="{{ asset('storage/colletrals/carbon-neutral-certificate/QES-2022.pdf') }}" download >Download</a></p>
                    <p class="t600">VIEW OUR CARBON NEUTRAL CERTIFICATES <br>
                    <a href="{{ asset('storage/colletrals/carbon-neutral-certificate/Omni_GHG-2022.pdf') }}" download >Download</a></p>
                </div>
                <div class="col-md-12 col-bleed-y mt-3">
                    <h4 class="no-top-margin dark-100 uppercase t600">2021</h4>
                    <p class="t600">VIEW OUR ANNUAL QUALIFYING EXPLANATORY STATEMENT(QES) <br>
                    <a href="{{ asset('storage/colletrals/carbon-neutral-certificate/QES-2021.pdf') }}" download >Download</a></p>
                    <p class="t600">VIEW OUR CARBON NEUTRAL CERTIFICATES <br>
                    <a href="{{ asset('storage/colletrals/carbon-neutral-certificate/Omni_GHG-2021.pdf') }}" download >Download</a></p>
                </div>
            </div>
        </div>
        
          
        <div class="container">
            <hr class="mt-5 mb-5">
        </div> 

        <div class="container">
            <div class="grid">
                <div class="col-md-10 offset-md-1">
                    <h3 class="mt-0 mb-3 dark-100 uppercase center">Our Sustainability and Giving Back Philosophy</h3>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/51noIoC99xc?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div>
            </div>
        </div>

    </section><!-- #content end -->
    @push('scripts')  
        <script src="{{asset('js/jquery.fitvids.js')}}"></script>
        <script>
            $(document).ready(function(){
                $('iframe[src*="youtube"]').parent().fitVids();
            });
        </script>
@endpush
</x-guest-layout>

    
   


