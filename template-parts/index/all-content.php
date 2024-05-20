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
  }
  ?>
</section>