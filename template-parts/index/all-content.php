<section id="all-content">
  <aside>
    <div class="heading-container">
      <h3>Issues</h3>
      <div class="line"></div>
    </div>

    <a
      href="https://issuu.com/theguidonweb/docs/freshmanual_online_2022"
      class="article"
    >
      <div class="thumbnail-container">
        <img
          class="thumbnail"
          src="https://image.isu.pub/220809070741-ff613c088236a8658f1a7f38cd8e09f4/jpg/page_1_thumb_large.jpg"
          alt="Latest Freshmanual"
        />
      </div>

      <p class="title bodytext">Freshmanual Online 2022</p>
      <p class="excerpt bodytext-xs">After two years online, campus life is back onsite! Gear up for the new academic year with Vantage Magazine’s Freshmanual 2022, packed with everything you need for the hybrid setup. This online edition builds on the physical copy with exclusive OrSem content!</p>
      <p class="author bodytext-s">The GUIDON</p>
    </a>

    <!-- <iframe
      src="https://www.instagram.com/vantmag/"
    ></iframe> -->

    <div class="twitter-embed">
      <a class="twitter-timeline" data-tweet-limit="2" href="https://twitter.com/VantMag"></a>
      <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
  </aside>

  <div class="main-content">
    <?php
      $tabs = array(
        array('tv-and-film', 'TV & Film'),
        array('music', 'Music'),
        array('food', 'Food'),
        array('theater-and-the-arts', 'Theater & Arts'),
        array('hype', 'Hype'),
        array('hub', 'Hub'),
        array('vantage-point', 'Vantage POINT'),
      );
    ?>

    <div id="tabs">
      <?php for ($i = 0; $i < count($tabs); $i++) { ?>
        <button
          class="<?php if ($i == 0) echo "active"; ?>"
          onclick="vant_index_on_tab_click(<?php echo $i ?>)"
        ><?php echo $tabs[$i][1]; ?></button>
      <?php } ?>
    </div>

    <select id="tabs-mobile" name="tabs-mobile">
      <?php for ($i = 0; $i < count($tabs); $i++) { ?>
        <option value="<?php echo $tabs[$i][1] ?>"><?php echo $tabs[$i][1] ?></option>
      <?php } ?>
    </select>

    <div class="heading-container">
      <?php for ($i = 0; $i < count($tabs); $i++) { ?>
        <h3
          id="content-heading"
          class="<?php if ($i == 0) echo "active" ?>"
        ><?php echo $tabs[$i][1] ?></h3>
      <?php } ?>
      <div class="line"></div>
    </div>

    <?php
      for ($i = 0; $i < count($tabs); $i++) {
        $args = array('posts_per_page' => 18);

        if ($i < 6)
          $args['category_name'] = $tabs[$i][0];
        else
          $args['tag'] = $tabs[$i][0];

        $categq = new WP_Query($args);
    ?>
      <div
        id="<?php echo $tabs[$i][0]; ?>"
        class="articles-container <?php if ($i == 0) echo "active" ?>"
      >
        <?php
          if ($categq->have_posts()) {
            while ($categq->have_posts()) {
              $categq->the_post();
        ?>
          <a
            href="<?php echo get_permalink($categq->post->ID) ?>"
            class="article"
          >
            <div class="thumbnail-container">
              <img
                class="thumbnail"
                src="<?php
                  if (has_post_thumbnail($categq->post->ID))
                    echo wp_get_attachment_image_src(get_post_thumbnail_id($categq->post->ID), 'single-post-thumbnail')[0];
                  else
                    echo get_template_directory_uri() . "/assets/images/vantmag_16x9.png";
                ?>"
                alt="Picture of <?php echo get_the_title($categq->post->ID) ?>"
              />
            </div>

            <div class="details">
              <?php get_template_part('templates/chip', null, array('id' => get_the_category($categq->post->ID)[0]->term_id)); ?>
              <p class="title bodytext"><?php echo get_the_title($categq->post->ID) ?></p>
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
    <?php } ?>
  </div>
</section>