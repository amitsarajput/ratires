<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="index,follow">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('images/radar-favicon.png')}}">

        <!-- Scripts -->
        @vite(['resources/sass/style.scss', 'resources/js/app.js'])
        
        <!-- <link rel="stylesheet" href="css/style.css"> -->
        <link rel="stylesheet" href="{{ asset('css/reflex.css')}}">
        <!-- Latest compiled and minified CSS -->
        <link href="{{ asset('css/select2.min.css')}}" rel="stylesheet" />
        
        
        @stack('styles')
        
        @stack('head-scripts')

        @cookieconsentscripts
    </head>
    <body class="">
        
        <div class="body-overlay"></div>
            
        <!-- Document Wrapper
        ============================================= -->
        <div id="main-wrapper">
            @php
                $bubble_closed=session('omni_data.bubble_closed');
            @endphp
            <x-user-location-bubble :bubbleclosed="$bubble_closed" class="shown" 
            />
            <x-header />
            <x-sidepanel />
            <x-floating-button />
            {{ $slot }}
            <x-footer />
        </div><!-- #wrap
        per end -->
        

        <div id="gotoTop" data-offset='200' class="icon-angle-up"></div>
        <script src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
        

        <!-- Latest compiled and minified JavaScript -->
        <script src="{{ asset('js/select2.min.js')}}"></script>
        <script src="{{ asset('js/main.js')}}"></script>
        <!-- Scroll To Jquery -->
        <script src="https://cdn.jsdelivr.net/npm/jquery.scrollto@2.0.0/jquery.scrollTo.min.js"></script>
        
        <script>
            $(function () {
                function formatText (icon) {
                    return $('<span><i class="' + $(icon.element).data('icon') + '"></i> ' + icon.text + '</span>');
                };
                $('.selectpicker').select2({
                    minimumResultsForSearch: Infinity,
                    templateSelection: formatText,
                    templateResult: formatText
                });
            });
            $(document).ready(function() {
                // Bind to the click of all links with a #hash in the href
                $('a[scroll-to^="#"]').click(function(e) {
                    // Prevent the jump and the #hash from appearing on the address bar
                    e.preventDefault();
                    // Scroll the window, stop any previous animation, stop on user manual scroll
                    // Check https://github.com/flesler/jquery.scrollTo for more customizability
                    $(window).stop(true).scrollTo(this.hash, {duration:1000, interrupt:true});
                });
            });
        </script>
        @stack('scripts')
        @cookieconsentview
    </body>
</html>
