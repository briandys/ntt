<?php
if ( ! function_exists( 'ntt_entry_categories' ) ) {
    function ntt_entry_categories() {        
        
        if ( 'post' === get_post_type() && get_the_category_list() ) {
            ?>

            <div class="entry-categories cm-categories cp" data-name="Entry Categories">
                <div class="entry-categories---cr cm-categories---cr">
                    <div class="entry-categories-name obj" data-name="Entry Categories Name">
                        <span class="txt"><?php echo apply_filters( 'ntt_cm_categories_name', esc_html__( 'Categories', 'ntt' ) ); ?></span>
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
              
            <div class="entry-tags cm-tags cp" data-name="Entry Tags">
                <div class="entry-tags---cr cm-tags---cr">
                    <div class="entry-tags-name obj" data-name="Tags Name">
                        <span class="txt"><?php echo apply_filters( 'ntt_cm_tags_name', esc_html__( 'Tags', 'ntt' ) ); ?></span>
                    </div>
                    <?php the_tags('<ul class="entry-tag-group group list cp" data-name="Entry Tag Group"><li class="entry-tag-item p-category obj">', '</li><li class="entry-tag-item p-category obj">', '</li></ul>'); ?>
                
                </div>
            </div>
            <?php
        }
    }
}