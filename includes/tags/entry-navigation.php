<?php
/**
 * Entry Navigation
 */

if ( ! function_exists('ntt__tag__entry_nav' ) ) {
    function ntt__tag__entry_nav() {
        
        if ( ( is_single() || is_page() ) && ( get_next_post_link() || get_previous_post_link() ) ) {

            $entry_nav_name_text = apply_filters( 'ntt_entry_nav_name_filter', __( 'Entry Navigation', 'ntt' ) );
            ?>
            <div aria-label="<?php esc_attr_e( 'Entry', 'ntt' ); ?>" role="navigation" class="ntt--entry-nav ntt--nav ntt--cp" data-name="Entry Navigation">
                <div class="ntt--entry-nav-name ntt--nav-name ntt--obj">
                    <span class="ntt--txt"><?php echo esc_html( $entry_nav_name_text ); ?></span>
                </div>
                <div class="ntt--entry-nav-group ntt--nav-group ntt--cp">
                    <?php
                    $featured_image_size = 'ntt-thumbnail';
                    
                    if ( get_next_post_link() ) {

                        $next_entry_text = __( 'Next Entry', 'ntt' );
            
                        $next_navi_txt_mu = '<span aria-label="'. esc_attr( $next_entry_text ). ':'. ' '. esc_attr( '%title' ). '" title="'. esc_attr( $next_entry_text ). ':'. ' '. esc_attr( '%title' ). '" class="ntt--txt">';
                            $next_navi_txt_mu .= '<label class="ntt--label-txt">'. esc_html_x( 'Next', 'Next Entry', 'ntt' ). '</label>';
                            $next_navi_txt_mu .= '<span class="ntt--delimiter-txt">'. esc_html( ':' ). '</span>';
                            $next_navi_txt_mu .= ' '. '<span class="ntt--entry-name-txt">'. esc_html( '%title' ) .'</span>';
                        $next_navi_txt_mu .= '</span>';

                        if ( '' !== get_the_post_thumbnail( get_next_post()->ID ) ) {
                            $next_post_thumbnail_mu = '<span title="'. esc_attr( $next_entry_text ). ':'. ' '. esc_attr( '%title' ). '" class="ntt--img">'. get_the_post_thumbnail( get_next_post()->ID, $featured_image_size ). '</span>';
                        } else {
                            $next_post_thumbnail_mu = '';
                        }
                        ?>
                        
                        <div class="ntt--next-entry-navi ntt--entry-navi ntt--navi ntt--obj">
                            <?php next_post_link( '%link', $next_navi_txt_mu. $next_post_thumbnail_mu ); ?>
                        </div>
                        <?php
                    }
                    
                    if ( get_previous_post_link() ) {

                        $previous_entry_text = __( 'Previous Entry', 'ntt' );

                        $previous_navi_txt_mu = '<span aria-label="'. esc_attr( $previous_entry_text ). ':'. ' '. esc_attr( '%title' ). '" title="'. esc_attr( $previous_entry_text ). ':'. ' '. esc_attr( '%title' ). '" class="ntt--txt">';
                            $previous_navi_txt_mu .= '<label class="ntt--label-txt">'. esc_html_x( 'Previous', 'Previous Entry', 'ntt' ). '</label>';
                            $previous_navi_txt_mu .= '<span class="ntt--delimiter-txt">'. esc_html( ':' ). '</span>';
                            $previous_navi_txt_mu .= ' '. '<span class="ntt--entry-name-txt">'. esc_html( '%title' ) .'</span>';
                        $previous_navi_txt_mu .= '</span>';

                        if ( '' !== get_the_post_thumbnail( get_previous_post()->ID ) ) {
                            $prev_post_thumbnail_mu = '<span title="'. esc_attr( $previous_entry_text ). ':'. ' '. esc_attr( '%title' ). '" class="ntt--img">'. get_the_post_thumbnail( get_previous_post()->ID, $featured_image_size ). '</span>';
                        } else {
                            $prev_post_thumbnail_mu = '';
                        }

                        $prev_post = get_previous_post();
                        ?>
                        
                        <div class="ntt--previous-entry-navi ntt--entry-navi ntt--navi ntt--obj">
                            <?php previous_post_link( '%link', $previous_navi_txt_mu. $prev_post_thumbnail_mu ); ?>
                        </div>
                        <?php 
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    }
}