<!DOCTYPE html>
<html <?php language_attributes(); ?>> <!--States the language which is being used Function-->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php bloginfo('name'); ?>
  </title> <!--Types the name of the page/blog title Function-->
  <?php wp_Head(); ?>
</head>

<body <?php body_class(); ?>> <!--Adds classes to body-->

<div id="theme_header">

<div id="logo_image_top">
<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_theme_mod('diwp_logo'); ?>"/></a>
</div>

<header class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
        <?php esc_html(bloginfo('name')); ?>
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="navbar-nav me-auto mb-2 mb-lg-0 main-menu-div w-100">
          <?php
    wp_nav_menu(
      array(
        'theme_location' => 'main-menu',
      )
    );
    ?>  
        </div>
        <form class="d-flex" role="search">
          <?php get_search_form(true); ?>
        </form>
      </div>
    </div>
  </header>
</div>

    
