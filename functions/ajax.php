<?php
/**
 * Load more AJAX handler
 */

function vant_loadmore_ajax_handler() {
  $args = json_decode(stripslashes($_POST['query']), true);
  $args['posts_per_page'] = 6;
  $args['post_status'] = 'publish';

  if (isset($_POST['from']) && $_POST['from'] == 'search') {
    $args['s'] = $_POST['s'];
    $args['post_type'] = 'post';
    $args['paged'] = $_POST['page'] + 1;
  } else {
    $args['offset'] = 3 + $_POST['page'] * 6;
  }

  // it is always better to use WP_Query but not here
  query_posts($args);

  if (have_posts()) {
    while (have_posts()) {
      the_post();

      if (isset($_POST['from']) && $_POST['from'] == 'search') {
        get_template_part('templates/article-card', null, array(
          'current_post' => $post,
        ));
      } else {
        get_template_part('templates/article-card', null, array(
          'current_post' => $post,
          'hide_chip' => true,
        ));
      }
    }
  }
  die;
}

add_action('wp_ajax_loadmore', 'vant_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'vant_loadmore_ajax_handler');

?>