<?php

/* ===========================================
	WOOCOMMERCE FUNCTIONS
	Functions for non-eCommerce implementations
	Used in conjunction with functions/woocommerce.php
============================================*/

// Remove cart buttons on single product pages
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
remove_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );

?>