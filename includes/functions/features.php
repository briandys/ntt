<?php

function ntt_features_scripts() {
    
    $down_arrowhead_icon = ntt_get_svg( array( 'icon' => 'down-arrowhead-icon', ) );
    $up_arrowhead_icon = ntt_get_svg( array( 'icon' => 'up-arrowhead-icon', ) );
    $up_arrow_icon = ntt_get_svg( array( 'icon' => 'up-arrow-icon', ) );
    $search_icon = ntt_get_svg( array( 'icon' => 'search-icon', ) );
    $dismiss_icon = ntt_get_svg( array( 'icon' => 'dismiss-icon', ) );
    $ellipsis_icon = ntt_get_svg( array( 'icon' => 'ellipsis-icon', ) );
    $burger_icon = ntt_get_svg( array( 'icon' => 'burger-icon', ) );

    $ntt_l10n['showSubNavText']     = __( 'Show Sub-Nav', 'ntt' );
    $ntt_l10n['hideSubNavText']     = __( 'Hide Sub-Nav', 'ntt' );
    
    $ntt_l10n['toggleSearchText']   = __( 'Toggle Search', 'ntt' );
    $ntt_l10n['showSearchText']     = __( 'Show Search', 'ntt' );
    $ntt_l10n['hideSearchText']     = __( 'Hide Search', 'ntt' );
    
    $ntt_l10n['toggleActionsText']   = __( 'Toggle Actions', 'ntt' );
    $ntt_l10n['showActionsText']     = __( 'Show Actions', 'ntt' );
    $ntt_l10n['hideActionsText']     = __( 'Hide Actions', 'ntt' );
    
    $ntt_l10n['toggleMenuText']   = __( 'Toggle Menu', 'ntt' );
    $ntt_l10n['showMenuText']     = __( 'Show Menu', 'ntt' );
    $ntt_l10n['hideMenuText']     = __( 'Hide Menu', 'ntt' );
    
    $ntt_l10n['requiredText']     = __( 'Required', 'ntt' );
    $ntt_l10n['submitText']     = __( 'Submit', 'ntt' );
    
    $ntt_l10n['downArrowheadIcon']  = $down_arrowhead_icon;
    $ntt_l10n['upArrowheadIcon']    = $up_arrowhead_icon;
    $ntt_l10n['upArrowIcon']        = $up_arrow_icon;
    $ntt_l10n['searchIcon']         = $search_icon;
    $ntt_l10n['dismissIcon']        = $dismiss_icon;
    $ntt_l10n['ellipsisIcon']       = $ellipsis_icon;
    $ntt_l10n['burgerIcon']         = $burger_icon;
    
    wp_localize_script( 'ntt-script', 'nttData', $ntt_l10n );
}
add_action('wp_enqueue_scripts', 'ntt_features_scripts', 0);

function ntt_features_html_css() {
    
    if ( is_active_sidebar( 'main-header-aside' ) ) {
        $primary_menu = 'primary-menu';
    } else {
        $primary_menu = '';
    }

    if ( is_active_sidebar( 'entity-primary-axns' ) ) {
        $overflow_actions = 'overflow-axns';
    } else {
        $overflow_actions = '';
    }

    if ( is_active_sidebar( 'entity-primary-axns' ) ) {
        $primary_search = 'primary-search';
    } else {
        $primary_search = '';
    }

    if ( has_custom_logo() ) {
        $custom_logo = 'custom-logo';
    } else {
        $custom_logo = '';
    }

    $r = array(
        $custom_logo,
        'go-content-nav',
        'go-start-nav',
        'sub-nav',
        $overflow_actions,
        $primary_menu,
        $primary_search,
    );

    foreach ( $r as $css ) {
        echo ' '. 'ntt-'. esc_attr( $css ). '-f5e';
    }
}
add_action( 'ntt_html_css_wp_hook', 'ntt_features_html_css');