<?php
if ( ! function_exists( 'ntt_entry_admin_actions') ) {
    function ntt_entry_admin_actions() {

        if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {

            $edit_text = __( 'Edit', 'ntt' );
            
            if ( get_the_title() ) {
                $entry_name_title_attr = esc_attr( get_the_title() );
            } else {
                $entry_text = __( 'Entry', 'ntt' );
                $get_the_id = get_the_id();
                
                $entry_name_title_attr = esc_attr( $entry_text ). ' '. esc_attr( $get_the_id );
            }
            
            $entry_name_label = '<span title="'. esc_attr__( 'Edit', 'ntt' ). ' '. $entry_name_title_attr. '" class="txt">'. esc_html__( 'Edit', 'ntt' ).'</span>';
            ?>
            
            <div class="entry-axns cp" data-name="Entry Actions">
                <div class="entry-axns---cr">
                    <div aria-label="Edit Entry" class="modify-entry-axn obj" data-name="Modify Entry Action">
                        <?php echo edit_post_link( $entry_name_label, '', '' ); ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}