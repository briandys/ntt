<?php

if ( ! function_exists( 'ntt_entity_view_heading' ) ) {
    function ntt_entity_view_heading() {
        global $wp_query;
        $query_found_posts = $wp_query->found_posts;
        $value = '';
        $value_mu = '';
        $property_mu = '';
        $entity_view_name_anchor_start_mu = '';
        $entity_view_item_count_anchor_start_mu = '';
        $entity_view_name_item_count_anchor_end_mu = '';
        
        // View Granularity: Singular
        if ( is_singular() || is_404() ) {

            $property_suffix = 'Entry';
            $property_mu = '<span class="'. sanitize_title( $property_suffix ).'---text">'. $property_suffix. '</span>';

            if ( is_single() ) {
                $value = 'Post';
            } elseif ( is_page() ) {
                $value = 'Page';
            } elseif ( is_attachment() ) {
                $value = 'Attachment';
            }
            
            if ( is_404() ) {
                $value = 'Unreachable Resource';
            }

            $value_mu = '<span class="'. sanitize_title( $value ).'---text">'. $value. '</span>';

        // View Granularity: Plural
        } elseif ( is_home() || is_archive() || is_search() ) {

            $property_suffix = 'Entries';
            $property_mu = '<span class="'. sanitize_title( $property_suffix ).'---text">'. $property_suffix. '</span>';
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

                $entity_view_name_anchor_start_mu = '<a href="'. $href_attr. '" class="entity-view-name---a">';
                $entity_view_item_count_anchor_start_mu = '<a href="'. $href_attr. '" class="entity-view-item-count---a">';
                $entity_view_name_item_count_anchor_end_mu = '</a>';

                $property_mu = '<span class="'. sanitize_title( $property_prefix ). '---text">'. $property_prefix. '</span>'. ' '. '<span class="archive---text">Archive</span>';
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

                $value = esc_html( get_search_query() );
                $value_attr = 'search-term';

                $entity_view_name_anchor_start_mu = '<a href="'. esc_url( get_search_link() ). '" class="entity-view-name---a">';
                $entity_view_item_count_anchor_start_mu = '<a href="'. esc_url( get_search_link() ). '" class="entity-view-item-count---a">';
                $entity_view_name_item_count_anchor_end_mu = '</a>';
                
                $property_mu = '<span class="search-outcome---txt">'. $search_outcome_text. '</span>
                <span class="for---text">'. _x( 'for', 'Search Result ->for<- [Search Term]', 'ntt' ). '</span>';

                wp_reset_postdata();
            }
            $value_mu = '<span class="'. sanitize_title( $value_attr ).'---text">'. $value. '</span>';
        }
        ?>

        <div class="entity-view-heading heading cp" data-name="Entity View Heading">
            <div class="entity-view-heading---cr">
                <div class="entity-view-name name obj" data-name="Entity View Name">
                    <?php echo $entity_view_name_anchor_start_mu; ?>
                        <span class="entity-view-name---l">
                            <?php
                            if ( is_search() ) {
                                ?>
                                <span class="property---line"><?php echo $property_mu; ?></span>
                                <span class="value---line"><?php echo $value_mu; ?></span>
                                <?php
                            } else {
                                ?>
                                <span class="value---line"><?php echo $value_mu; ?></span>
                                <span class="property---line"><?php echo $property_mu; ?></span>
                                <?php
                            }
                            ?>
                        </span>
                    <?php echo $entity_view_name_item_count_anchor_end_mu; ?>
                </div>

                <?php
                if ( ! is_singular() ) {
                $entry_text = esc_html( 'Entry', 'ntt' );
                
                if ( $query_found_posts == 0 ) {
                    $item_count_glabel = $entry_text;
                } elseif ( $query_found_posts == 1 ) {
                    $item_count_glabel = $entry_text;
                } else {
                    $item_count_glabel = esc_html( 'Entries', 'ntt' );
                }
                ?>

                <div class="entity-view-item-count count obj" data-name="Entity View Item Count">
                    <?php echo $entity_view_item_count_anchor_start_mu; ?>
                        <span class="entity-view-item-count---l">
                            <span class="entity-view-item-count-number---text num"><?php echo esc_html( $query_found_posts ); ?></span>
                            <span class="entity-view-item-count-glabel---text"><?php echo $item_count_glabel; ?></span>
                        </span>
                    <?php echo $entity_view_name_item_count_anchor_end_mu; ?>
                </div>

                <?php
                }
                ?>
            </div>
        </div>
        <?php
    }
}