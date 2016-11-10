<?php

/* ===========================================
	BLOG-RELATED FUNCTIONS
============================================*/

/* Get monthly archive for current year, then yearly. Called in sidebar.php
------------------------------------------------------------ */
function flexee_get_archives_by_month($where, $args='') {
	$where .= " AND YEAR(post_date) = YEAR (current_date)";
	//$where .= " AND YEAR(post_date) > 2013";
	return $where;
}
function flexee_get_archives_by_year($where, $args='') {
	$where .= " AND YEAR(post_date) < YEAR (current_date)";
	return $where;
}
function flexee_get_archives_monthly($args='') {
	add_filter('getarchives_where', 'flexee_get_archives_by_month');
	wp_get_archives($args);
	remove_filter('getarchives_where', 'flexee_get_archives_by_month');
}
function flexee_get_archives_yearly($args='') {
	add_filter('getarchives_where', 'flexee_get_archives_by_year');
	wp_get_archives($args);
	remove_filter('getarchives_where', 'flexee_get_archives_by_year');
}

/* Exclude certain categories from blogs and archives 
------------------------------------------------------------ */
/*if (!is_admin()) {
	function flexee_exclude_category($query){
		if(is_home() || is_archive()){
			$query->set('cat','-1,-2,-3'); // use your required ID(s), with a minus sign
			return $query;
		};
	};
	add_action( 'pre_get_posts', 'flexee_exclude_category');
};*/

/* Exclude certain categories from archives 
------------------------------------------------------------ */ 
/*add_filter( 'getarchives_where', 'customarchives_where' );
add_filter( 'getarchives_join', 'customarchives_join' );
if (!is_admin()) { 
	function customarchives_join( $x ) {
		global $wpdb;
		return $x . " INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) INNER JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)";
	}
	function customarchives_where( $x ) {
		global $wpdb;
		$exclude = '1,2'; // category IDs to exclude, should match the ones above but no minus sign
		return $x . " AND $wpdb->term_taxonomy.taxonomy = 'category' AND $wpdb->term_taxonomy.term_id NOT IN ($exclude)";
	}
};*/



?>