<?php

if ( ! function_exists( 'ntt_entry_heading') ) {
    function ntt_entry_heading() {

        if ( get_the_title() ) {
            $entry_name = '<span class="entry-name---txt txt">'. get_the_title(). '</span>';
        } else {
            $entry_name = '<span class="entry---txt txt">'. _x( 'Entry', 'Object: Entry Name | Usage: >Entry< <Entry ID>', 'ntt' ). '</span>'. ' '. '<span class="entry-id---txt num txt">'. get_the_id(). '</span>';
        }
        ?>

        <div class="cm-heading entry-heading heading cp" data-name="Entry Info">
            <div class="cm-heading---cr entry-heading---cr">
            
            <?php
            $anchor_element_start = '<a href="'. esc_url( get_permalink() ). '" rel="bookmark" class="cm-name---a entry-name---a u-url a">';
            $anchor_element_end = '</a>';
            
            if ( is_singular() ) {
                $heading_level = 'h1';
            } else {
                $heading_level = 'h3';
            }
            ?>

            <<?php echo esc_attr( $heading_level ); ?> class="cm-name entry-name name obj h" data-name="Entry Name">
                <?php echo $anchor_element_start; ?>
                    <span class="entry-name---l l"><?php echo $entry_name; ?></span>
                <?php echo $anchor_element_end; ?>
            </<?php echo esc_attr( $heading_level ); ?>>

            <?php ntt_after_entry_name_wp_hook(); ?>
                    
            </div>
        </div>

        <?
    }
}