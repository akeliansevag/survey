<?php

if (! defined('_S_VERSION')) {
	define('_S_VERSION', '1.0.6');
}

function survey_setup()
{

	load_theme_textdomain('survey', get_template_directory() . '/languages');

	add_theme_support('title-tag');

	add_theme_support('post-thumbnails');

	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'survey'),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action('after_setup_theme', 'survey_setup');

function survey_scripts()
{
	wp_enqueue_style('survey-style', get_template_directory_uri() . "/build/output.css", array(), _S_VERSION);
	wp_enqueue_script('survey-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), _S_VERSION, true);
}
add_action('wp_enqueue_scripts', 'survey_scripts');


add_action('rest_api_init', function () {
	register_rest_route('wpforms/v1', '/entries/(?P<form_id>\d+)', [
		'methods' => 'GET',
		'callback' => function ($request) {
			$form_id = intval($request['form_id']);
			return ['message' => "Entries for form ID $form_id"];
		},
		'permission_callback' => '__return_true', // Make public
	]);
});
