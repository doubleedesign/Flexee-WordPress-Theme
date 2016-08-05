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
require get_template_directory() . '/functions/theme-support.php'; 

/**
 * Scripts and stylesheets
 */
require get_template_directory() . '/functions/scripts.php'; 

/**
 * Menus
 */
require get_template_directory() . '/functions/menus.php'; 

/**
 * Functions related to media, including images and galleries
 */
require get_template_directory() . '/functions/media.php'; 

/**
 * Widget areas
 */
require get_template_directory() . '/functions/widgets.php'; 

/**
 * Useful functions for developers to call in templates as needed
 */
require get_template_directory() . '/functions/developer.php'; 

/**
 * Custom template tags for this theme
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file
 */
//require get_template_directory() . '/inc/jetpack.php';
