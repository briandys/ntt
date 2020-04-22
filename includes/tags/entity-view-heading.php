<?php
/**
 * Entity View Heading
 */

if ( ! function_exists( 'ntt__tag__entity_view_heading' ) ) {
    function ntt__tag__entity_view_heading() {
        
        global $wp_query;
        $query_found_posts = $wp_query->found_posts;
        $is_no_search_results = ( is_search() && $query_found_posts == 0 );
        $is_with_search_results = ( is_search() && $query_found_posts >= 1 );
        ?>
        
        <div class="ntt--entity-view-heading ntt--cp" data-name="Entity View Heading">
            <div class="ntt--entity-view-name ntt--obj" data-name="Entity View Name">
                
                <?php
                $archive_text = __( 'Archive', 'ntt' );
                $index_text = __( 'Index', 'ntt' );
                $page_text = __( 'Page', 'ntt' );
                $entry_text = __( 'Entry', 'ntt' );
                $miscellaneous_text = __( 'Miscellaneous', 'ntt' );
                
                // Multiple Entries
                if ( is_home() || is_archive() || is_search() ) {

                    // Current Index
                    if ( is_home() ) {
                        ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <span class="ntt--txt">
                                <span class="ntt--value-line">
                                    <span class="ntt--home-text"><?php esc_html_e( 'Home', 'ntt' ); ?></span>
                                </span>
                                <span class="ntt--key-line">
                                    <span class="ntt--current-text"><?php esc_html_e( 'Current', 'ntt' ); ?></span>
                                    <span class="ntt--index-text"><?php echo esc_html( $index_text ); ?></span>
                                </span>
                            </span>
                        </a>
                    
                    <?php
                    // Archive Index
                    } elseif ( is_archive() ) {

                        // Date Archive Index
                        if ( is_day() || is_month() || is_year() ) {

                            $day = get_the_date( 'j' );
                            $month = get_the_date( 'F' );
                            $year = get_the_date( 'Y' );
                            $year_link  = get_the_time( 'Y' );
                            $month_link = get_the_time( 'm' );
                            $day_link = get_the_time( 'd' );

                            if ( is_day() ) {
                                ?>
                                <a href="<?php echo esc_url( get_day_link( $year_link, $month_link, $day_link ) ); ?>">
                                    <span class="ntt--txt">
                                        <span class="ntt--value-line">
                                            <span class="ntt--date-txt"><?php echo $day. ' '. $month. ' '. $year; ?></span>
                                        </span>
                                        <span class="ntt--key-line">
                                            <span class="ntt--daily-text"><?php esc_html_e( 'Daily', 'ntt' ); ?></span>
                                            <span class="ntt--archive-text"><?php echo esc_html( $archive_text ); ?></span>
                                            <span class="ntt--index-text"><?php echo esc_html( $index_text ); ?></span>
                                        </span>
                                    </span>
                                </a>
                            
                            <?php
                            } elseif ( is_month() ) {
                                ?>
                                <a href="<?php echo esc_url( get_month_link( $year_link, $month_link ) ); ?>">
                                    <span class="ntt--txt">
                                        <span class="ntt--value-line">
                                            <span class="ntt--date-txt"><?php echo $month. ' '. $year; ?></span>
                                        </span>
                                        <span class="ntt--key-line">
                                            <span class="ntt--monthly-text"><?php esc_html_e( 'Monthly', 'ntt' ); ?></span>
                                            <span class="ntt--archive-text"><?php echo esc_html( $archive_text ); ?></span>
                                            <span class="ntt--index-text"><?php echo esc_html( $index_text ); ?></span>
                                        </span>
                                    </span>
                                </a>
                            
                            <?php
                            } elseif ( is_year() ) {
                                ?>
                                <a href="<?php echo esc_url( get_year_link( $year_link ) ); ?>">
                                    <span class="ntt--txt">
                                        <span class="ntt--value-line">
                                            <span class="ntt--date-txt"><?php echo $year; ?></span>
                                        </span>
                                        <span class="ntt--key-line">
                                            <span class="ntt--yearly-text"><?php esc_html_e( 'Yearly', 'ntt' ); ?></span>
                                            <span class="ntt--archive-text"><?php echo esc_html( $archive_text ); ?></span>
                                            <span class="ntt--index-text"><?php echo esc_html( $index_text ); ?></span>
                                        </span>
                                    </span>
                                </a>
                            
                            <?php
                            // Miscellaneous Archive Index
                            } else {
                                ?>
                                <span class="ntt--txt">
                                    <span class="ntt--value-line">
                                        <span class="ntt--miscellanous-text"><?php echo esc_html( $miscellaneous_text ); ?></span>
                                    </span>
                                    <span class="ntt--key-line">
                                        <span class="ntt--archive-text"><?php echo esc_html( $archive_text ); ?></span>
                                        <span class="ntt--index-text"><?php echo esc_html( $index_text ); ?></span>
                                    </span>
                                </span>
                            
                            <?php
                            }

                        // Author Archive Index
                        } elseif ( is_author() && ! is_post_type_archive() ) {

                            if ( get_queried_object() ) {
                                ?>
                                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                                    <span class="ntt--txt">
                                        <span class="ntt--value-line">
                                            <span class="ntt--author-name-txt"><?php echo get_queried_object()->display_name; ?></span>
                                        </span>
                                        <span class="ntt--key-line">
                                            <span class="ntt--author-text"><?php echo esc_html( $author_text ); ?></span>
                                            <span class="ntt--archive-text"><?php echo esc_html( $archive_text ); ?></span>
                                            <span class="ntt--index-text"><?php echo esc_html( $index_text ); ?></span>
                                        </span>
                                    </span>
                                </a>
                            
                            <?php
                            // Miscellaneous Author Archive Index
                            } else {
                                ?>
                                <span class="ntt--txt">
                                    <span class="ntt--value-line">
                                        <span class="ntt--miscellanous-text"><?php echo esc_html( $miscellaneous_text ); ?></span>
                                    </span>
                                    <span class="ntt--key-line">
                                        <span class="ntt--author-text"><?php echo esc_html( $author_text ); ?></span>
                                        <span class="ntt--archive-text"><?php echo esc_html( $archive_text ); ?></span>
                                        <span class="ntt--index-text"><?php echo esc_html( $index_text ); ?></span>
                                    </span>
                                </span>
                            
                            <?php
                            }
                        
                        // Category Archive Index
                        } elseif ( is_category() ) {
                            ?>
                            <a href="<?php echo esc_url( get_category_link( get_queried_object()->term_id ) ); ?>">
                                <span class="ntt--txt">
                                    <span class="ntt--value-line">
                                        <span class="ntt--category-txt"><?php echo single_term_title( '', false ); ?></span>
                                    </span>
                                    <span class="ntt--key-line">
                                        <span class="ntt--category-text"><?php esc_html_e( 'Category', 'ntt' ); ?></span>
                                        <span class="ntt--archive-text"><?php echo esc_html( $archive_text ); ?></span>
                                        <span class="ntt--index-text"><?php echo esc_html( $index_text ); ?></span>
                                    </span>
                                </span>
                            </a>
                        
                        <?php
                        // Tag Archive Index
                        } elseif ( is_tag() ) {
                            ?>
                            <a href="<?php echo esc_url( get_tag_link( get_queried_object()->term_id ) ); ?>">
                                <span class="ntt--txt">
                                    <span class="ntt--value-line">
                                        <span class="ntt--tag-txt"><?php echo single_term_title( '', false ); ?></span>
                                    </span>
                                    <span class="ntt--key-line">
                                        <span class="ntt--tag-text"><?php esc_html_e( 'Tag', 'ntt' ); ?></span>
                                        <span class="ntt--archive-text"><?php echo esc_html( $archive_text ); ?></span>
                                        <span class="ntt--index-text"><?php echo esc_html( $index_text ); ?></span>
                                    </span>
                                </span>
                            </a>
                        
                        <?php

                        // Miscellaneous Archive Index
                        } else {
                            ?>
                            <span class="ntt--txt">
                                <span class="ntt--value-line">
                                    <span class="ntt--miscellanous-text"><?php echo esc_html( $miscellaneous_text ); ?></span>
                                </span>
                                <span class="ntt--key-line">
                                    <span class="ntt--archive-text"><?php echo esc_html( $archive_text ); ?></span>
                                    <span class="ntt--index-text"><?php echo esc_html( $index_text ); ?></span>
                                </span>
                            </span>
                        
                        <?php
                        }

                    // Search Index
                    } elseif ( is_search() ) {

                        if ( $query_found_posts == 0 || $query_found_posts ==1 ) {
                            $search_results_label = __( 'Search Result', 'ntt' );
                        } elseif ( $query_found_posts > 1 ) {
                            $search_results_label = __( 'Search Results', 'ntt' );
                        } else {
                            $search_results_label = '';
                        }
                        ?>
                        <a href="<?php echo esc_url( get_search_link() ); ?>">
                            <span class="ntt--txt">
                                <span class="ntt--key-line">
                                    <span class="ntt--search-results-txt"><?php echo esc_html( $search_results_label ); ?></span>
                                    <span class="ntt--for-text"><?php echo esc_html_x( 'for', 'Search Results for [Search Term]', 'ntt' ); ?></span>
                                </span>
                                <span class="ntt--value-line">
                                    <span class="ntt--search-term-txt"><?php echo get_search_query(); ?></span>
                                </span>
                            </span>
                        </a>
                    
                    <?php
                    // Miscellaneous Archive Index
                    } else {
                        ?>
                        <span class="ntt--txt">
                            <span class="ntt--value-line">
                                <span class="ntt--miscellanous-text"><?php echo esc_html( $miscellaneous_text ); ?></span>
                            </span>
                            <span class="ntt--key-line">
                                <span class="ntt--archive-text"><?php echo esc_html( $archive_text ); ?></span>
                                <span class="ntt--index-text"><?php echo esc_html( $index_text ); ?></span>
                            </span>
                        </span>
                    
                    <?php
                    }
                
                // Singular Entry
                } elseif ( is_singular() ) {

                    // Post Entry
                    if ( is_single() && ! is_attachment() ) {
                        ?>
                        <span class="ntt--txt">
                            <span class="ntt--post-text"><?php esc_html_e( 'Post', 'ntt' ); ?></span>
                            <span class="ntt--entry-text"><?php echo esc_html( $entry_text ); ?></span>
                        </span>
                    
                    <?php
                    // Page Entry
                    } elseif ( is_page() ) {
                        ?>
                        <span class="ntt--txt">
                            <span class="ntt--page-text"><?php echo esc_html( $page_text ); ?></span>
                            <span class="ntt--entry-text"><?php echo esc_html( $entry_text ); ?></span>
                        </span>
                    
                    <?php
                    // Attachment Entry
                    } elseif ( is_attachment() ) {
                        ?>
                        <span class="ntt--txt">
                            <span class="ntt--attachment-text"><?php esc_html_e( 'Attachment', 'ntt' ); ?></span>
                            <span class="ntt--entry-text"><?php echo esc_html( $entry_text ); ?></span>
                        </span>
                    
                    <?php
                    // Miscellaneous Entry
                    } else {
                        ?>
                        <span class="ntt--txt">
                            <span class="ntt--miscellanous-text"><?php echo esc_html( $miscellaneous_text ); ?></span>
                            <span class="ntt--entry-text"><?php echo esc_html( $entry_text ); ?></span>
                        </span>
                    
                    <?php
                    }

                // Zero Entry
                } elseif ( is_404() ) {
                    ?>
                    <span class="ntt--txt">
                        <span class="ntt--four-zero-four-text"><?php esc_html_e( '404', 'ntt' ); ?></span>
                        <span class="ntt--page-text"><?php echo esc_html( $page_text ); ?></span>
                    </span>
                
                <?php
                // Miscellaneous Entry
                } else {
                    ?>
                    <span class="ntt--txt">
                        <span class="ntt--miscellanous-text"><?php echo esc_html( $miscellaneous_text ); ?></span>
                        <span class="ntt--entry-text"><?php echo esc_html( $entry_text ); ?></span>
                    </span>
                
                <?php
                }
                ?>
            </div>
            
            <?php
            // If in Multiple Entries View, show Entry Count
            if ( is_home() || is_archive() || is_search() ) {
                ntt__tag__entry_count( $args = '' );
            }
            ?>
        </div>
        <?php
    }
}