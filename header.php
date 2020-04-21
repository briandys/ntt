<?php
/**
 * Header
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> id="start" class="<?php ntt__function__view__css(); ?>" data-name="View">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php
		wp_body_open();
		?>
        <div id="ntt--entity" class="ntt--entity" data-name="Entity">
            <div class="ntt--entity-start ntt--cn" data-name="Entity Start">
                <?php $go_content_text = __( 'Go to Content', 'ntt' ); ?>
                <div aria-label="<?php echo esc_attr( $go_content_text ); ?>" role="navigation" class="ntt--go-content-nav ntt--nav ntt--cp" data-name="Go to Content Navigation">
                    <div class="ntt--go-content-navi ntt--navi ntt--obj">
                        
                        <a href="#content" title="<?php echo esc_attr( $go_content_text ); ?>">
                            <span class="ntt--txt"><?php echo esc_html( $go_content_text ); ?></span>
                        </a>
                    </div>
                </div>
            </div>
            <header class="ntt--entity-header ntt--cn" data-name="Entity Header">
                <?php ntt__wp_hook__entity_primary_heading___before(); ?>
                <div class="ntt--entity-heading ntt--cp" data-name="Entity Heading">
                    <?php
                    ntt__wp_hook__entity_logo___before();
                    
                    if ( has_custom_logo() ) {
                        ?>
                        <div class="ntt--entity-logo ntt--obj" data-name="Entity Logo"><?php the_custom_logo(); ?></div>
                        <?php
                    }
                    
                    $get_bloginfo_name = get_bloginfo( 'name', 'display' );
                    
                    if ( $get_bloginfo_name || is_customize_preview() ) {
                        ?>
                        <h1 class="ntt--entity-name ntt--obj" data-name="Entity Name">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( $get_bloginfo_name ); ?>">
                                <span class="ntt--txt"><?php echo esc_html( $get_bloginfo_name ); ?></span>
                            </a>
                        </h1>
                        <?php
                    }
                    
                    $get_bloginfo_description = get_bloginfo( 'description', 'display' );
                    
                    if ( $get_bloginfo_description || is_customize_preview() ) {
                        ?>
                        <div class="ntt--entity-description ntt--obj" data-name="Entity Description">
                            <span class="ntt--txt"><?php echo esc_attr( $get_bloginfo_description ); ?></span>
                        </div>
                        <?php
                    }

                    ntt__wp_hook__entity_description___after();
                    ?>
                </div>
                <?php ntt__wp_hook__entity_primary_heading___after(); ?>

                <?php
                ntt__tag__entity_primary_nav();
                ntt__tag__entity_secondary_nav();
                
                if ( has_header_image() || is_active_sidebar( 'entity-banner-aside' ) ) {
                    ?>
                    <div class="ntt--entity-banner ntt--cp" data-name="Entity Banner">
                        <?php
                        if ( has_header_image() ) {
                            ?>
                            <div class="ntt--entity-banner-visuals ntt--obj" data-name="Entity Banner Visuals"><?php the_custom_header_markup(); ?></div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                
                ntt_entity_header_aside();
                ?>
            </header>
            <main class="ntt--entity-main ntt--cn" data-name="Entity Main">