( function( $ ) {
    var $html = $( document.documentElement ),
        $body = $( document.body );

    // Entity Name
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.entity-name .txt' ).text( to );
		} );
	} );
    
    // Entity Description
    wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.entity-description .txt' ).text( to );
		} );
	} );
	
    // Header Text Color
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			
            if ( 'blank' === to ) {
				$html
                    .addClass( 'entity-name-description--disabled' )
                    .removeClass( 'entity-name-description--enabled' );
			} else {

				if ( ! to.length ) {
					$( '#ntt-custom-header-colors-style' ).remove();
				}
				
                $( '.entity-name .a, .entity-description .a' ).css( {
					color: to
				} );
				
                $html
                    .addClass( 'entity-name-description--enabled' )
                    .removeClass( 'entity-name-description--disabled' );
			}
		} );
	} );

	// Default Color Scheme
	wp.customize( 'colorscheme', function( value ) {
		value.bind( function( to ) {
			$html
				.addClass( 'customizer-color-scheme--default' )
				.removeClass( 'customizer-color-scheme--custom' );
		} );
	} );
	
    // Custom Color Scheme
	wp.customize( 'colorscheme_hue', function( value ) {
		value.bind( function( to ) {
            $html
				.addClass( 'customizer-color-scheme--custom' )
				.removeClass( 'customizer-color-scheme--default' );

			var style = $( '#ntt-custom-theme-colors-style' ),
				hue = style.data( 'hue' ),
				css = style.html();

			css = css.split( hue + ',' ).join( to + ',' );
			style.html( css ).data( 'hue', to );
		} );
	} );

} )( jQuery );