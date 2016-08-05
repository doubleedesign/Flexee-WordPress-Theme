<?php

if ( ! function_exists( 'flexee_widgets' ) ) :

	/* ===========================================
		REGISTER WIDGET AREAS
	============================================*/
	function flexee_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Main sidebar', 'flexee' ),
			'id'            => 'main-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'flexee' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		) );
	}

endif;
add_action( 'widgets_init', 'flexee_widgets_init' );

?>