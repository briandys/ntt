<?php
/**
 * Footer
 */
?>
            </main>
            <footer class="ntt--entity-footer ntt--cn" data-name="Entity Footer">
                <?php
                ntt_entity_footer_aside();
                ?>
                <div class="ntt--entity-secondary-info ntt--cp" data-name="Entity Secondary Information">
                    <?php
                    $get_bloginfo_name = get_bloginfo( 'name', 'display' );
                    $entity_maker_name = 'Brian Dys CL';
                    
                    $entity_maker_tag_theme_name_filter = apply_filters( 'ntt__wp_filter__entity_maker_tag_theme_name', 'NTT' );
                    $entity_maker_tag_maker_name_filter = apply_filters( 'ntt_entity_maker_tag_maker_name_filter', $entity_maker_name );
                    
                    if ( $get_bloginfo_name || is_customize_preview() ) {
                        ?>
                        <span class="ntt--entity-secondary-name ntt--obj">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="ntt--txt"><?php echo esc_html( $get_bloginfo_name ); ?></span></a>
                        </span>
                        <?php
                    }
                    ?>
                    <span class="ntt--entity-copyright ntt--obj" data-name="Entity Copyright">
                        <span class="ntt--txt"><?php esc_html_e( 'Copyright', 'ntt' ); echo ' '. esc_html( apply_filters( 'ntt_entity_copyright_year_filter', date_i18n( 'Y' ) ) ); ?></span>
                    </span>
                    <div class="ntt--entity-maker-tag ntt--obj" data-name="Entity Maker Tag">
                        <a href="<?php echo esc_url( apply_filters( 'ntt__wp_filter__entity_maker_tag_theme_url', '//briandys.com/ntt/' ) ); ?>" title="<?php echo esc_attr_x( 'Made with', 'Made with [Theme Name] by Maker', 'ntt' ). ' '. esc_attr( $entity_maker_tag_theme_name_filter ). ' '. esc_attr_x( 'by', 'Made with [Theme Name] by Maker', 'ntt' ). ' '. esc_attr( $entity_maker_tag_maker_name_filter ); ?>">
                            <span class="ntt--txt">
                                <label class="ntt--label-txt"><?php echo esc_html_x( 'Design by', 'Design by Maker', 'ntt' ); ?></label>
                                <span class="ntt--maker-name-txt"><?php echo esc_html( $entity_maker_tag_maker_name_filter ); ?></span>
                            </span>
                        </a>
                    </div>
                </div>
            </footer>
            <div class="ntt--entity-end ntt--cn" data-name="Entity End">
                <?php $go_start_text = __( 'Go to Start', 'ntt' ); ?>
                <div aria-label="<?php echo esc_attr( $go_start_text ); ?>" role="navigation" id="ntt--go-start-nav" class="ntt--go-start-nav ntt--nav ntt--cp" data-name="Go to Start Navigation">
                    <div class="ntt--go-start-navi ntt--navi ntt--obj">
                        <a href="#start" title="<?php echo esc_attr( $go_start_text ); ?>">
                            <span class="ntt--txt"><?php echo esc_html( $go_start_text ); ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="ntt--wild-card" class="ntt--wild-card" data-name="Wild Card">
            <!-- Dynamically-created Content -->
        </div>
        <?php wp_footer(); ?>
    </body>
</html>