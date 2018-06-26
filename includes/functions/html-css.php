<?php

function ntt_html_css() {   
    global $post, $is_lynx, $is_gecko, $is_IE, $is_macIE, $is_winIE, $is_edge, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
    $useragent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) : "";
    $is_ipad = preg_match('/ipad/i',$useragent);

    // Device Form Factor
    if ( wp_is_mobile() ) {
        echo ' '. 'mobile-form-factor';
    } else {
        echo ' '. 'non-mobile-form-factor';
    }

    // Browser Type
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
    
    // WordPress Admin Bar
    if ( is_admin_bar_showing() ) {
        echo ' '. 'wp-admin-bar--enabled';
    } else {
        echo ' '. 'wp-admin-bar--disabled';
    }

    // Customizer
    if ( is_customize_preview() ) {
		echo ' '. 'ntt-customizer';
	}

    // Customizer Color Scheme
    $colors = ntt_color_scheme_sanitizer( get_theme_mod( 'colorscheme', 'default' ) );
    echo ' '. 'customizer-color-scheme--'. esc_attr( $colors );

    // Theme Hierarchy
    if ( ! is_child_theme() ) {
        echo ' '. 'parent-theme';
    } else {
        echo ' '. 'child-theme';
    }

    // Views
    echo ' '. 'view';

    if ( is_singular() ) {
    
        // Post Format
        if ( has_post_format('status') ) {
            echo ' '. 'status-post-view';
        }

        // Entry View Type
        if ( is_single() && ! is_attachment() ) {
            echo ' '. 'post-view';
        } elseif ( is_page() && ! is_front_page() ) {
            echo ' '. 'page-view';
        } elseif ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
            echo ' '. 'front-view';
        } elseif ( is_attachment() ) {
            echo ' '. 'attachment-view';
        } elseif ( is_404() ) {
            echo ' '. 'unreachable-content-view';
        } else {
            echo ' '. 'miscellaneous-view';
        }

        // Entry Security
        if ( ! post_password_required() ) {
            echo ' '. 'password-unprotected-entry';
        } else {
            echo ' '. 'password-protected-entry';
        }
        
        // Entry Category
        foreach ( ( get_the_category( $post->ID ) ) as $category ) {
            echo ' '. esc_attr( $category->category_nicename ). '-category';
        }

        if ( has_category( '', $post->ID ) ) {
            echo ' '. 'populated-category-entry';
        } else {
            echo ' '. 'empty-category-entry';
        }

        // Entry Banner Visuals
        if ( '' !== get_the_post_thumbnail() ) {
            echo ' '. 'entry-banner-visuals--on';
        } else {
            echo ' '. 'entry-banner-visuals--off';
        }
        
        // Entry Type
        if ( isset( $post ) ) {
            echo ' '. esc_attr( $post->post_type ). '-entry';
            echo ' '. esc_attr( $post->post_name. '-'. $post->post_type ). '-entry';
        }

        // Comments
        $comments_count = (int) get_comments_number( get_the_ID() );

        // Comments Population
        if ( $comments_count > 1 ) {
            echo ' '. 'comments--populated';
        } else {
            echo ' '. 'comments--empty';
        }

        // Comments Population Count
        if ( $comments_count == 1 ) {
            echo ' '. 'comments-population--single';
        } elseif ( $comments_count > 1 ) {
            echo ' '. 'comments-population--multiple';
        } elseif ( $comments_count == 0 ) {
            echo ' '. 'comments-population--zero';
        }

        // Comment Creation
        if ( comments_open() ) {
            echo ' '. 'comment-creation--enabled';
        } else {
            echo ' '. 'comment-creation--disabled';
        }
    }

    // View Level
    if ( is_front_page() ) {
        echo ' '. 'front-view';
    } else {
        echo ' '. 'inner-view';
    }
    
    // View Granularity
    if ( is_singular() ) {
        echo ' '. 'singular-view';
    } else {
        echo ' '. 'plural-view';
        echo ' '. 'hfeed';
    }

    // Category View
    if ( is_category() ) {
        echo ' '. 'category-archive-view';
    }

    // Tag View
    if ( is_tag() ) {
        echo ' '. 'tag-archive-view';
    }

    // Date View
    if ( is_date() ) {
        echo ' '. 'date-archive-view';
    }

    // Author View
    if ( is_author() ) {
        echo ' '. 'author-archive-view';
    }

    // Search View
    if ( is_search() ) {
        echo ' '. 'search-view';
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
    
    // Entity Name
    if ( get_bloginfo( 'name', 'display' ) ) {
        echo ' '. 'entity-name--populated';
    } else {
        echo ' '. 'entity-name--empty';
    }

    // Entity Description
    if ( get_bloginfo( 'description', 'display' ) ) {
        echo ' '. 'entity-description--populated';
    } else {
        echo ' '. 'entity-description--empty';
    }
    
    // Entity Name, Entity Description
    if ( 'blank' === get_header_textcolor() ) {
        echo ' '. 'entity-name-description--disabled';
    } else {
        echo ' '. 'entity-name-description--enabled';
    }

    // Entity Logo
    if ( ! has_custom_logo() ) {
        echo ' '. 'entity-logo--disabled';
    } else {
        echo ' '. 'entity-logo--enabled';
    }
    
    // Entity Banner Visuals
    if ( has_header_image() ) {
        echo ' '. 'entity-banner-visuals--enabled';
    } else {
        echo ' '. 'entity-banner-visuals--disabled';
    }
    
    // Entity Nav
    if ( ! has_nav_menu( 'main-nav' ) ) {
        echo ' '. 'entity-nav--default';
    } else {
        echo ' '. 'entity-nav--custom';
    }

    // Widgets
    $r_asides = array(
        'entity-primary-axns',
        'entity-banner-aside',
        'entity-header-aside',
        'entity-main-header-aside',
        'entity-main-aside',
        'entity-footer-aside',
        'entry-banner-aside',
        'entry-header-aside',
        'entry-main-aside',
    );

    foreach ( $r_asides as $aside ) {
        
        if ( is_active_sidebar( $aside ) ) {
            echo ' '. esc_attr( $aside ). '--enabled';
        } else {
            echo ' '. esc_attr( $aside ). '--disabled';
        }
    }
}
add_action( 'ntt_html_css_wp_hook', 'ntt_html_css');