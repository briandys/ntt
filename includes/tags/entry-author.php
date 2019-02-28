<?php
if ( ! function_exists( 'ntt_entry_author' ) ) {
    function ntt_entry_author() {
        
        $entry_author = get_the_author();
        ?>
        <div class="entry-author cm-author cp" data-name="Entry Author">
            <div class="entry-author---cr">
                <span class="entry-author-glabel obj">
                    <span class="published---text"><?php echo esc_html_x( 'Published', 'Published by [Entry Author Name]', 'ntt' ); ?></span>
                    <span class="by---text"><?php echo esc_html_x( 'by', 'Published by [Entry Author Name]', 'ntt' ); ?></span>
                </span>
                <span class="entry-author-name cm-author-name obj">
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr_x( 'Published by', 'Published by [Entry Author Name]', 'ntt' ). ' '. esc_attr( $entry_author ); ?>" class="u-url">
                        <span class="txt"><?php echo esc_html( $entry_author ); ?></span>
                    </a>
                </span>

                <?php
                if ( get_option( 'show_avatars' ) == 1 ) {
                    ?>
                    <span class="entry-author-avatar cm-author-avatar obj" data-name="Entry Author Avatar">
                        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr_x( 'Published by', 'Published by [Entry Author Name]', 'ntt' ). ' '. esc_attr( $entry_author ); ?>">
                            <?php
                            echo get_avatar(
                                get_the_author_meta( 'ID' ),
                                $size = '48',
                                $default = '',
                                $alt = esc_attr__( 'Avatar', 'ntt' ),
                                $args = array( 'class' => 'u-photo', )
                                );
                            ?>
                        </a>
                    </span>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }
}