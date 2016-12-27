<?php
/**
 * The template for displaying all Forms.
 *
 *Template Name: custom-form
 *
 *
 */
get_header();
?>

	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
				if (get_the_title() == 'Company Form') {
					get_template_part( 'template-parts/forms/company-form' );	
				}
				elseif(get_the_title() == 'Location Form'){
					get_template_part( 'template-parts/forms/location-form' );	
				}
				elseif(get_the_title() == 'People Form'){
					get_template_part( 'template-parts/forms/people-form' );	
				}
				elseif(get_the_title() == 'Project Form'){
					get_template_part( 'template-parts/forms/project-form' );	
				}
				elseif(get_the_title() == 'Award Form'){
					get_template_part( 'template-parts/forms/award-form' );	
				}
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
