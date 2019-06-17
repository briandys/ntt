<?php
/**
 * Entry DateTime
 */

if ( ! function_exists( 'ntt_entry_datetime' ) ) {
    function ntt_entry_datetime() {
        
        // [Variables] Published DateTime
        $published_on_text = apply_filters( 'ntt_entry_published_datetime_label_wp_filter', __( 'Published on', 'ntt' ) );
        $published_day_txt = get_the_date( 'j' );
        $published_month_txt = get_the_date( apply_filters( 'ntt_cm_datetime_month_wp_filter', 'F' ) );
        $published_year_txt = get_the_date( 'Y' );
        $published_hour_txt = get_the_date( 'H' );
        $published_minute_txt = get_the_date( 'i' );
        $published_second_txt = get_the_date( 's' );

        // [Variables] Modified DateTime
        $updated_on_text = apply_filters( 'ntt_entry_modified_datetime_label_wp_filter', __( 'Updated on', 'ntt' ) );
        $modified_day_txt = get_the_modified_time( 'j' );
        $modified_month_txt = get_the_modified_time( apply_filters( 'ntt_cm_datetime_month_wp_filter', 'F' ) );
        $modified_year_txt = get_the_modified_time( 'Y' );
        $modified_hour_txt = get_the_modified_time( 'H' );
        $modified_minute_txt = get_the_modified_time( 'i' );
        $modified_second_txt = get_the_modified_time( 's' );
        ?>              

        <div class="ntt--entry-datetime ntt--cm-datetime-trunk ntt--cp" data-name="Entry DateTime">
            <div class="ntt--entry-published-datetime ntt--cm-datetime ntt--cp" data-name="Entry Published DateTime">
                <label class="ntt--entry-published-datetime-label ntt--obj" data-name="Entry Published DateTime Label">
                    <span class="ntt--txt"><?php echo esc_html( $published_on_text ); ?></span>
                </label>
                <time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>" class="ntt--entry-published-date ntt--cm-date dt-published ntt--obj" data-name="Entry Published Date">
                    <a href="<?php echo esc_attr( get_permalink() ); ?>" title="<?php echo esc_attr( $published_on_text. ' '. $published_day_txt. ' '. $published_month_txt. ' '. $published_year_txt. ','. ' '. $published_hour_txt. ':'. $published_minute_txt. ':'. $published_second_txt ); ?>">
                        <span class="ntt--txt">
                            <span class="day-txt"><?php echo esc_html( $published_day_txt ); ?></span>
                            <span class="month-txt"><?php echo esc_html( $published_month_txt ); ?></span>
                            <span class="year-txt"><?php echo esc_html( $published_year_txt ); ?></span>
                        </span>
                    </a>
                </time>
                <span class="ntt--entry-published-time ntt--cm-time ntt--obj" data-name="Entry Published Time">
                    <a href="<?php echo esc_attr( get_permalink() ); ?>" title="<?php echo esc_attr( $published_on_text. ' '. $published_day_txt. ' '. $published_month_txt. ' '. $published_year_txt. ','. ' '. $published_hour_txt. ':'. $published_minute_txt. ':'. $published_second_txt ); ?>">
                        <span class="ntt--txt">
                            <span class="hour-txt"><?php echo esc_html( $published_hour_txt ); ?></span><span class="delimiter-txt">:</span><span class="minute-txt"><?php echo esc_html( $published_minute_txt ); ?></span><span class="delimiter-txt">:</span><span class="second-txt"><?php echo esc_html( $published_second_txt ); ?></span>
                        </span>
                    </a>
                </span>
            </div>
            <div class="ntt--entry-modified-datetime ntt--cm-datetime ntt--cp" data-name="Entry Modified DateTime">
                <label class="ntt--entry-modified-datetime-label ntt--obj" data-name="Entry Modified DateTime Label">
                    <span class="ntt--txt"><?php echo esc_html( $updated_on_text ); ?></span>
                </label>
                <time datetime="<?php echo esc_attr( get_the_modified_time( DATE_W3C ) ); ?>" class="ntt--entry-modified-date ntt--cm-date ntt--obj" data-name="Entry Modified Date">
                    <a href="<?php echo esc_attr( get_permalink() ); ?>" title="<?php echo esc_attr( $updated_on_text. ' '. $modified_day_txt. ' '. $modified_month_txt. ' '. $modified_year_txt. ','. ' '. $modified_hour_txt. ':'. $modified_minute_txt. ':'. $modified_second_txt ); ?>">
                        <span class="ntt--txt">
                            <span class="day-txt"><?php echo esc_html( $modified_day_txt ); ?></span>
                            <span class="month-txt"><?php echo esc_html( $modified_month_txt ); ?></span>
                            <span class="year-txt"><?php echo esc_html( $modified_year_txt ); ?></span>
                        </span>
                    </a>
                </time>
                <span class="ntt--entry-modified-time ntt--cm-time ntt--obj" data-name="Entry Modified Time">
                    <a href="<?php echo esc_attr( get_permalink() ); ?>" title="<?php echo esc_attr( $updated_on_text. ' '. $modified_day_txt. ' '. $modified_month_txt. ' '. $modified_year_txt. ','. ' '. $modified_hour_txt. ':'. $modified_minute_txt. ':'. $modified_second_txt ); ?>">
                        <span class="ntt--txt">
                            <span class="hour-txt"><?php echo esc_html( $modified_hour_txt ); ?></span><span class="delimiter-txt">:</span><span class="minute-txt"><?php echo esc_html( $modified_minute_txt ); ?></span><span class="delimiter-txt">:</span><span class="second-txt"><?php echo esc_html( $modified_second_txt ); ?></span>
                        </span>
                    </a>
                </span>
            </div>
        </div>
        <?php
    }
}