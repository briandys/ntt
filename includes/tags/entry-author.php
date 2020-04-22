<?php
/**
 * Entry Author
 */

if ( ! function_exists( 'ntt__tag__entry_author' ) ) {
    function ntt__tag__entry_author() {
        ?>
        <div class="ntt--entry-author ntt--cm-author ntt--cp" data-name="Entry Author">
            <label class="ntt--entry-author-label ntt--cm-entry-author-label ntt--obj" data-name="Entry Author Label">
                <span class="ntt--txt"><?php echo apply_filters( 'ntt__wp_filter__entry_author_label', esc_html_x( 'Published by', 'Published by Author', 'ntt' ) ); ?></span>
            </label>
            
            <?php
            if ( get_option( 'show_avatars' ) == 1 ) {
                ?>
                <span class="ntt--entry-author-avatar ntt--cm-author-avatar ntt--obj" data-name="Entry Author Avatar">
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo apply_filters( 'ntt__wp_filter__entry_author_label', esc_attr_x( 'Published by', 'Published by Author', 'ntt' ) ). ' '. esc_attr( get_the_author() ); ?>">
                        <span class="ntt--img">
                            <?php
                            echo get_avatar(
                                get_the_author_meta( 'ID' ),
                                $size = apply_filters( 'ntt_author_avatar_filter', '48' ),
                                $default = '',
                                $alt = esc_attr( get_the_author() ). ' '. esc_attr__( 'Avatar', 'ntt' ),
                                $args = array( 'class' => 'u-photo', )
                                );
                            ?>
                        </span>
                    </a>
                </span>
                <?php
            }
            ?>
            <span title="<?php echo apply_filters( 'ntt__wp_filter__entry_author_label', esc_attr_x( 'Published by', 'Published by Author', 'ntt' ) ). ' '. esc_attr( get_the_author() ); ?>" class="ntt--entry-author-name ntt--cm-author-name ntt--obj">
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="p-name u-url">
                    <span class="ntt--txt"><?php echo esc_html( get_the_author() ); ?></span>
                </a>
            </span>
        </div>
        <?php
    }
}