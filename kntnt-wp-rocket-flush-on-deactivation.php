<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Kntnt Flush Page Cache on WP Rocket Deactivation
 * Plugin URI:        https://www.kntnt.com/
 * Description:       Flushes /wp-content/cache/ when WP Rocket is deactivated.
 * Version:           1.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */


add_action( 'rocket_deactivation', function () {
    $dirs = [ 'busting', 'min', 'wp-rocket' ];
    $fs = new WP_Filesystem_Direct( null );
    $cache_path = $fs->wp_content_dir() . 'cache';
    foreach ( $dirs as $dir ) {
        $fs->delete( "$cache_path/$dir", true );
    }
} );
