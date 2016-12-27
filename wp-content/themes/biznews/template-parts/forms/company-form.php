<?php
/**
 * Template part for displaying Company Form in custom-forms.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package biznews
 */

?>
<?php 
	$com_args = array(
		'post_type'   => 'companies',
		'post_status' => 'publish',
	);
	$com_query = new WP_Query( $com_args );

	$loc_args = array(
		'post_type'   => 'location',
		'post_status' => 'publish',
	);
	$loc_query = new WP_Query( $loc_args );

	$people_args = array(
		'post_type'   => 'people',
		'post_status' => 'publish',
	);
	$people_query = new WP_Query( $people_args );

	$product_args = array(
		'post_type'   => 'project',
		'post_status' => 'publish',
	);
	$product_query = new WP_Query( $product_args );

	$award_args = array(
		'post_type'   => 'award',
		'post_status' => 'publish',
	);
	$award_query = new WP_Query( $award_args );
?>
	<form id="msform">
		<!-- progressbar -->
		<ul id="progressbar">
			<li class="active">Overview</li>
			<li>Company Details</li>
			<li>Personal Details</li>
		</ul>
		<!-- fieldsets -->
		<fieldset>
			<h1 class="fs-title"><b>Company Overview</b></h1>
			<label for="company_publish_date">Publish Date <span class="reuired-field">*</span></label>
			<input type="date" name="company_publish_date" id="company_publish_date" class="msform-field" required/>

			<label for="company_headquarter">Headquarters<span class="reuired-field">*</span></label>
			<?php 
				if ( $loc_query->have_posts() ) : 
					echo '<select name="company_headquarter" id="company_headquarter" class="js-example-basic-multiple msform-field" required multiple="multiple">';
					while ( $loc_query->have_posts() ) : $loc_query->the_post();
						echo '<option value="'.get_the_id().'">'.get_the_title().'</option>';
					endwhile;
					echo '<select>';
				else:
				endif;
				echo '<span class="add-element">Location not in list? <a href="#">Add Location</a></span>';
			?>

			<label for="company_fund_raised">Fund Raised <span class="reuired-field">*</span></label>
			<input type="text" name="company_fund_raised" id="company_fund_raised" class="msform-field" required placeholder="Fund Raised" />



			<label for="company_short_description">Short Description<span class="reuired-field">*</span></label>
			<textarea name="company_short_description" id="company_short_description" rows="5" class="msform-field" placeholder="Short Description"></textarea>

			<label for="company_founder">Founders<span class="reuired-field">*</span></label>
			<?php 
				if ( $people_query->have_posts() ) : 
					echo '<select name="company_founder" id="company_founder" class="js-example-basic-multiple msform-field" required multiple="multiple">';
					while ( $people_query->have_posts() ) : $people_query->the_post();
						echo '<option value="'.get_the_id().'">'.get_the_title().'</option>';
					endwhile;
					echo '</select>';
				else:
				endif;
				echo '<span class="add-element">Founders not in list? <a href="#">Add Founder</a></span>';
			?>

			<label for="company_top_gratuate">Top Graduate(If School)</label>
			<?php 
				if ( $people_query->have_posts() ) : 
					echo '<select name="company_top_gratuate" id="company_top_gratuate" class="js-example-basic-multiple msform-field" multiple="multiple">';
					while ( $people_query->have_posts() ) : $people_query->the_post();
						echo '<option value="'.get_the_id().'">'.get_the_title().'</option>';
					endwhile;
					echo '</select>';
				else:
				endif;
				echo '<span class="add-element">Top Graduate not in list? <a href="#">Add Top Graduate</a></span>';
			?>

			<label for="company_founded_by_graduate">Companies Founded by Graduates(if School)</label>
			<input type="number" name="company_founded_by_graduate" id="company_founded_by_graduate" class="msform-field" placeholder="Fund Raised" />

			<label for="company_category">Category<span class="reuired-field">*</span></label>
			<select name="company_category" id="company_category" class="js-example-basic-multiple msform-field" required multiple="multiple">
			<?php 
				$terms = get_terms( 'company-category', array(
				    'hide_empty' => false,
				) );
				foreach ($terms as $term) {
					echo '<option value="'.$term->term_id.'">'.$term->name.'</option>';
				}
			?>
			</select>
			<span class="add-element">Category not in list? <a href="#">Add Category</a></span>

			<label for="company_website">Website<span class="reuired-field">*</span></label>
			<input type="text" name="company_website" id="company_website" class="msform-field" required placeholder="Website" />

			<label>Social Url</label>
			<input type="text" name="company_facebook" id="company_facebook" class="msform-field" placeholder="Facebook" />
			<input type="text" name="company_linkedin" id="company_linkedin" class="msform-field" placeholder="Linkedin" />
			<input type="text" name="company_twitter" id="company_twitter" class="msform-field" placeholder="Twitter" />

			<input type="button" name="next" class="next action-button" value="Next" />
		</fieldset>
		<fieldset>
			<h2 class="fs-title">Company Details</h2>
			<label for="company_founded_date">Founded Date<span class="reuired-field">*</span></label>
			<input type="date" name="company_founded_date" id="company_founded_date" class="msform-field" required/>

			<label for="company_number_employee">Number of Employees<span class="reuired-field">*</span></label>
			<input type="number" name="company_number_employee" id="company_number_employee" class="msform-field" placeholder="Number of Employees" required/>

			<label for="company_description">Description<span class="reuired-field">*</span></label>
			<textarea name="company_description" id="company_description" rows="10" class="msform-field" placeholder="Description"></textarea>

			
			<label for="company_enrollment">Enrollment(If School)</label>	
			<input type="text" name="company_enrollment" id="company_enrollment" class="msform-field" placeholder="Enrollment"/>

			<label for="company_contact">Contact<span class="reuired-field">*</span></label>	
			<input type="text" name="company_contact" id="company_contact" class="msform-field" placeholder="Contact" required/>

			<label for="company_type">Type<span class="reuired-field">*</span></label>
			<select name="company_type" id="company_type" class="js-example-basic-multiple msform-field" required multiple="multiple">
			<?php 
				$type_terms = get_terms( 'companies-type', array(
				    'hide_empty' => false,
				) );
				foreach ($type_terms as $type_term) {
					echo '<option value="'.$type_term->term_id.'">'.$type_term->name.'</option>';
				}
			?>
			</select>
			<span class="add-element">Type not in list? <a href="#">Add Company Type</a></span>

			<label for="company_investment_size">Investment Size<span class="reuired-field">*</span></label>
			<select name="company_investment_size" id="company_investment_size" class="js-example-basic-multiple msform-field" required multiple="multiple">
			<?php 
				$size_terms = get_terms( 'investment-size', array(
				    'hide_empty' => false,
				) );
				foreach ($size_terms as $size_term) {
					echo '<option value="'.$size_term->term_id.'">'.$size_term->name.'</option>';
				}
			?>
			</select>
			<span class="add-element">Investment Size not in list? <a href="#">Add Investment Size</a></span>

			<label for="company_sector">Sectors<span class="reuired-field">*</span></label>
			<select name="company_sector" id="company_sector" class="js-example-basic-multiple msform-field" required multiple="multiple">
			<?php 
				$sector_terms = get_terms( 'companies-sector', array(
				    'hide_empty' => false,
				) );
				foreach ($sector_terms as $sector_term) {
					echo '<option value="'.$sector_term->term_id.'">'.$sector_term->name.'</option>';
				}
			?>
			</select>
			<span class="add-element">Sectors not in list? <a href="#">Add sectors</a></span>

			<label for="company_region">Regions<span class="reuired-field">*</span></label>
			<select name="company_region" id="company_region" class="js-example-basic-multiple msform-field" required multiple="multiple">
			<?php 
				$region_terms = get_terms( 'companies-region', array(
				    'hide_empty' => false,
				) );
				foreach ($region_terms as $region_term) {
					echo '<option value="'.$region_term->term_id.'">'.$region_term->name.'</option>';
				}
			?>
			</select>
			<span class="add-element">Regions not in list? <a href="#">Add Region</a></span>

			<input type="button" name="previous" class="previous action-button" value="Previous" />
			<input type="button" name="next" class="next action-button" value="Next" />
		</fieldset>
		<fieldset>
			<h2 class="fs-title">Other Details</h2>

			<label for="company_current_team">Current Team<span class="reuired-field">*</span></label>
			<?php 
				if ( $people_query->have_posts() ) : 
					echo '<select name="company_current_team" id="company_current_team" class="js-example-basic-multiple msform-field" required multiple="multiple">';
					while ( $people_query->have_posts() ) : $people_query->the_post();
						echo '<option value="'.get_the_id().'">'.get_the_title().'</option>';
					endwhile;
					echo '</select>';
				else:
				endif;
				echo '<span class="add-element">Current Team Member not in list? <a href="#">Add Current team Member</a></span>';
			?>

			<label for="company_board_member">Board Members and Advisors<span class="reuired-field">*</span></label>
			<?php 
				if ( $people_query->have_posts() ) : 
					echo '<select name="company_board_member" id="company_board_member" class="js-example-basic-multiple msform-field" required multiple="multiple">';
					while ( $people_query->have_posts() ) : $people_query->the_post();
						echo '<option value="'.get_the_id().'">'.get_the_title().'</option>';
					endwhile;
					echo '</select>';
				else:
				endif;
			echo '<span class="add-element">Board Members and Advisors not in list? <a href="#">Add Member</a></span>';
			?>

			<label for="company_sub_organization">Sub Organizations</label>
			<?php 
				if ( $com_query->have_posts() ) : 
					echo '<select name="company_sub_organization" id="company_sub_organization" class="js-example-basic-multiple msform-field" required multiple="multiple">';
					while ( $com_query->have_posts() ) : $com_query->the_post();
						echo '<option value="'.get_the_id().'">'.get_the_title().'</option>';
					endwhile;
					echo '</select>';
				else:
				endif;
				echo '<span class="add-element">Sub Organizations not in list? <a href="#">Add Sub Organization</a></span>';
			?>

			<label for="company_competitor">Competitors</label>
			<?php 
				if ( $com_query->have_posts() ) : 
					echo '<select name="company_competitor" id="company_competitor" class="js-example-basic-multiple msform-field" required multiple="multiple">';
					while ( $com_query->have_posts() ) : $com_query->the_post();
						echo '<option value="'.get_the_id().'">'.get_the_title().'</option>';
					endwhile;
					echo '</select>';
				else:
				endif;
				echo '<span class="add-element">Competitors not in list? <a href="#">Add Competitors</a></span>';
			?>

			<label for="company_past_team">Past Team</label>
			<?php 
				if ( $people_query->have_posts() ) : 
					echo '<select name="company_past_team" id="company_past_team" class="js-example-basic-multiple msform-field" required multiple="multiple">';
					while ( $people_query->have_posts() ) : $people_query->the_post();
						echo '<option value="'.get_the_id().'">'.get_the_title().'</option>';
					endwhile;
					echo '</select>';
				else:
				endif;
			    echo '<span class="add-element">Past Team Member not in list? <a href="#">Add Past Team Member</a></span>';
			?>

			<label for="company_partners">Partners</label>
			<?php 
				if ( $com_query->have_posts() ) : 
					echo '<select name="company_partners" id="company_partners" class="js-example-basic-multiple msform-field" required multiple="multiple">';
					while ( $com_query->have_posts() ) : $com_query->the_post();
						echo '<option value="'.get_the_id().'">'.get_the_title().'</option>';
					endwhile;
					echo '</select>';
				else:
				endif;
			    echo '<span class="add-element">Partners not in list? <a href="#">Add Partners</a></span>';
			?>

			<label for="company_product">Products</label>
			<?php 
				if ( $product_query->have_posts() ) : 
					echo '<select name="company_product" id="company_product" class="js-example-basic-multiple msform-field" required multiple="multiple">';
					while ( $product_query->have_posts() ) : $product_query->the_post();
						echo '<option value="'.get_the_id().'">'.get_the_title().'</option>';
					endwhile;
					echo '</select>';
				else:
				endif;
				echo '<span class="add-element">Products not in list? <a href="#">Add Products</a></span>';
			?>
				
			<label for="company_awards">Awards</label>
			<?php 
				if ( $award_query->have_posts() ) : 
					echo '<select name="company_awards" id="company_awards" class="js-example-basic-multiple msform-field" required multiple="multiple">';
					while ( $award_query->have_posts() ) : $award_query->the_post();
						echo '<option value="'.get_the_id().'">'.get_the_title().'</option>';
					endwhile;
					echo '</select>';
				else:
				endif;
				echo '<span class="add-element">Awards not in list? <a href="#">Add Awards</a></span>';
			?>

			<input type="button" name="previous" class="previous action-button" value="Previous" />
			<input type="submit" name="submit" class="submit action-button" value="Submit" />
		</fieldset>
	</form>