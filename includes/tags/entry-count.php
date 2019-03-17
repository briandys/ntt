<?php
/**
 * Entry Count
 * 
 * Displays the number of entries in a query
 */
if ( ! function_exists( 'ntt_entry_count') ) {
    function ntt_entry_count( $args, $entry_count_name = '', $entry_count_css = '' ) {

        if ( is_singular() ) {
            $the_query = new WP_Query( $args );
            $total_pages = $the_query->max_num_pages;
            $query_found_posts = $the_query->found_posts;
        } else {
            global $wp_query;
            $total_pages = $wp_query->max_num_pages;
            $query_found_posts = $wp_query->found_posts;
        }

        if ( $query_found_posts == 1 ) {
            $entry_count_glabel = __( 'Entry', 'ntt' );
            $entry_count_population_status_css = $entry_count_css. '-entry-count--single';
        } elseif ( $query_found_posts > 1 ) {
            $entry_count_glabel = __( 'Entries', 'ntt' );
            $entry_count_population_status_css = $entry_count_css. '-entry-count--multiple';
        } elseif ( $query_found_posts == 0 ) {
            $entry_count_glabel = __( 'Entry', 'ntt' );
            $entry_count_population_status_css = $entry_count_css. '-entry-count--zero';
        } else {
            $entry_count_glabel = '';
            $entry_count_population_status_css = '';
        }
        ?>
        <div class="<?php echo $entry_count_css. '-entry-count'. ' '. $entry_count_population_status_css; ?> count obj" data-name="<?php echo $entry_count_name; ?> Entry Count">
            <span class="l">
                <span class="count---txt num"><?php echo esc_html( $query_found_posts ); ?></span>
                <span class="glabel---txt"><?php echo esc_html( $entry_count_glabel ); ?></span>
            </span>
        </div>
        <?php
        wp_reset_postdata();
    }
}