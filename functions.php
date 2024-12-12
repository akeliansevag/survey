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
		'callback' => 'get_wpforms_entries',
	]);
});

function get_wpforms_entries($request)
{
	global $wpdb;
	$form_id = intval($request['form_id']);
	$entries_table = $wpdb->prefix . 'wpforms_entries';
	$fields_table = $wpdb->prefix . 'wpforms_entry_fields';

	// Fetch entries
	$entries = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM {$entries_table} WHERE form_id = %d",
			$form_id
		)
	);

	if (empty($entries)) {
		return new WP_Error('no_entries', 'No entries found for this form', ['status' => 404]);
	}

	// Create an array to hold the updated entries
	$updated_entries = [];

	foreach ($entries as $entry) {
		// Fetch fields for the current entry
		$fields = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM {$fields_table} WHERE entry_id = %d",
				$entry->entry_id
			)
		);
		// Create a new object or array with fields added
		$updated_entry = (array) $entry; // Convert object to array
		$updated_entry['fields'] = $fields; // Add fields

		// Add to the updated entries array
		$updated_entries[] = $updated_entry;
	}

	return rest_ensure_response($updated_entries);
}
