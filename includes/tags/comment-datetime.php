<?php

if ( ! function_exists( 'ntt_comment_datetime') ) {
    function ntt_comment_datetime( $comment ) {
        
        $comment_url = get_comment_link( $comment->comment_ID ); ?>
        
        <div class="comment-datetime datetime-trunk cm-datetime-trunk cp" data-name="Comment DateTime">
            <div class="comment-datetime---cr cm-datetime-trunk---cr">
                <div class="comment-published-datetime published-datetime cm-datetime datetime cp" data-name="Comment Published DateTime">
                    <div class="comment-published-datetime---cr cm-datetime---cr">

                        <?php $day_text = get_comment_date( 'j' );
                        $month_text = get_comment_date( apply_filters( 'ntt_cm_datetime_month_wp_filter', 'F' ) );
                        $year_text = get_comment_date( 'Y' );
                        $date_title_attr = $day_text. ' '. $month_text. ' '. $year_text;
                        $date_mu = '<span class="day---txt">'. $day_text. '</span>'. ' '. '<span class="month---txt">'. $month_text. '</span>'. ' '. '<span class="year---txt">'. $year_text. '</span>';
                        
                        $hour_text = get_comment_time( 'H' );
                        $minute_text = get_comment_time( 'i' );
                        $second_text = get_comment_time( 's' );
                        $time_title_attr = $hour_text. ':'. $minute_text. ':'. $second_text;
                        $time_mu = '<span class="hour---txt">'. $hour_text. '</span>'. '<span class="colon---text">:</span>'. '<span class="minute---txt">'. $minute_text. '</span>'. '<span class="colon---text">:</span>'. '<span class="second---txt">'. $second_text. '</span>'; ?>

                        <span class="comment-published-datetime-glabel glabel obj" data-name="Comment Published DateTime Generic Label">
                            <span class="commented-on---text"><?php echo esc_html_x( 'Commented on', 'Component: DateTime | Usage: >Commented on< <date>', 'ntt' ); ?></span>
                        </span>

                        <time datetime="<?php echo get_comment_date( DATE_W3C ); ?>" class="comment-published-date dt-published published-date cm-date date obj time" data-name="Comment Published Date">
                            <a href="<?php echo esc_url( $comment_url ); ?>" title="<?php echo esc_attr_x( 'Commented on', 'Component: DateTime | Usage: >Commented on< <date>', 'ntt' ). ' '. esc_attr( $date_title_attr ); ?>" class="comment-published-date---a">
                                <span class="comment-published-date---l">
                                <?php echo $date_mu; ?>
                                </span>
                            </a>
                        </time>
                        
                        <span class="comment-published-time published-time cm-time time obj" data-name="Comment Published Time">
                            <a href="<?php echo esc_url( $comment_url ); ?>" title="<?php echo esc_attr_x( 'Commented at', 'Component: DateTime | Usage: >Commented at< <time>', 'ntt' ). ' '. esc_attr( $time_title_attr ); ?>" class="comment-published-time---a">
                                <span class="comment-published-time---l">
                                <?php echo $time_mu; ?>
                                </span>
                            </a>
                        </span>

                    </div>
                </div>
            </div>
        </div>
    <?php }
}