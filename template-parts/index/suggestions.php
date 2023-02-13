<?php
  $suggq = new WP_Query(array(
    'posts_per_page' => 6,
    'orderby' => 'rand',
  ));
?>

<section id="suggestions">
  <div class="heading-container">
    <h3>Here is something for you.</h3>
    <div class="line"></div>
  </div>

  <div class="suggestions-grid">
    <?php
      for ($i = 0; $i < 6; $i++) {
        if ($suggq->have_posts()) {
          $suggq->the_post();
    ?>
      <a
        class="article"
        href="<?php echo get_permalink($suggq->post->ID) ?>"
      >
        <div class="thumbnail-container">
          <img
            class="thumbnail"
            src="<?php
              if (has_post_thumbnail($suggq->post->ID))
                echo wp_get_attachment_image_src(get_post_thumbnail_id($suggq->post->ID), 'single-post-thumbnail')[0];
              else
                echo get_template_directory_uri() . "/assets/images/vantmag_16x9.png";
            ?>"
            alt="Picture of <?php echo get_the_title($suggq->post->ID) ?>" />
        </div>

        <div class="details">
          <?php get_template_part("templates/chip", null, array('id' => get_the_category($suggq->post->ID)[0]->term_id)); ?>

          <p class="title bodytext"><?php echo get_the_title($suggq->post->ID) ?></p>
          <p class="excerpt bodytext-xs"><?php echo vant_short_excerpt(get_the_excerpt($suggq->post->ID)) ?></p>
          <p class="author bodytext-s">By <?php
            if (function_exists('get_coauthors'))
              echo vant_format_auths(get_coauthors());
            else
              echo get_the_author();
          ?></p>
        </div>
      </a>
    <?php } } ?>
  </div>
</section>