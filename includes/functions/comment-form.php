<?php
function ntt_comment_form( $fields ) {       
    
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? ' '. 'required'. ' ' : '' );
    
    $optional_note = ' '. '<span class="optional---text">'. __( 'Optional', 'ntt' ). '</span>';
    $optional = ( $req ? '' : $optional_note );

    $name_text = __( 'Name', 'ntt' );
    $email_text = __( 'Email', 'ntt' );
    $website_text = _x( 'Website', 'Website URL', 'ntt' );
    $url_text = _x( 'URL', 'Website URL', 'ntt' );
    $website_url_text = __( 'Website URL', 'ntt' );

    // Comment Author Name
    $fields['author'] = '<div class="comment-author-name-field field cp" data-name="Comment Author Name Field">';
        $fields['author'] .= '<div class="cr ">';
            $fields['author'] .= '<label for="comment-author-name-field-input" class="comment-author-name-field-label obj">';
                $fields['author'] .= '<span class="name---text">'. esc_html( $name_text ). '</span>';
                $fields['author'] .= $optional;
            $fields['author'] .= '</label>';
            $fields['author'] .= '<div class="comment-author-name-field-textbox textbox obj" data-name="Comment Author Name Field Textbox">';
                $fields['author'] .= '<input type="text" name="author" value="'. esc_attr( $commenter['comment_author'] ). '" size="64" placeholder="'. esc_attr( $name_text ). '" title="'. esc_attr( $name_text ). '"'. $aria_req. 'id="comment-author-name-field-input" class="text-input">';
            $fields['author'] .= '</div>';
        $fields['author'] .= '</div>';
    $fields['author'] .= '</div>';

    // Comment Author Email
    $fields['email'] = '<div class="comment-author-email-field field cp" data-name="Comment Author Email Field">';
        $fields['email'] .= '<div class="comment-author-email-field---cr">';
            $fields['email'] .= '<label for="comment-author-email-field-input" class="comment-author-email-field-label obj">';
                $fields['email'] .= esc_html( $email_text );
            $fields['email'] .= '</label>';
            $fields['email'] .= '<div class="comment-author-email-field-textbox textbox obj" data-name="Comment Author Email Field Textbox">';
                $fields['email'] .= '<input type="email" name="email" value="'. esc_attr( $commenter['comment_author_email'] ). '" size="64" placeholder="'. esc_attr( $email_text ).'" title="'. esc_attr( $email_text ). '" required id="comment-author-email-field-input" class="text-input">';
            $fields['email'] .= '</div>';
        $fields['email'] .= '</div>';
    $fields['email'] .= '</div>';

    // Comment Author Website URL
    $fields['url'] = '<div class="comment-author-url-field field cp" data-name="Comment Author URL Field">';
        $fields['url'] .= '<div class="comment-author-url-field---cr">';
            $fields['url'] .= '<label for="comment-author-url-field-input" class="comment-author-url-field-label obj">';
                $fields['url'] .= '<span class="website---text">'. esc_html( $website_text ). '</span>';
                $fields['url'] .= ' '. '<span class="url---text">'. esc_html( $url_text ). '</span>';
                $fields['url'] .= $optional_note;
            $fields['url'] .= '</label>';
            $fields['url'] .= '<div class="comment-author-url-field-textbox textbox obj" data-name="Comment Author URL Field Textbox">';
                $fields['url'] .= '<input type="url" name="url" value="'. esc_attr( $commenter['comment_author_url'] ). '" size="64" placeholder="'. esc_attr( $url_text ). '" title="'. esc_attr( $website_url_text ). '" id="comment-author-url-field-input" class="text-input">';
            $fields['url'] .= '</div>';
        $fields['url'] .= '</div>';
    $fields['url'] .= '</div>';

    return $fields;
}
add_filter( 'comment_form_default_fields', 'ntt_comment_form' );