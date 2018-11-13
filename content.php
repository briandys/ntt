<div id="entry-<?php the_id(); ?>" <?php post_class(); ?> data-name="Entry">
    <div class="entry---cr cm-singular---cr">
        <article id="entry-article-<?php the_id(); ?>" class="entry-article-<?php the_id(); ?> entry-article cm-article article cp" data-name="Entry Article">
            <div class="entry-article---cr cm-article---cr">
                <div class="entry-header cm-header header cn" data-name="Entry Header">
                    <div class="entry-header---cr cm-header---cr ">

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
                
                <div class="entry-main cm-main main cn" data-name="Entry Main">
                    <div class="entry-main---cr cm-main---cr">
                        <div class="entry-content cm-content-trunk content-trunk cp" data-name="Entry Content">
                            <div class="entry-content---cr cm-content-trunk---cr">
                    
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

                        <?php
                        ntt_entry_main_aside();
                        comments_template();
                        ?>
                    </div>
                </div>

                <?php
                global $multipage;
                if ( 'post' === get_post_type() && ( $multipage || get_the_tag_list() || is_active_sidebar( 'entry-footer-aside' ) ) ) {
                    ?>
                    <div class="entry-footer cm-footer footer cn" data-name="Entry Footer">
                        <div class="entry-footer---cr cm-footer---cr">
                            <?php
                            ntt_entry_content_nav();
                            ntt_entry_meta_secondary();
                            ntt_entry_footer_aside();
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </article>
    </div>
</div>