<?php
/**
 * Entity Main Main
 */
?>
<div class="ntt--entity-main-main ntt--cn" data-name="Entity Main Main">
    <div id="content" class="ntt--entry-md ntt--cm ntt--md" data-name="Entry Module">
        <?php
        if ( is_singular() ) {
            
            while ( have_posts() ) {
                the_post();
                ntt__tag__entry_content();
            }
        } else {
            
            if ( have_posts() ) {
                ?>
                <div class="ntt--entries ntt--cp" data-name="Entries">
                    <?php
                    while ( have_posts() ) {
                        the_post();
                        ntt__tag__entry_content();
                    }
                    ?>
                </div>
                <?php
            } else {
                get_template_part( 'content', 'none' );
            }
        }
        ?>
    </div>
    <?php get_sidebar(); ?>
</div>