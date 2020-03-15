<?php
/**
 * Entry Summary Content
 */

if ( ! function_exists( 'ntt__tag__entry_secondary_meta__structure' ) ) {
    function ntt__tag__entry_secondary_meta__structure() {
        ?>
        <div class="ntt--entry-summary-content ntt--content ntt--cm--content ntt--cp p-summary" data-name="Entry Summary Content">
            <?php the_excerpt(); ?>
        </div>
        <?php
    }
}