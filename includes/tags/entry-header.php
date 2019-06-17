<?php
/**
 * Entry Header
 */

if ( ! function_exists( 'ntt_entry_header' ) ) {
    function ntt_entry_header() {
        ?>
        <header class="ntt--entry-header ntt--cn" data-name="Entry Header">
            <?php
            ntt_entry_heading();
            ntt_entry_actions();
            ntt_entry_breadcrumbs_nav();
            ntt_entry_primary_meta();
            ntt_comments_actions_snippet();
            ntt_entry_banner();
            
            if ( ( ( is_singular() || is_home() || is_archive() ) && has_excerpt() ) || is_search() ) {
                ntt_entry_summary_content();
            }
            ?>
        </header>
        <?php
    }
}