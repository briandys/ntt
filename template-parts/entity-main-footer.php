<?php
if ( ( ( is_single() || is_page() ) && ( get_adjacent_post( false, '', false ) && get_adjacent_post( false, '', true ) ) ) || get_the_posts_pagination() ) {
    ?>
    <div id="entity-main-footer" class="entity-main-footer footer cn" data-name="Entity Main Footer">
        <div class="cr">
            
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