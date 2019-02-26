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
                $navi_ancestors = '<li>';
                    $navi_ancestors .= '<a href="'. esc_url( get_permalink( $ancestor ) ). '" title="'. esc_attr( get_the_title( $ancestor ) ). '">';
                        $navi_ancestors .= '<span class="txt">'. esc_html( get_the_title( $ancestor ) ). '</span>';
                    $navi_ancestors .= '</a>';
                $navi_ancestors .= '</li>';

                $breadcrumbs_ancestors_mu .= $navi_ancestors;
            }

            $navi_current_mu = '<div class="breadcrumb-navi--current obj">'. esc_html( get_the_title() ). '</div>'; ?>

            <div class="breadcrumbs-nav cp" data-name="Breadcrumbs Navigation">
                <div class="breadcrumbs-nav---cr">
                    <div class="breadcrumbs-nav-name obj"><?php esc_html_e( 'Breadcrumbs Navigation', 'ntt' ); ?></div>
                    <div class="breadcrumbs-nav-group cp">
                        <div class="breadcrumbs-nav-group---cr">
                            <div class="breadcrumbs-nav-ancestors-group cp">
                                <ul class="breadcrumbs-nav-ancestors-group---cr">
                                    <?php echo $breadcrumbs_ancestors_mu; ?>
                                </ul>
                            </div>
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