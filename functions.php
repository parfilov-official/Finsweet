<?php

add_action( 'wp_enqueue_scripts', 'finsweet_scripts' );

function finsweet_scripts() {
	wp_enqueue_style( 'main', get_stylesheet_uri());
	wp_enqueue_style( 'finsweet', get_template_directory_uri() . '/assets/css/style.css', array());
	wp_enqueue_script( 'finsweet', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
}

if(! function_exists('finsweet_setup')) {
  function finsweet_setup() {
    add_theme_support('title-tag');
    add_theme_support( 'post-thumbnails');
    add_theme_support( 'custom-logo', [
      'height'      => 29,
      'width'       => 140,
      'flex-width'  => false,
      'flex-height' => false,
      'header-text' => '',
      'unlink-homepage-logo' => false,
    ] );
  };
  add_action( 'after_setup_theme', 'finsweet_setup');
};

function finsweet_menus() {
  $locaions = array(
    'header' => ('header menu'),
    'footer' => ('footer menu'),
  );
  register_nav_menus($locaions);
};

function custom_modify_author_query( $query ) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ( is_author() ) {
      $query->set( 'posts_per_page', 4); 
    }
  }
}
add_action( 'pre_get_posts', 'custom_modify_author_query' );
add_action('init', 'finsweet_menus');