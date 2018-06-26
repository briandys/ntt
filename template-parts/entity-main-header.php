<?php get_header(); ?>
<div id="entity-main-header" class="entity-main-header cn" data-name="Entity Main Header">
    <div class="ntt-main-header---cr">
        <div class="view-heading heading cp" data-name="View Heading">
            <div class="view-heading---cr">
            <?php
            if ( is_search() ) {
                
                $entry_search = new WP_Query( array(
                    's'         => $s,
                    'showposts' => -1,
                ) );
                
                $entry_search_count = $entry_search->post_count;
                
                if ( $entry_search_count == 0 ) {
                    $search_outcome_text = __( 'No Search Result', 'ntt' );
                } elseif ( $entry_search_count == 1 ) {
                    $search_outcome_text = __( 'Search Result', 'ntt' );
                } else {
                    $search_outcome_text = __( 'Search Results', 'ntt' );
                }
                ?>

                <h2 class="view-name name obj h" data-name="View Name">
                    <a href="<?php echo esc_url( get_search_link() ); ?>" class="view-name---a a">
                        <span class="view-name---l l">
                            <span class="value---line line">
                                <span class="search-count---txt num txt"><?php echo esc_html( $entry_search_count ); ?></span>
                            </span>
                            <span class="property---line line">
                                <span class="search-outcome---txt txt"><?php echo $search_outcome_text ?></span>
                                <span class="for---txt txt"><?php _ex( 'for', 'Object: View Name | Usage: Search Result >for< <Search Term>', 'ntt' ); ?></span>
                                <span class="search-term---txt txt"><?php echo esc_html( get_search_query() ); ?></span>
                            </span>
                        </span>
                    </a>
                </h2>
                <?php
                wp_reset_postdata();
            } else {
                ntt_view_name(); // Main Content Headings
            }
            ?>
            </div>
        </div>
        <?php
        ntt_entry_nav();
        ntt_entries_nav();
        ntt_entity_main_header_aside();
        ?>
    </div>
</div>