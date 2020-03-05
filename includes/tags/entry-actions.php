<?php
/**
 * Entry Actions
 */

if ( ! function_exists( 'ntt__tag__entry_actions') ) {
    function ntt__tag__entry_actions() {

        if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {

            if ( get_the_title() ) {
                $entry_name = get_the_title();
            } else {
                $entry_name = _x( 'Entry', 'Entry (i.e. Article, Post)', 'ntt' ). ' '. get_the_id();
            }

            $edit_text = __( 'Edit', 'ntt' );
            ?>
            
            <div class="ntt--entry-axns ntt--cp" data-name="Entry Actions">
                <div aria-label="<?php esc_attr_e( 'Edit Entry', 'ntt' ); ?>" title="<?php echo esc_attr( $edit_text ). ' '. esc_attr( $entry_name ); ?>" class="ntt--modify-entry-axn ntt--obj" data-name="Modify Entry Action">
                    <?php echo edit_post_link( '<span class="ntt--txt">'. esc_html( $edit_text ).'</span>', '', '' ); ?>
                </div>
            </div>
            <?php
        }
    }
}