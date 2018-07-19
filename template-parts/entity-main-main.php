<div id="entity-main-main" class="entity-main-main cn" data-name="Entity Main Main">
    <div class="entity-main-main---cr">

        <main id="content" class="cm entry-md md" data-name="Entry Module">
            <div class="cm---cr entry-md---cr">

            <?php
            if ( is_singular() ) {
                
                while ( have_posts() ) {
                    the_post();
                    ntt_entry_content();
                    comments_template();
                }
            } else {
                
                if ( have_posts() ) {
                    ?>
                    <div id="entries" class="cm-plural entries cp" data-name="Entries">
                        <div class="cm-plural---cr entries---cr">
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
        </main>

        <?php get_sidebar(); ?>
    
    </div>
</div>