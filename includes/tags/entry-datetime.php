<?php
if ( ! function_exists( 'ntt_entry_datetime' ) ) {
    function ntt_entry_datetime() {
        
        // Text
        $published_text = _x( 'Published', 'Published on [date] [time]', 'ntt' );
        $on_text = _x( 'on', '[Published / Updated] on [date]', 'ntt' );
        $at_text = _x( 'at', '[Published / Updated] at [time]', 'ntt' );
        $published_on_text = $published_text. ' '. $on_text;
        $published_at_text = $published_text. ' '. $at_text;
        $updated_text = _x( 'Updated', 'Updated on [date] [time]', 'ntt' );
        $updated_on_text = $updated_text. ' '. $on_text;
        $updated_at_text = $updated_text. ' '. $at_text;

        $delimeter_mu = '<span class="delimiter---txt">:</span>';

        // Generic Label Markup
        $glabel_mu = '<span class="entry-'. esc_attr( '%3$s' ). '-datetime-glabel obj">';
            $glabel_mu .= '<span class="'. esc_attr( '%4$s' ). '">'. esc_html( '%1$s' ). '</span>';
            $glabel_mu .= ' '. '<span class="on---text">'. esc_html( '%2$s' ). '</span>';
        $glabel_mu .= '</span>'. ' ';

        // Date Markup
        $date_mu = '<time datetime="'. esc_attr( '%4$s' ).'" class="'. esc_attr( '%5$s' ). ' '. 'cm-date obj" data-name="'. esc_attr( '%6$s' ). '">';
            $date_mu .= '<a href="'. esc_url( '%2$s' ). '" title="'. esc_attr( '%3$s' ). '">';
                $date_mu .= '<span class="l">';
                    $date_mu .= '%1$s';
                $date_mu .= '</span>';
            $date_mu .= '</a>';
        $date_mu .= '</time>';

        // Time Markup
        $time_mu = ' '. '<span class="'. esc_attr( '%4$s' ). ' '. 'cm-time obj" data-name="'. esc_attr( '%5$s' ). '">';
            $time_mu .= '<a href="'. esc_url( '%2$s' ). '" title="'. esc_attr( '%3$s' ). '">';
                $time_mu .= '<span class="l">';
                    $time_mu .= '%1$s';
                $time_mu .= '</span>';
            $time_mu .= '</a>';
        $time_mu .= '</span>';
        ?>              

        <div class="entry-datetime cm-datetime-trunk cp" data-name="Entry DateTime">
            <div class="entry-datetime---cr">

                <div class="entry-published-datetime cm-datetime cp" data-name="Entry Published DateTime">
                    <div class="entry-published-datetime---cr">

                        <?php 
                        // Date
                        $published_day_text = get_the_date( 'j' );
                        $published_month_text = get_the_date( apply_filters( 'ntt_cm_datetime_month_wp_filter', 'F' ) );
                        $published_year_text = get_the_date( 'Y' );
                        
                        $published_date_title_attr = $published_day_text. ' '. $published_month_text. ' '. $published_year_text;
                        
                        $published_date_mu = '<span class="day---txt">'. esc_html( $published_day_text ). '</span>';
                        $published_date_mu .= ' '. '<span class="month---txt">'. esc_html( $published_month_text ). '</span>';
                        $published_date_mu .= ' '. '<span class="year---txt">'. esc_html( $published_year_text ). '</span>';
                        
                        // Time
                        $published_hour_text = get_the_date( 'H' );
                        $published_minute_text = get_the_date( 'i' );
                        $published_second_text = get_the_date( 's' );
                        
                        $published_time_title_attr = $published_hour_text. ':'. $published_minute_text. ':'. $published_second_text;
                        
                        $published_time_mu = '<span class="hour---txt">'. esc_html( $published_hour_text ). '</span>';
                        $published_time_mu .= $delimeter_mu;
                        $published_time_mu .= '<span class="minute---txt">'. esc_html( $published_minute_text ). '</span>';
                        $published_time_mu .= $delimeter_mu;
                        $published_time_mu .= '<span class="second---txt">'. esc_html( $published_second_text ). '</span>';

                        // Generic Label
                        printf( $glabel_mu,
                            $published_text,
                            $on_text,
                            'published',
                            'published---text'
                        );

                        // Date
                        printf( $date_mu,
                            $published_date_mu,
                            get_permalink(),
                            $published_on_text. ' '. $published_date_title_attr,
                            get_the_date( DATE_W3C ),
                            'entry-published-date dt-published',
                            'Entry Published Date'
                        );

                        // Time
                        printf( $time_mu,
                            $published_time_mu,
                            get_permalink(),
                            $published_at_text. ' '. $published_time_title_attr,
                            'entry-published-time',
                            'Entry Published Time'
                        );
                        ?>
                    </div>
                </div>

                <div class="entry-modified-datetime cm-datetime cp" data-name="Entry Modified DateTime">
                    <div class="entry-modified-datetime---cr">

                        <?php
                        // Date
                        $modified_day_text = get_the_modified_time( 'j' );
                        $modified_month_text = get_the_modified_time( apply_filters( 'ntt_cm_datetime_month_wp_filter', 'F' ) );
                        $modified_year_text = get_the_modified_time( 'Y' );
                        
                        $modified_date_title_attr = $modified_day_text. ' '. $modified_month_text. ' '. $modified_year_text;
                        
                        $modified_date_mu = '<span class="day---txt">'. esc_html( $modified_day_text ). '</span>';
                        $modified_date_mu .= ' '. '<span class="month---txt">'. esc_html( $modified_month_text ). '</span>';
                        $modified_date_mu .= ' '. '<span class="year---txt">'. esc_html( $modified_year_text ). '</span>';
                        
                        // Time
                        $modified_hour_text = get_the_modified_time( 'H' );
                        $modified_minute_text = get_the_modified_time( 'i' );
                        $modified_second_text = get_the_modified_time( 's' );
                        
                        $modified_time_title_attr = $modified_hour_text. ':'. $modified_minute_text. ':'. $modified_second_text;
                        
                        $modified_time_mu = '<span class="hour---txt">'. esc_html( $modified_hour_text ). '</span>';
                        $modified_time_mu .= $delimeter_mu;
                        $modified_time_mu .= '<span class="minute---txt">'. esc_html( $modified_minute_text ). '</span>';
                        $modified_time_mu .= $delimeter_mu;
                        $modified_time_mu .= '<span class="second---txt">'. esc_html( $modified_second_text ). '</span>';

                        // Generic Label
                        printf( $glabel_mu,
                            $updated_text,
                            $on_text,
                            'modified',
                            'updated---text'
                        );

                        // Date
                        printf( $date_mu,
                            $modified_date_mu,
                            get_permalink(),
                            $updated_on_text. ' '. $modified_date_title_attr,
                            get_the_modified_time( DATE_W3C ),
                            'entry-modified-date',
                            'Entry Modified Date'
                        );

                        // Time
                        printf( $time_mu,
                            $modified_time_mu,
                            get_permalink(),
                            $updated_at_text. ' '. $modified_time_title_attr,
                            'entry-modified-time',
                            'Entry Modified Time'
                        );
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}