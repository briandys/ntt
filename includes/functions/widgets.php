<?php
/**
 * Aside Markup
 */
function ntt_aside_markup( $aside_name ) {
    $aside = sanitize_title( $aside_name );
    ?>
    <div id="<?php echo esc_attr( $aside ); ?>" class="<?php echo esc_attr( $aside ); ?> cn" data-name="<?php echo esc_attr( $aside_name ); ?>">
        <div class="<?php echo esc_attr( $aside ); ?>---cr">
            <?php dynamic_sidebar( $aside ); ?>
        </div>
    </div>
    <?php
}

/**
 * Widgets
 */
function ntt_widgets() {
		
	// Markup
	$widget_start_mu = '<div id="%1$s" class="%2$s widget cp" data-name="Widget">';
		$widget_start_mu .= '<div class="widget---cr">';
	    $widget_end_mu = '</div>';
    $widget_end_mu .= '</div>';
    
    $title_mu_start = '<div class="widget-name obj">';
        $title_mu_start .= '<span class="txt">';
        $title_mu_end = '</span>';
	$title_mu_end .= '</div>';
	
	// Entity Header Aside
	register_sidebar( array(
		'name'          => __( 'Header Aside', 'ntt' ),
		'id'            => 'entity-header-aside',
		'description'   => __( 'Located within Entity Header', 'ntt' ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $title_mu_start,
		'after_title'   => $title_mu_end,
	 ) );
	
	function ntt_entity_header_aside() {
		$aside_name = 'Entity Header Aside';

		if ( is_active_sidebar( sanitize_title( $aside_name ) )  ) {
			ntt_aside_markup( $aside_name );
		}
	}
	
	// Entity Main Main Aside
    register_sidebar( array(
		'name'          => __( 'Main Aside', 'ntt' ),
		'id'            => 'entity-main-main-aside',
		'description'   => __( 'Located within Entity Main', 'ntt' ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $title_mu_start,
		'after_title'   => $title_mu_end,
	 ) );
	
	function ntt_entity_main_aside() {
		$aside_name = 'Entity Main Main Aside';

		if ( is_active_sidebar( sanitize_title( $aside_name ) )  ) {
			ntt_aside_markup( $aside_name );
		}
	}
}
add_action( 'widgets_init', 'ntt_widgets' );

/**
 * HTML CSS
 */
function ntt_widgets_html_css( $classes ) {

    $disabled_css = '0';
    $enabled_css = '1';

    /**
     * Entity Widgets Ability Status
     */
    $r_widgets = array(
        'entity-header-aside',
        'entity-main-main-aside',
    );

    foreach ( $r_widgets as $widget ) {
        if ( is_active_sidebar( $widget ) ) {
            $classes[] = $widget. '--'. $enabled_css;
        } else {
            $classes[] = $widget. '--'. $disabled_css;
        }
    }

	return $classes;
}
add_filter( 'ntt_html_css_wp_filter', 'ntt_widgets_html_css' );