<a
  href="<?php echo the_permalink() ?>"
  class="article"
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
      if (function_exists('coauthors_posts_links'))
        coauthors();
      else
        the_author();
      ?>
    </p>
    <p class="date"><?php echo get_the_date() ?></p>

    <p class="authors-date">
      <strong>
        By 
          <?php
          if (function_exists('coauthors_posts_links'))
            coauthors();
          else
            the_author();
          ?>
      </strong> | <?php echo get_the_date() ?>
    </p>
  </div>
</a>