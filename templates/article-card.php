<?php
$current_post = null;

if (isset($args['current_post']))
  $current_post = $args['current_post'];
else
  $current_post = $post;

$hover_color = vant_get_color( vant_get_categ_tag_name(get_the_category($current_post)[0]->name) ) . '40';

if ($hover_color == '#33333340')
  $hover_color = 'var(--vantage-purple-light)';
?>

<a
  href="<?php echo the_permalink() ?>"
  class="article"
  style="<?php
    if (isset($args['grid_area']))
      echo 'grid-area: ' . $args['grid_area'] .';';
  ?> --hover-color: <?php echo $hover_color ?>;"
>
  <div class="thumbnail-container">
    <img
      class="thumbnail"
      src="<?php
        if (has_post_thumbnail($current_post->ID)) {
          echo wp_get_attachment_image_src(get_post_thumbnail_id($current_post->ID), 'medium')[0];
        } else {
          echo get_template_directory_uri() . "/assets/images/vantmag_16x9.png";
        }
      ?>"
      alt="<?php
        if (has_post_thumbnail($current_post->ID)) {
          echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
        }
      ?>"
    />
  </div>

  <div class="info">
    <?php
    if (!isset($args['hide_chip']) || !$args['hide_chip']) {
      get_template_part('templates/chip', null, array(
        'term' => get_the_category($current_post)[0],
        'no_anchor' => true,
      ));
    }
    ?>

    <h4 class="title"><?php echo get_the_title($current_post) ?></h4>
    <p class="excerpt"><?php echo get_the_excerpt($current_post) ?></p>
    <p class="authors">By 
      <?php
      if (function_exists('coauthors_posts_links'))
        coauthors();
      else
        the_author();
      ?>
    </p>
    <p class="date"><?php echo get_the_date('', $current_post) ?></p>

    <p class="authors-date">
      <strong>
        By 
          <?php
          if (function_exists('coauthors_posts_links'))
            coauthors();
          else
            the_author();
          ?>
      </strong> | <?php echo get_the_date('', $current_post) ?>
    </p>
  </div>
</a>