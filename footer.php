<footer>
  <div class="left-half">
    <a class="logo" href="<?php echo home_url("/") ?>">
      <img
        src="<?php echo get_template_directory_uri() ?>/assets/images/logos/LongFormVantageMagazine.svg"
        alt="Vantage Magazine"
      />
    </a>

    <p class="desc">
      We are The GUIDON's online magazine, a publication geared towards campus culture and the people who make it.
      <br /><br />
      © The GUIDON <?php echo get_the_date("Y") ?>. All rights reserved.
      <br /><br />
      Designed and developed by Digital Development <span style="white-space: nowrap">2022–2023</span> and <span style="white-space: nowrap">2023–2024</span>.
    </p>

    <div class="sm-icons">
      <a
        href="https://www.facebook.com/TheGUIDON"
        target="_blank"
      ><img
          src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/facebook.svg"
          alt="Facebook"
      /></a>

      <a
        href="https://twitter.com/TheGUIDON"
        target="_blank"
      ><img
          src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/twitter.svg"
          alt="Twitter"
      /></a>

      <a
        href="https://www.instagram.com/theguidon/"
        target="_blank"
      ><img
          src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/instagram.svg"
          alt="Instagram"
      /></a>

      <a
        href="https://open.spotify.com/show/0t2PxYpSft6HfoPHibwAvT"
        target="_blank"
      ><img
          src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/spotify.svg"
          alt="Spotify"
      /></a>

      <a
        href="https://www.youtube.com/@TheGuidon"
        target="_blank"
      ><img
          src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/youtube.svg"
          alt="YouTube"
      /></a>
    </div>
  </div>

  <div class="right-half">
    <div class="more">
      <p class="heading">More from The GUIDON</p>
      <a
        href="https://theguidon.com"
        target="_blank"
      >The GUIDON Main</a>
      <a
        href="https://interactive.theguidon.com"
        target="_blank"
      >The GUIDON Interactive</a>
      <a
        href="https://archives.theguidon.com"
        target="_blank"
      >The GUIDON Archives</a>
    </div>

    <div class="categories">
      <p class="heading">Categories</p>

      <div class="categs">
        <?php
        $categs = array(
          'tv-and-film',
          'food',
          'theater-and-the-arts',
          'music',
          'hype',
          'hub',
          'vantage-point',
          'expose',
        );

        for ($i = 0; $i < count($categs); $i++) {
          $term = null;
          if ($i != 6)
            $term = get_term_by('slug', $categs[$i], 'category');
          else
            $term = get_term_by('slug', $categs[$i], 'post_tag');

          get_template_part('templates/chip', null, array('term' => $term));
        }
        ?>
    </div>
  </div>
</footer>

</body>

</html>