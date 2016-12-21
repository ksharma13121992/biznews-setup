<?php 
/*
*
*	Template Name: companies
*
*
*/
?>
<?php get_header();?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1 class="post-type-heading" align="center">
					<?php 
						the_title();
					?>
				</h1>
				<?php
					$comp_args = array(
						'post_type'   => 'companies',
						'post_status' => 'publish',
					);
					$com_query = new WP_Query( $comp_args );
					if ( $com_query->have_posts() ) :
						/* Start the Loop */
						while ( $com_query->have_posts() ) : $com_query->the_post();
							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; 
				?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer();?>