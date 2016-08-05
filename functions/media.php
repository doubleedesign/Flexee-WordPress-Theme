<?php

/* ===========================================
	GENERAL
============================================*/
if ( ! function_exists( 'flexee_media' ) ) :

	function flexee_media() {

		/* Increase max srcset width to bigger than its default of 1600 */ 
		add_filter('max_srcset_image_width', function($max_srcset_image_width, $size_array){ return 2560; }, 10, 2);
		
		/* Custom image sizes - add as needed */
		//add_image_size('featured',600,300,true);

	}

endif;
add_action( 'after_setup_theme', 'flexee_media' );


/* ===========================================
	IMAGE LINKS
============================================*/

// Add a class to linked images' parent anchors 
function flexee_linked_images_class($content) { 
	$classes = 'img'; 
	if ( preg_match('/<a.*? class=".*?"><img/', $content) ) { 
		$content = preg_replace('/(<a.*? class=".*?)(".*?><img)/', '$1 ' . $classes . '$2', $content); }
	else { 
		$content = preg_replace('/(<a.*?)><img/', '$1 class="' . $classes . '" ><img', $content);
	} 
	return $content; 
} 
add_filter('the_content','flexee_linked_images_class');

// Default link to 'None' when inserting images
function flexee_image_setup() {
	$image_set = get_option( 'image_default_link_type' );
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'flexee_image_setup', 10);



/* ============================================
	GALLERY CUSTOMISATIONS
============================================*/
function flexee_gallery_setup($out) {
	
	// Remove WordPress gallery shortcode inline styles 
	add_filter( 'use_default_gallery_style', '__return_false' );
	
	// Default link to 'Media File' when inserting galleries
	$out['link'] = 'file'; 
	return $out; 
}
add_filter('shortcode_atts_gallery', 'flexee_gallery_setup');



/* ===========================================
	OTHER
============================================*/

// Filter <p> tags from images and iframes 
function flexee_p_filter($content) { 
	$content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content); 
	return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content); 
} 
add_filter('the_content', 'flexee_p_filter'); 

?>