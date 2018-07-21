<div id="entry-<?php the_id(); ?>" <?php post_class(); ?> data-name="Entry">
    <div class="cm-singular---cr entry---cr">
        <article id="entry-article-<?php the_id(); ?>" class="cm-article entry-article-<?php the_id(); ?> entry-article article cp" data-name="Entry Article">
            <div class="cm-article---cr entry-article---cr">
                <div class="cm-header entry-header header cn" data-name="Entry Header">
                    <div class="cm-header---cr entry-header---cr">

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
                
                <div class="cm-main entry-main main cn" data-name="Entry Main">
                    <div class="cm-main---cr entry-main---cr">
                        <div class="cm-content-trunk entry-content content-trunk cp" data-name="Entry Content">
                            <div class="cm-content-trunk---cr entry-content---cr">
                    
                            <?php
                            if ( is_singular() || is_home() || is_archive() ) {
                                ntt_entry_summary_content();
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
                if ( 'post' === get_post_type() && ( $multipage || get_the_tag_list() || has_action( 'ntt_entry_footer_wp_hook' ) ) ) {
                    ?>
                    <div class="cm-footer entry-footer footer cn" data-name="Entry Footer">
                        <div class="cm-footer---cr entry-footer---cr">
                            <?php
                            ntt_entry_content_nav();
                            ntt_entry_footer_wp_hook();
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