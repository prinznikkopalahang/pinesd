<?php
  get_header();
  //$meta = get_post_custom();
  //print("<pre>".print_r(,true)."</pre>");
?>
<div id="pinesd" class="content-area">
    <main id="main" class="pinesd-main tag" role="main">
      <section class="banner work" style="background: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>')">
        <div class="overlay"></div>
        <div class="headline">
          <div class="container">
            <div class="breadcrumbs">
              <span class="parent"><a>TAGS</a></span>
            </div>
            <h1><?php echo single_tag_title();?></h1>
          </div>
        </div>
      </section>
      <section class="pinesd-posts">
        <div class="container">
          <div class="section-header">
            <div class="title">
              <h3>Tags</h3>
            </div>
            <div class="search">
              <div class="wrapper">
                <input type="text" id="search-term" placeholder="search">
                <button class="btn search-btn" id="search">
                  <i class="fa fa-search"></i>
                </button>
              </div>
              <div class="results">
              </div>
            </div>
          </div>
          <div class="posts">
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
              <div class="post">
                <div class="featured-image" style="background: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>')"></div>
                <div class="content">
                  <div class="copy">

                    <h4><?php the_title();?></h4>
                    <div class="info">
                      <span class="date"><?php the_date();?></span>
                    </div>
                    <?php
                      $content = substr(get_the_content(), 0, 205);
                    ?>
                    <p><?php echo $content;?> ...</p>
                  </div>
                  <div class="actions">
                    <a href="<?php the_guid(); ?>" class="btn read-more pinesd-btn-primary">
                      <span>READ</span>
                      <span class="background"></span>
                    </a>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>

            <?php else: ?>


              <?php get_template_part('partials/404');?>


            <?php endif; ?>
          </div>
          <div class="pagination">

          </div>
        </div>
      </section>
    </main>
</div>
<?php get_footer(); ?>
