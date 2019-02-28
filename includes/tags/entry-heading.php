<?php
if ( ! function_exists( 'ntt_entry_heading') ) {
    function ntt_entry_heading() {

        if ( is_singular() ) {
            $heading_level = 'h1';
            $anchor_mu_start = '';
            $anchor_mu_end = '';
        } else {
            $heading_level = 'h3';
            $anchor_mu_start = '<a href="'. esc_url( get_permalink() ). '" rel="bookmark" class="u-url">';
            $anchor_mu_end = '</a>';
        }

        // Entry Name
        if ( get_the_title() ) {
            $entry_name = '<span class="txt">'. esc_html( get_the_title() ). '</span>';
        } else {
            $entry_name = '<span class="txt">'. _x( 'Entry', 'Entry [Entry ID]', 'ntt' ). get_the_id(). '</span>';
        }
        ?>

        <div class="entry-heading cp" data-name="Entry Heading">
            <div class="entry-heading---cr">
                <<?php echo esc_attr( $heading_level ); ?> class="entry-name obj">
                    <?php echo $anchor_mu_start. $entry_name. $anchor_mu_end; ?>
                </<?php echo esc_attr( $heading_level ); ?>>

                <?php ntt_after_entry_name_wp_hook(); ?>
            </div>
        </div>
        <?php
    }
}