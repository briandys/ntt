<?php
function ntt_custom_visuals() {
    
    // Custom Background
    add_theme_support( 'custom-background' );
        
    // Custom Header
    add_theme_support( 'custom-header', apply_filters( 'ntt_custom_header_args', array(
        'default-image'      => '',
        'default_text_color' => 'black',
        'width'              => 1920,
        'height'             => 1440,
        'flex-width'         => true,
        'flex-height'        => true,
        'wp-head-callback'   => 'ntt_custom_header_callback',
     ) ) );
    
    // Custom Logo
    add_theme_support( 'custom-logo', apply_filters( 'ntt_custom_logo_args', array(
        'width'       => 640,
        'height'      => 640,
        'flex-width'  => true,
        'flex-height' => true,
     ) ) );
}
add_action( 'after_setup_theme', 'ntt_custom_visuals' );

// Custom Header Callback
function ntt_custom_header_callback() {
    
    if ( get_theme_support( 'custom-header', 'default-text-color' ) === get_header_textcolor() ) {
        return;
    }
    
    if ( get_header_textcolor() !== 'blank' ) {
        ?>
        <style id="ntt-custom-header-colors-style">
            .entity-primary-name a,
            .entity-primary-description {
                color: #<?php echo esc_attr( get_header_textcolor() ); ?>;
            }
        </style>
        <?php
    }
}

/**
 * Callback for WordPress 'prepend_attachment' filter.
 * 
 * Change the attachment page image size
 * 
 * @package WordPress
 * @category Attachment
 * @see wp-includes/post-template.php
 * 
 * @param string $attachment_content the attachment html
 * @return string $attachment_content the attachment html
 */
function ntt_prepend_attachment( $attachment_content ){
        
    $attachment_content = sprintf( '<p class="attachment-visuals obj" data-name="Attachment Visuals">%s</p>', wp_get_attachment_link( 0, 'ntt-medium', false ) );
    
    return $attachment_content;
}
add_filter( 'prepend_attachment', 'ntt_prepend_attachment' );