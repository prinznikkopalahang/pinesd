<?php
  get_header();
  //$meta = get_post_custom();
  //print("<pre>".print_r(,true)."</pre>");
?>
<div id="pinesd" class="content-area">
    <main id="main" class="pinesd-main single" role="main">
      <section class="banner work" style="background: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>')">
        <div class="overlay"></div>
        <div class="headline">
          <div class="container">
            <div class="breadcrumbs">
              <span class="parent"><a href="<?php echo get_site_url() . '/pine-sense'; ?>">RECENT POSTS</a></span>
            </div>
            <h1><?php echo the_title();?></h1>
          </div>
        </div>
      </section>
        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
          <section class="post-wrapper">
              <div class="container">
                <!-- article -->
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                  <span class="author">Posted <?php the_date(); ?> by <b><?php the_author(); ?></b></div>
                  <?php the_content();?>
                  <?php edit_post_link(); ?>
                  <div class="tags">
                    <div class="list">
                      <h4>TAGS</h4>
                      <?php
                        $posttags = get_the_tags();
                        if ($posttags) {
                          foreach($posttags as $tag) {
                            echo '<span class="tag"> <a href="' . get_tag_link($tag->term_id) . '">'. $tag->name . '</a></span>';
                          }
                        }
                        ?>
                    </div>
                    <div class="social-share">
                      <h4>SHARE</h4>
                      <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>" target="_blank" class="social-icon">
                          <i class="fa fa-linkedin"></i>
                      </a>
                      <a href="https://twitter.com/share?url=<?php the_permalink();?>&amp;text=<?php the_title();?>" target="_blank" class="social-icon">
                         <i class="fa fa-twitter"></i>
                     </a>
                    </div>
                  </div>
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
