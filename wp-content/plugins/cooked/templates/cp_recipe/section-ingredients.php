<?php global $post_id; if (!$post_id): $post_id = get_the_ID(); endif;

$section_title = __('Ingredients', 'cooked');

echo apply_filters( 'cp_section_ingredients_title', sprintf('<h2>%s</h2>', $section_title), $section_title );
	
$ingredients = get_post_meta($post_id, '_cp_recipe_detailed_ingredients',true);
if (!empty($ingredients)):
	cp_format_content($ingredients,'ingredients',true);
else :
	$ingredients = get_post_meta($post_id, '_cp_recipe_ingredients', true);
	cp_format_content($ingredients);
endif;