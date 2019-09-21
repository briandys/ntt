<?php
/**
 * Comments
 * 
 * comments_template()
 */

if ( post_password_required() ) {
	return;
}

global $current_user;

// title_reply
$title_reply_mu = '<div class="ntt--comment-composition-name ntt--obj">';
    $title_reply_mu .= '<span class="ntt--txt">'. esc_html__( 'Compose Comment', 'ntt' ). '</span>';
$title_reply_mu .= '</div>';

// title_reply_to
// Appears if wp_enqueue_script( 'comment-reply' ) is not active
$title_reply_to_mu = $title_reply_mu;
$title_reply_to_mu .= '<div class="ntt--comment-reply-reference ntt--obj" data-name="Comment Reply Reference">';
    $title_reply_to_mu .= '<span class="ntt--txt">';
        $title_reply_to_mu .= '<span class="ntt--label-txt">'. esc_html__( 'Reply to', 'ntt' ). '</span>';
        $title_reply_to_mu .= ' '. '%s';
    $title_reply_to_mu .= '</span>';
$title_reply_to_mu .= '</div>';

// cancel_reply_before
$cancel_reply_axn_start_mu = '<div aria-label="'. esc_attr__( 'Cancel Reply', 'ntt' ).'" title="'. esc_attr__( 'Cancel Reply', 'ntt' ). '" class="ntt--cancel-reply-axn ntt--axn ntt--obj" data-name="Cancel Reply Action">';

// cancel_reply_after
$cancel_reply_axn_end_mu = '</div>';

// cancel_reply_link
$cancel_reply_link_mu = '<span class="ntt--txt">'. esc_html__( 'Cancel', 'ntt' ). '</span>';

/*
$logged_in_as_mu .= '<div class="ntt--comment-author ntt--cm-author ntt--cp" data-name="Comment Author">';
    $logged_in_as_mu .= '<label class="ntt--comment-author-label ntt--obj">';
        $logged_in_as_mu .= '<span class="ntt--txt">'. esc_html_x( 'Commenting as', 'Commenting as Author Name', 'ntt' ). '</span>';
    $logged_in_as_mu .= '</label>'. ' ';
    $logged_in_as_mu .= '<span title="Commenting as'. $user_identity. '" class="ntt--comment-author-avatar ntt--cm-author-avatar ntt--obj" data-name="Comment Author Avatar">';
        $logged_in_as_mu .= '<a href="'. admin_url( 'profile.php' ).'" class="p-name u-url">';
            $logged_in_as_mu .= '<span class="ntt--img">'. get_avatar( $current_user->ID, apply_filters( 'ntt_author_avatar_filter', '48' ) ).'</span>';
        $logged_in_as_mu .= '</a>';
    $logged_in_as_mu .= '</span>';
    $logged_in_as_mu .= '<span title="Commenting as'. $user_identity. '" class="ntt--comment-author-name ntt--cm-author-name ntt--obj">';
        $logged_in_as_mu .= '<a href="'. admin_url( 'profile.php' ).'" class="p-name u-url">';
            $logged_in_as_mu .= '<span class="ntt--txt">'. $user_identity.'</span>';
        $logged_in_as_mu .= '</a>';
    $logged_in_as_mu .= '</span>';
$logged_in_as_mu .= '</div>';
*/

// logged_in_as
$log_out_text = __( 'Log Out', 'ntt' );

$logged_in_as_mu = '<div class="ntt--account-logged-in-status ntt--cp" data-name="Account Logged In Status">';
    
    $logged_in_as_mu .= '<div class="ntt--comment-author ntt--cm-author ntt--cp" data-name="Comment Author">';
        $logged_in_as_mu .= '<label class="ntt--comment-author-label ntt--obj">';
            $logged_in_as_mu .= '<span class="ntt--txt">'. esc_html_x( 'Commenting as', 'Commenting as Author Name', 'ntt' ). '</span>';
        $logged_in_as_mu .= '</label>'. ' ';
        $logged_in_as_mu .= '<span title="Commenting as'. ' '. $user_identity. '" class="ntt--comment-author-avatar ntt--cm-author-avatar ntt--obj" data-name="Comment Author Avatar">';
            $logged_in_as_mu .= '<a href="'. admin_url( 'profile.php' ).'" class="p-name u-url">';
                $logged_in_as_mu .= '<span class="ntt--img">'. get_avatar( $current_user->ID, apply_filters( 'ntt_author_avatar_filter', '48' ) ).'</span>';
            $logged_in_as_mu .= '</a>';
        $logged_in_as_mu .= '</span>';
        $logged_in_as_mu .= '<span title="Commenting as'. ' '. $user_identity. '" class="ntt--comment-author-name ntt--cm-author-name ntt--obj">';
            $logged_in_as_mu .= '<a href="'. admin_url( 'profile.php' ).'" class="p-name u-url">';
                $logged_in_as_mu .= '<span class="ntt--txt">'. $user_identity.'</span>';
            $logged_in_as_mu .= '</a>';
        $logged_in_as_mu .= '</span>';
    $logged_in_as_mu .= '</div>';
    $logged_in_as_mu .= '<div aria-label="'. esc_attr( $log_out_text ). ' '. $user_identity.'" title="'. esc_attr( $log_out_text ). ' '. $user_identity.'" class="ntt--log-out-account-axn ntt--axn ntt--obj" data-name="Log Out Account Action">';
        $logged_in_as_mu .= '<a href="'. esc_url( wp_logout_url( get_permalink() ) ).'">';
            $logged_in_as_mu .= '<span class="ntt--txt">'. esc_html( $log_out_text ). '</span>';
        $logged_in_as_mu .= '</a>';
    $logged_in_as_mu .= '</div>';
$logged_in_as_mu .= '</div>';

/*
<div class="ntt--comment-author ntt--cm-author ntt--cp" data-name="Comment Author">
            <label class="ntt--comment-author-label ntt--obj">
                <span class="ntt--txt">Commented by</span>
            </label>
            
                            <span title="Commented by Brian Dys" class="ntt--comment-author-avatar ntt--cm-author-avatar ntt--obj" data-name="Comment Author Avatar">
                    <a href="http://briandys.com" class="p-name u-url"><span class="ntt--img"><img alt="Avatar" src="http://2.gravatar.com/avatar/80a1fda15bb91040818b4535a3e18bce?s=48&amp;d=mm&amp;r=g" srcset="http://2.gravatar.com/avatar/80a1fda15bb91040818b4535a3e18bce?s=96&amp;d=mm&amp;r=g 2x" class="avatar avatar-48 photo u-photo" height="48" width="48"></span></a>                </span>
                            <span title="Commented by Brian Dys" class="ntt--comment-author-name ntt--cm-author-name ntt--obj">
                <a href="http://briandys.com" class="p-name u-url"><span class="ntt--txt">Brian Dys</span></a>            </span>
        </div>
        */

// must_log_in
$log_in_text = __( 'Log In', 'ntt' );

$log_in_required_note_content = sprintf( esc_html__( '%1$s to comment.', 'ntt' ),
    sprintf( '<a href="%1$s" title="'. esc_attr( '%2$s' ).'">'. esc_html( '%3$s' ). '</a>',
        esc_url( wp_login_url( get_permalink() ) ),
        __( 'Log In', 'ntt' ),
        __( 'Log in', 'ntt' )
    )
);

$must_log_in_mu = '<div class="ntt--log-in-required-note ntt--note ntt--cp" data-name="Log In Required Note">';
    $must_log_in_mu .= '<p>'. $log_in_required_note_content.'</p>';
$must_log_in_mu .= '</div>';

// Comment Author Message Field | comment_field
// Other fields are in comment-form.php
$comment_text = __( 'Comment', 'ntt' );

$comment_field_mu = '<div class="ntt--comment-author-message-field ntt--form-field ntt--cp" data-name="Comment Author Message Field">';
    $comment_field_mu .= '<label for="comment" class="ntt--comment-author-message-label ntt--form-label ntt--obj">';
        $comment_field_mu .= '<span class="ntt--txt">'. esc_html( $comment_text ).'</span>';
    $comment_field_mu .= '</label>';
        $comment_field_mu .= '<div class="ntt--comment-author-message-textbox ntt--form-element ntt--obj" data-name="Comment Author Message Textbox">';
            $comment_field_mu .= '<textarea name="comment" title="'. esc_attr( $comment_text ).'" maxlength="65525" required placeholder="'. esc_attr__( 'Required', 'ntt' ).'" id="comment" class="text-input"></textarea>';
        $comment_field_mu .= '</div>';
$comment_field_mu .= '</div>';
?>

<section class="ntt--comment-md ntt--cm ntt--md" data-name="Comment Module">
    <div id="comments" class="ntt--comments ntt--cp" data-name="Comments">
        <div class="ntt--comments-header ntt--cn" data-name="Comments Header">
            <h2 class="ntt--comments-name ntt--obj">
                <span class="ntt--txt"><?php esc_html_e( 'Comments', 'ntt' ); ?></span>
            </h2>
            <?php ntt_comments_actions_snippet(); ?>
        </div>
        <div class="ntt--comments-main ntt--cn" data-name="Comments Main">
            <?php
            if ( have_comments() ) {
                ?>
                <ul class="ntt--comments-group ntt--cp">
                    <?php
                    wp_list_comments( array(
                        'style'         => 'ul',
                        'avatar_size'   => 48,
                        'callback'      => 'ntt_comment',
                        'echo'          => true,
                    ) );
                    ?>
                </ul>
                <?php
            } else {

                if ( comments_open() ) {

                    $empty_comments_note_content = sprintf( esc_html_x( 'Be the first to %1$s.', 'Be the first to comment', 'ntt' ),
                        sprintf( '<a href="%1$s" title="'. esc_attr( '%2$s' ).'">'. esc_html( '%3$s' ). '</a>',
                            esc_url( '#comment' ),
                            __( 'Comment', 'ntt' ),
                            __( 'comment', 'ntt' )
                        )
                    );

                    $empty_comments_note_content = $empty_comments_note_content;
                } else {
                    $empty_comments_note_content = esc_html__( 'There are no comments.', 'ntt' );
                }
                ?>
                <div class="ntt--empty-comments-note ntt--note ntt--cp" data-name="Empty Comments Note">
                    <p><?php echo $empty_comments_note_content; ?></p>
                </div>
                <?php
            }
            ?>
        </div>

        <?php
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
            ?>
            <div class="ntt--comments-footer ntt--cn" data-name="Comments Footer">
                <?php ntt_comments_nav(); ?>
            </div>
            <?php
        }
        ?>
    </div>
    
    <?php
    // comment-form.php
    comment_form( array(
        'id_form'                   => 'commentform',
        'class_form'                => 'ntt--comment-form ntt--cp',
    
        'title_reply_before'        => '',
        'title_reply_after'         => '',
    
        // Comment Creation Name and Compose Comment Generic Label
        'title_reply'               => $title_reply_mu,
        
        // Reply to <Comment Author Name> | Appears only if JS is not supported or if comment-reply.js is not loaded; it replaces title_reply
        'title_reply_to'            =>  $title_reply_to_mu,
    
        // Cancel Reply Action
        'cancel_reply_before'       => $cancel_reply_axn_start_mu,
        'cancel_reply_after'        => $cancel_reply_axn_end_mu,
        'cancel_reply_link'         => $cancel_reply_link_mu,
    
        // Signed in as <Admin Account Name>
        'logged_in_as'              => $logged_in_as_mu, 
    
        // Settings > Discussion > [Check] Users must be registered and logged in to comment
        'must_log_in'               => $must_log_in_mu,
    
        // Comment Textarea
        'comment_field'             => $comment_field_mu,
    
        // Submit Comment Action
        'id_submit'                 => 'ntt--submit-comment-axn',
        'class_submit'              => 'ntt--submit-comment-axn ntt--axn ntt--obj',
        'label_submit'              => esc_attr_x( 'Submit', 'Submit Comment', 'ntt' ),
    
        // Notes
        'comment_notes_before'      => '',
        'comment_notes_after'       => '',
    ) );
    ?>
</section>