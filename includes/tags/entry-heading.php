<?php
/**
 * Entry Heading
 */

if ( ! function_exists( 'ntt__tag__entry_heading') ) {
    function ntt__tag__entry_heading() {

        if ( is_singular() ) {
            $heading_level = 'h1';
            $anchor_mu_start = '';
            $anchor_mu_end = '';
        } else {
            $heading_level = 'h3';
            $anchor_mu_start = '<a href="'. esc_url( get_permalink() ). '" rel="bookmark" class="u-url">';
            $anchor_mu_end = '</a>';
        }

        if ( get_the_title() ) {
            $entry_name = '<span class="ntt--txt">'. esc_html( get_the_title() ). '</span>';
        } else {
            $entry_name = '<span class="ntt--txt">'. esc_html_x( 'Entry', 'Entry ID', 'ntt' ). ' '. esc_html( get_the_id() ). '</span>';
        }
        ?>
        <div class="ntt--entry-heading ntt--cp" data-name="Entry Heading">
            <?php
            ntt__wp_hook__entry_name___before();
            echo '<'. esc_attr( $heading_level ). ' '. 'class="ntt--entry-name ntt--obj" data-name="Entry Name">';
            echo $anchor_mu_start. $entry_name. $anchor_mu_end;
            echo '</'. esc_attr( $heading_level ). '>';
            ntt__wp_hook__entry_name___after();
            ?>
        </div>
        <?php
    }
}