<?php

/* ===========================================
	WOOCOMMERCE FUNCTIONS
	Commented-out functions are ones you may or may not want, simply uncomment the ones you want and remove the ones you don't
============================================*/

// Don't load WooCommerce CSS
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

// Replace default product thumbnail
function goop_replace_default_thumbnail() {
	add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src'); 
	function custom_woocommerce_placeholder_img_src( $src ) { 
		$src = get_stylesheet_directory_uri().'/assets/img/woocommerce/placeholder.png'; 
		return $src;	
	}
}
add_action( 'init', 'goop_replace_default_thumbnail' ); 

// Remove select2 
function goop_manage_woocommerce_styles() {
	wp_dequeue_script( 'select2' ); //They don't use Chosen anymore, it was replaced with select2 in WC 2.3
}
add_action( 'wp_enqueue_scripts', 'goop_manage_woocommerce_styles', 99 );

// Remove cart buttons on shop/archive/category pages 
function goop_remove_add_to_cart_buttons() {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
}
add_action( 'woocommerce_after_shop_loop_item', 'goop_remove_add_to_cart_buttons', 1 ); 

// Remove WooCommerce breadcrumbs - preserves Yoast breadcrumbs if they're being used
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

// Move the single product tabs into the summary div
// Only works if actually using tabs - if using the below function to remove them, you don't need this
/*remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 25);*/

// Remove product data tabs and hook content in sequence in the summary div instead
function goop_remove_woocommerce_product_tabs( $tabs ) {
	unset( $tabs['description'] );
	unset( $tabs['reviews'] );
	unset( $tabs['additional_information'] );
	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'goop_remove_woocommerce_product_tabs', 98 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_product_description_tab' );
add_action( 'woocommerce_single_product_summary', 'woocommerce_product_additional_information_tab' );
add_action( 'woocommerce_single_product_summary', 'comments_template' );

// Remove single product tab titles
//add_filter('woocommerce_product_description_heading', false); // "Product Description" 
//add_filter('woocommerce_product_additional_information_heading', false); // "Additional Information" 

// If a product does not have a price, replace "Free!" text with something else*
/*add_filter( 'woocommerce_variable_free_price_html',  'change_free_price_notice' );
add_filter( 'woocommerce_free_price_html',           'change_free_price_notice' );
add_filter( 'woocommerce_variation_free_price_html', 'change_free_price_notice' );
function change_free_price_notice( $price ) {
  return '$Call to confirm';
}*/

?>