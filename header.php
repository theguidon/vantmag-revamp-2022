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
  <!-- <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri() . "/assets/images/logo_blue.png" ?>" /> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <?php wp_head(); ?>
</head>

<header>
   <div class="header-top">
      <a class="logo" href="#">
         <img
            src="<?php echo get_template_directory_uri();?> ./assets/images/LongFormWhite.png"
            alt="Vantage Magazine Logo"
            height="109px">
      </a>
   </div>
   <div class="header-bottom">
      <div class="search-bar-container">
            <img
               src="<?php echo get_template_directory_uri();?> ./assets/images/icons/search.svg"
               alt="Search icon">
            <form>
               <input type="text" id="search-input" placeholder="Search...">
            </form>
      </div>
      <nav>
         <ul>
            <li class="nav-item">
               <a href="#">TV & Film</a>
            </li>
            &bull;
            <li class="nav-item">
               <a href="#">Food</a>
            </li>
            &bull;
            <li class="nav-item">
               <a href="#">Theater and Arts</a>
            </li>
            &bull;
            <li class="nav-item">
               <a href="#">Music</a>
            </li>
            &bull;
            <li class="nav-item">
               <a href="#">Hype</a>
            </li>
            &bull;
            <li class="nav-item">
               <a href="#">Hub</a>
            </li>
            &bull;
            <li class="nav-item">
               <a href="#">Vantage</a>
            </li>
            &bull;
            <li class="nav-item">
               <a href="#">Expose</a>
            </li>
            &bull;
            <li class="nav-item">
               <a href="#">About</a>
            </li>
         </ul>
      </nav>
   </div>
</header>