<?php
if ( ! function_exists( 'ntt_entry_summary_content' ) ) {
    function ntt_entry_summary_content() {
        ?>
        <div class="entry-summary-content p-summary content cp" data-name="Entry Summary Content">
            <div class="cr">
                <?php the_excerpt(); ?>
            </div>
        </div>
        <?php
    }
}