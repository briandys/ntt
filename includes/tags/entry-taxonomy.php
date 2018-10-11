<?php

if ( ! function_exists( 'ntt_entry_categories' ) ) {
    function ntt_entry_categories() {        
        
        if ( 'post' === get_post_type() && get_the_category_list() ) { ?>

            <div class="cm-categories entry-categories cp" data-name="Entry Categories">
                <div class="cm-categories---cr entry-categories---cr">
                    
                    <div class="cm-categories-name categories-name name obj" data-name="Categories Name">
                        <span class="categories---txt txt">
                            <?php echo apply_filters( 'ntt_cm_categories_name', esc_html__( 'Categories', 'ntt' ) ); ?>
                        </span>
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
              
            <div class="cm-tags entry-tags cp" data-name="Entry Tags">
                <div class="cm-tags---cr entry-tags---cr">
                    
                    <div class="cm-tags-name tags-name name obj" data-name="Tags Name">
                        <span class="tags---txt txt">
                            <?php echo apply_filters( 'ntt_cm_tags_name', esc_html__( 'Tags', 'ntt' ) ); ?>
                        </span>
                    </div>
                    
                <?php the_tags('<ul class="entry-tag-group group list" data-name="Entry Tag Group"><li class="entry-tag-item tag-item p-category obj item">', '</li><li class="entry-tag-item tag-item p-category obj item">', '</li></ul>'); ?>
                
                </div>
            </div>
            <?php
        }
    }
}