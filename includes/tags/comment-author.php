<?php
if ( ! function_exists( 'ntt_comment_author') ) {
    function ntt_comment_author( $comment, $args ) {
        
        $comment_author = get_comment_author(); ?>

        <div class="comment-author cm-author p-author h-card author cp" data-name="Comment Author">
            <div class="comment-author---cr cm-author---cr">

            <?php if ( get_comment_author_url() ) {
                $anchor_start_mu = '<a href="'. get_comment_author_url(). '" class="comment-author-name---a p-name u-url">';
                $anchor_end_mu = '</a>';
                
            } else {
                $anchor_start_mu = '';
                $anchor_end_mu = '';
            } ?>

                <span class="comment-author-glabel glabel obj" data-name="Comment Author Generic Label">
                    <span class="comment-author-glabel---txt"><?php echo esc_html_x( 'Commented by', '->Commented by<- [Comment Author Name]', 'ntt' ); ?></span>
                </span>
                
                <span class="comment-author-name cm-author-name author-name name obj" data-name="Comment Author Name">
                    <?php echo $anchor_start_mu; ?>
                        <span class="comment-author-name---l" title="<?php echo esc_attr_x( 'Commented by', '->Commented by<- [Comment Author Name]', 'ntt' ). ' '. esc_attr( $comment_author ); ?>">
                            <span class="comment-author-name---txt"><?php echo esc_html( $comment_author ); ?></span>
                        </span>
                    <?php echo $anchor_end_mu; ?>
                </span>

                <?php
                if ( get_option( 'show_avatars' ) == 1 ) {
                    ?>

                    <span class="comment-author-avatar cm-avatar author-avatar avatar obj" data-name="Comment Author Avatar" title="<?php echo esc_attr_x( 'Commented by', '->Commented by<- [Comment Author Name]', 'ntt' ). ' '. esc_attr( $comment_author ); ?>">
                        <?php echo $anchor_start_mu;
                        echo get_avatar(
                            $comment,
                            $size = '48',
                            $default = '',
                            $alt = $comment_author. ' '. 'Avatar',
                            $args = array( 'class' => 'u-photo', )
                        );
                        echo $anchor_end_mu; ?>
                    </span>

                    <?php
                }
                ?>

            </div>
        </div>
    <?php }
}