<?php

/* ===========================================
	REGISTER MENUS
============================================*/

if ( ! function_exists( 'flexee_menus' ) ) :

	function flexee_menus() {
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'flexee' ),
			'footer'  => esc_html__( 'Footer', 'flexee' ),
		) );
	}

endif;
add_action( 'after_setup_theme', 'flexee_menus'); 
		   

/* ==========================================
	ADD SLUGS TO NAVIGATION MENU ITEMS
============================================*/
		   
if ( ! function_exists( 'flexee_menu_slugs' ) ) :	

	function flexee_menu_slugs($output){
		$ps = get_option('permalink_structure');
		if(!empty($ps)){
			$idstr = preg_match_all('/<li id="menu-item-(\d+)/', $output, $matches);
			foreach($matches[1] as $mid){
				$id = get_post_meta($mid, '_menu_item_object_id', true);
				$slug = basename(get_permalink($id));
				$output = preg_replace('/menu-item-'.$mid.'">/', 'menu-item-'.$mid.' menu-item-'.$slug.'">', $output, 1);
			}
		}
		return $output;
	}

endif;
add_filter( 'wp_nav_menu', 'flexee_menu_slugs' );


?>