<?php

/**
 * Main CSS
 */
function vant_register_styles() {
  $version = wp_get_theme()->get('Version');

  wp_enqueue_style('styles-styles', get_template_directory_uri() . '/style.css', array(), $version, 'all');

  wp_enqueue_style('styles-global', get_template_directory_uri() . '/assets/css/global.css', array(), $version, 'all');
  wp_enqueue_style('styles-fonts', get_template_directory_uri() . '/assets/css/fonts.css', array(), $version, 'all');

  wp_enqueue_style('styles-header', get_template_directory_uri() . '/assets/css/header.css', array(), $version, 'all');
  wp_enqueue_style('styles-footer', get_template_directory_uri() . '/assets/css/footer.css', array(), $version, 'all');
}

add_action('wp_enqueue_scripts', 'vant_register_styles');


/**
 * Main scripts
 */
function vant_register_scripts() {
  $version = wp_get_theme()->get('Version');

  // wp_enqueue_script('jquery', get_template_directory_uri() . 'assets/js/jquery-3.6.0.min.js', array(), $version);
}

add_action('wp_enqueue_scripts', 'vant_register_scripts');


/**
 * Disables WordPress admin bar
 */
add_theme_support('admin-bar', array('callback' => '__return_false'));


?>