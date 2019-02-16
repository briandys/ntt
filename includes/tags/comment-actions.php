<?php
if ( ! function_exists( 'ntt_comment_admin_actions') ) {
    function ntt_comment_admin_actions() {

        if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {
            
            $comment_text = __( 'Comment', 'ntt' );
            $comment_id = get_comment_ID();
            
            $comment_name_title_attr = $comment_text. ' '. $comment_id;
            
            $label_mu = '<span title="Edit'. ' '. esc_attr( $comment_name_title_attr ). '">';
                $label_mu .= '<span class="edit---text">'. esc_html__( 'Edit', 'ntt' ).'</span>';
                $label_mu .= ' '. '<span class="comment-name---txt">'. esc_html( $comment_text ). ' '. esc_html( $comment_id ). '</span>';
            $label_mu .= '</span>';
            ?>

            <div class="comment-admin-axns admin-axns cp" data-name="Comment Admin Actions">
                <div class="cr">
                    <div class="modify-comment-axn modify-axn p-modify axn obj" aria-label="Edit Comment" data-name="Modify Comment Action">
                        <?php echo edit_comment_link( $label_mu, '', '' ); ?>
                    </div>
                </div>
            </div>
        
        <?php }

    }
}