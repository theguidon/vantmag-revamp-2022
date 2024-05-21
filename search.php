<?php
get_header();

$key = get_search_query();

$tag_results = get_terms(array(
  'order' => 'ASC',
  'name__like' => $key,
  'taxonomy' => array('post_tag'),
));

$author_results = new WP_Query(array(
  'post_type' => 'guest-author',
  'main_title' => $key,
  'order' => 'ASC',
  'posts_per_page' => -1,
));

$article_results = new WP_Query(array(
  'post_type' => 'post',
  's' => $key,
  'posts_per_page' => 6,
));

$has_tag_results = count($tag_results) > 0;
$has_author_results = $author_results->have_posts();
$has_article_results = $article_results->have_posts();
?>

<?php
if ($has_tag_results || $has_author_results || $has_article_results) {
?>

  <main id="search-results" class="general-container">
    <form
      id="search-field"
      method="get"
      action="<?php echo home_url("/") ?>"
    >
      <svg
        viewBox="0 0 24 25"
        fill="currentColor"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          fill-rule="evenodd"
          clip-rule="evenodd"
          d="M10.8 2.62305C15.4392 2.62305 19.2 6.38386 19.2 11.023C19.2 12.9147 18.5747 14.6603 17.5196 16.0645L17.5854 16.1159L17.6486 16.1745L21.2486 19.7745C21.7172 20.2431 21.7172 21.0029 21.2486 21.4716C20.816 21.9042 20.1353 21.9374 19.6645 21.5714L19.5515 21.4716L15.9515 17.8716C15.9105 17.8305 15.873 17.7873 15.8391 17.7421C14.4373 18.7978 12.6917 19.423 10.8 19.423C6.16083 19.423 2.40002 15.6622 2.40002 11.023C2.40002 6.38386 6.16083 2.62305 10.8 2.62305ZM10.8 5.02305C7.48632 5.02305 4.80002 7.70934 4.80002 11.023C4.80002 14.3368 7.48632 17.023 10.8 17.023C14.1137 17.023 16.8 14.3368 16.8 11.023C16.8 7.70934 14.1137 5.02305 10.8 5.02305Z"
        />
      </svg>
      <input
        type="text"
        name="s"
        placeholder="Search an article, author, or category"
        value="<?php echo $key ?>"
      />
    </form>

    <div class="heading-container">
      <h3>Search results for “<?php echo $key ?>”</h3>
      <div class="line"></div>
    </div>

    <?php
    if ($has_tag_results) {
    ?>
      <h4>Tags</h4>
      <div class="tag-results">
        <?php
        for ($i = 0; $i < count($tag_results); $i++) {
        ?>
          <a
            class="tag"
            href="<?php echo get_tag_link($tag_results[$i]->term_id) ?>"
          ><?php echo $tag_results[$i]->name ?></a>
        <?php
          if ($i + 1 != count($tag_results))
            echo "<span class=\"dot\">•</span>";
        }
        ?>
      </div>
    <?php
    }
    ?>

    <?php
    if ($has_author_results) {
    ?>
      <h4>Authors</h4>
      <div class="author-results">
        <?php
        while ($author_results->have_posts()) {
          $author_results->the_post();
        ?>
          <a
            class="author"
            href="<?php echo home_url('/author/' . str_replace('cap-', '', $author_results->post->post_name)) ?>"
          >
            <img
              src="<?php echo get_template_directory_uri() ?>/assets/images/emblem_1x1.png"
              alt="<?php echo get_the_title($author_results->post) ?>"
            />
            <p class="name"><?php echo get_the_title($author_results->post) ?></p>
          </a>
        <?php
        }
        ?>
      </div>
    <?php
    }
    ?>

    <?php
    if ($has_article_results) {
    ?>
      <h4>Articles</h4>
      <div class="articles-grid">
        <?php
        while ($article_results->have_posts()) {
          $article_results->the_post();
          get_template_part('templates/article-card', null, array(
            'current_post' => $article_results->post,
          ));
        }
        ?>
      </div>
      <button id="load-more">Show me more</button>
    <?php
    }
    ?>
  </main>

<?php
} else {
  get_template_part('template-parts/404/content');
}
?>

<?php
get_footer();
?>