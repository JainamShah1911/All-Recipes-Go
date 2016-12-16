<?php

/*
Plugin Name: Allrecipe-Recipe-CS673
Plugin URI: http://cooked.boxydemos.com
Description: A super-powered recipe plugin for WordPress
Version: 2.4.1
Author: Boxy Studio
Author URI: https://www.boxystudio.com
*/

// Define the version number here to refresh cached files on update.
define('CP_VERSION','2.4.1');

// FontAwesome Versioning
define('CP_FA_VERSION','4.6.3');
define('CP_FA_ID','fcc8474e79');

// Include the required class for plugin updates.
require_once('updates/plugin-update-checker.php');
$Cooked_BoxyUpdateChecker = PucFactory::buildUpdateChecker('http://boxyupdates.com/get/?action=get_metadata&slug=cooked', __FILE__, 'cooked');

$demo_mode = get_option('cooked_demo_mode',false);

define('CP_DEMO_MODE', $demo_mode);
define('CP_PLUGIN_URL', WP_PLUGIN_URL . '/cooked');
define('CP_PLUGIN_DIR', dirname(__FILE__));
define('CP_STYLESHEET_DIR', get_stylesheet_directory());
define('CP_PLUGIN_TEMPLATES_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR);
define('CP_PLUGIN_SECTIONS_DIR', CP_PLUGIN_TEMPLATES_DIR . 'cp_recipe' . DIRECTORY_SEPARATOR);
define('CP_PLUGIN_VIEWS_DIR', CP_PLUGIN_TEMPLATES_DIR . 'views' . DIRECTORY_SEPARATOR);

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    define('CP_WOOCOMMERCE_ACTIVE', true);
} else {
	define('CP_WOOCOMMERCE_ACTIVE', false);
}

if(!class_exists('cooked_plugin')) {
	class cooked_plugin {
		/**
		 * Construct the plugin object
		 */
		public function __construct() {
		
			require_once(sprintf("%s/post-types/cp_recipe.php", CP_PLUGIN_DIR));
			$cp_recipe_post_type = new cp_recipe_post_type();
			
			$enabled_taxonomies = $this->cp_recipe_tax_settings();
			
			if (in_array('category',$enabled_taxonomies)):

				require_once(sprintf("%s/taxonomies/cp_recipe_category.php", CP_PLUGIN_DIR));
				$cp_recipe_category_taxonomy = new cp_recipe_category_taxonomy();
			
			endif;
			
			if (in_array('cuisine',$enabled_taxonomies)):

				require_once(sprintf("%s/taxonomies/cp_recipe_cuisine.php", CP_PLUGIN_DIR));
				$cp_recipe_cuisine_taxonomy = new cp_recipe_cuisine_taxonomy();
				
			endif;
			
			if (in_array('method',$enabled_taxonomies)):
			
				require_once(sprintf("%s/taxonomies/cp_recipe_cooking_method.php", CP_PLUGIN_DIR));
				$cp_recipe_cooking_method_taxonomy = new cp_recipe_cooking_method_taxonomy();
			
			endif;
			
			if (in_array('tags',$enabled_taxonomies)):
			
				require_once(sprintf("%s/taxonomies/cp_recipe_tags.php", CP_PLUGIN_DIR));
				$cp_recipe_tags_taxonomy = new cp_recipe_tags_taxonomy();
				
			endif;

			require_once(sprintf("%s/taxonomies/cp_recipe_measurement.php", CP_PLUGIN_DIR));
			$cp_recipe_measurement_taxonomy = new cp_recipe_measurement_taxonomy();

			require_once(sprintf("%s/admin/includes/pointers.php", CP_PLUGIN_DIR));
			require_once(sprintf("%s/admin/ajax/admin-actions.php", CP_PLUGIN_DIR));
			require_once(sprintf("%s/admin/widgets.php", CP_PLUGIN_DIR));

			require_once(sprintf("%s/includes/functions.php", CP_PLUGIN_DIR));
			require_once(sprintf("%s/includes/profiles.php", CP_PLUGIN_DIR));
			require_once(sprintf("%s/includes/shortcodes.php", CP_PLUGIN_DIR));
			require_once(sprintf("%s/includes/actions.php", CP_PLUGIN_DIR));
			require_once(sprintf("%s/includes/edit-recipe.php", CP_PLUGIN_DIR));

			add_action('admin_init', array(&$this, 'admin_init'));
			add_action('admin_menu', array(&$this, 'add_menu'));
			add_action('admin_enqueue_scripts', array(&$this, 'admin_styles'));
			add_action('admin_head', array(&$this, 'check_measurements'));
			add_action('admin_enqueue_scripts', 'wp_enqueue_media');
			add_action('admin_enqueue_scripts', array(&$this, 'tooltips'));
			add_filter('archive_template', array(&$this, 'archive_template'));
			add_action('admin_notices', array(&$this, 'cp_admin_settings_notice'));
			add_action('wp_enqueue_scripts', array(&$this, 'front_end_scripts'));
			add_action('wp_enqueue_scripts', array(&$this, 'inline_scripts'));
			add_action('admin_head', array(&$this, 'admin_inline_scripts'));
			add_action('after_setup_theme', array(&$this, 'cp_add_thumbnail_support'));
			
			add_filter('single_template', array(&$this, 'recipe_print_template'));
			add_filter('the_content',array(&$this, 'cp_recipe_post_type_template'));
			add_filter('the_title',array(&$this, 'cp_recipe_post_type_title'),10,2);
			
			$fes_settings = cp_recipe_fes_settings();				
			if (in_array('fes_enabled', $fes_settings)) :
				add_action('admin_menu', array(&$this, 'cooked_add_pending_recipes_bubble' ));
				add_action('admin_notices', array(&$this, 'cooked_pending_notice' ));
			endif;
			
			if (isset($_GET['cp_content'])):
				add_filter( 'default_content', array(&$this, 'cp_default_content_'.$_GET['cp_content']),10 );
				add_filter( 'default_title', array(&$this, 'cp_default_title_'.$_GET['cp_content']),10 );
			endif;
			
			add_filter('the_content', array(&$this, 'cooked_featured_image_in_feed' ));
			add_action('comment_post', array(&$this, 'save_comment_meta_data'));
			add_filter('preprocess_comment', array(&$this, 'verify_comment_meta_data'));
			add_filter( 'manage_cp_recipe_posts_columns', array(&$this, 'cp_add_recipe_thumbnail_column'));
			add_action( 'manage_cp_recipe_posts_custom_column', array(&$this, 'cp_add_recipe_thumbnail_value'),10,2);

		} // END public function __construct
		
		public function cp_default_content_browse( $content ) {
			$content = "[cooked-browse]";
			return $content;
		}
		
		public function cp_default_title_browse( $title ) {
			$title = __('Browse Recipes','cooked');
			return $title;
		}
		
		public function cp_default_content_profile( $content ) {
			$content = "[cooked-profile]";
			return $content;
		}
		
		public function cp_default_title_profile( $title ) {
			$title = __('Profile','cooked');
			return $title;
		}
		
		public static function cp_admin_settings_notice() {
		
			$settings_saved = get_option('cp_settings_saved');
			$screen = get_current_screen();
			
			if (!$settings_saved && $screen->id != 'cp_recipe_page_cooked_plugin'):
			
			    ?>
			    <div class="update-nag">
			    	<p style="font-size:17px; padding:0 10px; margin:10px 0 5px;"><strong><?php _e( 'A Message from Cooked:','cooked'); ?></strong></p>
			        <?php echo '<p style="padding:0 10px; margin-top:0;">Be sure to go to the <a href="'.get_admin_url().'edit.php?post_type=cp_recipe&page=cooked_plugin">Settings</a> screen to set up Cooked. Save the settings to remove this nag.</p>'; ?>
			    </div>
			    <?php

			endif;
			
		}
		
		public function cp_add_thumbnail_support() {
			add_theme_support( 'post-thumbnails' );
			add_image_size('cp_960_425', apply_filters('cp_image_size_large_width', 1920), apply_filters('cp_image_size_large_height', 850), true);
			add_image_size('cp_500_500', apply_filters('cp_image_size_medium_width', 1000), apply_filters('cp_image_size_medium_height', 1000), false);
			add_image_size('cp_298_192', apply_filters('cp_image_size_small_width', 596), apply_filters('cp_image_size_small_height', 384), true);
		}
		
		// ------------------------------------------------------------
		// Customize the Recipes RSS Feed to include the image
		public function cooked_featured_image_in_feed( $content ) {
		    global $post;
		    if( is_feed() ) {
		        if ( has_post_thumbnail( $post->ID ) ){
		            $output = '<p>'.get_the_post_thumbnail( $post->ID, 'cp_960_425', array( 'style' => 'max-width:100%; width:100%; height:auto; display:block;' ) ).'</p>';
		            $content = $output . $content;
		        }
		    }
		    return $content;
		}
		
		// ------------------------------------------------------------
		// Add Thumbnails to Recipe management screen

		public function cp_add_recipe_thumbnail_column($cols) {
		    $cols['thumbnail'] = __('Image','cooked');
		    return $cols;
		}
		public function cp_add_recipe_thumbnail_value($column_name, $post_id) {
			
			if ( 'thumbnail' == $column_name ) {
	        
	        	if (has_post_thumbnail( $post_id )) :
					$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'thumbnail' );
					if (is_array($image_url)) { $image_url = $image_url[0]; }
				endif;
	        
	            if ( isset($image_url) && $image_url ) {
	                echo '<img style="margin:5px 0;" src="'.$image_url.'" width="100" />';
	            } else {
	                echo __('None','cooked');
	            }
	            
	        }
	    }

		public static function activate() {
			// Do nothing
		}

		public static function deactivate() {
			// Do nothing
		}
		
		static function default_measurements() {
			$default_measurements = array(
				'count',
				'cup',
				'cups',
				'oz.',
				'tbsp',
				'tsp',
				'g',
				'mg',
				'kg',
				'quart',
				'quarts',
				'pint',
				'pints',
				'liter',
				'liters',
				'ml',
				'lb',
				'lbs',
				'dash',
				'pinch'
			);

			return $default_measurements;
		}
		
		public function check_measurements(){
			$measurement_terms = get_terms('cp_recipe_measurement',array( 'hide_empty' => false ));
			if (empty($measurement_terms)):
				$default_measurements = $this->default_measurements();
				foreach($default_measurements as $measurement_name):
					//$measurement_exists = term_exists($measurement_name, 'cp_recipe_measurement');
					//if(!$measurement_exists) {
						wp_insert_term($measurement_name, 'cp_recipe_measurement');
					//}
				endforeach;
			endif;
		}

		public function admin_init() {
			
			if (isset($_GET['update_cooked_recipe_images'])):
				
				// NEW SINCE VERSION 1.4.4
				// Update the Feature Images
				$cp_fi_transfer_done = get_option('cp_fi_transfer_done');
				
				if (!$cp_fi_transfer_done):
			
					// Let's loop through the recipe images and set them as the featured image for each recipe
					$args = array(
						'post_type' => 'cp_recipe',
						'posts_per_page' => -1
					);
					
					$cooked_query = new WP_Query( $args );
					if ( $cooked_query->have_posts() ):
						while ( $cooked_query->have_posts() ):
							$cooked_query->the_post(); global $post;
							$entry_image = get_post_meta($post->ID, '_cp_recipe_image', true);
							add_post_meta($post->ID, '_thumbnail_id', $entry_image);
						endwhile;
					endif;
					
					wp_reset_postdata();
		
					update_option('cp_fi_transfer_done',true);
				
				endif;
			
			endif;
			
			if (isset($_GET['update_cooked_search_content'])):
			
				// NEW SINCE VERSION 1.5
				// Update the recipe post content for super-fast searches.
				$cp_pc_transfer_done = get_option('cp_pc_transfer_done');
				
				if (!$cp_pc_transfer_done):
			
					// Let's loop through the recipe images and set them as the featured image for each recipe
					$args = array(
						'post_type' => 'cp_recipe',
						'posts_per_page' => -1
					);
					
					$cooked_query = new WP_Query( $args );
					if ( $cooked_query->have_posts() ):
						while ( $cooked_query->have_posts() ):
							$cooked_query->the_post(); global $post;
							$recipe_short_desc = get_post_meta($post->ID, '_cp_recipe_short_description', true);
							$recipe_yields = get_post_meta($post->ID, '_cp_recipe_yields', true);
							$recipe_ingredients = get_post_meta($post->ID, '_cp_recipe_ingredients', true);
							$recipe_directions = get_post_meta($post->ID, '_cp_recipe_directions', true);
							$recipe_notes = get_post_meta($post->ID, '_cp_recipe_additional_notes', true);
							
							$post_content = '<p>'.$recipe_short_desc.'</p><p>'.$recipe_yields.'</p><p>'.$recipe_ingredients.'</p><p>'.$recipe_directions.'</p><p>'.$recipe_notes.'</p>';
							
							// Update Post Content
							$new_post_content = array(
							    'ID'           => $post->ID,
							    'post_content' => $post_content
							);
							
							wp_update_post( $new_post_content );
						endwhile;
					endif;
					
					wp_reset_postdata();
					
					update_option('cp_pc_transfer_done',true);
				
				endif;
			
			endif;
			
			// Set up the settings for this plugin
			$this->init_settings();
			$this->export_settings();
			$this->import_settings();
			// Possibly do additional admin_init tasks
			
		} // END public static function activate

		static function plugin_settings() {
			$plugin_options = array(
				'cp_recipe_template',
				'cooked_email_logo',
				'cp_recipe_browse_options',
				'cp_recipe_fes_limit',
				'cp_fes_new_recipe_default',
				'cp_main_color',
				'cp_light_color',
				'cp_dark_color',
				'cp_sharing_options',
				'cp_facebook_app_id',
				'cp_wc_options',
				'cp_display_options',
				'cp_action_options',
				'cp_premium_actions',
				'cp_reviews_comments',
				'cp_fix_duplicate_comments',
				'cp_recipe_list_view',
				'cp_recipes_list_view_page',
				'cp_recipe_list_view_category',
				'cp_recipe_list_view_cuisine',
				'cp_recipe_list_view_cooking_method',
				'cp_recipe_list_view_cooking_sort',
				'cp_recipe_list_view_sort',
				'cp_profile_page',
				'cp_recipe_taxonomies',
				'cp_info_options',
				'cp_advanced_editable_taxes',
				'cp_list_view_pagination',
				'cp_recipe_slug',
				'cp_recipe_category_slug',
				'cp_recipe_cuisine_slug',
				'cp_recipe_method_slug',
				'cp_star_review_options',
				'cp_fes_options',
				'cp_settings_saved',
				'cp_recipes_fes_user_roles',
				'cp_recipes_fes_user_fields',
				'cp_fes_welcome_message',
				'cp_fes_no_access_message',
				'cp_plugin_styling',
				'cp_color_theme',
				'cp_disable_plugin_styling',
				'cp_prep_time_max_hrs',
				'cp_cook_time_max_hrs',
				
				'cooked_default_email_user',
				'cooked_registration_email_subject',
				'cooked_approval_email_subject',
				'cooked_admin_recipe_email_subject',
				'cooked_registration_email_content',
				'cooked_approval_email_content',
				'cooked_admin_recipe_email_content',
			);

			return $plugin_options;
		}
		
		public function cp_recipe_tax_settings() {
			$recipe_tax_value = get_option('cp_recipe_taxonomies');
			return $recipe_tax_value != '' ? $recipe_tax_value : array();
		}

		public function init_settings() {
			// register the settings for this plugin
			$plugin_options = $this->plugin_settings();
			foreach($plugin_options as $option_name) {
				register_setting('cooked_plugin-group', $option_name);
			}
		} // END public function init_custom_settings()


		/**********************
		ADD MENUS FUNCTION
		**********************/
		
		public function add_menu() {
			$fes_settings = cp_recipe_fes_settings();				
			if (in_array('fes_enabled', $fes_settings)) :
				add_submenu_page('edit.php?post_type=cp_recipe', __('Pending','cooked'), __('Pending','cooked'), 'manage_options', 'cooked_pending', array(&$this, 'admin_pending_list'));
			endif;
			add_submenu_page('edit.php?post_type=cp_recipe', __('Settings','cooked'), __('Settings','cooked'), 'manage_options', 'cooked_plugin', array(&$this, 'plugin_settings_page'));
		} // END public function add_menu()

		// SETTINGS MENU

		public function plugin_settings_page() {
			if(!current_user_can('manage_options')) {
				wp_die(__('You do not have sufficient permissions to access this page.', 'cooked'));
			}
			include(sprintf("%s/admin/templates/settings.php", CP_PLUGIN_DIR));
		} // END public function plugin_settings_page()
		
		// Cooked Pending Recipes List
		public function admin_pending_list() {
			if(!current_user_can('manage_options')) {
				wp_die(__('You do not have sufficient permissions to access this page.', 'cooked'));
			}
			include(sprintf("%s/admin/templates/pending-list.php", CP_PLUGIN_DIR));
		}

		// Add Pending Recipes Bubble
		public function cooked_add_pending_recipes_bubble() {
		
		  	global $submenu;
		
		  	$pending = cp_pending_recipes_count();
		  	if ( $pending ) :
			  	foreach ( $submenu as $key => $menu_array ) :
			  	
			  		foreach($menu_array as $item_key => $menu_item):
			  			if ($menu_item[2] == 'cooked_pending'):
			  				$submenu[$key][$item_key][0] .= " <span style='position:relative; top:1px; margin:-2px 0 0 2px' class='update-plugins count-$pending' title='$pending'><span style='padding:0 6px 0 4px; min-width:7px; text-align:center;' class='update-count'>" . $pending . "</span></span>";
			  			endif;
			  		endforeach;
					
				endforeach;
			endif;
		
		}
		
		public function cooked_pending_notice() {
			
			if (current_user_can('manage_options')):
		
				$pending = cp_pending_recipes_count();
				$page = (isset($_GET['page']) ? $page = $_GET['page'] : $page = false);
				if ($pending && $page != 'cooked_pending'):
					
					echo '<div class="update-nag">';
						echo sprintf( _n( 'There is %s pending recipe.', 'There are %s pending recipes.', $pending, 'cooked' ), $pending ).' <a href="'.get_admin_url().'edit.php?post_type=cp_recipe&page=cooked_pending">'._n('View Pending Recipe','View Pending Recipes',$pending,'cooked').'</a>';
					echo '</div>';
				
				endif;
			
			endif;
		
		}

		public function admin_styles() {
			
			// Fonts
			wp_enqueue_style('cp-font-google', 			'//fonts.googleapis.com/css?family=Open+Sans:400,600,700|Montserrat&subset=latin,cyrillic-ext,greek-ext,vietnamese,greek,latin-ext,cyrillic', array(), '1.0');
			wp_enqueue_script('cp-font-awesome', 		'//use.fontawesome.com/'.CP_FA_ID.'.js', array(), CP_FA_VERSION);
			
			// Scripts
			wp_enqueue_script('wp-color-picker');
			wp_enqueue_script('jquery-ui-slider');
			wp_enqueue_script('cp-admin-functions',		CP_PLUGIN_URL . '/js/admin-functions.js',			array(), CP_VERSION);
			
			// Styles
			wp_enqueue_style('jquery-ui');
			wp_enqueue_style('wp-color-picker'); 
			wp_enqueue_style('cooked-admin',			CP_PLUGIN_URL . '/admin/css/admin-styles.css',		array(), CP_VERSION);
			wp_enqueue_style('cp-jquery-ui',			CP_PLUGIN_URL . '/vendor/css/jquery-ui.css',				array(), '1.11');

		}
		
		public function admin_inline_scripts() { ?>
			
			<script type="text/javascript">
			
				// Language Variables used in Javascript
				var i18n_confirm_recipe_delete	= '<?php echo esc_js(__('Are you sure you want to delete this recipe?','cooked')); ?>',
					i18n_confirm_recipe_approve	= '<?php echo esc_js(__('Are you sure you want to approve this recipe?','cooked')); ?>';
					i18n_beginner = '<?php echo esc_js(__('Beginner','cooked')); ?>';
					i18n_intermediate = '<?php echo esc_js(__('Intermediate','cooked')); ?>';
					i18n_advanced = '<?php echo esc_js(__('Advanced','cooked')); ?>';
					
			</script><?php
			
		}

		public function front_end_scripts() {

			// Scripts
			wp_enqueue_script('jquery');
			wp_enqueue_script('cp-nouislider',				CP_PLUGIN_URL . '/vendor/js/jquery.nouislider.min.js',			array(), '7.0.10');
			wp_enqueue_script('cp-fullscreen',				CP_PLUGIN_URL . '/vendor/js/jquery.fullscreener.min.js',		array(), CP_VERSION);
			wp_enqueue_script('cp-isotope',					CP_PLUGIN_URL . '/vendor/js/isotope.pkgd.min.js',				array(), '2.0.0');
			wp_enqueue_script('cp-countdown-plugin',		CP_PLUGIN_URL . '/vendor/js/jquery.plugin.min.js',				array(), '2.0.1');
			wp_enqueue_script('cp-countdown',				CP_PLUGIN_URL . '/vendor/js/jquery.countdown.min.js',			array(), '2.0.1');
			wp_enqueue_script('cp-cookie',					CP_PLUGIN_URL . '/vendor/js/jquery.cookie.js',					array(), '1.4.1');
			wp_enqueue_script('cp-fitvids',					CP_PLUGIN_URL . '/vendor/js/jquery.fitvids.js',					array(), '1.1');
			wp_enqueue_script('cp-fancybox',				CP_PLUGIN_URL . '/vendor/js/fancybox/jquery.fancybox.pack.js',	array(), '2.1.5');
			wp_enqueue_script('cp-frontend-functions',		CP_PLUGIN_URL . '/js/functions.js',								array(), CP_VERSION);
			
			// Load required sharing scripts
			$recipe_sharing_networks = get_option('cp_sharing_options',array());
			if (!empty($recipe_sharing_networks) && in_array('pinterest',$recipe_sharing_networks)):
				wp_enqueue_script('pinterest', '//assets.pinterest.com/js/pinit.js', array(), CP_VERSION, true);
			endif;
			
			if (!empty($recipe_sharing_networks) && in_array('facebook',$recipe_sharing_networks)):
				add_action('wp_footer', array(&$this,'cooked_fb_scripts'));
			endif;
			
			if (!empty($recipe_sharing_networks) && in_array('google_plus',$recipe_sharing_networks)):
				add_action('wp_footer', array(&$this,'cooked_gplus_scripts'));
			endif;

		}
		
		public static function cooked_gplus_scripts(){
			echo '<script src="https://apis.google.com/js/platform.js" async defer></script>';
		}
		
		public static function cooked_fb_scripts(){
			$cp_facebook_app_id = get_option('cp_facebook_app_id');
			if ($cp_facebook_app_id):
				echo '<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId='.$cp_facebook_app_id.'";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, \'script\', \'facebook-jssdk\'));</script>';
			endif;
		}

		public static function front_end_styles() {
			
			// Styles to always load
			wp_enqueue_style('cp-font-awesome',				'//maxcdn.bootstrapcdn.com/font-awesome/'.CP_FA_VERSION.'/css/font-awesome.min.css', array(), CP_FA_VERSION);
			wp_enqueue_style('cp-frontend-style',			CP_PLUGIN_URL . '/css/front-end.css',				array(), CP_VERSION);
			wp_enqueue_style('cp-nouislider',				CP_PLUGIN_URL . '/vendor/css/jquery.nouislider.min.css',	array(), CP_VERSION);
			
			// Styles to load when printing
			if (isset($_GET['print'])):
				wp_enqueue_style('cp-print-page-style',		CP_PLUGIN_URL . '/css/print-page.css',				array(), CP_VERSION);
				wp_enqueue_style('cp-print-style',			CP_PLUGIN_URL . '/css/print.css',					array(), CP_VERSION, 'print');
			// Styles to load when NOT printing
			else :
				wp_enqueue_style('cp-fancybox',				CP_PLUGIN_URL . '/vendor/js/fancybox/jquery.fancybox.css',	array(), '2.1.5');
			endif;
			
		}

		public static function front_end_styles_two() {
			if (!isset($_GET['print'])):
				$colors_pattern_file = dirname(__FILE__) . '/css/color-theme.php';
				if ( !file_exists($colors_pattern_file) ) {
					return;
				}
			
				ob_start();
				echo '<style type="text/css">';
				include_once esc_attr($colors_pattern_file);
				echo '</style>';
				$output = ob_get_clean();
				
				echo $output;
			endif;
		}

		public static function front_end_styles_responsive() {
			
			wp_enqueue_style('cp-responsive-styles',CP_PLUGIN_URL . '/css/responsive.css', array(), CP_VERSION);
			
		}

		public function inline_scripts() { ?>
	
			<script type="text/javascript">
				var i18n_cooked_timer_complete = '<?php echo esc_js(__('Timer Complete!','cooked')); ?>';
				
				<?php
				$star_review_optional = get_option('cp_star_review_options');
				if (is_array($star_review_optional) && !empty($star_review_optional)):
					$star_review_optional = 'true';
				else :
					$star_review_optional = 'false';
				endif;
				
				echo 'var cp_star_review_optional = '.$star_review_optional.';'; ?>
			</script>
			
		<?php }

		public function save_comment_meta_data( $comment_id ) {
			
			$reviews_comments = get_option('cp_reviews_comments');
			
			if($reviews_comments != 'admin_reviews_comments') {
				if ( isset($_POST['cp_recipe_rating']) && $_POST['cp_recipe_rating'] != '' ):
					$rating = intval($_POST['cp_recipe_rating']);
				
					if($rating < 1) {
						$rating = 1;
					} elseif($rating > 5) {
						$rating = 5;
					}

					add_comment_meta( $comment_id, 'review_rating', $rating );
				endif;
			}
		}

		public function verify_comment_meta_data( $commentdata ) {
		
			if ('cp_recipe' == get_post_type($commentdata['comment_post_ID'])):
			
				$recipe_post = get_post($commentdata['comment_post_ID']);
				$author_id = $recipe_post->post_author;
			
				if (is_user_logged_in()):
					$current_user = wp_get_current_user();
					if ($current_user->ID == $author_id):
						$my_recipe = true;
					endif;
				endif;
			
				$reviews_comments = get_option('cp_reviews_comments');
				$star_review_optional = get_option('cp_star_review_options');
				if (is_array($star_review_optional) && !empty($star_review_optional)):
					$star_review_optional = true;
				else :
					$star_review_optional = false;
				endif;
				
				if( current_user_can('editor') || current_user_can('administrator') || $my_recipe) {
					$star_review_optional = true;
				}

				$reviews_comments = get_option('cp_reviews_comments');
				if($reviews_comments != 'admin_reviews_comments') {
					if (empty( $_POST['cp_recipe_rating'] ) && !$star_review_optional)
						wp_die( __( 'You did not add a rating. Hit the Back button on your Web browser and resubmit your review with a rating.', 'cooked' ) );
				}
				
			endif;
			
			return $commentdata;
			
		}

		public function tooltips() {
			// Don't run on WP < 3.3
			if ( get_bloginfo( 'version' ) < '3.3' )
				return;

			$screen = get_current_screen();
			$screen_id = $screen->id;

			// Get pointers for this screen
			$pointers = apply_filters( 'cp_admin_pointers-' . $screen_id, array() );

			if ( ! $pointers || ! is_array( $pointers ) )
				return;

			// Get dismissed pointers
			$dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
			$valid_pointers =array();

			// Check pointers and remove dismissed ones.
			foreach ( $pointers as $pointer_id => $pointer ) {

				// Sanity check
				if ( in_array( $pointer_id, $dismissed ) || empty( $pointer )  || empty( $pointer_id ) || empty( $pointer['target'] ) || empty( $pointer['options'] ) )
					continue;

				$pointer['pointer_id'] = $pointer_id;

				// Add the pointer to $valid_pointers array
				$valid_pointers['pointers'][] =  $pointer;
			}

			// No valid pointers? Stop here.
			if ( empty( $valid_pointers ) )
				return;

			// Add pointers style to queue.
			wp_enqueue_style( 'wp-pointer' );

			// Add pointers script to queue. Add custom script.
			wp_enqueue_script( 'cp-pointer', CP_PLUGIN_URL . '/js/admin-pointers.js', array( 'wp-pointer' ) );

			// Add pointer options to script.
			wp_localize_script( 'cp-pointer', 'cpPointer', $valid_pointers );
		}
		
		static function plugin_settings_link($links) {
			$settings_link = '<a href="edit.php?post_type=cp_recipe&page=cooked_plugin">Settings</a>';
			array_unshift($links, $settings_link);
			return $links;
		}
		
		public function recipe_print_template($single) {
			global $post;

			if (isset($_GET['print'])){
				if($post->post_type == 'cp_recipe') {
					if(file_exists(CP_PLUGIN_DIR . '/templates/cp_recipe/print.php')) {
						$single = CP_PLUGIN_DIR . '/templates/cp_recipe/print.php';
					}
				}
			}
			return $single;
		}
		
		public function cp_recipe_post_type_template($content){
			
			global $post, $post_id;
			
			if($post->post_type == 'cp_recipe' && is_singular('cp_recipe')):
				ob_start();
				load_template(CP_PLUGIN_SECTIONS_DIR . 'single-part.php',false);
				return ob_get_clean();
			else:
				return $content;
			endif;
			
			return $content;
			
		}
		
		public function cp_recipe_post_type_title($title,$id = null){
			
			global $post,$in_recipe_template;
			
			if(!empty($post) && $post->post_type == 'cp_recipe' && $post->ID == $id && is_singular('cp_recipe') && !$in_recipe_template):
				return false;
			else:
				return $title;
			endif;
			
			return $title;
			
		}

		public function archive_template($archive_template) {
			global $post;

			if(get_post_type() == 'cp_recipe' && file_exists(CP_PLUGIN_TEMPLATES_DIR . 'archive-cp_recipe.php') && !file_exists(get_stylesheet_directory() . '/archive-cp_recipe.php') && !file_exists(TEMPLATEPATH . '/archive-cp_recipe.php')) {
				$archive_template = CP_PLUGIN_TEMPLATES_DIR . 'archive-cp_recipe.php';
			} else if (get_post_type() == 'cp_recipe' && file_exists(get_stylesheet_directory() . '/archive-cp_recipe.php')){
				$archive_template = get_stylesheet_directory() . '/archive-cp_recipe.php';
			} else if (get_post_type() == 'cp_recipe' && file_exists(TEMPLATEPATH . '/archive-cp_recipe.php')){
				$archive_template = TEMPLATEPATH . '/archive-cp_recipe.php';
			}

			return $archive_template;
		}

		// Plugin Uninstall Function
		static function cp_uninstall_plugin() {
		
			// Deactivate the plugin
			deactivate_plugins( plugin_basename( __FILE__ ) );
		
			// Get the plugin settings and delete them all from the database
			$plugin_settings = cooked_plugin::plugin_settings();
			foreach($plugin_settings as $option_name) {
				unregister_setting('cooked_plugin-group', $option_name);
				delete_option($option_name);
			}

			// Delete all of the recipes and their comments
			$args = array(
				'post_type' => 'cp_recipe',
				'posts_per_page' => -1,
			);
			$recipes = get_posts($args);
			if(!empty($recipes)){
				foreach($recipes as $recipe) {
					$entry_id = $recipe->ID;
					$post_comments = get_comments(array(
						'post_id' => $entry_id
					));
					if(!empty($post_comments)) {
						foreach($post_comments as $comment) {
							$comment_id = $comment->comment_ID;
							wp_delete_comment($comment_id, true);
						}
					}
					wp_delete_post($entry_id, true);
				}
			}

			// Remove terms from taxonomies
			$taxonomies_to_remove = array(
				'cp_recipe_category',
				'cp_recipe_cooking_method',
				'cp_recipe_cuisine',
				'cp_recipe_measurement',
				'cp_recipe_tags',
			);
			foreach($taxonomies_to_remove as $taxonomy) {
				$taxonomy_terms = get_terms($taxonomy, array(
					'hide_empty' => false
				));
				if(!is_wp_error($taxonomy_terms)) {
					foreach($taxonomy_terms as $term) {
						wp_delete_term($term->term_id, $taxonomy);
					}
				}
			}
			
		}

		public function export_settings() {
			if(isset($_GET['export-settings']) && isset($_GET['page']) && $_GET['page'] == 'cooked_plugin') {
				$fields_to_export = $this->plugin_settings();

				$options_values = array();
				foreach($fields_to_export as $field_name) {
					$options_values[$field_name] = get_option($field_name);
				}

				header("Content-type:application/json; charset=utf-8");
				header("Content-Disposition: attachment; filename=recipes-settings-" . date('m-j-Y', time()) . ".json");
				exit(json_encode($options_values));
			}
		}

		public function import_settings() {
			if(isset($_GET['page']) && $_GET['page'] == 'cooked_plugin' && isset($_POST['settings-import']) && $_POST['settings-import'] == 'yes') {
				if( ! $_FILES['import_file']['error']) {
					$filename = $_FILES['import_file']['tmp_name'];
					$json_string = file_get_contents($filename);
					if($json_string) {
						$fields_to_export = $this->plugin_settings();

						$decoded_string = json_decode($json_string);
						foreach($decoded_string as $option_name => $option_value) {
							if(strpos($option_name, 'cp_') != 0) {
								wp_die('Not a valid settings file.');
							}
						}
						foreach($decoded_string as $option_name => $option_value) {
							if(in_array($option_name, $fields_to_export)) {
								update_option($option_name, $option_value);
							}
						}
					} else {
						wp_die('Not a valid JSON file.');
					}
				}
			}
		}
	}
}

if(class_exists('cooked_plugin')) {
	// Installation and uninstallation hooks
	register_activation_hook(__FILE__, array('cooked_plugin', 'activate'));
	register_deactivation_hook(__FILE__, array('cooked_plugin', 'deactivate'));

	// instantiate the plugin class
	$cooked_plugin = new cooked_plugin();

	// Add a link to the settings page onto the plugin page
	if(isset($cooked_plugin)) {

		$plugin = plugin_basename(__FILE__);
		add_filter("plugin_action_links_$plugin", array('cooked_plugin', 'plugin_settings_link'));
		
		// TODO load depending on STYLE settings
		$plugin_styling = get_option('cp_plugin_styling');
		if (!$plugin_styling): update_option('cp_plugin_styling','all_styles'); $plugin_styling = "all_styles"; endif;
		$disable_responsive_layouts = get_option('cp_disable_plugin_styling');
		if($plugin_styling == 'all_styles') {
			add_action('wp_enqueue_scripts', array('cooked_plugin', 'front_end_styles'));
			add_action('wp_head', array('cooked_plugin', 'front_end_styles_two'));
			if(empty($disable_responsive_layouts)) {
				add_action('wp_enqueue_scripts', array('cooked_plugin', 'front_end_styles_responsive'));
			}
		} elseif($plugin_styling == 'layout_styles') {
			add_action('wp_enqueue_scripts', array('cooked_plugin', 'front_end_styles'));
			if(empty($disable_responsive_layouts)) {
				add_action('wp_enqueue_scripts', array('cooked_plugin', 'front_end_styles_responsive'));
			}
		}
	
	}
}

// Localization
function cooked_local_init(){
	$domain = 'cooked';
    $locale = apply_filters('plugin_locale', get_locale(), $domain);
    load_textdomain($domain, WP_LANG_DIR.'/cooked/'.$domain.'-'.$locale.'.mo');
    load_plugin_textdomain($domain, FALSE, dirname(plugin_basename(__FILE__)).'/languages/');
}
add_action('after_setup_theme', 'cooked_local_init');