<?php
/**
 * Entry Summary Content
 */

if ( ! function_exists( 'ntt__tag__entry_secondary_meta__content' ) ) {
    function ntt__tag__entry_secondary_meta__content() {
        ?>
        <div class="ntt--entry-summary-content ntt--content ntt--cm--content ntt--cp p-summary" data-name="Entry Summary Content">
            <?php the_excerpt(); ?>
        </div>
        <?php
    }
}