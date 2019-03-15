<?php
if ( ! function_exists( 'ntt_entry_categories' ) ) {
    function ntt_entry_categories() {        
        
        if ( get_post_type() === 'post' && get_the_category_list() ) {
            ?>
            <div class="entry-categories cp" data-name="Entry Categories">
                <div class="entry-categories---cr">
                    <div class="entry-categories-name obj">
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
        
        if ( get_post_type() === 'post' && get_the_tag_list() ) {
            ?>
            <div class="entry-tags cp" data-name="Entry Tags">
                <div class="entry-tags---cr">
                    <div class="entry-tags-name obj">
                        <span class="txt"><?php echo apply_filters( 'ntt_entry_tags_name_wp_filter', esc_html__( 'Tags', 'ntt' ) ); ?></span>
                    </div>
                    
                    <?php
                    $the_tags_before = '<div class="entry-tag-group cp"><ul class="entry-tag-group---cr"><li>';
                    $the_tags_separator = '</li><li>';
                    $the_tags_after = '</li></ul></div>';

                    the_tags( $the_tags_before, $the_tags_separator, $the_tags_after);
                    ?>
                </div>
            </div>
            <?php
        }
    }
}