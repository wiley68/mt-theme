<?php

/**
 * MtTheme functions and definitions.
 *
 * @link https://software.avalonbg.com/
 *
 * @package MtTheme
 * @since 1.0
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

function mt_theme_enqueue_scripts()
{
	wp_enqueue_style(
		'mt-theme-style',
		get_template_directory_uri() . '/assets/css/theme.css',
		array(),
		filemtime(get_theme_file_path('/assets/css/theme.css')),
		'all'
	);
}
add_action('wp_enqueue_scripts', 'mt_theme_enqueue_scripts');


function mt_theme_mt_header_block_init()
{
	register_block_type(__DIR__ . "/build/mt-header");
	register_block_type(__DIR__ . "/build/mt-footer");
}
add_action('init', 'mt_theme_mt_header_block_init');

add_filter('block_categories_all', function ($categories) {
	$categories[] = [
		'slug'  => 'mt-theme',
		'title' => 'Mt Theme'
	];
	return $categories;
});
