<?php
if ( ! function_exists( 'ntt_comment_admin_actions') ) {
    function ntt_comment_admin_actions() {

        if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {
            
            // Variables: Comment Name
            $comment_text = esc_html__( 'Comment', 'ntt' );
            $comment_id = get_comment_ID();
            
            $comment_name_title_attr = $comment_text. ' '. $comment_id;
            
            $label_mu = '<span class="modify-comment-axn---l" title="Edit'. ' '. $comment_name_title_attr. '"><span class="modify-comment-axn---text">'. esc_html__( 'Edit', 'ntt' ).'</span> <span class="comment-name---txt">'. $comment_text. ' '. $comment_id. '</span></span>'; ?>

            <div class="comment-admin-axns admin-axns axns cp" data-name="Comment Admin Actions">
                <div class="comment-admin-axns---cr">
                    <div class="modify-comment-axn modify-axn p-modify axn obj" aria-label="Edit Comment" data-name="Modify Comment Action">
                    <?php echo edit_comment_link( $label_mu, '', '' ); ?>
                    </div>
                </div>
            </div>
        
        <?php }

    }
}