// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
      'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
      'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
      'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
      'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});
  
    while (length--) {
      method = methods[length];
  
      // Only stub undefined methods.
      if (!console[method]) {
        console[method] = noop;
      }
    }
}());

/**
 * File skip-link-focus-fix.js
 * Helps with accessibility for keyboard only users
 * Learn more: https://git.io/vWdr2
 */
(function() {
	var isIe = /(trident|msie)/i.test( navigator.userAgent );

	if ( isIe && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
})();


var $document,
    $window,
    $html,
    $body,
    documentHeight,
    windowWidth,
    windowHeight,
    
    $ae,
    $comments,
    $content,
    $goStartNav,
    $entityPrimaryDescription,
    $entityPrimaryName,
    $entityNav,
    $entryContent,
    $entryHeader,
    $entryModule,
    $menuItemPageItem,
    $postPasswordForm,
    $widgetSearch,
    $wildCard,
    
    wrapTextNode,
    removeEmpty;

( function( $ ) {

    $document = $( document );
    $window = $( window );
    $html = $( document.documentElement );
    $body = $( document.body );
    
    $ae = $( 'a, button, input, object, select, textarea' );
    $comments = $( '#comments' );
    $content = $( '.content---cr' );
    $goStartNav = $( '#go-start-nav' );
    $entityPrimaryDescription = $( '#entity-primary-description' );
    $entityPrimaryName = $( '#entity-primary-name' );
    $entityNav = $( '#entity-primary-nav' );
    $entryContent = $( '.entry-content' );
    $entryHeader = $( '.entry-header' );
    $entryModule = $( '#content' );
    $menuItemPageItem = $( '.page_item, .menu-item' );
    $postPasswordForm = $( '.post-password-form' );
    $widgetSearch = $( '.widget_search' );
    $wildCard = $( '#wild-card' ).find( '.wild-card---cr' );

    /**
     * Spinner
     */
    $wildCard.append( $( '<div class="spinner"></div>' ) );

    /**
     * Adding Classes
     */
    $menuItemPageItem.addClass( 'navi' );

    /**
     * Scrolled
     * https://stackoverflow.com/a/7392655
     */
    var scrolledCounter = 0;
    
    $.fn.scrolled = function( waitTime, fn ) {
        
        if ( typeof waitTime === "function" ) {
            fn = waitTime;
            waitTime = 640;
        }
        
        var tag = "scrollTimer" + scrolledCounter++;
        
        this.scroll( function () {
            
            var self = $( this ),
                timer = self.data( tag );
            
            if ( timer ) {
                clearTimeout( timer );
            }
            
            timer = setTimeout(function () {
                self.removeData( tag );
                fn.call( self[0] );
            }, waitTime);
            self.data( tag, timer );
        } );
    }

    /**
     * HTML_OK Functions
     */
    htmlOkFn = {
        
        // Button OBJ
        buttonObj: function( css, customCss, dataName, textLabel, textCss, icon ) {

            var $text = $( '<span />', {
                'class': textCss + '---txt' + ' ' + 'txt',
                'text': textLabel
            } );

            var $label = $( '<span />', {
                'class': css + '---l' + ' ' + 'l'
            } ).append( $text ).clone().append( icon );

            var $elem = $( '<button />', {
                'class': css + '---a a b',
                'title': textLabel
            } ).append( $label );

            var $obj = $( '<div />', {
                'class': css + ' ' + customCss + ' ' + 'obj',
                'data-name': dataName
            } ).append( $elem );

            return $obj;
        },

        group: function( css, customCss, dataName ) {

            var $cr = $( '<div />', {
                'class': css + '---cr',
            } );

            var $group = $( '<div />', {
                'class': css + ' ' + customCss + ' ' + 'group',
                'data-name': dataName
            } ).append( $cr );

            return $group;
        },

        cp: function( css, customCss, dataName ) {
            
            var $cr = $( '<div />', {
                'class': css + '---cr',
            } );

            var $cp = $( '<div />', {
                'class': css + ' ' + customCss + ' ' + 'cp',
                'data-name': dataName
            } ).append( $cr );

            return $cp;
        },

        overlayObj: function( css, dataName ) {
            
            var $obj = $( '<div />', {
                'class': css + ' ' + 'overlay' + ' ' + 'obj',
                'data-name': dataName
            } );

            return $obj;
        },

        content: function( css ) {
            
            var $content = $( '<div />', {
                'class': css + '-content',
            } );

            return $content;
        }
    };

    /**
     * Wrap Text Node
     * https://stackoverflow.com/a/18727318
     */
    wrapTextNode = function( $elem ) {
        var $textNodeMU = $( '<span />', { 'class': 'txt' } );
        $elem.contents().filter( function() {
            return this.nodeType === 3;
        } ).wrap( $textNodeMU );
    }

    /**
     * Remove Empty Elements
     * https://stackoverflow.com/a/18727318
     */
    removeEmpty = function( $elem ) {
        $elem.each( function() {
            var $this = $( this );
            if ( $this.html().replace(/\s|&nbsp;/g, '' ).length == 0 ) {
                $this.remove();
            }
        } );
    }

    /**
     * Hidden Conditional
     */
    isHidden = function( $elem ) {
        if ( ! $elem.length || $elem.css( 'margin' ) == '-1px' || $elem.is( ':hidden' ) ) {
            return true;
        }
    }

    /**
     * Tab Cycle
     * https://stackoverflow.com/a/21811463
     */
    var tabCycleFn = {
        
        on: function( $elem ) {
            var inputs = $elem.find( $ae ).filter( ':visible' ),
                firstInput = inputs.first(),
                lastInput = inputs.last();

            // Set focus on first input
            firstInput.focus();

            // Redirect last tabbing to first input
            lastInput.on( 'keydown.ntt', function( e ) {
                if ( e.which === 9 && !e.shiftKey ) {
                    e.preventDefault();
                    firstInput.focus();
                }
            } );

            // Redirect first shift tabbing to last input
            firstInput.on( 'keydown.ntt', function( e ) {
                if ( e.which === 9 && e.shiftKey ) {
                    e.preventDefault();
                    lastInput.focus();
                }
            } );
        },

        off: function( $elem ) {
            var inputs = $elem.find( $ae ).filter( ':visible' ),
                firstInput = inputs.first(),
                lastInput = inputs.last();

            lastInput.off( 'keydown.ntt' );
            firstInput.off( 'keydown.ntt' );
        }
    };
    
    /**
     * Navi Overflow
     */
    function navOverflow( $elem ) {
        var $navTrunk = $elem.find( 'ul:first' ),
            $navTrunkNavi = $navTrunk.children(),
            $navTrunkOverflownNavi,
            $navi,
            $navBranch,
            $overflownNaviTrunk,
            icon = $( nttData.ellipsisIcon );

        $navTrunk.addClass( 'interim-overflow-nav' );

        $navTrunkNavi.each( function() {
            var $this = $( this ),
                naviOffset = parseInt( Math.round( $this.offset().left ) ),
                naviWidth = parseInt( $this.outerWidth() ),
                buffer = 48,
                naviOffsetWidth,
                navWidth;

            navWidth = $entityNav.width() - buffer;
            naviOffsetWidth = naviOffset + naviWidth;

            if ( naviOffsetWidth > navWidth ) {
                $this.addClass( 'overflown-navi' );
            } else {
                $this.addClass( 'primary-navi' );
            }
        } );
        
        $navTrunk
            .addClass( 'overflow-nav' )
            .removeClass( 'interim-overflow-nav' );

        $navTrunkOverflownNavi = $navTrunk.find( '.overflown-navi' );

        $navBranch = $( '<ul />', {
            'class': 'children nav-branch',
        } );

        $navi = $( '<li />', {
            'class': 'overflown-navi-trunk page_item page_item_has_children menu-item menu-item-has-children navi'
        } ).append( $navBranch );

        $navTrunkOverflownNavi.wrapAll( $navi );

        $overflownNaviTrunk = $( $elem ).find( '.overflown-navi-trunk' );

        $overflownNaviTrunk.prepend(
            htmlOkFn.buttonObj(
                'sub-nav-toggle-axn',
                'toggle-axn axn',
                'Sub-Navigation Toggle Action',
                'hide',
                'toggle-sub-nav',
                icon
            )
        );
    }

    /**
     * Sub-Navigation Feature
     */
    function subNav( $elem ) {

        if ( $html.hasClass( 'ntt-sub-nav-f5e' ) ) {
            $elem.addClass( 'sub-nav-f5e' );
        } else {
            return;
        }
        
        var $navi = $( '.page_item, .menu-item' ),
            $children = $( '.page_item_has_children > .children, .menu-item-has-children > .sub-menu' ),
            $parents,
            showText = nttData.showSubNavText,
            hideText = nttData.hideSubNavText,
            icon = $( nttData.downArrowheadIcon ),
            $parent,
            $subNavButton,
            $subNavFeature = $( '.sub-nav-f5e' ),
            $navTrunk = $elem.find( 'ul' ).first(),
            $navBranch = $navTrunk.find( 'ul' ),
            $currentNavItem = $elem.find( '.current_page_item, .current-menu-item' );
        
        $elem.find( $children ).before(
            htmlOkFn.buttonObj(
                'sub-nav-toggle-axn',
                'toggle-axn axn',
                'Sub-Navigation Toggle Action',
                hideText,
                'toggle-sub-nav',
                icon
            )
        );

        // Define structure by adding CSS class names
        $navTrunk.addClass( 'nav-trunk' );
        $navBranch.addClass( 'nav-branch' );
        $currentNavItem.addClass( 'navi--current' );
    
        // Implement Navigation Overflow
        navOverflow( $elem );

        // Defining elements
        $parents = $( '.page_item_has_children, .menu-item-has-children' );
        $subNavButton = $elem.find( '.sub-nav-toggle-axn---a' );

        // Functions
        subNavFn = {

            // Activate
            on: function() {
                var $this = $( this );
                
                $this.closest( $parents )
                    .addClass( 'active-sub-nav' )
                    .removeClass( 'inactive-sub-nav' );

                $this.attr( {
                    'aria-expanded': 'true',
                    'title': hideText
                } );

                $this.find( '.toggle-sub-nav---txt' ).text( hideText );

                $subNavFeature
                    .addClass( 'off-f5e' )
                    .removeClass( 'on-f5e' );
                
                $this.closest( $subNavFeature )
                    .addClass( 'on-f5e' )
                    .removeClass( 'off-f5e' );

                $html
                    .addClass( 'sub-nav--on' )
                    .removeClass( 'sub-nav--off' );
            },
            
            // Deactivate in <html>
            htmlOff: function() {
                
                if ( ! $parents.hasClass( 'active-sub-nav' ) ) {
                    $html
                        .addClass( 'sub-nav--off' )
                        .removeClass( 'sub-nav--on' );
                }
            },

            // Deactivate
            off: function() {
                var $this = $( this );
                
                $this.closest( $parents )
                    .addClass( 'inactive-sub-nav' )
                    .removeClass( 'active-sub-nav' );

                $this.attr( {
                    'aria-expanded': 'false',
                    'title': showText
                } );

                $this.find( '.toggle-sub-nav---txt' ).text( showText );

                $subNavFeature
                    .addClass( 'on-f5e' )
                    .removeClass( 'off-f5e' );
                
                $this.closest( $subNavFeature )
                    .addClass( 'off-f5e' )
                    .removeClass( 'on-f5e' );

                subNavFn.htmlOff();
            },

            // Deactivate All
            allOff: function() {

                $parents
                    .addClass( 'inactive-sub-nav' )
                    .removeClass( 'active-sub-nav' );

                $navi
                    .removeClass( 'active-other-sub-nav' );

                $subNavButton.attr( {
                    'aria-expanded': 'false',
                    'title': showText
                } );

                $elem.find( '.toggle-sub-nav---txt' ).text( showText );

                $subNavFeature
                    .addClass( 'off-f5e' )
                    .removeClass( 'on-f5e' );

                subNavFn.htmlOff();
            },

            // Deactivate Siblings with Children
            siblingsOff: function() {
                var $this = $( this );

                $this.closest( $parents ).siblings( '.page_item_has_children, .menu-item-has-children' )
                    .addClass( 'inactive-sub-nav' )
                    .removeClass( 'active-sub-nav' );
            },

            // Activate Sub-Nav Item Siblings
            subNavSiblingsOn: function() {
                var $this = $( this );
                
                $this.closest( $parents ).nextAll()
                    .removeClass( 'active-other-sub-nav' );
            },
            
            // Deactivate Sub-Nav Item Siblings
            subNavSiblingsOff: function() {
                var $this = $( this );
                
                $this.closest( $parents ).nextAll()
                    .addClass( 'active-other-sub-nav' );
            }
        };

        // Run: Deactivate All
        subNavFn.allOff();

        // User Action: Button Click
        $subNavButton.on( 'click.ntt', function( e ) {
            e.preventDefault();
            
            var $this = $( this );
            $parent = $this.closest( $parents );

            if ( $parent.hasClass( 'inactive-sub-nav' ) ) {
                subNavFn.on.apply( this );
                
                if ( $elem.is( $entityNav ) ) {
                    subNavFn.subNavSiblingsOff.apply( this );
                }
            
            } else if ( $parent.hasClass( 'active-sub-nav' ) ) {
                subNavFn.off.apply( this );
                
                if ( $elem.is( $entityNav ) ) {
                    subNavFn.subNavSiblingsOn.apply( this );
                }
            }

            if ( $elem.is( $entityNav ) ) {
                subNavFn.siblingsOff.apply( this );
            }
        } );

        // User Action: Document Click
        $document.on( 'touchmove.ntt click.ntt', function ( e ) {
            if ( $html.hasClass( 'sub-nav--on' ) && ! $( e.target ).closest( $parents ).length ) {
                subNavFn.allOff();
            }
        } );
        
        // User Action: ESC Key
        $document.on( 'keyup.ntt', function ( e ) {
            if ( $html.hasClass( 'window--loaded' ) && $html.hasClass( 'sub-nav--on' ) && e.keyCode == 27 ) {
                subNavFn.allOff();
            }
        } );
    }

    subNav( $( '#entity-primary-nav' ) );
    subNav( $( '.widget_nav_menu' ) );
    subNav( $( '.widget_pages' ) );

    /**
     * Primary Search Feature
     */
    ( function() {

        $( '#entity-primary-axns' ).find( '.widget_search:first' )
            .attr( 'id', 'primary-search' )
            .attr( 'data-name', 'Primary Search' );
        
        var $elem = $( '#primary-search' ),
            $search = $elem.find( '.search' ),
            toggleText = nttData.toggleSearchText,
            showText = nttData.showSearchText,
            hideText = nttData.hideSearchText,
            searchIcon = $( nttData.searchIcon ),
            dismissIcon = $( nttData.dismissIcon ),
            toggleSearchIcon = $( nttData.searchIcon ),
            toggleDismissIcon = $( nttData.dismissIcon ),
            $toggle, $toggleText,
            $submitLabel = $elem.find( '.submit-search-axn---l' ),
            $reset = $elem.find( '.reset-search-axn---a' ),
            $resetLabel = $elem.find( '.reset-search-axn---l' ),
            $input = $elem.find( '.search-input' );

        if ( $elem.length && $html.hasClass( 'ntt-primary-search-f5e' ) ) {
            $elem.addClass( 'primary-search-f5e primary-action' )
        } else {
            $html.removeClass( 'ntt-primary-search-f5e' );
            return;
        }

        // Create Toggle Button
        $search.before(
            htmlOkFn.buttonObj(
                'primary-search-toggle-axn',
                'toggle-axn axn',
                'Primary Search Toggle Action',
                toggleText,
                'toggle-search',
                toggleSearchIcon
            )
        );

        // Icons in Buttons
        $submitLabel.append( searchIcon );
        $resetLabel.append( dismissIcon );

        $toggle = $elem.find( '.primary-search-toggle-axn---a' );
        $toggleText = $elem.find( '.toggle-search---txt' );

        // Functions
        primarySearchFn = {

            // Activate
            on: function() {
                
                $toggle.attr( {
                    'aria-expanded': 'true',
                    'title': hideText
                } );

                $toggleText
                    .text( hideText )
                    .after( toggleDismissIcon );

                toggleSearchIcon.remove();
                
                $elem
                    .addClass( 'active-search on' )
                    .removeClass( 'inactive-search off' );

                $html
                    .addClass( 'ntt-primary-search-f5e--on' )
                    .removeClass( 'ntt-primary-search-f5e--off' );
                
                tabCycleFn.on( $elem );

                $input.focus().select();
            },

            // Deactivate
            off: function() {
                
                $toggle.attr( {
                    'aria-expanded': 'false',
                    'title': showText
                } );

                $toggleText
                    .text( showText )
                    .after( toggleSearchIcon );

                toggleDismissIcon.remove();
                
                $elem
                    .addClass( 'inactive-search off' )
                    .removeClass( 'active-search on' );

                $html
                    .addClass( 'ntt-primary-search-f5e--off' )
                    .removeClass( 'ntt-primary-search-f5e--on' );
                
                tabCycleFn.off( $elem );
            },

            // Toggle
            toggle: function() {
                if ( $elem.hasClass( 'off' ) ) {
                    primarySearchFn.on();
                } else if ( $elem.hasClass( 'on' ) ) {
                    primarySearchFn.off();
                }
            },

            // Input Status
            inputPopulation: function() {

                if ( $input.val() == '' ) {
                    $elem
                        .addClass( 'empty-search' )
                        .removeClass( 'populated-search' );
                } else if ( ! $input.val() == '' ) {
                    $elem
                        .addClass( 'populated-search' )
                        .removeClass( 'empty-search' );
                }
            }
        };

        primarySearchFn.off();
        primarySearchFn.inputPopulation();

        // User Action: Toggle Button Click
        $toggle.on( 'click.ntt', function( e ) {
            e.preventDefault();
            
            primarySearchFn.toggle();
        } );

        // User Action: Reset Button Click
        $reset.on( 'click.ntt', function( e ) {
            e.preventDefault();
            
            $input.val( '' ).focus();
            primarySearchFn.inputPopulation();
        } );

        // User Action: Content Input
        $input.on( 'keypress.ntt input.ntt', function() {
            primarySearchFn.inputPopulation();
            tabCycleFn.off( $elem );
        } );

        // User Action: Document Click
        $document.on( 'touchmove.ntt click.ntt', function ( e ) {
            if ( $elem.hasClass( 'on' ) && ! $( e.target ).closest( $toggle ).length && ! $( e.target ).closest( $search ).length ) {
                primarySearchFn.off();
            }
        } );
        
        // User Action: ESC Key
        $document.on( 'keyup.ntt', function ( e ) {
            if ( $html.hasClass( 'window--loaded' ) && $elem.hasClass( 'on' ) && e.keyCode == 27 ) {
                primarySearchFn.off();
            }
        } );
    } ) ();

    /**
     * Overflow Actions Feature
     */
    ( function() {

        var $elem = $( '#entity-primary-axns' ),
            $widgets = $elem.find( '.widget:not(.primary-action)' );

        if ( $widgets.length && $html.hasClass( 'ntt-overflow-axns-f5e' ) ) {
            $elem.addClass( 'overflow-axns-f5e' );
        } else {
            $html.removeClass( 'ntt-overflow-axns-f5e' );
            return;
        }

        var $cr = $elem.children(),
            $overflowActions,
            $overflowActionsGroup,
            $overflowActionsGroupCr,
            toggleText = nttData.toggleActionsText,
            showText = nttData.showActionsText,
            hideText = nttData.hideActionsText,
            moreIcon = $( nttData.ellipsisIcon ),
            $toggle, $toggleText,
            nttF5eOn = 'ntt-overflow-axns-f5e--on',
            nttF5eOff = 'ntt-overflow-axns-f5e--off',
            f5eOn = 'overflow-axns-f5e--on',
            f5eOff = 'overflow-axns-f5e--off',
            on = 'active-overflow-axns',
            off = 'inactive-overflow-axns-f5e';

        $widgets.wrapAll(
            htmlOkFn.cp(
                'overflow-axns',
                'axns',
                'Overflow Actions'
            )
        );

        $widgets.wrapAll(
            htmlOkFn.group(
                'overflow-axns-group',
                'axns-group',
                'Overflow Actions Group'
            )
        );

        $overflowActions = $elem.find( '.overflow-axns' );
        $overflowActionsGroup = $overflowActions.find( '.overflow-axns-group' );
        $overflowActionsGroupCr = $overflowActionsGroup.find( '.overflow-axns-group---cr' );

        $cr.append( $overflowActions );

        // Create Toggle Button
        $overflowActionsGroup.before(
            htmlOkFn.buttonObj(
                'overflow-axns-toggle-axn',
                'toggle-axn axn',
                'Overflow Actions Toggle Action',
                toggleText,
                'toggle-actions',
                moreIcon
            )
        );

        $toggle = $overflowActions.find( '.overflow-axns-toggle-axn---a' );
        $toggleText = $( '.toggle-actions---txt' );

        // Functions
        overflowActionsFn = {

            // Activate
            on: function() {
                var $this = $( this ),
                    overflowActionsOffset;

                $this.attr( {
                    'aria-expanded': 'true',
                    'title': hideText
                } );

                $this.find( $toggleText ).text( hideText );
                
                $this.closest( $elem )
                    .addClass( on + ' ' + f5eOn )
                    .removeClass( off + ' ' + f5eOff );

                $html
                    .addClass( nttF5eOn )
                    .removeClass( nttF5eOff );

                // CSS Max Height
                overflowActionsOffset = $overflowActionsGroupCr.offset().top + 'px';
                
                $overflowActionsGroupCr.css( 'max-height', 'calc( 100vh - ( ( 3rem + ' + overflowActionsOffset + ' ) - .5rem ) )' );
                
                tabCycleFn.on( $elem );
            },

            // Deactivate
            off: function() {
                var $this = $( this );

                $this.attr( {
                    'aria-expanded': 'false',
                    'title': showText
                } );

                $this.find( $toggleText ).text( showText );
                
                $elem
                    .addClass( off + ' ' + f5eOff )
                    .removeClass( on + ' ' + f5eOn );

                $html
                    .addClass( nttF5eOff )
                    .removeClass( nttF5eOn );
                    
                tabCycleFn.off( $elem );
            },

            // Deactivate All
            allOff: function() {

                $toggle.attr( {
                    'aria-expanded': 'false',
                    'title': showText
                } );

                $overflowActions.find( $toggleText ).text( showText );

                $elem
                    .addClass( off + ' ' + f5eOff )
                    .removeClass( on + ' ' + f5eOn );

                $html
                    .addClass( nttF5eOff )
                    .removeClass( nttF5eOn );
            },
        };

        // Run: Deactivate
        overflowActionsFn.allOff();

        // User Action: Button Click
        $toggle.on( 'click.ntt', function( e ) {
            e.preventDefault();
            
            var $this = $( this );
            $elem = $this.closest( $elem );

            if ( $elem.hasClass( off ) ) {
                overflowActionsFn.on.apply( this );
            
            } else if ( $elem.hasClass( on ) ) {
                overflowActionsFn.off.apply( this );
            }
        } );

        // User Action: Document Click
        $document.on( 'touchmove.ntt click.ntt', function ( e ) {
            if ( $html.hasClass( nttF5eOn ) && ! $( e.target ).closest( $overflowActions ).length ) {
                overflowActionsFn.off();
            }
        } );
        
        // User Action: ESC Key
        $document.on( 'keyup.ntt', function ( e ) {
            if ( $html.hasClass( 'window--loaded' ) && $html.hasClass( nttF5eOn ) && e.keyCode == 27 ) {
                overflowActionsFn.off();
            }
        } );
    } ) ();

    /**
     * Primary Menu Feature
     */
    ( function() {

        var $elem = $( '#entity-header-aside' );

        // Gatekeeper: Check if element itself exists and if the feature is deliberately declared in Features Functions (functions/features.php)
        if ( $html.hasClass( 'ntt-primary-menu-f5e' ) && $html.hasClass( 'entity-header-aside--enabled' ) ) {
            $elem.addClass( 'primary-menu-f5e' );
        } else {
            $html.removeClass( 'ntt-primary-menu-f5e' );
            return;
        }

        var $widgets = $elem.find( '.widget' ),
            on = 'active-primary-menu-f5e',
            off = 'inactive-primary-menu-f5e',
            nttF5eOn = 'ntt-primary-menu-f5e--on',
            nttF5eOff = 'ntt-primary-menu-f5e--off',
            $primaryMenu,
            $toggle, $toggleLabel, $toggleText,
            showText = nttData.showMenuText,
            hideText = nttData.hideMenuText,
            toggleIcon = $( nttData.burgerIcon ),
            dismissIcon = $( nttData.dismissIcon );

        // Create Primary Menu
        $widgets.wrapAll(
            htmlOkFn.cp(
                'primary-menu',
                'menu',
                'Primary Menu'
            )
        );

        // Create Primary Menu Group
        $widgets.wrapAll(
            htmlOkFn.group(
                'primary-menu-group',
                'menu-group',
                'Primary Menu Items'
            )
        );

        // Define Objects
        $primaryMenu = $( '.primary-menu' );
        $menuGroup = $( '.primary-menu-group' );

        // Create Toggle Button
        $primaryMenu.before(
            htmlOkFn.buttonObj(
                'primary-menu-toggle-axn',
                'toggle-axn',
                'Primary Menu Toggle',
                'Toggle Menu',
                'toggle-menu',
                toggleIcon
            )
        );

        // Create Dismiss Button
        $menuGroup.before(
            htmlOkFn.buttonObj(
                'primary-menu-dismiss-axn',
                'dismiss-axn',
                'Primary Menu Dismiss',
                'Dismiss Menu',
                'dismiss-menu',
                dismissIcon
            )
        );

        // Define Objects
        $toggle = $elem.find( '.primary-menu-toggle-axn---a' );
        $dismiss = $elem.find( '.primary-menu-dismiss-axn---a' );
        $toggleLabel = $toggle.find( '.primary-menu-toggle-axn---l' );
        $toggleText = $toggleLabel.find( '.toggle-menu---txt' );

        // Create Overlay
        $wildCard.append(
            htmlOkFn.overlayObj(
                'primary-menu-overlay',
                'Primary Menu Overlay'
            )
        );

        // Functions
        primaryMenuFn = {

            on: function() {

                $toggle.attr( {
                    'aria-expanded': 'true',
                    'title': hideText
                } );

                $toggleText.text( hideText );

                $elem
                    .addClass( on )
                    .removeClass( off );

                $html
                    .addClass( nttF5eOn )
                    .removeClass( nttF5eOff );

                tabCycleFn.on( $elem );

            },

            off: function() {

                $toggle.attr( {
                    'aria-expanded': 'false',
                    'title': showText
                } );

                $toggleText.text( showText );

                $elem
                    .addClass( off )
                    .removeClass( on );

                $html
                    .addClass( nttF5eOff )
                    .removeClass( nttF5eOn );

                tabCycleFn.off( $elem );
            },

            toggle: function() {
                
                if ( $elem.hasClass( off ) ) {
                    primaryMenuFn.on();    
                } else if ( $elem.hasClass( on ) ) {
                    primaryMenuFn.off();  
                }
            }
        };

        // Initialize Deactivation
        primaryMenuFn.off();

        // User Action: Toggle Button Click
        $toggle.on( 'click.ntt', function(e) {
            e.preventDefault();

            primaryMenuFn.toggle();
        } );

        // User Action: Dismiss Button Click
        $dismiss.on( 'click.ntt', function(e) {
            e.preventDefault();

            primaryMenuFn.off();
        } );

        // User Action: Document Click
        $document.on( 'touchmove.ntt click.ntt', function ( e ) {
            if ( $elem.hasClass( on ) && ! $( e.target ).closest( $elem ).length ) {
                primaryMenuFn.off();
            }
        } );
        
        // User Action: ESC Key
        $document.on( 'keyup.ntt', function ( e ) {
            if ( $html.hasClass( 'window--loaded' ) && $elem.hasClass( on ) && e.keyCode == 27 ) {
                primaryMenuFn.off();
            }
        } );
    } ) ();

    /**
     * Go to Content Navigation Feature
     */
    ( function() {

        var $elem = $( '#go-content-nav' );
        
        if ( $html.hasClass( 'ntt-go-content-nav-f5e' ) ) {
            $elem.addClass( 'go-content-nav-f5e' );
        } else {
            return;
        }
        
        var $navi = $elem.find( '.go-content-navi---a' );

        // Create Overlay
        $wildCard.append(
            htmlOkFn.overlayObj(
                'go-content-nav-overlay',
                'Go to Content Navigation Overlay'
            )
        );
        
        // Functions
        goContentNavFn = {
            
            // Activate
            on: function() {
                $elem
                    .addClass( 'go-content-nav--on' )
                    .removeClass( 'go-content-nav--off' );
                    
                $html
                    .addClass( 'ntt-go-content-nav--on' )
                    .removeClass( 'ntt-go-content-nav--off' );
            },
            
            // Deactivate
            off: function() {
                $elem
                    .addClass( 'go-content-nav--off' )
                    .removeClass( 'go-content-nav--on' );

                $html
                    .addClass( 'ntt-go-content-nav--off' )
                    .removeClass( 'ntt-go-content-nav--on' );
            }
        };
        
        goContentNavFn.off();

        if ( $elem.hasClass( 'go-content-nav--on' ) ) {
            
        } else if ( $elem.hasClass( 'go-content-nav--off' ) ) {
            $html
                .addClass( 'ntt-go-content-nav--off' )
                .removeClass( 'ntt-go-content-nav--on' );
        }
        
        // User Actions
        $navi
            .on( 'focusin.ntt', function() {
                goContentNavFn.on();
            } )
            .on( 'focusout.ntt', function() {
                goContentNavFn.off();
            } )
            .on( 'click.ntt', function() {
                $navi.blur();
                goStartNavFn.off();
            } );

        // User Action: ESC Key
        $document.on( 'keyup.ntt', function ( e ) {
            if ( $html.hasClass( 'window--loaded' ) && $elem.hasClass( 'go-content-nav--on' ) && e.keyCode == 27 ) {
                goContentNavFn.off();
                $navi.blur();
            }
        } );
    } ) ();

    ( function() {
        var $textWidget = $( '.textwidget' ),
            $htmlWidgetContent,
            $contentP = $content.find( '> p' ),
            $visuals,
            $visualsA,
            $contentImg = $content.find( 'img' ),
            $contentGallery = $content.find( '.gallery' ),
            $contentAll;

        // Calendar Widget
        $( '.widget_calendar td:has( a )' ).each( function() {
            $( this ).addClass( 'widget-calendar-date--active' );
        } );

        wrapTextNode( $( '.widget_calendar th, .widget_calendar td' ) );

        // Meta Widget
        wrapTextNode( $( '.widget_meta a' ) );

        // Recent Comments Widget
        wrapTextNode( $( '.widget_recent_comments li' ) );

        // Recent Comments Widget
        wrapTextNode( $( '.tag-cloud-link' ) );

        // Text, Custom HTML Widgets
        $textWidget
            .addClass( 'content' )
            .wrapInner( '<div class="content---cr"></div>' );

        $htmlWidgetContent = $( '.custom-html-widget .content---cr' );
        wrapTextNode( $htmlWidgetContent );
        removeEmpty( $htmlWidgetContent.find( '> .txt' ) );

        // Table
        wrapTextNode( $( 'td, th' ) );
        
        // Content
        wrapTextNode( $content );
        wrapTextNode( $contentP );

        removeEmpty( $content.find( '.txt' ) );

        $contentAll = $content.children();
        removeEmpty( $contentAll );

        $content.find( 'img' ).on( "error", function() {
            $( this ).addClass( 'unloaded-visuals---img');
        } );

        // Content Images
        // <a><img></a>
        $contentImg.each( function() {
            var $this = $( this );
            $this.parent( 'a' ).addClass( 'visuals---a' );
        } );

        // Identify <p> that contains only one <img>
        $contentP.each( function(){
            var $this = $( this ),
                $count = $this.contents().filter( function(){ return this.nodeType == Node.ELEMENT_NODE || ( this.nodeType == Node.ELEMENT_NODE && !!$.trim( this.nodeValue ) ) } ).length,
                $text = $this.children( '.txt' ).length,
                $image = $this.children( 'img' ).length,
                $anchor = $this.children( '.visuals---a' ).length;

            if ( $count == 1 && ( $image || $anchor ) ) {
                $this.addClass( 'solo-visuals' )
            }

            if ( $text >= 1 && ( $image >= 1 || $anchor >= 1 ) ) {
                $this.addClass( 'textual-visuals' )
            }
        } );

        $visuals = $( '.solo-visuals' );
        $visualsA = $( '.visuals---a' );

        // Duplicate <img> classes to parent <a> and <p>
        $contentImg.each( function() {
            var $this = $( this );
            $this.closest( $visuals ).addClass( $this.attr( 'class' ) );
            $this.closest( $visualsA ).addClass( $this.attr( 'class' ) );
        } );

        // Gallery
        $contentGallery.has( '.gallery-caption' ).addClass( 'captioned-gallery' )
            .closest( '.gallery-wrapper' ).addClass( 'captioned-gallery' );

        $( '.cm-singular .content---cr' ).children( 'p:has( [id*=more-]:only-child )' ).addClass( 'show-more-marker');
            
    } ) ();

    /**
     * Post Password Form
     */
    wrapTextNode( $postPasswordForm.find( 'label' ) );
    $postPasswordForm.find( '[id*="pwbox"]' ).closest( 'p' ).addClass('post-password-form-elements' );
    $postPasswordForm.find( '[type="password"]' ).attr( 'placeholder', 'Password' );

    /**
     * Content Type Feature
     */
    function contentType( $elem ) {
        $content.find( $elem ).wrap( htmlOkFn.content( $elem ) );
    }

    contentType( 'code' );
    contentType( 'embed' );
    contentType( 'iframe' );
    contentType( 'pre' );
    contentType( 'select' );
    contentType( 'table' );

    /**
     * Hidden Entity Description
     */
    if ( isHidden( $entityPrimaryDescription ) ) {
        
        $html
            .addClass( 'entity-description--empty' )
            .removeClass( 'entity-description--populated' );
    }

    /**
     * Hidden Entity Name
     */
    if ( isHidden( $entityPrimaryName ) ) {
        
        $html
            .addClass( 'entity-name--empty' )
            .removeClass( 'entity-name--populated' );
    }

    /**
     * Skip tabbing on Visually Hidden elements
     * https://stackoverflow.com/q/2239567
     */
    $( 'a:not(#go-content-navi---a), button' ).each( function() {
        var $this = $( this );
        
        if ( $this.parents().filter( function() { return $( this ).css( 'margin' ) == '-1px'; } ).eq( 0 ).css( 'margin' ) ) {
            $this.attr( 'tabindex', -1 );
        }
    } );

    /**
     * Private and Protected Entry Names
     */
    ( function() {
        
        var $private = $entryModule.find( $( '.entry-name---txt:contains("Private:")' ) ),
            $protected = $entryModule.find( $( '.entry-name---txt:contains("Protected:")' ) ),
            $privateText = nttData.privateText,
            $protectedText = nttData.protectedText,
            $entryName = $entryModule.find( $( '.entry-name---txt' ) );
        
        $private.html( function( _, html ) {
           return html.split( "Private:" );
        } ).before( "<span class='classified---line line'><span class='private---txt txt'>"+ $privateText + "</span><span class='colon---txt txt'>:</span></span>" );
        
        $protected.html( function( _, html ) {
           return html.split( "Protected:" );
        } ).before( "<span class='classified---line line'><span class='protected---txt txt'>"+ $protectedText + "</span><span class='colon---txt txt'>:</span></span>" );

        wrapTextNode( $entryName );
    } ) ();

    /**
     * Document Ready
     */
    $document.ready( function() {
        
        $html
            .addClass( 'dom--ready' )
            .removeClass( 'dom--unready' );
    
    } );
    
    /**
     * Window Load
     */
    $window.load( function() {

        $html
            .addClass( 'window--loaded' )
            .removeClass( 'window--unloaded' );

        $( '.spinner' ).remove();

        /**
         * Go to Start Nav Feature
         */
        ( function() {

            var $elem = $goStartNav;

            if ( $html.hasClass( 'ntt-go-start-nav-f5e' ) ) {
                $elem.addClass( 'go-start-nav-f5e' );
            } else {
                return;
            }
            
            documentHeight = document.body.offsetHeight;
            windowHeight = window.innerHeight;

            var $navi = $elem.find( '.go-start-navi---a' ),
                $goStartNavLabel = $goStartNav.find( '.go-start-navi---l' );

            // Icon
            $goStartNavLabel.append( $( nttData.upArrowIcon ) );
            
            // Functions
            goStartNavFn = {
                
                // Activate
                on: function() {
                    $elem
                        .addClass( 'go-start-nav--on' )
                        .removeClass( 'go-start-nav--off' );
                    $html
                        .addClass( 'ntt-go-start-nav--on' )
                        .removeClass( 'ntt-go-start-nav--off' );
                },

                // Deactivate
                off: function() {
                    $elem
                        .addClass( 'go-start-nav--off' )
                        .removeClass( 'go-start-nav--on' );
                    $html
                        .addClass( 'ntt-go-start-nav--off' )
                        .removeClass( 'ntt-go-start-nav--on' );
                },

                activation: function() {
                    var buffer = windowHeight / 2;

                    if ( documentHeight > ( windowHeight + buffer ) ) {
                        
                        function criteriaMatch() {
                            
                            if ( $elem.hasClass( 'go-start-nav--off' ) && ( ( windowHeight + window.pageYOffset ) >= documentHeight - buffer ) ) {
                                goStartNavFn.on();
                            }
                        }
                        
                        criteriaMatch();

                        $window.scrolled( function() {
                            
                            criteriaMatch();

                            if ( $elem.hasClass( 'go-start-nav--on' ) && window.pageYOffset <= ( buffer ) ) {
                                goStartNavFn.off();
                            }
                        } );
                    }
                }
            };
            
            goStartNavFn.off();
            
            goStartNavFn.activation();
            
            // User Actions
            $navi
                .on( 'focusin.ntt', function() {
                    goStartNavFn.on();
                } )
                .on( 'click.ntt', function() {
                    $( this ).blur();
                } );
        } ) ();
    } );
} )( jQuery );