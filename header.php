<!doctype html>
<html <?php language_attributes(); ?> id="start" class="<?php ntt_html_css(); ?>" data-name="View">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="entity" class="entity" data-name="Entity">
            <div class="entity---cr">
                <div id="entity-start" class="entity-start cn" data-name="Entity Start">
                    <div class="entity-start---cr">
                        <div id="go-content-nav" class="go-content-nav nav cp" data-name="Go to Content Navigation">
                            <div class="go-content-nav---cr nav---cr">
                                <div class="go-content-navi navi obj">
                                    <?php $go_content_text = __( 'Go to Content', 'ntt' ); ?>
                                    <a href="#content" title="<?php echo esc_attr( $go_content_text ); ?>">
                                        <span class="txt"><?php echo esc_html( $go_content_text ); ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <header id="entity-header" class="entity-header header cn" data-name="Entity Header">
                    <div class="entity-header---cr">
                        <?php ntt_before_entity_primary_heading_wp_hook(); ?>
                        <div id="entity-primary-heading" class="entity-primary-heading cp" data-name="Entity Primary Heading">
                            <div class="entity-primary-heading---cr">
                            
                                <?php
                                if ( has_custom_logo() ) {
                                    ?>
                                    <div id="entity-primary-logo" class="entity-primary-logo obj" data-name="Entity Primary Logo"><?php the_custom_logo(); ?></div>
                                    <?php
                                }
                                
                                $get_bloginfo_name = get_bloginfo( 'name', 'display' );
                                
                                if ( $get_bloginfo_name || is_customize_preview() ) {
                                    ?>
                                    <h1 id="entity-primary-name" class="entity-primary-name obj">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( $get_bloginfo_name ); ?>">
                                            <span class="txt"><?php echo esc_html( $get_bloginfo_name ); ?></span>
                                        </a>
                                    </h1>
                                    <?php
                                }
                                
                                $get_bloginfo_description = get_bloginfo( 'description', 'display' );
                                
                                if ( $get_bloginfo_description || is_customize_preview() ) {
                                    ?>
                                    <div id="entity-primary-description" class="entity-primary-description obj" data-name="Entity Primary Description"><?php echo esc_attr( $get_bloginfo_description ); ?></div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                        <?php
                        ntt_entity_primary_nav();
                        
                        if ( has_header_image() || is_active_sidebar( 'entity-banner-aside' ) ) {
                            ?>
                            <div id="entity-banner" class="entity-banner cp" data-name="Entity Banner">
                                <div class="entity-banner---cr">

                                    <?php
                                    if ( has_header_image() ) {
                                        ?>
                                        <div class="entity-banner-visuals obj" data-name="Entity Banner Visuals"><?php the_custom_header_markup(); ?></div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                        
                        ntt_entity_header_aside();
                        ?>
                    </div>
                </header>
                <main id="entity-main" class="entity-main cn" data-name="Entity Main">
                    <div class="entity-main---cr">