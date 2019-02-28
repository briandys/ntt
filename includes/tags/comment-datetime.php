<?php
if ( ! function_exists( 'ntt_comment_datetime') ) {
    function ntt_comment_datetime( $comment ) {
        
        $comment_url = get_comment_link( $comment->comment_ID );
        ?>
        
        <div class="comment-datetime cm-datetime-trunk cp" data-name="Comment DateTime">
            <div class="comment-datetime---cr">
                <div class="comment-published-datetime cm-datetime cp" data-name="Comment Published DateTime">
                    <div class="comment-published-datetime---cr">

                        <?php
                        // Date
                        $day_text = get_comment_date( 'j' );
                        $month_text = get_comment_date( apply_filters( 'ntt_cm_datetime_month_wp_filter', 'F' ) );
                        $year_text = get_comment_date( 'Y' );
                        
                        $date_title_attr = $day_text. ' '. $month_text. ' '. $year_text;
                        
                        $date_mu = '<span class="day---txt">'. esc_html( $day_text ). '</span>';
                        $date_mu .= ' '. '<span class="month---txt">'. esc_html( $month_text ). '</span>';
                        $date_mu .= ' '. '<span class="year---txt">'. esc_html( $year_text ). '</span>';
                        
                        // Time
                        $hour_text = get_comment_time( 'H' );
                        $minute_text = get_comment_time( 'i' );
                        $second_text = get_comment_time( 's' );
                        $delimeter_mu = '<span class="delimiter---txt">:</span>';
                        
                        $time_title_attr = $hour_text. ':'. $minute_text. ':'. $second_text;
                        
                        $time_mu = '<span class="hour---txt">'. esc_html( $hour_text ). '</span>';
                        $time_mu .= $delimeter_mu;
                        $time_mu .= '<span class="minute---txt">'. esc_html( $minute_text ). '</span>';
                        $time_mu .= $delimeter_mu;
                        $time_mu .= '<span class="second---txt">'. esc_html( $second_text ). '</span>';
                        ?>

                        <span class="comment-published-datetime-glabel obj"><?php echo esc_html_x( 'Commented on', 'Commented on [date]', 'ntt' ); ?></span>

                        <time datetime="<?php echo esc_attr( get_comment_date( DATE_W3C ) ); ?>" class="comment-published-date cm-date dt-published obj" data-name="Comment Published Date">
                            <a href="<?php echo esc_url( $comment_url ); ?>" title="<?php echo esc_attr_x( 'Commented on', 'Commented on [date]', 'ntt' ). ' '. esc_attr( $date_title_attr ); ?>">
                                <?php echo $date_mu; ?>
                            </a>
                        </time>
                        
                        <span class="comment-published-time cm-time obj" data-name="Comment Published Time">
                            <a href="<?php echo esc_url( $comment_url ); ?>" title="<?php echo esc_attr_x( 'Commented at', 'Commented at [time]', 'ntt' ). ' '. esc_attr( $time_title_attr ); ?>">
                                <?php echo $time_mu; ?>
                            </a>
                        </span>

                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}