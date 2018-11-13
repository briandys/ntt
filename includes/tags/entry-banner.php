<?php

if ( ! function_exists( 'ntt_entry_banner' ) ) {
    function ntt_entry_banner() {

        if ( '' !== get_the_post_thumbnail() || is_active_sidebar( 'entry-banner-aside' ) ) {
            ?>
            <div class="entry-banner cm-banner banner cp" data-name="Entry Banner">
                <div class="entry-banner---cr cm-banner---cr">

                <?php
                if ( '' !== get_the_post_thumbnail() ) {
                    ?>
                    <div class="entry-banner-visuals cm-banner-visuals banner-visuals visuals obj" data-name="Entry Banner Visuals">
                        <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" class="entry-banner-visuals---a cm-banner-visuals---a u-url a">
                            <?php the_post_thumbnail( 'ntt-large', array( 'class' => 'entry-banner-visuals---img cm-banner-visuals---img banner-visuals---img visuals---img u-featured img', ) ); ?>
                        </a>
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