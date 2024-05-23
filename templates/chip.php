<?php
$rev_name = vant_get_categ_tag_name($args['term']->name);

$has_icon = false;
if (in_array($args['term']->slug, array('expose', 'food', 'hub', 'hype', 'music', 'theater-and-the-arts', 'tv-and-film', 'vantage-point'))) {
  $has_icon = true;
}


if (isset($args['no_anchor']) && $args['no_anchor']) {
?>
  <div
    class="chip"
    style="background-color: <?php echo vant_get_color($rev_name) ?>"
    href="<?php echo get_term_link($args['term']) ?>"
  >
<?php
} else {
?>
  <a
    class="chip"
    style="background-color: <?php echo vant_get_color($rev_name) ?>"
    href="<?php echo get_term_link($args['term']) ?>"
  >
<?php
}


if ($has_icon) {
?>
  <img
    src="<?php echo get_template_directory_uri() . "/assets/images/icons/chip/" . $args['term']->slug . ".svg" ?>"
  />
<?php
}
if ($rev_name == "Uncategorized")
  echo "Other";
else
  echo $rev_name;


if (isset($args['no_anchor']) && $args['no_anchor']) {
  echo "</div>";
} else {
  echo "</a>";
}

?>