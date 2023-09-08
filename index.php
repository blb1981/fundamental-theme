<?php get_header(); ?>
    <!-- Start 2 Columns -->
    <main class="container mb-3">

      <div class="row">
        <!-- Start Main Column -->
        <div class="col-lg-8 mb-3 mb-lg-0">
          <?php if (have_posts()): while(have_posts()): the_post(); ?>
          
          <!-- Start Post Snippet -->
          <div class="fun-snippet card mb-3 mb-lg-4">
            <div class="card-body">
              <div class="card-title mb-3">
                <h2>
                  <a href="<?php the_permalink(); ?>"
                    ><?php the_title(); ?></a
                  >
                </h2>
              </div>
              <div class="row mb-3">
                <?php if (has_post_thumbnail()): ?>
                <div class="col-md-5">
                  <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('large', array(
                    'class' => 'img-fluid pb-3'
                  )); ?>
                  </a>
                </div>
                <?php endif; ?>
                <div class="<?php echo has_post_thumbnail() ? 'col-md-7' : 'col' ?>">
                    <?php the_excerpt(); ?>
                  <p><a href="<?php the_permalink(); ?>">Read more...</a></p>
                </div>
              </div>
              <div class="d-flex justify-content-between flex-wrap">
                <div>By <?php the_author_posts_link(); ?></div>
                <div><?php the_time('M n, Y'); ?></div>
              </div>
            </div>
          </div>
          <!-- End Post Snippet -->
          <?php endwhile; endif; ?>
          <?php echo paginate_links(); ?>
        </div>
        <!-- End Main Column -->

        <!-- Sidebar -->
        <?php get_template_part('includes/section', 'sidebar'); ?>
        <!-- Sidebar -->
      </div>
    </main>
    <!-- End 2 Columns -->
<?php get_footer(); ?>