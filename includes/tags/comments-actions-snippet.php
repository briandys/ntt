<?php

if ( ! function_exists( 'ntt_comments_actions_snippet' ) ) {
    function ntt_comments_actions_snippet() {
        
        $comments_int = (int) get_comments_number( get_the_ID() );
        
        if ( $comments_int == 1 ) {
            $population_status = 'populated-comments populated-comments--single';
        } elseif ( $comments_int > 1 ) {
            $population_status = 'populated-comments populated-comments--multi';
        } elseif ( $comments_int == 0 ) {
            $population_status = 'empty-comments';
        }
        
        if ( comments_open() ) {
            $ability_status = 'enabled-comments';
        } else {
            $ability_status = 'disabled-comments';
        } ?>

        <div class="comments-actions-snippet <?php echo esc_attr( $population_status ). ' '. esc_attr( $ability_status ); ?> cp" data-name="Comments Actions Snippet">
            <div class="comments-actions-snippet---cr">

                <div class="comments-population cp" data-name="Comments Population">
                    <div class="comments-population---cr">

                        <div class="comments-count count obj" data-name="Comments Count">
        
                        <?php $comments_count_css = 'comments-count---a a';
                        
                        $single_count_label = '<span class="comments-count---l">';
                            $single_count_label .= '<span class="one---txt comments-count---txt num txt">&#49;</span>';
                            $single_count_label .= ' '. '<span class="comment---text">'. esc_html_x( 'Comment', 'Component: Comments Population | Usage: 1 >Comment<', 'ntt' ). '</span>';
                        $single_count_label .= '</span>';
                    
                        $multi_count_label = '<span class="comments-count---l">';
                            $multi_count_label .= '<span class="number---txt comments-count---txt num txt">%</span>';
                            $multi_count_label .= ' '. '<span class="comment---text">'. esc_html_x( 'Comments', 'Component: Comments Population | Usage: 2 >Comments<', 'ntt' ). '</span>';
                        $multi_count_label .= '</span>';
                    
                        $zero_count_label_mu = '<span class="comments-count---l">';
                            $zero_count_label_mu .= '<span class="zero---txt comments-count---txt num txt">&#48;</span>';
                            $zero_count_label_mu .= ' '. '<span class="comment---text">'. esc_html_x( 'Comment', 'Component: Comments Population | Usage: 0 >Comment<', 'ntt' ). '</span>';
                        $zero_count_label_mu .= '</span>';
            
                        // Populated Comments
                        if ( $comments_int >= 1 ) {
                            comments_popup_link(
                                '',                     // Zero Count
                                $single_count_label,    // Single Count
                                $multi_count_label,     // Multiple Count
                                $comments_count_css,    // <a class="">
                                ''                      // Comments Disabled
                            );
                        
                        // Empty Comments
                        } else {
                            
                            if ( is_singular() ) {
                                $comments_count_link = '';
                            } else {
                                $comments_count_link = get_permalink();
                            } ?>
                            
                            <a href="<?php echo esc_url( $comments_count_link ). '#comments' ?>" class="<?php echo esc_attr( $comments_count_css ); ?>"><?php echo $zero_count_label_mu; ?></a>
                        
                        <?php } ?>

                        </div>
                    </div>
                </div>

                <?php // Enabled Comments
                if ( comments_open() ) {
                    
                    // Add Comment Action Anchor Href
                    if ( ! is_user_logged_in() && get_option( 'comment_registration' ) ) {   
                        $href = wp_login_url( get_permalink(). '#comment' );
                    } else {
                        
                        if ( is_singular() ) {
                            $href = '#comment';
                        } else {
                            $href = get_permalink(). '#comment';
                        }
                    }

                    $comment_creation_content_mu = '<div class="add-comment-axn add-axn axn obj" data-name="Add Comment Action">';
                        $comment_creation_content_mu .= '<a href="'. esc_url( $href ).'" class="add-comment-axn---a a" title="'. esc_attr__( 'Add Comment', 'ntt' ).'">';
                        $comment_creation_content_mu .= '<span class="add-comment-axn---l">';
                                $comment_creation_content_mu .= '<span class="axn---line line"><span class="add---text">'. esc_html_x( 'Add', 'Object: Add Comment Action | Usage: >Add< Comment', 'ntt' ). ' '. '</span><span class="comment---text">'. esc_html_x( 'Comment', 'Object: Add Comment Action | Usage: Add >Comment<', 'ntt' ). '</span></span>';
                            
                            if ( ! is_user_logged_in() && get_option( 'comment_registration' ) ) {
                                $comment_creation_content_mu .= ' '. '<span class="requires-log-in-note---txt">'. esc_html__( 'Requires Log In', 'ntt' ). '</span>';
                            }
                            
                            $comment_creation_content_mu .= '</span>';
                        $comment_creation_content_mu .= '</a>';
                    $comment_creation_content_mu .= '</div>';

                // Disabled Comments
                } else {
                    
                    $comment_creation_content_mu = '<div class="disabled-comments-note note cp" data-name="Disabled Comments Note">';
                        $comment_creation_content_mu .= '<div class="disabled-comments-note---cr note---cr">';
                            $comment_creation_content_mu .= '<p>'. esc_html__( 'Commenting is disabled.', 'ntt' ) . '</p>';
                        $comment_creation_content_mu .= '</div>';
                    $comment_creation_content_mu .= '</div>';
                    
                }
                
                echo $comment_creation_content_mu; ?>
                
            </div>
        </div>

    <?php }
}