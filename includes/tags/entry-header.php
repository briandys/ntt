<?php
/**
 * Entry Header
 */

if ( ! function_exists( 'ntt__tag__entry_header' ) ) {
    function ntt__tag__entry_header() {
        ?>
        <header class="ntt--entry-header ntt--cn" data-name="Entry Header">
            <?php ntt__tag__entry_header__content(); ?>
        </header>
        <?php
    }
}

/**
 * Entry Header Content
 */

if ( ! function_exists( 'ntt__tag__entry_header__content') ) {
    function ntt__tag__entry_header__content() {

        ntt__tag__entry_heading();
        ntt__tag__entry_actions();
        ntt__tag__entry_breadcrumbs_nav();
        ntt__tag__entry_primary_meta();
        ntt__tag__comments_actions_snippet();
        
        if ( ( ( is_singular() || is_home() || is_archive() ) && has_excerpt() ) || is_search() ) {
            ntt__tag__entry_secondary_meta__content();
        }

        ntt__tag__entry_banner();
    }
}