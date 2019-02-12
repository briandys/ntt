<?php
if ( ! function_exists( 'ntt_comments_actions_snippet' ) ) {
    function ntt_comments_actions_snippet() {
        
        $comments_count = (int) get_comments_number( get_the_ID() );
        ?>

        <div class="comments-actions-snippet cp" data-name="Comments Actions Snippet">
            <div class="comments-actions-snippet---cr">

                <div class="comments-population cp" data-name="Comments Population">
                    <div class="comments-population---cr">

                        <div class="comments-count count obj" data-name="Comments Count">
        
                        <?php
                        $single_count_label = '<span class="comment-count---txt num">&#49;</span>';
                        $single_count_label .= ' '. '<span class="comment---text">'. esc_html_x( 'Comment', '1 Comment', 'ntt' ). '</span>';
                        
                        $multi_count_label = '<span class="comment-count---txt num">%</span>';
                        $multi_count_label .= ' '. '<span class="comments---text">'. esc_html_x( 'Comments', '[Number of Comments] Comments', 'ntt' ). '</span>';
                    
                        $zero_count_label_mu = '<span class="comment-count---txt num">&#48;</span>';
                        $zero_count_label_mu .= ' '. '<span class="comment---text">'. esc_html_x( 'Comment', '0 Comment', 'ntt' ). '</span>';
            
                        // Populated Comments
                        if ( $comments_count >= 1 ) {
                            comments_popup_link(
                                '',                     // Zero Count
                                $single_count_label,    // Single Count
                                $multi_count_label,     // Multiple Count
                                '',                     // <a class="">
                                ''                      // Comments Disabled
                            );
                        
                        // Empty Comments
                        } else {
                            
                            if ( is_singular() ) {
                                $comments_count_link = '';
                            } else {
                                $comments_count_link = get_permalink();
                            }
                            ?>
                            
                            <a href="<?php echo esc_url( $comments_count_link ). '#comments' ?>">
                                <?php echo $zero_count_label_mu; ?>
                            </a>
                            <?php
                        }
                        ?>
                        </div>
                    </div>
                </div>

                <?php
                // Enabled Comments
                if ( comments_open() ) {

                    // Add Comment Action Anchor Href
                    if ( ! is_user_logged_in() && get_option( 'comment_registration' ) ) {
                        $href = wp_login_url( get_permalink(). '#comment' );
                        $requires_log_in_text = __( 'Requires Log In', 'ntt' );
                        $requires_log_in_mu = ' '. '<span class="requires-log-in---text">'. esc_html( $requires_log_in_text ). '</span>';
                        $requires_log_in_text_attr = ' '. '('. $requires_log_in_text. ')';
                    } else {
                        
                        if ( is_singular() ) {
                            $href = '#comment';
                        } else {
                            $href = get_permalink(). '#comment';
                        }
                        $requires_log_in_text = '';
                        $requires_log_in_mu = '';
                        $requires_log_in_text_attr = '';
                    }

                    $comment_creation_content_mu = '<div class="add-comment-axn add-axn axn obj" data-name="Add Comment Action">';
                        $comment_creation_content_mu .= '<a href="'. esc_url( $href ).'" title="'. esc_attr__( 'Add Comment', 'ntt' ). esc_attr( $requires_log_in_text_attr ). '">';
                            $comment_creation_content_mu .= '<span class="axn---line">';
                                $comment_creation_content_mu .= '<span class="add---text">'. esc_html_x( 'Add', 'Add Comment', 'ntt' ). '</span>';
                                $comment_creation_content_mu .= ' '. '<span class="comment---text">'. esc_html_x( 'Comment', 'Add Comment', 'ntt' ). '</span>';
                            $comment_creation_content_mu .= '</span>';
                            $comment_creation_content_mu .= $requires_log_in_mu;
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

                echo $comment_creation_content_mu;
                ?>
                
            </div>
        </div>
        <?php
    }
}