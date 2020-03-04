<?php
/**
 * Comment
 */

if ( ! function_exists( 'ntt__tag__comment') ) {
    function ntt__tag__comment( $comment, $args, $depth ) {
        
        $comment_author = wp_get_current_commenter();
        $comment_url = get_comment_link( $comment->comment_ID );
        $comment_id = get_comment_ID();

        // Comment Hierarchy CSS
        if ( $args['has_children'] === true ) {
            $comment_hierarchy_css = 'ntt--parent-comment';
        } else {
            $comment_hierarchy_css = 'ntt--single-comment';
        }

        // Default Comment Author Avatar Type
        if ( get_option( 'avatar_default' ) == 'blank' ) {
            $comment_author_avatar_type_css = 'ntt--default-comment-author-avatar---default';
        } else {
            $comment_author_avatar_type_css = 'ntt--default-comment-author-avatar---custom';
        }

        // Threaded Comments Limit Status
        if ( get_option( 'thread_comments' ) && $args['max_depth'] == $depth ) {
            $comments_thread_limit_css = 'ntt--comments-thread-limit---max';
        } else {
            $comments_thread_limit_css = '';
        }

        // Comment Approval Status
        if ( $comment->comment_approved == 0 ) {
            $comments_approval_css = 'ntt--comment-approval---unapproved';
        } else {
            $comments_approval_css = 'ntt--comment-approval---approved';
        }

        // Additional CSS Classes
        $r_comment_css = array(
            'ntt--comment--'. $comment_id,
            'ntt--comment',
            'ntt--cp',
            $comment_hierarchy_css,
            $comment_author_avatar_type_css,
            $comments_thread_limit_css,
            $comments_approval_css,
            'p-comment',
            'h-entry',
        );
        
        foreach ( $r_comment_css as $comment_css ) {
            $classes[] = $comment_css;
        }

        $classes = array_map( 'esc_attr', $classes );
        ?>

        <li id="comment-<?php echo esc_attr( $comment_id ); ?>" <?php comment_class( $classes ); ?> data-name="Comment">
            <div class="ntt--comment-header ntt--cn" data-name="Comment Header">
                <?php
                if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {
                    ?>
                    <div class="ntt--comment-name ntt--obj">
                        <span class="ntt--txt"><?php echo esc_html__( 'Comment', 'ntt' ). ' '. esc_html( $comment_id ); ?></span>
                    </div>
                    <div class="ntt--comment-axns ntt--cp" data-name="Comment Actions">
                        <?php ntt__tag__comment_admin_actions(); ?>
                    </div>
                    <?php
                }
                ?>
                <div class="ntt--comment-meta ntt--cm-meta ntt--cp" data-name="Comment Meta">
                    <?php
                    ntt__tag__comment_datetime( $comment );
                    ntt__tag__comment_author( $comment, $args );
                    ?>
                </div>
            </div>
            <div class="ntt--comment-main ntt--cn" data-name="Comment Main">
                <div class="ntt--comment-content ntt--content-trunk ntt--cm--content-trunk ntt--cp" data-name="Comment Content">
                    <div class="ntt--comment-full-content ntt--content ntt--cm--content ntt--cp e-content" data-name="Comment Full Content">
                        <?php
                        // Appears for not logged in users and those who opt-in to save info in cookie
                        // Settings > Discussion > Show comments cookies opt-in checkbox.
                        if ( $comment->comment_approved == 0 ) {
                            ?>
                            <div class="ntt--unapproved-comments-note ntt--note ntt--cp" data-name="Unapproved Comments Note">
                                <p><?php esc_html_e( 'Your comment is awaiting moderation.', 'ntt' ); ?></p>
                            </div>
                            <?php
                        }
                        comment_text();
                        ?>
                    </div>
                </div>
            </div>

            <?php
            if ( comments_open() && get_option( 'thread_comments' ) && $depth < $args['max_depth'] ) {
                ?>
                <div class="ntt--comment-footer ntt--cn" data-name="Comment Footer">
                    <div class="ntt--comment-axns ntt--cp" data-name="Comment Actions">
                        <?php
                        $reply_text = __( 'Reply', 'ntt' );
                        $requirement_txt = __( 'Requires Log In', 'ntt' );
                        ?>
                        <div class="ntt--comment-reply-axn ntt--axn ntt--obj" data-name="Comment Reply Action">
                            <?php
                            comment_reply_link(
                                array_merge(
                                    $args,
                                    array(
                                        'add_below'     => 'comment',
                                        'depth'         => $depth,
                                        'max_depth'     => $args['max_depth'],
                                        'reply_text'    => '<span title="'. esc_attr( $reply_text ). ' '. '('. esc_attr( $requirement_txt ). ')'. '" class="ntt--txt"><span class="ntt--reply-text">'. esc_html( $reply_text ). '</span></span>',
                                        'login_text'    => '<span title="'. esc_attr( $reply_text ). ' '. '('. esc_attr( $requirement_txt ). ')'. '" class="ntt--txt"><span class="ntt--reply-text">'. esc_html( $reply_text ). '</span>'. ' '. '<span class="ntt--requirement-txt">'. esc_html( $requirement_txt ). '</span>'. '</span>',
                                    )
                                )
                            );
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </li>
        <?php
    }
}