<?php

global $multipage;

if ( get_the_title() ) {
    $entry_name = '<span class="entry-name---txt txt">'. get_the_title(). '</span>';
} else {
    $entry_name = '<span class="entry---txt txt">'. _x( 'Entry', 'Object: Entry Name | Usage: >Entry< <Entry ID>', 'ntt' ). '</span>'. ' '. '<span class="entry-id---txt num txt">'. get_the_id(). '</span>';
}
?>

<div id="entry-<?php the_id(); ?>" <?php post_class(); ?> data-name="Entry">
    <div class="cm-singular---cr entry---cr">
        <article id="entry-article-<?php the_id(); ?>" class="cm-article entry-article-<?php the_id(); ?> entry-article article cp" data-name="Entry Article">
            <div class="cm-article---cr entry-article---cr">
                <div class="cm-header entry-header header cn" data-name="Entry Header">
                    <div class="cm-header---cr entry-header---cr">
                        <div class="cm-heading entry-heading heading cp" data-name="Entry Info">
                            <div class="cm-heading---cr entry-heading---cr">
                            
                            <?php
                            $anchor_element_start = '<a href="'. esc_url( get_permalink() ). '" rel="bookmark" class="cm-name---a entry-name---a u-url a">';
                            $anchor_element_end = '</a>';
                            
                            if ( is_singular() ) {
                                $heading_level = 'h1';
                                $anchor_element_start = '';
                                $anchor_element_end = '';
                            } else {
                                $heading_level = 'h3';
                            }
                            ?>

                            <<?php echo esc_attr( $heading_level ); ?> class="cm-name entry-name name obj h" data-name="Entry Name">
                                <?php echo $anchor_element_start; ?>
                                    <span class="entry-name---l l"><?php echo $entry_name; ?></span>
                                <?php echo $anchor_element_end; ?>
                            </<?php echo esc_attr( $heading_level ); ?>>

                            <?php ntt_after_entry_name_wp_hook(); ?>
                                    
                            </div>
                        </div>

                        <div class="cm-axns-trunk entry-axns axns-trunk axns cp" data-name="Entry Actions">
                            <div class="cm-axns-trunk---cr entry-axns---cr">
                            <?php ntt_entry_admin_actions(); ?>
                            </div>
                        </div>

                        <?php
                        ntt_breadcrumbs_nav();
                        ntt_entry_content_nav();
                        ?>

                        <div class="cm-meta entry-meta meta cp" data-name="Entry Meta">
                            <div class="cm-meta---cr entry-meta---cr">

                            <?php
                            ntt_entry_datetime();
                            ntt_entry_author();
                            ntt_entry_categories();
                            ?>
                            
                            </div>
                        </div>

                        <?php
                        ntt_after_entry_meta_wp_hook();
                        ntt_comments_actions_snippet();
                        
                        if ( '' !== get_the_post_thumbnail() || is_active_sidebar( 'entry-banner-aside' ) ) {
                            ?>
                            <div class="cm-banner entry-banner banner cp" data-name="Entry Banner">
                                <div class="cm-banner---cr entry-banner---cr">

                                <?php
                                if ( '' !== get_the_post_thumbnail() ) {
                                    ?>
                                    <div class="cm-banner-visuals entry-banner-visuals banner-visuals visuals obj" data-name="Entry Banner Visuals">
                                    <?php
                                    echo $anchor_element_start;
                                    
                                    the_post_thumbnail( 'ntt-large', array( 'class' => 'cm-banner-visuals entry-banner-visuals---img banner-visuals---img visuals---img u-featured img', ) );
                                    
                                    echo $anchor_element_end;
                                    ?>
                                    </div>
                                    <?php
                                }
                                
                                ntt_entry_banner_aside();
                                ?>
                                
                                </div>
                            </div>
                            <?php
                        }
                        
                        ntt_entry_header_aside();
                        ?>
                    
                    </div>
                </div>
                
                <div class="cm-main entry-main main cn" data-name="Entry Main">
                    <div class="cm-main---cr entry-main---cr">
                        <div class="cm-content-trunk entry-content content-trunk cp" data-name="Entry Content">
                            <div class="cm-content-trunk---cr entry-content---cr">
                    
                            <?php
                            if ( is_home() || is_archive() || is_singular() ) {   
                                
                                if ( has_excerpt() ) {
                                ?>
                                <div class="entry-summary-content summary-content p-summary content cp" data-name="Entry Summary Content">
                                    <div class="entry-summary-content---cr content---cr">
                                    <?php echo the_excerpt(); ?>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                                <div class="entry-full-content full-content e-content content cp" data-name="Entry Full Content">
                                    <div class="entry-full-content---cr content---cr">
                                    <?php echo the_content(); ?>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="entry-summary-content summary-content p-summary content cp" data-name="Entry Summary Content">
                                    <div class="entry-summary-content---cr content---cr">
                                    <?php echo the_excerpt(); ?>
                                    </div>
                                </div>
                                <?php
                            }
                            
                            if ( is_page_template( 'page-templates/sub-pages.php' ) ) {
                                $args = array(
                                    'order'         => 'ASC',
                                    'post_parent'   => $post->ID,
                                    'post_status'   => 'publish',
                                    'post_type'     => 'page',
                                );

                                $the_query = new WP_Query( $args );

                                if ( $the_query->have_posts() ) {
                                    while ( $the_query->have_posts() ) {
                                        $the_query->the_post();
                                        ?>
                                        <div class="cm-sub-content entry-sub-content sub-content cp" data-name="Entry Sub Content">
                                            <div class="cm-sub-content---cr entry-sub-content---cr">
                                                <?php get_template_part( 'content', get_post_format() ); ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                wp_reset_postdata();
                            }

                            ntt_after_entry_content_wp_hook();
                            ?>
                            </div>
                        </div>

                        <?php ntt_entry_main_aside(); ?>
                    </div>
                </div>

                <?php
                if ( 'post' === get_post_type() && ( $multipage || get_the_tag_list() ) ) {
                    ?>
                    <div class="cm-footer entry-footer footer cn" data-name="Entry Footer">
                        <div class="cm-footer---cr entry-footer---cr">
                        <?php ntt_entry_content_nav(); ?>
                            <div class="cm-meta entry-meta meta cp" data-name="Entry Meta">
                                <div class="cm-meta---cr entry-meta---cr">
                                <?php ntt_entry_tags(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </article>
    </div>
</div>