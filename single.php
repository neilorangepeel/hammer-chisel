<?php get_header(); the_post();?>
<?php include (TEMPLATEPATH . '/_/parts/custom-page-styles.php' ); ?>

  <article <?php post_class('article-post group'); ?>>
    <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(); ?></time>
    <h1 class="post-title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <p><?php the_tags(); ?></p>
  </article>

  <?php comments_template(); ?>

<?php get_footer(); ?>