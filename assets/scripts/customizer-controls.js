/**
 * Customizer Controls
 */

( function() {
	wp.customize.bind( 'ready', function() {
		wp.customize( 'colorscheme', function( setting ) {
			wp.customize.control( 'colorscheme_hue', function( control ) {
				var visibility = function() {
					
					if ( 'custom' === setting.get() ) {
						control.container.slideDown( 180 );
					}
                    else {
						control.container.slideUp( 180 );
					}
				};
				visibility();
				setting.bind( visibility );
			});
		});
	});
} )( jQuery );