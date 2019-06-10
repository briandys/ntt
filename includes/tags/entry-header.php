<?php
/**
 * NTT Entry Header
 */

if ( ! function_exists( 'ntt_entry_header' ) ) {
    function ntt_entry_header() {
        ?>
        <header class="entry-header cn" data-name="Entry Header">
            <div class="entry-header---cr">
                <?php
                ntt_entry_heading();
                ntt_entry_admin_actions();
                ntt_entry_breadcrumbs_nav();
                ntt_entry_primary_meta();
                ntt_comments_actions_snippet();
                ntt_entry_banner();
                
                if ( ( ( is_singular() || is_home() || is_archive() ) && has_excerpt() ) || is_search() ) {
                    ntt_entry_summary_content();
                }
                ?>
            </div>
        </header>
        <?php
    }
}