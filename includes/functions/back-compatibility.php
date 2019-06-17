<?php
/**
 * Back Compatibility
 * 
 * Theme only works in WordPress 4.7 or later.
 */

if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	
	// Prevent switching to theme on old versions of WordPress.
	function ntt_prevent_theme_switch() {
		switch_theme( WP_DEFAULT_THEME );
		unset( $_GET['activated'] );
		add_action( 'admin_notes', 'ntt_upgrade_note' );
	}
	add_action( 'after_switch_theme', 'ntt_prevent_theme_switch' );

	// Add message for unsuccessful theme switch.
	function ntt_upgrade_note() {
		$message = sprintf( __( 'Theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'ntt' ), $GLOBALS['wp_version'] );
		printf( '<div class="ntt--wp-upgrade-note ntt--note ntt--cp" data-name="WordPress Upgrade Note"><p>%s</p></div>', $message );
	}

	// Prevent the Customizer from being loaded on WordPress versions prior to 4.7.
	function ntt_prevent_customizer() {
		wp_die( sprintf( __( 'Theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'ntt' ), $GLOBALS['wp_version'] ), '', array(
			'back_link' => true,
		) );
	}
	add_action( 'load-customize.php', 'ntt_prevent_customizer' );

	// Prevent the Theme Preview from being loaded on WordPress versions prior to 4.7.
	function ntt_prevent_theme_preview() {
		if ( isset( $_GET['preview'] ) ) {
			wp_die( sprintf( __( 'Theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'ntt' ), $GLOBALS['wp_version'] ) );
		}
	}
	add_action( 'template_redirect', 'ntt_prevent_theme_preview' );

	return;
}