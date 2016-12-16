<?php if ( comments_open() ) :
	
	if ( !isset($_GET['edit']) ) :
	
		global $hide_star_review, $my_recipe;
		
		$hide_star_review = false;
		$reviews_comments = get_option('cp_reviews_comments');
		if($reviews_comments == 'guest_reviews_comments' || $reviews_comments == 'admin_reviews_comments') :
		
			add_filter('comments_template', 'cp_no_default_comments');
			add_filter('comment_form_default_fields', 'cp_review_fields');
	
			global $post_id; if (!$post_id): $post_id = get_the_ID(); endif;
	
			$reviews = get_comments(array(
				'post_id' => $post_id,
				'status' => 'approve'
			));
	
			$reviews_count = count($reviews);
			$recipe_rating = cp_recipe_rating($post_id); ?>
			<div class="reviews-section">
				<div class="reviews-head">
					<h2><?php echo $reviews_count; ?> <?php echo _n('Comment','Comments',$reviews_count,'cooked'); ?></h2>
					<?php if($reviews_comments != 'admin_reviews_comments') :
						$reviews_comments = get_option('cp_reviews_comments');
						$star_review_optional = get_option('cp_star_review_options');
						if (is_array($star_review_optional) && !empty($star_review_optional)):
							$star_review_optional = true;
						else :
							$star_review_optional = false;
						endif;
						
						if( current_user_can('editor') || current_user_can('administrator') || $my_recipe) {
							$star_review_optional = true;
							$hide_star_review = true;
						}
						
						if ($star_review_optional):
							$comment_error_message = __('All fields are required to submit a review.','cooked');
						else :
							$comment_error_message = __('All fields and a star-rating are required to submit a review.','cooked');
						endif; ?>
						<div class="rating rate-<?php echo $recipe_rating; ?>"></div><!-- /.rating -->
					<?php else :
						$comment_error_message = __('All fields are required to submit a review.','cooked');
					endif; ?>
				</div><!-- /.reviews-head -->
	
				<?php if(!empty($reviews)) : ?>
					<div class="reviews-list">
						<?php foreach($reviews as $review) :
						
							$review_rating = get_comment_meta($review->comment_ID, 'review_rating', true );
							
							if ($review->user_id){
								$username = cp_create_slug(get_the_author_meta('user_login',$review->user_id));
								$profile_page_link = cp_get_profile_page_url();
								$profile_page_link = rtrim($profile_page_link, '/');
							} else {
								$username = false;
								$profile_page_link = false;
							}
	
							$GLOBALS['comment'] = $review;
							if($review->comment_approved != 0) : ?>
								<div id="comment-<?php echo $review->comment_ID; ?>" class="rev-item">
									<div class="avatar"><?php echo cp_avatar($review->user_id, 65); ?></div><!-- /.avatar -->
									<div class="rev-box<?php if ($reviews_comments == 'admin_reviews_comments' || !$review_rating) : ?> no-stars<?php endif; ?>">
										<div class="rev-head">
											<h3 class="title"><?php
												
												if ($username && $profile_page_link){
													echo '<a href="'.$profile_page_link . '/' . $username.'">';
													comment_author();
													echo '</a>';
												} else {
													comment_author();
												}
		
											?></h3>
											<p class="date"><?php comment_date('F j, Y'); ?></p><!-- /.date -->
										</div><!-- /.rev-head -->
										<div class="rev-entry review">
											<?php comment_text(); ?>
										</div><!-- /.rev-entry -->
										<?php if ($reviews_comments != 'admin_reviews_comments') : ?>
											<?php if ($review_rating): ?><div class="rating rate-<?php echo $review_rating; ?>"></div><!-- /.rating --><?php endif; ?>
										<?php endif; ?>
									</div><!-- /.rev-box -->
								</div><!-- /.rev-item -->
							<?php endif;
	
						endforeach; ?>
					</div><!-- /.reviews-list -->
				<?php endif; ?>
				
				<div class="rev-item">
					<?php $user = wp_get_current_user(); ?>
					<div class="avatar"><?php echo cp_avatar($user->ID, 65); ?></div><!-- /.avatar -->
					<div class="rev-box">
						<?php $user_identity = $user->exists() ? $user->display_name : '';
						
						add_action('comment_form_logged_in_after', 'cp_rating_fields');
						add_action('comment_form_after_fields', 'cp_rating_fields');
						
						$loggedinas_text = __( 'Logged in as','cooked' );
						$logout_text = __( 'Log out?','cooked' );
						$logout_desc = __( 'Log out of this account','cooked' );
						
						comment_form(array(
							'logged_in_as' => '<p class="logged-in-as">' . sprintf( '%1$s %2$s. <a href="%3$s" title="%4$s">%5$s</a>', $loggedinas_text, $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink())), $logout_desc, $logout_text ) . '</p>',
							'title_reply' => '',
							'comment_notes_before' => '',
							'comment_notes_after' => '<p class="no-rating-error">'.$comment_error_message.'</p>',
							'label_submit' => __('Post Comment','cooked'),
							'comment_field' =>  '<p class="comment-form-comment review-field-holder field-wrap"><label for="comment">' . __( 'Leave Your Comment Here...', 'cooked' ) .
								'</label><textarea id="comment" tabindex="3" name="comment" cols="45" rows="4" aria-required="true">' .
								'</textarea></p>',
						),$post_id); ?>
						
					</div><!-- /.rev-box -->
				</div><!-- /.rev-item -->
				
			</div><!-- /.reviews-section -->
		<?php elseif ($reviews_comments == 'default_comments') :
			
			$fix_duplicate_comments = get_option('cp_fix_duplicate_comments');
			if (is_array($fix_duplicate_comments) && !empty($fix_duplicate_comments)):
				// Don't show recipe comments.
			else :
				comments_template();
			endif;
			
		endif;
		
	endif;

endif;