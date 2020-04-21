/**
 * Customizer Preview
 */

( function( $ ) {
    var $html = $( document.documentElement );

    /**
     * Entity Name
     */

	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.ntt--entity-name .txt' ).text( to );
		} );
	} );
    
    /**
     * Entity Description
     */

    wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.ntt--entity-description .txt' ).text( to );
		} );
	} );
	
    /**
     * Header Text Color
     */

	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			
            if ( 'blank' === to ) {
				$html
                    .addClass( 'ntt--entity-name-description---0--view' );
			} else {

				if ( ! to.length ) {
					$( '#ntt--custom-header-colors-style' ).remove();
				}
				
                $( '.ntt--entity-name a, .ntt--entity-description' ).css( {
					color: to
				} );
				
                $html
                    .removeClass( 'ntt--entity-name-description---0--view' );
			}
		} );
	} );

	/**
     * Default Color Scheme
     */

	wp.customize( 'colorscheme', function( value ) {
		value.bind( function( to ) {
			$html
				.addClass( 'ntt--customizer-color-scheme---default' )
				.removeClass( 'ntt--customizer-color-scheme---custom--view' );
		} );
	} );
	
    /**
     * Custom Color Scheme
     */
    
	wp.customize( 'colorscheme_hue', function( value ) {
		value.bind( function( to ) {
            $html
				.addClass( 'ntt--customizer-color-scheme---custom--view' )
				.removeClass( 'ntt--customizer-color-scheme---default' );

			var style = $( '#ntt--customizer-custom-color-scheme-style' ),
				hue = style.data( 'hue' ),
				css = style.html();

			css = css.split( hue + ',' ).join( to + ',' );
			style.html( css ).data( 'hue', to );
		} );
	} );

} )( jQuery );