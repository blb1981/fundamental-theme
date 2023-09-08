<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset') ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />    
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <!-- Start Mobile Menu -->
    <div id="funMobileNav" class="fun-overlay">
      <a href="javascript:void(0)" class="closebtn" id="mobileCloseIcon"
        ><i class="fa-solid fa-x"></i
      ></a>
      <div class="fun-overlay-content">
        <?php wp_nav_menu(array(
          'theme_location' => 'mobile_menu_location',
          'depth' => '1',
        )); ?>
      </div>
    </div>
    <!-- Start Mobile Menu -->

    <!-- Start Logo Section -->
    <div class="fun-logo-section d-flex justify-content-center py-3">
      <a href="<?php echo site_url(); ?>">
        <!-- <img src="https://picsum.photos/200/50" alt="Logo" /> -->
        <?php 
          $custom_logo_id = get_theme_mod('custom_logo');
          $logo = wp_get_attachment_image_src($custom_logo_id , 'full');
          if ( has_custom_logo() ) {
            echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo( 'name' ) . '">';
          } else {
            echo '<h1 class="site-title-logo display-5">' . get_bloginfo('name') . '</h1>';
          }
        ?>
      </a>
    </div>
    <!-- End Logo Section -->

    <!-- Start Header Navbar -->

    
    <nav class="fun-header-nav bg-primary mb-3 w-100">
      <div class="container-lg">
        <?php wp_nav_menu(array(
          'theme_location' => 'header_menu_location',
          'menu_class' => 'd-none d-lg-flex m-0 p-0 justify-content-between',
          'depth' => '2',
        )); ?>

        <!-- Mobile Toggle Icon -->
        <div
          class="fun-mobile-toggler d-flex justify-content-center align-items-center h-100 text-light d-lg-none"
        >
          <i class="fa-solid fa-bars px-3" id="mobileOpenIcon"></i>
        </div>
      </div>
    </nav>
    <!-- End Header Navbar -->