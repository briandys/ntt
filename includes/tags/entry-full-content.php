<?php

if ( ! function_exists( 'ntt_entry_full_content' ) ) {
    function ntt_entry_full_content() {
        global $post;
        
        if( $post->post_content !== '' || is_attachment() || has_action( 'ntt_after_the_content_wp_hook' ) ) {
            ?>
            <div class="entry-full-content full-content e-content content cp" data-name="Entry Full Content">
                <div class="entry-full-content---cr content---cr">
                    <?php
                    the_content();
                    ntt_after_the_content_wp_hook();
                    ?>
                </div>
            </div>
            <?php
        }
    }
}