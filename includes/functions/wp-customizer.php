<?php

function ntt_register_customize( $wp_customize ) {	
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Entity Name
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.entity-name .txt',
		'render_callback' => 'ntt_customize_partial_blogname',
	) );

	// Entity Description
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.entity-description .txt',
		'render_callback' => 'ntt_customize_partial_blogdescription',
	) );

	// Custom Colors
	$wp_customize->add_setting( 'colorscheme', array(
		'default'           => 'default',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'ntt_wp_customizer_color_scheme_sanitizer',
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
}
add_action( 'customize_register', 'ntt_register_customize' );

function ntt_wp_customizer_color_scheme_sanitizer( $input ) {
	$valid = array( 'default', 'custom', );

	if ( in_array( $input, $valid ) ) {
		return $input;
	}
	return 'default';
}

function ntt_customize_partial_blogname() {
	bloginfo( 'name' );
}

function ntt_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function ntt_wp_customizer_preview() {
	wp_enqueue_script( 'ntt-wp-customizer-preview-script', get_theme_file_uri( '/assets/scripts/wp-customizer-preview.js' ), array( 'customize-preview', ), null, true );
}
add_action( 'customize_preview_init', 'ntt_wp_customizer_preview' );

function ntt_wp_customizer_controls() {
	wp_enqueue_script( 'ntt-wp-customizer-controls-script', get_theme_file_uri( '/assets/scripts/wp-customizer-controls.js' ), array(), null, true );
}
add_action( 'customize_controls_enqueue_scripts', 'ntt_wp_customizer_controls' );

// Hide the Edit Icon in WP Customizer Preview
function ntt_hide_edit_icon_wp_customizer() {
    $js = 'wp.customize.selectiveRefresh.Partial.prototype.createEditShortcutForPlacement = function() {};';
    wp_add_inline_script( 'customize-selective-refresh', $js );
}
add_action( 'wp_enqueue_scripts', 'ntt_hide_edit_icon_wp_customizer' );