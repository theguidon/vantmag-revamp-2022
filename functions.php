<?php

/**
 * Main CSS
 */
function vant_register_styles() {
  $version = wp_get_theme()->get('Version');

  wp_enqueue_style('styles-styles', get_template_directory_uri() . '/style.css', array(), $version);

  wp_enqueue_style('styles-global', get_template_directory_uri() . '/assets/css/global.css', array(), $version);
  wp_enqueue_style('styles-fonts', get_template_directory_uri() . '/assets/css/fonts.css', array(), $version);

  wp_enqueue_style('styles-header', get_template_directory_uri() . '/assets/css/header.css', array(), $version);
  wp_enqueue_style('styles-mobile-menu', get_template_directory_uri() . '/assets/css/mobile-menu.css', array(), $version);
  wp_enqueue_style('styles-footer', get_template_directory_uri() . '/assets/css/footer.css', array(), $version);

  wp_enqueue_style('styles-index-global', get_template_directory_uri() . '/assets/css/index/index.css', array(), $version);
  wp_enqueue_style('styles-index-latest', get_template_directory_uri() . '/assets/css/index/latest.css', array(), $version);
  wp_enqueue_style('styles-index-suggestions', get_template_directory_uri() . '/assets/css/index/suggestions.css', array(), $version);
  wp_enqueue_style('styles-index-all-content', get_template_directory_uri() . '/assets/css/index/all-content.css', array(), $version);
}

add_action('wp_enqueue_scripts', 'vant_register_styles');


/**
 * Main scripts
 */
function vant_register_scripts() {
  $version = wp_get_theme()->get('Version');

  wp_enqueue_script('jquery', get_template_directory_uri() . 'assets/js/jquery-3.6.3.min.js', array(), $version);

  wp_enqueue_script('scripts-index', get_template_directory_uri() . '/assets/js/index.js', array(), $version);
  wp_enqueue_script('scripts-header', get_template_directory_uri() . '/assets/js/header.js', array('jquery'), $version);
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


/**
 * Nav Menus
 */
add_theme_support('nav-menus');
if (function_exists('register_nav_menus')) {
  register_nav_menus(
    array(
      'main' => 'Main Nav'
    )
  );
}


/**
 * Returns short excerpt
 */
function vant_short_excerpt($exc, $cws = 220) {
  if (strlen($exc) <= $cws)
    return $exc;

  return substr($exc, 0, $cws) . "...";
}


/**
 * COPIED FROM ORIGINAL
 */

// THUMBNAIL SIZES

add_action('after_setup_theme', 'vantmag_theme_setup');

function vantmag_theme_setup() {
  add_theme_support('post-thumbnails');

  $increments = 500;
  $base = 350;

  $thumbnail =  $base + $increments * 0;
  $medium =     $base + $increments * 1;
  $large =      $base + $increments * 2;

  add_image_size('vantmag-thumbnail', $thumbnail, $thumbnail, false);
  add_image_size('vantmag-medium', $medium, $medium, false);
  add_image_size('vantmag-large', $large, $large, false);

  add_image_size('vantmag-square-thumbnail', $thumbnail, $thumbnail, true);
  add_image_size('vantmag-square-medium', $medium, $medium, true);
  add_image_size('vantmag-square-large', $large, $large, true);
}

// REGISTER MENUS

add_action( 'init', 'vantmag_register_menus' );

function vantmag_register_menus() {
  register_nav_menus(
    array(
      'main-menu' => __('Main Menu'),
      'beats-menu' => __('Beats Menu'),
      'about-menu' => __('About Link Menu'),
      'social-menu' => __('Social Media Links')
    )
  );
}

// BEAT SPECIFIC CONTENT

function vantmag_beat_short_name($slug){
  $short_names = array(
    'tv-and-film' => 'TV & Film',
    'music' => 'Music',
    'food' => 'Food',
    'theater-and-the-arts' => 'Theater & Arts',
    'hub' => 'Hub',
    'hype' => 'Hype',
    'expose' => 'Exposé'
  );

  return $short_names[$slug] ? $short_names[$slug] : "Vantage";
};

function vantmag_beat_background_url($slug){
  $urls = array(
    'tv-and-film' =>            '/img/backgrounds/tvandf.png',
    'music' =>                  '/img/backgrounds/music.png',
    'food' =>                   '/img/backgrounds/food.png',
    'theater-and-the-arts' =>   '/img/backgrounds/tanda.png',
    'hub' =>                    '/img/backgrounds/torre.jpg',
    'hype' =>                   '/img/backgrounds/stella.png',
    'expose' =>                 '/img/backgrounds/expose.png'
  );

  return get_template_directory_uri() . ($urls[$slug] ? $urls[$slug] : "");
};


/**
* OBJECT ORIENTED POST DATA
* @author Mike del Castillo
*
* this is my favorite wordpress script <3 i love u gdn this is for u
* i'm such an object oriented person wah peace b w u
*/

function vantmag_get_post_data($query){
  $query->the_post();
  $id = get_the_ID();
  $categories = array_map(function($item){
    return array(
      "cat_ID" => $item->cat_ID,
      "name" => $item->name,
      "short_name" => vantmag_beat_short_name($item->slug),
      "slug" => $item->slug
    );
  }, get_the_category());

  return array(
    "id" => $id,
    "title" => get_the_title(),
    "excerpt" => get_limited_excerpt(30),
    "date" => get_the_date(),
    "authors" => vantmag_get_authors(),
    "url" => get_post_permalink(),
    "featured_image" => array(
      "thumbnail" => get_the_post_thumbnail_url($id, "vantmag-thumbnail"),
      "medium" => get_the_post_thumbnail_url($id, "vantmag-medium"),
      "large" => get_the_post_thumbnail_url($id, "vantmag-large")
    ),
    "categories" => $categories
  );
};

/**
* OBJECT ORIENTED GETTING THE AUTHORS
* @author Mike del Castillo
*/

function vantmag_get_authors(){
  $links;

  ob_start();
  if (function_exists('coauthors_posts_links')) {
    coauthors_posts_links();
  } else {
    the_author_posts_link();
  }
  $links = ob_get_clean();

  $regex = '/<a.*?href="(.*?)".*?>(.*?)<\/a>/';
  preg_match_all($regex, $links, $matches, PREG_SET_ORDER, 0);

  return array_map(function($item){
    return array(
      "name" => $item[2],
      "url" => $item[1]
    );
  }, $matches);
}

// ALLOW AJAX RETRIEVAL OF POSTS


function vantmag_jsonify($query){
  if(vantmag_is_json()){
    header('Content-Type: application/json');
    $query->max_num_pages;

    $output = array(
      "query" => array(),
      "posts" => array()
    );

    $output["query"]["found_posts"] = $query->found_posts;
    $output["query"]["max_num_pages"] = $query->max_num_pages;

    while($query->have_posts()){
      $output["posts"][] = vantmag_get_post_data($query);
    }

    // echo json_encode($output, JSON_PRETTY_PRINT);
    echo json_encode($output);
    die();
  }
}

function vantmag_is_json(){
  $json = isset($_GET['json']) ? $_GET['json'] == "true" : false;
  return $json;
}

/*
* @author Mike del Castillo
* this is also one of my best work i would say ily guidon
*/

function vantmag_filter_content($raw_content){

  $raw_content = preg_replace('/([ \n\t]){2,}|&nbsp;/', '', $raw_content);
  $raw_content = preg_replace('/([ \n\t]){2,}|&nbsp;/', '', $raw_content);

  $par_regex = '/(\n|^).*?(?=\n|$)/';
  $par_matches;
  preg_match_all($par_regex, $raw_content, $par_matches, PREG_SET_ORDER, 0);

  $html = "";

  foreach($par_matches as $paragraph){
    $text = trim($paragraph[0]);
    if(strlen($text) > 0){
      $html .= "<p>";
      $html .= $text;
      $html .= "</p>";
    }
  }

  // PARSE IMAGES WITH CAPTIONS

  $reg_caption = '/\[caption.*?caption\]/';

  $html = preg_replace_callback($reg_caption, function($matches){
    $reg_caption_align = '/align="(.*?)"/';
    $reg_img = '/<img.*?>/';
    $reg_caption_text = '/\>(.*?)\[\/caption]/';

    $caption_code = $matches[0];
    $alignment = "alignnone";
    $text = "";
    $img_html = "";
    $img_class = "";

    preg_match_all($reg_caption_align, $caption_code, $alignment_matches, PREG_SET_ORDER, 0);
    preg_match_all($reg_img, $caption_code, $img_matches, PREG_SET_ORDER, 0);
    preg_match_all($reg_caption_text, $caption_code, $caption_text_matches, PREG_SET_ORDER, 0);

    if(count($alignment_matches) > 0) $alignment = trim($alignment_matches[0][1]);
    if(count($img_matches) > 0) $img_html = trim($img_matches[0][0]);
    if(count($caption_text_matches) > 0) $text = trim($caption_text_matches[0][1]);

    return "
    <div class='captioned-image $alignment'>
      $img_html
      <div class='caption-text'>$text</div>
    </div>
    ";

  }, $html);

  // PARSE GALLERIES

  $reg_gallery = '/\[gallery(.*?)\]/';

  $html = preg_replace_callback($reg_gallery, function($matches){
    $attributes_text = $matches[1];
    $attributes = [
      "columns" => 3,
      "ids" => [],
      "size" => "thumbnail",
      "link" => "", //"" att, "none" none, "file" media file
      "orderby" => "" //rand
    ];

    $reg_attr = '/(.*?)="(.*?)"/';

    preg_match_all($reg_attr, $attributes_text, $attr_matches, PREG_SET_ORDER, 0);

    foreach($attr_matches as $match){
      $key = strtolower(trim($match[1]));
      $value = strtolower(trim($match[2]));

      $attributes[$key] = $value;
    }

    $att_ids = explode(',', $attributes["ids"]);

    ob_start();
    ?>
    <table class="gallery-wrapper columns-<?php echo $attributes["columns"]; ?>">

      <?php
      $columns = (int) $attributes["columns"];

      for($row = 0; $row < ceil(count($att_ids) / $columns); $row++):

        ?><tr><?php

        for($column = 0; $column < $columns; $column++):
          $in_bounds = $column < count($att_ids) - $columns * $row;
          ?><td class="<?php if(!$in_bounds){ echo "empty"; }?>"><?php
          if($in_bounds){
            $index = $row * $columns + $column;
            $att_id = $att_ids[$index];

            $attachment = wp_get_attachment_image_src($att_id, $attributes["size"]);

            if($attachment){
              $attachment = $attachment[0];
              $att_post = get_post($att_id);
              $caption = trim($att_post->post_excerpt);
              $gallery_link = get_post_meta($att_id, "_gallery_link_url", true);
              $gallery_link_target = get_post_meta($att_id, "_gallery_link_target", true);

              ?>
              <a class="gallery-item" href="<?php echo $gallery_link; ?>" target="<?php echo $gallery_link_target; ?>">
                <img src="<?php echo $attachment; ?>" class="gallery-image" />
                <?php
                  if(!empty($caption)){
                    ?><div class="gallery-item-caption"><?php echo $caption; ?></div><?php
                  }
                ?>
              </a><?php
            }
          }

          ?></td><?php

        endfor;

        ?></tr><?php

      endfor;
      ?>
    </table>
    <?php
    return ob_get_clean();

  }, $html);

  // FINALLY SHIT OUT THE CONTENT

  return $html;
}

?>