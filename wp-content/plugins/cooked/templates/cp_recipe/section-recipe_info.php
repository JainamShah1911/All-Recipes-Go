<?php global $post_id,$cooked_is_embedded; if (!$post_id): $post_id = get_the_ID(); endif;

$recipe_post = get_post($post_id);
$author_id = $recipe_post->post_author;
$recipe_info = cp_recipe_info_settings();
$recipe_image = get_post_meta($post_id, '_thumbnail_id', true);
$recipe_image_url = cp_recipe_image_url($recipe_image,'cp_960_425');
$cooked_plugin = new cooked_plugin();
$enabled_taxonomies = $cooked_plugin->cp_recipe_tax_settings();
$terms_list = array();
	
// Get the Category & Taxonomies
if (in_array('category',$enabled_taxonomies)):
	if (in_array('category', $recipe_info)) : $terms_list[] = get_the_term_list( $post_id, 'cp_recipe_category', '<span><i class="fa fa-book"></i>&nbsp;&nbsp;', ', ', '</span>' ); endif;
endif;
if (in_array('cuisine',$enabled_taxonomies)):
	if (in_array('cuisine', $recipe_info)) : $terms_list[] = get_the_term_list( $post_id, 'cp_recipe_cuisine', '<span><i class="fa fa-flag"></i>&nbsp;&nbsp;', ', ', '</span>' ); endif;
endif;
if (in_array('method',$enabled_taxonomies)):
	if (in_array('method', $recipe_info)) : $terms_list[] = get_the_term_list( $post_id, 'cp_recipe_cooking_method', '<span><i class="fa fa-cutlery"></i>&nbsp;&nbsp;', ', ', '</span>' ); endif;
endif;

?><h1 class="entry-title"><?php
	
	echo get_the_title($post_id);
	
	if (in_array('difficulty_level', $recipe_info)) :
		$difficulty_level = get_post_meta($post_id, '_cp_recipe_difficulty_level', true);
		cp_difficulty_level($difficulty_level);
	endif;

?></h1>

<?php if (!empty($terms_list) || in_array('author', $recipe_info)) :

	echo '<p class="terms-list">';
	
	if (in_array('author', $recipe_info)) :

		global $post;
		$nickname = get_the_author_meta('nickname',$author_id);
		$username = get_the_author_meta('user_login',$author_id);
		if (!$nickname) { $nickname = $username; }
		$username = cp_create_slug($username);
		
		$profile_page_link = cp_get_profile_page_url();
		$profile_page_link = rtrim($profile_page_link, '/');
		
		$avatar_image = false;
		if (in_array('author_avatar', $recipe_info)) :
			$avatar_image = cp_avatar($author_id,500);
		endif;
		
		echo '<span>'.__('Recipe By :','cooked') . ' ' . ($profile_page_link ? '<a href="' . $profile_page_link . '/' . $username . '/">' : '') . $nickname . ($profile_page_link ? '</a>' : '') .'<br/>'. ($avatar_image ? $avatar_image : '<i class="fa fa-user"></i>&nbsp;&nbsp;').'</span>';
	//////////////////////////////////////////////////////////
		$recipe_rating = cp_recipe_rating($post_id);
		echo '<div class="rating rate-';
		echo $recipe_rating.'"></div>';

		$mades = get_post_meta( $post_id, '_cp_mades', true );
		echo '<br/><span class="made-count"><strong>';
		echo $mades ? $mades : 0;
		echo ' made it | </strong></span>';
		$reviews = get_comments(array(
				'post_id' => $post_id,
				'status' => 'approve'
			));
		$reviews_count = count($reviews);
		echo '<span><strong>'.$reviews_count;
		echo _n(' People Rated | ',' Peoples Rated | ',$reviews_count,'cooked');
		echo '</span></strong>';	
		///////////////////////////////
	endif;
	
	if (!empty($terms_list)):
		
		echo implode(' | ',$terms_list);
	
	endif;
	
	echo '</p>';
	
endif; ?>

<p class="published"><?php the_time( 'F j, Y' ); ?><span class="value-title" title="<?php the_time( 'Y-m-d' ); ?>"></span></p>

<?php if (in_array('description', $recipe_info)) :

	if($recipe_short_description = get_post_meta($post_id, '_cp_recipe_short_description', true)) : ?>
		<div class="info-entry summary">
			<?php echo do_shortcode(wpautop($recipe_short_description)); ?>
		</div><!-- /.entry -->
	<?php endif;

endif;

$prep_time = get_post_meta($post_id, '_cp_recipe_prep_time', true);
$cook_time = get_post_meta($post_id, '_cp_recipe_cook_time', true);
$total_time = $cook_time + $prep_time;
$yields = get_post_meta($post_id, '_cp_recipe_yields', true);

if (in_array('timing', $recipe_info) || in_array('yields', $recipe_info)):
	if ($prep_time || $cook_time || $yields): ?>
	
		<div class="timing">
			<ul>
				<?php if (in_array('timing', $recipe_info)) : ?>
					<?php if ($prep_time): ?><li><strong><?php _e('Preparation Time','cooked'); ?>:</strong> <?php echo cp_format_time($prep_time); ?></li><?php endif; ?>
					<?php if ($cook_time): ?><li><strong><?php _e('Cooking Time','cooked'); ?>:</strong> <?php echo cp_format_time($cook_time); ?></li><?php endif; ?>
				<?php endif; ?>
				<?php if (in_array('yields', $recipe_info) && $yields) : ?>
					<li><strong><?php _e('Total servings','cooked'); ?>:</strong> <?php echo $yields; ?></li>
				<?php endif; ?>
			</ul>
		</div><!-- /.timing --><?php
	
	endif;
endif;