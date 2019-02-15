<?php
if ( ! function_exists( 'ntt_entry_banner' ) ) {
    function ntt_entry_banner() {

        if ( '' !== get_the_post_thumbnail() || is_active_sidebar( 'entry-banner-aside' ) ) {
            ?>
            <div class="entry-banner banner cp" data-name="Entry Banner">
                <div class="cr">

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
                    
                    <div class="entry-banner-visuals banner-visuals obj" data-name="Entry Banner Visuals">
                        <?php echo $anchor_mu_start; ?>
                            <?php the_post_thumbnail( 'ntt-large', array( 'class' => 'u-featured', ) ); ?>
                        <?php echo $anchor_mu_end; ?>
                    </div>
                    <?php
                }
                
                ntt_entry_banner_aside();
                ?>
                </div>
            </div>
            <?php
        }
    }
}