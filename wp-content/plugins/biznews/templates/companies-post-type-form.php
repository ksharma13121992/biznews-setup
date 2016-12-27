<?php 
/**
 * The file that defines the Cutom Post Type Form for Front End Insertion.
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://atidiv.com
 * @since      1.0.0
 *
 * @package    Biznews
 * @subpackage Biznews/includes
 */
class Companies_Post_Type_form{
	public function init() {
		add_action( 'init', array( $this, 'form_page_insertion' ) );
	   	add_shortcode('biznews-company-form', array( $this, 'company_custom_form' ) ) ;
	   	add_shortcode('biznews-acquisition-form', array( $this, 'acquisition_custom_form' ) ) ;
	   	add_shortcode('biznews-award-form', array( $this, 'award_custom_form' ) ) ;
	   	add_shortcode('biznews-event-form', array( $this, 'event_custom_form' ) ) ;
	   	add_shortcode('biznews-funding-round-form', array( $this, 'funding_round_custom_form' ) ) ;
	   	add_shortcode('biznews-people-form', array( $this, 'people_custom_form' ) ) ;
	   	add_shortcode('biznews-project-form', array( $this, 'project_custom_form' ) ) ;
	}
	function company_custom_form() {
	  	$return_string = include plugin_dir_path( __FILE__ ) . 'forms/company-form.php' ;
	  	$return_string = rtrim($return_string, "1");
	   	return $return_string;
	}
	function acquisition_custom_form() {
	  	$return_string = include plugin_dir_path( __FILE__ ) . 'forms/acquisition-form.php' ;
	  	$return_string = rtrim($return_string, "1");
	   	return $return_string;
	}
	function award_custom_form() {
	  	$return_string = include plugin_dir_path( __FILE__ ) . 'forms/award-form.php' ;
	  	$return_string = rtrim($return_string, "1");
	   	return $return_string;
	}
	function event_custom_form() {
	  	$return_string = include plugin_dir_path( __FILE__ ) . 'forms/event-form.php' ;
	  	$return_string = rtrim($return_string, "1");
	   	return $return_string;
	}
	function funding_round_custom_form() {
	  	$return_string = include plugin_dir_path( __FILE__ ) . 'forms/funding-round-form.php' ;
	  	$return_string = rtrim($return_string, "1");
	   	return $return_string;
	}
	function people_custom_form() {
	  	$return_string = include plugin_dir_path( __FILE__ ) . 'forms/people-form.php' ;
	  	$return_string = rtrim($return_string, "1");
	   	return $return_string;
	}
	function project_custom_form() {
	  	$return_string = include plugin_dir_path( __FILE__ ) . 'forms/project-form.php' ;
	  	$return_string = rtrim($return_string, "1");
	   	return $return_string;
	}
	public function form_page_insertion(){
		//company-from
		$company_information = array(
			'post_title' => 'Company Form',
			'post_type' => 'page',
			'post_content'   => '[biznews-company-form]',
			'post_status' => 'publish'
		);	
		$company_page = get_page_by_title( 'Company Form' );
		if ( !isset($company_page) ){
			wp_insert_post( $company_information );
		}
		else{
		 	$company_post = array(
		      'ID'           => $company_page->ID,
		      'post_title'   => 'Company Form',
		      'post_content'   => '[biznews-company-form]'		  	
		    );
		  	wp_update_post( $company_post );
		}

		//acquisition-from
		$acquisition_information = array(
			'post_title' => 'Acquisitions Form',
			'post_type' => 'page',
			'post_content'   => '[biznews-acquisition-form]',
			'post_status' => 'publish'
		);	
		$acquisition_page = get_page_by_title( 'Acquisitions Form' );
		if ( !isset($acquisition_page) ){
			wp_insert_post( $acquisition_information );
		}
		else{
		 	$acquisition_post = array(
		      'ID'           => $acquisition_page->ID,
		      'post_title'   => 'Acquisitions Form',
		      'post_content'   => '[biznews-acquisition-form]'		  	
		    );
		  	wp_update_post( $acquisition_post );
		}

		//award-from
		$award_information = array(
			'post_title' => 'Award Form',
			'post_type' => 'page',
			'post_content'   => '[biznews-award-form]',
			'post_status' => 'publish'
		);	
		$award_page = get_page_by_title( 'Award Form' );
		if ( !isset($award_page) ){
			wp_insert_post( $award_information );
		}
		else{
		 	$award_post = array(
		      'ID'           => $award_page->ID,
		      'post_title'   => 'Award Form',
		      'post_content'   => '[biznews-award-form]'		  	
		    );
		  	wp_update_post( $award_post );
		}

		//event-from
		$event_information = array(
			'post_title' => 'Event Form',
			'post_type' => 'page',
			'post_content'   => '[biznews-event-form]',
			'post_status' => 'publish'
		);	
		$event_page = get_page_by_title( 'Event Form' );
		if ( !isset($event_page) ){
			wp_insert_post( $event_information );
		}
		else{
		 	$event_post = array(
		      'ID'           => $event_page->ID,
		      'post_title'   => 'Event Form',
		      'post_content'   => '[biznews-event-form]'		  	
		    );
		  	wp_update_post( $event_post );
		}

		//funding-round-from
		$funding_round_information = array(
			'post_title' => 'Funding Rounds Form',
			'post_type' => 'page',
			'post_content'   => '[biznews-funding-round-form]',
			'post_status' => 'publish'
		);	
		$funding_round_page = get_page_by_title( 'Funding Rounds Form' );
		if ( !isset($funding_round_page) ){
			wp_insert_post( $funding_round_information );
		}
		else{
		 	$funding_round_post = array(
		      'ID'           => $funding_round_page->ID,
		      'post_title'   => 'Funding Rounds Form',
		      'post_content'   => '[biznews-funding-round-form]'		  	
		    );
		  	wp_update_post( $funding_round_post );
		}

		//location-from
		$location_information = array(
			'post_title' => 'Location Form',
			'post_type' => 'page',
			'post_content'   => '[biznews-location-form]',
			'post_status' => 'publish'
		);	
		$location_page = get_page_by_title( 'Location Form' );
		if ( !isset($location_page) ){
			wp_insert_post( $location_information );
		}
		else{
		 	$location_post = array(
		      'ID'           => $location_page->ID,
		      'post_title'   => 'Location Form',
		      'post_content'   => '[biznews-location-form]'		  	
		    );
		  	wp_update_post( $location_post );
		}

		//people-from
		$people_information = array(
			'post_title' => 'People Form',
			'post_type' => 'page',
			'post_content'   => '[biznews-people-form]',
			'post_status' => 'publish'
		);	
		$people_page = get_page_by_title( 'People Form' );
		if ( !isset($people_page) ){
			wp_insert_post( $people_information );
		}
		else{
		 	$people_post = array(
		      'ID'           => $people_page->ID,
		      'post_title'   => 'People Form',
		      'post_content'   => '[biznews-people-form]'		  	
		    );
		  	wp_update_post( $people_post );
		}

		//project-from
		$project_information = array(
			'post_title' => 'Project Form',
			'post_type' => 'page',
			'post_content'   => '[biznews-project-form]',
			'post_status' => 'publish'
		);	
		$project_page = get_page_by_title( 'Project Form' );
		if ( !isset($project_page) ){
			wp_insert_post( $project_information );
		}
		else{
		 	$project_post = array(
		      'ID'           => $project_page->ID,
		      'post_title'   => 'Project Form',
		      'post_content'   => '[biznews-project-form]'		  	
		    );
		  	wp_update_post( $project_post );
		}
	}
}
?>