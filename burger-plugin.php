<?php
/* 
 * Plugin Name: Burger Artist Plugin
 * Plugin URL: http://www.Reddit.com
 * Description: A basic plugin for The Burger Artist
 * Author: Maurizio & ZiXin
 * Author URI: http://www.reddit.com/r/funny
 * Version 1.0
*/ 

//Import stylesheet for shortcode

function register_burger_style() {
 	wp_register_style( 'burger-style', plugins_url( 'burger-plugin/css/style.css' ) );
 	wp_enqueue_style( 'burger-style' );
}
add_action( 'wp_enqueue_scripts', 'register_burger_style' );

// Custom Post Type Syntax

function ba_custom_post(){
	$args = array(
		'label' => 'Burger Menu', //name of plugin
		'public' => true, 
		'show_ui' => true,
		'show_in_menu' => true,  
		'capability_type' => 'post', 
		'hierarchical' => false, 
		'rewrite' => array('slug' => 'burger-slug'), // Slug referenced
		'query_var' => true, 
		'supports' => array('title', 'editor', 'thumbnail', 'author') // Requested parameters
		);
	register_post_type('burger-slug', $args); 

}
add_action('init', 'ba_custom_post'); // Custom Post Type Registered

// Shortcode Syntax, Source: https://goo.gl/RqAast & https://goo.gl/wphEf3

function display_burger_posts(){
        $args = array(
            'post_type' => 'burger-slug', // Select Slug
            'post_status' => 'publish'
        );

        $string = '';
        $query = new WP_Query( $args );
        if( $query->have_posts() ){  // Runs check for posts in slug
            $string .= '<ul>';
            while( $query->have_posts() ){  // When finds post, loops and posts output below
                $query->the_post();
                $string .= '<li><a href="'. get_permalink() . '">' . get_the_title() . '</a></li>'; // For each post, add list. 
            } 
            $string .= '</ul>';
        }
        wp_reset_postdata();
        return $string;
    }

add_shortcode( 'burgerposts', 'display_burger_posts' ); // Shortcode registered



?>