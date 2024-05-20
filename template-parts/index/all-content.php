<section id="all-content" class="general-container">
  <?php
  $categs = array(
    'tv-and-film',
    'music',
    'food',
    'theater-and-the-arts',
    'hype',
    'hub',
    'vantage-point',
    // 'expose',
  );
  ?>

  <div class="heading-container">
    <h3>Categories</h3>
    <div class="line"></div>
  </div>

  <div class="tab-selection">
    <?php
    for ($i = 0; $i < count($categs); $i++) {
      $term = null;
      if ($i != 6)
        $term = get_term_by('slug', $categs[$i], 'category');
      else
        $term = get_term_by('slug', $categs[$i], 'post_tag');
    ?>
    <button
      id="<?php echo $categs[$i] ?>"
      class="<?php if ($i == 0) { echo "active"; } ?>"
      style="--active-color: <?php echo vant_get_color(vant_get_categ_tag_name($term->name)) ?>;"
      onclick="vant_index_on_tab_click('<?php echo $term->slug ?>')"
    >
      <div
        class="icon"
        style="
          --active-color: <?php echo vant_get_color(vant_get_categ_tag_name($term->name)) ?>;
          -webkit-mask: url('<?php echo get_template_directory_uri() ?>/assets/images/icons/chip/<?php echo $term->slug ?>.svg') no-repeat center;
          mask: url('<?php echo get_template_directory_uri() ?>/assets/images/icons/chip/<?php echo $term->slug ?>.svg') no-repeat center;
        "
      >
      </div>
      <?php echo vant_get_categ_tag_name($term->name) ?>
    </button>
    <?php
    }
    ?>
  </div>

  <?php
  for ($i = 0; $i < count($categs); $i++) {
    $categ_query = new WP_Query(array(
      'category_name' => $categs[$i],
      'posts_per_page' => 9,
    ));
  ?>
    <div
      id="<?php echo $categs[$i] ?>-tab"
      class="tab articles-grid <?php if ($i == 0) { echo "active"; } ?>"
    >
      <?php
      if ($categ_query->have_posts()) {
        while ($categ_query->have_posts()) {
          $categ_query->the_post();
          get_template_part('templates/article-card', null, array(
            'current_post' => $categ_query->post,
          ));
        }
      }
      ?>
    </div>

    <a
      id="<?php echo $categs[$i] ?>-load-more"
      class="load-more <?php if ($i == 0) { echo "active"; } ?>"
      href="<?php
        if ($i != 6)
          echo get_term_link(get_term_by('slug', $categs[$i], 'category'));
        else
          echo get_term_link(get_term_by('slug', $categs[$i], 'post_tag'));
      ?>"
    >Show me more</a>
  <?php
  }
  ?>
</section>