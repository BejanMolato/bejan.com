<?php

add_action('init', 'register_script');
function register_script(){
	wp_register_style( 'members_style', plugins_url('../css/members-style.css', __FILE__));
}

// Load the registered style above
add_action('wp_enqueue_scripts', 'enqueue_style');
function enqueue_style(){
	/* Gets the post type. */
	global $post_type;
  
	 if( 'members' == $post_type ) {
		wp_enqueue_style( 'members_style', __FILE__ );
	}
}