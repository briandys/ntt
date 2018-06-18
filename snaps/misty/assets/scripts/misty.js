( function( $ ) {
    
    ( function() {

        var $elem = $( '#contact-form-11' ),
            $visuals = $( '.customize-visuals' ),
            $requiredText = $elem.find( 'span:contains("(required)")' ),
            $mug = $elem.find( '[name="g11-mug"]' ),
            $notecard = $elem.find( '[name="g11-notecard"]' ),
            $sticker = $elem.find( '[name="g11-sticker"]' ),
            $submit = $elem.find( '[type="submit"]' ),
            options = [
                $mug.closest( '[value="A"]' ).addClass( 'mug-a-option' ),
                $mug.closest( '[value="B"]' ).addClass( 'mug-b-option' ),
                
                $notecard.closest( '[value="A"]' ).addClass( 'notecard-a-option' ),
                $notecard.closest( '[value="B"]' ).addClass( 'notecard-b-option' ),
                $notecard.closest( '[value="C"]' ).addClass( 'notecard-c-option' ),
                $notecard.closest( '[value="D"]' ).addClass( 'notecard-d-option' ),
                $notecard.closest( '[value="Custom"]' ).addClass( 'notecard-custom-option' ),
                $mug.closest( '[value="B"]' ).addClass( 'mug-b-option' ),
                
                $sticker.closest( '[value="A"]' ).addClass( 'sticker-a-option' ),
                $sticker.closest( '[value="B"]' ).addClass( 'sticker-b-option' ),
                $sticker.closest( '[value="C"]' ).addClass( 'sticker-c-option' ),
                $sticker.closest( '[value="D"]' ).addClass( 'sticker-d-option' ),
                $sticker.closest( '[value="Custom"]' ).addClass( 'sticker-custom-option' ),
            ],
            visuals = [
                $visuals.find( '.mug-a-visuals' ),
                $visuals.find( '.mug-b-visuals' ),
                
                $visuals.find( '.notecard-a-visuals' ),
                $visuals.find( '.notecard-b-visuals' ),
                $visuals.find( '.notecard-c-visuals' ),
                $visuals.find( '.notecard-d-visuals' ),
                $visuals.find( '.notecard-custom-visuals' ),
                
                $visuals.find( '.sticker-a-visuals' ),
                $visuals.find( '.sticker-b-visuals' ),
                $visuals.find( '.sticker-c-visuals' ),
                $visuals.find( '.sticker-d-visuals' ),
                $visuals.find( '.sticker-custom-visuals' ),
            ];

        $.each( options, function( i ) {
            options[i].after( visuals[i] );
        } );

        $elem.addClass( 'customize-form' );

        $requiredText
            .addClass( 'required---txt' )
            .text( nttData.requiredText );

        $submit.val( nttData.submitText );

        wrapTextNode( $('.radio') );
        
    } ) ();
    
} )( jQuery );