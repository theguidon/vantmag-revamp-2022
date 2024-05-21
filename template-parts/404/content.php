<?php
$suggq = new WP_Query(array(
  'posts_per_page' => 3,
  'orderby' => 'rand',
));
?>

<main id="page-404" class="general-container">
  <div class="heading-container">
    <h2>Page not found</h2>
    <div class="line"></div>
  </div>

  <p class="desc">The page you’re looking for isn’t available. It may have been removed, or there might have been a typo in the URL.</p>

  <h4 class="search-again">Try searching for it again:</h4>
  
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
      value="<?php echo get_search_query() ?>"
    />
  </form>

  <h4 class="featured-heading">Or, take a look at a few featured articles:</h4>
  
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
</main>