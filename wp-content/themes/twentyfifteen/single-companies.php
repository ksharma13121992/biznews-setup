<?php 
/*
*
*	Single template for company post type
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

			<?php
			// Start the loop.
			while ( $query -> have_posts() ) : $query -> the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">
						<!-- <div class="company_logo"> -->
							<?php
								the_post_thumbnail( array(100,100), array("class"=>"img-responsive") );
							?>
						<!-- </div> -->
						<?php
							if ( is_single() ) :
								the_title( '<h1 class="entry-title">', '</h1>' );
							else :
								the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
							endif;
						?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<div class="company-overview sub-division">
							<h4 class="sub-heading">Company Overview</h4>
							<table>
								<tr>
									<td colspan="1">Description</td>
									<td colspan="2">
										<?php
											/* translators: %s: Name of current post */
											the_content( sprintf(
												__( 'Continue reading %s', 'twentyfifteen' ),
												the_title( '<span class="screen-reader-text">', '</span>', false )
											) );
										?>
									</td>
								</tr>
								<tr>
									<td colspan="1">Category</td>
									<td colspan="2">
										<?php
											$terms = get_terms( array(
											    'taxonomy' => 'company-category',
											) );
											// print_r($terms);
											foreach ($terms as $term) {
        										echo '<a href="#" class="company-link">' . $term->name . '</a>';
											}

										?>
									</td>
								</tr>
								<tr>
									<td colspan="1">Website</td>
									<td colspan="2">
										<?php
											echo '<a href="'.get_post_meta( $post->ID, 'companies_website_url', true).'" class="company-link">'.get_post_meta( $post->ID, 'companies_website', true) .'</a>';

										?>
									</td>
								</tr>
								<tr>
									<td colspan="1">Social</td>
									<td colspan="2">
										<ul class="company-social">
											<li>
												<?php echo '<a href="'.get_post_meta( $post->ID, 'companies_facebook', true).'" class="company-link">';?>
													<i class="fa fa-facebook-official" aria-hidden="true"></i>
												<?php echo '</a>';?>
											</li>
											<li>
												<?php echo '<a href="'.get_post_meta( $post->ID, 'companies_linkedin', true).'" class="company-link">';?>
													<i class="fa fa-linkedin-square" aria-hidden="true"></i>
												<?php echo '</a>';?>
											</li>
											<li>
												<?php echo '<a href="'.get_post_meta( $post->ID, 'companies_twitter', true).'" class="company-link">';?>
													<i class="fa fa-twitter-square" aria-hidden="true"></i>
												<?php echo '</a>';?>
											</li>
										</ul>
									</td>
								</tr>
							</table>
						</div>
						<div class="company-details sub-division">
							<h4 class="sub-heading">Company Details</h4>
							<table>
								<tr>
									<td colspan="1">Founded</td>
									<td colspan="2">
										<?php
											echo get_post_meta( $post->ID, 'companies_founded', true );
										?>
									</td>
								</tr>
								<tr>
									<td colspan="1">Contact</td>
									<td colspan="2">
										<?php
											echo get_post_meta( $post->ID, 'companies_contact', true );
										?>
									</td>
								</tr>
								<tr>
									<td colspan="1">Employess</td>
									<td colspan="2">
										<?php
											echo get_post_meta( $post->ID, 'companies_employees', true );
										?>
									</td>
								</tr>
								<tr>
									<td colspan="1">Type</td>
									<td colspan="2">
										<?php
											$company_types = get_terms( array(
											    'taxonomy' => 'companies-type',
											) );
											echo '<ul class="company-ul">';
											$i=1;
											foreach ($company_types as $company_type) {
												if($i == 1){
        											echo '<li>' . $company_type->name . '</li>';
												}
												else{
        											echo ',<li>' . $company_type->name . '</li>';
												}
												$i++;
											}
											echo '</ul>';
										?>
									</td>
								</tr>
								<tr>
									<td colspan="1">Investment Size</td>
									<td colspan="2">
										<?php
											$investment_sizes = get_terms( array(
											    'taxonomy' => 'investment-size',
											) );
											echo '<ul class="company-ul">';
											$i=1;
											foreach ($investment_sizes as $investment_size) {
												if($i == 1){
        											echo '<li>' . $investment_size->name . '</li>';
												}
												else{
        											echo ',<li>' . $investment_size->name . '</li>';
												}
												$i++;
											}
											echo '</ul>';
										?>
									</td>
								</tr>
								<tr>
									<td colspan="1">Sectors</td>
									<td colspan="2">
										<?php
											$companies_sectors = get_terms( array(
											    'taxonomy' => 'companies-sector',
											) );
											echo '<ul class="company-ul">';
											$i=1;
											foreach ($companies_sectors as $companies_sector) {
												if($i == 1){
        											echo '<li>' . $companies_sector->name . '</li>';
												}
												else{
        											echo ',<li>' . $companies_sector->name . '</li>';
												}
												$i++;
											}
											echo '</ul>';
										?>
									</td>
								</tr>
								<tr>
									<td colspan="1">Regions</td>
									<td colspan="2">
										<?php
											$companies_regions = get_terms( array(
											    'taxonomy' => 'companies-region',
											) );
											echo '<ul class="company-ul">';
											$i=1;
											foreach ($companies_regions as $companies_region) {
												if($i == 1){
        											echo '<li>' . $companies_region->name . '</li>';
												}
												else{
        											echo ',<li>' . $companies_region->name . '</li>';
												}
												$i++;
											}
											echo '</ul>';
										?>
									</td>
								</tr>
								<tr>
									<td colspan="3">
										<?php
											echo get_post_meta( $post->ID, 'companies_excerpt', true );
										?>
									</td>
								</tr>
							</table>
						</div>
						<div class="company-product sub-division">
							<h4 class="sub-heading">Products</h4>
							<?php 
								$args_project = array(
									'post_type'   => 'project',
								);
								$query_project = new WP_Query( $args_project );
								$company_project = get_post_meta( $post->ID, 'company_project_taxonomy', true );

								if ( $query_project->have_posts() ) : 
									while ( $query_project->have_posts() ) : $query_project->the_post();

										foreach ($company_project as $c_project) {

											if (($c_project == get_the_id())) {

												echo '<div class="col-6">';
													echo '<div class="col-3 project-image">';
														the_post_thumbnail( array(75,75), array("class"=>"img-responsive") );
													echo '</div>';
													echo '<div class="col-9">';
														echo '<a href="'.get_the_permalink().'" class="company-link project-link">';
															the_title( '<h6 class="project-heading">', '</h6>');
														echo '</a>';
													echo '</div>';
												echo '</div>';
												
											}	

										}

									endwhile;
								else:
									echo 'No Projects';
								endif; 
							?>
						</div>
						
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<?php twentyfifteen_entry_meta(); ?>
						<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-footer -->

				</article><!-- #post-## -->
				<?php
				
			// End the loop.
			endwhile;

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