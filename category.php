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

<main class="general-container">
</main>

<?php
get_footer();
?>