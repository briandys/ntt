<?php
/**
 * Comment Author
 */

if ( ! function_exists( 'ntt__tag__comment_author') ) {
    function ntt__tag__comment_author( $comment, $args ) {
        ?>
        <div class="ntt--comment-author ntt--cm-author ntt--cp" data-name="Comment Author">
            <label class="ntt--comment-author-label ntt--obj">
                <span class="ntt--txt"><?php echo apply_filters( 'ntt_comment_author_label_filter', esc_html_x( 'Commented by', 'Commented by Author', 'ntt' ) ); ?></span>
            </label>
            
            <?php
            if ( get_comment_author_url() ) {
                $link_start_mu = '<a href="'. get_comment_author_url(). '" class="p-name u-url">';
                $link_end_mu = '</a>';
                $img_start_mu = $link_start_mu. '<span class="ntt--img">';
                $img_end_mu = '</span>'. $link_end_mu;
            } else {
                $link_start_mu = '';
                $link_end_mu = '';
                $img_start_mu = '<span class="ntt--img">';
                $img_end_mu = '</span>';
            }

            if ( get_option( 'show_avatars' ) == 1 ) {
                ?>
                <span title="<?php echo apply_filters( 'ntt_comment_author_label_filter', esc_html_x( 'Commented by', 'Commented by Author', 'ntt' ) ). ' '. esc_attr( get_comment_author() ); ?>" class="ntt--comment-author-avatar ntt--cm-author-avatar ntt--obj" data-name="Comment Author Avatar">
                    <?php
                    echo $img_start_mu;
                    echo get_avatar(
                        $comment,
                        $size = apply_filters( 'ntt_author_avatar_filter', '48' ),
                        $default = '',
                        $alt = esc_attr__( 'Avatar', 'ntt' ),
                        $args = array( 'class' => 'u-photo', )
                    );
                    echo $img_end_mu;
                    ?>
                </span>
                <?php
            }
            ?>
            <span title="<?php echo apply_filters( 'ntt_comment_author_label_filter', esc_html_x( 'Commented by', 'Commented by Author', 'ntt' ) ). ' '. esc_attr( get_comment_author() ); ?>" class="ntt--comment-author-name ntt--cm-author-name ntt--obj">
                <?php echo $link_start_mu; ?><span class="ntt--txt"><?php echo esc_html( get_comment_author() ); ?></span><?php echo $link_end_mu; ?>
            </span>
        </div>
        <?php
    }
}