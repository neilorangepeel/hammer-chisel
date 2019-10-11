<?php get_header(); ?>

  <?php
      $wp_query = new WP_Query();
      $wp_query->query('category_name='.blog.'&paged='.$paged);
  ?>

  <?php 
      if ( $wp_query->have_posts() ) : 
      while ( $wp_query->have_posts() ) : 
      $wp_query->the_post(); 
  ?>

  <article <?php post_class(); ?>>
    <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(); ?></time>
    <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <?php the_excerpt(); ?>
  </article>

  <?php endwhile; ?>

  <?php wp_reset_postdata(); ?>

  <?php else: endif; ?>

  <p class="alignleft"><b><?php previous_posts_link('&laquo; Newer') ?></p><p class="alignright"><?php next_posts_link('Older &raquo;') ?></b></p>

<?php get_footer(); ?>