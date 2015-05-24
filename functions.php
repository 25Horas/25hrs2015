<?php

	function exclude_category() {
		if ( is_home() ) {
			set_query_var('cat', '-3');
		}
	}

	if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'main-image', 1200, 800 ); // Permalink thumbnail size
	}

	// SHORTCODES

	function clear_shortcode( $atts, $content = null ) {
	   return '<div class="clearfix"></div>';
	}
	add_shortcode( 'clear', 'clear_shortcode' );


	// SIDEBAR

	if ( function_exists('register_sidebar') )
	    register_sidebar(array(
	        'before_widget' => '', // Removes <li>
	        'after_widget' => '', // Removes </li>
	        'before_title' => '<div class="title">', // Replaces <h2>
	        'after_title' => '</div>', // Replaces </h2>
	    ));

	register_nav_menus( array(
			'primary' => __( 'Primary Navigation'),
			'secondary' => __( 'Cat Navigation'),
			'third' => __( 'Tag Navigation'),
			'footer' => __( 'Footer Navigation'),
		) );

?>