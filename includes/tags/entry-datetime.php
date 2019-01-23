<?php

if ( ! function_exists( 'ntt_entry_datetime' ) ) {
    function ntt_entry_datetime() { ?>

        <div class="entry-datetime datetime-trunk cm-datetime-trunk cp" data-name="Entry DateTime">
            <div class="entry-datetime---cr cm-datetime-trunk---cr">

                <div class="entry-published-datetime published-datetime cm-datetime datetime cp" data-name="Entry Published DateTime">
                    <div class="entry-published-datetime---cr cm-datetime---cr">

                        <?php $day_text = get_the_date( 'j' );
                        $month_text = get_the_date( apply_filters( 'ntt_cm_datetime_month_wp_filter', 'F' ) );
                        $year_text = get_the_date( 'Y' );
                        $date_title_attr = $day_text. ' '. $month_text. ' '. $year_text;
                        $date_mu = '<span class="day---txt">'. $day_text. '</span>'. ' '. '<span class="month---txt">'. $month_text. '</span>'. ' '. '<span class="year---txt">'. $year_text. '</span>';
                        
                        $hour_text = get_the_date( 'H' );
                        $minute_text = get_the_date( 'i' );
                        $second_text = get_the_date( 's' );
                        $time_title_attr = $hour_text. ':'. $minute_text. ':'. $second_text;
                        $time_mu = '<span class="hour---txt">'. $hour_text. '</span>'. '<span class="delimiter---txt">:</span>'. '<span class="minute---txt">'. $minute_text. '</span>'. '<span class="delimiter---txt">:</span>'. '<span class="second---txt">'. $second_text. '</span>'; ?>

                        <span class="entry-published-datetime-glabel glabel obj" data-name="Entry Published DateTime Generic Label">
                            <span class="published---text"><?php echo esc_html_x( 'Published', 'Component: DateTime | Usage: >Published< on <date> at <time>', 'ntt' ); ?></span>
                            <span class="on---text"><?php echo esc_html_x( 'on', 'Component: DateTime | Usage: Published >on< <date> at <time>', 'ntt' ); ?></span>
                        </span>
                
                        <time datetime="<?php echo get_the_date( DATE_W3C ); ?>" class="entry-published-date dt-published published-date cm-date date obj time" data-name="Entry Published Date">
                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="entry-published-date---a" title="<?php echo esc_attr_x( 'Published on', 'Component: DateTime | Usage: >Published on< <date>', 'ntt' ). ' '. esc_attr( $date_title_attr ); ?>">
                                <span class="entry-published-date---l">
                                <?php echo $date_mu; ?>
                                </span>
                            </a>
                        </time>
                
                        <span class="entry-published-time published-time cm-time time obj" data-name="Entry Published Time">
                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="entry-published-time---a" title="<?php echo esc_attr_x( 'Published at', 'Component: DateTime | Usage: >Published at< <time>', 'ntt' ). ' '. esc_attr( $time_title_attr ); ?>">
                                <span class="entry-published-time---l">
                                <?php echo $time_mu; ?>
                                </span>
                            </a>
                        </span>

                    </div>
                </div>

                <div class="entry-modified-datetime modified-datetime cm-datetime datetime cp" data-name="Entry Modified DateTime">
                    <div class="cm-datetime---cr entry-modified-datetime---cr">

                        <?php $modified_day_text = get_the_modified_time( 'j' );
                        $modified_month_text = get_the_modified_time( apply_filters( 'ntt_cm_datetime_month_wp_filter', 'F' ) );
                        $modified_year_text = get_the_modified_time( 'Y' );
                        $modified_date_title_attr = $modified_day_text. ' '. $modified_month_text. ' '. $modified_year_text;
                        $modified_date_mu = '<span class="day---txt">'. $modified_day_text. '</span>'. ' '. '<span class="month---txt">'. $modified_month_text. '</span>'. ' '. '<span class="year---txt">'. $modified_year_text. '</span>';
                        
                        $modified_hour_text = get_the_modified_time( 'H' );
                        $modified_minute_text = get_the_modified_time( 'i' );
                        $modified_second_text = get_the_modified_time( 's' );
                        $modified_time_title_attr = $modified_hour_text. ':'. $modified_minute_text. ':'. $modified_second_text;
                        $modified_time_mu = '<span class="hour---txt">'. $modified_hour_text. '</span>'. '<span class="delimiter---txt">:</span>'. '<span class="minute---txt">'. $modified_minute_text. '</span>'. '<span class="delimiter---txt">:</span>'. '<span class="second---txt">'. $modified_second_text. '</span>'; ?>

                        <span class="entry-modified-on-glabel glabel obj" data-name="Entry Modified On Generic Label">
                            <span class="modified---txt"><?php echo esc_html_x( 'Modified', 'Component: DateTime | Usage: >Modified< on <date> at <time>', 'ntt' ); ?></span>
                            <span class="on---txt"><?php echo esc_html_x( 'on', 'Component: DateTime | Usage: Modified >on< <date> at <time>', 'ntt' ); ?></span>
                        </span>
                
                        <time datetime="<?php echo get_the_date( DATE_W3C ); ?>" class="cm-date entry-modified-date dt-updated modified-date date obj time" data-name="Entry Modified Date">
                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="entry-modified-date---a" title="<?php echo esc_attr_x( 'Modified on', 'Component: DateTime | Usage: >Modified on< <date>', 'ntt' ). ' '. esc_attr( $modified_date_title_attr ); ?>">
                                <span class="entry-modified-date---l">
                                <?php echo $modified_date_mu; ?>
                                </span>
                            </a>
                        </time>
                
                        <span class="cm-time entry-modified-time modified-time time obj" data-name="Entry Modified Time">
                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="entry-modified-time---a" title="<?php echo esc_attr_x( 'Modified at', 'Component: DateTime | Usage: >Modified at< <time>', 'ntt' ). ' '. esc_attr( $modified_time_title_attr ); ?>">
                                <span class="entry-modified-time---l">
                                <?php echo $modified_time_mu; ?>
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