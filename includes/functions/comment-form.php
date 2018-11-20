<?php

function ntt_comment_form( $fields ) {       
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? ' '. 'required'. ' ' : '' );
    
    $optional_note = ' '. '<span class="optional-note-txt txt">'. __( 'Optional', 'ntt' ). '</span>';
    $optional = ( $req ? '' : $optional_note );

    // Comment Author Name
    $fields['author'] = '<div class="field comment-author-name cp" data-name="Comment Author Name">';
        $fields['author'] .= '<div class="field---cr comment-author-name---cr">';
            $fields['author'] .= '<label for="comment-author-name-input" class="comment-author-name-label label obj" data-name="Comment Author Name Label">';
                $fields['author'] .= '<span class="comment-author-name-label---l">';
                    $fields['author'] .= '<span class="name---text">'. __( 'Name', 'ntt' ). '</span>';
                    $fields['author'] .= $optional;
                $fields['author'] .= '</span>';
            $fields['author'] .= '</label>';
            $fields['author'] .= '<div class="comment-author-name-textbox textbox felem obj" data-name="Comment Author Name Textbox">';
                $fields['author'] .= '<input type="text" name="author" value="'. esc_attr( $commenter['comment_author'] ). '" size="64" placeholder="Name" title="'. esc_attr__( 'Name', 'ntt' ). '"'. $aria_req. 'id="comment-author-name-input" class="comment-author-name-input text-input input">';
            $fields['author'] .= '</div>';
        $fields['author'] .= '</div>';
    $fields['author'] .= '</div>';

    // Comment Author Email
    $fields['email'] = '<div class="field comment-author-email cp" data-name="Comment Author Email">';
        $fields['email'] .= '<div class="field---cr comment-author-email---cr">';
            $fields['email'] .= '<label for="comment-author-email-input" class="comment-author-email-label label obj" data-name="Comment Author Email Label">';
                $fields['email'] .= '<span class="comment-author-email-label---l">';
                    $fields['email'] .= '<span class="email---text">'. __( 'Email', 'ntt' ). '</span>';
                $fields['email'] .= '</span>';
            $fields['email'] .= '</label>';
            $fields['email'] .= '<div class="comment-author-email-textbox textbox felem obj" data-name="Comment Author Email Textbox">';
                $fields['email'] .= '<input type="email" name="email" value="'. esc_attr( $commenter['comment_author_email'] ). '" size="64" placeholder="Email" title="'. esc_attr__( 'Email', 'ntt' ). '" required id="comment-author-email-input" class="comment-author-email-input text-input input">';
            $fields['email'] .= '</div>';
        $fields['email'] .= '</div>';
    $fields['email'] .= '</div>';

    // Comment Author Website URL
    $fields['url'] = '<div class="field comment-author-url cp" data-name="Comment Author URL">';
        $fields['url'] .= '<div class="field---cr comment-author-url---cr">';
            $fields['url'] .= '<label for="comment-author-url-input" class="comment-author-url-label label obj" data-name="Comment Author URL Label">';
                $fields['url'] .= '<span class="comment-author-url-label---l">';
                    $fields['url'] .= '<span class="website---text">'. _x( 'Website', 'Object: Comment Author URL Label | Usage: >Website< URL', 'ntt' ). '</span>';
                    $fields['url'] .= ' '. '<span class="url---text">'. _x( 'URL', 'Object: Comment Author URL Label | Usage: Website >URL<', 'ntt' ). '</span>';
                    $fields['url'] .= $optional_note;
                $fields['url'] .= '</span>';
            $fields['url'] .= '</label>';
            $fields['url'] .= '<div class="comment-author-url-textbox textbox felem obj" data-name="Comment Author URL Textbox">';
                $fields['url'] .= '<input type="url" name="url" value="'. esc_attr( $commenter['comment_author_url'] ). '" size="64" placeholder="http://" title="'. esc_attr__( 'Website URL', 'ntt' ). '" id="comment-author-url-input" class="comment-author-url-input text-input input">';
            $fields['url'] .= '</div>';
        $fields['url'] .= '</div>';
    $fields['url'] .= '</div>';

    return $fields;

}
add_filter( 'comment_form_default_fields', 'ntt_comment_form' );