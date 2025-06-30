/*// Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body
var openNav= function(){
	document.querySelector('body').classList.add('sidpanel-opened');
	document.getElementById("side-panel").style.right = "0";;
};

 // Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white 
var closeNav = function(){
	document.querySelector('body').classList.remove('sidpanel-opened');
	document.getElementById("side-panel").style.right = "-300px";
};**/

var $ = jQuery.noConflict();

window.OMNI=window.OMNI || {}
//IEFY

$(function() {

    var $window = $(window),
        $body = $('body');

    OMNI.sidePanel=function(){
        jQuery(".side-panel-trigger").off('click').on( 'click', function(){
            jQuery('body').toggleClass("sidpanel-opened");
            if( jQuery('body').hasClass('device-touch') && jQuery('body').hasClass('side-push-panel') ) {
                jQuery('body').toggleClass("ohidden");
            }
            return false;
        });
        jQuery(document).on('click', function(event) {
            if (!jQuery(event.target).closest('#side-panel').length) { jQuery('body').toggleClass('sidpanel-opened', false); }
        });
    };

    
    OMNI.topSearch=function(){
        $("#top-search-trigger").click(function(e){
            jQuery('body').toggleClass('top-search-open');
            
            if (jQuery('body').hasClass('top-search-open')){
                jQuery('#top-search').find('input').focus();
            }
            // e.stopPropagation();
            // e.preventDefault();
        });
        jQuery(document).on('click', function(event) {
            if (!jQuery(event.target).closest('#top-search').length) { jQuery('body').toggleClass('top-search-open', false); }
        });
    };
    OMNI.linkScroll_old= function(){ 
            jQuery("a[data-scrollto]").on('click', function(){
                var element = jQuery(this),
                    divScrollToAnchor = element.attr('data-scrollto'),
                    divScrollSpeed = element.attr('data-speed'),
                    divScrollOffset = element.attr('data-offset'),
                    divScrollEasing = element.attr('data-easing'),
                    divScrollHighlight = element.attr('data-highlight');

                if( !divScrollSpeed ) { divScrollSpeed = 750; }
                if( !divScrollOffset ) { divScrollOffset = 40; }
                if( !divScrollEasing ) { divScrollEasing = 'easeOutQuad'; }

                jQuery('html,body').stop(true).animate({
                    'scrollTop': jQuery( divScrollToAnchor ).offset().top - Number(divScrollOffset)
                }, Number(divScrollSpeed), divScrollEasing);

                return false;
            });
        };
    OMNI.topScrollOffset= function() {
        var topOffsetScroll = 40;
        return topOffsetScroll;
    },
    OMNI.linkScroll= function(){
            $("a[data-scrollto]").click(function(){
                var element = $(this),
                    divScrollToAnchor = element.attr('data-scrollto'),
                    divScrollSpeed = element.attr('data-speed'),
                    divScrollOffset = element.attr('data-offset'),
                    divScrollEasing = element.attr('data-easing'),
                    divScrollHighlight = element.attr('data-highlight');

                if( element.parents('#primary-menu').hasClass('on-click') ) { return true; }

                if( !divScrollSpeed ) { divScrollSpeed = 750; }
                if( !divScrollOffset ) { divScrollOffset = OMNI.topScrollOffset(); }
                if( !divScrollEasing ) { divScrollEasing = 'easeOutQuad'; }

                $('html,body').stop(true).animate({
                    'scrollTop': $( divScrollToAnchor ).offset().top - Number(divScrollOffset)
                }, Number(divScrollSpeed), divScrollEasing, function(){
                    if( divScrollHighlight ) {
                        if( $(divScrollToAnchor).find('.highlight-me').length > 0 ) {
                            $(divScrollToAnchor).find('.highlight-me').animate({'backgroundColor': divScrollHighlight}, 300);
                            var t = setTimeout( function(){ $(divScrollToAnchor).find('.highlight-me').animate({'backgroundColor': 'transparent'}, 300); }, 500 );
                        } else {
                            $(divScrollToAnchor).animate({'backgroundColor': divScrollHighlight}, 300);
                            var t = setTimeout( function(){ $(divScrollToAnchor).animate({'backgroundColor': 'transparent'}, 300); }, 500 );
                        }
                    }
                });

                return false;
            });
    };    

    OMNI.goToTop= function(){
        var $goToTopEl=$('#gotoTop'),
            elementScrollSpeed = $('#gotoTop').attr('data-speed'),
            elementScrollEasing = $('#gotoTop').attr('data-easing');

        if( !elementScrollSpeed ) { elementScrollSpeed = 700; }
        if( !elementScrollEasing ) { elementScrollEasing = 'easeOutQuad'; }

        $('#gotoTop').click(function() {
            $('body,html').stop(true).animate({
                'scrollTop': 0
            }, Number( elementScrollSpeed ), elementScrollEasing );
            return false;
        });
    };

    

    OMNI.sidePanel();
    OMNI.topSearch();
    OMNI.linkScroll();
    OMNI.goToTop();
    //OMNI.goToTopScroll();
    OMNI.loadFlexSlider();

});

jQuery(window).on('scroll', function(){
    //OMNI.goToTopScroll();
});



(function($){
    
    // USE STRICT
	"use strict";
    
    var L_B={
        //Top notification selectors
        locationBubble_show:true,
        locationBubblee:$('.location-bubble'),
        locSelectEl:$('.location-bubble select'),
        locTextEl:$('.location-bubble .col-text'),
        smlocationEl:$('.small-location-picker'),
        locText:'You are currently viewing the Radar **region** website. To view the products in your location, select the desired region from the drop-down list.',
        //Top Header Selectors

        get_bubble_height:function(el){
            var windowWidth= window.innerWidth;
            var regHeight;
            if(windowWidth > 600 ){
                regHeight='120px';
            }else if(windowWidth > 450 &&  windowWidth <= 600){
                regHeight='180px';
            }else{regHeight='220px';}
            if(el.hasClass('location-bubble--closed')){
                regHeight='30px';
            }
            return regHeight;
        },  
        open_bubble : function(el=null,sm_el=null){
            if (el.length) {
                var regionHeight=L_B.get_bubble_height(el);
                el.show();
                el.animate({height:regionHeight, opacity:1,overflow: 'visible'}, 300);
                el.addClass('shown');
                sm_el.removeClass('shown');
            }
        },
        close_bubble : function(el=null,sm_el=null){
            if (el.length) {
                el.addClass('location-bubble--closed');
                var regionHeight=L_B.get_bubble_height(el);

                el.animate({height:regionHeight}, 300,function(){
                    
                    $('.location-bubble.location-bubble--closed select,.location-bubble select').on('change', function(){
                        //$('.location-bubble--form').submit();
                        $(this).closest('form').submit();
                    });
                    sm_el.addClass('shown');
                    sm_el.find($('select')).on('change', function(){
                        $(this).closest('form').submit();
                    });
                });
                
                
                //sessionStorage.setItem("regionTopEl", 'false');
            }
        },
        
         close_event:function(){
            $('.location-bubble--close').on('click', function(e){
                e.preventDefault();
                L_B.close_bubble($('.location-bubble'), $('.small-location-picker'));
                var bubble=$(this).data('bubble');
                var url=$(this).data('url');
                //console.log(bubble,url);
                    $.ajax({
                        type: 'post',
                        url: url,
                        data: {
                        'formdata':bubble
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: function(){
                            //$('#create_new').html('Please wait');
                        },
                        success: function(response){
                            //alert(response.success);
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                            // Handle error response
                        }
                    });
            });
        },
         button_event:function(){
            $('.location-bubble .button').on('click', function(){
                //$('.location-bubble .button');
            });
            $('.location-bubble.location-bubble--closed select').on('change', function(){
                //$('.location-bubble--form').submit();
                $(this).closest('form').submit();
            });            
            $('.small-location-picker.shown select').on('change', function(){
                $(this).closest('form').submit();
            });
        },
        
        init:function(){
            L_B.close_event();
            L_B.button_event();
        },

    };
    var euLabel=function(){
        var STRS={
            EU_TOGGLE_BUTTON:".eulabeldetails-toggle-button",
            SHOW_TEXT:"Show EU labels",
            HIDE_TEXT:"Hide EU labels",
        };
        var eu_button =$(STRS.EU_TOGGLE_BUTTON);

            if (eu_button.length > 0) {
                eu_button.on('click',function(){
                    var tr,buttons;
                    tr=$(this).parents('tr');
                    buttons=tr.find(STRS.EU_TOGGLE_BUTTON);
                    if(tr.hasClass('active')){
                        tr.removeClass('active');
                        buttons.text(STRS.SHOW_TEXT);
                    }else{
                        tr.addClass('active');
                        buttons.text(STRS.HIDE_TEXT);
                    }
                    //tr.toggleClass('border-bottom-transparent');
                    tr.next().toggleClass('show');
                    
                });
            }
        
    };
    var top_collapsed_menu=function(){
        var STRS={
            HEADER:"#header",
            MENU_TRIGGER:"#header .collapsed-menu-trigger",
            MENU:"#header .menu",
            CLASS_TO_TOGGLE:"show-collapsed-menu",
        };
        var c_menu_trigger =$(STRS.MENU_TRIGGER);
        var c_menu =$(STRS.MENU);

            if (c_menu_trigger.length > 0) {
                c_menu_trigger.on('click',function(){
                    if(c_menu.hasClass(STRS.CLASS_TO_TOGGLE)){
                        c_menu.removeClass(STRS.CLASS_TO_TOGGLE);
                    }else{
                        c_menu.addClass(STRS.CLASS_TO_TOGGLE);
                    }
                    
                });
            }
        
    };
    //Nav tree
    var navTree= function(){
        var navTreeEl = jQuery('.nav-tree');
        if( navTreeEl.length > 0 ){
            navTreeEl.each( function(){
                var element = jQuery(this),
                    elementSpeed = element.attr('data-speed'),
                    elementEasing = element.attr('data-easing');

                if( !elementSpeed ) { elementSpeed = 250; }
                if( !elementEasing ) { elementEasing = 'swing'; }

                element.find( 'ul li:has(ul)' ).addClass('sub-menu');
                element.find( 'ul li:has(ul) > a' ).append( ' <i class="icon-angle-down"></i>' );

                if( element.hasClass('on-hover') ){
                    element.find( 'ul li:has(ul):not(.active)' ).hover( function(e){
                        jQuery(this).children('ul').stop(true, true).slideDown( Number(elementSpeed), elementEasing);
                    }, function(){
                        jQuery(this).children('ul').delay(250).slideUp( Number(elementSpeed), elementEasing);
                    });
                } else {
                    element.find( 'ul li:has(ul) > a' ).off( 'click' ).on( 'click', function(e){
                        var childElement = jQuery(this);
                        //element.find( 'ul li' ).not(childElement.parents()).removeClass('active');
                        childElement.parent().children('ul').slideToggle( Number(elementSpeed), elementEasing, function(){
                            jQuery(this).find('ul').hide();
                            //jQuery(this).find('li.active').removeClass('active');
                        });
                        element.find( 'ul li > ul' ).not(childElement.parent().children('ul')).not(childElement.parents('ul')).slideUp( Number(elementSpeed), elementEasing );
                        //childElement.parent('li:has(ul)').toggleClass('active');
                        e.preventDefault();
                    });
                }
            });
        }
    };
    
    OMNI.locationBubble=L_B;
    OMNI.locationBubble.init();
    euLabel();
    top_collapsed_menu()
    navTree()

})(jQuery);