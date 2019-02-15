<?php
// https://www.thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin

if ( ! function_exists( 'ntt_breadcrumbs_nav' ) ) {
    function ntt_breadcrumbs_nav() {

        global $post;
        
        if ( is_page() && $post->post_parent && ! is_attachment() ) {

            $anc = get_post_ancestors( $post->ID );
            $anc = array_reverse( $anc );

            if ( ! isset( $breadcrumbs_ancestors_mu ) ) {
                $breadcrumbs_ancestors_mu = null;
            }

            foreach ( $anc as $ancestor ) {
                $navi_ancestors = '<div class="breadcrumb-navi--ancestor breadcrumb-navi obj">';
                    $navi_ancestors .= '<a href="'. esc_url( get_permalink( $ancestor ) ). '" title="'. esc_attr( get_the_title( $ancestor ) ). '">';
                        $navi_ancestors .= '<span class="txt">'. esc_html( get_the_title( $ancestor ) ). '</span>';
                    $navi_ancestors .= '</a>';
                $navi_ancestors .= '</div>';

                $breadcrumbs_ancestors_mu .= $navi_ancestors;
            }

            $navi_current_mu = '<div class="breadcrumb-navi--current breadcrumb-navi obj">';
                $navi_current_mu .= '<span class="txt">'. esc_html( get_the_title() ). '</span>';
            $navi_current_mu .= '</div>'; ?>

            <div class="breadcrumbs-nav nav cp" data-name="Breadcrumbs Navigation">
                <div class="cr">
                    <div class="breadcrumbs-nav-name nav-name obj"><?php esc_html_e( 'Breadcrumbs Navigation', 'ntt' ); ?></div>
                    <div class="breadcrumbs-nav-content cp" data-name="Breadcrumbs Navigation Content">
                        <div class="cr">
                            <div class="breadcrumbs-nav-ancestors-group cp"><?php echo $breadcrumbs_ancestors_mu; ?></div>
                            <?php echo $navi_current_mu; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php    
        }

        if ( is_attachment() ) {
            the_post_navigation( array(
                'prev_text' => sprintf( '<span class="published-in---text">'. _x( 'Published in', 'Published in [Entry Name]', 'ntt' ). '</span>'. ' '. '<span class="entry-name---txt">'. esc_html( '%s' ). '</span>',
                '%title' ), )
            );
        }
    }
}