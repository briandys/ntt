<?php
if ( ! function_exists('ntt_entry_nav' ) ) {
    function ntt_entry_nav() {
        
        if ( is_single() || is_page() ) {

            if ( ! get_adjacent_post( false, '', false ) && ! get_adjacent_post( false, '', true ) ) {
                return;
            }
            
            $l_mu = '';
            $l_mu .= '<span class="property---line line">';
                $l_mu .= '<span class="%2$s---text">%1$s</span>';
                $l_mu .= ' '. '<span class="entry---text">'. esc_html__( 'Entry', 'ntt' ) .'</span>';
                $l_mu .= '<span class="delimiter---txt">:</span>';
            $l_mu .= '</span>';
            $l_mu .= ' <span class="value---line line">';
                $l_mu .= '<span class="entry-name---txt">%3$s</span>';
            $l_mu .= '</span>';
            
            $next_navi = sprintf( $l_mu,
                esc_html__( 'Next', 'ntt' ),
                'next',
                '%title'
            );
            
            $previous_navi = sprintf( $l_mu,
                esc_html__( 'Previous', 'ntt' ),
                'previous',
                '%title'
            );
            ?>

            <div role="navigation" class="entry-nav adjacent-nav nav cp" data-name="Entry Navigation">
                <div class="entry-nav---cr">

                    <div class="entry-nav-name nav-name obj h" data-name="Entry Navigation Name">
                        <span class="txt"><?php esc_html_e( 'Entry Navigation', 'ntt' ); ?></span>
                    </div>

                    <div class="entry-nav-group nav-group group cp" data-name="Entry Navigation Group">
                        <div class="entry-nav-group---cr">
                    
                            <?php
                            if ( get_next_post_link() ) {

                                if ( '' !== get_the_post_thumbnail( get_next_post()->ID ) ) {
                                    $next_post_thumbnail = '<span class="entry-navi---i">';
                                    $next_post_thumbnail .= get_the_post_thumbnail( get_next_post()->ID );
                                    $next_post_thumbnail .= '</span>';
                                } else {
                                    $next_post_thumbnail = '';
                                }
                                ?>
                                
                                <div class="next-entry-navi entry-navi navi obj" data-name="Next Entry Navigation Item">
                                    <?php next_post_link( '%link', $next_navi. $next_post_thumbnail ); ?>
                                </div>
                                <?php
                            }
                            
                            if ( get_previous_post_link() ) {

                                if ( '' !== get_the_post_thumbnail( get_previous_post()->ID ) ) {
                                    $prev_post_thumbnail = '<span class="entry-navi---i">';
                                    $prev_post_thumbnail .= get_the_post_thumbnail( get_previous_post()->ID );
                                    $prev_post_thumbnail .= '</span>';
                                } else {
                                    $prev_post_thumbnail = '';
                                }
                                ?>
                                
                                <div class="previous-entry-navi entry-navi navi obj" data-name="Previous Entry Navigation Item">
                                    <?php previous_post_link( '%link', $previous_navi. $prev_post_thumbnail ); ?>
                                </div>
                                <?php 
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        
    }
}