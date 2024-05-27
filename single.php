<?php
get_header();

if (have_posts()) {
  the_post();
}

$categs = get_the_category();

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

//     wp_reset_postdata();
//   }
// }


$suggq = new WP_Query(array(
  'category_name' => $categs[0]->name,
  'posts_per_page' => 4,
));
?>

<main id="article-info">
  <div class="title-container">
    <?php
    get_template_part('templates/chip', null, array(
      'term' => $categs[0]
    ));
    ?>

    <h2 class="title">
      <?php the_title() ?>
    </h2>

    <div>
      <p class="share">Share</p>
      <div class="socmed-icons">
        <a
          href="http://www.facebook.com/sharer.php?u=<?php echo home_url($wp->request) ?>"
          target="_blank"
          class="icon"
          style="
            -webkit-mask: url('<?php echo get_template_directory_uri() ?>/assets/images/icons/facebook.svg') no-repeat center;
            mask: url('<?php echo get_template_directory_uri() ?>/assets/images/icons/facebook.svg') no-repeat center;
          "
        ></a>
        <a
          href="http://x.com/share?url=<?php echo home_url($wp->request) ?>&text=<?php echo get_the_title() ?>"
          target="_blank"
          class="icon"
          style="
            -webkit-mask: url('<?php echo get_template_directory_uri() ?>/assets/images/icons/twitter.svg') no-repeat center;
            mask: url('<?php echo get_template_directory_uri() ?>/assets/images/icons/twitter.svg') no-repeat center;
          "
        ></a>
      </div>
    </div>
  </div>

  <div
    class="featured-image-container"
    style="<?php
      if (has_post_thumbnail())
        echo "background-image: url('" . wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0] . "');";
      else
        echo "background-color: var(--vantage-purple-light);";
        // echo "background-image: url('" . get_template_directory_uri() . "/assets/images/vantmag_16x9.png');";
    ?>"
  >
    <?php
    if (has_post_thumbnail()) {
    ?>
      <img
        src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0] ?>"
        alt="<?php the_title() ?>"
      />
    <?php
    }
    ?>
  </div>


  <div class="bar <?php if (empty(trim($post->post_excerpt))) { echo "no-blurb"; } ?>">
    <div class="general-container">
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
          <p class="written-by">
            Written by
          </p>

          <h4 class="author"><?php
            if (function_exists('get_coauthors'))
              coauthors_posts_links();
            else
              the_author_posts_link();
          ?></h4>

          <p class="date">
            <?php the_date() ?>
          </p>
        </div>
      </div>

      <?php
      if (!empty(trim($post->post_excerpt))) {
      ?>
        <p class="blurb">
          <?php echo $post->post_excerpt ?>
        </p>
      <?php
      }
      ?>
    </div>
  </div>
</main>

<article id="article-content" class="general-container">
  <?php the_content() ?>
</article>

<section id="article-suggested" class="general-container">
  <div class="heading-container">
    <h5 class="heading">You might like these!</h5>
    <div class="line"></div>
  </div>

  <div class="articles-grid">
    <?php
    if ($suggq->have_posts()) {
      while ($suggq->have_posts()) {
        $suggq->the_post();
        get_template_part('templates/article-card', null, array(
          'current_post' => $suggq->post,
        ));
      }
    }
    ?>
  </div>
</section>

<?php
get_footer();
?>