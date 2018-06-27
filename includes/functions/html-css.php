<?php

function ntt_html_css() {   
    global $post, $is_lynx, $is_gecko, $is_IE, $is_macIE, $is_winIE, $is_edge, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
    $useragent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) : "";
    $is_ipad = preg_match('/ipad/i',$useragent);

    /**
     * Device Form Factor
     */
    if ( wp_is_mobile() ) {
        echo ' '. 'mobile-form-factor';
    } else {
        echo ' '. 'non-mobile-form-factor';
    }

    /**
     * Browser Brand
     */
    if ( $is_chrome ) {
        echo ' '. 'chrome-browser';
    } elseif ( $is_gecko ) {
        echo ' '. 'gecko-browser';
    } elseif ( $is_safari ) {
        echo ' '. 'safari-browser';
    } elseif ( $is_opera ) {
        echo ' '. 'opera-browser';
    } elseif ( $is_lynx ) {
        echo ' '. 'lynx-browser';
    } elseif ( $is_NS4 ) {
        echo ' '. 'ns4-browser';
    } elseif ( $is_IE ) {
        echo ' '. 'ie-browser';
    } elseif ( $is_macIE ) {
        echo ' '. 'mac-ie-browser';
    } elseif ( $is_winIE ) {
        echo ' '. 'win-ie-browser';
    } elseif ( $is_edge ) {
        echo ' '. 'edge-browser';
    } else {
        echo ' '. 'other-browser';
    }

    /**
     * WP
     */
    
    // WP Admin Bar
    if ( is_admin_bar_showing() ) {
        echo ' '. 'wp-admin-bar--enabled';
    } else {
        echo ' '. 'wp-admin-bar--disabled';
    }

    // WP Customizer
    if ( is_customize_preview() ) {
		echo ' '. 'wp-customizer';
	}

    // WP Customizer Color Scheme
    $colors = ntt_wp_customizer_color_scheme_sanitizer( get_theme_mod( 'colorscheme', 'default' ) );
    echo ' '. 'wp-customizer-color-scheme--'. esc_attr( $colors );

    /**
     * Entity
     */

    // Entity Theme Hierarchy
    if ( ! is_child_theme() ) {
        echo ' '. 'parent-theme';
    } else {
        echo ' '. 'child-theme';
    }

    // Entity Depth View
    if ( is_front_page() ) {
        echo ' '. 'front-view';
    } else {
        echo ' '. 'inner-view';
    }

    // Entity Granularity View
    if ( is_singular() ) {
        echo ' '. 'singular-view';
    } else {
        echo ' '. 'plural-view';
        echo ' '. 'hfeed';
    }
    
    // Entity Nav
    if ( ! has_nav_menu( 'primary-nav' ) ) {
        echo ' '. 'entity-primary-nav--default';
    } else {
        echo ' '. 'entity-primary-nav--custom';
    }
    
    // Entity Name Population Status
    if ( get_bloginfo( 'name', 'display' ) ) {
        echo ' '. 'entity-name--populated';
    } else {
        echo ' '. 'entity-name--empty';
    }

    // Entity Description Population Status
    if ( get_bloginfo( 'description', 'display' ) ) {
        echo ' '. 'entity-description--populated';
    } else {
        echo ' '. 'entity-description--empty';
    }
    
    // Entity Name, Entity Description Ability Status
    if ( 'blank' === get_header_textcolor() ) {
        echo ' '. 'entity-name-description--disabled';
    } else {
        echo ' '. 'entity-name-description--enabled';
    }

    // Entity Logo Ability Status
    if ( has_custom_logo() ) {
        echo ' '. 'entity-logo--enabled';
    } else {
        echo ' '. 'entity-logo--disabled';
    }
    
    // Entity Banner Visuals Ability Status
    if ( has_header_image() ) {
        echo ' '. 'entity-banner-visuals--enabled';
    } else {
        echo ' '. 'entity-banner-visuals--disabled';
    }

    /**
     * Entry
     */
    if ( is_singular() ) {

        // Entry Type View
        if ( is_single() && ! is_attachment() ) {
            echo ' '. 'post-view';
        } elseif ( is_page() && ! is_front_page() ) {
            echo ' '. 'page-view';
        } elseif ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
            echo ' '. 'front-page-view';
        } elseif ( is_attachment() ) {
            echo ' '. 'attachment-view';
        } elseif ( is_404() ) {
            echo ' '. 'unreachable-content-view';
        } else {
            echo ' '. 'miscellaneous-view';
        }
    }

    /**
     * Comments
     */ 
    comments_css_status();

    /**
     * Entries
     */
    if ( is_archive() ) {

        // Post Format
        $r_archives = array(
            is_author()     => 'author',
            is_category()   => 'category',
            is_date()       => 'date',
            is_search()     => 'search',
            is_tag()        => 'tag',
        );

        foreach ( $r_archives as $key => $archive ) {

            if ( $key ) {
                echo ' '. $archive. '-view';
            }
        }
    }

    // Entries Type
    if ( is_home() ) {
        echo ' '. 'index-view';
    } elseif ( is_archive() ) {
        echo ' '. 'archive-view';
    }
    
    // Sub-Pages Page Template
    if ( is_page_template( 'page-templates/sub-pages.php' ) ) {
        echo ' '. 'sub-pages-view';
    }

    // Page Template
    if ( is_page() ) {
        $template_file = get_post_meta( get_the_ID(), '_wp_page_template', TRUE );

        if ( $template_file ) {
            echo ' '. 'specific-page-template';
            echo ' '. esc_attr( sanitize_title( $template_file ) ). '-page-template';
        } else {
            echo ' '. 'generic-page-template';
        }
    }

    /**
     * Widgets Ability Status
     */
    $r_widgets = array(
        'entity-primary-axns',
        'entity-header-aside',
        'entity-banner-aside',
        'entity-main-header-aside',
        'entity-main-aside',
        'entity-footer-aside',
        'entry-banner-aside',
        'entry-header-aside',
        'entry-main-aside',
    );

    foreach ( $r_widgets as $widgets ) {
        
        if ( is_active_sidebar( $widgets ) ) {
            echo ' '. esc_attr( $widgets ). '--enabled';
        } else {
            echo ' '. esc_attr( $widgets ). '--disabled';
        }
    }
}
add_action( 'ntt_html_css_wp_hook', 'ntt_html_css');