( function( $ ) {

    'use strict';

	$( document ).ready( function() {

		if ( 'function' === typeof $.fn.superfish ) {

			$( 'ul.sf-menu' ).superfish( {
				delay     : 200,
				animation : {
					opacity :'show',
					height  :'show'
				},
				speed     : 'fast',
				cssArrows : false,
				disableHI : true
			} );

		}

		if ( 'function' === typeof $.fn.sidr ) {

			$( '#navigation-toggle' ).sidr( {
				name   : 'sidr-main',
				source : '#sidr-close, #site-navigation, #mobile-search',
				side   : 'left'
			} );

			$( '.sidr-class-toggle-sidr-close' ).click( function() {
				$.sidr( 'close', 'sidr-main' );
				return false;
			} );

		}

	} );

} ) ( jQuery );