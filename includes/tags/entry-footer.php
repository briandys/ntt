<?php
/**
 * Entry Footer
 */

if ( ! function_exists( 'ntt_entry_footer' ) ) {
	function ntt_entry_footer() {

		global $multipage;

		if ( $multipage || get_the_tag_list() || is_singular() ) {
			?>
			<footer class="ntt--entry-footer ntt--cn" data-name="Entry Footer">
				<?php
                ntt_entry_content_nav();
                ntt_entry_secondary_meta();
                comments_template();
                ?>
			</footer>
			<?php
		}
	}
}