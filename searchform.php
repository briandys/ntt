<?php
/**
 * Search Form
 */

$unique_id = uniqid();
$search_text = __( 'Search', 'ntt' );
$aria_label = ! empty( $args['label'] ) ? 'aria-label="' . esc_attr( $args['label'] ) . '"' : '';
?>

<form role="search" method="get" <?php echo $aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> action="<?php echo esc_url( home_url( '/' ) ); ?>" class="ntt--search ntt--cp" data-name="Search">
    <div class="ntt--search-field ntt--form-field ntt--cp" data-name="Search Field">
        <label for="ntt--search-text-input-<?php echo esc_attr( $unique_id ); ?>" class="ntt--search-label ntt--form-label ntt--obj">
            <span class="ntt--txt"><?php echo esc_html( $search_text ); ?></span>
        </label>
        <div class="ntt--search-textbox ntt--form-element ntt--obj" data-name="Search Textbox">
            <input type="search" name="s" value="<?php echo get_search_query(); ?>" required placeholder="<?php echo esc_attr( $search_text ); ?>" title="<?php echo esc_attr( $search_text ); ?>" inputmode="search" id="ntt--search-text-input-<?php echo esc_attr( $unique_id ); ?>" class="text-input">
        </div>
    </div>
    <div class="ntt--submit-search-axn ntt--submit-axn ntt--axn ntt--obj" data-name="Submit Search Action">
        <button type="submit" title="<?php echo esc_attr( $search_text ); ?>">
            <span class="ntt--txt"><?php echo esc_html( $search_text ); ?></span>
        </button>
    </div>
</form>