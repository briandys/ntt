/**
 * NTT JavaScript
 */

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
		addClass( html, 'ntt--dom---loaded--js');
		deleteClass( html, 'ntt--dom---unloaded--js');
	}

	function updateWindowLoadedCss() {
		addClass( html, 'ntt--window---loaded--js');
		deleteClass( html, 'ntt--window---unloaded--js');
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

