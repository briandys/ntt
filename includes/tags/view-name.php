<?php

if ( ! function_exists( 'ntt_view_name' ) ) {
    function ntt_view_name() {
        
        $value = '';
        $property = '';
        $anchor_start = '';
        $anchor_end = '';
        
        // View Level: Item
        if ( is_singular() ) {

            $property_suffix = 'Entry';
            $property = '<span class="entry---txt txt">'. $property_suffix. '</span>';

            if ( is_single() ) {
                $value = 'Post';
            } elseif ( is_page() && ! is_front_page() ) {
                $value = 'Page';
            } elseif ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
                $value = 'Front Page';
            } elseif ( is_attachment() ) {
                $value = 'Attachment';
            } elseif ( is_404() ) {
                $value = 'Page Not Found';
            } else {
                $value = 'Miscellaneous';
            }

            $value = '<span class="'. sanitize_title( $value ).'---txt txt">'. $value. '</span>';

        // View Level: Group (Indexed)
        } else {

            $property_suffix = 'Entries';
            $property = '<span class="entries---txt txt">'. $property_suffix. '</span>';

            // Indexing Type: Current
            if ( is_home() ) {
                $value = 'Current';
            
            // Indexing Type: Archive
            } elseif ( is_archive() ) {

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

                $anchor_start = '<a href="'. $href_attr. '" class="view-name---a a">';
                $anchor_end = '</a>';

                $property = '<span class="'. sanitize_title( $property_prefix ). '---txt txt">'. $property_prefix. '</span>'. ' '. '<span class="archive---txt txt">Archive</span>';

            } else {
                $property = 'Miscellaneous';
            }

            $value = '<span class="'. sanitize_title( $value ).'---txt txt">'. $value. '</span>';

        } ?>

        <h2 class="view-name name obj h" data-name="View Name">
            <?php echo $anchor_start; ?>
                <span class="view-name---l l">
                    <span class="value---line line"><?php echo $value; ?></span>
                    <span class="property---line line"><?php echo $property; ?></span>
                </span>
            <?php echo $anchor_end; ?>
        </h2>
        
    <?php }
}