<?php
/**
 * The template file for the faculty-pg category.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HWCOE_UFL
 */
get_header(); ?>

<div id="main" class="container main-content">
<div class="row">
	<div class="col-sm-12">
		<header class="entry-header">
			<h1 class="page-title">Faculty Directory</h1>
		</header>
		<!-- .entry-header --> 
	</div>
</div>
<div class="row">
	<div tabindex="-1" class="<?php echo hwcoe_ufl_page_column_class(); ?>">
		<?php 
		if ( function_exists( 'wpsp_display' ) ) {
		    echo do_shortcode("[wp_show_posts name=\"Faculty List\"]");
		}
		else {
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile; // End of the loop. 

			// Previous/next page navigation.
			the_posts_pagination();
			}

	?>
	</div>
	<?php get_sidebar('post_sidebar'); ?>
</div>
</div>

<?php get_footer(); ?>
