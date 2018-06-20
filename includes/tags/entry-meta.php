<?php

if ( ! function_exists( 'ntt_entry_meta_primary' ) ) {
    function ntt_entry_meta_primary() {
        ?>
        <div class="cm-meta entry-meta meta cp" data-name="Entry Meta">
            <div class="cm-meta---cr entry-meta---cr">
                <?php
                ntt_entry_datetime();
                ntt_entry_author();
                ntt_entry_categories();
                ?>
            </div>
        </div>
        <?php
    }
}

if ( ! function_exists( 'ntt_entry_meta_secondary' ) ) {
    function ntt_entry_meta_secondary() {
        ?>
        <div class="cm-meta entry-meta meta cp" data-name="Entry Meta">
            <div class="cm-meta---cr entry-meta---cr">
                <?php ntt_entry_tags(); ?>
            </div>
        </div>
        <?php
    }
    add_action( 'ntt_entry_footer_wp_hook', 'ntt_entry_meta_secondary');
}