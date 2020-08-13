<?php
  get_header();
  //$meta = get_post_custom();
  //print("<pre>".print_r(,true)."</pre>");
?>
<div id="pinesd" class="content-area">
    <main id="main" class="pinesd-main" role="main">
      <section class="banner work single" style="background: url('<?php echo get_post_meta( $post->ID, '_post_banner')[0]; ?>')">
        <div class="overlay"></div>
        <div class="headline">
          <div class="container">
            <div class="breadcrumbs">
              <span class="parent"><a href="<?php echo get_site_url() . '/work'; ?>">WORK</a></span> / <span class="parent"><a href="<?php echo get_the_permalink(); ?>"><?php echo the_title();?></a></span>
            </div>
            <?php echo '<h1>'. get_post_meta( $post->ID, '_post_headline_title')[0] .'</h1>';?>
          </div>
        </div>
      </section>
      <?php if (isset(get_post_meta( $post->ID, '_post_ask')[0])): ?>
      <section class="pine-process work">
        <div class="container">
          <div class="steps">
            <div class="step active in">
                <?php echo wpautop(get_post_meta( $post->ID, '_post_ask')[0], true); ?>
            </div>
            <div class="step">
                <?php echo wpautop(get_post_meta( $post->ID, '_post_engagement')[0], true); ?>
            </div>
            <div class="step">
              <?php echo wpautop(get_post_meta( $post->ID, '_post_outcome')[0], true); ?>
            </div>
            <div class="step">
                <?php echo wpautop(get_post_meta( $post->ID, '_post_services')[0], true); ?>
            </div>
          </div>
        </div>
      </section>
      <?php endif; ?>
      <section class="featured-work">
        <div class="container">
          <img src="<?php echo get_post_meta( $post->ID, '_post_gallery_1')[0];?>" alt="<?php echo get_post_meta( $post->ID, '_post_headline_title')[0];?>">
          <img src="<?php echo get_post_meta( $post->ID, '_post_gallery_2')[0];?>" alt="<?php echo get_post_meta( $post->ID, '_post_headline_title')[0];?>">
        </div>
      </section>

      <?php if (isset(get_post_meta( $post->ID, '_post_framework')[0])): ?>
        <section class="intro">
          <div class="container">
            <div class="col label">
              <span>Framework</span>
              <span class="hr"></span>
            </div>
            <div class="col content">
              <?php echo wpautop(get_post_meta( $post->ID, '_post_framework')[0], true);?>
            </div>
            <div class="col"></div>
          </div>
        </section>
        <?php endif; ?>
        <?php if (isset(get_post_meta( $post->ID, '_post_output')[0])): ?>
        <section class="intro idea">
          <div class="container">
            <div class="col label">
              <span>Output</span>
              <span class="hr"></span>
            </div>
            <div class="col content">
              <p class="copy big"><b><?php echo get_post_meta( $post->ID, '_post_output')[0];?></b></p>
            </div>
            <div class="col"></div>
          </div>
        </section>
        <?php endif; ?>

        <?php if (isset(get_post_meta( $post->ID, '_post_conclusion')[0])): ?>
        <section class="intro">
          <div class="container">
            <div class="col label">

            </div>
            <div class="col content">
              <?php echo wpautop(get_post_meta( $post->ID, '_post_conclusion')[0], true);?>
            </div>
            <div class="col"></div>
          </div>
        </section>
        <?php endif; ?>

        <?php if (isset(get_post_meta( $post->ID, '_post_photo_by')[0])): ?>
          <section class="copyright">
              <div class="container">
                <?php echo wpautop(get_post_meta( $post->ID, '_post_photo_by')[0], true); ?>
              </div>
            </div>
          </section>
        <?php endif; ?>
        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
          <section>
              <div class="container">
                <!-- article -->
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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
