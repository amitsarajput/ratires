<x-guest-layout>
    <div class="mx-auto vid-parent" >
        <div class="video-wrap ">
            <video id="" poster="{{ asset('images/landing-pages/premium/OMNI -Landing-Page-Hero-1.webp') }}" preload="auto" autoplay muted loop  >
                <source src="{{ asset('images/landing-pages/premium/videos/radartire-video-1.mp4') }}" type='video/mp4' />
                <source src="{{ asset('images/landing-pages/premium/videos/radartire-video-1.webm') }}" type='video/webm' />
                <source src="{{ asset('images/landing-pages/premium/videos/radartire-video-1.ogv') }}" type="video/ogg" />
            </video>
            <div class="video-overlay" style="background-color: rgba(0,0,0,0);"></div>
        </div>
    </div>
<!-- Content
    ============================================= -->
    <section id="content">
        <div class="nogimmick-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="large-heading">
                            <div class="large-heading--text">THE PREMIUM COLLECTION</div>
                            <div class="large-heading--sub-text">Tested against the leading established premium brands, consistently matching or beating them.</div>
                        </div>

                        <div class="text-content">
                            <div class="section-title">
                                <!--<div class="section-title--heading">the one-stop-shop</div>-->
                                <div class="section-title--text">
                                    <p class="white center">The Radar Premium Collection has been designed and engineered to rival leading established brands in safety, handling, durability, noise and more. This makes our products perform just like any other premium brand, thus rightfully earning the tag of "Premium" but without the hefty price that established brands often charge.</p>
                                    <p class="white center">Say goodbye to paying a premium for a name and discover the unbeatable value of the Radar Premium Collection.</p>
                                    <!--p>At Radar Tires, we're not satisfied until your customers are happy. That's why we leverage advanced technology, best-in-class engineering and top-quality materials to create 2,000 sizes of premium tires globally that offer superior handling, extended tread life and increased fuel efficiency - all for a fraction of the cost of other premium tire brands.</p--> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="icons-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="icons-widget">
                            <div class="text-content center">
                                <div class="section-title">
                                    <div class="section-title--heading">sized for all your needs</div>
                                </div>
                            </div>
                            <div class="icons">
                                <div class="icon">
                                    <div class="icon--image">
                                        <img src="{{ asset('images/landing-pages/premium/Icon_Car.webp') }}" alt="">
                                    </div>
                                    <div class="icon--heading">CAR / CUV / SUV</div>
                                    <div class="icon--decsription">11 MODELS - 230 SIZES</div>
                                </div>
                                <div class="icon">
                                    <div class="icon--image">
                                        <img src="{{ asset('images/landing-pages/premium/Icon_SUV.webp') }}" alt="">
                                    </div>
                                    <div class="icon--heading">SUV / LIGHT TRUCK</div>
                                    <div class="icon--decsription">6 MODELS - 211 SIZES</div>
                                </div>
                                <div class="icon">
                                    <div class="icon--image">
                                        <img src="{{ asset('images/landing-pages/premium/Icon_Van.webp') }}" alt="">
                                    </div>
                                    <div class="icon--heading">VAN / TRAILER</div>
                                    <div class="icon--decsription">1 MODEL – 7 SIZES</div>
                                </div>
                                <div class="icon">
                                    <div class="icon--image">
                                        <img src="{{ asset('images/landing-pages/premium/Icon_Truck.webp') }}" alt="">
                                    </div>
                                    <div class="icon--heading">TRUCK / BUS RADIALS</div>
                                    <div class="icon--decsription">8 MODELS - 27 SIZES</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div id="cta-red" class="section-red">
            <div class="container">
                <div class="row flex-columns">
                    <div class="flex-col text">tell us which sizes you need</div>
                    <div class="flex-col"><a href="#contact-section" class="button-white-text-black">contact us</a></div>
                </div>
            </div>
        </div>

        <div id="floating-button" class="fixed top right">
            <a href="#contact-section" class="contact-button">CONTACT US</a>
        </div>
    
        <div id="driving-section" class="section-two-col">
            <div class="container">
                <div class="row flex-columns">
                    <div class="flex-col image"><img src='{{ asset("images/landing-pages/premium/DrivingFutureSection_Tire.webp") }}' /></div>
                    <div class="flex-col text">
                        <div class="section-title">
                            <div class="section-title--heading">DRIVING THE FUTURE OF THE INDUSTRY</div>
                            <div class="section-title--text">
                                We have an unrelenting passion to improve the quality of drivers' time on the road, so we invest in cutting-edge R&D and work with legendary Italian designer Giorgetto Guigiaro of GFG Style - awarded Designer of the Century for his iconic automotive designs including the Maserati, Lotus Esprit, DeLorean, Aston Martin, BMW, Bugatti, Ferrari, Lotus and many more iconic vehicles.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div id="engineering-section" class="section-two-col">
            <div class="container">
                <div class="row flex-columns">
                    <div class="flex-col text">
                        <div class="section-title">
                            <div class="section-title--heading">ENGINEERING FOR PERFORMANCE</div>
                            <div class="section-title--text">We will not rest until we've given every customer the very best, so Radar Tires are perfectly crafted and rigorously tested to meet or beat other premium tires in term of grip, handling, noise, stopping distance and fuel efficiency.
                            </div>
                            <div class="section-title--text">See what our customers are saying about our products. <br>
                            <a href="{{ safeRoute('home') }}" class="red-button--full">Click here</a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="flex-col image"><img src='{{ asset("images/landing-pages/premium/Icon_Stars.webp") }}' /></div>
                </div>
            </div>
        </div>
    
        <div id="quality-section" class="section-two-col">
            <div class="flex-columns">
                <div class="flex-col image"><img src="{{ asset('images/landing-pages/premium/QualitySection_Tire.webp') }}" /></div>
                <div class="flex-col text">
                        <div class="section-title">
                            <div class="section-title--heading">QUALITY YOU<br>CAN COUNT ON</div>
                            <div class="section-title--text">
                        You need partners who bring you repeat business, not repeat headaches. That’s why Radar Tires feature reinforced sidewalls, special tread compounds and lateral ties for even wear and extended tread life - all backed by our comprehensive warranty offering – The Radar Protect Program.
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        
        <div id="fitting-seciton" class="section-two-col">
            <div class="container">
                <div class="flex-columns">
                    <div class="flex-col text">
                        <div class="section-title">
                            <div class="section-title--heading">FITTING EVERY DRIVER</div>
                            <div class="section-title--text">
                        We know you have better things to do than manage multiple suppliers, so we give you everything you need right here. We offer 2,000 tire sizes globally to support all types of vehicles in nearly any type of terrain.
                        </div>
                        </div>
                    </div>
                    <div class="flex-col image"><img src='{{ asset("images/landing-pages/premium/FittingEveryDriver_Tire.webp") }}' /></div>
                </div>
            </div>
        </div>
        
        <div id="protecting-section" class="section-two-col">
            <div class="container">
                <div class="row flex-columns">
                    <div class="flex-col image"><img src='{{ asset("images/landing-pages/premium/Icon_CO2.webp") }}' /></div>
                    <div class="flex-col text">
                        <div class="section-title">
                            <div class="section-title--heading">PROTECTING OUR FUTURE</div>
                            <div class="section-title--text">
                        We don’t just envision a bright future for the world ahead, we’re committed to making it happen. That’s why we were the first in the industry to have a “manufactured carbon neutral” tire brand back in 2013, and we continue to invest in sustainable practices and more.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="partnering-seciton" class="section-red">
            <div class="container">
                <div class="row flex-columns">
                    <div class="flex-col text--heading">PARTNERING<br>FOR SUCCESS</div>
                    <div class="flex-col text--body">We’re here to set you up for success with sales tools and point of purchase materials, front and back of house employee training, incentives and dedicated support for your entire team, so you have what you need to confidently help every customer, every time.</div>
                </div>
            </div>
        </div>
        
        <div id="contact-section" class="section-col">
            <div class="container">
                <div class="flex-columns">
                    <div class="flex-col">
                        <div class="section-title extrafont x-large underline">
                            <div class="section-title--heading">contact us</div>
                        </div>
                    </div>
                    <div class="flex-col flex-col--full">
                        <div class="row clearfix">
                        <div class="col-12 offset-0 col-sm-10 offset-sm-1">
                            <x-forms.premium-form class="" />
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section><!-- #content end -->
    @push('styles')
    <style>

        /* COMMON STYLES */
        /*  section-title  */
        .section-title{
            font-family: 'Montserrat', sans-serif;
            line-height: 1.3;
        }
        .section-title--heading{
            font-weight:800;
            font-size:25px;
            text-transform:uppercase;
        }
        .section-title--text{
            font-weight:400;
            font-size:18px;
            margin-top: 20px;
        }
        
        .section-title--text p{
            margin-bottom: 15px;
            line-height: 1.3 !important;
            text-align: center !important;
        }
        
        .section-title--text p:last-child{
            margin-bottom: 0;
        }
        
        .red-button--full{
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 10px 20px;
            margin-top: 25px;
            background-color: #DA2224;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
        }
        .section-title.extrafont .section-title--heading{
            font-family: 'Gobold High Bold'!important;
            font-weight: 400;
            font-style: normal;
            color: #fff;
        }
        .section-title.x-large .section-title--heading{
            font-size:130px;
        }
        .section-title.underline .section-title--heading:after{
            content: " ";
            margin-top: 30px;
            margin-bottom: 50px;
            width: 100px;
            height: 2px;
            background-color: #DA2224;
            display: block;
            left: 50%;
            position: relative;
            transform: translateX(-50%);
        }
        /*  flex-section  */
        .flex-columns{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            flex-wrap: wrap;
        }
                
        /* COMMON STYLES */
        
        /* Video section */
        .vid-parent {
            position: relative;
            width: 100%;
            background-color: #000;
            overflow: hidden;
            .video-wrap{
                max-width: 1000px;
                margin: 0 auto;
                video{
                    width: 100%;
                }
            }
        }
        /*nogimmick SECTION*/
        .nogimmick-section, .top-banner,.icons-section{
            background-color: #000000;
            color: #fff;
        }
        .large-heading{
            text-align: center;
        }
        .large-heading:after{
            content: " ";
            margin-top: 30px;
            margin-bottom: 50px;
            width: 166px;
            height: 3px;
            background-color: #DA2224;
            display: block;
            left: 50%;
            position: relative;
            transform: translateX(-50%);
        }
        /*.large-heading .large-heading--text{
            font-family: 'Gobold High Bold' !important;
            font-size: 235px;
            font-weight: 400;
            font-style: normal;
            color: #DA2224;
            line-height: 1.2;
        }*/
        .large-heading .large-heading--text{
            font-family: 'Gobold High Bold' !important;
            font-size: 155px;
            font-weight: 400;
            font-style: normal;
            color: #DA2224;
            line-height: 1.2;
        }
        .large-heading .large-heading--sub-text{
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 18px;
            text-transform: uppercase;
            line-height: 1.2;
            letter-spacing: 5px;
        }
        .nogimmick-section{
            margin-top:0;
        }
        @media screen and (max-width:767px) {
            .large-heading .large-heading--text {font-size: 85px;}
            .large-heading .large-heading--sub-text {  font-size: 12px; letter-spacing: 3px; }
            
            .nogimmick-section{
                margin-top:-10px;
            }
        }
        @media (min-width: 768px) and (max-width: 991.98px){
            .large-heading .large-heading--text {font-size: 190px;}
            .large-heading .large-heading--sub-text {  font-size: 14px; letter-spacing: 2px; }
        }

    /* 
    ICON SECTION
    */
        .icons-section{
            background-color: #000;
        }
        .icons-section .icons-widget{
            padding: 60px 0;
            margin:60px 0;
            border-top:3px solid #DA2224;
            border-bottom:3px solid #DA2224;
        }
        .icons-section .icons{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin:25px -20px 0;
        }
        .icons-section .icons .icon{
            font-family: 'Montserrat', sans-serif !important;
            line-height: 1.3;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            border-right:3px solid #DA2224;
            width: 19%;
            margin: 0 10px;
            padding: 0 10px;
            text-align:center;
        }
        .icons-section .icons .icon .icon--heading,
        .icons-section .icons .icon .icon--decsription 
        {font-family: 'Montserrat', sans-serif !important;}
        .icons-section .icons .icon:last-child{
            border-right:none;
        }
        .icons-section .icons .icon .icon--image{
            max-width: 160px;
            margin-bottom:10px;
        }
        .icons-section .icons .icon .icon--heading{
            font-size: 15px;
            font-weight: 600;
        }
        .icons-section .icons .icon .icon--decsription{
            font-size: 15px;
            font-weight: 300;
        }
        @media screen and (max-width:768px) {
            .icons-section .icons{margin-top:40px;}
            .icons-section .icons .icon{
                width: 40%;
            }
            .icons-section .icons .icon:nth-child(2n){
                border-right:none;
            }
            .icons-section .icons .icon:nth-child(1){
                margin-bottom:25px;
            }
            .icons-section .icons .icon:nth-child(2){
                margin-bottom:25px;
            }
        }
        @media screen and (max-width:510px) {
            .icons-section .icons .icon{
                width: 90%;
            }
            .icons-section .icons .icon:nth-child(n){
                border-right:none;
                margin-bottom: 35px;
            }
            .icons-section .icons .icon:nth-child(4){
                margin-bottom:0;
            }
        }
    /* 
    ICON SECTION
    */

    /* CTA SECTION RED */
        #cta-red.section-red{
            background-color: #DA2224;
            padding: 15px 0;
            color: #fff;
            text-transform:uppercase;
        }

        #cta-red.section-red .flex-columns .flex-col{
            margin-right:15px;
        }
        #cta-red.section-red .flex-columns .flex-col:last-child{
            margin-right:0;
        }
        #cta-red.section-red .button-white-text-black{
            display: inline-block;
            padding: 8px 15px;
            background-color:#fff;
            color:#000;
            font-family: 'Montserrat', sans-serif;
            font-weight:800;
            font-size:25px;
        }
        #cta-red.section-red .text{
            font-family: 'Montserrat', sans-serif;
            font-weight:800;
            font-size:25px;
        }
        @media screen and (max-width:768px) {
            
        }
        @media screen and (max-width:510px) {
            #cta-red.section-red { padding: 30px 0; }
            #cta-red.section-red .flex-columns{ flex-direction: column; }
            #cta-red.section-red .flex-columns .flex-col { margin-right: 15px;  margin-left: 15px; text-align: center;  line-height: 1.3; margin-bottom: 10px; }
            #cta-red.section-red .flex-columns .flex-col:last-child {margin-bottom: 0; }
        }
    /* CTA SECTION RED */


    /*FLOATING BUTTON*/

        #floating-button.fixed{
            position:fixed;
            z-index:1;
        }
        #floating-button.top{
            top: 190px;
        }
        
        #floating-button.right{
            right: 30px;
        }
        #floating-button a.contact-button{
            font-family: 'Montserrat', sans-serif;
            font-weight:600;
            display: inline-block;
            background-color: #000;
            border: solid 3px #DA2224;
            text-transform: uppercase;
            padding: 12px 15px;
            color: white;
            font-weight: 600;
            font-size: 18px;
        }
        
        @media screen and (max-width:510px) {
            #floating-button{ display: none;}
            #floating-button.top{ top: 90px; }
            #floating-button a.contact-button { padding: 8px 12px; font-size: 16px; }
        }
        
    /*FLOATING BUTTON*/
    /*DRIVING SECITON*/
        #driving-section.section-two-col{
            background-color: #000;
            padding: 55px 0 0;
            color: #fff;
        } 

        #driving-section.section-two-col .flex-columns .flex-col{
            width:auto;
            padding-right:60px;
        }
        #driving-section.section-two-col .flex-columns .flex-col:last-child{
            margin-right:0;
        }
        #driving-section.section-two-col .image{
            display: block;
            max-width:60%;
        }
        #driving-section.section-two-col .text{
            display: block;
            max-width:40%;
        }
        #driving-section.section-two-col .image img{
            max-width:100%;
        }
        @media screen and (max-width:768px) {
        #driving-section.section-two-col { padding: 60px 0 60px; }
        #driving-section.section-two-col .flex-columns {  flex-direction: column; flex-wrap: wrap; } 
        #driving-section.section-two-col .flex-columns .flex-col { max-width: 70%;padding-right: 0;margin-bottom: 35px; text-align: center; }
        #driving-section.section-two-col .flex-columns .flex-col:last-child { margin-bottom: 0; }
        }
        @media screen and (max-width:510px) {
        #driving-section.section-two-col { padding: 40px 0; }
        }
    /*DRIVING SECITON*/
    /*ENGINEERING SECTION*/
        #engineering-section.section-two-col{
            background-color: #333333;
            padding: 152px 0;
            color: #fff;
        }
        #engineering-section.section-two-col .flex-columns{
            margin-left:-30px;
            margin-right:-30px;
        }
        #engineering-section.section-two-col .flex-columns .flex-col{
            max-width:50%;
            width:auto;
            margin-left:30px;
            margin-right:30px;
        }
        #engineering-section.section-two-col .image{
            display: block;
            max-width:50%;
        }
        #engineering-section.section-two-col .image img{
            max-width:100%;
        }
        #engineering-section.section-two-col .text{
            font-family: 'Montserrat', sans-serif;
            line-height: 1.3;
            padding-right: 60px;
        }
        @media screen and (max-width:768px) {
        #engineering-section.section-two-col { padding: 60px 0 60px; }
        #engineering-section.section-two-col .flex-columns {  flex-direction: column-reverse; flex-wrap: wrap; } 
        #engineering-section.section-two-col .flex-columns .flex-col { max-width: 70%;padding-right: 0;margin-bottom: 35px; text-align: center; }
        #engineering-section.section-two-col .flex-columns .flex-col:first-child { margin-bottom: 0; }
        }
        @media screen and (max-width:510px) {
        #engineering-section.section-two-col { padding: 40px 0; }
        }
    /*ENGINEERING SECTION*/
    /*QUALITY SECITON*/
        #quality-section.section-two-col{
            background-color: #000;
            padding: 80px 0 0;
            color: #fff;
        }
        #quality-section.section-two-col .flex-columns .flex-col{
            max-width:50%;
            width:auto;
        }
        #quality-section.section-two-col .image{
            display: block;
            max-width:50%;
        }
        #quality-section.section-two-col .image img{
            max-width:100%;
        }
        #quality-section.section-two-col .text{
            width: 35% !important;
            margin-right: 15%;
        }
        @media screen and (max-width:768px) {
        #quality-section.section-two-col { padding: 60px 0 0; }
        #quality-section.section-two-col .flex-columns {  flex-direction: column-reverse; flex-wrap: wrap; } 
        #quality-section.section-two-col .flex-columns .flex-col { max-width: 100%;padding-right: 0;margin-bottom: 0;margin-bottom: 35px; text-align: center; }
        #quality-section.section-two-col .flex-columns .text { max-width: 70%;width:70%!important; margin-right:30px; margin-left: 30px; text-align: center; }
        #quality-section.section-two-col .flex-columns .flex-col:first-child { margin-bottom: 0; }
        }
        @media screen and (max-width:510px) {
        #quality-section.section-two-col { padding: 40px 0 0; }
        }
    /*QUALITY SECITON*/
    /*FITTING SECTION*/
        #fitting-seciton.section-two-col{
            background-color: #333333;
            padding: 0;
            color: #fff;
        }
        
        #fitting-seciton.section-two-col .flex-columns .flex-col{
            max-width: 50%;
            width: auto;
            padding-right:60px;
        }
        
        #fitting-seciton.section-two-col .flex-columns .flex-col:last-child{
            padding-right:0;
        }
        
        #fitting-seciton.section-two-col .image img{
            max-width:100%;
        }
        @media screen and (max-width:768px) {
            #fitting-seciton.section-two-col { padding: 60px 0 0; }
            #fitting-seciton.section-two-col .flex-columns {  flex-direction: column; flex-wrap: wrap; } 
            #fitting-seciton.section-two-col .flex-columns .flex-col { max-width: 70%;padding-right: 0;}
            #fitting-seciton.section-two-col .flex-columns .text { text-align:center; }
        }
        @media screen and (max-width:510px) {
        #fitting-seciton.section-two-col { padding: 40px 0 0; }
        }
    /*FITTING SECTION*/
    /*PROTECTING SECTION*/
        #protecting-section.section-two-col{
            background-color: #000;
            padding: 189px 0;
            color: #fff;
        }
        #protecting-section.section-two-col .flex-columns .flex-col{
            max-width:50%;
            width:auto;
            padding-right:60px;
        }
        #protecting-section.section-two-col .flex-columns .flex-col:last-child{
            padding-left: 30px;
            padding-right:0;
        }
        #protecting-section.section-two-col .image{
            display: block;
            max-width:50%;
        }
        #protecting-section.section-two-col .image img{
            max-width:100%;
        }
        @media screen and (max-width:768px) {
            #protecting-section.section-two-col { padding: 60px 0; }
            #protecting-section.section-two-col .flex-columns {  flex-direction: column; flex-wrap: wrap; } 
            #protecting-section.section-two-col .flex-columns .flex-col { max-width: 70%; padding: 0;margin-bottom: 35px; padding-right:0;}
            #protecting-section.section-two-col .flex-columns .flex-col:last-child { margin-bottom: 0;}
            #protecting-section.section-two-col .flex-columns .text { text-align:center; }
        }
        @media screen and (max-width:510px) {
        #protecting-section.section-two-col { padding: 40px 0; }
        }
    /*PROTECTING SECTION*/
    /*CONTACT-SECTION*/
        #contact-section.section-col{
            background-color: #000000;
            padding: 100px 0 80px;
            color: #fff;
        }
        #contact-section.section-col .flex-columns{
            margin-left:-30px;
            margin-right:-30px;
        }
        #contact-section.section-col .flex-columns .flex-col{
            max-width:50%;
            width:auto;
            margin-left:30px;
            margin-right:30px;
        }
        #contact-section.section-col .flex-columns .flex-col.flex-col--full{
            max-width:100%;
            width:auto;}

        
        #contact-section.section-col form{
            font-family: 'Montserrat', sans-serif;
            line-height: 1.3;
            text-align:center;
        }
        
        #contact-section.section-col form .formfooter .col-7 {
        padding-top: 16px;
        }
        #contact-section.section-col form .formfooter .col-5 {
        justify-content: flex-end;
        display: flex;
        }

        
        #contact-section.section-col form input,
        #contact-section.section-col form textarea,
        #contact-section.section-col form label
        {
            font-weight:600;
        }
        #contact-section.section-col form input,
        #contact-section.section-col form textarea{
            color:#000;
        }
        #contact-section.section-col form label
        {
            color:white;
        }
        #contact-section.section-col form label.req-field-text{
            font-weight:300;
            text-transform: none;
        }
        
        #contact-section.section-col form .formfooter button {
        background-color: #DA2224;
        border: none;
        border-radius: 0;
        font-weight: bold;
        padding: 10px 20px;
        }

        .form-inline {
            display: flex;
            flex-flow: row wrap;
            align-items: center;
            &.justify-content-start {
                justify-content: flex-start;
            }
            &.justify-content-end {
                justify-content: flex-end;
            }
            .form-group{
                display: flex;
                align-items: center;
                margin-bottom: 0;
                width: auto;
                .form-check-input{
                    margin-right: .25rem;
                }
            }
        }
        
        
        @media screen and (max-width:768px) {
            #contact-section.section-two-col { padding: 60px 0; }
        .section-title.x-large .section-title--heading { font-size: 90px; }
        #contact-section.section-col form {margin-bottom: 0; }
        #contact-section.section-col .flex-columns .flex-col{ max-width:100%; }
        #contact-section.section-col .flex-columns .flex-col .formfooter .col-5 .form-inline{ flex-wrap: initial; }
        #contact-section.section-col form label.req-field-text { font-size: 10px; }
        }
        
        @media screen and (max-width:510px) {
            #contact-section.section-two-col { padding: 40px 0; }
            .section-title.x-large .section-title--heading { font-size: 70px; }
            #contact-section.section-col .flex-columns .flex-col .formfooter .col-7 .form-inline{ flex-flow: column wrap; justify-content: flex-start; align-items: flex-start; }
            #contact-section.section-col .flex-columns .flex-col .formfooter .col-5 .form-inline{ flex-flow: column wrap;}
        }
    /*CONTACT-SECTION*/
    /*PARTNERING SECTION*/
        #partnering-seciton.section-red{
            background-color: #DA2224;
            padding: 167px 0;
            color: #fff;
        }
        #partnering-seciton.section-red .flex-columns .flex-col{
            margin-right:60px;
            max-width:50%;
        }
        #partnering-seciton.section-red .flex-columns .flex-col:last-child{
            margin-right:0;
        }
        #partnering-seciton.section-red .text--heading{
            font-family: 'Montserrat', sans-serif;
            font-weight:800;
            font-size:25px;
            text-transform:uppercase;
            line-height: 1.3;
        }
        #partnering-seciton.section-red .text--body{
            font-family: 'Montserrat', sans-serif;
            font-weight:400;
            font-size:18px;
            line-height: 1.3;
        }
        @media screen and (max-width:768px) {
            #partnering-seciton.section-red { padding: 60px 0; }
            #partnering-seciton.section-red .flex-columns {  flex-direction: column; flex-wrap: wrap; } 
            #partnering-seciton.section-red .flex-columns .flex-col { max-width: 70%; padding: 0; margin:0;margin-bottom: 25px;}
            #partnering-seciton.section-red .flex-columns .flex-col:last-child { margin-bottom: 0;}
            #partnering-seciton.section-red .flex-columns .text { text-align:center; }
            #partnering-seciton.section-red .text--body {text-align: center;}
        }
        @media screen and (max-width:510px) {
        #partnering-seciton.section-red { padding: 40px 0; }
        }
    </style>
    @endpush
</x-guest-layout>
