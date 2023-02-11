<?php get_header(); ?>

<?php
  $latestq = new WP_Query(array(
    'posts_per_page' => 7,
    // 'orderby' => 'rand',
  ));
?>

<main id="index">
  <section id="latest">
    <?php
      if ($latestq->have_posts()) {
        $latestq->the_post();
      }
    ?>
    <div
      id="latest-article"
      class="article"
      style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.05), rgba(0, 0, 0, 0.05)), url(<?php
        if (has_post_thumbnail($latestq->post->ID)) {
          echo wp_get_attachment_image_src(get_post_thumbnail_id($latestq->post->ID), 'single-post-thumbnail')[0];
        } else {
          echo get_template_directory_uri() . "/assets/images/logo_vant_16x9.png";
        }
      ?>)"
    >
      <?php get_template_part('templates/chip', null, array('id' => get_the_category($latestq->post->ID)[0]->term_id)) ?>
      <h2 class="title"><?php echo get_the_title($latestq->post->ID) ?></h2>
      <div class="author-info">
        <img
          src="https://vantage.theguidon.com/wp-content/uploads/2019/10/Giu-Martinez-1x1-1.jpeg"
          class="icon"
        />
        <div class="author-text">
          <p class="author bodytext-l"><?php
            if (function_exists('coauthors_posts_links'))
              coauthors_posts_links();
            else
              get_the_author_posts_link();
          ?></p>
          <p class="date bodytext-s">Published on <?php echo get_the_date('F j, Y', $latestq->post->ID) ?></p>
        </div>
      </div>
    </div>

    <div id="latest-content">
      <?php
        for ($i = 0; $i < 6; $i++) {
          if ($latestq->have_posts()) {
            $latestq->the_post();
      ?>
        <div
          class="article"
          style="grid-area: a<?php echo $i; ?>"
        >
          <img
            class="thumbnail"
            src="<?php
              if (has_post_thumbnail($latestq->post->ID)) {
                echo wp_get_attachment_image_src(get_post_thumbnail_id($latestq->post->ID), 'medium')[0];
              } else {
                echo get_template_directory_uri() . "/assets/images/logo_vant_16x9.png";
              }
            ?>"
            alt="Picture of <?php get_the_title($latestq->post->ID) ?>"
          />

          <div class="article-details">
            <?php get_template_part('templates/chip', null, array('id' => get_the_category($latestq->post->ID)[0]->term_id)) ?>

            <p class="title bodytext"><?php echo get_the_title($latestq->post->ID) ?></p>
            <?php if ($i == 0) { ?>
              <p class="excerpt bodytext-xs"><?php echo get_the_excerpt($latestq->post->ID) ?></p>
            <?php } ?>
            <p class="author bodytext-s">By <?php
              if (function_exists('coauthors_posts_links'))
                coauthors_posts_links();
              else
                get_the_author_posts_link();
            ?></p>
          </div>
        </div>
      <?php } } ?>
    </div>
  </section>

  <section id="index-suggestions">
    SUGGESTIONS
  </section>

  <section id="index-content">
    CONTENT
  </section>
</main>

<?php get_footer(); ?>