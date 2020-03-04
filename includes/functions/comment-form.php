<?php
/**
 * Comment Form
 */

function ntt__function__comment_form( $fields ) {       
    
    $comment_author = wp_get_current_commenter();
    
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? ' '. 'required'. ' ' : '' );
    $optional_text = __( 'Optional', 'ntt' );
    $required_text = __( 'Required', 'ntt' );
    $requirement = ( $req ? $required_text : $optional_text );

    // Comment Author Name
    $name_text = __( 'Name', 'ntt' );

    $fields['author'] = '<div class="ntt--comment-author-name-field ntt--form-field ntt--cp" data-name="Comment Author Name Field">';
        $fields['author'] .= '<label for="ntt--comment-author-name-text-input" class="ntt--comment-author-name-label ntt--form-label ntt--obj">';
            $fields['author'] .= '<span class="ntt--txt"><span class="ntt--name-txt">'. esc_html( $name_text ). '</span> <span class="ntt--required-txt">'. esc_html( $required_text ).'</span></span>';
        $fields['author'] .= '</label>';
        $fields['author'] .= '<div class="ntt--comment-author-name-textbox ntt--form-element ntt--obj" data-name="Comment Author Name Textbox">';
            $fields['author'] .= '<input type="text" name="author" value="'. esc_attr( $comment_author['comment_author'] ). '" size="64" placeholder="'. esc_attr( $name_text ). ' '. '('. $requirement. ')" title="'. esc_attr( $name_text ). '"'. $aria_req. 'id="ntt--comment-author-name-text-input" class="text-input">';
        $fields['author'] .= '</div>';
    $fields['author'] .= '</div>';

    // Comment Author Email
    $email_text = __( 'Email', 'ntt' );

    $fields['email'] = '<div class="ntt--comment-author-email-field ntt--form-field ntt--cp" data-name="Comment Author Email Field">';
        $fields['email'] .= '<label for="ntt--comment-author-email-text-input" class="ntt--comment-author-email-label ntt--form-label ntt--obj">';
            $fields['email'] .= '<span class="ntt--txt"><span class="ntt--email-txt">'. esc_html( $email_text ). '</span> <span class="ntt--required-txt">'. esc_html( $required_text ).'</span></span>';
        $fields['email'] .= '</label>';
        $fields['email'] .= '<div class="ntt--comment-author-email-textbox ntt--form-element ntt--obj" data-name="Comment Author Email Textbox">';
            $fields['email'] .= '<input type="email" name="email" value="'. esc_attr( $comment_author['comment_author_email'] ). '" size="64" placeholder="'. esc_attr( $email_text ). ' '. '('. esc_attr( $required_text ).')" title="'. esc_attr( $email_text ). '" required id="ntt--comment-author-email-text-input" class="text-input">';
        $fields['email'] .= '</div>';
    $fields['email'] .= '</div>';

    // Comment Author Website URL
    $website_text = _x( 'Website', 'Website URL', 'ntt' );
    $url_text = _x( 'URL', 'Website URL', 'ntt' );

    $fields['url'] = '<div class="ntt--comment-author-url-field ntt--form-field ntt--cp" data-name="Comment Author URL Field">';
        $fields['url'] .= '<label for="ntt--comment-author-url-text-input" class="comment-author-url-field-label field-label ntt--obj">';
            $fields['url'] .= '<span class="ntt--txt"><span class="ntt--website-txt">'. esc_html( $website_text ). '</span> <span class="ntt--optional-txt">'. esc_html( $optional_text ).'</span></span>';
        $fields['url'] .= '</label>';
        $fields['url'] .= '<div class="ntt--comment-author-url-textbox ntt--form-element ntt--obj" data-name="Comment Author URL Textbox">';
            $fields['url'] .= '<input type="url" name="url" value="'. esc_attr( $comment_author['comment_author_url'] ). '" size="64" placeholder="'. esc_attr( $website_text ). ' '. '('. esc_attr( $optional_text ). ')" title="'. esc_attr( $website_text ). ' '. esc_attr( $url_text ). '" id="ntt--comment-author-url-text-input" class="text-input">';
        $fields['url'] .= '</div>';
    $fields['url'] .= '</div>';

    return $fields;
}
add_filter( 'comment_form_default_fields', 'ntt__function__comment_form' );