<?php
/**
 * Entry Taxonomy (Categories, Tags)
 */

if ( ! function_exists( 'ntt__tag__entry_categories' ) ) {
    function ntt__tag__entry_categories() {        
        
        if ( get_post_type() === 'post' && get_the_category_list() ) {
            ?>
            <div class="ntt--entry-categories ntt--cp" data-name="Entry Categories">
                <div class="ntt--entry-categories-name ntt--obj">
                    <span class="ntt--txt"><?php echo apply_filters( 'ntt_categories_name_filter', esc_html__( 'Categories', 'ntt' ) ); ?></span>
                </div>
                <?php echo get_the_category_list(); ?>
            </div>
            <?php
        }
    }
}

if ( ! function_exists( 'ntt__tag__entry_tags' ) ) {
    function ntt__tag__entry_tags() {        
        
        if ( get_post_type() === 'post' && get_the_tag_list() ) {
            ?>
            <div class="ntt--entry-tags ntt--cp" data-name="Entry Tags">
                <div class="ntt--entry-tags-name ntt--obj">
                    <span class="ntt--txt"><?php echo apply_filters( 'ntt_entry_tags_name_filter', esc_html__( 'Tags', 'ntt' ) ); ?></span>
                </div>
                <?php
                $the_tags_before = '<ul class="ntt--entry-tags-group ntt--cp"><li>';
                $the_tags_separator = '</li><li>';
                $the_tags_after = '</li></ul>';
                the_tags( $the_tags_before, $the_tags_separator, $the_tags_after);
                ?>
            </div>
            <?php
        }
    }
}