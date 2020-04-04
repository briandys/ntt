<?php
/**
 * Entry Full Content
 */

if ( ! function_exists( 'ntt__tag__entry_full_content' ) ) {
    function ntt__tag__entry_full_content() {
        ?>
        <div class="ntt--entry-full-content ntt--content ntt--cm--content e-content ntt--cp" data-name="Entry Full Content">
            <?php
            the_content();
            ntt__wp_hook__the_content___after();
            ?>
        </div>
        <?php
        ntt__wp_hook__entry_full_content___after();
    }
}