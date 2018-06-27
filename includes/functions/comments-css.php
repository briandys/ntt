<?php

function comments_css_status() {
    
    if ( is_singular() ) {
        // Comments
        $comments_count = (int) get_comments_number( get_the_ID() );

        // Comments Population Status
        if ( $comments_count > 1 ) {
            echo ' '. 'comments--populated';
        } else {
            echo ' '. 'comments--empty';
        }

        // Comments Population Count
        if ( $comments_count == 1 ) {
            echo ' '. 'comments--single';
        } elseif ( $comments_count > 1 ) {
            echo ' '. 'comments--multiple';
        } elseif ( $comments_count == 0 ) {
            echo ' '. 'comments--zero';
        }

        // Comment Creation Ability Status
        if ( comments_open() ) {
            echo ' '. 'comment-creation--enabled';
        } else {
            echo ' '. 'comment-creation--disabled';
        }
    }
}

function ntt_comments_css() {  
    
    comments_css_status();
}
add_action( 'ntt_comment_css_wp_hook', 'ntt_comments_css');