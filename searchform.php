<?php $unique_id = uniqid( 'search-input-' ); ?>

<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search default-search cp" data-name="Search">
    <div class="search---cr">
        <div class="search-field field cp" data-name="Search Field">
            <div class="search-field---cr field---cr">
                <label for="<?php echo esc_attr( $unique_id ); ?>" class="search-field-label label obj" data-name="Search Field Label">
                    <span class="search-field-label---l">
                        <span class="search-field-label---txt search---text"><?php esc_html_e( 'Search', 'ntt' ); ?></span>
                    </span>
                </label>
                <div class="search-textbox textbox obj" data-name="Search Textbox">
                    <input type="search" name="s" value="<?php echo get_search_query(); ?>" required placeholder="<?php esc_html_e( 'Search', 'ntt' ); ?>" id="<?php echo esc_attr( $unique_id ); ?>" class="search-input text-input">
                </div>
            </div>
        </div>
        <div class="search-axns form-axns axns cp" data-name="Search Actions">
            <div class="search-axns---cr form-axns---cr">
                <div class="submit-search-axn submit-axn axn obj" data-name="Submit Search Action">
                    <button type="submit" class="submit-search-axn---a a" title="<?php esc_attr_e( 'Go', 'ntt' ); ?>">
                        <span class="submit-search-axn---l">
                            <span class="submit-search-axn---txt go---text"><?php esc_html_e( 'Go', 'ntt' ); ?></span>
                        </span>
                    </button>
                </div>
                <div class="reset-search-axn reset-axn axn obj" data-name="Reset Search Action">
                    <button type="reset" class="reset-search-axn---a a" title="<?php esc_attr_e( 'Reset', 'ntt' ); ?>">
                        <span class="reset-search-axn---l">
                            <span class="reset-search-axn---txt reset---text"><?php esc_html_e( 'Reset', 'ntt' ); ?></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>