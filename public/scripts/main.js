// Script loader

//namespace
var Cars = Cars || {};

(function($, window, document, undefined) {

    'use strict';

    //initialise foundation
	$(document).foundation();

	//nav mobile
	$('[ui-mobile-icon]').on('click', function() {

		//bit lazy - should really do some css animation here
		$('.side-menu').slideToggle();
	});

})(jQuery, window, document);