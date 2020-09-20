<?php
/**
 * eCademy - WooCommerce Payment
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

define( 'ECA_WOO_PAYMENT_FILE', __FILE__ );
define( 'ECA_WOO_PAYMENT_PATH', dirname( __FILE__ ) );
define( 'ECA_WOO_PAYMENT_VER', '1.0.0' );
define( 'ECA_WOO_PAYMENT_REQUIRE_VER', '1.0.0' );
define( 'ECA_WOOCOMMERCE_PAYMENT_VER', '1.0.0' );

class ECA_Woo_Payment_Preload {

	public function __construct() {
		add_action( 'learn-press/ready', array( $this, 'load' ) );
	}

	public function load() {
		LP_Addon::load( 'ECA_Woo_Payment', 'inc/main.php', __FILE__ );
	}
}

new ECA_Woo_Payment_Preload();

