<?php
/**
 * Content
 */
?>
<article id="ntt--entry--<?php the_id(); ?>" <?php post_class( ntt_get_comments_css( 'ntt--cp' ) ); ?> data-name="Entry">
    <?php
    ntt_entry_header();
    ntt_entry_main();
    ntt_entry_footer();
    ?>
</article>