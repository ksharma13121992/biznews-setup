<?php
/**
 * Biznews
 *
 * @package   Biznews
 * @license   GPL-2.0+
 */

/**
 * Register post types and taxonomies.
 *
 * @package Biznews
 */
class Fundinground_Post_Type_Registrations {

	public $post_type = 'fundinground';

	public $taxonomies = array( 'funding-type');

	public function init() {
		// Add the fundingroundpost type and taxonomies
		add_action( 'init', array( $this, 'register' ) );
	}

	/**
	 * Initiate registrations of post type and taxonomies.
	 *
	 * @uses Fundinground_Post_Type_Registrations::register_post_type()
	 * @uses Fundinground_Post_Type_Registrations::register_taxonomy_category()
	 */
	public function register() {
		$this->register_post_type();
		$this->register_fundinground_category();
	}

	/**
	 * Register the custom post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	protected function register_post_type() {
		$labels = array(
			'name'               => __( 'Fundinground', 'biznews' ),
			'singular_name'      => __( 'Fundinground', 'biznews' ),
			'add_new'            => __( 'Add Fundinground', 'biznews' ),
			'add_new_item'       => __( 'Add Fundinground', 'biznews' ),
			'edit_item'          => __( 'Edit Fundinground', 'biznews' ),
			'new_item'           => __( 'New Fundinground', 'biznews' ),
			'view_item'          => __( 'View Fundinground', 'biznews' ),
			'search_items'       => __( 'Search Fundinground', 'biznews' ),
			'not_found'          => __( 'No Fundinground found', 'biznews' ),
			'not_found_in_trash' => __( 'No Fundinground in the trash', 'biznews' ),
		);

		$supports = array(
			'title',
			 'editor', 
			'thumbnail',
			'custom-fields',
			'revisions',
		);

		$args = array(
			'labels'          => $labels,
			'supports'        => $supports,
			'public'          => true,
			'capability_type' => 'post',
			'rewrite'         => array( 'slug' => 'fundinground', ), // Permalinks format
			'menu_position'   => 30,
			'menu_icon'       => 'dashicons-id',
		);

		$args = apply_filters( 'fundinground_post_type_args', $args );

		register_post_type( $this->post_type, $args );
	}

	protected function register_fundinground_category() {
		$labels = array(
			'name'                       => __( 'Funding Type', 'biznews' ),
			'singular_name'              => __( 'Funding Type', 'biznews' ),
			'menu_name'                  => __( 'Funding Type', 'biznews' ),
			'edit_item'                  => __( 'Edit FundingType', 'biznews' ),
			'update_item'                => __( 'Update Funding Type', 'biznews' ),
			'add_new_item'               => __( 'Add New Funding Type', 'biznews' ),
			'new_item_name'              => __( 'New Funding Type Name', 'biznews' ),
			'parent_item'                => __( 'Parent Funding Type', 'biznews' ),
			'parent_item_colon'          => __( 'Parent Funding Type:', 'biznews' ),
			'all_items'                  => __( 'All Funding Types', 'biznews' ),
			'search_items'               => __( 'Search Funding Types', 'biznews' ),
			'popular_items'              => __( 'Popular Funding Type', 'biznews' ),
			'separate_items_with_commas' => __( 'Separate Funding Type with commas', 'biznews' ),
			'add_or_remove_items'        => __( 'Add or remove Funding Type', 'biznews' ),
			'choose_from_most_used'      => __( 'Choose from the most used Funding Types', 'biznews' ),
			'not_found'                  => __( 'No Funding Type found.', 'biznews' ),
		);
		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => true,
			'rewrite'           => array( 'slug' => 'funding-type' ),
			'show_admin_column' => true,
			'query_var'         => true,
		);

		$args = apply_filters( 'biznews_category_args', $args );

		register_taxonomy( $this->taxonomies[0], $this->post_type, $args );
	}
	
}
