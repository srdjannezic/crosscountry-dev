//-- Chat box
$(document).ready(function(){
	//-- CHAT BOX
	$('.chat-box__tab').click(function(){
		//console.log("chat box");
		$(this).closest('.chat-box').toggleClass('expand');
	});

	var stop = false;
	var orig = '';

	$('body').on('click','.media-box .icon-play', function(){
		
		let iframe = $(this).closest('.media-box').find('iframe');
		orig = iframe.attr("src");
		let stop = orig + '?autoplay=1';

		iframe.attr('src',''); // reset iframe

		$(this).closest('.media-box').addClass('showVideo');

		$(iframe).attr("src",stop);
	});

	$('body').on('click','.iframe-lightbox .icon-close', function(){
			$(this).closest('.media-box').removeClass('showVideo');
		 	let iframe = $(this).closest('.media-box').find('iframe');
		 	//console.log(stop);
		    $(iframe).attr("src",orig);
	});

	//----- CC Menu

	$('.icon-ham').on('click', function() {
		$('.ham-menu').addClass('ham-active');
		$('.header__allItems').addClass('showMenu');
		console.log("ham clicked!!!");
	});

	$('.ham-menu .icon-close, .btn-estimate').on('click', function() {
		$('.ham-menu').removeClass('ham-active');
		$('.header__allItems').removeClass('showMenu');
	});

	$('.testimonials .review-wrapper').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		centerMode: true,
		dots: true,
		responsive: [
		    {
		      breakpoint: 1200,
		      settings:{
				slidesToShow: 1,
				slidesToScroll: 1,
		        centerMode:true,
		        variableWidth: true,
		      }
		    },
		    {
		      breakpoint: 767,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		        centerMode:false,
		        variableWidth:false,
		      }
		    }
		]
	});

	$('.similar-posts .post-list').slick({
		infinite: false,
		slidesToShow: 1,
		slidesToScroll: 1,
		centerMode: false,
		dots: false,
		responsive: [
		    {
		      breakpoint: 100024,
		      settings: "unslick"
		    },
		    {
		      breakpoint: 767,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		]
	});

	$(".map-hover").mouseover(function() {
		let side = $(this).data('side');
		$('.' + side).addClass('active').siblings().removeClass('active');
	});

	$(".map-hover").mouseleave(function() {
		let side = $(this).data('side');
		$('.' + side).removeClass('active');
	});
	$(".map-hover").click(function() {
		let side = $(this).data('side');
		$('.' + side).addClass('active-side').siblings().removeClass('active-side');
	});

	//-- BLOG Category list 

	$('.category-list').click(function(){
	  $(this).toggleClass('open');
	});

	$('.category-list .active').click(function(e){
	  e.preventDefault();
	});

	
	$(window).scroll(function() {     
	    var scroll = $(window).scrollTop();
	    if (scroll > 10) {
	        $(".header").addClass("shadow");
	    }
	    else {
	        $(".header").removeClass("shadow");
	    }
	});


	if($('body').hasClass('about-us-pg')){
	//-- About us gallery
	$('[data-fancybox="gallery"]').fancybox({
	// Options will go here
		buttons: [
		// "zoom",
		//"share",
		// "slideShow",
		//"fullScreen",
		//"download",
		// "thumbs",
		"close"
		],
		infobar: false,
	});
	}

	$('.dropdown').mouseover(function(){
		$('.header').addClass('bigIndex');
	});

	$('.dropdown').mouseleave(function(){
		$('.header').removeClass('bigIndex');
	});

	


});





var stickyHeaders = (function() {

  var $window = $(window),
      $stickies;

  var load = function(stickies) {

    if (typeof stickies === "object" && stickies instanceof jQuery && stickies.length > 0) {

      $stickies = stickies.each(function() {

        var $thisSticky = $(this).wrap('<div class="followWrap" />');
  
        $thisSticky
            .data('originalPosition', $thisSticky.offset().top)
            .data('originalHeight', $thisSticky.outerHeight())
              .parent()
              .height($thisSticky.outerHeight()); 			  
      });

      $window.off("scroll.stickies").on("scroll.stickies", function() {
		  _whenScrolling();		
      });
    }
  };

  var _whenScrolling = function() {

    $stickies.each(function(i) {			

      var $thisSticky = $(this),
          $stickyPosition = $thisSticky.data('originalPosition');

      if ($stickyPosition <= $window.scrollTop()) {        
        
        var $nextSticky = $stickies.eq(i + 1),
            $nextStickyPosition = $nextSticky.data('originalPosition') - $thisSticky.data('originalHeight');

        $thisSticky.addClass("fixed");

        if ($nextSticky.length > 0 && $thisSticky.offset().top >= $nextStickyPosition) {

          $thisSticky.addClass("absolute").css("top", $nextStickyPosition);
        }

      } else {
        
        var $prevSticky = $stickies.eq(i - 1);

        $thisSticky.removeClass("fixed");

        if ($prevSticky.length > 0 && $window.scrollTop() <= $thisSticky.data('originalPosition') - $thisSticky.data('originalHeight')) {

          $prevSticky.removeClass("absolute").removeAttr("style");
        }
      }
    });
  };

  return {
    load: load
  };
})();

$(function() {
  stickyHeaders.load($(".steps-show-bar"));
});