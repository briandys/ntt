<?php
/**
 * Entry Footer
 */
if ( ! function_exists( 'ntt_entry_footer' ) ) {
	function ntt_entry_footer() {

		global $multipage;

		if ( $multipage || get_the_tag_list() || is_singular() ) {
			?>
			<div class="entry-footer cn" data-name="Entry Footer">
				<div class="entry-footer---cr">
					<?php
					ntt_entry_content_nav();
					ntt_entry_secondary_meta();
					comments_template();
					?>
				</div>
			</div>
			<?php
		}
	}
}