<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://hnikoloski.com
 * @since      1.0.0
 *
 * @package    Acf_Block_Ui
 * @subpackage Acf_Block_Ui/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Acf_Block_Ui
 * @subpackage Acf_Block_Ui/admin
 * @author     hNikoloski <support@hnikoloski.com>
 */
class Acf_Block_Ui_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Acf_Block_Ui_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Acf_Block_Ui_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/acf-block-ui-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Acf_Block_Ui_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Acf_Block_Ui_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/acf-block-ui-admin.js', array('jquery'), $this->version, false);
	}

	/**
	 * The Admin Menu
	 * 
	 * @since 1.0.0
	 */
	public function add_admin_menu()
	{
		add_menu_page(
			__('ACF Block UI', 'acf-block-ui'),
			__('ACF Block UI', 'acf-block-ui'),
			'manage_options',
			'acf-block-ui',
			array($this, 'acf_ui_admin_page'),
			'dashicons-editor-table',
			3
		);
	}

	/**
	 * The Admin Page
	 * 
	 * @since 1.0.0
	 */
	public function acf_ui_admin_page()
	{
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/acf-block-ui-admin-display.php';
	}

	/**
	 * Create custom post type called "ACF Blocks"
	 * 
	 * @since 1.0.0
	 */
	public function create_acf_blocks_post_type()
	{
		$labels = array(
			'name' => _x('ACF Blocks', 'Post Type General Name', 'acf-block-ui'),
			'singular_name' => _x('ACF Block', 'Post Type Singular Name', 'acf-block-ui'),
			'menu_name' => __('ACF Blocks', 'acf-block-ui'),
			'name_admin_bar' => __('ACF Blocks', 'acf-block-ui'),
			'archives' => __('ACF Block Archives', 'acf-block-ui'),
			'attributes' => __('ACF Block Attributes', 'acf-block-ui'),
			'parent_item_colon' => __('Parent ACF Block:', 'acf-block-ui'),
			'all_items' => __('All ACF Blocks', 'acf-block-ui'),
			'add_new_item' => __('Add New ACF Block', 'acf-block-ui'),
			'add_new' => __('Add New', 'acf-block-ui'),
			'new_item' => __('New ACF Block', 'acf-block-ui'),
			'edit_item' => __('Edit ACF Block', 'acf-block-ui'),
			'update_item' => __('Update ACF Block', 'acf-block-ui'),
			'view_item' => __('View ACF Block', 'acf-block-ui'),
			'view_items' => __('View ACF Blocks', 'acf-block-ui'),
			'search_items' => __('Search ACF Block', 'acf-block-ui'),
			'not_found' => __('Not found', 'acf-block-ui'),
			'not_found_in_trash' => __('Not found in Trash', 'acf-block-ui'),
			'featured_image' => __('Featured Image', 'acf-block-ui'),
			'set_featured_image' => __('Set featured image', 'acf-block-ui'),
			'remove_featured_image' => __('Remove featured image', 'acf-block-ui'),
			'use_featured_image' => __('Use as featured image', 'acf-block-ui'),
			'insert_into_item' => __('Insert into ACF Block', 'acf-block-ui'),
			'uploaded_to_this_item' => __('Uploaded to this ACF Block', 'acf-block-ui'),
			'items_list' => __('ACF Blocks list', 'acf-block-ui'),
			'items_list_navigation' => __('ACF Blocks list navigation', 'acf-block-ui'),
			'filter_items_list' => __('Filter ACF Blocks list', 'acf-block-ui'),
		);
		$args = array(
			'label' => __('ACF Block', 'acf-block-ui'),
			'description' => __('ACF Block', 'acf-block-ui'),
			'labels' => $labels,
			'supports' => array('title', 'thumbnail', 'revisions', 'custom-fields'),
			'taxonomies' => array(),
			'hierarchical' => false,
			'public' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'menu_icon' => 'dashicons-editor-table',
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => false,
			'can_export' => true,
			'has_archive' => false,
			'exclude_from_search' => false,
			'publicly_queryable' => false,
			'capability_type' => 'page',
		);
		register_post_type('acf_blocks', $args);
	}

	/**
	 * Import ACF Fields from JSON file
	 * 
	 * @since 1.0.0
	 */
	public function import_acf_fields()
	{

		if (function_exists('acf_add_local_field_group')) :

			acf_add_local_field_group(array(
				'key' => 'group_638632041ed55',
				'title' => 'ACF blocks Fields',
				'fields' => array(
					array(
						'key' => 'field_6386320470974',
						'label' => 'Block Name',
						'name' => 'acf_ui_block_name',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => 'acf_ui_block_name',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'wrapper_class' => 'acf-ui-block-name',
						'readonly' => 0,
						'disabled' => 0,
					),
					// Block slug
					array(
						'key' => 'field_6386320470975',
						'label' => 'Block Slug',
						'name' => 'acf_ui_block_slug',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => 'acf_ui_block_slug',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'wrapper_class' => 'acf-ui-block-slug',
						'readonly' => 1,
						'disabled' => 0,
					),
					array(
						'key' => 'field_6386324470976',
						'label' => 'Block Description',
						'name' => 'acf_ui_block_description',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => 'acf_ui_block_description',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),


				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'acf_blocks',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => true,
				'description' => '',
				'show_in_rest' => 0,
			));

		endif;
	}

	/**
	 * Create ACF Block from acf_blocks post type
	 * 
	 * @since 1.0.0
	 */
	public function create_acf_block()
	{
		// Create directory for ACF Blocks in wp-content
		$acf_blocks_dir = WP_CONTENT_DIR . '/acf-ui-blocks';
		if (!file_exists($acf_blocks_dir)) {
			mkdir($acf_blocks_dir, 0777, true);
		}



		// Create Blocks category 
		add_filter('block_categories_all', function ($categories) {

			// Adding a new category.
			$categories[] = array(
				'slug'  => 'acf-ui-blocks',
				'title' => 'ACF UI Blocks',
				// icon the logo
				'icon'  => 'tdcomm',
				'order' => 1,
			);

			return $categories;
		});

		if (function_exists('acf_register_block_type')) {

			// Get all ACF Blocks
			$acf_blocks = get_posts(array(
				'post_type' => 'acf_blocks',
				'posts_per_page' => -1,
				'post_status' => 'publish',
			));
			// Loop through all ACF Blocks
			foreach ($acf_blocks as $acf_block) {
				// Get ACF Block fields
				$acf_block_fields = get_fields($acf_block->ID);

				// Create a directory for each ACF Block
				$acf_block_dir = $acf_blocks_dir . '/' . $acf_block_fields['acf_ui_block_slug'];
				if (!file_exists($acf_block_dir)) {
					mkdir($acf_block_dir, 0777, true);
				}

				// Create a php file for each ACF Block
				$acf_block_file = $acf_block_dir . '/' . $acf_block_fields['acf_ui_block_slug'] . '.php';
				if (!file_exists($acf_block_file)) {
					// Get content from template file
					$acf_block_template = file_get_contents(plugin_dir_path(__FILE__) . 'data/block-template.php');
					// Replace template variables
					$acf_block_template = str_replace('{{block_name}}', $acf_block_fields['acf_ui_block_name'], $acf_block_template);
					$acf_block_template = str_replace('{{block_slug}}', $acf_block_fields['acf_ui_block_slug'], $acf_block_template);


					file_put_contents($acf_block_file, $acf_block_template);
				}

				// Create ACF Block
				acf_register_block_type(array(
					'name'              => $acf_block_fields['acf_ui_block_slug'],
					'title'             => $acf_block_fields['acf_ui_block_name'],
					'description'       => $acf_block_fields['acf_ui_block_description'],
					'render_template'   => $acf_blocks_dir . '/' . $acf_block_fields['acf_ui_block_slug'] . '.php',
					'category'          => 'acf-ui-blocks',
					'icon'              => 'acf-ui-blocks-icon',
					'keywords'          => array('acf', 'block', 'acf ui', 'acf ui block', 'ui'),
					'mode'              => 'edit',
					'align'             => 'full',
					'supports'          => array(
						'align' => false,
						'mode' => false,
						'jsx' => true,
					),
				));
			}
		}
	}
}
