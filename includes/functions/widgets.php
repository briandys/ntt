<?php
function ntt_widgets() {
		
	// Markup
	$widget_start_mu = '<div id="%1$s" class="%2$s widget cp" data-name="Widget">';
		$widget_start_mu .= '<div class="%2$s---cr widget---cr">';
	$widget_end_mu = '</div>';
		$widget_end_mu .= '</div>';
	$title_mu_start = '<div class="widget-name name obj" data-name="Widget Name"><span class="widget-name---text">';
	$title_mu_end = '</span></div>';
	
	// Entity Primary Actions
	register_sidebar( array(
		'name'          => __( 'Entity Primary Actions', 'ntt' ),
		'id'            => 'entity-primary-axns',
		'description'   => __( 'Actions after Entity Primary Information', 'ntt' ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $title_mu_start,
		'after_title'   => $title_mu_end,
	) );
	
	function ntt_entity_primary_axns() {
		$aside = 'entity-primary-axns';

		if ( is_active_sidebar( $aside )  ) {
			?>
			<div id="entity-primary-axns" class="entity-primary-axns axns cp" data-name="Entity Primary Actions">
				<div class="entity-primary-axns---cr">
					<?php dynamic_sidebar( $aside ); ?>
				</div>
			</div>
			<?php
		}
	}
	
	// Entity Banner Aside
	register_sidebar( array(
		'name'          => __( 'Entity Banner Aside', 'ntt' ),
		'id'            => 'entity-banner-aside',
		'description'   => __( 'Aside within Entity Banner', 'ntt' ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $title_mu_start,
		'after_title'   => $title_mu_end,
	 ) );
	
	function ntt_entity_banner_aside() {
		$aside = 'entity-banner-aside';

		if ( is_active_sidebar( $aside )  ) {
			?>
			<div id="entity-banner-aside" class="entity-banner-aside aside cn" data-name="Entity Banner Aside">
				<div class="entity-banner-aside---cr">
					<?php dynamic_sidebar( $aside ); ?>
				</div>
			</div>
			<?php
		}
	}
		
	// Entity Header Aside
	register_sidebar( array(
		'name'          => __( '1. Entity Header Aside', 'ntt' ),
		'id'            => 'entity-header-aside',
		'description'   => __( 'Aside within Entity Header', 'ntt' ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $title_mu_start,
		'after_title'   => $title_mu_end,
	 ) );
	
	function ntt_entity_header_aside() {
		$aside = 'entity-header-aside';

		if ( is_active_sidebar( $aside )  ) {
			?>
			<div id="entity-header-aside" class="entity-header-aside aside cn" data-name="Entity Header Aside">
				<div class="entity-header-aside---cr">
					<?php dynamic_sidebar( $aside ); ?>
				</div>
			</div>
			<?php
		}
	}
	
	// Entity Main Header Aside
	register_sidebar( array(
		'name'          => __( '2a. Entity Main Header Aside', 'ntt' ),
		'id'            => 'entity-main-header-aside',
		'description'   => __( 'Aside within Entity Main Header', 'ntt' ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $title_mu_start,
		'after_title'   => $title_mu_end,
		
	 ) );
	
	function ntt_entity_main_header_aside() {
		$aside = 'entity-main-header-aside';

		if ( is_active_sidebar( $aside )  ) {
			?>
			<div id="entity-main-header-aside" class="entity-main-header-aside aside cn" data-name="Entity Main Header Aside">
				<div class="entity-main-header-aside---cr">
					<?php dynamic_sidebar( $aside ); ?>
				</div>
			</div>
			<?php
		}
	}
	
	// Entity Main Main Aside
    register_sidebar( array(
		'name'          => __( '2b. Entity Main Main Aside', 'ntt' ),
		'id'            => 'entity-main-main-aside',
		'description'   => __( 'Aside located after Entry Module', 'ntt' ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $title_mu_start,
		'after_title'   => $title_mu_end,
	 ) );
	
	function ntt_entity_main_aside() {
		$aside = 'entity-main-main-aside';

		if ( is_active_sidebar( $aside )  ) {
			?>
			<div id="entity-main-main-aside" class="entity-main-main-aside aside cn" data-name="Entity Main Aside">
				<div class="entity-main-main-aside---cr">
					<?php dynamic_sidebar( $aside ); ?>
				</div>
			</div>
			<?php
		}
	}
		
	// Entity Footer Aside
	register_sidebar( array(
		'name'          => __( '3. Entity Footer Aside', 'ntt' ),
		'id'            => 'entity-footer-aside',
		'description'   => __( 'Aside within Entity Footer', 'ntt' ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $title_mu_start,
		'after_title'   => $title_mu_end,
		
	) );
	
	function ntt_entity_footer_aside() {
		$aside = 'entity-footer-aside';

		if ( is_active_sidebar( $aside )  ) {
			?>
			<div id="entity-footer-aside" class="entity-footer-aside aside cn" data-name="Entity Footer Aside">
				<div class="entity-footer-aside---cr">
					<?php dynamic_sidebar( $aside ); ?>
				</div>
			</div>
			<?php
		}
	}
	
	// Entry Banner Aside
	register_sidebar( array(
		'name'          => __( 'Entry Banner Aside', 'ntt' ),
		'id'            => 'entry-banner-aside',
		'description'   => __( 'Aside within Entry Banner', 'ntt' ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $title_mu_start,
		'after_title'   => $title_mu_end,
	 ) );
	
	function ntt_entry_banner_aside() {
		$aside = 'entry-banner-aside';

		if ( is_active_sidebar( $aside ) && is_singular()  ) {
			?>
			<div id="entry-banner-aside" class="entry-banner-aside aside cn" data-name="Entry Banner Aside">
				<div class="entry-banner-aside---cr">
					<?php dynamic_sidebar( $aside ); ?>
				</div>
			</div>
			<?php
		}
	}
	
	// Entry Header Aside
	register_sidebar( array(
		'name'          => __( '1. Entry Header Aside', 'ntt' ),
		'id'            => 'entry-header-aside',
		'description'   => __( 'Aside within Entry Header', 'ntt' ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $title_mu_start,
		'after_title'   => $title_mu_end,
		
	 ) );
	
	function ntt_entry_header_aside() {
		$aside = 'entry-header-aside';

		if ( is_active_sidebar( $aside ) && is_singular()  ) {
			?>
			<div id="entry-header-aside" class="entry-header-aside aside cn" data-name="Entry Header Aside">
				<div class="entry-header-aside---cr">
					<?php dynamic_sidebar( $aside ); ?>
				</div>
			</div>
			<?php
		}
	}
	
	// Entry Main Aside
	register_sidebar( array(
		'name'          => __( '2. Entry Main Aside', 'ntt' ),
		'id'            => 'entry-main-aside',
		'description'   => __( 'Aside within Entry Main', 'ntt' ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $title_mu_start,
		'after_title'   => $title_mu_end,
		
	 ) );
	
	function ntt_entry_main_aside() {
		$aside = 'entry-main-aside';

		if ( is_active_sidebar( $aside ) && is_singular()  ) {
			?>
			<div id="entry-main-aside" class="entry-main-aside aside cn" data-name="Entry Main Aside">
				<div class="entry-main-aside---cr">
					<?php dynamic_sidebar( $aside ); ?>
				</div>
			</div>
			<?php
		}
	}
	
	// Entry Footer Aside
	register_sidebar( array(
		'name'          => __( '3. Entry Footer Aside', 'ntt' ),
		'id'            => 'entry-footer-aside',
		'description'   => __( 'Aside within Entry Footer', 'ntt' ),
		'before_widget' => $widget_start_mu,
		'after_widget'  => $widget_end_mu,
		'before_title'  => $title_mu_start,
		'after_title'   => $title_mu_end,
		
	 ) );
	
	function ntt_entry_footer_aside() {
		$aside = 'entry-footer-aside';

		if ( is_active_sidebar( $aside ) && is_singular()  ) {
			?>
			<div id="entry-footer-aside" class="entry-footer-aside aside cn" data-name="Entry Footer Aside">
				<div class="entry-footer-aside---cr">
					<?php dynamic_sidebar( $aside ); ?>
				</div>
			</div>
			<?php
		}
	}
}
add_action( 'widgets_init', 'ntt_widgets' );