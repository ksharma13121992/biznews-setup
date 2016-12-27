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
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
							<div class="entry-header company-header">
								<?php
									if ( is_single() ) :
										the_title( '<h1 class="entry-title">', '</h1>' );
									else :
										the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
									endif;
								?>
								<?php
									the_post_thumbnail( array(200,200), array("class"=>"img-responsive") );
								?>
							</div>
						</div><!-- .entry-header -->
						<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
							<div class="entry-content ">
								<div class="company-overview sub-division">
									<h4 class="sub-heading">Overview</h4>
									<div class="company-sub-content">
										<div class="col-md-2 content-heading">Description</div>
										<div class="col-md-10">
											<?php
												/* translators: %s: Name of current post */
												the_content( sprintf(
													__( 'Continue reading %s', 'twentyfifteen' ),
													the_title( '<span class="screen-reader-text">', '</span>', false )
												) );
											?>
										</div>
									</div>
									<div class="company-sub-content">
										<div class="col-md-2 content-heading">Category</div>
										<div class="col-md-10">
											<?php
												$terms = get_terms( array(
												    'taxonomy' => 'company-category',
												) );
												// print_r($terms);
												foreach ($terms as $term) {
	        										echo '<a href="#" class="company-link">' . $term->name . '</a>';
												}

											?>
										</div>
									</div>
									<div class="company-sub-content">
										<div class="col-md-2 content-heading">Website</div>
										<div class="col-md-10">
											<?php
												echo '<a href="'.get_post_meta( $post->ID, 'companies_website_url', true).'" class="company-link">'.get_post_meta( $post->ID, 'companies_website', true) .'</a>';

											?>
										</div>
									</div>
									<div class="company-sub-content">
										<div class="col-md-2 content-heading">Social</div>
										<div class="col-md-10">
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
										</div>
									</div>
								</div>
								<div class="company-details sub-division">
									<h4 class="sub-heading">Details</h4>
									<div class="company-sub-content">
										<div class="col-md-2 content-heading">Founded</div>
										<div class="col-md-10">
											<?php
												echo get_post_meta( $post->ID, 'companies_founded', true );
											?>
										</div>
									</div>
									<div class="company-sub-content">
										<div class="col-md-2 content-heading">Contact</div>
										<div class="col-md-10">
											<?php
												echo get_post_meta( $post->ID, 'companies_contact', true );
											?>
										</div>
									</div>
									<div class="company-sub-content">
										<div class="col-md-2 content-heading">Employess</div>
										<div class="col-md-10">
											<?php
												echo get_post_meta( $post->ID, 'companies_employees', true );
											?>
										</div>
									</div>
									<div class="company-sub-content">
										<div class="col-md-2 content-heading">Type</div>
										<div class="col-md-10">
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
										</div>
									</div>
									<div class="company-sub-content">
										<div class="col-md-2 content-heading">Investment Size</div>
										<div class="col-md-10">
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
										</div>
									</div>
									<div class="company-sub-content">
										<div class="col-md-2 content-heading">Sectors</div>
										<div class="col-md-10">
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
										</div>
									</div>
									<div class="company-sub-content">
										<div class="col-md-2 content-heading">Regions</div>
										<div class="col-md-10">
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
										</div>
									</div>
									<div class="company-sub-content">
										<div class="col-md-12">
											<?php
												echo get_post_meta( $post->ID, 'companies_excerpt', true );
											?>
										</div>
									</div>
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

														echo '<div class="col-md-3">';
															echo '<div class="col-md-3 project-image">';
																the_post_thumbnail( array(75,75), array("class"=>"img-responsive") );
															echo '</div>';
															echo '<div class="col-md-9">';
																echo '<a href="'.get_the_permalink().'" class="company-link project-link">';
																	the_title( '<h3 class="project-heading">', '</h3>');
																echo '</a>';
																echo 'Short description';
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
							</div>
						</div><!-- .entry-content -->
					</article><!-- #post-## -->
					<?php
				// End the loop.
				endwhile;
			?>
		</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer();?>