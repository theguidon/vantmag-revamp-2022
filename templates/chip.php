<?php
  $t = get_term($args['id']);
  $rev_name = vant_get_categ_tag_name($t->name);

  $has_icon = false;
  if (in_array($t->slug, array('expose', 'food', 'hub', 'hype', 'music', 'theater-and-the-arts', 'tv-and-film', 'vantage-point')))
    $has_icon = true;
?>

<div
  class="chip"
  style="background-color: <?php echo vant_get_color($rev_name) ?>"
  href="<?php echo get_term_link($args['id']) ?>"
>
  <?php if ($has_icon) { ?>
    <img src="<?php echo get_template_directory_uri() . "/assets/images/icons/chip/" . $t->slug . ".svg" ?>" />
  <?php } ?>
  <?php echo $rev_name; ?>
</div>