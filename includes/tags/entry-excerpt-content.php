<?php
/**
 * Entry Excerpt Content
 */

if ( ! function_exists( 'ntt__tag__entry_excerpt_content' ) ) {
    function ntt__tag__entry_excerpt_content() {
        ?>
        <div class="ntt--entry-excerpt-content ntt--content ntt--cm--content ntt--cp p-summary" data-name="Entry Summary Content">
            <?php the_excerpt(); ?>
        </div>
        <?php
    }
}