(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	
	/*smooth scroll*/
	$(document).ready(function() {
	   $('.js-scrollTo').on('click', function() { // Au clic sur un élément
	     var page = $(this).attr('href'); // Page cible
	     var speed = 750; // Durée de l'animation (en ms)
	     $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go

	     $('.summary li').removeClass('current');
	     $(this).parent().addClass('current');
	     return false;
	   });
	});

})( jQuery );
