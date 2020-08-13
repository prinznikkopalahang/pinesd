<?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $posts = new WP_Query(array(
      'post_type'=>'post', // your post type name
      'posts_per_page' => 6, // post per page
      'paged' => $paged,
  ));

?>


<section class="pinesd-posts">
  <div class="container">
    <div class="section-header">
      <div class="title">
        <h3>Recent Posts</h3>
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
      <?php while ($posts->have_posts()) : $posts->the_post(); ?>
        <div class="post">
          <div class="featured-image" style="background: url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>')"></div>
          <div class="content">
            <div class="copy">

              <h4><?php the_title();?></h4>
              <div class="info">
                <span class="date"><?php the_date();?></span>
              </div>
              <?php
                $content = substr(strip_tags(get_the_content()), 0, 205);
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
    </div>
    <div class="pagination">
    <?php

        $total_pages = $posts->max_num_pages;
        $current_page = max(1, get_query_var('paged'));
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => 'page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text'    => __('<i class="fa fa-chevron-left"></i>'),
            'next_text'    => __('<i class="fa fa-chevron-right"></i>'),
        ));

    ?>
</div>
  </div>
</section>
