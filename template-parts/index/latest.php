<?php
$latest_query = new WP_Query(array(
  'posts_per_page' => 7,
));

$icon_link = false;
// if (function_exists('get_coauthors')) {
//   $co_authors = get_coauthors();

//   if (count($co_authors) == 1) {
//     $cq = new WP_Query(array(
//       'post_type' => 'guest-author',
//       's' => $co_authors[0]->display_name,
//     ));

//     if ($cq->have_posts()) {
//       $cq->the_post();

//       if (has_post_thumbnail($cq->post->ID))
//         $icon_link = wp_get_attachment_image_src(get_post_thumbnail_id($cq->post->ID), 'large')[0];
//       else
//         $icon_link = false;
//     } else
//       $icon_link = false;
//   }
// }
?>

<section id="hero">
  <?php
  if ($latest_query->have_posts()) {
    $latest_query->the_post();
  }
  ?>
  <a
    class="article"
    href="<?php echo the_permalink() ?>"
  >
    <div class="thumbnail-container">
      <div
        class="thumbnail"
        style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.40), rgba(0, 0, 0, 0.40)), url(<?php
          if (has_post_thumbnail($latest_query->post->ID)) {
            echo wp_get_attachment_image_src(get_post_thumbnail_id($latest_query->post->ID), 'single-post-thumbnail')[0];
          } else {
            echo get_template_directory_uri() . "/assets/images/vantmag_16x9.png";
          }
        ?>)"
      ></div>
    </div>

    <div class="general-container">
      <?php
      get_template_part('templates/chip', null, array(
        'term' => get_the_category($latest_query->post->ID)[0],
        'no_anchor' => true,
      ));
      ?>

      <h2 class="title">
        <?php echo get_the_title($latest_query->post->ID) ?>
      </h2>

      <div class="author-info">
        <?php
        if ($icon_link) {
        ?>
          <img
            class="icon"
            src="<?php echo $icon_link ?>"
          />
        <?php
        }
        ?>

        <div class="author-date">
          <p class="author"><?php
            if (function_exists('get_coauthors'))
              coauthors();
            else
              the_author();
          ?></p>
          <p class="date">Published on <?php echo get_the_date('F j, Y', $latest_query->post->ID) ?></p>
        </div>
      </div>
    </div>
  </a>
</section>

<section id="latest" class="general-container">
<?php
for ($i = 0; $i < 6; $i++) {
  if ($latest_query->have_posts()) {
    $latest_query->the_post();

    get_template_part('templates/article-card', null, array(
      'current_post' => $latest_query->post,
      'grid_area' => 'a' . $i,
    ));
  }
}
?>
</section>