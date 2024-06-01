<?php
get_header();

$categ = get_term(get_query_var('cat'), 'category');

$latest_query = new WP_Query(array(
  'category_name' => $categ->slug,
  'posts_per_page' => 3,
));

$has_icon = false;
if (in_array($categ->slug, array('expose', 'food', 'hub', 'hype', 'music', 'theater-and-the-arts', 'tv-and-film', 'vantage-point'))) {
  $has_icon = true;
}

global $wp_query;
$wp_query->set('posts_per_page', 6);
$wp_query->set('offset', 3);
$wp_query->query($wp_query->query_vars);
?>

<section
  class="categ-hero"
  style=""
>
  <div
    class="bg-transparent"
    style="background-color: <?php echo vant_get_color(vant_get_categ_tag_name($categ->name)) ?>"
  ></div>
  <div
    class="bookmark"
    style="background-color: <?php echo vant_get_color(vant_get_categ_tag_name($categ->name)) ?>"
  >
    <?php
    if ($has_icon) {
    ?>
      <img
        src="<?php echo get_template_directory_uri() . "/assets/images/icons/chip/" . $categ->slug . ".png" ?>"
      />
    <?php
    }
    ?>

    <h2 class="name">
      <?php
      if ($categ->slug == 'uncategorized')
        echo "Other";
      else
        echo vant_get_categ_tag_name($categ->name);
      ?>
    </h2>
  </div>

  <p class="desc">
    <?php echo $categ->description ?>
  </p>
</section>

<main class="categ-container general-container">
  <div class="latest-container">
    <?php
    $article_counter = 0;
    while ($latest_query->have_posts()) {
      $latest_query->the_post();
      $article_counter++;

      get_template_part('templates/article-card', null, array(
        'current_post' => $latest_query->post,
        'grid_area' => 'l' . $article_counter,
        'hide_chip' => true,
      ));
    }
    ?>
  </div>

  <div class="all-articles-container">
    <div class="heading-container">
      <h3>All Articles</h3>
      <div class="line"></div>
    </div>

    <div class="articles-grid">
      <?php
      while ($wp_query->have_posts()) {
        $wp_query->the_post();
        get_template_part('templates/article-card', null, array(
          'current_post' => $wp_query->post,
          'hide_chip' => true,
        ));
      }
      ?>
    </div>

    <?php
    if ($wp_query->max_num_pages > 1) {
    ?>
      <button
        id="load-more"
      >
        Show me more
      </button>
    <?php
    }
    ?>
  </div>
</main>

<?php
get_footer();
?>