<?php
/**
 * Entry Footer
 */

if ( ! function_exists( 'ntt__tag__entry_footer' ) ) {
	function ntt__tag__entry_footer() {

		global $multipage;

		if ( $multipage || get_the_tag_list() || is_singular() ) {
			?>
			<footer class="ntt--entry-footer ntt--cn" data-name="Entry Footer">
				<?php
                ntt__tag__entry_content_nav();
                ntt__tag__entry_secondary_meta();
                comments_template();
                ?>
			</footer>
			<?php
		}
	}
}