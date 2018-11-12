<?php
// Conditions depend on the nested functions
if ( get_the_posts_pagination() || get_adjacent_post() ) {
    ?>
    <div id="entity-main-footer" class="entity-main-footer cn" data-name="Entity Main Footer">
        <div class="entity-main-footer---cr">
            <?php
            ntt_entry_nav();
            ntt_entries_nav();
            ?>
        </div>
    </div>
    <?php
}
get_footer();
?>