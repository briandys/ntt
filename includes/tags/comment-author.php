<?php
if ( ! function_exists( 'ntt_comment_author') ) {
    function ntt_comment_author( $comment, $args ) {
        
        $comment_author = get_comment_author();
        ?>

        <div class="comment-author cm-author cp" data-name="Comment Author">
            <div class="comment-author---cr">

                <?php
                $commented_by_text = _x( 'Commented by', 'Commented by [Comment Author Name]', 'ntt' );
                
                if ( get_comment_author_url() ) {
                    $text_label_start_mu = '<a href="'. get_comment_author_url(). '" title="'. esc_attr( $commented_by_text ). ' '. esc_attr( $comment_author ). '" class="p-name u-url"><span class="txt">';
                    $text_label_end_mu = '</span></a>';
                    $image_label_start_mu = $text_label_start_mu;
                    $image_label_end_mu = $text_label_end_mu;
                    
                } else {
                    $text_label_start_mu = '';
                    $text_label_end_mu = '';
                    $image_label_start_mu = '';
                    $image_label_end_mu = '';
                }
                ?>
                <span class="comment-author-glabel obj"><?php echo esc_html( $commented_by_text); ?></span>
                <span class="comment-author-name cm-author-name obj"><?php echo $text_label_start_mu. esc_html( $comment_author ). $text_label_end_mu; ?></span>

                <?php
                if ( get_option( 'show_avatars' ) == 1 ) {
                    ?>

                    <span class="comment-author-avatar cm-author-avatar obj" data-name="Comment Author Avatar" title="<?php echo esc_attr( $commented_by_text ). ' '. esc_attr( $comment_author ); ?>">
                        <?php
                        echo $image_label_start_mu.
                        get_avatar(
                            $comment,
                            $size = '48',
                            $default = '',
                            $alt = esc_attr__( 'Avatar', 'ntt' ),
                            $args = array( 'class' => 'u-photo', )
                        ).
                        $image_label_end_mu;
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