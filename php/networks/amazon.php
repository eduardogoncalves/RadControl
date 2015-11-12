<?php

/**
 * Amazon network class
 *
 * @since 0.1
 */
class AdControl_Amazon {

	/**
	 * Instantiate
	 *
	 * @since 0.2
	 */
	function __construct() {
		add_action( 'wp_head', array( $this, 'insert_head_amazon' ), 25 );
	}

	function insert_head_amazon() {
		echo <<<HTML
		<script type="text/javascript" src="//c.amazon-adsystem.com/aax2/amzn_ads.js"></script>
		<script type="text/javascript">
			try {
				amznads.getAds("3033");
			} catch(e) { /* ignore */ }
		</script>
		<script type="text/javascript">
			var a9_p = amznads.getKeys();
			if ("undefined" != typeof a9_p && "" != a9_p && null !== a9_p && "[object Array]" === Object.prototype.toString.call(a9_p)) {
				var a = "",
					b = 0,
					c = a9_p.length,
					d, e;
				a9_p.sort();
				for (d = 0; d < c; d+=1) {
					a9_p[d - b] = a9_p[d - b].replace(/a1x6p/, "a160x600p");
					e = a9_p[d - b].split("p");
					e[0] == a && (a9_p.splice(d - b, 1), b++);
					a = e[0];
				}
				_ipw_custom.amznPay = a9_p;
			}
			document.close();
		</script>
HTML;
	}
}

global $adcontrol_amazon;
$adcontrol_amazon = new AdControl_Amazon();
