<?php
if ( ! function_exists( 'ntt_entity_view_heading' ) ) {
    function ntt_entity_view_heading() {
        
        global $wp_query;
        $query_found_posts = $wp_query->found_posts;
        
        $value = '';
        $value_mu = '';
        $property_mu = '';
        
        $text_label_start_mu = '<span class="l">';
        $text_label_end_mu = '</span>';
        $entity_view_item_count_anchor_start_mu = '';
        $anchor_end_mu = '';
        
        // View Granularity: Singular
        if ( is_singular() || is_404() ) {

            $property_suffix = __( 'Entry', 'ntt' );
            $property_mu = '<span class="property---txt">'. esc_html( $property_suffix ). '</span>';

            if ( is_single() ) {
                $value = __( 'Post', 'ntt' );
            } elseif ( is_page() ) {
                $value = __( 'Page', 'ntt' );
            } elseif ( is_attachment() ) {
                $value = __( 'Attachment', 'ntt' );
            }
            
            if ( is_404() ) {
                $value = __( 'Unreachable Resource', 'ntt' );
            }

            $value_mu = '<span class="txt">'. esc_html( $value ). '</span>';

        // View Granularity: Plural
        } elseif ( is_home() || is_archive() || is_search() ) {

            $property_suffix = __( 'Entries', 'ntt' );
            $property_mu = '<span class="property---txt">'. esc_html( $property_suffix ). '</span>';
            $value_attr = '';

            // Current Index
            if ( is_home() ) {
                $value = __( 'Current', 'ntt' );
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
                        $property_prefix = __( 'Daily', 'ntt' );
                        $href_attr = get_day_link( $year_link, $month_link, $day_link );
                    } elseif ( is_month() ) {
                        $value = $month. ' '. $year;
                        $property_prefix = __( 'Monthly', 'ntt' );
                        $href_attr = get_month_link( $year_link, $month_link );
                    } elseif ( is_year() ) {
                        $value = $year;
                        $property_prefix = __( 'Yearly', 'ntt' );
                        $href_attr = get_year_link( $year_link );
                    } else {
                        $property_prefix = __( 'Miscellaneous', 'ntt' );
                    }
                
                } elseif ( is_author() && ! is_post_type_archive() ) {
                    $property_prefix = __( 'Author', 'ntt' );

                    if ( get_queried_object() ) {
                        $value = get_queried_object()->display_name;
                        $href_attr = get_author_posts_url( get_the_author_meta( 'ID' ) );
                    }
                
                } elseif ( is_category() ) {
                    $value = single_term_title( '', false );
                    $property_prefix = __( 'Category', 'ntt' );
                    $href_attr = get_category_link( get_queried_object()->term_id );
                } elseif ( is_tag() ) {
                    $value = single_term_title( '', false );
                    $property_prefix = __( 'Tag', 'ntt' );
                    $href_attr = get_tag_link( get_queried_object()->term_id );
                } else {
                    $property_prefix = __( 'Miscellaneous', 'ntt' );
                }
            
                $value_attr = 'txt';

                $text_label_start_mu = '<a href="'. esc_url( $href_attr ). '" class="l">';
                $text_label_end_mu = '</a>';

                $property_mu = '<span class="property---txt">'. esc_html( $property_prefix ). '</span>';
                $property_mu .= ' '. '<span class="archive---text">'. esc_html__( 'Archive', 'ntt' ). '</span>';
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

                $value = get_search_query();
                $value_attr = 'search-term---txt';

                $text_label_start_mu = '<a href="'. esc_url( get_search_link() ). '" class="l">';
                $text_label_end_mu = '</a>';
                
                $property_mu = '<span class="search-outcome---txt">'. esc_html( $search_outcome_text ). '</span>';
                $property_mu .= ' '. '<span class="for---text">'. esc_html_x( 'for', 'Search Result for [Search Term]', 'ntt' ). '</span>';

                wp_reset_postdata();
            }
            $value_mu = '<span class="'. esc_attr( $value_attr ).'">'. esc_html( $value ). '</span>';
        }
        ?>

        <div class="entity-view-heading heading cp" data-name="Entity View Heading">
            <div class="entity-view-heading---cr">
                <div class="entity-view-name name obj" data-name="Entity View Name">
                    
                    <?php
                    echo $text_label_start_mu;
                    
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
                    
                    echo $text_label_end_mu;
                    ?>
                </div>

                <?php
                // Item Count is displayed only in Plural View
                if ( ! is_singular() && ! is_404() ) {
                
                    $entry_text = __( 'Entry', 'ntt' );
                
                    if ( $query_found_posts == 0 ) {
                        $item_count_glabel = $entry_text;
                    } elseif ( $query_found_posts == 1 ) {
                        $item_count_glabel = $entry_text;
                    } else {
                        $item_count_glabel = __( 'Entries', 'ntt' );
                    }
                    ?>

                    <div class="entity-view-item-count count obj" data-name="Entity View Item Count">
                        <?php echo $text_label_start_mu; ?>
                            <span class="entity-view-item-count-number---text num"><?php echo esc_html( $query_found_posts ); ?></span>
                            <span class="entity-view-item-count-glabel---text"><?php echo esc_html( $item_count_glabel ); ?></span>
                        <?php echo $text_label_end_mu; ?>
                    </div>

                <?php } ?>
            </div>
        </div>
        <?php
    }
}