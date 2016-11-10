<?php

/* ===========================================
	SEARCH-RELATED FUNCTIONS
============================================*/

// Only search specific post types
/*function custom_search_filter($query) {
	if (!$query->is_admin && $query->is_search) {
		$query->set('post_type', array('post','page','product'));
	}
	return $query;
}
add_filter( 'pre_get_posts', 'custom_search_filter' ); */

?>