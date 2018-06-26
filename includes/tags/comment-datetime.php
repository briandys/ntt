<?php

if ( ! function_exists( 'ntt_comment_datetime') ) {
    function ntt_comment_datetime( $comment ) {
        
        $comment_url = get_comment_link( $comment->comment_ID ); ?>
        
        <div class="cm-datetime-trunk comment-datetime datetime-trunk cp" data-name="Comment DateTime">
            <div class="cm-datetime-trunk---cr comment-datetime---cr">
                <div class="cm-datetime comment-published-datetime published-datetime datetime cp" data-name="Comment Published DateTime">
                    <div class="cm-datetime---cr comment-published-datetime---cr">

                        <?php $day_text = get_comment_date( 'j' );
                        $month_text = get_comment_date( apply_filters( 'ntt_cm_datetime_year', 'F' ) );
                        $year_text = get_comment_date( 'Y' );
                        $date_title_attr = $day_text. ' '. $month_text. ' '. $year_text;
                        $date_mu = '<span class="day---txt txt">'. $day_text. '</span>'. ' '. '<span class="month---txt txt">'. $month_text. '</span>'. ' '. '<span class="year---txt txt">'. $year_text. '</span>';
                        
                        $hour_text = get_comment_time( 'H' );
                        $minute_text = get_comment_time( 'i' );
                        $second_text = get_comment_time( 's' );
                        $time_title_attr = $hour_text. ':'. $minute_text. ':'. $second_text;
                        $time_mu = '<span class="hour---txt txt">'. $hour_text. '</span>'. '<span class="colon---txt txt">:</span>'. '<span class="minute---txt txt">'. $minute_text. '</span>'. '<span class="colon---txt txt">:</span>'. '<span class="second---txt txt">'. $second_text. '</span>'; ?>

                        <span class="comment-published-on-glabel glabel obj"><span class="published---txt txt"><?php esc_html_e( 'Commented', 'ntt' ); ?></span> <span class="on---txt txt"><?php esc_html_e( 'on', 'ntt' ); ?></span></span>

                        <time datetime="<?php echo get_comment_date( DATE_W3C ); ?>" class="cm-date comment-published-date dt-published published-date date obj time">
                            <a href="<?php echo esc_url( $comment_url ); ?>" title="<?php echo esc_attr( $date_title_attr ); ?>" class="comment-published-date---a a">
                                <span class="comment-published-date---l l">
                                <?php echo $date_mu; ?>
                                </span>
                            </a>
                        </time>

                        <span class="comment-at-glabel glabel obj">
                            <span class="at---txt txt"><?php echo esc_html_x( 'at', 'Component: DateTime | Usage: Published on <date> >at< <time>', 'ntt' ); ?></span>
                        </span>
                        
                        <span class="cm-time comment-published-time published-time time obj">
                            <a href="<?php echo esc_url( $comment_url ); ?>" title="<?php echo esc_attr( $time_title_attr ); ?>" class="comment-published-time---a a">
                                <span class="comment-published-time---l l">
                                <?php echo $time_mu; ?>
                                </span>
                            </a>
                        </time>

                    </div>
                </div>
            </div>
        </div>
    <?php }
}