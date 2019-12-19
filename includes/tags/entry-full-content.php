<?php
/**
 * Entry Full Content
 */

if ( ! function_exists( 'ntt_entry_full_content' ) ) {
    function ntt_entry_full_content() {
        ?>
        <div class="ntt--entry-full-content ntt--content ntt--cm--content e-content ntt--cp" data-name="Entry Full Content">
            <?php
            the_content();
            ntt_after_the_content_wp_hook();
            ?>
        </div>
        <?php
    }
}