<?php
/**
 * content.php, content-none.php
 */
function ntt_before_entry_name_wp_hook() {
    do_action( 'ntt_before_entry_name_wp_hook' );
}

function ntt_after_entry_name_wp_hook() {
    do_action( 'ntt_after_entry_name_wp_hook' );
}

function ntt_after_entry_content_hook() {
    do_action( 'ntt_after_entry_content_hook' );
}

/**
 * entry-full-content.php
 */
function ntt_after_the_content_wp_hook() {
    do_action( 'ntt_after_the_content_wp_hook' );
}

/**
 * header.php
 */
function ntt_before_entity_primary_heading_hook() {
    do_action( 'ntt_before_entity_primary_heading_hook' );
}

function ntt_after_entity_primary_heading_hook() {
    do_action( 'ntt_after_entity_primary_heading_hook' );
}