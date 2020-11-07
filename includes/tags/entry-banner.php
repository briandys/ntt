<?php
/**
 * Entry Banner
 */

if ( ! function_exists( 'ntt__tag__entry_banner' ) ) {
    function ntt__tag__entry_banner() {

        if ( get_the_post_thumbnail() !== '' ) {
            ?>
            <div class="ntt--entry-banner ntt--cp" data-name="Entry Banner">
            <?php ntt__tag__entry_banner_visuals(); ?>
            </div>
        <?php
        }
    }
}