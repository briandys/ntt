<?php
/**
 * Aside Markup
 */
function ntt__function__aside__markup( $aside_name ) {
    $aside = sanitize_title( $aside_name );
    ?>
    <div class="<?php echo 'ntt--'. esc_attr( $aside ); ?> ntt--cn" data-name="<?php echo esc_attr( $aside_name ); ?>">
        <?php dynamic_sidebar( $aside ); ?>
    </div>
    <?php
}

/**
 * Widgets
 */
function ntt__wp_widget() {
		
	// Markup
	$widget_start_mu = '<div id="ntt--%1$s" class="ntt--%2$s ntt--widget ntt--cp" data-name="Widget">';
    $widget_end_mu = '</div>';
    
    $title_mu_start = '<div class="ntt--widget-name ntt--obj">';
        $title_mu_start .= '<span class="ntt--txt">';
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
			ntt__function__aside__markup( $aside_name );
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
			ntt__function__aside__markup( $aside_name );
		}
	}
	
	// Entity Footer Aside
	register_sidebar( array(
		'name'          => __( 'Footer Aside', 'ntt' ),
		'id'            => 'entity-footer-aside',
		'description'   => __( 'Located within Entity Footer', 'ntt' ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $title_mu_start,
		'after_title'   => $title_mu_end,
	 ) );
	
	function ntt_entity_footer_aside() {
		$aside_name = 'Entity Footer Aside';

		if ( is_active_sidebar( sanitize_title( $aside_name ) )  ) {
			ntt__function__aside__markup( $aside_name );
		}
	}
}
add_action( 'widgets_init', 'ntt__wp_widget' );

/**
 * HTML CSS
 */

function ntt__wp_widget__css( $classes ) {

    /**
     * Entity Widgets Ability Status
     */

    $r_widgets = array(
        'entity-header-aside',
        'entity-main-main-aside',
        'entity-footer-aside',
    );

    foreach ( $r_widgets as $widget ) {
        if ( is_active_sidebar( $widget ) ) {
            $classes[] = 'ntt--'. $widget. '---1';
        } else {
            $classes[] = 'ntt--'. $widget. '---0';
        }
    }

	return $classes;
}
add_filter( 'ntt__wp_filter__view_css', 'ntt__wp_widget__css' );