<?php
function ntt_styles_scripts() {

    wp_enqueue_style( 'ntt-style', get_template_directory_uri(). '/assets/styles/ntt.min.css', array(), wp_get_theme()->get( 'Version' ) );

    wp_style_add_data( 'ntt-style', 'rtl', 'replace' );
    
    add_editor_style( array( 'assets/css/editor-style.css', ) );

    wp_enqueue_script( 'ntt-script', get_template_directory_uri(). '/assets/scripts/ntt.js', array(), wp_get_theme()->get( 'Version' ), true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'ntt_styles_scripts', 0 );

function ntt_inline_scripts() {
    ?>
    <script>
        ( function() {
            var html = document.documentElement;
            html.className = html.className.replace( /\bno-js\b/,'js' );
            html.className += ' ' + 'dom--unloaded';
            html.className += ' ' + 'window--unloaded';
        } )();
    </script>
    <?php
}
add_action( 'wp_head', 'ntt_inline_scripts', 0 );

// Child Theme
if ( is_child_theme() ) {

    function ntt_kid_styles() {
        wp_enqueue_style( 'ntt-style', get_template_directory_uri(). '/assets/styles/ntt.min.css' );
    }
    add_action('wp_enqueue_scripts', 'ntt_kid_styles', 0);

    function ntt_kid_theme_html_css( $classes ) {
        $classes[] = sanitize_title( $GLOBALS['ntt_kid_name'] );
        return $classes;
    }
    add_filter( 'ntt_html_css_wp_filter', 'ntt_kid_theme_html_css' );
}