<?php
/**
 * BuddyBoss Pusher Integration Loader.
 *
 * @package BuddyBoss\Pusher
 *
 * @since BuddyBoss [BBVERSION]
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Set up the BB Pusher integration.
 *
 * @since BuddyBoss [BBVERSION]
 */
function bb_register_pusher_integration() {

	if (
		( function_exists( 'bb_platform_pro' ) && version_compare( bb_platform_pro()->version, '2.2.0', '>=' ) ) ||
		class_exists( 'BB_Pusher_Integration' )
	) {
		return;
	}

	require_once dirname( __FILE__ ) . '/bb-pusher-integration.php';
	buddypress()->integrations['pusher'] = new BB_Pusher_Integration();
}
add_action( 'bp_setup_integrations', 'bb_register_pusher_integration', 20 );
