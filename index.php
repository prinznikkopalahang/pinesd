<?php get_header(); ?>
<div id="pinesd" class="content-area">
    <main id="main" class="aloi-main" role="main">

        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
          <section>
              <div class="container">
                <!-- article -->
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                  <?php the_content(); ?>

                  <?php edit_post_link(); ?>

                </div>
                <!-- /article -->
              </div>
          </section>
        <?php endwhile; ?>

        <?php else: ?>


        <?php get_template_part('partials/404');?>


        <?php endif; ?>
    </main>
</div>
<?php get_footer(); ?>
