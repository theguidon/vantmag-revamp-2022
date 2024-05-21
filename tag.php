<?php
get_header();

$tag = get_queried_object();

$query = new WP_Query(array(
  'tag' => $tag->slug,
  'posts_per_page' => 6,
));
?>

<main class="tag-container general-container">
  <p class="tagged-with">Articles tagged with</p>
  <div class="heading-container">
    <h2><?php echo $tag->name ?></h2>
    <div class="line"></div>
  </div>

  <div class="articles-grid">
    <?php
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

  <?php
  if ($query->max_num_pages > 1) {
  ?>
    <button id="load-more">Show me more</button>
  <?php
  }
  ?>
</main>

<?php
get_footer();
?>