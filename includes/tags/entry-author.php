<?php

if ( ! function_exists( 'ntt_entry_author' ) ) {
    function ntt_entry_author() { ?>

        <?php
        $author_avatar_class = 'author-avatar-default';
        $entry_author = get_the_author();
        
        if ( get_option( 'avatar_default' ) == 'blank' ) {
            $author_avatar_type_class = $author_avatar_class . '--blank';
        } else {
            $author_avatar_type_class = $author_avatar_class . '--custom';
        }
        ?>

        <div class="cm-author entry-author <?php echo esc_attr( $author_avatar_type_class ); ?> p-author author h-card cp" data-name="Entry Author">
            <div class="cm-author---cr entry-author---cr">

                <span class="published-by-glabel glabel obj">
                    <span class="published---txt txt"><?php echo esc_html_x( 'Published', 'Component: Entry Author | Usage: >Published< by <Entry Author Name>', 'ntt' ); ?></span>
                    <span class="by---txt txt"><?php echo esc_html_x( 'by', 'Component: Entry Author | Usage: Published >by< <Entry Author Name>', 'ntt' ); ?></span>
                </span>
                
                <span class="cm-author-name entry-author-name author-name p-name name obj" data-name="Entry Author Name">
                    <a href="<?php echo esc_url ( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="entry-author-name---a u-url a" title="<?php echo esc_attr_x( 'Published by', 'Usage: >Published by< <Author Name> | Component: Entry Author Avatar', 'ntt' ). ' '. esc_attr( $entry_author ); ?>">
                        <span class="entry-author-name---l l">
                            <span class="entry-author-name---txt txt"><?php echo esc_html( $entry_author ); ?></span>
                        </span>
                    </a>
                </span>

                <?php
                if ( get_option( 'show_avatars' ) == 1 ) {
                    ?>

                    <span class="cm-avatar entry-author-avatar author-avatar avatar obj" data-name="Entry Author Avatar">
                        <a href="<?php echo esc_url ( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="entry-author-name---a a" title="<?php echo esc_attr_x( 'Published by', 'Usage: >Published by< <Author Name> | Component: Entry Author Avatar', 'ntt' ). ' '. esc_attr( $entry_author ); ?>">
                        <?php echo get_avatar(
                            get_the_author_meta( 'ID' ),
                            $size = '48',
                            $default = '',
                            $alt = esc_attr( $entry_author ). ' '. 'Avatar',
                            $args = array( 'class' => 'entry-author-avatar---img author-avatar---img avatar---img u-photo img', )
                            ); ?>
                        </a>
                    </span>

                    <?php
                }
                ?>

            </div>
        </div>
    
    <?php }
}