                    </div>
                </main>
                <footer id="entity-footer" class="entity-footer cn" data-name="Entity Footer">
                    <div class="entity-footer---cr">

                        <?php ntt_entity_secondary_nav(); ?>
                        
                        <div id="entity-secondary-info" class="entity-secondary-info cp" data-name="Entity Secondary Information">
                            <div class="entity-secondary-info---cr">

                                <?php
                                $get_bloginfo_name = get_bloginfo( 'name', 'display' );
                                $entity_maker_name = 'Brian Dys';
                                $entity_maker_tag_theme_name_wp_filter = apply_filters( 'ntt_entity_maker_tag_theme_name_wp_filter', $GLOBALS['ntt_name'] );
                                $entity_maker_tag_maker_name_wp_filter = apply_filters( 'ntt_entity_maker_tag_maker_name_wp_filter', $entity_maker_name );
                                
                                if ( $get_bloginfo_name || is_customize_preview() ) {
                                    ?>
                                    <div class="entity-name obj">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                            <span class="txt"><?php echo esc_html( $get_bloginfo_name ); ?></span>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="entity-copyright obj" data-name="Entity Copyright"><?php esc_html_e( 'Copyright', 'ntt' ); echo ' '. esc_html( apply_filters( 'ntt_entity_copyright_year_wp_filter', date_i18n( 'Y' ) ) ); ?></div>
                                <div class="entity-maker-tag obj" data-name="Entity Maker Tag">
                                    <a href="<?php echo esc_url( apply_filters( 'ntt_entity_maker_tag_theme_url_wp_filter', '//ntt.briandys.com/' ) ); ?>" title="<?php echo esc_attr_x( 'Made with', 'Made with [Theme Name] by [Entity Maker Name]', 'ntt' ). ' '. esc_attr( $entity_maker_tag_theme_name_wp_filter ). ' '. esc_attr_x( 'by', 'Made with [Theme Name] by [Entity Maker Name]', 'ntt' ). ' '. esc_attr( $entity_maker_tag_maker_name_wp_filter ); ?>">
                                        <span class="l">
                                            <span class="theme---txt"><?php echo esc_html( $entity_maker_tag_theme_name_wp_filter ); ?></span>
                                            <span class="by---text"><?php echo esc_html_x( 'by', 'Made with [Theme Name] by [Entity Maker Name]', 'ntt' ); ?></span>
                                            <span class="maker-name---txt"><?php echo esc_html( $entity_maker_tag_maker_name_wp_filter ); ?></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </footer>
                
                <div id="entity-end" class="entity-end cn" data-name="Entity End">
                    <div class="entity-end---cr">
                        
                        <div id="go-start-nav" class="go-start-nav nav cp" data-name="Go to Start Navigation">
                            <div class="go-start-nav---cr">
                                <?php $go_start_text = __( 'Go to Start', 'ntt' ); ?>
                                <div class="go-start-navi obj">
                                    <a href="#start" title="<?php echo esc_attr( $go_start_text ); ?>">
                                        <span class="txt"><?php echo esc_html( $go_start_text ); ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="wild-card" class="wild-card" data-name="Wild Card">
            <div class="wild-card---cr">
                <!-- Dynamically-created Content -->
            </div>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>