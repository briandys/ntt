<?php
/**
 * Entry Trimmed Content
 */
if ( ! function_exists( 'ntt__tag__entry_trimmed_content' ) ) {
    
    function ntt__tag__entry_trimmed_content() {
        $content = get_the_content();
        $content = strip_shortcodes( $content );
        $content = wp_trim_words( $content, 12 );    
        ?>
        <div class="ntt--entry-trimmed-content ntt--content ntt--cm--content e-content ntt--cp" data-name="Entry Trimmed Content">
            <?php echo $content. ntt__function__show_more_action(); ?>
        </div>
    <?php
    }
}