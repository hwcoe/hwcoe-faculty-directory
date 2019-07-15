<?php
/*
Plugin Name: HWCOE Faculty Directory
Description: This plugin allows users to create a Faculty Listing post category and display category posts using the WP Show Posts or List Category Posts plugin.
Requirements: Advanced Custom Fields; WP Show Posts or List Category Posts; hwcoe-ufl or hwcoe-ufl-child theme. 
Version: 1.0
Author: Allison Logan
Author URI: http://allisoncandreva.com/
*/


/* Enqueue assets */
// needed?
add_action( 'wp_enqueue_scripts', 'hwcoe_faculty_directory_assets' );
function hwcoe_faculty_directory_assets() {

}

/*
* Adds Category for Faculty Post
*/
if ( !function_exists('hwcoe_faculty_directory_insert_category') ) {
	function hwcoe_faculty_directory_insert_category() {
		wp_insert_term(
			'faculty-pg',
			'category',
			array(
			  'description'	=> 'This category is only used for faculty posts.',
			  'slug' 		=> 'faculty-pg'
			)
		);
	}
}
add_action( 'after_setup_theme', 'hwcoe_faculty_directory_insert_category' );

function hwcoe_faculty_directory_template() {
	if ( in_category('faculty-pg') ) {
		include 'single-post-faculty.php';
		
	// TODO: switch to faculty post template when faculty-pg category is selected	
	}
}
add_filter( 'single_template', 'hwcoe_faculty_directory_template' );
// TODO: load acf local json from plugin folder