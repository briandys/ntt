<?php
/**
 * Entry Header Content
 */

if ( ! function_exists( 'ntt_entry_header_content') ) {
    function ntt_entry_header_content() {

        ntt_entry_heading();
        ntt_entry_actions();
        ntt_entry_breadcrumbs_nav();
        ntt_entry_primary_meta();
        ntt_comments_actions_snippet();
        
        if ( ( ( is_singular() || is_home() || is_archive() ) && has_excerpt() ) || is_search() ) {
            ntt_entry_summary_content();
        }

        ntt_entry_banner();
    }
}