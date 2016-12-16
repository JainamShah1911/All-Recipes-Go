<?php
if(!class_exists('cp_recipe_cooking_method_taxonomy')) {

	class cp_recipe_cooking_method_taxonomy {
		const TAXONOMY = "cp_recipe_cooking_method";

		/**
		 * The Constructor
		 */
		public function __construct() {
			// register actions
			add_action('init', array(&$this, 'init'));
		} // END public function __construct()

		/**
		 * hook into WP's init action hook
		 */
		public function init() {
			// Initialize Post Type
			$this->create_taxonomy();
		} // END public function init()

		/**
		 * Create the post type
		 */
		public function create_taxonomy() {
			
			$recipe_tax_slug = (get_option('cp_recipe_method_slug') ? get_option('cp_recipe_method_slug') : 'recipe-cooking-method');
			
			$labels = array(
				'name'                => __('Budget', 'cooked'),
				'singular_name'       => __('Budget', 'cooked'),
				'search_items'        => __('Search Budget', 'cooked'),
				'all_items'           => __('All Budget', 'cooked'),
				'parent_item'         => __('Parent Budget', 'cooked'),
				'parent_item_colon'   => __('Parent Budget:', 'cooked'),
				'edit_item'           => __('Edit Budget', 'cooked'), 
				'update_item'         => __('Update Budget', 'cooked'),
				'add_new_item'        => __('Add New Budget', 'cooked'),
				'new_item_name'       => __('New Budget', 'cooked'),
				'menu_name'           => __('Budget', 'cooked')
			);

			$args = array(
				'hierarchical'        => true,
				'labels'              => $labels,
				'show_ui'             => true,
				'show_admin_column'   => true,
				'query_var'           => true,
				'rewrite'             => array( 'slug' => $recipe_tax_slug )
			);

			register_taxonomy(self::TAXONOMY, array('cp_recipe'), $args);
		}

	} // END class cp_recipe_cooking_method_taxonomy
} // END if(!class_exists('cp_recipe_cooking_method_taxonomy'))