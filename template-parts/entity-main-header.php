<?php get_header(); ?>
<div id="entity-main-header" class="entity-main-header cn" data-name="Entity Main Header">
    <div class="entity-main-header---cr">
        <div class="entity-view-info info cp" data-name="Entity View Info">
            <div class="entity-view-info---cr">
                <?php ntt_entity_view_name(); ?>
            </div>
        </div>
        <?php
        ntt_entry_nav();
        ntt_entries_nav();
        ntt_entity_main_header_aside();
        ?>
    </div>
</div>