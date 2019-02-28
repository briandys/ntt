<?php
if ( ! function_exists( 'ntt_comment_admin_actions') ) {
    function ntt_comment_admin_actions() {

        if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {
            $edit_text = __( 'Edit', 'ntt' );
            ?>
            <div class="modify-comment-axn obj" aria-label="Edit Comment">
                <?php echo edit_comment_link( '<span title="'. esc_attr( $edit_text ). '" class="txt">'. esc_html( $edit_text ).'</span>', '', '' ); ?>
            </div>
            <?php
        }
    }
}