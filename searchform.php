<?php
$unique_id = uniqid( 'search-text-input-' );
$search_text = __( 'Search', 'ntt' );
$go_text = __( 'Go', 'ntt' );
?>

<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search cp" data-name="Search">
    <div class="search---cr">
        <div class="search-field field cp" data-name="Search Field">
            <div class="search-field---cr field---cr">
                <label for="<?php echo esc_attr( $unique_id ); ?>" class="search-field-label field-label obj">
                    <span class="txt"><?php echo esc_html( $search_text ); ?></span>
                </label>
                <div class="search-field-textbox textbox obj" data-name="Search Field Textbox">
                    <input type="search" name="s" value="<?php echo get_search_query(); ?>" required placeholder="<?php echo esc_attr( $search_text ); ?>" title="<?php echo esc_attr( $search_text ); ?>" inputmode="search" id="<?php echo esc_attr( $unique_id ); ?>" class="text-input">
                </div>
            </div>
        </div>
        <div class="submit-search-axn submit-axn axn obj" data-name="Submit Search Action">
            <button type="submit" title="<?php echo esc_attr( $go_text ); ?>">
                <span class="txt"><?php echo esc_html( $go_text ); ?></span>
            </button>
        </div>
    </div>
</form>