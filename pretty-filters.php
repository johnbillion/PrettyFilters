<?php
/*
Plugin Name:  Pretty Filters
Description:  A proof-of-concept WordPress plugin which adds a much nicer interface to the filters on post listing screens
Version:      1.2
Plugin URI:   https://github.com/johnbillion/PrettyFilters
Author:       John Blackbourn
Author URI:   http://lud.icro.us/

Copyright © 2012 John Blackbourn

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

*/

class PrettyFilters {

	function __construct() {

		add_action( 'admin_init', array( $this, 'add_stuff' ) );

	}

	function add_stuff() {

		wp_enqueue_style(
			'pretty-filters',
			$this->plugin_url( 'pretty-filters.css' ),
			array( 'wp-admin', 'colors' ),
			$this->plugin_ver( 'pretty-filters.css' )
		);
		wp_enqueue_script(
			'pretty-filters',
			$this->plugin_url( 'pretty-filters.js' ),
			array( 'jquery' ),
			$this->plugin_ver( 'pretty-filters.js' )
		);
		wp_localize_script(
			'pretty-filters',
			'pretty_filters',
			array(
				'filter' => __( 'Filter' )
			)
		);

	}

	function plugin_url( $file = '' ) {
		return $this->plugin( 'url', $file );
	}

	function plugin_path( $file = '' ) {
		return $this->plugin( 'path', $file );
	}

	function plugin_ver( $file ) {
		return filemtime( $this->plugin_path( $file ) );
	}

	function plugin_base() {
		return $this->plugin( 'base' );
	}

	function plugin( $item, $file = '' ) {
		if ( !isset( $this->plugin ) ) {
			$this->plugin = array(
				'url'  => plugin_dir_url( __FILE__ ),
				'path' => plugin_dir_path( __FILE__ ),
				'base' => plugin_basename( __FILE__ )
			);
		}
		return $this->plugin[$item] . ltrim( $file, '/' );
	}

}

$pretty_filters = new PrettyFilters;

?>