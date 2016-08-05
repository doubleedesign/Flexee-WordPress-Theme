<?php

if ( ! function_exists( 'flexee_scripts' ) ) :

	/* ===========================================
		ENQUEUE SCRIPTS AND STYLES
	============================================*/
	function flexee_scripts() {
		
		// Styles
		wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/style.css' );
		
		// Scripts
		wp_enqueue_script( 'package', get_template_directory_uri() . '/js/dist/package-dist.js', array('jquery'), '', true );
		add_filter('script_loader_tag', 'flexee_package_async', 10, 2);
		function flexee_package_async($tag, $handle) {
			if ( 'package' !== $handle)
			return $tag;
			return str_replace( ' src', ' async="async" src', $tag );
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}


endif;
add_action( 'wp_enqueue_scripts', 'flexee_scripts' );


?>