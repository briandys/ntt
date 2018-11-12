<?php

if ( ! function_exists( 'ntt_comment') ) {
    function ntt_comment( $comment, $args, $depth ) {
        $commenter = wp_get_current_commenter();
        $comment_url = get_comment_link( $comment->comment_ID );
        $comment_id = get_comment_ID();
        
        if ( true === $args['has_children'] ) {
            $comment_hierarchy_css = 'parent-comment';
        } else {
            $comment_hierarchy_css = 'single-comment';
        }

        if ( get_option( 'avatar_default' ) == 'blank' ) {
            $commenter_avatar_type_css = 'default-commenter-avatar--default';
        } else {
            $commenter_avatar_type_css = 'default-commenter-avatar--custom';
        } ?>

        <li id="comment-<?php echo esc_attr( $comment_id ); ?>" <?php comment_class( 'comment-'. esc_attr( $comment_id ). ' '. 'p-comment h-entry cm-singular item cp'. ' '. $comment_hierarchy_css. ' '. $commenter_avatar_type_css ); ?> data-name="Comment">
            <div class="comment---cr cm-singular---cr">
                <div class="comment-article cm-article  article cp" data-name="Comment Article">
                    <div class="comment-article---cr cm-article---cr">
                
                        <div class="comment-header cm-header header cn" data-name="Comment Header">
                            <div class="comment-header---cr cm-header---cr">

                                <div class="comment-heading cm-heading heading cp" data-name="Comment Heading">
                                    <div class="comment-heading---cr cm-heading---cr">
                                        <div class="comment-name cm-name name obj" data-name="Comment Name">
                                            <span class="comment-name---l">
                                                <span class="comment-name---txt"><?php esc_html_e( 'Comment', 'ntt' ); ?></span>
                                                <span class="comment-id---txt"><?php echo esc_html( $comment_id ); ?></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment-axns cm-axns-trunk axns-trunk cp" data-name="Comment Actions">
                                    <div class="comment-axns---cr cm-axns-trunk---cr">

                                        <?php
                                        ntt_comment_admin_actions();
                                            
                                        if ( comments_open() && get_option( 'thread_comments' ) && $depth < $args['max_depth'] ) {

                                            $reply_text_mu = '<span class="reply---txt">'. esc_html_x( 'Reply', 'Usage: >Reply< to Comment <ID> | Component: Comment Actions', 'ntt' ). '</span> <span class="to---txt">'. esc_html_x( 'to', 'Usage: Reply >to< Comment <ID> | Component: Comment Actions', 'ntt' ). '</span> <span class="comment-name---line line"><span class="comment---txt">'. esc_html_x( 'Comment', 'Usage: Reply to >Comment< <ID> | Component: Comment Actions', 'ntt' ). '</span>'. ' '. '<span class="comment-id---txt">'. esc_html( $comment_id ). '</span></span>';
                                            $login_text_mu = '<span class="requires-log-in-note---txt">'. esc_html__( 'Requires Log In', 'ntt' ). '</span>'; ?>

                                            <div class="comment-user-axns user-axns cm-axns axns cp" data-name="Comment User Actions">
                                                <div class="comment-user-axns---cr cm-axns---cr">

                                                    <div class="comment-reply-axn reply-axn cm-axn axn p-modify obj" data-name="Comment Reply Action">
                                                        <?php
                                                        comment_reply_link( array_merge( $args,
                                                            array(
                                                                'add_below'     => 'comment',
                                                                'depth'         => $depth,
                                                                'max_depth'     => $args['max_depth'],
                                                                'reply_text'    => '<span class="comment-reply-axn---l l" title="'. esc_attr_x( 'Reply to Comment', 'Usage: >Reply to Comment< <ID> | Component: Comment Actions', 'ntt' ). ' '. esc_html( $comment_id ). '">'. $reply_text_mu. '</span>',
                                                                'login_text'    => '<span class="log-in-axn---l"><span class="axn---line line">'. $reply_text_mu. '</span>'. ' '. $login_text_mu. '</span>',
                                                            )
                                                        ) );
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="comment-meta cm-meta meta cp" data-name="Comment Meta">
                                    <div class="comment-meta---cr cm-meta---cr">
                                        
                                        <?php
                                        ntt_comment_datetime( $comment );
                                        ntt_comment_author( $comment, $args );
                                        ?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="comment-main cm-main cn" data-name="Comment Main">
                            <div class="comment-main---cr cm-main---cr">
                                
                                <div class="comment-content cm-content-trunk content-trunk cp" data-name="Comment Content">
                                    <div class="comment-content---cr cm-content-trunk---cr">
                                        
                                        <div class="comment-full-content full-content e-content content cp" data-name="Comment Full Content">
                                            <div class="comment-full-content---cr content---cr">
                                            
                                            <?php if ( $comment->comment_approved == '0' ) {
                                                ?>
                                                <div class="unapproved-comments-note note cp" data-name="Unapproved Comments Note">
                                                    <div class="unapproved-comments-note---cr note---cr">
                                                        <p><?php echo esc_html_x( 'Your comment is awaiting moderation.', 'Component: Comment Full Content | Usage: User note if comment is unapproved.', 'ntt' ); ?></p>
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
                    </div>
                </div>
            </div>
        </li>
    <?php }
}