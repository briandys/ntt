<?php get_header(); ?>
<div id="entity-main-header" class="entity-main-header cn" data-name="Entity Main Header">
    <div class="ntt-main-header---cr">
        <div class="view-heading heading cp" data-name="View Heading">
            <div class="view-heading---cr">
                <?php ntt_view_name(); ?>
            </div>
        </div>
        <?php
        ntt_entry_nav();
        ntt_entries_nav();
        ntt_entity_main_header_aside();
        ?>
    </div>
</div>