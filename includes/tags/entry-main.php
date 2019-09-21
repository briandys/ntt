<?php
/**
 * Entry Main
 */

if ( ! function_exists( 'ntt_entry_main' ) ) {
    function ntt_entry_main() {
        
        if ( ( is_singular() || is_home() || is_archive() ) && ! is_search() ) {
            ?>
            <main class="ntt--entry-main ntt--cn" data-name="Entry Main">
                <div class="ntt--entry-content ntt--content-trunk ntt--cp" data-name="Entry Content">
                    <?php ntt_entry_full_content(); ?>
                </div>
            </main>
            <?php
        }
    }
}