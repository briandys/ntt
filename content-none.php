<?php
/**
 * Content None
 * 
 * Displayed for No Search Results and 404 Page
 */
?>
<article class="ntt--entry ntt--empty-entry ntt--cp" data-name="Empty Entry">
    <div class="entry-header header ntt--cn" data-name="Entry Header">
        <div class="ntt--entry-heading ntt--cp" data-name="Entry Heading">
            <?php ntt_before_entry_name_wp_hook(); ?>
            <h1 class="ntt--entry-name ntt--obj">
                <?php
                if ( is_search() ) {
                    $entry_name = __( 'No Search Result', 'ntt' );
                } else {
                    $entry_name = __( 'Content Not Found', 'ntt' );
                }
                ?>
                <span class="ntt--txt"><?php echo esc_html( $entry_name ); ?></span>
            </h1>
            <?php ntt_after_entry_name_wp_hook(); ?>
        </div>
    </div>
    <div class="ntt--entry-main ntt--cn" data-name="Entry Main">
        <div class="ntt--entry-content ntt--content-trunk ntt--cp" data-name="Entry Content">
            <div class="ntt--entry-full-content e-content ntt--content ntt--cp" data-name="Entry Full Content">
                <?php
                if ( is_search() ) {
                    $suggestion_content = __( 'Please try another search term.', 'ntt' );
                } else {
                    $suggestion_content = __( 'Please try Search:', 'ntt' );
                }
                ?>
                <p><?php esc_html_e( 'It seems we can not find what you are looking for.', 'ntt' ); ?></p>
                <p><?php echo esc_html( $suggestion_content ); ?></p>
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</article>