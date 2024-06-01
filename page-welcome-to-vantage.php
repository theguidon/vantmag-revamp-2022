<?php
get_header();
?>

<main id="about">
  <h2
    class="mobile-hero"
    style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.40), rgba(0, 0, 0, 0.40)), url('<?php echo get_template_directory_uri() ?>/assets/images/about/00.jpg');"
  >
    We are The GUIDON’s online magazine, a publication geared towards <span class="highlight">campus culture</span> and the people who <span style="white-space: nowrap">make it.</span>
  </h2>

  <div class="general-container">
    <h3>
      We are The GUIDON’s online magazine, a publication geared towards <span class="highlight">campus culture</span> and the people who <span style="white-space: nowrap">make it.</span>
    </h3>

    <hr />

    <div class="desc-chips-container">
      <div class="writeup">
        <!-- <p>
          In line with the massive potential of the online medium, our mission is to take student journalism into the 21st century. From documentaries to interactive quizzes, to story submissions from the readers themselves, this magazine is a step away from pretense and towards accessibility. It’s a place to share stories and to join in on discussions—a place for people to engage with the publication. For the past 95 years, The GUIDON has established itself as a voice of the students, promising a platform for your stories and your opinions to be heard. For everything from food to film, we are that platform. This is for the musicians. This is for the foodies. This is for the neophytes, the aficionados and all the in-betweens. This is for the storytellers. This is for you. Welcome to the homepage of the Atenean. Welcome to Vantage.
        </p> -->

        <?php
        the_content();
        ?>
      </div>

      <div class="categories">
        <?php
        $categs = array(
          'tv-and-film',
          'food',
          'theater-and-the-arts',
          'music',
          'hype',
          'hub',
          // 'vantage-point',
          // 'expose',
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
  </div>

  <div class="photos-container">
    <img
      src="<?php echo get_template_directory_uri() ?>/assets/images/about/01.jpg"
    />
    <img
      src="<?php echo get_template_directory_uri() ?>/assets/images/about/02.jpg"
    />
    <img
      src="<?php echo get_template_directory_uri() ?>/assets/images/about/03.jpg"
    />
    <img
      src="<?php echo get_template_directory_uri() ?>/assets/images/about/04.jpg"
    />
    <img
      src="<?php echo get_template_directory_uri() ?>/assets/images/about/05.jpg"
    />

    <div
      style="--bg-color: <?php echo vant_get_color('Food') ?>"
    ></div>
    <div
      style="--bg-color: <?php echo vant_get_color('Hub') ?>"
    ></div>
    <div
      style="--bg-color: <?php echo vant_get_color('Theater & Arts') ?>"
    ></div>
    <div
      style="--bg-color: <?php echo vant_get_color('Expose') ?>"
    ></div>
    <div
      style="--bg-color: <?php echo vant_get_color('Hype') ?>"
    ></div>
  </div>
</main>

<?php
get_footer();
?>