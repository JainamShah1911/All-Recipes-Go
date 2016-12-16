<?php global $post_id; if (!$post_id): $post_id = get_the_ID(); endif;
global $user_ID;
get_currentuserinfo();

$section_title = __('Directions', 'cooked');

echo apply_filters( 'cp_section_directions_title', sprintf('<h2>%s</h2>', $section_title), $section_title );

$directions = get_post_meta($post_id, '_cp_recipe_detailed_directions',true);
if (!empty($directions)):
	cp_format_content($directions,'directions',true);
else :
	$directions = get_post_meta($post_id, '_cp_recipe_directions', true);
	cp_format_content($directions,'directions');
endif;
if (is_user_logged_in()):
        $user_ID = get_current_user_id();
        $user_mades = get_user_meta($user_ID, 'cp_mades',true);
    endif;
    
    ?><a class="madeit-btn" href="<?php echo get_permalink(); ?>" data-cookied="<?php echo number_format(!is_user_logged_in()); ?>" data-userMadeit="<?php if (is_user_logged_in() && is_array($user_mades) && in_array($post_id,$user_mades)): ?>1<?php else : ?>0<?php endif; ?>" data-recipe-id="<?php echo $post_id; ?>">
        <?php
            $mades = get_post_meta( $post_id, '_cp_mades', true );
        ?>
        <i class="fa fa-thumbs-o-up"> I made It..!</i> </a><br>

<?php

echo '<a id="add_button">Add to Menu Planner</a>';?> 

<?php
echo '<div id="modal" class="modal_y">
	<!-- Modal content -->
  <div class="modal-content_c">
   <span class="close"></span>
  <iframe width="100%" height="100%" scrolling="no" frameborder="0" src="http://localhost/wordpress/menuplan/addc.php?user_id='.$user_ID.'&recipe_id='.$post_id.'"></iframe>
  </div> 	    
	
</div>';
echo "<script>
var modal = document.getElementById('modal');
var btn = document.getElementById('add_button');
var span = document.getElementsByClassName('close')[0];
if (btn != null){
	btn.onclick = function() {
 	   modal.style.display = 'block';
	}
}
if (span != null){
	span.onclick = function() {
	    modal.style.display = 'none';
	}
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
document.body.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>";

$recipe_info = cp_recipe_info_settings();
if (in_array('notes',$recipe_info)):

	$additional_notes = get_post_meta($post_id, '_cp_recipe_additional_notes', true);
	if ($additional_notes):
		echo '<div class="recipe-notes">';
		echo wpautop(do_shortcode($additional_notes));
		echo '</div>';
	endif;
	
endif;