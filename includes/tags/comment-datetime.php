<?php
/**
 * Comment DateTime
 */

if ( ! function_exists( 'ntt__tag__comment_datetime') ) {
    function ntt__tag__comment_datetime( $comment ) {
        
        $comment_url = get_comment_link( $comment->comment_ID );
        
        // [Variables] Published DateTime
        $commented_on_text = __( 'Commented on', 'ntt' );
        $published_day_text = get_comment_date( 'j' );
        $published_month_text = get_comment_date( apply_filters( 'ntt__wp_filter__cm_datetime_month', 'F' ) );
        $published_year_text = get_comment_date( 'Y' );
        $published_hour_text = get_comment_time( 'H' );
        $published_minute_text = get_comment_time( 'i' );
        $published_second_text = get_comment_time( 's' );
        ?>
        
        <div class="ntt--comment-datetime ntt--cm-datetime-trunk ntt--cp" data-name="Comment DateTime">
            <div class="ntt--comment-published-datetime ntt--cm-datetime ntt--cp" data-name="Comment Published DateTime">
                <label class="ntt--comment-published-datetime-label ntt--obj" data-name="Comment Published DateTime Label">
                    <span class="ntt--txt"><?php echo esc_html( $commented_on_text ); ?></span>
                </label>
                <time datetime="<?php echo esc_attr( get_comment_date( DATE_W3C ) ); ?>" class="ntt--comment-published-date ntt--cm-date ntt--obj dt-published" data-name="Comment Published Date">
                    <a href="<?php echo esc_attr( $comment_url ); ?>" title="<?php echo esc_attr( $commented_on_text. ' '. $published_day_text. ' '. $published_month_text. ' '. $published_year_text. ','. ' '. $published_hour_text. ':'. $published_minute_text. ':'. $published_second_text ); ?>">
                        <span class="ntt--txt">
                            <span class="ntt--day-txt"><?php echo esc_html( $published_day_text ); ?></span>
                            <span class="ntt--month-txt"><?php echo esc_html( $published_month_text ); ?></span>
                            <span class="ntt--year-txt"><?php echo esc_html( $published_year_text ); ?></span>
                        </span>
                    </a>
                </time>
                <span class="ntt--comment-published-time ntt--cm-time ntt--obj" data-name="Comment Published Time">
                    <a href="<?php echo esc_attr( $comment_url ); ?>" title="<?php echo esc_attr( $commented_on_text. ' '. $published_day_text. ' '. $published_month_text. ' '. $published_year_text. ','. ' '. $published_hour_text. ':'. $published_minute_text. ':'. $published_second_text ); ?>">
                        <span class="ntt--txt">
                            <span class="ntt--hour-txt"><?php echo esc_html( $published_hour_text ); ?></span><span class="ntt--delimiter-txt">:</span><span class="ntt--minute-txt"><?php echo esc_html( $published_minute_text ); ?></span><span class="ntt--delimiter-txt">:</span><span class="ntt--second-txt"><?php echo esc_html( $published_second_text ); ?></span>
                        </span>
                    </a>
                </span>
            </div>
        </div>
        <?php
    }
}