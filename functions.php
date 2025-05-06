<?php

/**
 * MtTheme functions and definitions.
 *
 * @link https://software.avalonbg.com/
 *
 * @package MtTheme
 * @since 1.0
 */

if (! defined(constant_name: 'ABSPATH')) {
	exit; // Exit if accessed directly.
}

function mt_theme_load_textdomain()
{
	$locale = apply_filters('plugin_locale', determine_locale(), 'mt-theme');
	$mofile = "mt-theme-{$locale}.mo";
	load_textdomain('mt-theme', get_template_directory_uri() . '/languages/' . $mofile);
}

add_action('init', 'mt_theme_load_textdomain');

function mt_theme_enqueue_scripts()
{
	wp_enqueue_style(
		'mt-theme-style',
		get_template_directory_uri() . '/assets/css/theme.css',
		[],
		filemtime(get_theme_file_path('/assets/css/theme.css')),
		'all'
	);

	if (wp_script_is('mt-theme-mt-header-view-script', 'enqueued')) {
		wp_add_inline_script(
			'mt-theme-mt-header-view-script',
			'const mt_ajax = ' . wp_json_encode([
				'ajax_url' => admin_url('admin-ajax.php'),
				'nonce' => wp_create_nonce('mt_default_theme_nonce'),
			]) . ';',
			'before'
		);
	}
}
add_action('wp_enqueue_scripts', 'mt_theme_enqueue_scripts');

function mt_theme_add_body_class($classes)
{
	$theme_mode = 'light';

	$classes[] = "body--{$theme_mode}";

	return $classes;
}
add_filter('body_class', 'mt_theme_add_body_class');

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

function mt_get_supported_languages()
{
	return [
		'en' => [
			'code' => 'EN',
			'name' => 'English',
			'flag_file' => 'en.svg',
		],
		'bg' => [
			'code' => 'BG',
			'name' => 'Български',
			'flag_file' => 'bg.svg',
		],
	];
}

function mt_get_language_switcher_data($lang = null)
{
	$locale = get_locale();
	$current_language_code = substr($locale, 0, 2);

	$languages = mt_get_supported_languages();

	if ($lang && isset($languages[$lang])) {
		$language_data = $languages[$lang];
	} else {
		$language_data = $languages[$current_language_code] ?? $languages['en'];
	}

	$flag_path = get_template_directory() . '/assets/svg/flags/' . $language_data['flag_file'];
	$flag_svg = file_exists($flag_path) ? file_get_contents($flag_path) : '';

	return [
		'code' => $language_data['code'],
		'name' => $language_data['name'],
		'flag' => $flag_svg,
	];
}

function mt_set_language()
{
	check_ajax_referer('mt_default_theme_nonce', 'nonce');

	if (! isset($_POST['lang'])) {
		wp_send_json_error('No language selected.');
	}

	$supported_languages = array_keys(mt_get_supported_languages());
	$selected_lang = sanitize_text_field($_POST['lang']);

	if (in_array($selected_lang, $supported_languages, true)) {
		setcookie('mt_selected_language', $selected_lang, time() + YEAR_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN);
		wp_send_json_success();
	} else {
		wp_send_json_error('Invalid language.');
	}
}
add_action('wp_ajax_mt_set_language', 'mt_set_language');
add_action('wp_ajax_nopriv_mt_set_language', 'mt_set_language');

function mt_get_cookie_locale($locale)
{
	if (isset($_COOKIE['mt_selected_language'])) {
		$lang = sanitize_text_field($_COOKIE['mt_selected_language']);

		switch ($lang) {
			case 'bg':
				return 'bg_BG';
			case 'en':
			default:
				return 'en_US';
		}
	}

	return $locale;
}
add_filter('locale', 'mt_get_cookie_locale');

function mt_theme_nav_config()
{
	register_nav_menus([
		'mt-theme-primary-menu' => __('Primary Menu MT Theme', 'mt-theme'),
		'mt-theme-footer-menu-first' => __('Footer Menu First MT Theme', 'mt-theme'),
		'mt-theme-footer-menu-second' => __('Footer Menu Second MT Theme', 'mt-theme'),
		'mt-theme-footer-menu-third' => __('Footer Menu Third MT Theme', 'mt-theme'),
	]);
}
add_action('after_setup_theme', 'mt_theme_nav_config');

function mt_theme_add_li_class($classes, $item, $args)
{
	if ($args->theme_location === 'mt-theme-primary-menu') {
		$classes[] = 'border-1 rounded px-1 border-transparent hover:border-amber-400';
	} elseif ($args->theme_location === 'mt-theme-footer-menu-first') {
		$classes[] = 'hover:text-amber-400 text-zinc-400 hover:bg-zinc-600 rounded px-1';
	} elseif ($args->theme_location === 'mt-theme-footer-menu-second') {
		$classes[] = 'hover:text-amber-400 text-zinc-400 hover:bg-zinc-600 rounded px-1';
	} elseif ($args->theme_location === 'mt-theme-footer-menu-third') {
		$classes[] = 'hover:text-amber-400 text-zinc-400 hover:bg-zinc-600 rounded px-1';
	}

	return $classes;
}
add_filter('nav_menu_css_class', 'mt_theme_add_li_class', 1, 3);
