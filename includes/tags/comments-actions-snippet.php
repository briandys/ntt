<?php
/**
 * Comments Actions Snippet
 */

if ( ! function_exists( 'ntt__tag__comments_actions_snippet' ) ) {
    function ntt__tag__comments_actions_snippet() {
        
        $comments_count = (int) get_comments_number( get_the_ID() );
        ?>
        <div class="ntt--comments-actions-snippet ntt--cp" data-name="Comments Actions Snippet">
            <div class="ntt--comments-count ntt--obj" data-name="Comments Count">
                <?php
                $comments_count_mu = '<span class="ntt--txt">';
                    $comments_count_mu .= '<span class="ntt--count-txt ntt--num">'. esc_html( '%1$s' ).'</span>';
                    $comments_count_mu .= ' '. '<label class="ntt--label-txt">'. esc_html( '%2$s' ). '</label>';
                $comments_count_mu .= '</span>';
                
                $single_count_label = sprintf( $comments_count_mu,
                    '&#49;',
                    _x( 'Comment', '1 Comment', 'ntt' )
                );
                
                $multi_count_label = sprintf( $comments_count_mu,
                    '%',
                    _x( 'Comments', '2 or More Comments', 'ntt' )
                );

                $zero_count_label = sprintf( $comments_count_mu,
                    '&#48;',
                    _x( 'Comment', '0 Comment', 'ntt' )
                );

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
                        <?php echo $zero_count_label; ?>
                    </a>
                    <?php
                }
                ?>
            </div>

            <?php
            // Enabled Comments
            if ( comments_open() ) {

                $comment_text = __( 'Comment', 'ntt' );

                // Add Comment Action Anchor Href
                if ( ! is_user_logged_in() && get_option( 'comment_registration' ) ) {
                    $href = wp_login_url( get_permalink(). '#comment' );
                    
                    $requirement_txt = __( 'Requires Log In', 'ntt' );
                    $requirement_mu = ' '. '<span class="ntt--requirement-txt">'. esc_html( $requirement_txt ). '</span>';
                    $requirement_attr = ' '. '('. $requirement_txt. ')';
                } else {
                    
                    if ( is_singular() ) {
                        $href = '#comment';
                    } else {
                        $href = get_permalink(). '#comment';
                    }
                    
                    $requirement_mu = '';
                    $requirement_attr = '';
                }

                $comment_creation_content_mu = '<div class="ntt--comment-axn ntt--axn ntt--obj" data-name="Comment Action">';
                    $comment_creation_content_mu .= '<a href="'. esc_url( $href ).'" title="'. esc_attr( $comment_text ). esc_attr( $requirement_attr ). '">';
                        $comment_creation_content_mu .= '<span class="ntt--txt">';
                            $comment_creation_content_mu .= '<span class="ntt--comment-text">'. esc_html( $comment_text ). '</span>';
                            $comment_creation_content_mu .= $requirement_mu;
                        $comment_creation_content_mu .= '</span>';
                    $comment_creation_content_mu .= '</a>';
                $comment_creation_content_mu .= '</div>';

            // Disabled Comments
            } else {
                
                $comment_creation_content_mu = '<div class="ntt--disabled-comments-note ntt--note ntt--cp" data-name="Disabled Comments Note">';
                    $comment_creation_content_mu .= '<p>'. esc_html__( 'Commenting is disabled.', 'ntt' ) . '</p>';
                $comment_creation_content_mu .= '</div>';
            }
            echo $comment_creation_content_mu;
            ?>
        </div>
        <?php
    }
}