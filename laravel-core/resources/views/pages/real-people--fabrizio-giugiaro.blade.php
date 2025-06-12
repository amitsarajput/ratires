<x-guest-layout>
    @push('styles') 
        <style>@media screen and (max-width:767px){
            #page-title{
                    height: 200px!important;
            } 
            #page-title h2{ font-size: 20px;line-height: 1.2;}
        }</style>
    @endpush
    <!-- Page Title
    ============================================= -->
    <x-page-title image-url="{{ asset('images/banner--group-page.webp') }}" container="true" page-title="REAL PEOPLE, REAL PERFORMANCE<br>– THE EXPERTS BEHIND RADAR TIRES" class="page-title--bottom el-height-70 uppercase pb-3" />
    
    <!-- Content
    ============================================= -->
    <section id="content" class="pb-4">
        <div class="container">
            <div class="grid">
                <div class="col-md-12 col-bleed-y  mb-4">
                    <h3 class="no-top-margin dark-100 uppercase">{{ __("Shaping the future of tire design: Fabrizio Giugiaro and Radar Tires") }}</h3>
                    <p>{{ __("Meet Fabrizio Giugiaro, the visionary designer behind some of the world’s most iconic automotive creations and the founder of GFG Style. Now, he brings his expertise to Radar Tires, redefining what tire design means in terms of aesthetics, performance, and accessibility.") }}</p>
                </div>
            </div>
            
            <div class="grid grid-bleed align-center">
                <div class="col-md-6 col-sm-12 mb-4">
                        <img src="{{asset('images/Fabrizio.webp')}}" alt="">
                </div>
                <div class="col-md-6 col-sm-12 mb-4">
                    <div class="ma-xxs-2 ma-xs-2 ma-sm-2 ma-md-2 mx-lg-3">
                        <h3 class="dark-100  no-top-margin uppercase">{{ __("Design meets performance") }}</h3>
                        <p>{{ __("For over two years, GFG Style has collaborated with Radar Tires to create innovative tire designs across all categories—from high-performance sports tires to rugged off-road models and eco-friendly solutions. “Great design is not just about appearance; it must bring value and technology together,” Giugiaro explains. “The best results come from blending creativity with technical precision.”") }}</p>
                        <p>{{ __("At Radar Tires, this philosophy is embedded in every product. The design process is not just about style—it is about ensuring the tire enhances both function and performance without driving up costs.") }}</p>
                        <a class="knopf red heading-font sharp ls-1" href="https://youtu.be/oGc5hAfOeIA" target="_blank">{{ __("WATCH VIDEO") }}</a>
                        <!-- <h5 class="black">DIMAX SPORT | DIMAX SPRINT | DIMAX ALL SEASON | DIMAX WINTER</h5> -->
                    </div>
                </div>
            </div>
            <div class="grid">
                <div class="col-md-12">
                    <h4 class="dark-100 uppercase">{{ __("Inspired by function, driven by innovation") }}</h4>
                    <p>{{ __("When creating a new tire design, inspiration comes from various sources, but at the core, performance dictates form. “First, we look at the technical requirements—what the tire needs to achieve,” Giugiaro says. “Then, we integrate shapes and structures that enhance both aesthetics and function. Nature sometimes plays a role, but ultimately, it is about a perfect balance between engineering and creativity.”") }}</p>
                    <p>{{ __("This meticulous attention to detail ensures that Radar Tires are not only visually striking but also aerodynamically optimized, offering both efficiency and grip in demanding conditions.") }}</p>
                </div>
                <div class="col-md-12">
                    <h4 class="dark-100 uppercase">{{ __("Luxury without the price tag") }}</h4>
                    <p>{{ __("Radar Tires has a bold mission: to make premium tire design accessible to all. Giugiaro believes that high-end aesthetics should not be reserved for the few but should be part of everyday driving experiences. “By refining the shapes and surface details, we create tires that express luxury and performance without unnecessary cost,” he explains. “True innovation is about making great design available to everyone.”") }}</p>
                </div>
                <div class="col-md-12">
                    <h4 class="dark-100 uppercase">{{ __("A universal language of design") }}</h4>
                    <p>{{ __("With decades of global automotive design experience, Giugiaro understands how to craft a style that resonates across different markets. “A tire must be recognizable, distinctive, and appealing to all kinds of drivers,” he says. “The goal is to create a design language that is both unique and universally understood.”") }}</p>
                    <p>{{ __("The result? Radar Tires stand out with a strong visual identity—defined by sharp details, elegant proportions, and an unmistakable presence on the road.") }}</p>
                </div>
                <div class="col-md-12">
                    <h4 class="dark-100 uppercase">{{ __("The art and science of tire identity") }}</h4>
                    <p>{{ __("One of Giugiaro’s proudest achievements is the introduction of a consistent styling language across all Radar Tires. “We wanted to ensure that every Radar tire carries a recognizable design DNA,” he explains. “It’s about more than just a tread pattern—it’s about shaping an identity that communicates performance and sophistication.”") }}</p>
                    <p>{{ __("Among his favorite creations is the Renegade-X series, inspired by aeronautical design. “That was a breakthrough,” he notes. “It set the foundation for how we approach the rest of the Radar lineup, combining aerodynamics with bold aesthetics.”") }}</p>
                </div>
                <div class="col-md-12">
                    <h4 class="dark-100 uppercase">{{ __("The future of tire design") }}</h4>
                    <p>{{ __("As automotive design evolves, so must tires. “Vehicles are becoming more advanced, and tires need to keep up,” Giugiaro says. “Design is not just about beauty; it’s about integrating the tire seamlessly into the vehicle’s overall identity.”") }}</p>
                    <p>{{ __("Looking ahead, he sees tire design playing an even bigger role in defining a car’s character. “Tires will not just be functional components; they will be key visual and performance elements that enhance the entire driving experience.”") }}</p>
                </div>
                <div class="col-md-12">
                    <h4 class="dark-100 uppercase">{{ __("Democratizing premium design") }}</h4>
                    <p>{{ __("Radar Tires and GFG Style share a common mission: to make premium design accessible. “The challenge is to create something that is not just artistic, but also durable, smart, and universally desirable,” Giugiaro says. “We’ve developed a language that is sophisticated yet inclusive—something that every driver can appreciate.”") }}</p>
                </div>
                <div class="col-md-12">
                    <h4 class="dark-100 uppercase">{{ __("A legacy in the making") }}</h4>
                    <p>{{ __("The partnership between Radar Tires and GFG Style is just beginning. “This collaboration is about more than just designing tires,” Giugiaro concludes. “It’s about shaping the future—where performance, beauty, and accessibility go hand in hand.”") }}</p>
                    <p>{{ __("With Fabrizio Giugiaro leading the design vision, Radar Tires is setting a new standard in the industry, proving that great design isn’t just for the elite—it’s for everyone.") }}</p>
                </div>
            </div>
        </div>

    </section><!-- #content end -->
</x-guest-layout>