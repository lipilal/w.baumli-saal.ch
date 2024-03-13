jQuery(document).ready(function(){
	jQuery('.owl-carousel').owlCarousel({
		loop:true,
		margin:10,
		responsiveClass:true,
		autoplay:true,
		responsive:{
			0:{
				items:2,
			},
			600:{
				items:3,
				nav:false
			},
			1000:{
				items:5,
				margin:15,
			}
		}
	});
	
	//SIDR
	jQuery('#sidr-toggle').sidr({
		onOpen: function() { jQuery("#close-menu").focus(); console.log("openend");},
		onClose: function() { jQuery("#masthead-mobile .toggle-menu-hamburger").focus();}
	});  
		
	jQuery( '#close-menu' ).click(function () {
	  jQuery.sidr('close', 'sidr');
	});
	
	jQuery( '.search-toggle' ).click(function () {
		  jQuery.sidr('open', 'sidr');
		  jQuery('#sidr .search-field').focus();
		});
	
	//Keyboard Navigation for Phone
	jQuery('.go-to-top').focus(function(){
		jQuery("#close-menu").focus();
	});
	
	jQuery('.go-to-bottom').focus(function(){
		jQuery("#mobile-menu-sidr.menu li:last-of-type a").focus();
	});
	
	//Ticker
	jQuery('.my-news-ticker').AcmeTicker({
		type:'vertical',/*vertical/horizontal/Marquee/type*/
		direction: 'right',/*up/down/left/right*/
		speed:800,/*true/false/number*/ /*For vertical/horizontal 600*//*For marquee 0.05*//*For typewriter 50*/
		controls: {
			prev: jQuery('.acme-news-ticker-prev'),/*Can be used for vertical/horizontal/typewriter*//*not work for marquee*/
			next: jQuery('.acme-news-ticker-next'),/*Can be used for vertical/horizontal/typewriter*//*not work for marquee*/
			toggle: jQuery('.acme-news-ticker-pause')/*Can be used for vertical/horizontal/marquee/typewriter*/
		}
	});
}); 

jQuery(".search-icon").click(function(){
	jQuery(".search-form").css("visibility", "visible");
	jQuery(".search-icon").css("visibility", "hidden");
	jQuery("#cross-icon").css("visibility", "visible");
  });

jQuery("#cross-icon").click(function(){
	jQuery("#search-icon").css("visibility", "visible");
	jQuery("#cross-icon").css("visibility", "hidden");
	jQuery(".search-form").css("visibility", "hidden");
  });

    // scroll to top

function scrollTop() {
	// 500 -> This is the value in px of the distance to be scrolled for the 'scroll-to-top' button to show-up
	if (jQuery(window).scrollTop() > 500) {
		jQuery(".backToTopBtn").addClass("active");
	} else {
		jQuery(".backToTopBtn").removeClass("active");
	}
  }
  jQuery(function () {
	// show and hide btn
	scrollTop();
	jQuery(window).on("scroll", scrollTop);
  
	// body scroll on btn click
	jQuery(".backToTopBtn").click(function () {
		jQuery("html, body").animate({ scrollTop: 0 }, 1);
	  return false;
	});
  });
  
