<?php
/*
spalten  erstellt am datum
*/
// erste spalte 
function my_column($atts, $content = null) {
	return '
<div class="ykm_column column_normal">'. do_shortcode($content) .'</div>
';
}
add_shortcode('column', 'my_column');

//letzte spalte
function my_column_last($atts, $content = null) {
	return '
<div class="ykm_column column_last">' . do_shortcode($content) . '</div>
<br class="clear" />';
}

add_shortcode('column_last', 'my_column_last');	
	
	
	
	
?>