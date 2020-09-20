<?php
/*
Gradebook for LearnPress
*/

defined( 'ABSPATH' ) or die();

define( 'LP_ADDON_GRADEBOOK_PLUGIN_PATH', dirname( __FILE__ ) );
define( 'LP_ADDON_GRADEBOOK_PLUGIN_FILE', __FILE__ );
define( 'LP_ADDON_GRADEBOOK_VERSION', '1.0.0' );
define( 'LP_ADDON_GRADEBOOK_REQUIRE_VERSION', '1.0.0' );
define( 'LP_GRADEBOOK_VER', '1.0.0' );

/**
 * Class LP_Addon_Gradebook_Preload
 */
class LP_Addon_Gradebook_Preload {

	/**
	 * LP_Addon_Gradebook_Preload constructor.
	 */
	public function __construct() {
		add_action( 'learn-press/ready', array( $this, 'load' ) );
	}

	/**
	 * Load addon
	 */
	public function load() {
		LP_Addon::load( 'LP_Addon_Gradebook', 'inc/load.php', __FILE__ );
	}
}

new LP_Addon_Gradebook_Preload();
