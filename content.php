<article id="entry-<?php the_id(); ?>" <?php post_class( ntt_get_comments_css() ); ?> data-name="Entry">
    <div class="entry---cr">
        <?php
        ntt_entry_header();
        ntt_entry_main();
        ntt_entry_footer();
        ?>
    </div>
</article>