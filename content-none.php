<div class="<?php ntt_empty_entry_css_wp_hook(); ?>" data-name="Empty Entry">
    <div class="entry---cr cm-singular---cr">

        <article class="entry-article cm-article cp" data-name="Entry Article">
            <div class="entry-article---cr cm-article---cr">
                
                <div class="entry-header cm-header header cn" data-name="Entry Header">
                    <div class="entry-header---cr cm-header---cr">

                        <div class="entry-heading cm-heading cp" data-name="Entry Heading">
                            <div class="entry-heading---cr cm-heading---cr">
                            
                                <h1 class="entry-name cm-name obj h" data-name="Entry Name">
                                    <span class="txt"><?php esc_html_e( 'Content Not Found', 'ntt' ); ?></span>
                                </h1>

                                <?php ntt_after_entry_name_wp_hook(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="cm-main entry-main main cn" data-name="Entry Main">
                    <div class="cm-main---cr entry-main---cr">
                        <div class="entry-content cm-content-trunk content-trunk cp" data-name="Entry Content">
                            <div class="entry-content---cr cm-content-trunk---cr">
                    
                                <div class="entry-full-content full-content e-content content cp" data-name="Entry Full Content">
                                    <div class="entry-full-content---cr content---cr">
                                    
                                        <?php
                                        if ( is_404() ) {
                                            $search_suggestion_content = esc_html__( 'Please try searching.', 'ntt' );
                                        } else {
                                            $search_suggestion_content = esc_html__( 'Please try another search term.', 'ntt' );
                                        }
                                        ?>
                                    
                                        <p><?php esc_html_e( 'It seems we can not find what you are looking for.', 'ntt' ); ?></p>
                                        <p><?php echo $search_suggestion_content; ?></p>
                                    
                                        <?php get_search_form(); ?>
                                    </div>
                                </div>
                            
                            </div>
                        </div>

                        <?php ntt_entry_main_aside(); ?>
                    </div>
                </div>
            </div>
        </article>

    </div>
</div>