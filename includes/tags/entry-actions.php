<?php

if ( ! function_exists( 'ntt_entry_admin_actions') ) {
    function ntt_entry_admin_actions() {

        if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {
            
            if ( get_the_title() ) {
                $entry_name = '<span class="entry-name---txt txt">'. get_the_title(). '</span>';
                $entry_name_title_attr = esc_attr( get_the_title() );
            } else {
                $entry_text = esc_html__( 'Entry', 'ntt' );
                $entry_id = get_the_id();
                
                $entry_name = '<span class="entry-name---line line"><span class="entry---txt txt">'. $entry_text. '</span>'. ' '. '<span class="entry-id---txt num txt">'. $entry_id. '</span></span>';
                $entry_name_title_attr = $entry_text. ' '. $entry_id;
            }
            
            $label_mu = '<span class="modify-entry-axn---l l" title="'. esc_attr__( 'Edit', 'ntt' ). ' '. $entry_name_title_attr. '"><span class="edit---txt txt">'. esc_html__( 'Edit', 'ntt' ).'</span>'. ' '. $entry_name. '</span>';
            ?>

            <div class="cm-axns-trunk entry-axns axns-trunk axns cp" data-name="Entry Actions">
                <div class="cm-axns-trunk---cr entry-axns---cr">
                    <div class="entry-admin-axns admin-axns axns cp" aria-label="Entry Admin Actions">
                        <div class="entry-admin-axns---cr">
                            <div class="modify-entry-axn modify-axn p-modify axn obj" aria-label="Modify Entry Action">
                                <?php echo edit_post_link( $label_mu, '', '' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}