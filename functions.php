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

  wp_enqueue_style('styles-index', get_template_directory_uri() . '/assets/css/index.css', array(), $version, 'all');
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


/**
 * Returns branding colors
 */
function vant_get_color($name) {
  switch ($name) {
    case 'Vantage Purple':
      return '#5d61ba';

    case 'Food':
      return '#f9a524';
    case 'TV & Film':
      return '#ef3e68';
    case 'Theater & Arts':
      return '#755489';
    case 'Music':
      return '#b5c932';
    case 'Vantage':
    case 'Vantage POINT':
    case 'The GUIDON':
      return '#1c4481';
    case 'Hub':
      return '#3dbb95';
    case 'Hype':
      return '#d63ba3';
    case 'Expose':
    case 'Exposé':
      return '#f6B50b';

    case 'Uncategorized':
    default:
      return '#333333';
  }
}


/**
 * Returns tag and category names
 */
function vant_get_categ_tag_name($name) {
  switch ($name) {
    case 'TV and Film':
      return 'TV & Film';
    case 'Theater and the Arts':
      return 'Theater & Arts';
    case 'Expose':
      return 'Exposé';
    default:
      return $name;
  }
}


/**
 * Returns author list in string
 */
function vant_format_auths($auths) {
  $out = "";
  for ($i = 0; $i < count($auths); $i++) {
    if ($i != 0)
      $out .= ", ";
    
    if ($i != 0 && $i + 1 == count($auths))
      $out .= "and ";

    $out .= $auths[$i]->display_name;
  }

  return $out;
}

?>