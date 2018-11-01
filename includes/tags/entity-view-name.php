<?php

if ( ! function_exists( 'ntt_entity_view_name' ) ) {
    function ntt_entity_view_name() {
        global $wp_query;
        $query_found_posts = $wp_query->found_posts;
        $value = '';
        $value_mu = '';
        $property_mu = '';
        $anchor_start_mu = '';
        $anchor_end_mu = '';
        
        // View Granularity: Singular
        if ( is_singular() || is_404() ) {

            $property_suffix = 'Entry';
            $property_mu = '<span class="entry---txt">'. $property_suffix. '</span>';

            if ( is_single() ) {
                $value = 'Post';
            } elseif ( is_page() ) {
                $value = 'Page';
            } elseif ( is_attachment() ) {
                $value = 'Attachment';
            }
            
            if ( is_404() ) {
                $value = 'Enreachable Resource';
            }

            $value_mu = '<span class="'. sanitize_title( $value ).'---txt">'. $value. '</span>';

        // View Granularity: Plural
        } elseif ( is_home() || is_archive() || is_search() ) {

            $property_suffix = 'Entries';
            $property_mu = '<span class="entries---txt">'. $property_suffix. '</span>';
            $value_attr = '';

            // Current Index
            if ( is_home() ) {
                $value = 'Current';
            }
            
            // Archive Index
            if ( is_archive() ) {

                $href_attr = '';
                $property_prefix = '';

                if ( is_day() || is_month() || is_year() ) {

                    $day = get_the_date( 'j' );
                    $month = get_the_date( 'F' );
                    $year = get_the_date( 'Y' );
                    $year_link  = get_the_time( 'Y' );
                    $month_link = get_the_time( 'm' );
                    $day_link = get_the_time( 'd' );
                    
                    if ( is_day() ) {
                        $value = $day. ' '. $month. ' '. $year;
                        $property_prefix = 'Daily';
                        $href_attr = esc_url( get_day_link( $year_link, $month_link, $day_link ) );
                    } elseif ( is_month() ) {
                        $value = $month. ' '. $year;
                        $property_prefix = 'Monthly';
                        $href_attr = esc_url( get_month_link( $year_link, $month_link ) );
                    } elseif ( is_year() ) {
                        $value = $year;
                        $property_prefix = 'Yearly';
                        $href_attr = esc_url( get_year_link( $year_link ) );
                    } else {
                        $property_prefix = 'Miscellaneous';
                    }
                
                } elseif ( is_author() && ! is_post_type_archive() ) {
                    $property_prefix = 'Author';

                    if ( get_queried_object() ) {
                        $value = get_queried_object()->display_name;
                        $href_attr = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
                    }
                
                } elseif ( is_category() ) {
                    $value = single_term_title( '', false );
                    $property_prefix = 'Category';
                    $href_attr = esc_url( get_category_link( get_queried_object()->term_id ) );
                } elseif ( is_tag() ) {
                    $value = single_term_title( '', false );
                    $property_prefix = 'Tag';
                    $href_attr = esc_url( get_tag_link( get_queried_object()->term_id ) );
                } else {
                    $property_prefix = 'Miscellaneous';
                }
            
                $value_attr = $value;

                $anchor_start_mu = '<a href="'. $href_attr. '" class="entity-view-name---a a">';
                $anchor_end_mu = '</a>';

                $property_mu = '<span class="'. sanitize_title( $property_prefix ). '---txt">'. $property_prefix. '</span>'. ' '. '<span class="archive---txt">Archive</span>';
            }

            // Custom Index (Search Results)
            if ( is_search() ) {
                $entry_search = new WP_Query( array(
                    'showposts' => -1,
                ) );
                
                if ( $query_found_posts == 0 ) {
                    $search_outcome_text = __( 'Search Result', 'ntt' );
                } elseif ( $query_found_posts == 1 ) {
                    $search_outcome_text = __( 'Search Result', 'ntt' );
                } else {
                    $search_outcome_text = __( 'Search Results', 'ntt' );
                }

                $value = esc_html( $query_found_posts );
                $value_attr = 'search-count';
                $anchor_start_mu = '<a href="'. esc_url( get_search_link() ). '" class="entity-view-name---a a">';
                $anchor_end_mu = '</a>';
                $property_mu = '<span class="search-outcome---txt">'. $search_outcome_text. '</span>
                <span class="for---txt">'. _x( 'for', 'Object: View Name | Usage: Search Result >for< <Search Term>', 'ntt' ). '</span>
                <span class="search-term---txt">'. esc_html( get_search_query() ). '</span>';

                wp_reset_postdata();
            }
            $value_mu = '<span class="'. sanitize_title( $value_attr ).'---txt">'. $value. '</span>';

        }
        ?>

        <h2 class="entity-view-name name obj h" data-name="Entity View Name">
            <?php echo $anchor_start_mu; ?>
                <span class="entity-view-name---l">
                    <span class="value---line line"><?php echo $value_mu; ?></span>
                    <span class="property---line line"><?php echo $property_mu; ?></span>
                    <span class="count obj" data-name="Count">
                        <span class="count---l">
                            <span class="count---txt num txt"><?php echo esc_html( $query_found_posts ); ?></span>
                        </span>
                    </span>
                </span>
            <?php echo $anchor_end_mu; ?>
        </h2>
        <?php
    }
}