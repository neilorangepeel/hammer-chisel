<?php get_header(); ?>

	<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

	<?php if (is_category()) { ?>
	<h1 class="archive-page-title"><?php single_cat_title(); ?></h1>

	<?php } elseif( is_tag() ) { ?>
	<h1 class="archive-page-title">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>

	<?php } elseif (is_day()) { ?>
	<h1 class="archive-page-title">Archive for <?php the_time('F jS, Y'); ?></h1>

	<?php } elseif (is_month()) { ?>
	<h1 class="archive-page-title">Archive for <?php the_time('F, Y'); ?></h1>

	<?php } elseif (is_year()) { ?>
	<h1 class="archive-page-title">Archive for <?php the_time('Y'); ?></h1>

	<?php } elseif (is_author()) { ?>
	<h1 class="archive-page-title">Author Archive</h1>

	<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h1 class="archive-page-title">Blog Archives</h1>

	<?php } ?>

	<?php while (have_posts()) : the_post(); ?>
			
		<article <?php post_class('archives-post group') ?>>
			<a href="<?php the_permalink() ?>">
				<h2 class="h3"><?php the_title(); ?></h2>
				<?php the_post_thumbnail('thumbnail', array('class' => 'featIMG')); ?>
			</a>
		</article>

			<?php endwhile; ?>

		<p class="alignleft"><b><?php previous_posts_link('&laquo; Newer') ?></p><p class="alignright"><?php next_posts_link('Older &raquo;') ?></b></p>			
	
	<?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>

<?php get_footer(); ?>