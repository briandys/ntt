<!doctype html>
<html <?php language_attributes(); ?> id="start" class="ntt view no-js <?php ntt_html_css_wp_hook(); ?>">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

        <div id="wild-card" class="wild-card" data-name="Wild Card">
            <div class="wild-card---cr"></div>
        </div>

        <div id="entity" class="entity" data-name="Entity">
            <div class="entity---cr">
                
                <div id="entity-start" class="entity-start cn" data-name="Entity Start">
                    <div class="entity-start---cr">
                        
                        <div id="go-content-nav" class="go-content-nav nav cp" data-name="Go to Content Navigation">
                            <div class="go-content-nav---cr">
                                <div class="go-content-navi navi obj" data-name="Go to Content Navigation Item">
                                    <a href="#content" title="<?php esc_attr_e( 'Go to Content', 'ntt' ); ?>" id="go-content-navi---a" class="go-content-navi---a">
                                        <span class="go-content-navi---l">
                                            <span class="go-content-navi---txt"><?php esc_html_e( 'Go to Content', 'ntt' ); ?></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <header id="entity-header" class="entity-header cn" data-name="Entity Header">
                    <div class="entity-header---cr">
                        
                        <div id="entity-primary-info" class="entity-primary-info entity-info info cp" data-name="Entity Primary Information">
                            <div class="entity-primary-info---cr">
                            
                                <?php
                                $get_bloginfo_name = get_bloginfo( 'name', 'display' );
                                if ( $get_bloginfo_name || is_customize_preview() ) {
                                    ?>
                                    <h1 id="entity-heading" class="entity-heading heading obj" data-name="Entity Heading">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( $get_bloginfo_name ); ?>" class="entity-heading---a">
                                            <span class="entity-heading---l">
                                                <span class="entity-heading---txt"><?php echo esc_html( $get_bloginfo_name ); ?></span>
                                            </span>
                                        </a>
                                    </h1>
                                    <?php
                                }
                                ?>

                                <?php
                                $get_bloginfo_description = get_bloginfo( 'description', 'display' );
                                if ( $get_bloginfo_description || is_customize_preview() ) {
                                    ?>
                                    <div id="entity-primary-description" class="entity-primary-description entity-description description obj" data-name="Entity Primary Description">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="entity-primary-description---a" title="<?php echo esc_attr ($get_bloginfo_description ); ?>">
                                            <span class="entity-primary-description---l">
                                                <span class="entity-primary-description---txt"><?php echo esc_attr( $get_bloginfo_description ); ?></span>
                                            </span>
                                        </a>
                                    </div>
                                    <?php
                                }
                            
                                if ( has_custom_logo() ) {
                                    ?>
                                    <div id="entity-primary-logo" class="entity-primary-logo entity-logo logo obj" data-name="Entity Primary Logo">
                                        <?php the_custom_logo(); ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            
                            </div>
                        </div>

                        <?php
                        ntt_entity_primary_axns();
                        ntt_entity_primary_nav();
                        ntt_after_entity_primary_nav_wp_hook();
                        
                        if ( has_header_image() || is_active_sidebar( 'entity-banner-aside' ) ) {
                            ?>
                            <div id="entity-banner" class="entity-banner banner cp" data-name="Entity Banner">
                                <div class="entity-banner---cr">

                                    <?php
                                    if ( has_header_image() ) {
                                        ?>
                                        <div class="entity-banner-visuals banner-visuals visuals obj" data-name="Entity Banner Visuals">
                                            <?php the_custom_header_markup(); ?>
                                        </div>
                                        <?php
                                    }
                                    
                                    ntt_entity_banner_aside();
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                        
                        ntt_entity_header_aside();
                        ?>
                        
                    </div>
                </header>
                <section id="entity-main" class="entity-main cn" data-name="Entity Main">
                    <div class="entity-main---cr">