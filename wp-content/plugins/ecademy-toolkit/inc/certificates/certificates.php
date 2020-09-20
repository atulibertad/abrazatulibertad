<?php
/*
	Certificates for LearnPress
*/

// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

define( 'LP_ADDON_CERTIFICATES_FILE', __FILE__ );
define( 'LP_ADDON_CERTIFICATES_VERSION_REQUIRES', '1.0.0' );
define( 'LP_ADDON_CERTIFICATES_VER', '1.0.0' );
define( 'LP_ADDON_CERTIFICATES_DEBUG', 0 );

/**
 * Class LP_Addon_Certificates_Preload
 */
class LP_Addon_Certificates_Preload {

	/**
	 * LP_Addon_Certificates_Preload constructor.
	 */
	public function __construct() {
		add_action( 'learn-press/ready', array( $this, 'load' ) );
	}

	/**
	 * Load addon
	 */
	public function load() {
		LP_Addon::load( 'LP_Addon_Certificates', 'inc/load.php', __FILE__ );
	}

}

new LP_Addon_Certificates_Preload();