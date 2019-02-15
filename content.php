<article id="entry-<?php the_id(); ?>" <?php post_class( ntt_get_comments_css() ); ?> data-name="Entry">
    <div class="cr">
        <div class="entry-header header cn" data-name="Entry Header">
            <div class="cr">
                <?php
                ntt_entry_heading();
                ntt_entry_admin_actions();
                ntt_breadcrumbs_nav();
                ntt_entry_content_nav();
                ntt_entry_meta_primary();
                ntt_after_entry_meta_wp_hook();
                ntt_comments_actions_snippet();
                ntt_entry_banner();
                ntt_entry_header_aside();
                ?>
            </div>
        </div>
        <div class="entry-main main cn" data-name="Entry Main">
            <div class="cr">
                <div class="entry-content content-trunk cp" data-name="Entry Content">
                    <div class="cr">
            
                        <?php
                        if ( is_singular() || is_home() || is_archive() ) {
                            if ( has_excerpt() ) {
                                ntt_entry_summary_content();
                            }
                            ntt_entry_full_content();
                        } elseif ( is_search() ) {
                            ntt_entry_summary_content();
                        } else {
                            ntt_entry_full_content();
                        }

                        ntt_after_entry_content_wp_hook();
                        ?>
                    </div>
                </div>
                <?php ntt_entry_main_aside(); ?>
            </div>
        </div>
        
        <?php
        global $multipage;
        
        if ( is_singular() || $multipage || get_the_category_list() || get_the_tag_list() || is_active_sidebar( 'entry-footer-aside' ) ) {
            ?>
            <div class="entry-footer footer cn" data-name="Entry Footer">
                <div class="cr">
                    <?php
                    ntt_entry_content_nav();
                    ntt_entry_meta_secondary();
                    ntt_entry_footer_aside();
                    comments_template();
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</article>