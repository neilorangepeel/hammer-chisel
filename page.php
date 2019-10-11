<?php get_header(); the_post(); ?>
<?php include (TEMPLATEPATH . '/_/parts/custom-page-styles.php' ); ?>

  <article <?php post_class('article-page group'); ?>>
    <h1 class="post-title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <p><?php the_tags(); ?></p>
  </article>

<?php get_footer(); ?>