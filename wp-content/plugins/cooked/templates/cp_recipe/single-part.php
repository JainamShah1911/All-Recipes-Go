<?php
	
global 	$post_id,
		$my_recipe,
		$in_recipe_template;
		
if (!$post_id):
	$post_id = get_the_ID();
endif;

$in_recipe_template = true;

?>
<div id="cooked-plugin-page"><?php
	
	$recipe_post = get_post($post_id);
	
	$author_id = $recipe_post->post_author;
	$private_recipe = get_post_meta($post_id, '_cp_private_recipe', true);
	$recipe_image = get_post_meta($post_id, '_thumbnail_id', true);
	$recipe_video = get_post_meta($post_id, '_cp_recipe_external_video', true);
	$recipe_actions = cp_recipe_action_settings();
	$recipe_template = get_option('cp_recipe_template');
	$my_recipe = false;
	
	if (is_user_logged_in()):
		global $post;
		$current_user = wp_get_current_user();
		if ($current_user->ID == $author_id):
			$my_recipe = true;
		endif;
	endif;
	
	echo wp_get_attachment_image($recipe_image, 'cp_960_425', null, array('class' => 'print-image'));
	
	// Your recipe and you're editing it?
	if ( $my_recipe && isset($_GET['edit']) ):
	
		echo '<div id="cooked-recipe-edit-panel">';
			
			echo '<span class="info-text">'.__('You are currently editing your recipe ...','cooked').'</span>';
			echo '<br>';
			echo '<strong><a href="'.get_the_permalink($post_id).'">'.__('Go back','cooked').'</a></strong>';
			echo cp_edit_recipe_form($post_id);
			
		echo '</div>';
		
	elseif ($my_recipe || !$my_recipe && $private_recipe == false) :

		$recipe_actions = cp_recipe_action_settings();
	
		?><div class="recipe-action">
			
			<div class="clearfix">
			
			<?php
				
			$social_sharing_links = cp_get_social_sharing_links();
			echo apply_filters('cp_social_sharing_links',$social_sharing_links);
		
			if (cp_are_actions_premium() && is_user_logged_in() || !cp_are_actions_premium()):
		
				echo '<div id="cooked-action-buttons">';
		
					if (!isset($cooked_is_embedded)):
						if (in_array('favorite_button', $recipe_actions)) :
						
							if (is_user_logged_in()):
								$user_ID = get_current_user_id();
								$user_likes = get_user_meta($user_ID, 'cp_likes',true);
							endif;
							
							?><a class="like-btn" href="<?php echo get_permalink(); ?>" data-cookied="<?php echo number_format(!is_user_logged_in()); ?>" data-userLiked="<?php if (is_user_logged_in() && is_array($user_likes) && in_array($post_id,$user_likes)): ?>1<?php else : ?>0<?php endif; ?>" data-recipe-id="<?php echo $post_id; ?>">
								<?php
									$likes = get_post_meta( $post_id, '_cp_likes', true );
								?>
								<span class="like-count"><?php echo $likes ? $likes : 0; ?></span>
								<i class="fa fa-heart-o"> Like!</i>
							</a>
						<?php endif;
						
					endif;


					if(in_array('print_button', $recipe_actions)) : ?>
						<a class="print-btn" href="<?php echo get_permalink($post_id); ?>?print" target="_blank"><i class="fa fa-print"></i></a>
					<?php endif;
				
					if (!isset($cooked_is_embedded)):
						if(in_array('full_screen_button', $recipe_actions)) : ?>
							<a class="fs-btn" href="#">
								<span class="fa-stack fa-lg">
								  <i class="fa fa-square fa-stack-2x"></i>
								  <i class="fa fa-expand fa-stack-1x fa-inverse"></i>
								</span>
								<span class="fa-btn-text"><?php _e('Full-screen','cooked'); ?></span>
							</a>
						<?php endif;
					endif;
				
				echo '</div>';
				
			endif; ?>
			
			</div>
			
		</div><!-- /.recipe-action -->
	
		<div class="recipe-container <?php echo $recipe_template; ?>"><?php
		
			// Is this your recipe? show the options!
			if ($my_recipe):
				
				if ( isset($_GET['hide']) ) :
	
					update_post_meta($post_id, '_cp_private_recipe', true);
					$private_recipe = true;
					
				elseif ( isset($_GET['show']) ) :
				
					delete_post_meta($post_id, '_cp_private_recipe');
					$private_recipe = false;
				
				endif;
			
				echo '<div id="cooked-recipe-edit-panel"'.($private_recipe ? ' class="private"' : '').'>';
					
					if (isset($_GET['success'])):
						echo '<span class="info-text">'.__('Your recipe has been updated!','cooked').'</span>';
					elseif ($private_recipe):
						echo '<span class="cp-private-tag">'.__('Private Recipe','cooked').'</span><br><span class="info-text">'.__('This recipe is private (only you can see it). You have the option to do the following:','cooked').'</span>';
					else :
						echo '<span class="cp-public-tag">'.__('Public Recipe','cooked').'</span><br><span class="info-text">'.__('This is your recipe! You have the option to do the following:','cooked').'</span>';
					endif;
					echo '<br>';
					echo '<strong><i class="fa fa-pencil"></i>&nbsp;&nbsp;<a href="'.get_the_permalink($post_id).'?edit">'.__('Edit this Recipe','cooked').'</a></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>';
					if ($private_recipe):
						echo '<i class="fa fa-eye"></i>&nbsp;&nbsp;<a href="'.get_the_permalink($post_id).'?show">'.__('Make this Recipe Public','cooked').'</a>';
					else :
						echo '<i class="fa fa-eye-slash"></i>&nbsp;&nbsp;<a href="'.get_the_permalink($post_id).'?hide" class="cp-delete">'.__('Make this Recipe Private','cooked').'</a>';
					endif;
					echo '</strong>';
					
				echo '</div>';
			
			endif;
			
			if ($recipe_video):
			
				echo '<div id="cooked-video-lb">';
				echo wp_oembed_get($recipe_video, array('width'=>960));
				echo '</div>';
			
			endif;
			
			switch ($recipe_template) :
				case 'upper_image_left_sidebar':
				
					cp_recipe_image($recipe_image,'cp_960_425','recipe-main-img',$recipe_video); ?>
	
					<div class="recipe-row sub-row">
						<div class="cp-box box-gray">
	
							<div id="tab-info" class="cp-box-inner recipe-info cp-tab current">
								<?php cp_recipe_section('recipe_info'); ?>
							</div><!-- /.recipe-info -->
	
							<div id="tab-ingredients" class="cp-box-inner recipe-hints cp-tab">
								<?php cp_recipe_section('ingredients'); ?>
							</div>
	
						</div><!-- /.cp-box -->
	
						<div class="cp-box box-white">
							<div id="tab-directions" class="cp-box-inner cp-tab instructions">
								<div class="recipe-hints">
									<?php cp_recipe_section('directions'); ?>
								</div><!-- /.recipe-hints -->
							</div><!-- /.cp-box-inner -->
						</div><!-- /.cp-box -->
	
					</div><!-- /.recipe-row -->
					<?php cp_recipe_section('fullscreen');
					break;
	
				case 'middle_image_right_sidebar' : ?>
				
					<div id="tab-info" class="recipe-row main-row cp-tab current">
						<div class="recipe-info recipe-center">
							<?php cp_recipe_section('recipe_info'); ?>
						</div><!-- /.recipe-info -->
					</div><!-- /.recipe-row -->
					<?php cp_recipe_image($recipe_image,'cp_960_425','recipe-main-img',$recipe_video); ?>
					<div class="recipe-row sub-row">
						<div class="cp-box box-gray">
							<div id="tab-ingredients" class="cp-box-inner cp-tab">
								<div class="recipe-hints">
									<?php cp_recipe_section('ingredients'); ?>
								</div>
							</div><!-- /.cp-box-inner -->
						</div><!-- /.cp-box -->
						<div class="cp-box box-white">
							<div id="tab-directions" class="cp-box-inner cp-tab instructions">
								<div class="recipe-hints">
									<?php cp_recipe_section('directions'); ?>
								</div><!-- /.recipe-hints -->
							</div><!-- /.cp-box-inner -->
						</div><!-- /.cp-box -->
					</div><!-- /.recipe-row -->
					<?php cp_recipe_section('fullscreen');
					break;
	
				case 'upper_image_middle_header_right_sidebar' :
	
					cp_recipe_image($recipe_image,'cp_960_425','recipe-main-img',$recipe_video); ?>
					<div id="tab-info" class="recipe-row main-row cp-tab current">
						<div class="recipe-info recipe-center">
							<?php cp_recipe_section('recipe_info'); ?>
						</div><!-- /.recipe-info -->
					</div><!-- /.recipe-row -->
					<div class="recipe-row sub-row">
						<div class="cp-box box-gray">
							<div id="tab-ingredients" class="cp-box-inner cp-tab">
								<div class="recipe-hints">
									<?php cp_recipe_section('ingredients'); ?>
								</div>
							</div><!-- /.cp-box-inner -->
						</div><!-- /.cp-box -->
						<div class="cp-box box-white">
							<div id="tab-directions" class="cp-box-inner cp-tab instructions">
								<div class="recipe-hints">
									<?php cp_recipe_section('directions'); ?>
								</div><!-- /.recipe-hints -->
							</div><!-- /.cp-box-inner -->
						</div><!-- /.cp-box -->
					</div><!-- /.recipe-row -->
					<?php cp_recipe_section('fullscreen');
					break;
	
				case 'upper_left_image_left_sidebar' : ?>
					<div id="tab-info" class="recipe-row main-row cp-tab current">
						<?php cp_recipe_image($recipe_image,'cp_960_425','cp-box cp-box-img-holder',$recipe_video,' sm'); ?>
						<div class="cp-box box-white">
							<div class="recipe-info">
								<?php cp_recipe_section('recipe_info'); ?>
							</div><!-- /.recipe-info -->
						</div><!-- /.cp-box -->
					</div><!-- /.recipe-row -->
					<div class="recipe-row sub-row">
						<div class="cp-box box-gray">
							<div id="tab-ingredients" class="cp-box-inner cp-tab">
								<div class="recipe-hints">
									<?php cp_recipe_section('ingredients'); ?>
								</div>
							</div><!-- /.cp-box-inner -->
						</div><!-- /.cp-box -->
						<div class="cp-box box-white">
							<div id="tab-directions" class="cp-box-inner cp-tab instructions">
								<div class="recipe-hints">
									<?php cp_recipe_section('directions'); ?>
								</div><!-- /.recipe-hints -->
							</div><!-- /.cp-box-inner -->
						</div><!-- /.cp-box -->
					</div><!-- /.recipe-row -->
					<?php cp_recipe_section('fullscreen');
					break;
	
				case 'upper_image_right_sidebar' :
	
					cp_recipe_image($recipe_image,'cp_960_425','recipe-main-img',$recipe_video); ?>							
					<div class="recipe-row sub-row">
						<div class="cp-box box-white">
							<div id="tab-directions" class="cp-box-inner cp-tab instructions">
								<div class="recipe-hints">
									<?php cp_recipe_section('directions'); ?>
								</div><!-- /.recipe-hints -->
							</div><!-- /.cp-box-inner -->
						</div><!-- /.cp-box -->
						
						<div class="cp-box box-gray">
							<div id="tab-info" class="cp-box-inner recipe-info cp-tab current">
								<?php cp_recipe_section('recipe_info'); ?>
							</div><!-- /.recipe-info -->
	
							<div id="tab-ingredients" class="cp-box-inner recipe-hints cp-tab">
								<?php cp_recipe_section('ingredients'); ?>
							</div>
						</div><!-- /.cp-box -->
					</div><!-- /.recipe-row -->
					<?php cp_recipe_section('fullscreen');
					break;
	
				case 'middle_image_left_sidebar' : ?>
					<div id="tab-info" class="recipe-row main-row cp-tab current">
						<div class="recipe-info recipe-center">
							<?php cp_recipe_section('recipe_info'); ?>
						</div><!-- /.recipe-info -->
					</div><!-- /.recipe-row -->
					<?php cp_recipe_image($recipe_image,'cp_960_425','recipe-main-img',$recipe_video); ?>
					<div class="recipe-row sub-row">
						<div class="cp-box box-white">
							<div id="tab-directions" class="cp-box-inner cp-tab instructions">
								<div class="recipe-hints">
									<?php cp_recipe_section('directions'); ?>
								</div><!-- /.recipe-hints -->
							</div><!-- /.cp-box-inner -->
						</div><!-- /.cp-box -->
						
						<div class="cp-box box-gray">
							<div id="tab-ingredients" class="cp-box-inner cp-tab">
								<div class="recipe-hints">
									<?php cp_recipe_section('ingredients'); ?>
								</div>
							</div><!-- /.cp-box-inner -->
						</div><!-- /.cp-box -->
					</div><!-- /.recipe-row -->
					<?php cp_recipe_section('fullscreen');
					break;
	
				case 'upper_image_middle_header_left_sidebar' :
	
					cp_recipe_image($recipe_image,'cp_960_425','recipe-main-img',$recipe_video); ?>
					<div id="tab-info" class="recipe-row main-row cp-tab current">
						<div class="recipe-info recipe-center">
							<?php cp_recipe_section('recipe_info'); ?>
						</div><!-- /.recipe-info -->
					</div><!-- /.recipe-row -->
					<div class="recipe-row sub-row">
						<div class="cp-box box-white">
							<div id="tab-directions" class="cp-box-inner cp-tab instructions">
								<div class="recipe-hints">
									<?php cp_recipe_section('directions'); ?>
								</div><!-- /.recipe-hints -->
							</div><!-- /.cp-box-inner -->
						</div><!-- /.cp-box -->
						<div class="cp-box box-gray">
							<div id="tab-ingredients" class="cp-box-inner cp-tab">
								<div class="recipe-hints">
									<?php cp_recipe_section('ingredients'); ?>
								</div>
							</div><!-- /.cp-box-inner -->
						</div><!-- /.cp-box -->
					</div><!-- /.recipe-row -->
					<?php cp_recipe_section('fullscreen');
					break;
					
				case 'skinny_upper_image' :
				
					cp_recipe_image($recipe_image,'cp_960_425','recipe-main-img',$recipe_video); ?>
					<div id="tab-info" class="recipe-row main-row cp-tab current">
						<div class="recipe-info recipe-center">
							<?php cp_recipe_section('recipe_info'); ?>
						</div><!-- /.recipe-info -->
					</div><!-- /.recipe-row -->
					<div class="recipe-row sub-row skinny">
						<div class="cp-box box-gray">
							<div id="tab-ingredients" class="cp-box-inner cp-tab">
								<div class="recipe-hints">
									<?php cp_recipe_section('ingredients'); ?>
								</div>
							</div><!-- /.cp-box-inner -->
						</div><!-- /.cp-box -->
						<div class="cp-box box-white">
							<div id="tab-directions" class="cp-box-inner cp-tab instructions">
								<div class="recipe-hints">
									<?php cp_recipe_section('directions'); ?>
								</div><!-- /.recipe-hints -->
							</div><!-- /.cp-box-inner -->
						</div><!-- /.cp-box -->
					</div><!-- /.recipe-row -->
					<?php cp_recipe_section('fullscreen');
				
					break;
					
				case 'skinny_middle_image' : ?>
				
					<div id="tab-info" class="recipe-row main-row cp-tab current">
						<div class="recipe-info recipe-center">
							<?php cp_recipe_section('recipe_info'); ?>
						</div><!-- /.recipe-info -->
					</div><!-- /.recipe-row -->
					<?php cp_recipe_image($recipe_image,'cp_960_425','recipe-main-img',$recipe_video); ?>
					<div class="recipe-row sub-row skinny">
						<div class="cp-box box-gray">
							<div id="tab-ingredients" class="cp-box-inner cp-tab">
								<div class="recipe-hints">
									<?php cp_recipe_section('ingredients'); ?>
								</div>
							</div><!-- /.cp-box-inner -->
						</div><!-- /.cp-box -->
						<div class="cp-box box-white">
							<div id="tab-directions" class="cp-box-inner cp-tab instructions">
								<div class="recipe-hints">
									<?php cp_recipe_section('directions'); ?>
								</div><!-- /.recipe-hints -->
							</div><!-- /.cp-box-inner -->
						</div><!-- /.cp-box -->
					</div><!-- /.recipe-row -->
					<?php cp_recipe_section('fullscreen');
				
					break;
	
				default: ?>
				
					<div id="tab-info" class="recipe-row main-row cp-tab current">
						<div class="cp-box box-white">
							<div class="recipe-info">
								<?php cp_recipe_section('recipe_info'); ?>
							</div><!-- /.recipe-info -->
						</div><!-- /.cp-box -->
						<?php cp_recipe_image($recipe_image,'cp_960_425','cp-box cp-box-img-holder',$recipe_video,' sm'); ?>
					</div><!-- /.recipe-row -->
					<div class="recipe-row sub-row">
						<div class="cp-box box-white">
							<div id="tab-directions" class="cp-box-inner cp-tab instructions">
								<div class="recipe-hints">
									<?php cp_recipe_section('directions'); ?>
								</div><!-- /.recipe-hints -->
							</div><!-- /.cp-box-inner -->
						</div><!-- /.cp-box -->
						<div class="cp-box box-gray">
							<div id="tab-ingredients" class="cp-box-inner cp-tab">
								<div class="recipe-hints">
									<?php cp_recipe_section('ingredients'); ?>
								</div>
							</div><!-- /.cp-box-inner -->
						</div><!-- /.cp-box -->
					</div><!-- /.recipe-row -->
					<?php cp_recipe_section('fullscreen');
					break;
	
			endswitch; ?>
				
		</div><!-- /.recipe-container -->
		
		<?php cp_recipe_section('nutrition'); ?>
		
	<?php endif; // END IF EDITING ?>
	
	<?php
	
	if (!isset($hide_reviews)):
	
		if ($my_recipe || !$my_recipe && $private_recipe == false):
			cp_recipe_section('reviews');
		else :
			add_filter('comments_template', 'cp_no_default_comments');
			echo '<div id="cooked-recipe-edit-panel" style="padding:200px 0; margin:0;">';
						
				if ($private_recipe):
					echo '<span class="cp-private-tag">'.__('Private Recipe','cooked').'</span><br><span class="info-text">'.__('Whoops! This recipe is private.','cooked').'</span>';
				endif;
				
			echo '</div>';
		endif;
	
	endif;
	
	$structured_array = cp_generate_structured_data($post_id);	
	echo '<script type="application/ld+json">'.stripslashes(str_replace('\\r','',json_encode($structured_array))).'</script>';
		
	?>
	
</div>

<?php wp_reset_postdata(); ?>