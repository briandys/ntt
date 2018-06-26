<?php

if ( ! function_exists( 'ntt_entry_datetime' ) ) {
    function ntt_entry_datetime() { ?>

        <div class="cm-datetime-trunk entry-datetime datetime-trunk cp" data-name="Entry DateTime">
            <div class="cm-datetime-trunk---cr entry-datetime---cr">

                <div class="cm-datetime entry-published-datetime published-datetime datetime cp" data-name="Entry Published DateTime">
                    <div class="cm-datetime---cr entry-published-datetime---cr">

                        <?php $day_text = get_the_date( 'j' );
                        $month_text = get_the_date( apply_filters( 'ntt_cm_datetime_year', 'F' ) );
                        $year_text = get_the_date( 'Y' );
                        $date_title_attr = $day_text. ' '. $month_text. ' '. $year_text;
                        $date_mu = '<span class="day---txt txt">'. $day_text. '</span>'. ' '. '<span class="month---txt txt">'. $month_text. '</span>'. ' '. '<span class="year---txt txt">'. $year_text. '</span>';
                        
                        $hour_text = get_the_date( 'H' );
                        $minute_text = get_the_date( 'i' );
                        $second_text = get_the_date( 's' );
                        $time_title_attr = $hour_text. ':'. $minute_text. ':'. $second_text;
                        $time_mu = '<span class="hour---txt txt">'. $hour_text. '</span>'. '<span class="colon---txt txt">:</span>'. '<span class="minute---txt txt">'. $minute_text. '</span>'. '<span class="colon---txt txt">:</span>'. '<span class="second---txt txt">'. $second_text. '</span>'; ?>

                        <span class="entry-published-on-glabel glabel obj">
                            <span class="published---txt txt"><?php echo esc_html__( 'Published', 'ntt' ); ?></span>
                            <span class="on---txt txt"><?php echo esc_html__( 'on', 'ntt' ); ?></span>
                        </span>
                
                        <time datetime="<?php echo get_the_date( DATE_W3C ); ?>" class="cm-date entry-published-date dt-published published-date date obj time" data-name="Entry Published Date">
                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="entry-published-date---a a" title="<?php echo esc_attr( $date_title_attr ); ?>">
                                <span class="entry-published-date---l l">
                                <?php echo $date_mu; ?>
                                </span>
                            </a>
                        </time>
                        
                        <span class="entry-at-glabel glabel obj">
                            <span class="at---txt txt"><?php echo esc_html_x( 'at', 'Component: DateTime | Usage: Published on <date> at <time>', 'ntt' ); ?></span>
                        </span>
                
                        <span class="cm-time entry-published-time published-time time obj" data-name="Entry Published Time">
                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="entry-published-time---a a" title="<?php echo esc_attr( $time_title_attr ); ?>">
                                <span class="entry-published-time---l l">
                                <?php echo $time_mu; ?>
                                </span>
                            </a>
                        </span>

                    </div>
                </div>

                <div class="cm-datetime entry-updated-datetime updated-datetime datetime cp" data-name="Entry Updated DateTime">
                    <div class="cm-datetime---cr entry-updated-datetime---cr">

                        <?php $updated_day_text = get_the_modified_time( 'j' );
                        $updated_month_text = get_the_modified_time( apply_filters( 'ntt_cm_datetime_year', 'F' ) );
                        $updated_year_text = get_the_modified_time( 'Y' );
                        $updated_date_title_attr = $updated_day_text. ' '. $updated_month_text. ' '. $updated_year_text;
                        $updated_date_mu = '<span class="day---txt txt">'. $updated_day_text. '</span>'. ' '. '<span class="month---txt txt">'. $updated_month_text. '</span>'. ' '. '<span class="year---txt txt">'. $updated_year_text. '</span>';
                        
                        $updated_hour_text = get_the_modified_time( 'H' );
                        $updated_minute_text = get_the_modified_time( 'i' );
                        $updated_second_text = get_the_modified_time( 's' );
                        $updated_time_title_attr = $updated_hour_text. ':'. $updated_minute_text. ':'. $updated_second_text;
                        $updated_time_mu = '<span class="hour---txt txt">'. $updated_hour_text. '</span>'. '<span class="colon---txt txt">:</span>'. '<span class="minute---txt txt">'. $updated_minute_text. '</span>'. '<span class="colon---txt txt">:</span>'. '<span class="second---txt txt">'. $updated_second_text. '</span>'; ?>

                        <span class="entry-updated-on-glabel glabel obj">
                            <span class="updated---txt txt"><?php echo esc_html__( 'Updated', 'ntt' ); ?></span>
                            <span class="on---txt txt"><?php echo esc_html__( 'on', 'ntt' ); ?></span>
                        </span>
                
                        <time datetime="<?php echo get_the_date( DATE_W3C ); ?>" class="cm-date entry-updated-date dt-updated updated-date date obj time" data-name="Entry Updated Date">
                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="entry-updated-date---a a" title="<?php echo esc_attr( $updated_date_title_attr ); ?>">
                                <span class="entry-updated-date---l l">
                                <?php echo $updated_date_mu; ?>
                                </span>
                            </a>
                        </time>
                        
                        <span class="entry-at-glabel glabel obj">
                            <span class="at---txt txt"><?php echo esc_html_x( 'at', 'Component: DateTime | Usage: Updated on <date> at <time>', 'ntt' ); ?></span>
                        </span>
                
                        <span class="cm-time entry-updated-time updated-time time obj" data-name="Entry Updated Time">
                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="entry-updated-time---a a" title="<?php echo esc_attr( $updated_time_title_attr ); ?>">
                                <span class="entry-updated-time---l l">
                                <?php echo $updated_time_mu; ?>
                                </span>
                            </a>
                        </span>

                    </div>
                </div>

            </div>
        </div>
        <?php
    }
}