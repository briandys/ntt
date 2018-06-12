<?php

register_nav_menu( 'main-nav', __( 'Primary Navigation', 'ntt' ) );

if ( ! function_exists( 'ntt_entity_primary_nav' ) ) {
    function ntt_entity_primary_nav() {
        
        $group_mu_start = '<ul class="entity-primary-nav-group group list">';
        $group_mu_end = '</ul>';
        $label_mu_start = '<span class="entity-primary-navi---l l"><span class="navi---txt txt">';
        $label_mu_end = '</span></span>';
        
        if ( wp_nav_menu( array( 'theme_location' => 'main-nav', 'echo' => false, ) ) !== false) { ?>

            <nav id="entity-primary-nav" class="entity-primary-nav nav cp" data-name="Entity Primary Navigation">
                <div class="entity-primary-nav---cr">
                    <h2 class="entity-primary-nav-name nav-name name obj h">Primary Navigation</h2>
                    <?php function escape_html_the_title( $title, $id = null ) {
                        return esc_html( $title );
                    }
                    add_filter( 'the_title', 'escape_html_the_title', 10, 2 );
                    
                    if ( ! has_nav_menu( 'main-nav' ) ) {
                        /* Default Menu
                        Nav Item <li class="page_item">
                        Current Nav Item <li class="current_page_item">
                        Sub Navigation <ul class="children"> */
                        wp_page_menu( array(
                            'menu_class'        => 'menu',
                            'link_before'       => $label_mu_start,
                            'link_after'        => $label_mu_end,
                            'show_home'         => true,
                            'before'            => $group_mu_start,
                            'after'             => $group_mu_end,
                        ) );
                    } else {
                        /* Apperance > Menus (Custom Menu)
                        Nav Item <li class="menu-item">
                        Current Nav Item <li class="current-menu-item">
                        Sub Navigation <ul class="sub-menu"> */
                        wp_nav_menu( array(
                            'theme_location'    => 'main-nav',
                            'container'         => 'div',
                            'container_class'   => 'menu',
                            'link_before'       => $label_mu_start,
                            'link_after'        => $label_mu_end,
                            'items_wrap'        => $group_mu_start. '%3$s'. $group_mu_end,
                        ) );
                    } ?>
                </div>
            </nav>
            
        <?php }
    }
}

register_nav_menu( 'secondary-nav', __( 'Secondary Navigation', 'ntt' ) );

if ( ! function_exists( 'ntt_entity_secondary_nav' ) ) {
    function ntt_entity_secondary_nav() {
        
        if ( has_nav_menu( 'secondary-nav' ) ) { ?>

            <div role="navigation" id="entity-secondary-nav" class="entity-secondary-nav nav cp" data-name="Entity Secondary Navigation">
                <div class="entity-secondary-nav---cr">
                    
                    <div class="entity-secondary-nav-name nav-name name obj"><?php esc_html_e( 'Secondary Navigation', 'ntt' ); ?></div>

                    <?php wp_nav_menu( array(
                        'theme_location'    => 'secondary-nav',
                        'container'         => 'div',
                        'container_class'   => 'menu',
                        'link_before'       => '<span class="entity-secondary-navi---l l"><span class="navi---txt txt">',
                        'link_after'        => '</span></span>',
                        'items_wrap'        => '<ul class="entity-secondary-nav-group nav-group group list">'. '%3$s'. '</ul>',
                    ) ); ?>
                </div>
            </div>
            
        <?php }
    }
}