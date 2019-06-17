<?php
/**
 * Comment Form
 */

function ntt_comment_form( $fields ) {       
    
    $comment_author = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? ' '. 'required'. ' ' : '' );
    
    $optional_note = ' '. '<span class="ntt--optional-text">'. __( 'Optional', 'ntt' ). '</span>';
    $optional = ( $req ? '' : $optional_note );

    $name_text = __( 'Name', 'ntt' );
    $email_text = __( 'Email', 'ntt' );
    $website_text = _x( 'Website', 'Website URL', 'ntt' );
    $url_text = _x( 'URL', 'Website URL', 'ntt' );
    $website_url_text = __( 'Website URL', 'ntt' );

    // Comment Author Name
    $fields['author'] = '<div class="ntt--comment-author-name-field ntt--form-field ntt--cp" data-name="Comment Author Name Field">';
        $fields['author'] .= '<label for="ntt--comment-author-name-text-input" class="ntt--comment-author-name-label ntt--form-label ntt--obj">';
            $fields['author'] .= '<span class="ntt--txt">';
                $fields['author'] .= '<span class="ntt--label-txt">'. esc_html( $name_text ). '</span>';
                $fields['author'] .= $optional;
            $fields['author'] .= '</span>';
        $fields['author'] .= '</label>';
        $fields['author'] .= '<div class="ntt--comment-author-name-textbox ntt--form-element ntt--obj" data-name="Comment Author Name Textbox">';
            $fields['author'] .= '<input type="text" name="author" value="'. esc_attr( $comment_author['comment_author'] ). '" size="64" placeholder="'. esc_attr( $name_text ). '" title="'. esc_attr( $name_text ). '"'. $aria_req. 'id="ntt--comment-author-name-text-input" class="text-input">';
        $fields['author'] .= '</div>';
    $fields['author'] .= '</div>';

    // Comment Author Email
    $fields['email'] = '<div class="ntt--comment-author-email-field ntt--form-field ntt--cp" data-name="Comment Author Email Field">';
        $fields['email'] .= '<label for="ntt--comment-author-email-text-input" class="ntt--comment-author-email-label ntt--form-label ntt--obj">';
            $fields['email'] .= '<span class="ntt--txt">'. esc_html( $email_text ). '</span>';
        $fields['email'] .= '</label>';
        $fields['email'] .= '<div class="ntt--comment-author-email-textbox ntt--form-element ntt--obj" data-name="Comment Author Email Textbox">';
            $fields['email'] .= '<input type="email" name="email" value="'. esc_attr( $comment_author['comment_author_email'] ). '" size="64" placeholder="'. esc_attr( $email_text ).'" title="'. esc_attr( $email_text ). '" required id="ntt--comment-author-email-text-input" class="text-input">';
        $fields['email'] .= '</div>';
    $fields['email'] .= '</div>';

    // Comment Author Website URL
    $fields['url'] = '<div class="ntt--comment-author-url-field ntt--form-field ntt--cp" data-name="Comment Author URL Field">';
        $fields['url'] .= '<label for="ntt--comment-author-url-text-input" class="comment-author-url-field-label field-label ntt--obj">';
            $fields['url'] .= '<span class="ntt--txt">';
                $fields['url'] .= '<span class="ntt--label-txt">'. esc_html( $website_text ). '</span>';
                $fields['url'] .= $optional_note;
            $fields['url'] .= '</span>';
        $fields['url'] .= '</label>';
        $fields['url'] .= '<div class="ntt--comment-author-url-textbox ntt--form-element ntt--obj" data-name="Comment Author URL Textbox">';
            $fields['url'] .= '<input type="url" name="url" value="'. esc_attr( $comment_author['comment_author_url'] ). '" size="64" placeholder="'. esc_attr( $url_text ). '" title="'. esc_attr( $website_url_text ). '" id="ntt--comment-author-url-text-input" class="text-input">';
        $fields['url'] .= '</div>';
    $fields['url'] .= '</div>';

    return $fields;
}
add_filter( 'comment_form_default_fields', 'ntt_comment_form' );