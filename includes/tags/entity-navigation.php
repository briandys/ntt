<?php
/**
 * Entity Primary Navigation
 */
register_nav_menu( 'entity-primary-nav', __( 'Primary Navigation', 'ntt' ) );

if ( ! function_exists( 'ntt_entity_primary_nav' ) ) {
    function ntt_entity_primary_nav() {
        
        $group_mu_start = '<ul class="entity-primary-nav-group---cr">';
        $group_mu_end   = '</ul>';
        $label_mu_start = '<span class="entity-primary-navi---l"><span class="entity-primary-navi---txt navi---txt">';
        $label_mu_end   = '</span></span>';
        $nav_group_css  = 'entity-primary-nav-group nav-group group cp';
        
        if ( wp_nav_menu( array( 'theme_location' => 'entity-primary-nav', 'echo' => false, ) ) !== false) {
            ?>

            <nav role="navigation" id="entity-primary-nav" class="entity-primary-nav entity-nav nav cp" data-name="Entity Primary Navigation">
                <div class="entity-primary-nav---cr">
                    
                    <h2 class="entity-primary-nav-name nav-name obj h" data-name="Entity Primary Navigation Name">
                        <span class="txt"><?php esc_html_e( 'Primary Navigation', 'ntt' ); ?></span>
                    </h2>
                    
                    <?php
                    function escape_html_the_title( $title, $id = null ) {
                        return esc_html( $title );
                    }
                    add_filter( 'the_title', 'escape_html_the_title', 10, 2 );
                    
                    if ( ! has_nav_menu( 'entity-primary-nav' ) ) {

                        /**
                         * Default Menu
                         * Navigation Item <li class="page_item">
                         * Current Navigation Item <li class="current_page_item">
                         * Sub-Navigation <ul class="children">
                         */
                        wp_page_menu( array(
                            'menu_class'        => $nav_group_css,
                            'link_before'       => $label_mu_start,
                            'link_after'        => $label_mu_end,
                            'show_home'         => true,
                            'before'            => $group_mu_start,
                            'after'             => $group_mu_end,
                        ) );
                    } else {
                        
                        /**
                         * Custom Menu (WP Admin > Apperance > Menus)
                         * Navigation Item <li class="menu-item">
                         * Current Navigation Item <li class="current-menu-item">
                         * Sub-Navigation <ul class="sub-menu">
                         */
                        wp_nav_menu( array(
                            'theme_location'    => 'entity-primary-nav',
                            'container'         => 'div',
                            'container_class'   => $nav_group_css,
                            'link_before'       => $label_mu_start,
                            'link_after'        => $label_mu_end,
                            'items_wrap'        => $group_mu_start. '%3$s'. $group_mu_end,
                        ) );
                    }
                    ?>
                </div>
            </nav>
            <?php
        }
    }
}

/**
 * Entity Secondary Navigation
 */
register_nav_menu( 'entity-secondary-nav', __( 'Secondary Navigation', 'ntt' ) );

if ( ! function_exists( 'ntt_entity_secondary_nav' ) ) {
    function ntt_entity_secondary_nav() {
        
        if ( has_nav_menu( 'entity-secondary-nav' ) ) {
            ?>

            <div role="navigation" id="entity-secondary-nav" class="entity-secondary-nav entity-nav nav cp" data-name="Entity Secondary Navigation">
                <div class="entity-secondary-nav---cr">
                    
                    <div class="entity-secondary-nav-name nav-name obj h" data-name="Entity Secondary Navigation Name">
                        <span class="txt"><?php esc_html_e( 'Secondary Navigation', 'ntt' ); ?></span>
                    </div>

                    <?php wp_nav_menu( array(
                        'theme_location'    => 'entity-secondary-nav',
                        'container'         => 'div',
                        'container_class'   => 'entity-secondary-nav-group nav-group group cp',
                        'link_before'       => '<span class="entity-secondary-navi---l"><span class="entity-secondary-navi---txt navi---txt">',
                        'link_after'        => '</span></span>',
                        'items_wrap'        => '<ul class="entity-secondary-nav-group---cr">'. '%3$s'. '</ul>',
                    ) ); ?>
                </div>
            </div>
            <?php
        }
    }
}