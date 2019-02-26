<?php
if ( ! function_exists( 'ntt_entry_categories' ) ) {
    function ntt_entry_categories() {        
        
        if ( 'post' === get_post_type() && get_the_category_list() ) {
            ?>

            <div class="entry-categories cp" data-name="Entry Categories">
                <div class="cr">
                    <div class="entry-categories-name obj"><?php echo apply_filters( 'ntt_categories_name_wp_filter', esc_html__( 'Categories', 'ntt' ) ); ?></div>
                    <?php echo get_the_category_list(); ?>
                </div>
            </div>
            <?php
        }
    }
}

if ( ! function_exists( 'ntt_entry_tags' ) ) {
    function ntt_entry_tags() {        
        
        if ( 'post' === get_post_type() && get_the_tag_list() ) { ?>
              
            <div class="entry-tags cp" data-name="Entry Tags">
                <div class="cr">
                    <div class="entry-tags-name obj"><?php echo apply_filters( 'ntt_entry_tags_name_wp_filter', esc_html__( 'Tags', 'ntt' ) ); ?></div>
                    
                    <?php
                    $entry_tag_item_mu = '<li>';
                    $entry_tag_item_before_mu = '<div class="entry-tag-group cp"><ul class="cr">'. $entry_tag_item_mu;
                    $entry_tag_item_separator_mu = '</li>'. $entry_tag_item_mu;
                    $entry_tag_item_after_mu = '</li></ul></div>';

                    the_tags( $entry_tag_item_before_mu, $entry_tag_item_separator_mu, $entry_tag_item_after_mu);
                    ?>
                
                </div>
            </div>
            <?php
        }
    }
}