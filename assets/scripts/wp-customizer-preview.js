( function( $ ) {
    var $html = $( document.documentElement ),
        $body = $( document.body );

    // Entity Name
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.entity-primary-name .txt' ).text( to );
		} );
	} );
    
    // Entity Description
    wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.entity-primary-description .txt' ).text( to );
		} );
	} );
	
    // Header Text Color
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			
            if ( 'blank' === to ) {
				$html
                    .addClass( 'entity-name-description--disabled' );
			} else {

				if ( ! to.length ) {
					$( '#ntt-custom-header-colors-style' ).remove();
				}
				
                $( '.entity-primary-name a, .entity-primary-description .txt' ).css( {
					color: to
				} );
				
                $html
                    .removeClass( 'entity-name-description--disabled' );
			}
		} );
	} );

	// Default Color Scheme
	wp.customize( 'colorscheme', function( value ) {
		value.bind( function( to ) {
			$html
				.addClass( 'wp-customizer-color-scheme--default' )
				.removeClass( 'wp-customizer-color-scheme--custom' );
		} );
	} );
	
    // Custom Color Scheme
	wp.customize( 'colorscheme_hue', function( value ) {
		value.bind( function( to ) {
            $html
				.addClass( 'wp-customizer-color-scheme--custom' )
				.removeClass( 'wp-customizer-color-scheme--default' );

			var style = $( '#ntt-wp-customizer-custom-color-scheme-style' ),
				hue = style.data( 'hue' ),
				css = style.html();

			css = css.split( hue + ',' ).join( to + ',' );
			style.html( css ).data( 'hue', to );
		} );
	} );

} )( jQuery );