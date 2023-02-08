<?php

//// Create members CPT
function members_post_type() {
    register_post_type( 'members',
        array(
            'labels' => array(
                'name' => __( 'Members' ),
                'singular_name' => __( 'Member' )
            ),
            'public' => true,
            'show_in_rest' => true,
        'supports' => array('title','excerpt','thumbnail'),
        'has_archive' => true,
        'rewrite'   => array( 'slug' => 'member' ),
            'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-users',
        )
    );
}
add_action( 'init', 'members_post_type' );