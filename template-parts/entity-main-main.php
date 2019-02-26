<div id="entity-main-main" class="entity-main-main main cn" data-name="Entity Main Main">
    <div class="entity-main-main---cr">
        <div id="content" class="entry-md cm md" data-name="Entry Module">
            <div class="cr">

                <?php
                if ( is_singular() ) {
                    
                    while ( have_posts() ) {
                        the_post();
                        ntt_entry_content();
                    }
                } else {
                    
                    if ( have_posts() ) {
                        ?>
                        <div id="entries" class="entries cp" data-name="Entries">
                            <div class="entries---cr">
                                <?php
                                while ( have_posts() ) {
                                    the_post();
                                    ntt_entry_content();
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    } else {
                        get_template_part( 'content', 'none' );
                    }
                }
                ?>
            </div>
        </div>

        <?php get_sidebar(); ?>
    </div>
</div>