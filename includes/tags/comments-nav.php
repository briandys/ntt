<?php

if ( ! function_exists( 'ntt_comments_nav' ) ) {
    function ntt_comments_nav() {
        
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>

            <div class="comments-nav adjacent-nav nav cp" data-name="Comments Navigation">
                <div class="comments-nav---cr">
                    <div class="comments-nav-name nav-name name obj h">
                        <span class="comments-nav-name---l">
                            <span class="comments-nav---txt"><?php esc_html_e( 'Comments Nav', 'ntt' ); ?></span>
                        </span>
                    </div>
            
                <?php if ( get_next_comments_link() ) { ?>

                    <div class="next-comments-navi adjacent-navi navi obj" data-name="Next Comments Navi">
                        <?php $next_comments_navi = '<span class="next-comments-navi---l">';
                            $next_comments_navi .= '<span class="next---txt">'. esc_html_x( 'Next', 'Component: Next Comments Navi | Usage: >Next< Comments', 'ntt' ).'</span>';
                            $next_comments_navi .= ' '. '<span class="comments---txt">'. esc_html_x( 'Comments', 'Component: Next Comments Navi | Usage: Previous >Comments<', 'ntt' ). '</span>';
                        $next_comments_navi .= '</span>';
                        next_comments_link( $next_comments_navi ); ?>
                    </div>
                
                <?php }
            
                if ( get_previous_comments_link() ) { ?>

                    <div class="previous-comments-navi adjacent-navi navi obj" data-name="Previous Comments Navi">
                        <?php $prev_comments_navi = '<span class="previous-comments-navi---l">';
                            $prev_comments_navi .= '<span class="previous---txt">'. esc_html_x( 'Previous', 'Component: Previous Comments Navi | Usage: >Previous< Comments', 'ntt' ).'</span>';
                            $prev_comments_navi .= ' '. '<span class="comments---txt">'. esc_html_x( 'Comments', 'Component: Previous Comments Navi | Usage: Previous >Comments<', 'ntt' ). '</span>';
                        $prev_comments_navi .= '</span>';
                        previous_comments_link( $prev_comments_navi ); ?>
                    </div>
                
                <?php } ?>

                </div>
            </div>

        <?php }
    }
}