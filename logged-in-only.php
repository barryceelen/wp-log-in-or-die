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
 * Version:     0.0.1
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

function logged_in_only_init() {
	global $pagenow;
	if ( ! is_user_logged_in() && 'wp-login.php' != $pagenow ) {
		die();
	}
}
