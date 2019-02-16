/**
 * Avoid `console` errors in browsers that lack a console.
 */ 
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
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * This is the source file for what is minified in the twentynineteen_skip_link_focus_fix() PHP function.
 *
 * Learn more: https://git.io/vWdr2
 */
( function() {
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
} )();

/**
 * Basic NTT Scripts
 * From Twenty Nineteen WP Theme
 */
( function() {

	var html = document.documentElement;

	/**
	 * Add class
	 *
	 * @param {Object} el
	 * @param {string} cls
	 */
	function addClass(el, cls) {
		if ( ! el.className.match( '(?:^|\\s)' + cls + '(?!\\S)') ) {
			el.className += ' ' + cls;
		}
	}

	/**
	 * Delete class
	 *
	 * @param {Object} el
	 * @param {string} cls
	 */
	function deleteClass(el, cls) {
		el.className = el.className.replace( new RegExp( '(?:^|\\s)' + cls + '(?!\\S)' ),'' );
	}

	function updateDomReadyCss() {
		addClass( html, 'dom--loaded');
		deleteClass( html, 'dom--unloaded');
	}

	function updateWindowLoadedCss() {
		addClass( html, 'window--loaded');
		deleteClass( html, 'window--unloaded');
	}

	/**
	 * Run our priority+ function as soon as the document is `ready`
	 */
	document.addEventListener( 'DOMContentLoaded', function() {
		updateDomReadyCss();
	});

	/**
	 * Run our priority+ function on load
	 */
	window.addEventListener( 'load', function() {
		updateWindowLoadedCss();
	});

} )();

