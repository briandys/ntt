<?php
/**
 * NTT Entry Main
 */

if ( ! function_exists( 'ntt_entry_main' ) ) {
    function ntt_entry_main() {
        if ( ( is_singular() || is_home() || is_archive() ) && ! is_search() ) {
            ?>
            <main class="entry-main cn" data-name="Entry Main">
                <div class="entry-main---cr">
                    <div class="entry-content content-trunk cp" data-name="Entry Content">
                        <div class="entry-content---cr">
                            <?php ntt_entry_full_content(); ?>
                        </div>
                    </div>
                    <?php ntt_after_entry_content_wp_hook(); ?>
                </div>
            </main>
            <?php
        }
    }
}