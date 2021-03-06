<?php global $cooked_query; $is_page = is_page(); $is_post = is_single(); $no_results = false; ?>
<div id="cooked-plugin-page">

	<?php if($is_page || $is_post) : ?>
	
		<div class="search-section">
			<?php cp_recipe_search_section(); ?>
		</div><!-- /.search-section -->
		<?php
		
		$args = cp_search_args();
		if ($args):
			$cooked_query = new WP_Query( $args );
		else :
			$no_results = true;
		endif;
		
	elseif (is_archive()):
	
		global $archive_args;
		if ($archive_args):
			$cooked_query = new WP_Query( $archive_args );
		else :
			$no_results = true;
		endif;
	
	endif; ?>
	<div class="cooked-result-section cooked-masonry-layout cookedClearFix">
		<div class="cooked-loading-content">
			<?php if ( isset($cooked_query) && $cooked_query->have_posts() && !$no_results) :
			
				$recipe_info = cp_recipe_info_settings();
				
				echo '<div class="grid-sizer"></div>';

				while ( $cooked_query->have_posts() ):
					$cooked_query->the_post(); global $post;
					$entry_id = $post->ID;
					$entry_link = get_permalink($entry_id);
					$entry_image = get_post_meta($entry_id, '_thumbnail_id', true);
					$entry_title = get_the_title($entry_id);
					$entry_rating = cp_recipe_rating($entry_id);
					$entry_description = get_post_meta($entry_id, '_cp_recipe_short_description', true);
					$entry_excerpt = get_post_meta($entry_id, '_cp_recipe_excerpt', true);
					$prep_time = get_post_meta($entry_id, '_cp_recipe_prep_time', true);
					$cook_time = get_post_meta($entry_id, '_cp_recipe_cook_time', true);
					$total_time = $prep_time + $cook_time;
					$entry_yields = get_post_meta($entry_id, '_cp_recipe_yields', true); 
					$entry_budget = get_post_meta($entry_id, '_cp_recipe_budget', true); ?>
					
					<div class="cooked-result-box item">
						<div class="cp-box">
							<div class="cp-box-img">
								<?php if(!empty($entry_image)) {
									echo '<a href="'.$entry_link.'">'.wp_get_attachment_image($entry_image, 'cp_298_192').'</a>';
								} else {
									echo '<a href="'.$entry_link.'"><img src="'.CP_PLUGIN_URL.'/css/images/default_298_192.png"></a>';
								}
								?>
							</div><!-- /.cp-box-img -->
							<div class="cp-box-entry">
								<h2><a href="<?php echo $entry_link; ?>"><?php echo $entry_title; ?></a><?php
									if (in_array('difficulty_level', $recipe_info)) :
										$difficulty_level = get_post_meta($entry_id, '_cp_recipe_difficulty_level', true);
										cp_difficulty_level($difficulty_level);
									endif;
								?></h2>
								<?php if (in_array('rating', $recipe_info)) : ?><div class="rating rate-<?php echo $entry_rating; ?>"></div><!-- /.rating --><?php endif; ?>
								<?php if (in_array('description', $recipe_info)) :
									if ($entry_excerpt):
										echo wpautop($entry_excerpt);
									else :
										echo wpautop($entry_description);
									endif;
								endif; ?>
								<?php if (in_array('excerpt', $recipe_info) && !in_array('description', $recipe_info)) :
									if ($entry_excerpt):
										echo wpautop($entry_excerpt);
									endif;
								endif; ?>
								<?php if (in_array('author', $recipe_info)) :

									echo '<p class="terms-list">';
									
									$author_id = get_the_author_meta('ID');
									$nickname = get_the_author_meta('nickname');
									$username = get_the_author_meta('user_login');
									if (!$nickname) { $nickname = $username; }
									$username = cp_create_slug($username);
									
									$avatar_image = false;
									if (in_array('author_avatar', $recipe_info)) :
										$avatar_image = cp_avatar($author_id,50);
									endif;
									
									$profile_page_link = cp_get_profile_page_url();
									$profile_page_link = rtrim($profile_page_link, '/');
									
									if ($profile_page_link):
								
										echo '<span>'.($avatar_image ? $avatar_image : '<i class="fa fa-user"></i>&nbsp;&nbsp;') . __('By','cooked') . ' <a href="' . $profile_page_link . '/' . $username . '/">' . $nickname.'</a></span>';
									
									endif;
									
									echo '</p>';
									
								endif; ?>
							</div><!-- /.cp-box-entry -->
							<?php if ($entry_yields || $total_time): if (in_array('timing', $recipe_info) || in_array('yields', $recipe_info)) : ?>
							<div class="cp-box-footer">
								<div class="timing">
									<ul>
										<?php if (in_array('timing', $recipe_info) && $total_time) : ?>
											<?php if ($prep_time): ?><li><strong><?php _e('Prep','cooked'); ?>:</strong> <?php echo cp_format_time($prep_time); ?></li><?php endif; ?>
											<?php if ($cook_time): ?><li><strong><?php _e('Cook','cooked'); ?>:</strong> <?php echo cp_format_time($cook_time); ?></li><?php endif; ?>
										<?php endif; ?>
										<?php if (in_array('yields', $recipe_info) && $entry_yields) : ?><li><strong><?php _e('Yields','cooked'); ?>:</strong> <?php echo $entry_yields; ?></li><?php endif; ?>
									</ul>
								</div><!-- /.timing -->
							</div><!-- /.cp-box-footer -->
							<?php endif; endif; ?>
						</div><!-- /.cp-box -->
					</div><!-- /.cooked-result-box -->
					
				<?php endwhile;

			else : ?>
				<div class="cooked-result-box item">
					<p><?php _e('No recipes found.','cooked'); ?></p>
				</div><!-- /.cooked-result-box -->
			<?php endif; ?>
		</div><!-- /.cooked-loading-content -->
	</div><!-- /.cooked-result-section -->
	<?php cp_pagination();

	if($is_page || $is_post) {
		wp_reset_postdata();
	} ?>
	
</div><!-- /#cooked-plugin-page -->