<?php
if ( ! function_exists( 'ntt_comment_admin_actions') ) {
    function ntt_comment_admin_actions() {

        if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {
            ?>
            <div aria-label="Edit Comment" class="modify-comment-axn axn obj">
                <?php echo edit_comment_link( '<span title="'. esc_attr__( 'Edit', 'ntt' ). '" class="txt">'. esc_html__( 'Edit', 'ntt' ).'</span>', '', '' ); ?>
            </div>
            <?php
        }
    }
}