( function( $ ) {
    
    /**
     * Go to Start Nav Feature
     */
    ( function() {

        var $elem = $goStartNav;

        if ( $html.hasClass( 'ntt-go-start-nav-f5e' ) ) {
            $elem.addClass( 'go-start-nav-f5e' );
        } else {
            return;
        }
        
        var $navi = $elem.find( '.go-start-navi---a' );
        
        // Functions
        goStartNavFn = {
            
            // Activate
            on: function() {
                $elem
                    .addClass( 'go-start-nav--on' )
                    .removeClass( 'go-start-nav--off' );
                $html
                    .addClass( 'ntt-go-start-nav--on' )
                    .removeClass( 'ntt-go-start-nav--off' );
            },

            // Deactivate
            off: function() {
                $elem
                    .addClass( 'go-start-nav--off' )
                    .removeClass( 'go-start-nav--on' );
                $html
                    .addClass( 'ntt-go-start-nav--off' )
                    .removeClass( 'ntt-go-start-nav--on' );
            },

            activation: function() {
                var buffer = windowHeight / 2;

                if ( documentHeight > windowHeight ) {
                    
                    function criteriaMatch() {
                        
                        if ( $elem.hasClass( 'go-start-nav--off' ) && ( ( windowHeight + window.pageYOffset ) >= documentHeight - 640 ) ) {
                            goStartNavFn.on();
                        }
                    }
                    
                    criteriaMatch();

                    $window.scrolled( function() {
                        
                        criteriaMatch();

                        if ( $elem.hasClass( 'go-start-nav--on' ) && window.pageYOffset <= ( buffer ) ) {
                            goStartNavFn.off();
                        }
                    } );
                }
            }
        };
        
        goStartNavFn.off();
        
        goStartNavFn.activation();
        
        // User Actions
        $navi
            .on( 'focusin.ntt', function() {
                goStartNavFn.on();
            } )
            .on( 'click.ntt', function() {
                $( this ).blur();
            } );
    } ) ();
} )( jQuery );