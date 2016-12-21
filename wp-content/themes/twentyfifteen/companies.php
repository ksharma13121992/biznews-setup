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
		<?php 
			$args = array(
				'post_type'   => 'companies'
			);
			$query = new WP_Query( $args );
		?>
		<?php if ( $query->have_posts() ) : ?>

			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<ul class="company-list">
					<?php
					// Start the loop.
					while ( $query -> have_posts() ) : $query -> the_post();
						?>
							<li>
								<?php 
									echo '<a href="'.get_the_permalink().'" class="company-link">';
										the_title();
									echo '</a>';
								?>
							</li>
						<?php
						
					// End the loop.
					endwhile;
					?>
				</ul>

			</article><!-- #post-## -->
			<?php
			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
				'next_text'          => __( 'Next page', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer();?>