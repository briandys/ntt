<?php
if ( ! function_exists( 'ntt_comment_author') ) {
    function ntt_comment_author( $comment, $args ) {
        
        $comment_author = get_comment_author();
        ?>
        <div class="comment-author ntt--cm-author ntt--cp" data-name="Comment Author">
            <div class="comment-author---cr">

                <?php
                $commented_by_text = _x( 'Commented by', 'Commented by [Comment Author Name]', 'ntt' );
                
                if ( get_comment_author_url() ) {
                    $anchor_start_mu = '<a href="'. get_comment_author_url(). '" title="'. esc_attr( $comment_author ). '">';
                    $anchor_end_mu = '</a>';
                    $img_start_mu = $anchor_start_mu. '<span class="img">';
                    $img_end_mu = '</span>'. $anchor_end_mu;
                    
                } else {
                    $anchor_start_mu = '';
                    $anchor_end_mu = '';
                    $img_start_mu = '<span class="img">';
                    $img_end_mu = '</span>';
                }
                ?>
                <span class="comment-author-glabel ntt--obj"><?php echo esc_html( $commented_by_text); ?></span>
                <span class="comment-author-name ntt--cm-author-name ntt--obj">
                    <?php echo $anchor_start_mu; ?>
                        <span class="ntt--txt"><?php echo esc_html( $comment_author ); ?></span>
                    <?php echo $anchor_end_mu; ?>
                </span>

                <?php
                if ( get_option( 'show_avatars' ) == 1 ) {
                    ?>
                    <span class="comment-author-avatar ntt--cm-author-avatar ntt--obj" data-name="Comment Author Avatar">
                        <?php
                        echo $img_start_mu;
                        
                        echo get_avatar(
                            $comment,
                            $size = '48',
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
            </div>
        </div>
        <?php
    }
}