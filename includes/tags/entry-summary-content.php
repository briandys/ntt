<?php

if ( ! function_exists( 'ntt_entry_summary_content' ) ) {
    function ntt_entry_summary_content() {
        ?>
        <div class="entry-summary-content summary-content p-summary content cp" data-name="Entry Summary Content">
            <div class="entry-summary-content---cr content---cr">
                <?php the_excerpt(); ?>
            </div>
        </div>
        <?php
    }
}