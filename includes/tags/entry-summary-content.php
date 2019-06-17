<?php
/**
 * Entry Summary Content
 */

if ( ! function_exists( 'ntt_entry_summary_content' ) ) {
    function ntt_entry_summary_content() {
        ?>
        <div class="ntt--entry-summary-content p-summary content ntt--cp" data-name="Entry Summary Content">
            <?php the_excerpt(); ?>
        </div>
        <?php
    }
}