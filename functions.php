<?php
/**
 * FlexeeWP functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FlexeeWP
 */

/**
 * General theme support declarations
 */
require_once get_template_directory() . '/functions/theme-support.php'; 

/**
 * Scripts and stylesheets
 */
require_once get_template_directory() . '/functions/scripts.php'; 

/**
 * Menus
 */
require_once get_template_directory() . '/functions/menus.php'; 

/**
 * Functions related to media, including images and galleries
 */
require_once get_template_directory() . '/functions/media.php'; 

/**
 * Widget areas
 */
require_once get_template_directory() . '/functions/widgets.php'; 

/**
 * Blog-related functions
 */
require_once get_template_directory() . '/functions/blog.php'; 

/**
 * Search-related functions
 */
require_once get_template_directory() . '/functions/search.php'; 

/**
 * Useful functions for developers to call in templates as needed
 */
require_once get_template_directory() . '/functions/developer.php'; 

/**
 * WooCommerce functions
 */
require_once get_template_directory() . '/functions/woocommerce.php';
//require_once get_template_directory() . '/functions/woocommerce-catalogue.php';

/**
 * Custom template tags for this theme
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file
 */
//require get_template_directory() . '/inc/jetpack.php';
