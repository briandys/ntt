<?php

if ( ! function_exists( 'ntt_entry_admin_actions') ) {
    function ntt_entry_admin_actions() {

        if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {

            // Variables: Entry Name
            $get_the_title = get_the_title();
            
            if ( $get_the_title ) {
                $entry_name = '<span class="entry-name---txt">'. esc_html( $get_the_title ). '</span>';
                $entry_name_title_attr = esc_attr( $get_the_title );
            } else {
                $entry_text = __( 'Entry', 'ntt' );
                $get_the_id = get_the_id();
                
                $entry_name = '<span class="entry-name---line">';
                $entry_name .= '<span class="entry---text">'. esc_html( $entry_text ). '</span>'. ' ';
                $entry_name .= '<span class="entry-id---txt num">'. esc_html( $get_the_id ). '</span>';
                $entry_name .= '</span>';
                $entry_name_title_attr = esc_attr( $entry_text ). ' '. esc_attr( $get_the_id );
            }
            
            // Variables: Entry Name Label
            $edit_text = __( 'Edit', 'ntt' );
            $entry_name_label = '<span class="modify-entry-axn---l" title="'. esc_attr( $edit_text ). ' '. $entry_name_title_attr. '">';
            $entry_name_label .= '<span class="modify-entry-axn---txt">'. esc_html( $edit_text ).'</span>'. ' '. $entry_name. '</span>';
            ?>
            
            <div class="entry-axns axns cp" data-name="Entry Actions">
                <div class="entry-axns---cr">
                    <div class="modify-entry-axn modify-axn p-modify axn obj" aria-label="Edit Entry" data-name="Modify Entry Action">
                        <?php echo edit_post_link( $entry_name_label, '', '' ); ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}