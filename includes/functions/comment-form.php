<?php
function ntt_comment_form( $fields ) {       
    
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? ' '. 'required'. ' ' : '' );
    
    $optional_note = ' '. '<span class="optional---text">'. __( 'Optional', 'ntt' ). '</span>';
    $optional = ( $req ? '' : $optional_note );

    // Comment Author Name
    $fields['author'] = '<div class="comment-author-name-field field cp" data-name="Comment Author Name Field">';
        $fields['author'] .= '<div class="comment-author-name-field---cr field---cr ">';
            $fields['author'] .= '<label for="comment-author-name-field-input" class="comment-author-name-field-label obj" data-name="Comment Author Name Field Label">';
                $fields['author'] .= '<span class="comment-author-name-label---l">';
                    $fields['author'] .= '<span class="name---text">'. __( 'Name', 'ntt' ). '</span>';
                    $fields['author'] .= $optional;
                $fields['author'] .= '</span>';
            $fields['author'] .= '</label>';
            $fields['author'] .= '<div class="comment-author-name-field-textbox textbox obj" data-name="Comment Author Name Field Textbox">';
                $fields['author'] .= '<input type="text" name="author" value="'. esc_attr( $commenter['comment_author'] ). '" size="64" placeholder="'. __( 'Name', 'ntt' ). '" title="'. __( 'Name', 'ntt' ). '"'. $aria_req. 'id="comment-author-name-field-input" class="text-input">';
            $fields['author'] .= '</div>';
        $fields['author'] .= '</div>';
    $fields['author'] .= '</div>';

    // Comment Author Email
    $fields['email'] = '<div class="comment-author-email-field field cp" data-name="Comment Author Email Field">';
        $fields['email'] .= '<div class="comment-author-email-field---cr field---cr">';
            $fields['email'] .= '<label for="comment-author-email-field-input" class="comment-author-email-field-label obj" data-name="Comment Author Email Field Label">';
                $fields['email'] .= '<span class="txt">'. __( 'Email', 'ntt' ). '</span>';
            $fields['email'] .= '</label>';
            $fields['email'] .= '<div class="comment-author-email-field-textbox textbox obj" data-name="Comment Author Email Field Textbox">';
                $fields['email'] .= '<input type="email" name="email" value="'. esc_attr( $commenter['comment_author_email'] ). '" size="64" placeholder="'. __( 'Email', 'ntt' ).'" title="'. __( 'Email', 'ntt' ). '" required id="comment-author-email-field-input" class="text-input">';
            $fields['email'] .= '</div>';
        $fields['email'] .= '</div>';
    $fields['email'] .= '</div>';

    // Comment Author Website URL
    $fields['url'] = '<div class="comment-author-url-field field cp" data-name="Comment Author URL Field">';
        $fields['url'] .= '<div class="comment-author-url-field---cr field---cr">';
            $fields['url'] .= '<label for="comment-author-url-field-input" class="comment-author-url-field-label obj" data-name="Comment Author URL Field Label">';
                $fields['url'] .= '<span class="l">';
                    $fields['url'] .= '<span class="website---text">'. _x( 'Website', 'Website URL', 'ntt' ). '</span>';
                    $fields['url'] .= ' '. '<span class="url---text">'. _x( 'URL', 'Website URL', 'ntt' ). '</span>';
                    $fields['url'] .= $optional_note;
                $fields['url'] .= '</span>';
            $fields['url'] .= '</label>';
            $fields['url'] .= '<div class="comment-author-url-field-textbox textbox obj" data-name="Comment Author URL Field Textbox">';
                $fields['url'] .= '<input type="url" name="url" value="'. esc_attr( $commenter['comment_author_url'] ). '" size="64" placeholder="URL" title="'. __( 'Website URL', 'ntt' ). '" id="comment-author-url-field-input" class="text-input">';
            $fields['url'] .= '</div>';
        $fields['url'] .= '</div>';
    $fields['url'] .= '</div>';

    return $fields;
}
add_filter( 'comment_form_default_fields', 'ntt_comment_form' );