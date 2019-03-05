<?php
if ( ! function_exists( 'ntt_comment') ) {
    function ntt_comment( $comment, $args, $depth ) {
        
        $commenter = wp_get_current_commenter();
        $comment_url = get_comment_link( $comment->comment_ID );
        $comment_id = get_comment_ID();

        // Comment Hierarchy CSS
        if ( true === $args['has_children'] ) {
            $comment_hierarchy_css = 'parent-comment';
        } else {
            $comment_hierarchy_css = 'single-comment';
        }

        // Default Commenter Avatar Type
        if ( get_option( 'avatar_default' ) == 'blank' ) {
            $commenter_avatar_type_css = 'default-commenter-avatar--default';
        } else {
            $commenter_avatar_type_css = 'default-commenter-avatar--custom';
        }

        // Threaded Comments Limit Status
        if ( get_option( 'thread_comments' ) && $depth == $args['max_depth'] ) {
            $comments_thread_limit_css = 'comments-thread-limit--max';
        } else {
            $comments_thread_limit_css = '';
        }

        $r_comment_css = array(
            'comment-'. $comment_id,
            'p-comment',
            'h-entry',
            'cp',
            $comment_hierarchy_css,
            $commenter_avatar_type_css,
            $comments_thread_limit_css,
        );
        
        foreach ( $r_comment_css as $comment_css ) {
            $classes[] = $comment_css;
        }

        $classes = implode( ' ', $classes );
        ?>

        <li id="comment-<?php echo esc_attr( $comment_id ); ?>" <?php comment_class( $classes ); ?> data-name="Comment">
            <div class="comment---cr">
                <div class="comment-header cn" data-name="Comment Header">
                    <div class="comment-header---cr">
                        <?php
                        if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {
                            ?>
                            <div class="comment-name obj">
                                <span class="txt"><?php echo esc_html__( 'Comment', 'ntt' ). ' '. esc_html( $comment_id ); ?></span>
                            </div>
                            <div class="comment-axns cm-axns-trunk cp" data-name="Comment Actions">
                                <div class="comment-axns---cr">
                                    <?php ntt_comment_admin_actions(); ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="comment-meta cm-meta cp" data-name="Comment Meta">
                            <div class="comment-meta---cr">
                                <?php
                                ntt_comment_datetime( $comment );
                                ntt_comment_author( $comment, $args );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-main cm-main cn" data-name="Comment Main">
                    <div class="comment-main---cr">
                        <div class="comment-content content-trunk cp" data-name="Comment Content">
                            <div class="comment-content---cr">
                                <div class="comment-full-content e-content content cp" data-name="Comment Full Content">
                                    <div class="comment-full-content---cr content---cr">
                                    
                                    <?php
                                    // Appears for not logged in users and those who opt-in to save info in cookie
                                    // Settings > Discussion > Show comments cookies opt-in checkbox.
                                    if ( $comment->comment_approved == '0' ) {
                                        ?>
                                        <div class="unapproved-comments-note note cp" data-name="Unapproved Comments Note">
                                            <div class="unapproved-comments-note---cr note---cr">
                                                <p><?php esc_html_e( 'Your comment is awaiting moderation.', 'ntt' ); ?></p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    comment_text();
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if ( comments_open() && get_option( 'thread_comments' ) && $depth < $args['max_depth'] ) {
                    ?>
                    <div class="comment-footer cm-footer cn" data-name="Comment Footer">
                        <div class="comment-footer---cr">
                            <div class="comment-axns cm-axns-trunk cp" data-name="Comment Actions">
                                <div class="comment-axns---cr">

                                    <?php
                                    $reply_text = __( 'Reply', 'ntt' );
                                    $requires_log_in_text = __( 'Requires Log In', 'ntt' );
                                    ?>
                                    <div class="comment-reply-axn obj">
                                        <?php
                                        comment_reply_link(
                                            array_merge(
                                                $args,
                                                array(
                                                    'add_below'     => 'comment',
                                                    'depth'         => $depth,
                                                    'max_depth'     => $args['max_depth'],
                                                    'reply_text'    => '<span title="'. esc_attr( $reply_text ). '" class="reply---text">'. esc_html( $reply_text ). '</span>',
                                                    'login_text'    => '<span title="'. esc_attr( $reply_text ). ' '. '('. esc_attr( $requires_log_in_text ). ')'. '" class="l"><span class="reply---text">'. esc_html( $reply_text ). '</span>'. ' '. '<span class="requires-log-in---text">'. esc_html( $requires_log_in_text ). '</span>'. '</span>',
                                                )
                                            )
                                        );
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </li>
        <?php
    }
}