<?php
/**
 * Entry Banner
 */

if ( ! function_exists( 'ntt__tag__entry_banner' ) ) {
    function ntt__tag__entry_banner() {

        if ( get_the_post_thumbnail() !== '' ) {
            ?>
            <div class="ntt--entry-banner ntt--cp" data-name="Entry Banner">
                <?php
                if ( is_singular() ) {
                    $anchor_mu_start = '';
                    $anchor_mu_end = '';
                } else {
                    $anchor_mu_start = '<a href="'. esc_url( get_permalink() ). '" rel="bookmark" class="u-url">';
                    $anchor_mu_end = '</a>';
                }
                ?>
                
                <figure class="ntt--entry-banner-visuals ntt--obj" data-name="Entry Banner Visuals">
                    <?php
                    if ( is_singular() ) {
                        $featured_image_size = 'ntt-large';
                    } else {
                        $featured_image_size = 'ntt-large';
                    }

                    echo $anchor_mu_start;
                    the_post_thumbnail( apply_filters( 'ntt__wp_filter__entry_banner_visuals_featured_image_size', $featured_image_size ), array( 'class' => 'u-featured', ) );
                    echo $anchor_mu_end;

                    if ( get_the_post_thumbnail_caption() !== '' ) {
                        ?>
                        <figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
                    <?php
                    }
                    ?>
                </figure>
            </div>
            <?php
        }
    }
}