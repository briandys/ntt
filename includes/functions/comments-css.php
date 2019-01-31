<?php
function ntt_comments_css() {
    
    if ( is_singular() ) {
        // Comments
        $comments_count = (int) get_comments_number( get_the_ID() );

        // Comments Population Status
        if ( $comments_count >= 1 ) {
            $css[] = 'comments--populated';
        } else {
            $css[] = 'comments--empty';
        }

        // Comments Population Count
        if ( $comments_count == 1 ) {
            $css[] = 'comments--single';
        } elseif ( $comments_count > 1 ) {
            $css[] = 'comments--multiple';
        } elseif ( $comments_count == 0 ) {
            $css[] = 'comments--zero';
        }

        // Comment Creation Ability Status
        if ( comments_open() ) {
            $css[] = 'comment-creation--enabled';
        } else {
            $css[] = 'comment-creation--disabled';
        }

        echo ' '. implode( ' ', $css );
    }
}
add_action( 'ntt_comments_css_wp_hook', 'ntt_comments_css');

function ntt_comments_html_css() {
    
    if ( is_singular() ) {
        // Comments
        $comments_count = (int) get_comments_number( get_the_ID() );

        // Comments Population Status
        if ( $comments_count > 1 ) {
            $css[] = 'populated-comments-view';
        } else {
            $css[] = 'empty-comments-view';
        }

        // Comments Population Count
        if ( $comments_count == 1 ) {
            $css[] = 'single-comment-view';
        } elseif ( $comments_count > 1 ) {
            $css[] = 'multiple-comments-view';
        } elseif ( $comments_count == 0 ) {
            $css[] = 'zero-comment-view';
        }

        // Comment Creation Ability Status
        if ( comments_open() ) {
            $css[] = 'enabled-comment-creation-view';
        } else {
            $css[] = 'disabled-comment-creation-view';
        }

        echo ' '. implode( ' ', $css );
    }
}
add_action( 'ntt_html_css_wp_hook', 'ntt_comments_html_css');

