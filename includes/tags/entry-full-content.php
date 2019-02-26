<?php
if ( ! function_exists( 'ntt_entry_full_content' ) ) {
    function ntt_entry_full_content() {
        
        global $post;
        
        if( $post->post_content !== '' || is_attachment() ) {
            ?>
            <div class="entry-full-content e-content content cp" data-name="Entry Full Content">
                <div class="entry-full-content---cr">
                    <?php
                    the_content();
                    ?>
                </div>
            </div>
            <?php
        }
    }
}