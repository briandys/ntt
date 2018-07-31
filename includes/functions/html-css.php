<?php

function ntt_html_css() {   
    global $post, $is_lynx, $is_gecko, $is_IE, $is_macIE, $is_winIE, $is_edge, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
    $useragent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) : "";
    $is_ipad = preg_match('/ipad/i',$useragent);

    /**
     * Device Form Factor
     */
    if ( wp_is_mobile() ) {
        $css[] = 'mobile-form-factor';
    } else {
        $css[] = 'non-mobile-form-factor';
    }

    /**
     * Browser Brand
     */
    if ( $is_chrome ) {
        $css[] = 'chrome-browser';
    } elseif ( $is_gecko ) {
        $css[] = 'gecko-browser';
    } elseif ( $is_safari ) {
        $css[] = 'safari-browser';
    } elseif ( $is_opera ) {
        $css[] = 'opera-browser';
    } elseif ( $is_lynx ) {
        $css[] = 'lynx-browser';
    } elseif ( $is_NS4 ) {
        $css[] = 'ns4-browser';
    } elseif ( $is_IE ) {
        $css[] = 'ie-browser';
    } elseif ( $is_macIE ) {
        $css[] = 'mac-ie-browser';
    } elseif ( $is_winIE ) {
        $css[] = 'win-ie-browser';
    } elseif ( $is_edge ) {
        $css[] = 'edge-browser';
    } else {
        $css[] = 'other-browser';
    }

    /**
     * WP
     */
    
    // WP Admin Bar
    if ( is_admin_bar_showing() ) {
        $css[] = 'wp-admin-bar--enabled';
    } else {
        $css[] = 'wp-admin-bar--disabled';
    }

    // WP Customizer
    if ( is_customize_preview() ) {
		$css[] = 'wp-customizer';
    }
    
    // WP User Dashboard Status
    if ( is_user_logged_in() ) {
		$css[] = 'wp-user--logged-in';
    } else {
        $css[] = 'wp-user--logged-out';
    }

    // WP User Capability Status
    if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {
        $css[] = 'wp-user--editor';
    }

    // WP Customizer Color Scheme
    $colors = ntt_wp_customizer_color_scheme_sanitizer( get_theme_mod( 'colorscheme', 'default' ) );
    $css[] = 'wp-customizer-color-scheme--'. esc_attr( $colors );

    /**
     * Entity
     */

    // Entity Theme Hierarchy
    if ( ! is_child_theme() ) {
        $css[] = 'parent-theme';
    } else {
        $css[] = 'child-theme';
    }

    // Entity Depth View
    if ( is_front_page() ) {
        $css[] = 'front-view';
    } else {
        $css[] = 'inner-view';
    }
    
    // Entity Primary Nav Population Status
    if ( wp_nav_menu( array( 'theme_location' => 'primary-nav', 'echo' => false, ) ) !== false) {
    
        $css[] = 'entity-primary-nav--populated';

        // Entity Primary Nav Type
        if ( ! has_nav_menu( 'primary-nav' ) ) {
            $css[] = 'entity-primary-nav--default';
        } else {
            $css[] = 'entity-primary-nav--custom';
        }
    } else {
        $css[] = 'entity-primary-nav--empty';
    }
    
    // Entity Name Population Status
    if ( get_bloginfo( 'name', 'display' ) ) {
        $css[] = 'entity-name--populated';
    } else {
        $css[] = 'entity-name--empty';
    }

    // Entity Description Population Status
    if ( get_bloginfo( 'description', 'display' ) ) {
        $css[] = 'entity-description--populated';
    } else {
        $css[] = 'entity-description--empty';
    }
    
    // Entity Name, Entity Description Ability Status
    if ( 'blank' === get_header_textcolor() ) {
        $css[] = 'entity-name-description--disabled';
    } else {
        $css[] = 'entity-name-description--enabled';
    }

    // Entity Logo Ability Status
    if ( has_custom_logo() ) {
        $css[] = 'entity-logo--enabled';
    } else {
        $css[] = 'entity-logo--disabled';
    }
    
    // Entity Banner Visuals Ability Status
    if ( has_header_image() ) {
        $css[] = 'entity-banner-visuals--enabled';
    } else {
        $css[] = 'entity-banner-visuals--disabled';
    }

    /**
     * Entry
     */

    // Entry Granularity View
    if ( is_singular() ) {
        $css[] = 'singular-view';
    } else {
        $css[] = 'plural-view';
        $css[] = 'hfeed';
    }
    
    // Entry Type View
    // Entry Name / Title
    if ( is_singular() ) {

        if ( $post->post_title ) {
            $post_name = $post->post_name;
        } else {
            $post_name = 'entry'. '-'. $post->post_name;
        }

        $css[] = esc_attr( $post->post_type ). '-view';
        $css[] = esc_attr( $post_name. '-'. $post->post_type ). '-view';
    }

    // Entry Category View
    if ( is_single() ) {
        
        foreach ( ( get_the_category( $post->ID ) ) as $category ) {
            $css[] = esc_attr( $category->category_nicename. '-category-view' );
        }
    }
    
    if ( is_404() ) {
        $css[] = 'unreachable-resource-view';
    }

    /**
     * Page Entry
     */

    // Page Template Name
    // Page Template Specificity
    if ( is_page() ) {
        $template_file = get_post_meta( get_the_ID(), '_wp_page_template', TRUE );

        if ( $template_file ) {
            $css[] = 'specific-page-template';
            $css[] = esc_attr( sanitize_title( $template_file ) ). '-page-template';
        } else {
            $css[] = 'generic-page-template';
        }
    }

    if ( is_search() ) {
        global $s;
        $entry_search = new WP_Query( array(
            's'         => $s,
            'showposts' => -1,
        ) );
        
        $entry_search_count = $entry_search->post_count;
        
        if ( $entry_search_count == 0 ) {
            $css[] = 'search-results--empty';
        } else {
            $css[] = 'search-results--populated';
        }
        
        wp_reset_postdata();
    }

    /**
     * Entries
     */
    if ( is_archive() ) {

        // Post Format
        $r = array(
            is_author()     => 'author',
            is_category()   => 'category',
            is_date()       => 'date',
            is_search()     => 'search',
            is_tag()        => 'tag',
        );

        foreach ( $r as $key => $val ) {

            if ( $key ) {
                $css[] = $val. '-view';
            }
        }
    }

    // Entries Indexing Type
    if ( is_home() ) {
        $css[] = 'current-index-view';
    } elseif ( is_archive() ) {
        $css[] = 'archive-index-view';
    } elseif( is_search() ) {
        $css[] = 'custom-index-view';
        $css[] = 'search-results-view';
    }

    /**
     * Entity Widgets Ability Status
     */
    $r_entity_widgets = array(
        'entity-primary-axns',
        'entity-header-aside',
        'entity-banner-aside',
        'entity-main-header-aside',
        'entity-main-aside',
        'entity-footer-aside',
    );

    foreach ( $r_entity_widgets as $entity_widgets ) {
        
        if ( is_active_sidebar( $entity_widgets ) ) {
            $css[] = esc_attr( $entity_widgets ). '--enabled';
        } else {
            $css[] = esc_attr( $entity_widgets ). '--disabled';
        }
    }

    /**
     * Entry Widgets Ability Status
     */
    $r_entry_widgets = array(
        'entry-banner-aside',
        'entry-header-aside',
        'entry-main-aside',
    );

    foreach ( $r_entry_widgets as $entry_widgets ) {
        
        if ( is_active_sidebar( $entry_widgets ) && is_singular() ) {
            $css[] = esc_attr( $entry_widgets ). '--enabled';
        } else {
            $css[] = esc_attr( $entry_widgets ). '--disabled';
        }
    }

    echo ' '. implode( ' ', $css );
}
add_action( 'ntt_html_css_wp_hook', 'ntt_html_css');