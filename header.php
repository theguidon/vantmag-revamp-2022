<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta property="fb:pages" content="123143371058157" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="author" content="">
  <meta name="theme-color" content="#184482">

  <!-- Custom CSS -->
  <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->
  <link rel="pingback" href="<?php bloginfo('pingback_url');?>" />
  <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri() . "/assets/images/logos/EmblemBlue.png" ?>" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <?php wp_head(); ?>
</head>

<header>
  <div class="header-mobile">
    <svg
      id="hamburger-icon"
      class="menu-icon active"
      onclick="vant_toggle_mobile_menu(true)"
      viewBox="0 0 32 33"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M32 10.7773H0V8.77734H32V10.7773ZM32 26.7773H0V24.7773H32V26.7773ZM32 18.7613H0V16.7773H32V18.7613Z"
        fill="white"
      />
    </svg>

    <svg
      id="close-icon"
      class="menu-icon"
      onclick="vant_toggle_mobile_menu(false)"
      viewBox="0 0 32 32"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M6.66683 27.6673L4.3335 25.334L13.6668 16.0007L4.3335 6.66732L6.66683 4.33398L16.0002 13.6673L25.3335 4.33398L27.6668 6.66732L18.3335 16.0007L27.6668 25.334L25.3335 27.6673L16.0002 18.334L6.66683 27.6673Z"
        fill="white"
      />
    </svg>


    <a class="logo" href="<?php echo home_url("/") ?>">
      <img
        src="<?php echo get_template_directory_uri() ?>/assets/images/logos/LongFormVantMag.svg"
        alt="Vantage Magazine"
      />
    </a>

    <div class="filler">
    </div>
  </div>

  <div id="mobile-menu">
    <div class="content">
      <form
        method="get"
        action="<?php echo home_url("/") ?>"
      >
        <div class="search-field">
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
            value="<?php echo get_search_query() ?>"
            placeholder="Search an article, author, or category"
          />
        </div>
      </form>

      <?php
      wp_nav_menu(array(
        'menu' => 'main',
        'container' => '',
        'theme_location' => 'main',
        'items_wrap' => '<ul class="nav-list">%3$s</ul>',
      ));
      ?>
    </div>
  </div>

  <div class="header-top">
    <a class="logo" href="<?php echo home_url("/") ?>">
      <img
        src="<?php echo get_template_directory_uri() ?>/assets/images/logos/LongFormVantageMagazine.svg"
        alt="Vantage Magazine"
      />
    </a>
  </div>

  <nav class="nav-bar">
    <?php
    wp_nav_menu(array(
      'menu' => 'main',
      'container' => '',
      'theme_location' => 'main',
      'items_wrap' => '<ul class="nav-list"><div class="filler"></div>%3$s<div class="filler"><svg class="search-icon" onclick="vant_toggle_search()" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_1655_4945)"><path d="M18.0833 16.5557H17.1617L16.835 16.2407C18.235 14.6074 18.9583 12.3791 18.5617 10.0107C18.0133 6.76741 15.3067 4.17741 12.04 3.78074C7.105 3.17408 2.95166 7.32741 3.55833 12.2624C3.955 15.5291 6.545 18.2357 9.78833 18.7841C12.1567 19.1807 14.385 18.4574 16.0183 17.0574L16.3333 17.3841V18.3057L21.2917 23.2641C21.77 23.7424 22.5517 23.7424 23.03 23.2641C23.5083 22.7857 23.5083 22.0041 23.03 21.5257L18.0833 16.5557ZM11.0833 16.5557C8.17833 16.5557 5.83333 14.2107 5.83333 11.3057C5.83333 8.40074 8.17833 6.05574 11.0833 6.05574C13.9883 6.05574 16.3333 8.40074 16.3333 11.3057C16.3333 14.2107 13.9883 16.5557 11.0833 16.5557Z" fill="white"/></g><defs><clipPath id="clip0_1655_4945"><rect width="28" height="28" fill="white" transform="translate(0 0.222656)"/></clipPath></defs></svg></div></ul>',
    ));
    ?>
  </nav>

  <div
    id="search-bg-tint"
    onclick="vant_toggle_search()"
  ></div>

  <form
    id="search-bar-container"
    method="get"
    action="<?php echo home_url("/") ?>"
  >
    <div class="search-field">
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
    </div>
  </form>
</header>

<body>