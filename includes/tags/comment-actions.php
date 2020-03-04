<?php
/**
 * Comment Actions
 */

if ( ! function_exists( 'ntt__tag__comment_admin_actions') ) {
    function ntt__tag__comment_admin_actions() {

        if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {
            ?>
            <div aria-label="<?php echo esc_attr__( 'Edit Comment', 'ntt' ); ?>" class="ntt--modify-comment-axn ntt--axn ntt--obj">
                <?php echo edit_comment_link( '<span title="'. esc_attr__( 'Edit', 'ntt' ). ' '. esc_attr__( 'Comment', 'ntt' ). ' '. esc_attr( get_comment_ID() ). '" class="ntt--txt">'. esc_html__( 'Edit', 'ntt' ).'</span>', '', '' ); ?>
            </div>
            <?php
        }
    }
}