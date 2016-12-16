<?php	
	
function cp_format_time($time) {
	$hours = floor($time / 60);
	$minutes = $time % 60;

	$time_string = '';

	if($hours != 0) {
		$time_string = $hours . ' ' . _n('hr','hrs',$hours,'cooked') . ' ';
	}

	if($minutes != 0) {
		$time_string .= $minutes . ' ' . _n('min','mins',$minutes,'cooked');
	}


	return $time_string;
}

function cp_get_profile_page_id(){
	$profile_page_id = (get_option('cp_profile_page') ? get_option('cp_profile_page') : false);
	if ($profile_page_id):
		if (function_exists('icl_object_id')):
			$profile_page_id = icl_object_id($profile_page_id, 'page', true);
		endif;
		$profile_page_id = apply_filters('cooked_profile_page_id',$profile_page_id);
		return $profile_page_id;
	else:
		return false;
	endif;
}

function cp_get_profile_page_url(){
	$profile_page_id = (get_option('cp_profile_page') ? get_option('cp_profile_page') : false);
	if ($profile_page_id):
		if (function_exists('icl_object_id')):
			$profile_page_id = icl_object_id($profile_page_id, 'page', true);
		endif;
		$profile_page_url = apply_filters('cooked_profile_page_url',get_permalink($profile_page_id));
		return $profile_page_url;
	else:
		return false;
	endif;
}

function cp_get_browse_page_id(){
	$browse_page_id = (get_option('cp_recipes_list_view_page') ? get_option('cp_recipes_list_view_page') : false);
	if ($browse_page_id):
		if (function_exists('icl_object_id')):
			$browse_page_id = icl_object_id($browse_page_id, 'page', true);
		endif;
		$browse_page_id = apply_filters('cooked_browse_page_id',$browse_page_id);
		return $browse_page_id;
	else:
		return false;
	endif;
}

function cp_get_browse_page_url(){
	$browse_page_id = (get_option('cp_recipes_list_view_page') ? get_option('cp_recipes_list_view_page') : false);
	if ($browse_page_id):
		if (function_exists('icl_object_id')):
			$browse_page_id = icl_object_id($browse_page_id, 'page', true);
		endif;
		$browse_page_url = apply_filters('cooked_browse_page_url',get_permalink($browse_page_id));
		return $browse_page_url;
	else:
		return false;
	endif;
}

function cp_get_social_sharing_links($post_id = false){
	
	ob_start();
	
	if (!$post_id):
		global $post_id;
	endif;
	
	$recipe_short_description = get_post_meta($post_id, '_cp_recipe_short_description', true);
	$recipe_link = get_permalink($post_id);
	$recipe_sharing_networks = get_option('cp_sharing_options',array());
	if(!empty($recipe_sharing_networks)) :
		
		$recipe_image = get_post_meta($post_id, '_thumbnail_id', true);
		$recipe_image_url = wp_get_attachment_image_src($recipe_image, 'cp_960_425');
		$recipe_image_url = $recipe_image_url[0];
		
		echo '<div id="cooked-sharing-block" class="cookedClearFix">';
		
			if (in_array('email',$recipe_sharing_networks)):
				echo '<a class="email-button" href="mailto:?subject='.esc_attr(get_the_title($post_id)).'&body='.esc_url($recipe_link).'"><i class="fa fa-envelope"></i>&nbsp;&nbsp;'.__('Email','cooked').'</a>';
			endif;
			
			if (in_array('facebook',$recipe_sharing_networks)):
				$cp_facebook_app_id = get_option('cp_facebook_app_id');
				if ($cp_facebook_app_id):
					echo '<div class="fb-like" data-href="'.esc_url($recipe_link).'" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>';
				endif;
			endif;
			
			if (in_array('twitter',$recipe_sharing_networks)):
				echo '<a href="https://twitter.com/share" class="twitter-share-button" data-url="'.esc_url($recipe_link).'" data-text="'.esc_attr(get_the_title($post_id)).'">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script>';
			endif;
			
			if (in_array('pinterest',$recipe_sharing_networks)):
				echo '<div class="pinterest_share"><a href="https://www.pinterest.com/pin/create/button/
			        ?url='.esc_url($recipe_link).'
			        &media='.esc_url($recipe_image_url).'
			        &description='.esc_attr($recipe_short_description).'"
			        data-pin-do="buttonPin"
			        data-pin-color="white"
			        data-pin-config="beside">
			        <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_white_20.png" />
			    </a></div>';
			endif;
			
			if (in_array('google_plus',$recipe_sharing_networks)):
				echo '<div class="gplus_share"><div class="g-plusone" data-size="medium" data-href="'.esc_url($recipe_link).'"></div></div>';
			endif;
		
		echo '</div>';
		
	endif;
	
	return ob_get_clean();
	
}

function cp_pending_recipes_count(){
	$args = array(
	   'posts_per_page' => -1,
	   'post_status' => 'draft',
	   'post_type' => 'cp_recipe',
	);
	$pending_count_query = new WP_Query($args);
	return $pending_count_query->found_posts;
}

function cooked_which_admin_to_send_email(){

	if (get_option('cooked_default_email_user')):
		$admin_email = get_option('cooked_default_email_user');
	else:
		$admin_email = get_option( 'admin_email' );
	endif;

	return $admin_email;
	
}

function cooked_mailer($to,$subject,$message){
	
	if (!CP_DEMO_MODE):

		add_filter('wp_mail_content_type', 'cooked_set_html_content_type');
		
		$cooked_email_logo = get_option('cooked_email_logo');
		if ($cooked_email_logo):
			$logo = '<img src="'.$cooked_email_logo.'" style="max-width:100%; height:auto; display:block; margin:10px 0 20px;">';
		else :
			$logo = '';	
		endif;
		
		$link_color = get_option('cp_main_color','#0bbe5f');
		
		$template = file_get_contents(CP_PLUGIN_DIR . '/admin/email-templates/default.html', true);
		$filter = array('%content%','%logo%','%link_color%');
		$replace = array(wpautop($message),$logo,$link_color);
		$headers = array('Content-Type: text/html; charset=UTF-8');
		$message = str_replace($filter, $replace, $template);
		
		wp_mail($to,$subject,$message,$headers);
		
		remove_filter('wp_mail_content_type','cooked_set_html_content_type');
	
	endif;	

}

function cooked_set_html_content_type() {
	return 'text/html';
}

function cp_difficulty_level($l){
	switch($l):
	
		case 1:
			echo '<span title="'.__('Difficulty Level: Easy','cooked').'" class="difficulty easy"></span>';
		break;
		
		case 2:
			echo '<span title="'.__('Difficulty Level: Intermediate','cooked').'" class="difficulty intermediate"></span>';
		break;
		
		case 3:
			echo '<span title="'.__('Difficulty Level: Advanced','cooked').'" class="difficulty advanced"></span>';
		break;
	
	endswitch;
}

function cp_create_slug($string,$not_username = false){
	if ($not_username):
		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($string));
	else :
		$slug = preg_replace('/[^A-Za-z0-9-._]+/', '-', strtolower($string));
	endif;
	return $slug;
}

function yoast_change_opengraph_type( $type ) {
	if ( is_singular( 'cp_recipe' ) ) {
		return 'recipe';
	}
}
add_filter( 'wpseo_opengraph_type', 'yoast_change_opengraph_type', 10, 1 );

add_action( 'wp_login_failed', 'cp_fe_login_fail' );  // hook failed login

function cp_fe_login_fail( $username ) {
   $referrer = $_SERVER['HTTP_REFERER'];
   $referrer = explode('?',$referrer);
   $referrer = $referrer[0];
   if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
      wp_redirect( $referrer . '?loginfailed' );
      exit;
   }
}

function cp_recipe_image($recipe_image, $size, $container_css, $recipe_video, $small_css = false){
	
	if(!empty($recipe_image)) :
	
		?><div class="<?php echo $container_css; ?>"><?php	
			echo wp_get_attachment_image($recipe_image, $size, null, array('class' => 'fullscreen-img photo'));
			//if ($recipe_video): echo '<a href="#cooked-video-lb" class="fancy-video'.$small_css.'"><i class="fa fa-play-circle"></i></a>'; endif;
			$file = get_the_ID();
			$filepath = 'http://localhost/wordpress/RecordRTC/Rec2/uploads/'.$file.'.webm';
			$file_headers = @get_headers($filepath);
			if($file_headers[0] != 'HTTP/1.0 404 Not Found'):
			echo  '<a id="timer_button99" class="fancy-video"><i class="fa fa-play-circle"></i></a>
			<div id="digital_timer99" class="modal_y">
				  <!-- Modal content -->
				  <div class="modal-content_v">
				   <span class="close"></span>
				  <iframe width="100%" height="100%" scrolling="no" frameborder="0" src="http://localhost/wordpress/RecordRTC/Rec2/uploads/video_player.php?video='.$file.'"></iframe>
				  </div> 	    
			</div>';
			endif;
		?></div><!-- /.recipe-main-img --><?php
		
	else :
	
		$size = explode('cp_',$size);
		$size = $size[1];
	
		?><div class="<?php echo $container_css; ?>"><?php	
			echo '<img src="'.CP_PLUGIN_URL.'/css/images/default_'.$size.'.png" class="fullscreen-img photo">';
			//if ($recipe_video): echo '<a href="#cooked-video-lb" class="fancy-video'.$small_css.'"><i class="fa fa-play-circle"></i></a>'; endif;
			//echo get_the_ID();
			$file = get_the_ID();
			$filepath = 'http://localhost/wordpress/RecordRTC/Rec2/uploads/'.$file.'.webm';
			$file_headers = @get_headers($filepath);
			if($file_headers[0] != 'HTTP/1.0 404 Not Found'):
			echo  '<a id="timer_button99" class="fancy-video"><i class="fa fa-play-circle"></i></a>
			<div id="digital_timer99" class="modal_y">
				  <!-- Modal content -->
				  <div class="modal-content_v">
				   <span class="close"></span>
				  <iframe width="100%" height="100%" scrolling="no" frameborder="0" src="http://localhost/wordpress/RecordRTC/Rec2/uploads/video_player.php?video='.$file.'"></iframe>
				  </div> 	    
			</div>';
			endif;
		?></div><!-- /.recipe-main-img --><?php
	
	endif;
	
}

function cp_generate_structured_data($recipe_id){
	
	$cooked_query = new WP_Query( array(
		'post_type' => 'cp_recipe',
		'post__in' => array($recipe_id)
	) );
	
	$structured_array['@context'] = 'http://schema.org/';
	$structured_array['@type'] = 'Recipe';
	
	if ($cooked_query->have_posts()):
		
		$cooked_query->the_post();
		
		$ingredients = get_post_meta($recipe_id, '_cp_recipe_detailed_ingredients',true);
		$directions = get_post_meta($recipe_id, '_cp_recipe_detailed_directions',true);
		
		if (!empty($ingredients)):
			$detailed_ingredients = true;
		else :
			$ingredients = get_post_meta($recipe_id, '_cp_recipe_ingredients', true);
			$detailed_ingredients = false;
		endif;
		
		if (!empty($directions)):
			$detailed_directions = true;
		else :
			$directions = get_post_meta($recipe_id, '_cp_recipe_directions', true);
			$detailed_directions = false;
		endif;
		
		$structured_array['name'] = $cooked_query->post->post_title;
		$structured_array['author'] = get_the_author();
		$structured_array['image'] = cp_recipe_image_url($recipe_id,array(300,300));
		$structured_array['description'] = get_post_meta($recipe_id, '_cp_recipe_short_description', true);
		$structured_array['aggregateRating'] = array(
			'@type' => 'AggregateRating',
			'ratingValue' => cp_recipe_rating($recipe_id),
			'reviewCount' => cp_recipe_rating($recipe_id,true),
			'bestRating' => '5',
			'worstRating' => '1',
		);
		$structured_array['prepTime'] = 'PT'.get_post_meta($recipe_id, '_cp_recipe_prep_time', true).'M';
		$structured_array['totalTime'] = 'PT'.(get_post_meta($recipe_id, '_cp_recipe_prep_time', true) + get_post_meta($recipe_id, '_cp_recipe_cook_time', true)).'M';
		$structured_array['recipeYield'] = get_post_meta($recipe_id, '_cp_recipe_yields', true);
		$structured_array['nutrition'] = array(
			'@type' => 'NutritionInformation',
			'servingSize' => get_post_meta($recipe_id, '_cp_recipe_nutrition_servingsize', true),
		    'calories' => get_post_meta($recipe_id, '_cp_recipe_nutrition_calories', true),
		    'fatContent' => get_post_meta($recipe_id, '_cp_recipe_nutrition_fat', true),
		    'carbohydrateContent' => get_post_meta($recipe_id, '_cp_recipe_nutrition_carbs', true),
		    'cholesterolContent' => get_post_meta($recipe_id, '_cp_recipe_nutrition_cholesterol', true),
		    'fiberContent' => get_post_meta($recipe_id, '_cp_recipe_nutrition_fiber', true),
		    'proteinContent' => get_post_meta($recipe_id, '_cp_recipe_nutrition_protein', true),
		    'saturatedFatContent' => get_post_meta($recipe_id, '_cp_recipe_nutrition_satfat', true),
		    'sodiumContent' => get_post_meta($recipe_id, '_cp_recipe_nutrition_sodium', true),
		    'sugarContent' => get_post_meta($recipe_id, '_cp_recipe_nutrition_sugar', true),
		    'transFatContent' => get_post_meta($recipe_id, '_cp_recipe_nutrition_transfat', true),
		);
		$structured_array['recipeIngredient'] = cp_format_content($ingredients,'ingredients',$detailed_ingredients,true);
		$structured_array['recipeInstructions'] = cp_format_content($directions,'directions',$detailed_directions,true);
				
	endif;
	wp_reset_postdata();
	
	return $structured_array;
	
}

function cp_recipe_image_url($recipe_id, $size = 'full'){
	
	$recipe_image_id = get_post_thumbnail_id($recipe_id);
	
	if(!empty($recipe_image_id)) :
	
		return wp_get_attachment_image_url($recipe_image_id, $size);	
		
	else :
	
		if (is_array($size)):
		
			$size = '431_424';
		
		else:
	
			$size = explode('cp_',$size);
			$size = $size[1];
		
		endif;
	
		return CP_PLUGIN_URL.'/css/images/default_'.$size.'.png';
	
	endif;
	
}

function cp_taxonomy_dropdown( $taxonomy,$empty_name,$current_values ) {
	$terms = get_terms( $taxonomy, array('hide_empty' => false));
	if ( $terms ) {
		printf( '<select data-placeholder="'.$empty_name.'" name="%s[]" class="postform">', esc_attr( $taxonomy ) );
		foreach ( $terms as $term ) {
			printf( '<option value="%s"'.($current_values && in_array($term->term_id,$current_values) ? ' selected' : '').'>%s</option>', esc_attr( $term->term_id ), esc_html( $term->name ) );
		}
		print( '</select>' );
	}
}

function cp_difficulty_dropdown( $variable, $empty_name, $current_value ) {

	printf( '<select name="%s" class="postform">', esc_attr( $variable ) );
		printf( '<option value="">%s</option>', $empty_name );
		print( '<option value="1"'.($current_value == 1 ? 'selected' : '').'>'.__('Beginner','cooked').'</option>' );
		print( '<option value="2"'.($current_value == 2 ? 'selected' : '').'>'.__('Intermediate','cooked').'</option>' );
		print( '<option value="3"'.($current_value == 3 ? 'selected' : '').'>'.__('Advanced','cooked').'</option>' );
	print( '</select>' );

}

function cp_user_recipe_total($user_id){
	
	$args = array(
		'post_type' => 'cp_recipe',
		'posts_per_page' => -1,
		'post_status' => 'any',
		'author' => $user_id
	);
	
	$userRecipes = new WP_Query($args);
	return $userRecipes->found_posts;

}

function cp_format_content($content, $section = 'ingredients', $detailed = false, $simple_array = false) {
	
	$final_content_array = array();
	$final_content = '';
	$dir_number = 0;
	$total_dir_number = 0;
	
	$display_options = get_option('cp_display_options',array());
	$disable_ingredient_checkboxes = (is_array($display_options) && in_array('disable_ingredient_checkboxes',$display_options) ? true : false);
	$disable_direction_numbers = (is_array($display_options) && in_array('disable_direction_numbers',$display_options) ? true : false);
	
	if ($detailed):
		foreach($content as $i):
		
			if ($i['type'] == 'section'):
				
				// Section Title
				$final_content .= '<p class="em-cat">'.$i['value'].'</p>';
				$dir_number = 0;
					
			else :
				
				$entry_class = 'product-entry instruction';
				
				if ( $section == 'ingredients') {
					
					$amount = $i['amount'];
					$measurement = ($i['measurement'] != 'count' ? $i['measurement'] : '');
					$name = $i['name'];
					$entry_class = 'product-entry ingredient';
					$content = '<span class="amount">' . cp_calculate_amount($amount,'fraction') . ' '. $measurement .'</span> <span class="name">' . $name . '</span>';
					
					$final_content .= '<p class="'.$entry_class.($disable_ingredient_checkboxes ? ' cp-no-padding' : '').'">'.(!$disable_ingredient_checkboxes ? '<a href="#" class="hint-check"><i class="fa fa-check"></i></a>' : '').do_shortcode($content).'</p>';
					$final_content_array[] = cp_calculate_amount($amount,'fraction') . ' ' . $measurement . ' ' . $name;
					
				} else {
					
					$dir_number++;
					$total_dir_number++;
					
					$image_id = $i['image_id'];
					$value = $i['value'];
					
					if ($value):
						$final_content .= '<p class="'.$entry_class.($dir_number > 9 ? ' cp-more-padding' : '').($disable_direction_numbers ? ' cp-no-padding' : '').'">'.(!$disable_direction_numbers ? '<span class="direction-number">'.'Step '.$dir_number.':'.'</span>' : '').do_shortcode($value).'</p>';
					endif;
					
					if ($image_id):
						$direction_image = wp_get_attachment_image( $image_id, 'cp_500_500' );
						$direction_image_full = wp_get_attachment_image_src( $image_id, 'full' );
						$final_content .= '<p class="direction-image"><a href="'.$direction_image_full[0].'" class="cooked-direction-image-lb">'.$direction_image.'</a></p>';
					endif;
					
					$final_content_array[] = $total_dir_number . ' ' . $value;
					
				}

			endif;
			
		endforeach;
		
	else :
	
		$lines = explode("\n", $content);
		
		foreach($lines as $content) :
		
			if(strpos($content, '--') === 0) : $dir_number = 0;
				$final_content .= '<p class="em-cat">'.substr($content, 2).'</p>';
			else :
				
				$entry_class = 'product-entry instruction';
	
				if ( $section == 'ingredients') {
					$entry_class   = 'product-entry ingredient';
					$content_array = explode("  ", $content);
	
					if ( count( $content_array ) > 1 ) {
						$content = '<span><span class="amount">' . $content_array[0] . '</span> <span class="name">' . $content_array[1] . '</span></span>';
						$final_content_array[] = $content_array[0] . ' ' . $content_array[1];
					} else {
						$content = '<span class="name">' . $content_array[0] . '</span>';
						$final_content_array[] = $content_array[0];
					}
					
					$final_content .= '<p class="'.$entry_class.($disable_ingredient_checkboxes ? ' cp-no-padding' : '').'">'.(!$disable_ingredient_checkboxes ? '<a href="#" class="hint-check"><i class="fa fa-check"></i></a>' : '').do_shortcode($content).'</p>';
					
				} else {
					
					$length = strlen($content);
					if ( $length > 1 ):
					
						$dir_number++;
						$total_dir_number++;
					
						$final_content .= '<p class="'.$entry_class.($dir_number > 9 ? ' cp-more-padding' : '').($disable_direction_numbers ? ' cp-no-padding' : '').'">'.(!$disable_direction_numbers ? '<span class="direction-number">'.'Step '.$dir_number.': </span>' : '').do_shortcode($content).'</p>';
						$final_content_array[] = $total_dir_number . ' ' . $content;
					
					endif;
					
				}
				
				?>
				
			<?php endif;
		endforeach;
		
	endif;
	
	if ($simple_array):
		return $final_content_array;
	else:
		echo $final_content;
	endif;
	
}

function cp_avatar($user_id,$size = 150){
	if (get_user_meta($user_id, 'avatar',true)):
		return wp_get_attachment_image( get_user_meta($user_id,'avatar',true), array($size,$size) );
	else :
		return get_avatar($user_id, $size);
	endif;
}

function cp_recipe_action_settings() {
	$recipe_actions_value = get_option('cp_action_options');
	return $recipe_actions_value != '' ? $recipe_actions_value : array();
}

function cp_are_actions_premium() {
	$recipe_actions_value = get_option('cp_premium_actions');
	if (is_array($recipe_actions_value) && in_array('active',$recipe_actions_value)):
		return true;
	else :
		return false;
	endif;
}

function cp_recipe_info_settings() {
	$recipe_actions_value = get_option('cp_info_options');
	return $recipe_actions_value != '' ? $recipe_actions_value : array();
}

function cp_advanced_editable_taxes_settings() {
	$editable_taxes_value = get_option('cp_advanced_editable_taxes');
	return $editable_taxes_value != '' ? $editable_taxes_value : array();
}

function cp_recipe_fes_settings() {
	$recipe_fes_value = get_option('cp_fes_options');
	return $recipe_fes_value != '' ? $recipe_fes_value : array();
}

function cp_recipe_section($section_name) {
	$file_path = apply_filters('cp_recipe_section', CP_PLUGIN_SECTIONS_DIR . 'section-'. $section_name . '.php', $section_name);

	include( $file_path );
}

function cp_recipe_search_section($browse_page = false) {
	
	global $manual_category, $manual_cuisine, $manual_cooking_method, $manual_sort;
	
	if (isset($manual_category) && $manual_category && !isset($_GET['category'])):
	
		$tmp_value = get_term_by( 'slug', $manual_category, 'cp_recipe_category' );
		if (empty($tmp_value)):
			$tmp_value = get_term_by( 'id', $manual_category, 'cp_recipe_category' );
		endif;
		if (empty($tmp_value)):
			$tmp_value = get_term_by( 'name', $manual_category, 'cp_recipe_category' );
		endif;
		if (!empty($tmp_value)):
			$term_id = $tmp_value->term_id;
			$_GET['category'] = $term_id;
		endif;
		
	endif;
		
	if (isset($manual_cuisine) && $manual_cuisine && !isset($_GET['cuisine'])):
	
		$tmp_value = get_term_by( 'slug', $manual_cuisine, 'cp_recipe_cuisine' );
		if (empty($tmp_value)):
			$tmp_value = get_term_by( 'id', $manual_cuisine, 'cp_recipe_cuisine' );
		endif;
		if (empty($tmp_value)):
			$tmp_value = get_term_by( 'name', $manual_cuisine, 'cp_recipe_cuisine' );
		endif;
		if (!empty($tmp_value)):
			$term_id = $tmp_value->term_id;
			$_GET['cuisine'] = $term_id;
		endif;
	
	endif;
	
	if (isset($manual_cooking_method) && $manual_cooking_method && !isset($_GET['cooking_method'])):
		
		$tmp_value = get_term_by( 'slug', $manual_cooking_method, 'cp_recipe_cooking_method' );
		if (empty($tmp_value)):
			$tmp_value = get_term_by( 'id', $manual_cooking_method, 'cp_recipe_cooking_method' );
		endif;
		if (empty($tmp_value)):
			$tmp_value = get_term_by( 'name', $manual_cooking_method, 'cp_recipe_cooking_method' );
		endif;
		if (!empty($tmp_value)):
			$term_id = $tmp_value->term_id;
			$_GET['cooking_method'] = $term_id;
		endif;
	
	endif;
	
	if (isset($manual_sort) && $manual_sort && !isset($_GET['sort'])):
	
		if ($manual_sort == 'title_desc' || $manual_sort == 'title_asc' || $manual_sort == 'date_desc' || $manual_sort == 'date_asc' || $manual_sort == 'rating_desc' || $manual_sort == 'rating_asc'):
			$_GET['sort'] = $manual_sort;
		endif;
	
	endif;

	$cooked_plugin = new cooked_plugin();
	$enabled_taxonomies = $cooked_plugin->cp_recipe_tax_settings();
	$select_count = 1;
	
	if (in_array('category',$enabled_taxonomies)): $select_count++; endif;
	if (in_array('cuisine',$enabled_taxonomies)): $select_count++; endif;
	if (in_array('method',$enabled_taxonomies)): $select_count++; endif;
	
	?><div class="search-wrap">
		<form method="get" action="<?php echo ($browse_page ? get_permalink($browse_page) : get_permalink()); ?>">
			<div class="select-row clearfix select-count-<?php echo $select_count; ?>">
				
				<?php if (in_array('category',$enabled_taxonomies)): ?>
					<div class="select-box">
						<?php $selected_category = !empty($_GET['category']) ? $_GET['category'] : false;
						$taxonomy = 'cp_recipe_category';
						$args = array(
							'orderby' => 'term_order',
							'order' => 'ASC'
						);
	
						$terms = get_terms($taxonomy, $args); ?>
						<select name="category" data-placeholder="<?php _e('All Recipe Categories','cooked'); ?>">
							<option value=""><?php _e('All Recipe Categories','cooked'); ?></option>
							<?php if(!is_wp_error($terms)) :
								foreach($terms as $term) :
									$term_id = $term->term_id; ?>
									<option value="<?php echo $term_id; ?>"<?php echo $selected_category == $term_id ? ' selected="selected"' : ''; ?>><?php echo $term->name; ?></option>
								<?php endforeach;
							endif; ?>
						</select>
					</div><!-- /.select-box -->
				<?php endif; ?>

				<?php if (in_array('cuisine',$enabled_taxonomies)): ?>
					<div class="select-box">
						<?php $selected_cuisine = !empty($_GET['cuisine']) ? $_GET['cuisine'] : false;
						$taxonomy = 'cp_recipe_cuisine';
						$args = array(
							'orderby' => 'term_order',
							'order' => 'ASC'
						);
	
						$terms = get_terms($taxonomy, $args); ?>
						<select name="cuisine" data-placeholder="<?php _e('All Recipe Cuisines','cooked'); ?>">
							<option value=""><?php _e('All Recipe Cuisines','cooked'); ?></option>
							<?php if(!is_wp_error($terms)) :
								foreach($terms as $term) :
									$term_id = $term->term_id; ?>
									<option value="<?php echo $term_id; ?>"<?php echo $selected_cuisine == $term_id ? ' selected="selected"' : ''; ?>><?php echo $term->name; ?></option>
								<?php endforeach;
							endif; ?>
						</select>
					</div><!-- /.select-box -->
				<?php endif; ?>

				<?php if (in_array('method',$enabled_taxonomies)): ?>
				<div class="select-box">
					<?php $selected_cooking_method = !empty($_GET['cooking_method']) ? $_GET['cooking_method'] : false;
					$taxonomy = 'cp_recipe_cooking_method';
					$args = array(
						'orderby' => 'term_order',
						'order' => 'ASC'
					);

					$terms = get_terms($taxonomy, $args); ?>
					<select name="cooking_method" data-placeholder="<?php _e('Budget','cooked'); ?>">
						<option value=""><?php _e('Budget','cooked'); ?></option>
						<?php if(!is_wp_error($terms)) :
							foreach($terms as $term) :
								$term_id = $term->term_id; ?>
								<option value="<?php echo $term_id; ?>"<?php echo $selected_cooking_method == $term_id ? ' selected="selected"' : ''; ?>><?php echo $term->name; ?></option>
							<?php endforeach;
						endif; ?>
					</select>
				</div><!-- /.select-box -->
				<?php endif; ?>
				
				<?php $sort = !empty($_GET['sort']) ? $_GET['sort'] : false;
				$sort_options = array(
					'title_desc' => __('Title (descending)','cooked'),
					'title_asc' => __('Title (ascending)','cooked'),
					'date_desc' => __('Date (newest first)','cooked'),
					'date_asc' => __('Date (oldest first)','cooked'),
					'rating_desc' => __('Rating (highest first)','cooked'),
					'rating_asc' => __('Rating (lowest first)','cooked')
				); ?>
				<div class="select-box">
					<select name="sort" data-placeholder="<?php _e('Sort Recipes by...','cooked'); ?>">
						<option value=""><?php _e('Sort Recipes by...','cooked'); ?></option>
						<?php foreach($sort_options as $option_name => $option_label) : ?>
							<option value="<?php echo $option_name; ?>"<?php echo ($sort == $option_name ? ' selected="selected"' : ''); ?>><?php echo $option_label; ?></option>
						<?php endforeach; ?>
					</select>
				</div><!-- /.select-box -->
			</div><!-- /.select-row -->
			<div class="search-row clearfix">
				<div class="field-wrap">
					<?php $rand_search = rand(1111,9999); ?>
					<label for="f1_<?php echo $rand_search; ?>"><?php _e('Search for Recipes','cooked'); ?> ...</label>
					<input type="text" name="content-search" id="f1_<?php echo $rand_search; ?>" class="field" value="<?php echo !empty($_GET['content-search']) ? esc_attr($_GET['content-search']) : ''; ?>" />
				</div><!-- /.field-wrap -->
				<div class="sbmt-button"><input type="submit" value="<?php _e('Search for Recipes','cooked'); ?>" /></div><!-- /.sbmt-button -->
			</div><!-- /.search-row -->
		</form>
	</div><!-- /.search-wrap -->
<?php }

function cp_recipe_rating($post_id,$just_count = false) {
	$rating = 0; $total_comments = 0;
	$reviews_comments = get_option('cp_reviews_comments');
	if($reviews_comments == 'guest_reviews_comments') {
		$post_comments = get_comments(array(
			'post_id' => $post_id,
			'status' => 'approve'
		));
		if(!empty($post_comments)) {
			$total_rating_raw = 0;
			$total_comments = 0;

			foreach($post_comments as $comment) {
				$this_rating = get_comment_meta($comment->comment_ID, 'review_rating', true);
				if ($this_rating) :
					$total_rating_raw += $this_rating;
					$total_comments++;
				endif;
			}
			if ($total_rating_raw > 0):
				$rating = ceil($total_rating_raw / $total_comments);
			else :
				$rating = 0;
			endif;
		}
	} else {
		$rating = get_post_meta($post_id, '_cp_recipe_admin_rating', true);
	}
	
	if ($just_count){ return $total_comments; } else { return $rating; }
	
}

function cp_review_fields($fields) {

	$commenter = wp_get_current_commenter();
	$user_logged_in = is_user_logged_in();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields[ 'author' ] = (!$user_logged_in ? '<div class="fields-holder clearfix">' : '' ) . '<div class="review-form-author review-field-holder field-wrap">'.
		'<label for="author">' . __( 'Your name ...', 'cooked' ) . '</label>'.
		'<input id="author" name="author" type="text" value="'. esc_attr( $commenter['comment_author'] ) .
		'" size="30" tabindex="1"' . $aria_req . ' class="field" /></div>';

	$fields[ 'email' ] = '<div class="review-form-email review-field-holder field-wrap">'.
		'<label for="email">' . __( 'Your email ...', 'cooked' ) . '</label>'.
		'<input id="email" name="email" type="text" value="'. esc_attr( $commenter['comment_author_email'] ) .
		'" size="30"  tabindex="2"' . $aria_req . ' class="field" /></div>';

	$fields['url'] = '';

	return $fields;
}

function cp_rating_fields() {
	
	global $hide_star_review;
	
	$user_logged_in = is_user_logged_in(); ?>
	<?php if($user_logged_in) : ?>
		<div class="fields-holder clearfix">
	<?php endif;

	$reviews_comments = get_option('cp_reviews_comments');
	
	if($reviews_comments != 'admin_reviews_comments' && !$hide_star_review) : ?>
		<div class="review-form-rating review-field-holder">
			<div class="rating-holder">
				<span class="rate"></span>
				<span class="rate"></span>
				<span class="rate"></span>
				<span class="rate"></span>
				<span class="rate"></span>
			</div><!-- /.rating -->
			<input type="hidden" name="cp_recipe_rating" value="" class="rating-real-value" />
		</div>
	<?php endif; ?>
	</div>
<?php }

function cp_no_default_comments($file) {
	return CP_PLUGIN_DIR . '/templates/blank-comments.php';
}

function cp_widget_list_query($sort = 'rating_desc',$count = 10){
	
	$args = array(
		'post_type' => 'cp_recipe',
		'posts_per_page' => -1,
		'meta_query' => array(
			array(
				'key' => '_cp_private_recipe',
				'compare' => 'NOT EXISTS'
			)
		)
	);
	
	switch ($sort) {
		case 'title_asc':
			$args['orderby'] = 'title';
			$args['order'] = 'ASC';
			break;

		case 'date_desc':
			$args['orderby'] = 'date';
			$args['order'] = 'DESC';
			break;

		case 'rating_desc':
			break;
		
		default:
			$args['orderby'] = 'date';
			$args['order'] = 'DESC';
			break;
	}
	
	$cooked_query = new WP_Query( $args );
	if ($cooked_query->have_posts()):
		$recipes = cp_sort_widget_recipes($cooked_query->posts,$sort);
		$recipes_ids = wp_list_pluck($recipes, 'ID');
		$args = array(
			'post_type' => 'cp_recipe',
			'posts_per_page' => $count,
			'post__in' => $recipes_ids,
			'orderby' => 'post__in',
		);
	endif;
	wp_reset_postdata();

	return $args;
}

function cp_query_for_recipes($args){
	$recipe_ids = array();
	$cooked_query = new WP_Query( $args );
	if ( $cooked_query->have_posts() ):
		$recipes = cp_sort_recipes($cooked_query->posts);
		$recipe_ids = wp_list_pluck($recipes, 'ID');
		
		// Remove Private Recipes
		foreach($recipe_ids as $rkey => $rid){
			if (get_post_meta($rid,'_cp_private_recipe',true)):
				unset($recipe_ids[$rkey]);
			endif;
		}
		
	endif;
	return $recipe_ids;
}

function cp_search_args($category = null, $cuisine = null, $cooking_method = null, $tag = null) {
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);
	
	$default_args = array(
		'post_type' => 'cp_recipe',
		'posts_per_page' => -1,
		'paged' => $paged
	);

	if(!empty($_GET['category']) && isset($_GET['category']) || $category) {
		$default_args['tax_query'][] = array(
			'taxonomy' => 'cp_recipe_category',
			'field' => 'term_id',
			'terms' => ($category ? $category : $_GET['category'])
		);
	}

	if(!empty($_GET['cuisine']) && isset($_GET['cuisine']) || $cuisine) {
		$default_args['tax_query'][] = array(
			'taxonomy' => 'cp_recipe_cuisine',
			'field' => 'term_id',
			'terms' => ($cuisine ? $cuisine : $_GET['cuisine'])
		);
	}

	if(!empty($_GET['cooking_method']) && isset($_GET['cooking_method']) || $cooking_method) {
		$default_args['tax_query'][] = array(
			'taxonomy' => 'cp_recipe_cooking_method',
			'field' => 'term_id',
			'terms' => ($cooking_method ? $cooking_method : $_GET['cooking_method'])
		);
	}

	if(!empty($_GET['sort'])) {
		$sort = $_GET['sort'];
		switch ($sort) {
			case 'title_asc':
				$default_args['orderby'] = 'title';
				$default_args['order'] = 'ASC';
				break;

			case 'title_desc':
				$default_args['orderby'] = 'title';
				$default_args['order'] = 'DESC';
				break;

			case 'date_asc':
				$default_args['orderby'] = 'date';
				$default_args['order'] = 'ASC';
				break;

			case 'date_desc':
				$default_args['orderby'] = 'date';
				$default_args['order'] = 'DESC';
				break;

			case 'rating_asc':
			case 'rating_desc':
				break;
			
			default:
				$default_args['orderby'] = 'date';
				$default_args['order'] = 'DESC';
				break;
		}
	}
	
	if(!empty($default_args['tax_query'])) {
		if(count($default_args['tax_query'])) {
			$default_args['tax_query']['relation'] = 'AND';
		}
	}
	
	$recipe_ids = array();
	
	if(!empty($_GET['content-search']) || isset($tag) && $tag) {
		
		$terms = (!empty($_GET['content-search']) ? $_GET['content-search'] : $tag);
		
		if (!empty($_GET['content-search'])):
	
			// Let's do a regular recipe search first...
			$args = $default_args;
			$args['s'] = $terms;
			$recipe_ids_search = cp_query_for_recipes($args);
		
		endif;
	
		// Let's do a tags query now...
		$args = $default_args;
		$args['tax_query'][] = array(
            'taxonomy'  => 'cp_recipe_tags',
            'field'     => 'slug',
            'terms'     => array( esc_attr($terms) )
        );
		$recipe_ids_tags = cp_query_for_recipes($args);
		
		if (!empty($_GET['content-search'])):
		
			// Merge the Recipe IDs found
			$merged_recipe_ids = array_merge($recipe_ids_tags,$recipe_ids_search);
		
			// Remove the Duplicates
			$recipe_ids = array_unique($merged_recipe_ids);
			
		else:
		
			$recipe_ids = $recipe_ids_tags;
		
		endif;
		
	} else {
		
		// No search query entered, let's just query normally.
		$recipe_ids = cp_query_for_recipes($default_args);
		
	}
		
	if (!empty($recipe_ids)):

		$args = array(
			'post_type' => 'cp_recipe',
			'posts_per_page' => get_option('posts_per_page') ? get_option('posts_per_page') : 2,
			'post__in' => $recipe_ids,
			'orderby' => 'post__in',
			'paged' => $paged
		);
		
	else :
	
		return false;
	
	endif;
	
	wp_reset_postdata();

	return $args;
}

function cp_sort_by_rating_desc($a, $b) {
	$a_rating = cp_recipe_rating($a->ID);
	$b_rating = cp_recipe_rating($b->ID);
	
	if ($a_rating == $b_rating) {
		return 0;
	}
	return ($a_rating > $b_rating) ? -1 : 1;
}

function cp_sort_by_rating_asc($a, $b) {
	$a_rating = cp_recipe_rating($a->ID);
	$b_rating = cp_recipe_rating($b->ID);
	
	if ($a_rating == $b_rating) {
		return 0;
	}
	return ($a_rating < $b_rating) ? -1 : 1;
}

function cp_search_where($where) {
	global $wpdb;
	$where .= " OR (" . $wpdb->prefix . "posts.post_title LIKE '%" . esc_sql($_GET['content-search']) . "%' AND " . $wpdb->prefix . "posts.post_type = 'cp_recipe' )";

	return $where;
}

function cp_sort_recipes($posts) {
	if(!empty($_GET['sort']) && ($_GET['sort'] == 'rating_asc' || $_GET['sort'] == 'rating_desc')) {
		if($_GET['sort'] == 'rating_asc') {
			usort($posts, 'cp_sort_by_rating_asc');
		} else {
			usort($posts, 'cp_sort_by_rating_desc');
		}
	}
	return $posts;
}

function cp_sort_widget_recipes($posts,$sort) {
	if(!empty($sort) && $sort == 'rating_desc') {
		usort($posts, 'cp_sort_by_rating_desc');
	}
	return $posts;
}

function cp_pagination() {
	
	global $cooked_query;
	
	if(!empty($cooked_query) && $cooked_query->have_posts() && $cooked_query->max_num_pages > 1) {

		$pagination = get_option('cp_list_view_pagination');
		if($pagination == 'numbered_pagination') {
			
			echo cp_display_next_posts_link(false,'pagination');
			
		} elseif($pagination == 'load_more_button') {
		
			$next_posts_link = get_next_posts_link('Next Page',$cooked_query->max_num_pages);
			echo cp_display_next_posts_link($next_posts_link,'load-button');
		
		} else {
		
			$next_posts_link = get_next_posts_link('Next Page',$cooked_query->max_num_pages);
			echo cp_display_next_posts_link($next_posts_link,'image');
			
		}

	}

}

function cp_display_next_posts_link($next_posts_link = false,$type){

	global $cooked_query;
	$cooked_query_saved = $cooked_query;
	wp_reset_postdata();
	$post_id = get_the_id();
	if (!is_page() && !is_single()):
		$http_type = ($_SERVER['HTTPS'] ? 'https://' : 'http://');
		$list_view_page_url = $http_type . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];	
	else:
		$list_view_page_url = get_permalink( $post_id );
	endif;
	
	if ($type != 'pagination'):
	
		$npl = explode('"',$next_posts_link);
		$npl_url = $npl[1];
		
		if ($list_view_page_url && get_option('permalink_structure')):
		
			if (!is_page() && !is_single()):
			
				$list_view_page_url = explode('page',$list_view_page_url);
				$list_view_page_url = $list_view_page_url[0];
				
				$npl_page = explode('page',$npl_url);
				$npl_url = $list_view_page_url . 'page'.$npl_page[1];
			
			else :
		
				$npl_page = explode('page',$npl_url);
				$npl_url = $list_view_page_url . 'page'.$npl_page[1];
				
			endif;
		
		elseif ($list_view_page_url && !get_option('permalink_structure')):
		
			if (!is_page() && !is_single()):
			
				$list_view_page_url = explode('&paged',$list_view_page_url);
				$list_view_page_url = $list_view_page_url[0];
			
				$npl_page = explode('paged',$npl_url);
				$npl_url = $list_view_page_url . '&paged'.$npl_page[1];	
			
			else :
		
				$npl_page = explode('paged',$npl_url);
				$npl_url = $list_view_page_url . '&paged'.$npl_page[1];
		
			endif;
		
		endif;

	endif;
	
	switch ($type) :
	
		case 'image' :
		
			if ($npl_page[1]):
		
				$next_posts_link = '<a href="'.$npl_url.'" class="load-more">image_tag</a>';
				$next_posts_link = str_replace('image_tag', '<img src="' . CP_PLUGIN_URL . '/css/images/ajax-loader.gif" width="32" height="32" alt="" />', $next_posts_link);
				return $next_posts_link;
				
			endif;
		
		break;
		
		case 'load-button' :
		
			if ($npl_page[1]):
			
				$next_posts_link = '<div class="recipes-pagination"><a href="'.$npl_url.'" class="btn load-more-button">'.__('Load More','cooked').'</a></div>';
				$next_posts_link = str_replace('image_tag', '<img src="' . CP_PLUGIN_URL . '/css/images/ajax-loader.gif" width="32" height="32" alt="" />', $next_posts_link);
				return $next_posts_link;
				
			endif;
		
		break;
		
		case 'pagination' :
		
			$cooked_query = $cooked_query_saved;
			
			if ($list_view_page_url && get_option('permalink_structure')):
				
				$format = 'page/%#%/';
			
			elseif ($list_view_page_url && !get_option('permalink_structure')):
			
				$format = '&paged=%#%';
			
			endif;
	
			ob_start();
			
			?><div class="recipes-pagination">
				<?php $big = 999999999;
					
				$current_page = (get_query_var('paged')) ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);

				echo paginate_links(array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'base' => $list_view_page_url.'%_%',
					'format' => $format,
					'current' => max( 1, $current_page ),
					'total' => $cooked_query_saved->max_num_pages,
					'next_text' => 'Next&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>',
					'prev_text' => '<i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Prev',
				)); ?>
			</div><?php
		
			return ob_get_clean();
		
		break;
		
	endswitch;
	
	return false;
	
}

function cp_profile_update_submit(){
	
	if (is_user_logged_in()):
	
		global $error,$post;

		$current_user = wp_get_current_user();
		$error = array();    
		
		if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {
		
		    /* Update user password. */
		    if (isset($_POST['pass1']) && isset($_POST['pass2']) && $_POST['pass1'] && $_POST['pass2']) {
		        if ( $_POST['pass1'] == $_POST['pass2'] )
		        	wp_set_password( esc_attr( $_POST['pass1'] ), $current_user->ID );
		        else
		            $error[] = __('The passwords you entered do not match. Your password was not updated.', 'cooked');
		    }
		
		    /* Update user information. */
		    if ( isset($_POST['url']) )
		    	wp_update_user( array( 'ID' => $current_user->ID, 'user_url' => esc_url( $_POST['url'] ) ) );
		    if ( isset($_POST['email']) ){
		    
		    	$email_exists = email_exists(esc_attr( $_POST['email'] ));
		    	
		        if (!is_email(esc_attr( $_POST['email'] )))
		            $error[] = __('The Email you entered is not valid.  please try again.', 'cooked');
		        elseif( $email_exists && $email_exists != $current_user->ID )
		            $error[] = __('This email is already used by another user.  try a different one.', 'cooked');
		        else{
		            wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['email'] )));
		        }
		    }
		
		    if ( isset( $_POST['nickname'] ) ):
		        update_user_meta( $current_user->ID, 'nickname', esc_attr( $_POST['nickname'] ) );
		        wp_update_user( array ('ID' => $current_user->ID, 'display_name' => esc_attr( $_POST['nickname'] )));
		    endif;
		        
		    if ( isset($_POST['description']) )
		        update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) );
		        
	        // AVATAR UPLOAD
	        $avatar = $_FILES['avatar'];
	        
	        if ($avatar['tmp_name']):
				if (isset($avatar,$_POST['avatar_nonce']) && $avatar && wp_verify_nonce( $_POST['avatar_nonce'], 'avatar_upload' )) {				
					require_once( ABSPATH . 'wp-admin/includes/image.php' );
					require_once( ABSPATH . 'wp-admin/includes/file.php' );
					require_once( ABSPATH . 'wp-admin/includes/media.php' );
					
					$attachment_id = media_handle_upload( 'avatar', 0 );
					
					if ( is_wp_error( $attachment_id ) ) {
						$error[] = __('Error uploading avatar.','cooked');
					} else {
						update_user_meta( $current_user->ID, 'avatar', $attachment_id );
					}
				} else {
					$error[] = __('Avatar uploader security check failed.','cooked');	
				}
			endif;
			// END AVATAR UPLOAD
		
		    /* Redirect so the page will show updated info.*/
		    if ( count($error) == 0 ) {
		        //action hook for plugins and extra fields saving
		        do_action('edit_user_profile_update', $current_user->ID);
				wp_redirect( get_permalink($post->ID) );
		        exit;
		    }
		}
	
	endif;
	
}

add_action('get_header','cp_profile_update_submit');

function cp_do_math($expression) {
	eval('$o = ' . preg_replace('/[^0-9\+\-\*\/\(\)\.]/', '', $expression) . ';');
	return $o;
}

function cp_calculate_amount($amount, $type = 'decimal') {
	if($type === 'decimal') {
		$amount_parts = explode(' ', $amount);
		$total_parts = count($amount_parts);

		if($total_parts === 1) {
			$amount = cp_do_math($amount);
		} elseif($total_parts === 2) {
			$full_part = $amount_parts[0];
			$fractional_part = cp_do_math($amount_parts[1]);
			$amount = $full_part + $fractional_part;
		} else {
			$amount = floatval($amount);
		}
		$amount = (float)number_format($amount, 10);
	} else {
		$amount_parts = explode('.', $amount);
		$total_parts = count($amount_parts);

		if($total_parts === 2) {
			$full_part = intval($amount_parts[0]);
			$fractional_part = float2rat($amount - $full_part);
			if($full_part === 0) {
				$amount = $fractional_part;
			} else {
				$amount = $full_part . ' ' . $fractional_part;
			}
		} else {
			if($total_parts !== 1) {
				$amount = float2rat($amount);
			}
		}
	}

	return $amount;
}

function float2rat($n, $tolerance = 1.e-6) {
	$h1=1; $h2=0;
	$k1=0; $k2=1;
	$b = 1/$n;
	do {
		$b = 1/$b;
		$a = floor($b);
		$aux = $h1; $h1 = $a*$h1+$h2; $h2 = $aux;
		$aux = $k1; $k1 = $a*$k1+$k2; $k2 = $aux;
		$b = $b-$a;
	} while (abs($n-$h1/$k1) > $n*$tolerance);

	return "$h1/$k1";
}
