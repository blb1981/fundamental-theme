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
            <div class="mb-3">
              <?php if (has_post_thumbnail()): the_post_thumbnail('large', array('class' => 'img-fluid')); endif; ?>
            </div>
            <div class="d-flex justify-content-between flex-wrap mb-3">
              <div>By <?php the_author_posts_link(); ?></div>
              <div><?php the_time('M n, Y'); ?></div>
            </div>
            <hr />
            <div class="row mb-3"><?php the_content(); ?></div>

            <div class="d-flex justify-content-between flex-wrap">
                <div>
                  Listed in:
                  <!-- <a href="#">Planes For Sale</a> -->
                  <?php echo get_the_category_list(', ') ?>
                </div>
                <div>
                  <?php if (has_tag()):  ?>
                    <?php the_tags(); ?>
                  <?php endif; ?>
                </div>
              </div>
              <hr>
          </div>
          <!-- End Page Content -->

          <div>
            <?php 
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;
            ?>
          </div>
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