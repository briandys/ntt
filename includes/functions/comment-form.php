<?php
/**
 * Comment Form
 */

function ntt_comment_form( $fields ) {       
    
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? ' '. 'required'. ' ' : '' );
    
    $optional_note = ' '. '<span class="optional-text">'. __( 'Optional', 'ntt' ). '</span>';
    $optional = ( $req ? '' : $optional_note );

    $name_text = __( 'Name', 'ntt' );
    $email_text = __( 'Email', 'ntt' );
    $website_text = _x( 'Website', 'Website URL', 'ntt' );
    $url_text = _x( 'URL', 'Website URL', 'ntt' );
    $website_url_text = __( 'Website URL', 'ntt' );

    // Commenter Name
    $fields['author'] = '<div class="ntt--commenter-name-field ntt--form-field ntt--cp" data-name="Commenter Name Field">';
        $fields['author'] .= '<label for="ntt--commenter-name-text-input" class="ntt--commenter-name-label ntt--form-label ntt--obj">';
            $fields['author'] .= '<span class="ntt--txt">';
                $fields['author'] .= '<span class="ntt--label-txt">'. esc_html( $name_text ). '</span>';
                $fields['author'] .= $optional;
            $fields['author'] .= '</span>';
        $fields['author'] .= '</label>';
        $fields['author'] .= '<div class="ntt--commenter-name-textbox ntt--form-element ntt--obj" data-name="Commenter Name Textbox">';
            $fields['author'] .= '<input type="text" name="author" value="'. esc_attr( $commenter['comment_author'] ). '" size="64" placeholder="'. esc_attr( $name_text ). '" title="'. esc_attr( $name_text ). '"'. $aria_req. 'id="ntt--commenter-name-text-input" class="text-input">';
        $fields['author'] .= '</div>';
    $fields['author'] .= '</div>';

    // Commenter Email
    $fields['email'] = '<div class="ntt--commenter-email-field ntt--form-field ntt--cp" data-name="Commenter Email Field">';
        $fields['email'] .= '<label for="ntt--commenter-email-text-input" class="ntt--commenter-email-label ntt--form-label ntt--obj">';
            $fields['email'] .= '<span class="ntt--txt">'. esc_html( $email_text ). '</span>';
        $fields['email'] .= '</label>';
        $fields['email'] .= '<div class="ntt--commenter-email-textbox ntt--form-element ntt--obj" data-name="Commenter Email Textbox">';
            $fields['email'] .= '<input type="email" name="email" value="'. esc_attr( $commenter['comment_author_email'] ). '" size="64" placeholder="'. esc_attr( $email_text ).'" title="'. esc_attr( $email_text ). '" required id="ntt--commenter-email-text-input" class="text-input">';
        $fields['email'] .= '</div>';
    $fields['email'] .= '</div>';

    // Commenter Website URL
    $fields['url'] = '<div class="ntt--commenter-url-field ntt--form-field ntt--cp" data-name="Commenter URL Field">';
        $fields['url'] .= '<label for="ntt--commenter-url-text-input" class="comment-author-url-field-label field-label ntt--obj">';
            $fields['url'] .= '<span class="ntt--txt">';
                $fields['url'] .= '<span class="ntt--label-txt">'. esc_html( $website_text ). '</span>';
                $fields['url'] .= $optional_note;
            $fields['url'] .= '</span>';
        $fields['url'] .= '</label>';
        $fields['url'] .= '<div class="ntt--commenter-url-textbox ntt--form-element ntt--obj" data-name="Commenter URL Textbox">';
            $fields['url'] .= '<input type="url" name="url" value="'. esc_attr( $commenter['comment_author_url'] ). '" size="64" placeholder="'. esc_attr( $url_text ). '" title="'. esc_attr( $website_url_text ). '" id="ntt--commenter-url-text-input" class="text-input">';
        $fields['url'] .= '</div>';
    $fields['url'] .= '</div>';

    return $fields;
}
add_filter( 'comment_form_default_fields', 'ntt_comment_form' );