<?php
if ( ! function_exists( 'ntt_entry_admin_actions') ) {
    function ntt_entry_admin_actions() {

        if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {

            $get_the_title = get_the_title();
            $edit_text = __( 'Edit', 'ntt' );
            
            if ( $get_the_title ) {
                $entry_name_title_attr = esc_attr( $get_the_title );
            } else {
                $entry_text = __( 'Entry', 'ntt' );
                $get_the_id = get_the_id();
                
                $entry_name_title_attr = esc_attr( $entry_text ). ' '. esc_attr( $get_the_id );
            }
            
            $entry_name_label = '<span title="'. esc_attr( $edit_text ). ' '. $entry_name_title_attr. '" class="txt">'. esc_html( $edit_text ).'</span>';
            ?>
            
            <div class="entry-axns cp" data-name="Entry Actions">
                <div class="entry-axns---cr">
                    <div class="modify-entry-axn obj" aria-label="Edit Entry" data-name="Modify Entry Action">
                        <?php echo edit_post_link( $entry_name_label, '', '' ); ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}