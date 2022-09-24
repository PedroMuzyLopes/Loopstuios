<?php

// Initial styles and scripts
function load_scripts()
{
	wp_enqueue_style('global-css', get_template_directory_uri() . '/src/css/global.css', array(), time(), 'all');
	wp_enqueue_style('styles', get_template_directory_uri() . '/src/css/styles.css', array(), time(), 'all');
}
add_action('wp_enqueue_scripts', 'load_scripts');

// Dynamic titles
add_theme_support('title-tag');

// Header menu
function register_my_menu()
{
	register_nav_menu('header-menu', __('Header Menu'));
}
add_action('init', 'register_my_menu');

// Creations:: POST TYPE
function register_creations_cpt()
{
	register_post_type(
		'creations',
		array(
			'labels' => array(
				'name' => __('Creations'),
				'singular_name' => __('Creation')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'creations'),
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-camera',
			'supports' => array('title', 'author', 'thumbnail', 'custom-fields',),
		)
	);
}
add_action('init', 'register_creations_cpt');
