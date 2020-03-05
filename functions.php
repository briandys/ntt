<?php
/**
 * Functions
 */

$r_functions = array(
    // Primary
    'back-compatibility',
    'settings',
    'hooks',
    'styles-scripts',
    // Secondary
    'comments-css',
    'comment-form',
    'customizer',
    'custom-visuals',
    'entry-css',
    'excerpt',
    'gallery',
    'html-css',
    'pingback-header',
    'widgets',
);

foreach ( $r_functions as $function ) {
    require( get_parent_theme_file_path( '/includes/functions/'. $function. '.php' ) );
}

/**
 * Tags
 */

$r_tags = array(
    'comment',
    'comment-actions',
    'comment-author',
    'comment-datetime',
    'comments-actions-snippet',
    'comments-navigation',
    'entity-navigation',
    'entity-view-heading',
    'entries-navigation',
    'entry-actions',
    'entry-author',
    'entry-banner',
    'entry-breadcrumbs-navigation',
    'entry-content',
    'entry-content-navigation',
    'entry-count',
    'entry-datetime',
    'entry-footer',
    'entry-full-content',
    'entry-header',
    'entry-heading',
    'entry-main',
    'entry-meta',
    'entry-navigation',
    'entry-sub-content-navigation',
    'entry-summary-content',
    'entry-taxonomy',
);

foreach ( $r_tags as $tag ) {
    require( get_parent_theme_file_path( '/includes/tags/'. $tag. '.php' ) );
}

/**
 * List User Defined Functions
 * https://www.php.net/manual/en/function.get-defined-functions.php
 * https://stackoverflow.com/a/10474285
 */
function ntt__function__user_functions() {

    if ( is_page( 'Functions' ) && current_user_can( 'edit_private_posts' ) ) {

        $arr = get_defined_functions()['user'];

        //$arr = array_filter( $arr, function ( $var ) { return ( (stripos( $var, 'ntt' ) !== false) && (stripos( $var, 'css' ) !== false) ); } );
        
        // All ntt
        $arr = array_filter( $arr, function ( $var ) {
            return ( stripos( $var, 'ntt' ) !== false );
        } );

        $count = count($arr);
        sort($arr);

        // All ntt__function
        $r_ntt_functions = array_filter( $arr, function ( $var ) {
            return ( stripos( $var, 'ntt__function' ) !== false );
        } );

        $r_ntt_functions_count = count($r_ntt_functions);
        sort($r_ntt_functions);
        ?>
        <div><?php echo $count; ?></div>
        <ul>
            <?php
            foreach( $arr as $func ) {
                ?>
                <li><?php echo $func; ?></li>
                <?php
            }
            ?>
        </ul>

        <div><?php echo $r_ntt_functions_count; ?></div>
        <ul>
            <?php
            foreach( $r_ntt_functions as $func ) {
                ?>
                <li><?php echo $func; ?></li>
                <?php
            }
            ?>
        </ul>
        <?php
    }
}
add_action( 'ntt__wp_hook__the_content___after', 'ntt__function__user_functions');