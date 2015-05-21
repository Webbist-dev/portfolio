jQuery(document).ready(function($) {

	$('.slides li:first-of-type').addClass('current');
	$('.slides li:odd .tiltview').addClass('row');
	$('.slides li:even .tiltview').addClass('col');

});    