<div class="<?php ntt_empty_entry_css_wp_hook(); ?>" data-name="Empty Entry">
    <div class="cm-singular---cr entry---cr">

        <article class="cm-article entry-article article cp" data-name="Entry Article">
            <div class="cm-article---cr entry-article---cr">
                
                <div class="cm-header entry-header header cn" data-name="Entry Header">
                    <div class="cm-header---cr entry-header---cr">

                        <div class="cm-heading entry-heading heading cp" data-name="Entry Info">
                            <div class="cm-heading---cr entry-heading---cr">
                            
                                <h1 class="cm-name entry-name name obj h" data-name="Entry Name">
                                    <span class="entry-name---l"><?php esc_html_e( 'Content Not Found', 'ntt' ); ?></span>
                                </h1>

                                <?php ntt_after_entry_name_wp_hook(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="cm-main entry-main main cn" data-name="Entry Main">
                    <div class="cm-main---cr entry-main---cr">
                        <div class="cm-content-trunk entry-content content-trunk cp" data-name="Entry Content">
                            <div class="cm-content-trunk---cr entry-content---cr">
                    
                                <div class="entry-full-content full-content e-content content cp" data-name="Entry Full Content">
                                    <div class="entry-full-content---cr content---cr">
                                    
                                        <?php
                                        if ( is_404() ) {
                                            $search_content_esc = esc_html__( 'Please try searching.', 'ntt' );
                                        } else {
                                            $search_content_esc = esc_html__( 'Please try another search term.', 'ntt' );
                                        }
                                        ?>
                                    
                                        <p><?php esc_html_e( 'It seems we can not find what you are looking for.', 'ntt' ); ?></p>
                                        <p><?php echo $search_content_esc; ?></p>
                                    
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