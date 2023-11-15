    <!-- Start Footer -->
    <footer class="bg-dark text-light text">
      <div class="container">
        <div class="row mb-3">
          <!-- Start Footer Menu -->
          <div class="col-md-4 mb-md-3 text-center">
            <?php
            if (has_nav_menu('footer_menu_location_left')) :
              wp_nav_menu(array(
                'theme_location' => 'footer_menu_location_left',
                'menu_class' => 'small mb-3 mb-md-0',
                'depth' => '1',
              ));
            endif;
            ?>
          </div>
          <!-- End Footer Menu -->
          <!-- Start Footer Menu -->
          <div class="col-md-4 mb-md-3 text-center">
            <?php
            if (has_nav_menu('footer_menu_location_middle')) :
              wp_nav_menu(array(
                'theme_location' => 'footer_menu_location_middle',
                'menu_class' => 'small mb-3 mb-md-0',
                'depth' => '1',
              ));
            endif;
            ?>
          </div>
          <!-- End Footer Menu -->
          <!-- Start Footer Menu -->
          <div class="col-md-4 mb-md-3 text-center">
            <div class="col-md-4 mb-md-3 text-center">
              <?php
              if (has_nav_menu('footer_menu_location_right')) :
                wp_nav_menu(array(
                  'theme_location' => 'footer_menu_location_right',
                  'menu_class' => 'small mb-3 mb-md-0',
                  'depth' => '1',
                ));
              endif;
              ?>
            </div>
            <!-- footer_menu_location_right -->
          </div>
          <!-- End Footer Menu -->
        </div>
        <div class="fun-copyright small text-center">
          &copy; 2023 - <?php bloginfo('title'); ?>
        </div>
      </div>
    </footer>
    <!-- End Footer -->

    <?php wp_footer(); ?>
    </body>

    </html>