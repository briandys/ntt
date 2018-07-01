<?php

if ( post_password_required() ) {
	return;
}

 // title_reply
 $title_reply_mu = '<div class="compose-comment-name name obj" data-name="Compose Comment Name">';
    $title_reply_mu .= '<span class="compose-comment-name---l l">';
        $title_reply_mu .= '<span class="compose---txt txt">';
            $title_reply_mu .= esc_html_x( 'Compose', 'Component: Comment Creation | Usage: >Compose< Comment', 'ntt' );
        $title_reply_mu .= '</span>';
        $title_reply_mu .= ' '. '<span class="comment---txt txt">';
            $title_reply_mu .= esc_html_x( 'Comment', 'Component: Comment Creation | Usage: Compose >Comment<', 'ntt' );
        $title_reply_mu .= '</span>';
    $title_reply_mu .= '</span>';
 $title_reply_mu .= '</div>';

 // title_reply_to
 $title_reply_to_mu = '<div class="comment-reply-name name obj" data-name="Comment Reply Name">';
    $title_reply_to_mu .= '<div class="comment-reply-name---l l">';
        $title_reply_to_mu .= '<span class="reply-to---txt txt">'. esc_html__( 'Reply to', 'ntt' ). '</span>';
        $title_reply_to_mu .= ' '. '%s';
    $title_reply_to_mu .= '</div>';
 $title_reply_to_mu .= '</div>';

// logged_in_as
$log_out_title_attr = esc_attr__( 'Log Out', 'ntt' );
$log_out_l = esc_html__( 'Log Out', 'ntt' );

$logged_in_as_mu = '<div class="admin-account-log-status cp" data-name="Admin Account Log Status">';
    $logged_in_as_mu .= '<div class="admin-account-log-status---cr">';
        $logged_in_as_mu .= '<div class="logged-in-admin-account cp" data-name="Logged In Admin Account">';
            $logged_in_as_mu .= '<div class="logged-in-admin-account---cr">';
                $logged_in_as_mu .= '<span class="logged-in-as---glabel glabel obj"><span class="logged-in-as---txt txt">'. esc_html_x( 'Logged in as', 'Component: Comment Admin Account | Usage: The admin name who is logged in.', 'ntt' ). '</span></span>';
                $logged_in_as_mu .= ' '. '<span class="admin-account-name name obj"><a href="'. admin_url( 'profile.php' ).'" title="'. $user_identity.'" class="admin-account-name---a a"><span class="admin-account-name---l l"><span class="admin-account-name---txt txt">'. $user_identity.'</span></span></a></span>';
            $logged_in_as_mu .= '</div>';
        $logged_in_as_mu .= '</div>';
        $logged_in_as_mu .= '<div class="log-out-admin-account-axn log-out-axn obj" data-name="Log Out Admin Account Action"><a href="'. esc_url( wp_logout_url( get_permalink() ) ).'" title="'. $log_out_title_attr.'"><span class="log-out-admin-account-axn---l l"><span class="log-out---txt txt">'. $log_out_l.'</span></span></a></div>';
    $logged_in_as_mu .= '</div>';
$logged_in_as_mu .= '</div>';

// must_log_in
$must_log_in_mu = '<div class="log-in-required-note note cp" data-name="Log In Required Note">';
    $must_log_in_mu .= '<div class="log-in-required-note---cr note---cr">';
        $must_log_in_mu .= '<p><a href="'. esc_url( wp_login_url( get_permalink() ) ). '" title="'. esc_attr__( 'Log In', 'ntt' ).'" class="log-in-required-note---a a">'. esc_html_x( 'Log In', 'Object: Log In Required Note | Usage: >Log In< to comment.', 'ntt' ). '</a> '. ' '. '<span class="to-comment---txt">'. esc_html_x( 'to comment.', 'Object: Log In Required Note | Usage: Log In >to comment<.', 'ntt' ). '</span>'. '</p>';
    $must_log_in_mu .= '</div>';
$must_log_in_mu .= '</div>';

// comment_field
$comment_field_mu = '<div class="field comment-message cp" data-name="Comment Message">';
    $comment_field_mu .= '<div class="field---cr comment-message---cr">';
    $comment_field_mu .= '<label for="comment" class="comment-message-label label obj" data-name="Comment Message Label">';
        $comment_field_mu .= '<span class="comment-message-label---l l">';
            $comment_field_mu .= '<span class="comment---txt txt">'. esc_attr__( 'Comment', 'ntt' ). '</span>';
        $comment_field_mu .= '</span>';
    $comment_field_mu .= '</label>';
        $comment_field_mu .= '<div class="comment-message-textbox textbox felem obj" data-name="Comment Message Textbox">';
            $comment_field_mu .= '<textarea name="comment" placeholder="'. esc_html__( 'Comment', 'ntt' ).'" title="'. esc_html__( 'Comment', 'ntt' ).'" maxlength="65525" required id="comment" class="comment-message-input text-input textarea"></textarea>';
        $comment_field_mu .= '</div>';
    $comment_field_mu .= '</div>';
$comment_field_mu .= '</div>';

// cancel_reply_link
$cancel_reply_link_mu = '<span class="cancel-comment-reply-axn---l l" title="'. esc_attr_x( 'Cancel Reply to Comment', 'Usage: Cancel Reply to Comment | Component: Comment Respond', 'ntt' ). '">';
$cancel_reply_link_mu .= '<span class="cancel---txt txt">'. esc_html_x( 'Cancel', 'Usage: >Cancel< Reply to Comment | Component: Comment Respond', 'ntt' ). '</span>';
$cancel_reply_link_mu .= ' '. '<span class="reply-to-comment---txt txt">'. esc_html_x( 'Reply to Comment', 'Usage: Cancel >Reply to Comment< | Component: Comment Respond', 'ntt' ). '</span>';
$cancel_reply_link_mu .= '</span>'; ?>

<section class="cm comment-md md" data-name="Comment Module">
    <div class="cm---cr comment-md---cr">

        <div id="comments" class="cm-plural comments <?php ntt_comment_css_wp_hook(); ?> cp" data-name="Comments">
            <div class="cm-plural---cr comments---cr">
                
                <div class="cm-plural-header comments-header header cn" data-name="Comments Header">
                    <div class="cm-plural-header---cr comments-header---cr">
                        <h2 class="comments-name name obj h">
                            <span class="comments-name---l l">
                                <span class="comments---txt"><?php esc_html_e( 'Comments', 'ntt' ); ?></span>
                            </span>
                        </h2>
                        
                        <?php
                        ntt_comments_actions_snippet();
                        
                        if ( have_comments() ) {
                            ntt_comments_nav();
                        }
                        ?>
                    </div>
                </div>
                <div class="cm-plural-main comments-main main cn" data-name="Comments Main">
                    <div class="cm-plural-main---cr comments-main---cr">
                
                    <?php if ( have_comments() ) { ?>

                        <ul class="comments---group group list">
                        <?php wp_list_comments( array(
                            'style'         => 'ul',
                            'avatar_size'   => 48,
                            'callback'      => 'ntt_comment',
                            'echo'          => true,
                        ) ); ?>
                        </ul>

                    <?php } else { ?>
                        <div class="empty-comments-note note cp" data-name="Empty Comments Note">
                            <div class="empty-comments-note---cr note---cr">
                                <p><?php echo esc_html_x( 'Be the first to comment.', 'Component: Comments | Usage: User note if there are no comments.', 'ntt' ); ?></p>
                            </div>
                        </div>
                    <?php } ?>
                        
                    </div>
                </div>
                
            </div>
        </div>
        
        <?php // comment-form.php
        comment_form( array(
            'id_form'                   => 'commentform',
        
            'title_reply_before'        => '',
            'title_reply_after'         => '',
        
            // Comment Creation Name and Compose Comment Generic Label
            'title_reply'               => $title_reply_mu,
            
            // Reply to <Comment Author Name> | Appears if JS is not supported of comment-reply.js is not loaded
            'title_reply_to'            =>  $title_reply_to_mu,
        
            // Cancel Reply Action
            'cancel_reply_before'       => '',
            'cancel_reply_after'        => '',
            'cancel_reply_link'         => $cancel_reply_link_mu,
        
            // Signed in as <Admin Account Name>
            'logged_in_as'              => $logged_in_as_mu, 
        
            // Settings > Discussion > [Check] Users must be registered and logged in to comment
            'must_log_in'               => $must_log_in_mu,
        
            // Comment Textarea
            'comment_field'             => $comment_field_mu,
        
            // Submit Comment Action
            'id_submit'                 => 'submit-comment-axn---a',
            'class_submit'              => 'submit-comment-axn---a a b',
            'label_submit'              => esc_attr_x( 'Submit', 'Component: Comment Respond | Usage: >Submit< Comment', 'ntt' ),
        
            // Notes
            'comment_notes_before'      => '',
            'comment_notes_after'       => '',
        ) ); ?>
    </div>
</section>