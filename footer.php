                        </div>
                    </section>
                    
                    <footer id="entity-footer" class="entity-footer cn" data-name="Entity Footer">
                        <div class="entity-footer---cr">

                        <?php
                        ntt_entity_secondary_nav();
                        
                        ntt_entity_footer_aside();
                        ?>
                            
                            <div id="entity-secondary-info" class="entity-secondary-info info cp" data-name="Entity Secondary Info">
                                <div class="entity-secondary-info---cr">

                                <?php
                                if ( ! function_exists( 'ntt_wp_theme_name' ) ) {
                                    function ntt_wp_theme_name() {
                                        return $GLOBALS['ntt_name'];
                                    }
                                }
                                
                                if ( ! function_exists( 'ntt_wp_theme_name_url_fragment' ) ) {
                                    function ntt_wp_theme_name_url_fragment() {
                                        return sanitize_title( ntt_wp_theme_name() );
                                    }
                                }
                                ?>

                                <?php
                                $product_name = get_bloginfo( 'name', 'display' );
                                
                                if ( $product_name || is_customize_preview() ) {
                                    $ntt_wp_theme_url = '//ntt.dysinelab.com/themes/'. ntt_wp_theme_name_url_fragment();
                                    $product_maker_name = 'DysineLab';
                                    ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="entity-name name obj a" title="<?php echo esc_attr( $product_name ); ?>" data-name="Entity Name OBJ">
                                        <span class="entity-name---l">
                                            <span class="entity-name---txt"><?php echo esc_html( $product_name ); ?></span>
                                        </span>
                                    </a>
                                    <?php
                                }
                                ?>
                                    
                                    <span class="entity-copyright g obj" data-name="Entity Copyright OBJ">
                                        <span class="entity-copyright---l">
                                            <span class="copyright-symbol---txt">&copy;</span>
                                            <span class="copyright-year---txt"><?php echo date_i18n( 'Y' ); ?></span>
                                        </span>
                                    </span>     
                                    
                                    <a href="<?php echo esc_url( $ntt_wp_theme_url ); ?>" class="maker-tag g obj a" title="<?php echo esc_attr( ntt_wp_theme_name(). ' '. 'by'. ' '. $product_maker_name ); ?>" data-name="Maker Tag OBJ">
                                        <span class="maker-tag---l">
                                            <span class="wp-theme-name---txt"><?php echo esc_html( ntt_wp_theme_name() ); ?></span>
                                            <span class="by---txt">by</span>
                                            <span class="entity-maker---txt"><?php echo esc_html( $product_maker_name ); ?></span>
                                        </span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </footer>
                    
                    <div id="entity-end" class="entity-end cn" data-name="Entity End">
                        <div class="entity-end---cr">
                            <div id="go-start-nav" class="go-start-nav nav cp" data-name="Go to Start Navigation">
                                <div class="go-start-nav---cr">
                                    <div class="go-start-navi navi obj" data-name="Go to Start Navigation Item">
                                        <a href="#start" class="go-start-navi---a a" title="<?php esc_attr_e( 'Go to Start', 'ntt' ); ?>">
                                            <span class="go-start-navi---l l">
                                                <span class="go-start-navi---txt txt"><?php esc_html_e( 'Go to Start', 'ntt' ); ?></span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>

        <?php wp_footer(); ?>
    
    </body>
</html>