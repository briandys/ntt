<?php
if ( ! function_exists( 'ntt_comments_nav' ) ) {
    function ntt_comments_nav() {
        
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
            ?>

            <div class="comments-nav adjacent-nav nav cp" data-name="Comments Navigation">
                <div class="comments-nav---cr">
                    <div class="comments-nav-name nav-name obj h" data-name="Comments Navigation Name">
                        <span class="txt"><?php esc_html_e( 'Comments Navigation', 'ntt' ); ?></span>
                    </div>
            
                    <?php
                    if ( get_next_comments_link() ) {
                        ?>

                        <div class="next-comments-navi adjacent-navi navi obj" data-name="Next Comments Navigation Item">
                            <?php
                            $next_comments_navi = '<span class="l">';
                                $next_comments_navi .= '<span class="next---text">'. esc_html_x( 'Next', '->Next<- Comments', 'ntt' ).'</span>';
                                $next_comments_navi .= ' '. '<span class="comments---text">'. esc_html_x( 'Comments', 'Previous ->Comments<-', 'ntt' ). '</span>';
                            $next_comments_navi .= '</span>';
                            next_comments_link( $next_comments_navi ); ?>
                        </div>
                        <?php
                    }
                
                    if ( get_previous_comments_link() ) {
                        ?>

                        <div class="previous-comments-navi adjacent-navi navi obj" data-name="Previous Comments Navigation Item">
                            <?php
                            $prev_comments_navi = '<span class="l">';
                                $prev_comments_navi .= '<span class="previous---text">'. esc_html_x( 'Previous', '->Previous<- Comments', 'ntt' ).'</span>';
                                $prev_comments_navi .= ' '. '<span class="comments---text">'. esc_html_x( 'Comments', 'Previous ->Comments<-', 'ntt' ). '</span>';
                            $prev_comments_navi .= '</span>';
                            previous_comments_link( $prev_comments_navi ); ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    }
}