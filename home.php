<?php /* Template Name: Home Page Template */ ?>
<?php
  get_header();
  $meta = get_post_custom();
  global $post;
  $args = array( 'numberposts' => 1, 'category_name' => 'featured' );
  $posts = get_posts( $args );
  $labs = array( 'post_type' => 'labs', 'tax_query' => array(
        array (
            'taxonomy' => 'lab_category',
            'field' => 'slug',
            'terms' => 'featured',
        )
    ));
  $labPosts = new WP_Query( $labs );
  $lab = $labPosts->posts[0];
  //print("<pre>".print_r($lab,true)."</pre>");
?>
<div id="pinesd" class="content-area">
    <main id="main" class="pinesd-main" role="main">
      <section class="banner home">
        <div class="headline">
          <div class="container">
            <?php
              if (isset($meta['headline'][0])) {
                echo '<h1>'. $meta['headline'][0] .'</h1>';
              }
            ?>
          </div>
        </div>
        <div class="overlay"></div>
        <video id="videoBG" autoplay muted loop>
            <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/1038801227-4k.mp4" type="video/mp4">
        </video>
      </section>
      <section class="intro">
        <div class="container">
          <div class="col label">
            <span>Intro</span>
            <span class="hr"></span>
          </div>
          <div class="col content">
            <?php
              if (isset($meta['intro'][0])) {
                echo $meta['intro'][0];
              }
            ?>
          </div>
          <div class="col"></div>
        </div>
      </section>
      <section class="content highlight" id="pinContainer">
        <div class="container">
          <h3>WE'LL FIND YOUR OPPORTUNITY</h3>
          <div class="slides">
            <div class="wrapper" id="slideContainer">
              <?php
                if (isset($meta['opportunity'][0])) {
                  echo $meta['opportunity'][0];
                }
              ?>
            </div>
          </div>
        </div>
      </section>
      <section class="content clients">
        <div class="overlay"></div>
        <div class="container">
          <span class="logo dsw"></span>
          <span class="logo intel"></span>
          <span class="logo mahindra"></span>
          <span class="logo mars-wrigley"></span>
          <span class="logo scjohnson"></span>
          <span class="logo tyson"></span>
          <span class="logo zipline"></span>
        </div>
      </section>
      <section class="content approach">
        <div class="container">
          <h3>
            <?php
              if (isset($meta['approach-headline'][0])) {
                echo $meta['approach-headline'][0];
              }
            ?>
          </h3>
          <p>
            <?php
              if (isset($meta['approach-description'][0])) {
                echo $meta['approach-description'][0];
              }
            ?>
          </p>
          <span class="approach-diagram"></span>
          <div class="items">
            <div class="item">
              <h4>
                <?php
                  if (isset($meta['approach-item-1-headline'][0])) {
                    echo $meta['approach-item-1-headline'][0];
                  }
                ?>
              </h4>
              <p>
                <?php
                  if (isset($meta['approach-item-1-desc'][0])) {
                    echo $meta['approach-item-1-desc'][0];
                  }
                ?>
              </p>
            </div>
            <div class="item">
              <h4>
                <?php
                  if (isset($meta['approach-item-2-headline'][0])) {
                    echo $meta['approach-item-2-headline'][0];
                  }
                ?>
              </h4>
              <p>
                <?php
                  if (isset($meta['approach-item-2-desc'][0])) {
                    echo $meta['approach-item-2-desc'][0];
                  }
                ?>
              </p>
            </div>
            <div class="item">
              <h4>
                <?php
                  if (isset($meta['approach-item-3-headline'][0])) {
                    echo $meta['approach-item-3-headline'][0];
                  }
                ?>
              </h4>
              <p>
                <?php
                  if (isset($meta['approach-item-3-desc'][0])) {
                    echo $meta['approach-item-3-desc'][0];
                  }
                ?>
              </p>
            </div>
          </div>
        </div>
      </section>
      <?php if(count($posts) >  0): ?>
        <section class="intro pine-sense">
          <div class="container">
            <div class="col label">
              <span>Pine Sense</span>
              <span class="hr"></span>
            </div>
            <div class="col content">
              <div class="post" style="background: url('<?php echo get_the_post_thumbnail_url($posts[0]->ID); ?>')">
                <span class="title"><?php echo $posts[0]->post_title;?></span>
              </div>
              <a href="<?php echo $posts[0]->guid; ?>" class="btn pinesd-btn-primary right">
                <span>Learn With Us</span>
                <span class="background"></span>
              </a>
            </div>
            <div class="col"></div>
          </div>
        </section>
        <?php endif; ?>
        <?php if(count($labPosts->posts) >  0): ?>
          <section class="intro pine-labs">
            <div class="container">
              <div class="col label">
                <span>Pine labs</span>
                <span class="hr"></span>
              </div>
              <div class="col content">
                <h2><?php echo $lab->post_title; ?></h2>
                <p><?php echo $lab->post_excerpt; ?></p>
                <a href="<?php echo $lab->guid; ?>" class="btn pinesd-btn-primary right">
                  <span>Explore Pine Labs</span>
                  <span class="background"></span>
                </a>
              </div>
              <div class="col"></div>
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
