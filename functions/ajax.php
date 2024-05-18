<?php
/**
 * Load more AJAX handler
 */

function vant_loadmore_ajax_handler() {
  $args = json_decode(stripslashes($_POST['query']), true);
  $args['posts_per_page'] = 6;
  // $args['offset'] = 3;
  $args['offset'] = 3 + ($_POST['page'] - 1) * 6;
  // $args['paged'] = $_POST['page'] + 1;
  $args['post_status'] = 'publish';

  // it is always better to use WP_Query but not here
  query_posts($args);

  if (have_posts()) {
    while (have_posts()) {
      the_post();
      get_template_part('templates/article-card');
    }
  }
  die;
}

add_action('wp_ajax_loadmore', 'vant_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'vant_loadmore_ajax_handler');

?>