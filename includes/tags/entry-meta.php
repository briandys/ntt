<?php
/** Entry Primary Meta
 * 
 * Located in Entry Header
 */
if ( ! function_exists( 'ntt_entry_primary_meta' ) ) {
    function ntt_entry_primary_meta() {
        ?>
        <div class="entry-primary-meta cp" data-name="Entry Primary Meta">
            <div class="entry-primary-meta---cr">
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

/** Entry Secondary Meta
 * 
 * Located in Entry Footer
 */
if ( ! function_exists( 'ntt_entry_secondary_meta' ) ) {
    function ntt_entry_secondary_meta() {

        if ( get_the_tag_list() ) {
            ?>
            <div class="entry-secondary-meta cp" data-name="Entry Secondary Meta">
                <div class="cr">
                    <?php ntt_entry_tags(); ?>
                </div>
            </div>
            <?php
        }
    }
}