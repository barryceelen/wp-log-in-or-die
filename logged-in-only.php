<?php
/**
 * Logged In Only
 *
 * @package   LoggedInOnly
 * @author    Barry Ceelen <b@rryceelen.com>
 * @license   GPL-2.0+
 * @link      http://github.com/barryceelen
 * @copyright 2013 Barry Ceelen
 *
 * @wordpress-plugin
 * Plugin Name: Logged In Only
 * Plugin URI:  http://github.com/barryceelen/wp-logged-in-only
 * Description: Display site to logged in users only.
 * Version:     0.0.2
 * Author:      Barry Ceelen
 * Author URI:  http://github.com/barryceelen
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

/*  Copyright 2013  Barry Ceelen  (email : b@rryceelen.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action( 'init', 'logged_in_only_init' );
add_filter( 'site_transient_update_plugins', 'logged_in_only_remove_update_nag' );

/**
 * Die if the user is not logged in and not viewing the login page.
 *
 * @since 0.0.1
 */
function logged_in_only_init() {
	global $pagenow;
	if ( ! is_user_logged_in() && 'wp-login.php' != $pagenow ) {
		die();
	}
}

/**
 * Disable plugin update notifications.
 *
 * @link http://dd32.id.au/2011/03/01/disable-plugin-update-notification-for-a-specific-plugin-in-wordpress-3-1/
 *
 * @since 0.0.2
 */
function logged_in_only_remove_update_nag( $value ) {
	if ( isset( $value->response[ plugin_basename( __FILE__ ) ] ) && ! empty( $value->response[ plugin_basename( __FILE__ ) ] ) ) {
		unset( $value->response[ plugin_basename( __FILE__ ) ] );
	}
	return $value;
}
