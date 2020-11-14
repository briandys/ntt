<?php
/**
 * Search Results Entity Validation
 * True or false test if the current view is Search page with search results
 */
function ntt__function__search_results__entity_validation( $match = true ) {

    global $wp_query;
    $found_posts = $wp_query->found_posts;

    if ( true === $match && is_search() && $found_posts >= 1 ) {
        return true;
    } else if ( false === $match && is_search() && $found_posts == 0 ) {
        return true;
    } else {
        return;
    }
}