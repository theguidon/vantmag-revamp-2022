<?php
get_header();

global $wp_query;
$auth = $wp_query->get_queried_object();
?>

<main id="author-info">
  <div class="general-container">
    <!-- <img
      src="<?php
        if (has_post_thumbnail($auth->ID)) {
          // echo wp_get_attachment_image_src(get_post_thumbnail_id($auth->ID), 'medium')[0];
        } else {
          // echo get_template_directory_uri() . "/assets/images/emblem_1x1.png";
        }
      ?>"
    /> -->

    <div>
      <p class="written">Written</p>
      <h1 class="name"><?php echo $auth->display_name ?></h1>
      <p class="desc"><?php echo $auth->description ?></p>
    </div>
  </div>
</main>

<section id="author-articles" class="general-container">
  <div class="heading-container">
    <h3>Written Articles</h3>
    <div class="line"></div>
  </div>

  <div class="articles-grid">
    <?php
    $query = new WP_Query(array(
      'author_name' => $auth->user_nicename,
      'posts_per_page' => 6,
      'numberposts' => -1,
    ));

    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();
        get_template_part('templates/article-card', null, array(
          'current_post' => $query->post,
        ));
      }
    }
    ?>
  </div>
</section>

<?php
get_footer();
?>