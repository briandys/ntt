<?php
/**
 * Comments Navigation
 */

if ( ! function_exists( 'ntt__tag__comments_nav' ) ) {
    function ntt__tag__comments_nav() {
        
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
            ?>
            <div aria-label="<?php esc_attr_e( 'Comments', 'ntt' ); ?>" role="navigation" class="ntt--comments-nav ntt--nav ntt--cp" data-name="Comments Navigation">
                <div class="ntt--comments-nav-name ntt--nav-name ntt--obj">
                    <span class="ntt--txt"><?php esc_html_e( 'Comments Navigation', 'ntt' ); ?></span>
                </div>
                <?php
                if ( get_next_comments_link() ) {
                    $next_comments_text = __( 'Next Comments', 'ntt' );
                    ?>
                    <div class="ntt--next-comments-navi ntt--comments-navi ntt--navi ntt--obj">
                        <?php next_comments_link( '<span aria-label="'. esc_attr( $next_comments_text ).'" title="'. esc_attr( $next_comments_text ).'" class="ntt--txt">'. esc_html_x( 'Next', 'Next Comments', 'ntt' ).'</span>' ); ?>
                    </div>
                    <?php
                }
            
                if ( get_previous_comments_link() ) {
                    $previous_comments_text = __( 'Previous Comments', 'ntt' );
                    ?>
                    <div class="ntt--previous-comments-navi ntt--comments-navi ntt--navi ntt--obj">
                        <?php previous_comments_link( '<span aria-label="'. esc_attr( $previous_comments_text ).'" title="'. esc_attr( $previous_comments_text ).'" class="ntt--txt">'. esc_html_x( 'Previous', 'Previous Comments', 'ntt' ).'</span>' ); ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
    }
}