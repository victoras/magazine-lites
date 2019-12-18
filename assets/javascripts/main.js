"use strict";

/**
 * Table Of Contents
 *
 * magazine_lite_carousel ( initiate carousel )
 * magazine_lite_masonry ( initiate masonry )
 * document ready
 * window load

/**
 * initiate carousel
 */
function magazine_lite_carousel() {

	// each carousel
	jQuery('.carousel').each(function(){

		// vars
		var _this = jQuery(this),
		items = 3,
		itemsPhone = 3,
		itemsTablet = 3;

		// items
		if ( _this.data('items') ) {
			items = _this.data('items');
		}

		// items phone
		if ( _this.data('items-phone') ) {
			itemsPhone = _this.data('items-phone');
		} else {
			itemsPhone = items;
		}

		// items tablet
		if ( _this.data('items-tablet') ) {
			itemsTablet = _this.data('items-tablet');
		} else {
			itemsTablet = items;
		}

		// init
		_this.owlCarousel({
			items: items,
			loop: true,
			margin: 5,
			slideBy : 'page',
			responsiveClass:true,
			responsive:{
				0:{
					items: itemsPhone,
				},
				768:{
					items: itemsTablet,
				},
				1024: {
					items: items
				},
			}
		});

	});

	// go prev
	jQuery(document).on( 'click', '.carousel-go-prev', function(){
		jQuery(this).closest('.carousel-wrapper').find('.owl-carousel').trigger('prev.owl.carousel');
	});

	// go next
	jQuery(document).on( 'click', '.carousel-go-next', function(){
		jQuery(this).closest('.carousel-wrapper').find('.owl-carousel').trigger('next.owl.carousel');
	});

}

/**
 * initiate masonry
 */
function magazine_lite_masonry() {

	if ( jQuery(window).width() > 760 ) {

		jQuery('.css3-loader').hide();

		var gutter = parseInt( jQuery('.wrapper').width() / 100 * 2.76 );

		jQuery('.masonry-init').masonry({
			itemSelector: '.masonry-item',
			columnWidth: '.grid-sizer',
			gutter: '.gutter-sizer',
			percentPosition: true,
		});

	}

}

/**
 * document ready
 */
jQuery(document).ready(function($){

	// init carousel
	magazine_lite_carousel();

	// subnavigation arrows
	$('#navigation #primary-menu > li:has(ul) > a').append('<span class="fas fa-angle-down"></span>');
	$('#top-bar #top-bar-menu > li:has(ul) > a').append('<span class="fas fa-angle-down"></span>');

	// mobile navigation
	$('#top-bar-mobile-navigation select, #mobile-navigation select').change(function() {
		window.location = $(this).val();
	});

	// Share btn
	jQuery( ".share-post" ).click(function() {
		window.open( jQuery(this).data("share-url"), "sharewin", "height=400,width=550,resizable=1,toolbar=0,menubar=0,status=0,location=0" ) ;
	});

	// load more pagination
	$(document).on( 'click', '.pagination-load-more a', function(e) {

		e.preventDefault();

		if ( $(this).parent().hasClass('active') && ! $('body').hasClass('load-more-in-progress') ) {

			var _this = $(this),
			module = $(this).closest('.blog-posts-listing'),
			pagination = module.find('.pagination'),
			postsContainer = module.find('.blog-posts-listing-inner'),
			moduleID = module.attr('id'),
			pagLink = _this.attr('href'),
			tempHolder = module.find('.load-more-temp');

			_this.find('.fa').addClass('fa-spin');

			$('body').addClass('load-more-in-progress');

			tempHolder.load( pagLink + ' .blog-posts-listing', function(){

				// get new content
				var content = jQuery( tempHolder.find('.blog-posts-listing-inner .blog-post') );

				// add new content
				postsContainer.append( content );

				// wait for all images to load
				postsContainer.waitForImages(function() {

					// reorder
					postsContainer.masonry( 'appended', content );

					// change pagination HTML
					module.find('.pagination').html( tempHolder.find('.pagination').html() );

					// replace pagination HTML
					pagination.replaceWith( tempHolder.find('.pagination') );

					// remove temporary holder HTML
					tempHolder.html('');

					// remove in progress class
					$('body').removeClass('load-more-in-progress');

				});

			});
		}

	});

});