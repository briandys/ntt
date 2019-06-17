<?php
/** Entry Primary Meta
 * 
 * Located in Entry Header
 */

if ( ! function_exists( 'ntt_entry_primary_meta' ) ) {
    function ntt_entry_primary_meta() {
        ?>
        <div class="ntt--entry-primary-meta ntt--cp" data-name="Entry Primary Meta">
            <?php
            ntt_entry_datetime();
            ntt_entry_author();
            ntt_entry_categories();
            ?>
        </div>
        <?php
    }
}

/** Entry Secondary Meta
 * 
 * Located in Entry Footer
 */

if ( ! function_exists( 'ntt_entry_secondary_meta' ) ) {
    function ntt_entry_secondary_meta() {

        if ( get_the_tag_list() ) {
            ?>
            <div class="ntt--entry-secondary-meta ntt--cp" data-name="Entry Secondary Meta">
                <?php ntt_entry_tags(); ?>
            </div>
            <?php
        }
    }
}