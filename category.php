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
        src="<?php echo get_template_directory_uri() . "/assets/images/icons/chip/" . $categ->slug . ".svg" ?>"
      />
    <?php
    }
    ?>

    <h1 class="name">
      <?php echo vant_get_categ_tag_name($categ->name) ?>
    </h1>
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
    ?>
      <a
        href="<?php echo the_permalink() ?>"
        class="article"
        style="grid-area: l<?php echo $article_counter ?>"
      >
        <div class="thumbnail-container">
          <img
            class="thumbnail"
            src="<?php
              if (has_post_thumbnail($post->ID)) {
                echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium')[0];
              } else {
                echo get_template_directory_uri() . "/assets/images/vantmag_16x9.png";
              }
            ?>"
            alt="<?php
              if (has_post_thumbnail($post->ID)) {
                echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
              }
            ?>"
          />
        </div>

        <div class="info">
          <h4 class="title"><?php the_title() ?></h4>
          <p class="excerpt"><?php echo get_the_excerpt() ?></p>
          <p class="authors">By 
            <?php
              if (function_exists('coauthors_posts_links')) {
                coauthors();
              } else {
                the_author();
              }
            ?>
          </p>
          <p class="date"><?php echo get_the_date() ?></p>
        </div>
      </a>

    <?php
    }
    ?>
  </div>
</main>

<?php
get_footer();
?>