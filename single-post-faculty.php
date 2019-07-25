<?php
/**
 * Template Name: Faculty Single Post
 * Template Post Type: post
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HWCOE_UFL
 */
get_header(); ?>

<div id="main" class="container main-content">
	<div class="row">
		<div class="col-sm-12">
			<?php 
				$breadcrumb = '<ul class="breadcrumb-wrap">';
				// Link to category page
				// TODO: add conditional and allow user to enter $directory_link (or do custom archive)
				// TODO: display feature image in place of ACF field upload, remove ACF field upload
				// TODO: display post title in place of ACF name field, remove ACF name field
				$cat_id = get_cat_ID( 'faculty-pg' );
				$cat_link = get_category_link( $cat_id );
				$breadcrumb .= '<li class="item-home"><a class="bread-link bread-home" href="' . $cat_link . '">Faculty Directory</a></li>';	
				$breadcrumb .= '<li class="item-current item-' . $post->ID . '"><strong>' . get_the_title() . '</strong></li>';
				$breadcrumb .= "</ul>";
				
				echo $breadcrumb;

			?> 
		</div>
	</div>
	<div class="row">
	  <div class="col-sm-8 faculty_details">
			<div class="row">
				<div class="col-md-3">
					<?php if ( has_post_thumbnail() ) {
						echo hwcoe_ufl_post_featured_image();
					} ?>
				</div>
				<div class="col-md-9">
					<h1><?php echo get_the_title(); ?></h1>
					<?php 
						if(get_field('faculty_job_title')){ //if the field is not empty
							echo '<p><em>' . get_field('faculty_job_title') . '</em></p>'; //display it
						} 
					?>    
				</div>
		  	</div>
		 	<div class="row">
			 	<div class="col-md-12">
				  <?php 
						if(get_field('faculty_bio')){ //if the field is not empty
							echo '<h3>Bio</h3>' . get_field('faculty_bio'); //display it
						} 
				  
						if(get_field('faculty_research_areas')){ //if the field is not empty
							echo '<h3>Research Areas</h3><p>' . get_field('faculty_research_areas') . '</p>'; //display it
						} 

						if(get_field('faculty_current_courses')){ //if the field is not empty
							echo '<h3>Current Courses</h3><p>' . get_field('faculty_current_courses') . '</p>'; //display it
						} 

						if(get_field('faculty_education')){ //if the field is not empty
							echo '<h3>Education</h3><p>' . get_field('faculty_education') . '</p>'; //display it
						} 

						if(get_field('faculty_research_interests')){ //if the field is not empty
							echo '<h3>Research Interests</h3><p>' . get_field('faculty_research_interests') . '</p>'; //display it
						} 

						if(get_field('faculty_publications')){ //if the field is not empty
							echo '<h3>Publications</h3>' . get_field('faculty_publications'); //display it
						} 

						if(get_field('faculty_awards')){ //if the field is not empty
							echo '<h3>Awards &amp; Distinctions</h3>' . get_field('faculty_awards'); //display it
						} 
					?>
				</div>
			</div>
		</div><!-- col-sm-8 faculty_details -->
		<div class="col-md-4 faculty_contact_information">
		  	<h3>Contact Information</h3>
			<?php 
				if(get_field('faculty_telephone')){ //if the field is not empty
					echo '<p><strong>Telephone:</strong> ' . get_field('faculty_telephone') . '</p>'; //display it
				} 
			 
				if(get_field('faculty_fax')){ //if the field is not empty
					echo '<p><strong>Fax:</strong> ' . get_field('faculty_fax') . '</p>'; //display it
				} 

				if(get_field('faculty_email')){ //if the field is not empty
					echo '<p><strong>Email:</strong> ' . get_field('faculty_email') . '</p>'; //display it
				} 

				if(get_field('faculty_website')){ //if the field is not empty
					echo '<p><strong>Website:</strong> ' . get_field('faculty_website') . '</p>'; //display it
				} 

				if(get_field('faculty_office')){ //if the field is not empty
					echo '<p><strong>Office:</strong> ' . get_field('faculty_office') . '</p>'; //display it
				} 

				if(get_field('faculty_lab_room')){ //if the field is not empty
					echo '<p><strong>Lab Room:</strong> ' . get_field('faculty_lab_room') . '</p>'; //display it
				} 

				if(get_field('faculty_mailing_address')){ //if the field is not empty
					echo '<p><strong>Mailing Address:</strong></p> <p>' . get_field('faculty_mailing_address') . '</p>'; //display it
				} 
			?>
	  </div> <!-- /col-md-4 faculty_contact_information -->
	</div>
</div>

<?php get_footer(); ?>
