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
function hwcoe_fac_dir_assets() {
	//todo: enqueue plugin CSS
	wp_enqueue_style( 'hwcoe-faculty-directory-style', plugins_url( 'css/styles.css', __FILE__ )	);
}
add_action( 'wp_enqueue_scripts', 'hwcoe_fac_dir_assets' );
/*
* Adds Category for Faculty Post
*/
if ( !function_exists('hwcoe_fac_dir_insert_category') ) {
	function hwcoe_fac_dir_insert_category() {
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
add_action( 'after_setup_theme', 'hwcoe_fac_dir_insert_category' );

// Use category-faculty-pg template for faculty-pg category archive
function faculty_pg_category_template( $template ) {
	if ( is_category('faculty-pg') ) {
        $template = ( __DIR__ ) . '/category-faculty-pg.php';
    }
    return $template;
}
add_filter( 'category_template', 'faculty_pg_category_template' );

// Give faculty-pg category a custom permalink structure
add_filter( 'category_link', 'custom_category_permalink', 10, 2 );
function custom_category_permalink( $link, $cat_id ) {
    $slug = get_term_field( 'slug', $cat_id, 'category' );
    if ( ! is_wp_error( $slug ) && 'faculty-pg' === $slug ) {
        $link = home_url( user_trailingslashit( '/directory/', 'category' ) );
    }
    return $link;
}

// Give faculty-pg posts a custom permalink structure
add_filter( 'post_link', 'custom_permalink', 10, 3 );
function custom_permalink( $permalink, $post, $leavename ) {
    // Get the category for the post
    $category = get_the_category($post->ID);
    if (  !empty($category) && $category[0]->cat_name == "faculty-pg" ) {
		$permalink = trailingslashit( home_url('/directory/' . $post->post_name .'/' ) );
    }
    return $permalink;
}

add_action( 'init', 'custom_rewrite_rules' );
function custom_rewrite_rules() {
    add_rewrite_rule(
        'directory(?:/page/?([0-9]{1,})|)/?$',
        'index.php?category_name=faculty-pg&paged=$matches[1]',
        'top' // The rule position; either 'top' or 'bottom' (default).
    );
    add_rewrite_rule(
        'directory/([^/]+)(?:/([0-9]+))?/?$',
        'index.php?category_name=faculty-pg&name=$matches[1]&page=$matches[2]',
        'top' // The rule position; either 'top' or 'bottom' (default).
    );
}

// Exclude faculty-pg category from post archive
function faculty_pg_exclude_category($query){
	$cat_id = get_cat_ID( 'faculty-pg' );
    if ( $query->is_archive() && ! is_category('faculty-pg') && ! is_admin() ) {
        $query->set( 'category__not_in', $cat_id ); 
    }
}
// add_action('pre_get_posts','faculty_pg_exclude_category');
// bug: currently excludes from shortcode listing

// Change posts with faculty-pg category to the single-post-faculty post template
function hwcoe_fac_dir_template() {
	global $post;
	if ( in_category('faculty-pg', $post->ID) && file_exists(__DIR__ . '/single-post-faculty.php') ) {
		include __DIR__ . '/single-post-faculty.php';
	}
}
// add_filter( 'single_template', 'hwcoe_fac_dir_template' );


// Append additional Local JSON load point for plugin's ACF field groups
add_filter('acf/settings/load_json', 'hwcoe_fac_dir_acf_json_load_point');

function hwcoe_fac_dir_acf_json_load_point( $paths ) {
    
    // append path
    $paths[] = __DIR__ . '/inc/acf-json';

    // return
    return $paths;
}

// TODO: breadcrumbs to category archive listing/directory page
// TODO: custom faculty-pg archive?