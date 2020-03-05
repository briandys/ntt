<?php
/**
 * Content
 */
?>
<article id="ntt--entry--<?php the_id(); ?>" <?php post_class( ntt__function__comments__css__getter( 'ntt--cp' ) ); ?> data-name="Entry">
    <?php
    ntt__tag__entry_header();
    ntt__tag__entry_main();
    ntt__tag__entry_footer();
    ?>
</article>