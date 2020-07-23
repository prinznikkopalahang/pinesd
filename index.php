<?php
  get_header();
  $meta = get_post_custom();

?>
<div id="pinesd" class="content-area">
    <main id="main" class="pinesd-main" role="main">
      <section class="banner" style="background: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>')">
        <div class="headline">
          <div class="container">
            <?php
              if (isset($meta['headline'][0])) {
                echo '<h1>'. $meta['headline'][0] .'</h1>';
              }
            ?>
          </div>
        </div>
      </section>
      <?php if (isset($meta['intro'][0])): ?>
        <section class="intro">
          <div class="container">
            <div class="col label">
              <span>Intro</span>
              <span class="hr"></span>
            </div>
            <div class="col content">
              <?php echo $meta['intro'][0];?>
            </div>
            <div class="col"></div>
          </div>
        </section>
      <?php endif; ?>
      <?php if (isset($meta['idea'][0])): ?>
        <section class="intro idea">
          <div class="container">
            <div class="col label">
              <span>Idea</span>
              <span class="hr"></span>
            </div>
            <div class="col content">
              <p class="copy big"><b><?php echo $meta['idea'][0];?></b></p>
            </div>
            <div class="col"></div>
          </div>
        </section>
      <?php endif; ?>
      <?php if (isset($meta['dictionary'][0])): ?>
        <section class="dictionary">
          <div class="container">
            <div class="term"><span><?php echo $meta['dictionary'][0];?></span></div>
          </div>
        </section>
      <?php endif; ?>
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
          <span class="approach-diagram pine-difference"></span>
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
      <?php if (isset($meta['pine-process'][0])): ?>
        <section class="pine-process">
          <div class="container">
            <h3>
              <?php
                if (isset($meta['pine-process'][0])) {
                  echo $meta['pine-process'][0];
                }
              ?>
            </h3>
            <div class="steps">
              <div class="step active in">
                  <h4>
                    <?php
                      if (isset($meta['process-1-headline'][0])) {
                        echo $meta['process-1-headline'][0];
                      }
                    ?>
                  </h4>
                  <p>
                    <?php
                      if (isset($meta['process-1-desc'][0])) {
                        echo $meta['process-1-desc'][0];
                      }
                    ?>
                  </p>
                  <hr>
                  <div class="details">
                    <?php
                      if (isset($meta['process-1-steps'][0])) {
                        echo $meta['process-1-steps'][0];
                      }
                    ?>
                  </div>
              </div>
              <div class="step">
                  <h4>
                    <?php
                      if (isset($meta['process-2-headline'][0])) {
                        echo $meta['process-2-headline'][0];
                      }
                    ?>
                  </h4>
                  <p>
                    <?php
                      if (isset($meta['process-2-desc'][0])) {
                        echo $meta['process-2-desc'][0];
                      }
                    ?>
                  </p>
                  <hr>
                  <div class="details">
                    <?php
                      if (isset($meta['process-2-steps'][0])) {
                        echo $meta['process-2-steps'][0];
                      }
                    ?>
                  </div>
              </div>
              <div class="step recur">
                  <h4>
                    <?php
                      if (isset($meta['process-3-headline'][0])) {
                        echo $meta['process-3-headline'][0];
                      }
                    ?>
                  </h4>
                  <p>
                    <?php
                      if (isset($meta['process-3-desc'][0])) {
                        echo $meta['process-3-desc'][0];
                      }
                    ?>
                  </p>
                  <hr>
                  <div class="details recur">
                    <?php
                      if (isset($meta['process-3-steps'][0])) {
                        echo $meta['process-3-steps'][0];
                      }
                    ?>
                  </div>
              </div>
              <div class="step recur">
                  <h4>
                    <?php
                      if (isset($meta['process-4-headline'][0])) {
                        echo $meta['process-4-headline'][0];
                      }
                    ?>
                  </h4>
                  <p>
                    <?php
                      if (isset($meta['process-4-desc'][0])) {
                        echo $meta['process-4-desc'][0];
                      }
                    ?>
                  </p>
                  <hr>
                  <div class="details recur">
                    <?php
                      if (isset($meta['process-4-steps'][0])) {
                        echo $meta['process-4-steps'][0];
                      }
                    ?>
                  </div>
              </div>
            </div>
          </div>
        </section>
        <section class="copyright">
          <div class="container">
            <?php
              if (isset($meta['photo'][0])) {
                echo $meta['photo'][0];
              }
            ?>
          </div>
        </div>
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
