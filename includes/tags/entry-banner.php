<?php
if ( ! function_exists( 'ntt_entry_banner' ) ) {
    function ntt_entry_banner() {

        if ( '' !== get_the_post_thumbnail() ) {
            ?>
            <div class="entry-banner cp" data-name="Entry Banner">
                <div class="entry-banner---cr">

                <?php
                if ( '' !== get_the_post_thumbnail() ) {

                    if ( is_singular() ) {
                        $anchor_mu_start = '';
                        $anchor_mu_end = '';
                    } else {
                        $anchor_mu_start = '<a href="'. esc_url( get_permalink() ). '" rel="bookmark" class="u-url">';
                        $anchor_mu_end = '</a>';
                    }
                    ?>
                    
                    <div class="entry-banner-visuals obj" data-name="Entry Banner Visuals">
                        <?php
                        echo $anchor_mu_start;
                            
                        if ( is_singular() ) {
                            $featured_image_size = 'ntt-large';
                        } else {
                            $featured_image_size = 'ntt-small';
                        }

                        the_post_thumbnail( $featured_image_size, array( 'class' => 'u-featured', ) );
                        
                        echo $anchor_mu_end;
                        ?>
                    </div>
                    <?php
                }
                ?>
                </div>
            </div>
            <?php
        }
    }
}