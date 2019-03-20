<?php
/**
 * Entry Breadcrumbs Navigation
 * 
 * https://www.thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin
 */
if ( ! function_exists( 'ntt_entry_breadcrumbs_nav' ) ) {
    function ntt_entry_breadcrumbs_nav() {

        global $post;
        
        if ( is_page() && $post->post_parent && ! is_attachment() ) {

            $anc = get_post_ancestors( $post->ID );
            $anc = array_reverse( $anc );

            if ( ! isset( $breadcrumbs_ancestors_mu ) ) {
                $breadcrumbs_ancestors_mu = null;
            }

            foreach ( $anc as $ancestor ) {
                $navi_ancestors = '<li class="entry-breadcrumbs-navi navi obj">';
                    $navi_ancestors .= '<a href="'. esc_url( get_permalink( $ancestor ) ). '" title="'. esc_attr( get_the_title( $ancestor ) ). '">';
                        $navi_ancestors .= '<span class="txt">'. esc_html( get_the_title( $ancestor ) ). '</span>';
                    $navi_ancestors .= '</a>';
                $navi_ancestors .= '</li>';

                $breadcrumbs_ancestors_mu .= $navi_ancestors;
            }
            ?>

            <div class="entry-breadcrumbs-nav nav cp" data-name="Breadcrumbs Navigation">
                <div class="entry-breadcrumbs-nav---cr nav---cr">
                    <div class="entry-breadcrumbs-nav-name nav-name obj">
                        <span class="txt"><?php esc_html_e( 'Breadcrumbs Navigation', 'ntt' ); ?></span>
                    </div>
                    <div class="entry-breadcrumbs-nav-group nav-group cp">
                        <div class="entry-breadcrumbs-nav-group---cr nav-group---cr">
                            <div class="entry-breadcrumbs-nav-ancestors-group cp">
                                <ul class="entry-breadcrumbs-nav-ancestors-group---cr">
                                    <?php echo $breadcrumbs_ancestors_mu; ?>
                                </ul>
                            </div>
                            <div class="entry-breadcrumbs-navi--current entry-breadcrumbs-navi navi obj">
                                <span class="txt"><?php echo esc_html( get_the_title() ); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php    
        }

        if ( is_attachment() ) {
            the_post_navigation( array(
                'prev_text' => sprintf( '<span class="l"><span class="published-in---text">'. _x( 'Published in', 'Published in [Entry Name]', 'ntt' ). '</span>'. ' '. '<span class="entry-name---txt">'. esc_html( '%s' ). '</span></span>',
                '%title' ), )
            );
        }
    }
}