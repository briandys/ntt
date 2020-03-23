<?php
/**
 * Entity Primary Navigation
 */

register_nav_menu( 'entity-primary-nav', __( 'Primary Navigation', 'ntt' ) );

if ( ! function_exists( 'ntt__tag__entity_primary_nav' ) ) {
    function ntt__tag__entity_primary_nav() {
        
        if ( wp_nav_menu( array( 'theme_location' => 'entity-primary-nav', 'echo' => false, ) ) !== false) {
            ?>
            <nav aria-label="<?php esc_attr_e( 'Primary', 'ntt' ); ?>" role="navigation" id="ntt--entity-primary-nav" class="ntt--entity-primary-nav ntt--nav ntt--cp" data-name="Entity Primary Navigation">
                <h2 class="ntt--entity-primary-nav-name ntt--nav-name ntt--obj">
                    <span class="ntt--txt"><?php esc_html_e( 'Primary Navigation', 'ntt' ); ?></span>
                </h2>
                <?php
                function escape_html_the_title( $title, $id = null ) {
                    return esc_html( $title );
                }
                add_filter( 'the_title', 'escape_html_the_title', 10, 2 );
                
                if ( ! has_nav_menu( 'entity-primary-nav' ) ) {

                    /**
                     * Default Menu
                     * If Primary Navigation is not set
                     * Navigation Item <li class="page_item">
                     * Current Navigation Item <li class="current_page_item">
                     * Sub-Navigation <ul class="children">
                     */
                    wp_page_menu( array(
                        'menu_class'        => 'menu',
                        'link_before'       => '<span class="ntt--txt">',
                        'link_after'        => '</span>',
                        'show_home'         => true,
                        'before'            => '<ul class="ntt--entity-primary-nav-group ntt--nav-group">',
                        'after'             => '</ul>',
                    ) );
                } else {
                    
                    /**
                     * Custom Menu (WP Admin > Apperance > Menus)
                     * If any Menu is set to Primary Navigation
                     * Navigation Item <li class="menu-item">
                     * Current Navigation Item <li class="current-menu-item">
                     * Sub-Navigation <ul class="sub-menu">
                     */
                    wp_nav_menu( array(
                        'theme_location'    => 'entity-primary-nav',
                        'container'         => 'div',
                        'container_class'   => 'menu',
                        'link_before'       => '<span class="ntt--txt">',
                        'link_after'        => '</span>',
                        'items_wrap'        => '<ul class="ntt--entity-primary-nav-group ntt--nav-group">'. '%3$s'. '</ul>',
                    ) );
                }
                ?>
            </nav>
            <?php
        }
    }
}

/**
 * Entity Secondary Navigation
 */
register_nav_menu( 'entity-secondary-nav', __( 'Secondary Navigation', 'ntt' ) );

if ( ! function_exists( 'ntt__tag__entity_secondary_nav' ) ) {
    function ntt__tag__entity_secondary_nav() {
        
        if ( has_nav_menu( 'entity-secondary-nav' ) ) {
            ?>

            <div aria-label="<?php esc_attr_e( 'Secondary', 'ntt' ); ?>" role="navigation" id="ntt--entity-secondary-nav" class="ntt--entity-secondary-nav ntt--nav ntt--cp" data-name="Entity Secondary Navigation">
                <div class="ntt--entity-secondary-nav-name ntt--nav-name ntt--obj">
                    <span class="ntt--txt"><?php esc_html_e( 'Secondary Navigation', 'ntt' ); ?></span>
                </div>
                <?php
                wp_nav_menu( array(
                    'theme_location'    => 'entity-secondary-nav',
                    'container'         => 'div',
                    'container_class'   => 'menu',
                    'link_before'       => '<span class="ntt--txt">',
                    'link_after'        => '</span>',
                    'items_wrap'        => '<ul class="ntt--entity-secondary-nav-group ntt--nav-group ntt--cp">'. '%3$s'. '</ul>',
                ) );
                ?>
            </div>
            <?php
        }
    }
}