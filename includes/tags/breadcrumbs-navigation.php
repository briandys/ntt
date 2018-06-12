<?php

// https://www.thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin

if ( ! function_exists( 'ntt_breadcrumbs_nav' ) ) {
    function ntt_breadcrumbs_nav() {
        global $post;
        
        if ( is_page() && $post->post_parent && ! is_attachment() ) {
            
            $anc = get_post_ancestors( $post->ID );
            $anc = array_reverse( $anc );

            if ( ! isset( $breadcrumbs_ancestors ) ) {
                $breadcrumbs_ancestors = null;
            }

            foreach ( $anc as $ancestor ) {
                $navi_ancestors = '<div class="breadcrumb-navi--ancestor breadcrumb-navi breadcrumb-navi obj item">';
                    $navi_ancestors .= '<a href="'. esc_url( get_permalink( $ancestor ) ). '" title="'. esc_attr( get_the_title( $ancestor ) ). '" class="breadcrumb-navi---a a">';
                        $navi_ancestors .= '<span class="breadcrumb-navi---l l">';
                           $navi_ancestors .= '<span class="navi---txt txt">'. get_the_title( $ancestor ). '</span>';
                        $navi_ancestors .= '</span>';
                    $navi_ancestors .= '</a>';
                $navi_ancestors .= '</div>';

                $breadcrumbs_ancestors .= $navi_ancestors;
            }

            $navi_current = '<div class="breadcrumb-navi--current breadcrumb-navi obj item">';
                $navi_current .= '<span class="breadcrumb-navi--current---l breadcrumb-navi---l l">';
                    $navi_current .= '<span class="navi---txt txt">'. get_the_title(). '</span>';
                $navi_current .= '</span>';
            $navi_current .= '</div>'; ?>

            <div class="cm-nav breadcrumbs-nav nav cp" data-name="Breadcrumbs Navigation">
                <div class="cm-nav---cr breadcrumbs-nav---cr">

                    <div class="cm-nav-name breadcrumbs-nav-name nav-name name obj" aria-label="Breadcrumbs Navigation Name"><?php echo esc_html__( 'Breadcrumbs Navigation', 'ntt' ); ?></div>

                    <div class="breadcrumbs-nav-group nav-group group">
                    <?php echo $breadcrumbs_ancestors. ' '. $navi_current; ?>
                    </div>
                
                </div>
            </div>

        <?php }
    }
}

if ( ! function_exists( 'ntt_breadcrumbs_nav_body_css' ) ) {
    function ntt_breadcrumbs_nav_body_css( $classes ) {
        global $post;
        
        if ( is_page() && $post->post_parent && ! is_attachment() ) {
            $classes[] = 'ntt-breadcrumbs';
        }
        return $classes;
    }
    add_filter( 'body_class', 'ntt_breadcrumbs_nav_body_css' );
}