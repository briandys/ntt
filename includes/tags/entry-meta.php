<?php
/** Entry Primary Meta
 * 
 * Located in Entry Header
 */

if ( ! function_exists( 'ntt__tag__entry_primary_meta' ) ) {
    function ntt__tag__entry_primary_meta() {
        ?>
        <div class="ntt--entry-primary-meta ntt--cp" data-name="Entry Primary Meta">
            <?php ntt__tag__entry_primary_meta__structure(); ?>
        </div>
        <?php
    }
}

/** Entry Secondary Meta
 * 
 * Located in Entry Footer
 */

if ( ! function_exists( 'ntt__tag__entry_secondary_meta' ) ) {
    function ntt__tag__entry_secondary_meta() {

        if ( get_the_tag_list() ) {
            ?>
            <div class="ntt--entry-secondary-meta ntt--cp" data-name="Entry Secondary Meta">
                <?php ntt__tag__entry_tags(); ?>
            </div>
            <?php
        }
    }
}

/** Entry Primary Meta Content
 */

if ( ! function_exists( 'ntt__tag__entry_primary_meta__structure' ) ) {
    function ntt__tag__entry_primary_meta__structure() {
        
        ntt__tag__entry_datetime();
        ntt__tag__entry_author();
        ntt__tag__entry_categories();
    }
}