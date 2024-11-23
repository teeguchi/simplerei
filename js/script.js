/**
 *  File script.js
 *
 *  Script for this theme
 *
 * @package WordPress
 * @subpackage SimpleRei
 * @since 1.0.0
 */

/* jQuery
 */
jQuery(function($) {
	var main_menu = $('.main-navigation .menu');
	var trigger_button = $('.menu-trigger button');
	var bp = 740; // Break point.

	/* Mobile menu button. */
	trigger_button.click(function() {
		main_menu.slideToggle();
		$(this).toggleClass('active');
	});

	/* Normal display of menu. */
	$(window).resize(function() {
		var innW = window.innerWidth;
		if (innW >= bp) {
			main_menu.css('display', 'block');
			trigger_button.removeClass('active');
		} else if (trigger_button.hasClass('active')) {
			main_menu.css('display', 'block');
		} else {
			main_menu.css('display', 'none');
		}
	});

	/* Back to top. */
	$('#page-top a').click(function() {
		$('html, body').animate({scrollTop: 0},500);
		return false;
	});
	$(window).scroll(function() {
		var value = $(this).scrollTop();
		if (value > 155) {
			$('#page-top').addClass('show');
		} else {
			$('#page-top').removeClass('show');
		}
	});
});
