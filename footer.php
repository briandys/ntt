                    </div>
                </main>
                
                <footer id="entity-footer" class="entity-footer cn" data-name="Entity Footer">
                    <div class="entity-footer---cr">

                        <?php
                        ntt_entity_secondary_nav();
                        ntt_entity_footer_aside();
                        ntt_after_entity_footer_aside_wp_hook();
                        ?>
                        
                        <div id="entity-secondary-info" class="entity-secondary-info cp" data-name="Entity Secondary Information">
                            <div class="entity-secondary-info---cr">

                                <?php
                                $get_bloginfo_name = get_bloginfo( 'name', 'display' );
                                $entity_maker_name = 'DysineLab';
                                
                                if ( $get_bloginfo_name || is_customize_preview() ) {
                                    ?>
                                    <div class="entity-name name obj" data-name="Entity Name">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="entity-name---a"><span class="entity-name---txt"><?php echo esc_html( $get_bloginfo_name ); ?></span></a>
                                    </div>
                                    <?php
                                }
                                ?>
                                
                                <div class="entity-copyright obj" data-name="Entity Copyright">
                                    <span class="copyright---text"><?php esc_html_e( 'Copyright', 'ntt' ); ?></span>
                                    <span class="entity-copyright-year---txt"><?php echo esc_html( apply_filters( 'ntt_entity_copyright_year_wp_filter', date_i18n( 'Y' ) ) ); ?></span>
                                </div>
                                
                                <div class="entity-maker-tag obj" data-name="Entity Maker Tag">
                                    <a href="<?php echo esc_url( apply_filters( 'ntt_entity_maker_tag_theme_url_wp_filter', '//ntt.dysinelab.com/themes/' ) ); ?>" title="<?php echo esc_attr_x( 'Made with', '->Made with<- [Theme Name] by [Entity Maker Name]', 'ntt' ). ' '. esc_attr( apply_filters( 'ntt_entity_maker_tag_theme_name_wp_filter', $GLOBALS['ntt_name'] ). ' '. esc_attr_x( 'by', '[Theme Name] ->by<- [Entity Maker Name]', 'ntt' ). ' '. esc_attr( apply_filters( 'ntt_entity_maker_tag_maker_name_wp_filter', $entity_maker_name ) ) ); ?>" class="entity-maker-tag---a"><span class="wp-theme-name---txt"><?php echo esc_html( apply_filters( 'ntt_entity_maker_tag_theme_name_wp_filter', $GLOBALS['ntt_name'] ) ); ?></span> <span class="preposition---txt"><?php echo esc_html_x( 'by', '[Theme Name] ->by<- [Entity Maker Name]', 'ntt' ); ?></span> <span class="entity-maker-name---txt"><?php echo esc_html( apply_filters( 'ntt_entity_maker_tag_maker_name_wp_filter', $entity_maker_name ) ); ?></span></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </footer>
                
                <div id="entity-end" class="entity-end cn" data-name="Entity End">
                    <div class="entity-end---cr">
                        
                        <div id="go-start-nav" class="go-start-nav nav cp" data-name="Go to Start Navigation">
                            <div class="go-start-nav---cr">
                                
                                <div title="<?php echo esc_attr( 'Go to Start' ); ?>" class="go-start-navi navi obj" data-name="Go to Start Navigation Item">
                                    <a href="#start" class="go-start-navi---a">
                                        <span class="go-start-navi---l">
                                            <span class="go-start-navi---txt"><?php esc_html_e( 'Go to Start', 'ntt' ); ?></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="wild-card" class="wild-card" data-name="Wild Card">
            <div class="wild-card---cr"><!-- Dynamically-created Content --></div>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>