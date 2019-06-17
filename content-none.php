<article class="ntt--entry ntt--empty-entry ntt--cp" data-name="Empty Entry">
    <div class="entry-header header ntt--cn" data-name="Entry Header">
        <div class="ntt--entry-heading ntt--cp" data-name="Entry Heading">
            <?php ntt_before_entry_name_wp_hook(); ?>
            <h1 class="ntt--entry-name ntt--obj">
                <span class="ntt--txt"><?php esc_html_e( 'Content Not Found', 'ntt' ); ?></span>
            </h1>
            <?php ntt_after_entry_name_wp_hook(); ?>
        </div>
    </div>
    <div class="entry-main main ntt--cn" data-name="Entry Main">
        <div class="entry-main---cr">
            <div class="entry-content content-trunk ntt--cp" data-name="Entry Content">
                <div class="entry-content---cr">
                    <div class="entry-full-content e-content content ntt--cp" data-name="Entry Full Content">
                        <div class="entry-full-content---cr content---cr">
                        
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
</article>