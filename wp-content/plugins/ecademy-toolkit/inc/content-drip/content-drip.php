<?php
/*
Content Drip for LearnPress

*/
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

define( 'LP_ADDON_CONTENT_DRIP_FILE', __FILE__ );
define( 'LP_ADDON_CONTENT_DRIP_PATH', dirname( __FILE__ ) );
define( 'LP_ADDON_CONTENT_DRIP_INC_PATH', LP_ADDON_CONTENT_DRIP_PATH . '/inc/' );
define( 'LP_ADDON_CONTENT_DRIP_VER', '3.0.0' );
define( 'LP_ADDON_CONTENT_DRIP_REQUIRE_VER', '1.0.0' );
define( 'LP_CONTENT_DRIP_DEBUG', 0 );

/**
 * Class LP_Addon_Content_Drip_Preload
 */
class LP_Addon_Content_Drip_Preload {

	/**
	 * LP_Addon_Content_Drip_Preload constructor.
	 */
	public function __construct() {
		add_action( 'learn-press/ready', array( $this, 'load' ) );
	}

	/**
	 * Load addon
	 */
	public function load() {
		LP_Addon::load( 'LP_Addon_Content_Drip', 'inc/load.php', __FILE__ );
	}
}

new LP_Addon_Content_Drip_Preload();
?>