<?php

if ( ! function_exists( 'ntt_comment') ) {
    function ntt_comment( $comment, $args, $depth ) {
        $commenter = wp_get_current_commenter();
        $comment_url = get_comment_link( $comment->comment_ID );
        
        if ( true === $args['has_children'] ) {
            $comment_hierarchy_css = 'parent-comment';
        } else {
            $comment_hierarchy_css = 'single-comment';
        }

        if ( get_option( 'avatar_default' ) == 'blank' ) {
            $commenter_avatar_type_css = 'default-commenter-avatar--blank';
        } else {
            $commenter_avatar_type_css = 'default-commenter-avatar--custom';
        } ?>

        <li id="comment-<?php comment_ID() ?>" <?php comment_class( 'cm-singular p-comment h-entry cp item'. ' '. $comment_hierarchy_css. ' '. $commenter_avatar_type_css ); ?> data-name="Comment">
            <div class="cm-singular---cr comment---cr">
                <div class="cm-article comment-article article cp" data-name="Comment Article">
                    <div class="cm-article---cr comment-article---cr">
                
                        <div class="cm-header comment-header header cn" data-name="Comment Header">
                            <div class="cm-header---cr comment-header---cr">

                                <div class="cm-heading comment-heading heading cp" data-name="Comment Heading">
                                    <div class="cm-heading---cr comment-heading---cr">
                                        <div class="cm-name comment-name name obj" data-name="Comment Name">
                                            <span class="comment-name---l l">
                                                <span class="comment-name---txt txt"><?php esc_html_e( 'Comment', 'ntt' ); ?></span>
                                                <span class="comment-id---txt txt"><?php comment_ID(); ?></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="cm-axns-trunk comment-axns axns-trunk cp" data-name="Comment Actions">
                                    <div class="cm-axns-trunk---cr comment-axns---cr">

                                    <?php ntt_comment_admin_actions();
                                        
                                    if ( comments_open() && get_option( 'thread_comments' ) && $depth < $args['max_depth'] ) {

                                        $reply_text_mu = '<span class="reply---txt txt">'. esc_html__( 'Reply', 'ntt' ). '</span> <span class="to---txt txt">'. esc_html__( 'to', 'ntt' ). '</span> <span class="comment---txt txt">'. esc_html__( 'Comment', 'ntt' ). '</span>'. ' '. '<span class="comment-id---txt txt">'. get_comment_ID(). '</span>';
                                        $login_text_mu = '<span class="note---txt txt">'. esc_html__( 'requires Log In', 'ntt' ). '</span>'; ?>

                                        <div class="cm-axns comment-user-axns user-axns axns cp" arial-label="Comment User Actions">
                                            <div class="cm-axns---cr comment-user-axns---cr">

                                                <div class="cm-axn comment-reply-axn reply-axn axn obj p-modify" data-name="Comment Reply Action">
                                                <?php comment_reply_link( array_merge(
                                                    $args,
                                                    array(
                                                        'add_below'     => 'comment',
                                                        'depth'         => $depth,
                                                        'max_depth'     => $args['max_depth'],
                                                        'reply_text'    => '<span class="comment-reply-axn---l l">'. $reply_text_mu. '</span>',
                                                        'login_text'    => '<span class="log-in-axn---l ;"><span class="axn---line line">'. $reply_text_mu. '</span>'. ' '. '<span class="note---line line">'. $login_text_mu. '</span></span>',
                                                    )
                                                ) ); ?>
                                                </div>

                                            </div>
                                        </div>

                                    <?php } ?>

                                    </div>
                                </div>

                                <div class="cm-meta comment-meta meta cp" data-name="Comment Meta">
                                    <div class="cm-meta---cr comment-meta---cr">
                                        
                                        <?php ntt_comment_datetime( $comment );
                                        
                                        ntt_comment_author( $comment, $args ); ?>

                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="cm-main comment-main cn" data-name="Comment Main">
                            <div class="cm-main---cr comment-main---cr">
                                
                                <div class="cm-content-trunk comment-content content-trunk cp" data-name="Comment Content">
                                    <div class="cm-content-trunk---cr comment-content---cr">
                                        
                                        <div class="comment-full-content full-content e-content content cp" data-name="Comment Full Content">
                                            <div class="comment-full-content---cr content---cr">
                                            
                                            <?php if ( $comment->comment_approved == '0' ) {
                                                '<p>'. esc_html_e( 'Your comment is awaiting moderation.', 'ntt' ). '</p>';
                                            }
                                            
                                            comment_text(); ?>
                                            
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