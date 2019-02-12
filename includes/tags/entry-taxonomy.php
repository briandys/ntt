<?php
if ( ! function_exists( 'ntt_entry_categories' ) ) {
    function ntt_entry_categories() {        
        
        if ( 'post' === get_post_type() && get_the_category_list() ) {
            ?>

            <div class="entry-categories cp" data-name="Entry Categories">
                <div class="entry-categories---cr">
                    <div class="entry-categories-name obj" data-name="Entry Categories Name">
                        <span class="txt"><?php echo apply_filters( 'ntt_categories_name_wp_filter', esc_html__( 'Categories', 'ntt' ) ); ?></span>
                    </div>
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
                <div class="entry-tags---cr">
                    <div class="entry-tags-name obj" data-name="Tags Name">
                        <span class="txt"><?php echo apply_filters( 'ntt_tags_name_wp_filter', esc_html__( 'Tags', 'ntt' ) ); ?></span>
                    </div>
                    
                    <?php
                    $entry_tag_item_mu = '<li class="entry-tag-item p-category obj" data-name="Entry Tag Item">';
                    $entry_tag_item_before_mu = '<div class="entry-tag-group cp" data-name="Entry Tag Group"><ul class="entry-tag-group---cr">'. $entry_tag_item_mu;
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