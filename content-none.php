<article class="entry empty-entry cp" data-name="Empty Entry">
    <div class="entry---cr">
        <div class="entry-header header cn" data-name="Entry Header">
            <div class="entry-header---cr">
                <div class="entry-heading cp" data-name="Entry Heading">
                    <div class="entry-heading---cr">
                        <h1 class="entry-name obj"><?php esc_html_e( 'Content Not Found', 'ntt' ); ?></h1>

                        <?php ntt_after_entry_name_wp_hook(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="entry-main main cn" data-name="Entry Main">
            <div class="entry-main---cr">
                <div class="entry-content content-trunk cp" data-name="Entry Content">
                    <div class="entry-content---cr">
                        <div class="entry-full-content e-content content cp" data-name="Entry Full Content">
                            <div class="entry-full-content---cr">
                            
                                <?php
                                if ( is_404() ) {
                                    $search_suggestion_content = __( 'Please try searching.', 'ntt' );
                                } else {
                                    $search_suggestion_content = __( 'Please try another search term.', 'ntt' );
                                }
                                ?>
                            
                                <p><?php esc_html_e( 'It seems we can not find what you are looking for.', 'ntt' ); ?></p>
                                <p><?php echo esc_html( $search_suggestion_content ); ?></p>
                            
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>