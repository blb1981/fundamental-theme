<?php get_header(); ?>
<?php if (have_posts()): while(have_posts()): the_post(); ?>
    
<!-- Start 2 Columns -->
    <main class="container mb-3">
      <div class="row">
        <!-- Start Main Column -->
        <div class="col-lg-8 mb-3 mb-lg-0">
          <!-- Start Page Content -->
          <div class="fun-snippet mb-3 mb-lg-4">
            <div class="mb-4">
              <h1><?php the_title(); ?></h1>
            </div>
            <?php get_template_part('includes/section', 'breadcrumbs'); ?>
              
              <div class="row mb-4">
                <?php the_content(); ?>
              </div>
              
            
          </div>
          <!-- End Page Content -->
        </div>
        <!-- End Main Column -->

        <!-- Sidebar -->
        <?php get_template_part('includes/section', 'sidebar'); ?>
        <!-- Sidebar -->
      </div>
    </main>
    <!-- End 2 Columns -->


<?php endwhile; endif; ?>
<?php get_footer(); ?>