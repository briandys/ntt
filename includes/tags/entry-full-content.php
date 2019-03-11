<?php
if ( ! function_exists( 'ntt_entry_full_content' ) ) {
    function ntt_entry_full_content() {
        ?>
        <div class="entry-full-content e-content content cp" data-name="Entry Full Content">
            <div class="entry-full-content---cr content---cr">
                <?php
                the_content();
                ntt_after_the_content_wp_hook();
                ?>
            </div>
        </div>
        <?php
    }
}