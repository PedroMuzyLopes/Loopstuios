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

// Menus
function register_custom_menus()
{
	register_nav_menu('header-menu', __('Header Menu'));
	register_nav_menu('footer-menu', __('Footer Menu'));
}
add_action('init', 'register_custom_menus');

// Theme Settings
function register_custom_theme_options($wp_customize)
{
	// // Header message
	$wp_customize->add_section('header_message', array(
		'title' => 'Header message',
	));
	$wp_customize->add_setting('textarea_header_message', array(
		'capability' => 'edit_theme_options',
		'default' => 'Edit this in wordpress theme options',
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('textarea_header_message', array(
		'type' => 'textarea',
		'section' => 'header_message', // // Add a default or your own section
		'label' => __('Message'),
		'description' => __('This heading appear inside header'),
	));

	// // Interactive section
	$wp_customize->add_section('interactive_section', array(
		'title' => 'Interactive Section',
	));
	// Title
	$wp_customize->add_setting('title_interactive', array(
		'capability' => 'edit_theme_options',
		'default' => 'Edit title in theme settings',
		'sanitize_callback' => 'sanitize_text',
	));
	$wp_customize->add_control(
		'title_interactive',
		array(
			'label'    => __('Title'),
			'section'  => 'interactive_section',
			'settings' => 'title_interactive',
			'type'     => 'text'
		)
	);

	// Message
	$wp_customize->add_setting('textarea_interactive', array(
		'capability' => 'edit_theme_options',
		'default' => 'Founded in 2011, Loopstudios has been producting world-class virtual reality projects for some of the best companies around the globe. Our award-winning creations have transformed businesses through digital experiences that bind to their brand.',
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('textarea_interactive', array(
		'type' => 'textarea',
		'section' => 'interactive_section',
		'label' => __('Message'),
	));

	// Photo upload
	$wp_customize->add_setting('photo_interactive', array(
		'default' => get_template_directory_uri() . '/src/images/interactive.jpg', // Add Default Image URL 
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'diwp_logo_control', array(
		'label' => 'Image',
		'priority' => 20,
		'section' => 'interactive_section',
		'settings' => 'photo_interactive',
		'button_labels' => array(
			'select' => 'Select Photo',
			'remove' => 'Remove Photo',
			'change' => 'Change Photo',
		)
	)));

	// Sanitize text
	function sanitize_text($text)
	{
		return sanitize_text_field($text);
	}
}
add_action('customize_register', 'register_custom_theme_options');

// Creations Post type
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

// Dynamic post pagination
wp_register_script('core-js', get_template_directory_uri() . '/src/js/core.js');
wp_enqueue_script('core-js');

wp_localize_script('core-js', 'ajax_posts', array(
	'ajaxurl' => admin_url('admin-ajax.php'),
	'noposts' => __('No older creations found'),
));

function load_all_creations()
{

	$ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
	$page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

	header("Content-Type: text/html");

	$args = array(
		'suppress_filters' => true,
		'post_type' => 'creations',
		'posts_per_page' => $ppp,
		'paged'    => $page,
	);

	$the_query = new WP_Query($args);

?>

	<?php if ($the_query->have_posts()) : ?>
		<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
			<article title="<?php the_title(); ?>" class="flex" id="<?php the_ID() ?>" style="--thumbnail:url(<?php the_field('image') ?>);">
				<h3><?php the_title(); ?></h3>
			</article>
		<?php endwhile;
		wp_reset_postdata(); ?>
	<?php else :  ?>
		<p><?php _e('Sorry, we didnt post any creation yet.'); ?></p>
	<?php endif; ?>
<?php
}

add_action('wp_ajax_load_all_creations', 'load_all_creations');
