<?php

function ntt_features_scripts() {
    
    $down_arrowhead_icon = ntt_get_svg( array( 'icon' => 'down-arrowhead-icon', ) );
    $up_arrowhead_icon = ntt_get_svg( array( 'icon' => 'up-arrowhead-icon', ) );
    $up_arrow_icon = ntt_get_svg( array( 'icon' => 'up-arrow-icon', ) );
    $search_icon = ntt_get_svg( array( 'icon' => 'search-icon', ) );
    $dismiss_icon = ntt_get_svg( array( 'icon' => 'dismiss-icon', ) );
    $ellipsis_icon = ntt_get_svg( array( 'icon' => 'ellipsis-icon', ) );
    $burger_icon = ntt_get_svg( array( 'icon' => 'burger-icon', ) );
    $plus_icon = ntt_get_svg( array( 'icon' => 'plus-icon', ) );
    $pencil_icon = ntt_get_svg( array( 'icon' => 'pencil-icon', ) );

    $ntt_l10n = array(
        'showSubNavText'    => __( 'Show Sub-Nav', 'ntt' ),
        'hideSubNavText'    => __( 'Hide Sub-Nav', 'ntt' ),
        
        'toggleSearchText'  => __( 'Toggle Search', 'ntt' ),
        'showSearchText'    => __( 'Show Search', 'ntt' ),
        'hideSearchText'    => __( 'Hide Search', 'ntt' ),
        
        'toggleActionsText'     => __( 'Toggle Actions', 'ntt' ),
        'showActionsText'       => __( 'Show Actions', 'ntt' ),
        'hideActionsText'       => __( 'Hide Actions', 'ntt' ),
        
        'toggleMenuText'    => __( 'Toggle Menu', 'ntt' ),
        'showMenuText'      => __( 'Show Menu', 'ntt' ),
        'hideMenuText'      => __( 'Hide Menu', 'ntt' ),
        
        'requiredText'      => __( 'Required', 'ntt' ),
        'submitText'        => __( 'Submit', 'ntt' ),
        'editText'          => __( 'Edit', 'ntt' ),
        'privateText'       => __( 'Private', 'ntt' ),
        'protectedText'     => __( 'Protected', 'ntt' ),
        
        'downArrowheadIcon'     => $down_arrowhead_icon,
        'upArrowheadIcon'       => $up_arrowhead_icon,
        'upArrowIcon'           => $up_arrow_icon,
        'searchIcon'            => $search_icon,
        'dismissIcon'           => $dismiss_icon,
        'ellipsisIcon'          => $ellipsis_icon,
        'burgerIcon'            => $burger_icon,
        'plusIcon'              => $plus_icon,
        'pencilIcon'            => $pencil_icon,
    );

    wp_localize_script( 'ntt-script', 'nttData', $ntt_l10n );
}
add_action('wp_enqueue_scripts', 'ntt_features_scripts', 0);

function ntt_features_html_css() {
    
    if ( is_active_sidebar( 'entity-header-aside' ) ) {
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

    foreach ( $r as $val ) {
        $css[] = 'ntt-'. esc_attr( $val ). '-f5e';
    }

    echo ' '. implode( ' ', $css );
}
add_action( 'ntt_html_css_wp_hook', 'ntt_features_html_css');