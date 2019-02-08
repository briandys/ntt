<?php
function ntt_get_html_css( $class='' ) {   
    
    global $post, $is_lynx, $is_gecko, $is_IE, $is_macIE, $is_winIE, $is_edge, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

    global $wp_query;
    
    $query_found_posts = $wp_query->found_posts;
    
    $useragent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) : "";
    
    $is_ipad = preg_match( '/ipad/i', $useragent );

    $classes = array();

    /**
     * Device Form Factor
     */
    if ( wp_is_mobile() ) {
        $classes[] = 'mobile-form-factor';
    } else {
        $classes[] = 'non-mobile-form-factor';
    }

    /**
     * Browser Brand
     */
    if ( $is_chrome ) {
        $classes[] = 'chrome-browser';
    } elseif ( $is_gecko ) {
        $classes[] = 'gecko-browser';
    } elseif ( $is_safari ) {
        $classes[] = 'safari-browser';
    } elseif ( $is_opera ) {
        $classes[] = 'opera-browser';
    } elseif ( $is_lynx ) {
        $classes[] = 'lynx-browser';
    } elseif ( $is_NS4 ) {
        $classes[] = 'ns4-browser';
    } elseif ( $is_IE ) {
        $classes[] = 'ie-browser';
    } elseif ( $is_macIE ) {
        $classes[] = 'mac-ie-browser';
    } elseif ( $is_winIE ) {
        $classes[] = 'win-ie-browser';
    } elseif ( $is_edge ) {
        $classes[] = 'edge-browser';
    } else {
        $classes[] = 'other-browser';
    }

    /**
     * WP
     */
    
    // WP Admin Bar
    if ( is_admin_bar_showing() ) {
        $classes[] = 'wp-admin-bar--enabled';
    } else {
        $classes[] = 'wp-admin-bar--disabled';
    }

    // WP Customizer
    if ( is_customize_preview() ) {
		$classes[] = 'wp-customizer';
    }
    
    // WP User Dashboard Status
    if ( is_user_logged_in() ) {
		$classes[] = 'wp-user--logged-in';
    } else {
        $classes[] = 'wp-user--logged-out';
    }

    // WP User Capability Status
    if ( current_user_can( 'editor' ) || current_user_can( 'administrator' ) ) {
        $classes[] = 'wp-user--editor';
    }

    // WP Customizer Color Scheme
    $colors = ntt_wp_customize_color_scheme_sanitizer( get_theme_mod( 'colorscheme', 'default' ) );
    $classes[] = 'wp-customizer-color-scheme--'. $colors;

    /**
     * Entity
     */

    // Entity Theme Hierarchy
    if ( is_child_theme() ) {
        $classes[] = 'child-theme';
    } else {
        $classes[] = 'parent-theme';
    }

    // Entity Depth View
    if ( is_front_page() ) {
        $classes[] = 'front-view';
    } else {
        $classes[] = 'inner-view';
    }
    
    // Entity Primary Nav Population Status
    if ( wp_nav_menu( array( 'theme_location' => 'primary-nav', 'echo' => false, ) ) !== false) {
    
        $classes[] = 'entity-primary-nav--populated';

        // Entity Primary Nav Type
        if ( ! has_nav_menu( 'primary-nav' ) ) {
            $classes[] = 'entity-primary-nav--default';
        } else {
            $classes[] = 'entity-primary-nav--custom';
        }
    } else {
        $classes[] = 'entity-primary-nav--empty';
    }
    
    // Entity Name Population Status
    if ( get_bloginfo( 'name', 'display' ) ) {
        $classes[] = 'entity-name--populated';
    } else {
        $classes[] = 'entity-name--empty';
    }

    // Entity Description Population Status
    if ( get_bloginfo( 'description', 'display' ) ) {
        $classes[] = 'entity-description--populated';
    } else {
        $classes[] = 'entity-description--empty';
    }
    
    // Entity Name, Entity Description Ability Status
    if ( 'blank' === get_header_textcolor() ) {
        $classes[] = 'entity-name-description--disabled';
    } else {
        $classes[] = 'entity-name-description--enabled';
    }

    // Entity Logo Ability Status
    if ( has_custom_logo() ) {
        $classes[] = 'entity-logo--enabled';
    } else {
        $classes[] = 'entity-logo--disabled';
    }
    
    // Entity Banner Visuals Ability Status
    if ( has_header_image() ) {
        $classes[] = 'entity-banner-visuals--enabled';
    } else {
        $classes[] = 'entity-banner-visuals--disabled';
    }

    /**
     * Entry
     */

    // Entry Granularity View
    if ( is_singular() || is_404() ) {
        $classes[] = 'singular-view';
    } else {
        $classes[] = 'plural-view';
        $classes[] = 'hfeed';
    }
    
    // Entry Type View
    // Entry Name / Title
    if ( is_singular() ) {

        if ( $post->post_title ) {
            $post_name = $post->post_name;
        } else {
            $post_name = 'entry'. '-'. $post->post_name;
        }

        $classes[] = $post->post_type. '-view';
        $classes[] = $post_name. '-'. $post->post_type. '-view';
    }

    // Entry Category View
    if ( is_single() ) {
        foreach ( ( get_the_category( $post->ID ) ) as $category ) {
            $classes[] = $category->category_nicename. '-category-view';
        }
    }
    
    
    if ( is_404() ) {
        $classes[] = 'unreachable-resource-view';
    } elseif ( is_search() && $query_found_posts == 0 ) {
        $classes[] = 'zero-search-results-view';
    }

    /**
     * Page Entry
     */

    // Page Template Name
    // Page Template Specificity
    if ( is_page() ) {
        $template_file = get_post_meta( get_the_ID(), '_wp_page_template', TRUE );

        if ( $template_file ) {
            $classes[] = 'specific-page-template';
            $classes[] = sanitize_title( $template_file ). '-page-template';
        } else {
            $classes[] = 'generic-page-template';
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
            $classes[] = 'search-results--empty';
        } else {
            $classes[] = 'search-results--populated';
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
                $classes[] = $val. '-view';
            }
        }
    }

    // Entries Indexing Type
    if ( is_home() ) {
        $classes[] = 'current-index-view';
    } elseif ( is_archive() ) {
        $classes[] = 'archive-index-view';
    } elseif( is_search() ) {
        $classes[] = 'custom-index-view';
        $classes[] = 'search-results-view';
    }

    /**
     * Entity Widgets Ability Status
     */
    $r_entity_widgets = array(
        'entity-primary-axns',
        'entity-banner-aside',
        'entity-header-aside',
        'entity-main-header-aside',
        'entity-main-main-aside',
        'entity-footer-aside',
    );

    foreach ( $r_entity_widgets as $entity_widgets ) {
        
        if ( is_active_sidebar( $entity_widgets ) ) {
            $classes[] = $entity_widgets. '--enabled';
        } else {
            $classes[] = $entity_widgets. '--disabled';
        }
    }

    /**
     * Entry Widgets Ability Status
     */
    $r_entry_widgets = array(
        'entry-banner-aside',
        'entry-header-aside',
        'entry-main-aside',
        'entry-footer-aside',
    );

    foreach ( $r_entry_widgets as $entry_widgets ) {
        
        if ( is_active_sidebar( $entry_widgets ) && is_singular() ) {
            $classes[] = $entry_widgets. '--enabled';
        } else {
            $classes[] = $entry_widgets. '--disabled';
        }
    }

    if ( ! empty( $class ) ) {
        if ( !is_array( $class ) )
            $class = preg_split( '#\s+#', $class );
        $classes = array_merge( $classes, $class );
    } else {
        // Ensure that we always coerce class to being an array.
        $class = array();
    }
 
    $classes = array_map( 'esc_attr', $classes );

    /**
     * Filters the list of CSS html classes.
     *
     * @since NTT 0.0.91
     *
     * @param array $classes An array of body classes.
     * @param array $class   An array of additional classes added to the body.
     */
    $classes = apply_filters( 'ntt_html_css_wp_filter', $classes, $class );
 
    return array_unique( $classes );
}

function ntt_html_css( $class='' ) {
    echo join( ' ', ntt_get_html_css( $class ) );
}