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













?>