<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="author" content="Álik Welyn & BTA Creative">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
  </head>

  <body>

    <div class="preloader">
      <img class="preloader-logo" src="<?php bloginfo('template_url'); ?>/assets/imgs/logo-black.png" width="200" alt="<?php echo get_bloginfo( 'name' ) . ' - '. get_bloginfo( 'description' ); ?>">
      <div class="preloader-preview-area">
          <div class="ball-pulse">
              <div></div>
              <div></div>
              <div></div>
          </div>
      </div>
    </div>
  <?php 
    $theme_options_code = 435;
    $show_wp = get_field('show_wp_button', $theme_options_code);
    if($show_wp == true){ 
  ?>
    <div>
      <a href="https://api.whatsapp.com/send/?phone=<?php the_field('whatsapp_default'); ?>&text=<?php the_field('whatsapp_msg'); ?>&app_absent=0" id="wa_button" target="_new">
        <div class="circle-fill" style="transform-origin: center;"></div>
        <div class="img-circle" style="transform-origin: center;">
          <div class="img-circleblock" style="transform-origin: center;"></div>
        </div>
      </a>
    </div>
  <?php } ?>
  <?php if ( !is_home() && is_front_page() ) { ?>
    <nav class="navbar fixed-top navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
          <?php 
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
          ?>
          <img src="<?php echo $image[0]; ?>" width="175" alt="<?php echo get_bloginfo( 'name' ) . ' - '. get_bloginfo( 'description' ); ?>">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <?php
            wp_nav_menu( array(
              'menu'              => 'menu-principal',
              'theme_location'    => 'menu-principal',
              'depth'             => 2,
              'container'         => 'ul',
              'menu_class'        => 'navbar-nav ml-auto',
              'fallback_cb'       => 'wp_page_menu'
            ) );
          ?>
          <?php 
          $social_media_menu = get_field('social_media_menu', $theme_options_code);
          $social_media_choose_menu = get_field('social_media_choose_menu', $theme_options_code);
          if($social_media_menu == true){ 
          ?>
          <div class="social-part">
            <?php if($social_media_choose_menu && in_array('Facebook', $social_media_choose_menu)) { ?>
            <a href="<?php the_field('link_facebook'); ?>" target="_blank">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <?php } ?>
            <?php if($social_media_choose_menu && in_array('Instagram', $social_media_choose_menu)) { ?>
            <a href="<?php the_field('link_instagram'); ?>" target="_blank">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
            <?php } ?>
            <?php if($social_media_choose_menu && in_array('Youtube', $social_media_choose_menu)) { ?>
              <a href="<?php the_field('link_youtube'); ?>" target="_blank">
                <i class="fa fa-youtube"></i>
              </a>
            <?php } ?>
            <?php if($social_media_choose_menu && in_array('Twitter', $social_media_choose_menu)) { ?>
              <a href="<?php the_field('link_twitter'); ?>" target="_blank">
                <i class="fa fa-twitter"></i>
              </a>
            <?php } ?>
            <?php if($social_media_choose_menu && in_array('Linkedin', $social_media_choose_menu)) { ?>
              <a href="<?php the_field('link_linkedin'); ?>" target="_blank">
                <i class="fa fa-linkedin"></i>
              </a>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
      </div>
    </nav>
<?php } ?>
<?php if ( is_blog() || is_category() || is_search() || is_page() && !is_home() && !is_front_page() ) { ?>
    <nav class="navbar fixed-top navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
          <img src="<?php bloginfo('template_url'); ?>/assets/imgs/logo-black.png" width="200" alt="<?php echo get_bloginfo( 'name' ) . ' - '. get_bloginfo( 'description' ); ?>" id="test">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <?php
            wp_nav_menu( array(
              'menu'              => 'menu-paginas',
              'theme_location'    => 'menu-paginas',
              'depth'             => 2,
              'container'         => 'ul',
              'menu_class'        => 'navbar-nav ml-auto',
              'fallback_cb'       => 'wp_page_menu'
            ) );
          ?>
          <?php 
          $theme_options_code = "97";
          $social_media_menu = get_field('social_media_menu', $theme_options_code);
          $social_media_choose_menu = get_field('social_media_choose_menu', $theme_options_code);
          if($social_media_menu == true){ 
          ?>
          <div class="social-part">
            <?php if($social_media_choose_menu && in_array('Facebook', $social_media_choose_menu)) { ?>
            <a href="<?php the_field('link_facebook', $theme_options_code); ?>" target="_blank">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <?php } ?>
            <?php if($social_media_choose_menu && in_array('Instagram', $social_media_choose_menu)) { ?>
            <a href="<?php the_field('link_instagram', $theme_options_code); ?>" target="_blank">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
            <?php } ?>
            <?php if($social_media_choose_menu && in_array('Youtube', $social_media_choose_menu)) { ?>
              <a href="<?php the_field('link_youtube', $theme_options_code); ?>" target="_blank">
                <i class="fa fa-youtube"></i>
              </a>
            <?php } ?>
            <?php if($social_media_choose_menu && in_array('Twitter', $social_media_choose_menu)) { ?>
              <a href="<?php the_field('link_twitter', $theme_options_code); ?>" target="_blank">
                <i class="fa fa-twitter"></i>
              </a>
            <?php } ?>
            <?php if($social_media_choose_menu && in_array('Linkedin', $social_media_choose_menu)) { ?>
              <a href="<?php the_field('link_linkedin', $theme_options_code); ?>" target="_blank">
                <i class="fa fa-linkedin"></i>
              </a>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
      </div>
    </nav>
<?php } ?>
<?php if ( is_home() && !is_front_page() ) { ?>
    <nav class="navbar fixed-top navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
          <img src="<?php bloginfo('template_url'); ?>/assets/imgs/logo-black.png" width="200" alt="<?php echo get_bloginfo( 'name' ) . ' - '. get_bloginfo( 'description' ); ?>" id="test">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <?php
            wp_nav_menu( array(
              'menu'              => 'menu-paginas',
              'theme_location'    => 'menu-paginas',
              'depth'             => 2,
              'container'         => 'ul',
              'menu_class'        => 'navbar-nav ml-auto',
              'fallback_cb'       => 'wp_page_menu'
            ) );
          ?>
          <?php 
          $theme_options_code = "97";
          $social_media_menu = get_field('social_media_menu', $theme_options_code);
          $social_media_choose_menu = get_field('social_media_choose_menu', $theme_options_code);
          if($social_media_menu == true){ 
          ?>
          <div class="social-part">
            <?php if($social_media_choose_menu && in_array('Facebook', $social_media_choose_menu)) { ?>
            <a href="<?php the_field('link_facebook', $theme_options_code); ?>" target="_blank">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <?php } ?>
            <?php if($social_media_choose_menu && in_array('Instagram', $social_media_choose_menu)) { ?>
            <a href="<?php the_field('link_instagram', $theme_options_code); ?>" target="_blank">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
            <?php } ?>
            <?php if($social_media_choose_menu && in_array('Youtube', $social_media_choose_menu)) { ?>
              <a href="<?php the_field('link_youtube', $theme_options_code); ?>" target="_blank">
                <i class="fa fa-youtube"></i>
              </a>
            <?php } ?>
            <?php if($social_media_choose_menu && in_array('Twitter', $social_media_choose_menu)) { ?>
              <a href="<?php the_field('link_twitter', $theme_options_code); ?>" target="_blank">
                <i class="fa fa-twitter"></i>
              </a>
            <?php } ?>
            <?php if($social_media_choose_menu && in_array('Linkedin', $social_media_choose_menu)) { ?>
              <a href="<?php the_field('link_linkedin', $theme_options_code); ?>" target="_blank">
                <i class="fa fa-linkedin"></i>
              </a>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
      </div>
    </nav>
<?php } ?>