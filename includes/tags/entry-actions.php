<?php

if ( ! function_exists( 'ntt_entry_admin_actions') ) {
    function ntt_entry_admin_actions() {

        if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {
            
            if ( get_the_title() ) {
                $entry_name = get_the_title();
                $entry_name_title_attr = esc_attr( get_the_title() );
            } else {
                $entry_text = esc_html__( 'Entry', 'ntt' );
                $entry_id = get_the_id();
                
                $entry_name_title_attr = $entry_text. ' '. $entry_id;
                $entry_name = '<span class="entry---txt">'. $entry_text. '</span>'. ' '. '<span class="num entry-id---txt">'. $entry_id. '</span>';
            }
            
            $label_mu = '<span class="modify-entry-axn---l" title="Edit'. ' '. $entry_name_title_attr. '"><span class="edit---txt">Edit</span> <span class="entry-name---txt">'. $entry_name. '</span></span>'; ?>

            <div class="entry-admin-axns admin-axns axns cp" aria-label="Entry Admin Actions">
                <div class="entry-admin-axns---cr">
                    <div class="modify-entry-axn modify-axn p-modify axn obj" aria-label="Modify Entry Action">
                    <?php echo edit_post_link( $label_mu, '', '' ); ?>
                    </div>
                </div>
            </div>
        
        <?php }

    }
}