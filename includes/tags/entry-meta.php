<?php
// Within Entry Header
if ( ! function_exists( 'ntt_entry_meta_primary' ) ) {
    function ntt_entry_meta_primary() {
        ?>
        <div class="entry-meta cp" data-name="Entry Meta">
            <div class="cr">
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

// Within Entry Footer
if ( ! function_exists( 'ntt_entry_meta_secondary' ) ) {
    function ntt_entry_meta_secondary() {

        if ( get_the_category_list() || get_the_tag_list() ) {
            ?>
            <div class="entry-meta cp" data-name="Entry Meta">
                <div class="cr">
                    <?php
                    ntt_entry_categories();
                    ntt_entry_tags();
                    ?>
                </div>
            </div>
            <?php
        }
    }
}