<?php

// Parent Theme
function ntt_styles_scripts() {
    
    wp_enqueue_style( 'ntt-style', get_template_directory_uri(). '/assets/styles/ntt.min.css' );
    
    add_editor_style( array( 'assets/css/editor-style.css', ) );

    wp_enqueue_script( 'ntt-html5-script', get_template_directory_uri(). '/assets/scripts/html5.js', null, null, true );
	wp_script_add_data( 'ntt-html5-script', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'ntt-script', get_template_directory_uri(). '/assets/scripts/ntt.js', array( 'jquery', ), null, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'ntt_styles_scripts', 0);

function ntt_inline_scripts() {
    ?>
    <script>
        ( function( html ) {
            html.className = html.className.replace( /\bno-js\b/,'js' );
            html.classList.add( 'dom--unready' );
            html.classList.add( 'window--unloaded' );
        } ) ( document.documentElement );
    </script>
    <?php
}
add_action( 'wp_head', 'ntt_inline_scripts', 0 );

// Child Theme
if ( is_child_theme() ) {

    function ntt_kid_styles() {
        wp_enqueue_style( 'ntt-style', get_template_directory_uri(). '/assets/styles/ntt.min.css' );
        wp_enqueue_style( 'ntt-kid-style', get_stylesheet_directory_uri(). '/assets/styles/ntt-kid.min.css' );
    }
    add_action('wp_enqueue_scripts', 'ntt_kid_styles', 0);
    
    function ntt_kid_html_css() {
        echo ' '. esc_attr( sanitize_title( $GLOBALS['ntt_kid_name'] ). '-theme' );
    }
    add_action( 'ntt_html_css_wp_hook', 'ntt_kid_html_css');
}