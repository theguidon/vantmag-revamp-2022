<?php
  $suggq = new WP_Query(array(
    'posts_per_page' => 6,
    'orderby' => 'rand',
  ));
?>

<section id="suggestions" class="general-container">
  <div class="heading-container">
    <h3>Here is something for you.</h3>
    <div class="line"></div>
  </div>

  <div class="articles-grid">
    <?php
    for ($i = 0; $i < 6; $i++) {
      if ($suggq->have_posts()) {
        $suggq->the_post();
        get_template_part('templates/article-card', null, array(
          'current_post' => $suggq->post,
        ));
      }
    }
    ?>
  </div>
</section>