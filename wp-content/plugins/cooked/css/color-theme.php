<?php
	
/*
Color Theme Template
*/

$main_color = get_option('cp_main_color','#0bbe5f');
$light_color = get_option('cp_light_color','#c4f2d4');
$dark_color = get_option('cp_dark_color','#039146');

?>body #cooked-plugin-page .recipe-action .fs-btn,
body #cooked-plugin-page .timer-trigger,
body #cooked-plugin-page a,
body #cooked-submit-recipe-form .section-row .section-head h2,
body #cooked-submit-recipe-form .section-row .slider .amount.active,
body #cooked-plugin-page .recipes-pagination a.next,
body #cooked-plugin-page .recipes-pagination a.prev,
body #cooked-plugin-page .recipe-info p.terms-list a
{ color: <?php echo $main_color; ?>; }

body #cooked-plugin-page .btn,
body #cooked-plugin-page #submit,
body #cooked-plugin-page .timer-wrap,
body #cooked-submit-recipe-form .section-row .upload-field-wrap .button,
body #cooked-submit-recipe-form input.sbmt-button,
body #cooked-plugin-page .recipes-pagination a,
body #cooked-plugin-page .cp-public-tag,
body #cooked-page-form input[type=submit],
body .cooked-timer-done-screen
{ background: <?php echo $main_color; ?>; }

body #cooked-plugin-page .search-section .search-row .sbmt-button input
{ background-color: <?php echo $main_color; ?>; }

body #cooked-plugin-page .recipe-hints p .hint-check.checked
{ background: <?php echo $main_color; ?>; border-color: <?php echo $main_color; ?>; }

body #cooked-plugin-page .timer-wrap .pp-btn,
body #cooked-plugin-page .timer-wrap .x-timer
{ color: <?php echo $light_color; ?>; }

body #cooked-plugin-page .btn:hover,
body #cooked-plugin-page #submit:hover,
body #cooked-plugin-page .fullscreen-actions .x-fs-btn,
body #cooked-plugin-page .tab-links a,
body #cooked-plugin-page .recipes-pagination a:hover,
body #cooked-page-form input[type=submit]:hover,
body #cooked-plugin-page .timer-wrap .timer,
body #cooked-submit-recipe-form .section-row .upload-field-wrap .button:hover
{ background: <?php echo $dark_color; ?>; }

body #cooked-plugin-page .search-section .search-row .sbmt-button input:hover
{ background-color:<?php echo $dark_color; ?>; }

body #cooked-submit-recipe-form .section-row .upload-field-wrap .button
{ border-color: <?php echo $dark_color; ?>; }