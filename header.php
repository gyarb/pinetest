<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header>
    <div class="container">
      <div class="header_top">
        <div class="header_top_left">
          <div class="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/images/logo.png'; ?>"></a>
          </div>
        </div>
        <div class="header_top_right">
          <div class="mobile_menu_button">
            <div class="items">
              <span class="item"></span>
              <span class="item"></span>
              <span class="item"></span>
            </div>
          </div>
          <?php wp_nav_menu(array('theme_location' => 'main-menu', 'container' => false)); ?>
          <a href="./" class="link_button link_button_header">
            Book a tour
          </a>
        </div>
      </div>
    </div>
  </header>
  <div id="container">
    <main id="content" role="main">