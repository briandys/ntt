<?php

function ntt_styles_scripts() {
    
    wp_enqueue_style( 'ntt-style', get_template_directory_uri(). '/assets/styles/ntt.min.css' );
    
    add_editor_style( array( 'assets/css/editor-style.css', ) );

    wp_enqueue_script( 'ntt-script', get_template_directory_uri(). '/assets/scripts/ntt.js', array( 'jquery', ), null, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'ntt_styles_scripts', 0);

function ntt_inline_scripts() { ?>
    
    <script>
        var $html = document.documentElement ;
            
        $html.className = $html.className.replace( /\bno-js\b/,'js' );
        $html.classList.add( 'dom--unready' );
        $html.classList.add( 'window--unloaded' );
    </script>

<?php }
add_action( 'wp_head', 'ntt_inline_scripts', 0 );