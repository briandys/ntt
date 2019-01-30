<?php $unique_id = uniqid( 'search-input-' ); ?>

<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="default-search search cp" data-name="Search">
    <div class="search---cr">
        <div class="search-field field cp" data-name="Search Field">
            <div class="search-field---cr field---cr">
                <label for="<?php echo esc_attr( $unique_id ); ?>" class="search-field-label obj" data-name="Search Field Label">
                    <span class="txt"><?php esc_html_e( 'Search', 'ntt' ); ?></span>
                </label>
                <div class="search-field-textbox textbox obj" data-name="Search Field Textbox">
                    <input type="search" name="s" value="<?php echo get_search_query(); ?>" required placeholder="<?php echo esc_html( 'Search' ); ?>" id="<?php echo esc_attr( $unique_id ); ?>" class="text-input">
                </div>
            </div>
        </div>
        <div class="search-axns form-axns cp" data-name="Search Actions">
            <div class="search-axns---cr form-axns---cr">
                <div class="submit-search-axn submit-axn axn obj" data-name="Submit Search Action">
                    <button type="submit" title="<?php echo esc_attr( 'Go' ); ?>">
                        <span class="txt"><?php esc_html_e( 'Go', 'ntt' ); ?></span>
                    </button>
                </div>
                <div class="reset-search-axn reset-axn axn obj" data-name="Reset Search Action">
                    <button type="reset" title="<?php echo esc_attr( 'Reset' ); ?>">
                        <span class="txt"><?php esc_html_e( 'Reset', 'ntt' ); ?></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>