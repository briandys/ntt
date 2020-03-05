<?php
/**
 * Entry Count
 * 
 * Displays the number of entries in a query
 */

if ( ! function_exists( 'ntt__tag__entry_count') ) {
    function ntt__tag__entry_count( $args, $entry_count_name = 'Entry Count', $entry_count_css = 'ntt--entry-count' ) {

        if ( is_singular() ) {
            $the_query = new WP_Query( $args );
            $total_pages = $the_query->max_num_pages;
            $total_entries = $the_query->found_posts;
        } else {
            global $wp_query;
            $total_pages = $wp_query->max_num_pages;
            $total_entries = $wp_query->found_posts;
        }

        if ( $total_entries == 1 ) {
            $label_txt = __( 'Entry', 'ntt' );
            $status_css = $entry_count_css. '---single';
        } elseif ( $total_entries > 1 ) {
            $label_txt = __( 'Entries', 'ntt' );
            $status_css = $entry_count_css. '---multiple';
        } elseif ( $total_entries == 0 ) {
            $label_txt = __( 'Entry', 'ntt' );
            $status_css = $entry_count_css. '---none';
        } else {
            $label_txt = '';
            $status_css = '';
        }
        ?>
        <div class="<?php echo $entry_count_css. ' '. $status_css; ?> ntt--obj" data-name="<?php echo $entry_count_name; ?>">
            <span class="ntt--txt">
                <span class="ntt--count-txt ntt--num"><?php echo esc_html( $total_entries ); ?></span>
                <label class="ntt--label-txt"><?php echo esc_html( $label_txt ); ?></label>
            </span>
        </div>
        <?php
        wp_reset_postdata();
    }
}