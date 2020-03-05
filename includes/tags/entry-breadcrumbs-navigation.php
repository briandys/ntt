<?php
/**
 * Entry Breadcrumbs Navigation
 * 
 * https://www.thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin
 */

 if ( ! function_exists( 'ntt__tag__entry_breadcrumbs_nav' ) ) {
    function ntt__tag__entry_breadcrumbs_nav() {

        global $post;
        
        if ( is_page() && $post->post_parent && ! is_attachment() ) {

            $anc = get_post_ancestors( $post->ID );
            $anc = array_reverse( $anc );

            if ( ! isset( $breadcrumbs_ancestors_mu ) ) {
                $breadcrumbs_ancestors_mu = null;
            }

            foreach ( $anc as $ancestor ) {
                $navi_ancestors = '<li class="ntt--entry-breadcrumbs-navi navi ntt--obj">';
                    $navi_ancestors .= '<a href="'. esc_url( get_permalink( $ancestor ) ). '" title="'. esc_attr( get_the_title( $ancestor ) ). '">';
                        $navi_ancestors .= '<span class="ntt--txt">'. esc_html( get_the_title( $ancestor ) ). '</span>';
                    $navi_ancestors .= '</a>';
                $navi_ancestors .= '</li>';

                $breadcrumbs_ancestors_mu .= $navi_ancestors;
            }
            ?>

            <div aria-label="Breadcrumbs" role="navigation" class="ntt--entry-breadcrumbs-nav ntt--nav ntt--cp" data-name="Breadcrumbs Navigation">
                <div class="ntt--entry-breadcrumbs-nav-name ntt--nav-name ntt--obj">
                    <span class="ntt--txt"><?php esc_html_e( 'Breadcrumbs Navigation', 'ntt' ); ?></span>
                </div>
                <div class="ntt--entry-breadcrumbs-nav-group ntt--nav-group ntt--cp">
                    <ul class="ntt--entry-breadcrumbs-nav-ancestors-group ntt--cp">
                        <?php echo $breadcrumbs_ancestors_mu; ?>
                    </ul>
                    <div class="ntt--entry-breadcrumbs-navi---current ntt--entry-breadcrumbs-navi ntt--navi ntt--obj">
                        <span class="ntt--txt"><?php echo esc_html( get_the_title() ); ?></span>
                    </div>
                </div>
            </div>
            <?php    
        }

        if ( is_attachment() ) {
            the_post_navigation( array(
                'prev_text' => sprintf( '<span class="ntt--txt"><label class="ntt--label-txt">'. _x( 'Published in', 'Published in Entry Name', 'ntt' ). '</label>'. ' '. '<span class="ntt--entry-name-txt">'. esc_html( '%s' ). '</span></span>',
                '%title' ), )
            );
        }
    }
}