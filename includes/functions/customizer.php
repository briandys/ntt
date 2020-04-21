<?php
/**
 * Customizer
 */

function ntt__wp_customizer( $wp_customize ) {	
    
    /**
     * Entity Name, Entity Description
     */

    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    
    /**
     * Selective Refresh
     */
    if ( isset( $wp_customize->selective_refresh ) ) {
        
        $wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.ntt--entity-name .txt',
				'render_callback' => 'ntt__wp_customizer__entity_name__partial',
			)
		);
        
        $wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.ntt--entity-description .txt',
				'render_callback' => 'ntt__wp_customizer__entity_description__partial',
			)
		);
	}

    /**
     * NTT Settings
     */

	$wp_customize->add_setting( 'colorscheme', array(
		'default'           => 'default',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ntt__wp_customizer__color_scheme__sanitizer',
	) );

	$wp_customize->add_setting( 'colorscheme_hue', array(
		'default'           => 250,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'colorscheme', array(
		'type'        => 'radio',
		'label'       => __( 'Color Scheme', 'ntt' ),
		'choices'     => array(
			'default'    => __( 'Default', 'ntt' ),
			'custom'     => __( 'Custom', 'ntt' ),
		),
		'section'     => 'colors',
		'priority'    => 5,
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'colorscheme_hue', array(
		'mode'        => 'hue',
		'section'     => 'colors',
		'priority'    => 6,
     ) ) );
     
    /**
     * NTT Settings
     */

    $wp_customize->add_section( 'ntt__wp_theme', array(
        'title'         => 'NTT Settings',
        'description'   => 'Customize NTT',
    ) );
 
    /**
     * Site ID
     */

    $wp_customize->add_setting( 'ntt_settings_site_id', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr',
    ) );

    $wp_customize->add_control( 'ntt_settings_site_id', array(
        'label'         => 'Site ID',
        'section'       => 'ntt__wp_theme',
		'priority'      => 1,
    ) );
 
    /**
     * Features
     */

    $wp_customize->add_setting( 'ntt_settings_features', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr',
    ) );

    $wp_customize->add_control( 'ntt_settings_features', array(
        'label'         => 'Features',
        'section'       => 'ntt__wp_theme',
		'priority'      => 2,
    ) );
}
add_action( 'customize_register', 'ntt__wp_customizer' );

/**
 * Render Entity Name for the selective refresh partial.
 *
 * @return void
 */

function ntt__wp_customizer__entity_name__partial() {
	bloginfo( 'name' );
}

/**
 * Render Entity Description for the selective refresh partial.
 *
 * @return void
 */

function ntt__wp_customizer__entity_description__partial() {
	bloginfo( 'description' );
}

function ntt__wp_customizer__color_scheme__sanitizer( $input ) {
	$valid = array(
		'default',
		'custom',
	);

	if ( in_array( $input, $valid ) ) {
		return $input;
	}
	return 'default';
}

/**
 * Customizer Preview Script
 */

function ntt__wp_customizer__preview__scripts() {
	wp_enqueue_script( 'ntt--customizer-preview-script', get_theme_file_uri( '/assets/scripts/customizer-preview.js' ), array( 'customize-preview', ), null, true );
}
add_action( 'customize_preview_init', 'ntt__wp_customizer__preview__scripts' );

/**
 * Customizer Controls Script
 */

function ntt__wp_customizer__controls__scripts() {
	wp_enqueue_script( 'ntt--customizer-controls-script', get_theme_file_uri( '/assets/scripts/customizer-controls.js' ), array(), null, true );
}
add_action( 'customize_controls_enqueue_scripts', 'ntt__wp_customizer__controls__scripts' );

/**
 * Customizer Edit Icon Script
 * Hide the edit icon in Customizer Preview
 */

function ntt__wp_customizer__modify_action__scripts() {
    $js = 'wp.customize.selectiveRefresh.Partial.prototype.createEditShortcutForPlacement = function() {};';
    wp_add_inline_script( 'customize-selective-refresh', $js );
}
add_action( 'wp_enqueue_scripts', 'ntt__wp_customizer__modify_action__scripts' );

/**
 * Customizer Color Patterns
 */ 

function ntt__wp_customizer__color_scheme() {
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
	$saturation = absint( apply_filters( 'ntt_custom_colors_saturation', 50 ) ). '%';
    $css = '
    .ntt--customizer-color-scheme---custom--view .ntt--entity-header {
        background-color: hsl('. $hue. ', '. $saturation. ', 50%);
    }

    .ntt--customizer-color-scheme---custom--view .ntt--entity-header,
    .ntt--customizer-color-scheme---custom--view .ntt--entity-header a {
        color: white;
    }
    ';
	return apply_filters( 'ntt__wp_customizer__color_scheme', $css, $hue, $saturation );
}

/**
 * Customizer Custom Color Scheme Style
 */

function ntt__wp_customizer__color_scheme__styles() {
    
    if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
        return;
	}
	
	ntt__wp_customizer__color_scheme();
    
    $hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
    ?>

    <style id="ntt--customizer-custom-color-scheme-style"<?php if ( is_customize_preview() ) { echo ' '. 'data-hue="' . esc_attr( $hue ) . '"'; } ?>>
        <?php echo ntt__wp_customizer__color_scheme(); ?>
    </style>
    <?php
}
add_action( 'wp_head', 'ntt__wp_customizer__color_scheme__styles' );

/**
 * Customizer HTML CSS
 */

function ntt__wp_customizer__css( $classes ) {

    $site_id = get_theme_mod( 'ntt_settings_site_id' );
    $features = get_theme_mod( 'ntt_settings_features' );

    if ( $site_id ) {
        $classes[] = 'ntt--site-id--'. sanitize_title( $site_id );
    }

    if ( $features ) {
        $features = trim( preg_replace( '/\s+/', ' ', $features ) );
        $classes[] = $features;
    }
    
    return $classes;
}
add_filter( 'ntt__wp_filter__view_css', 'ntt__wp_customizer__css' );