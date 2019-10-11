<style>
<?php if ( get_post_meta(get_the_ID(), 'background_image', true) ) : ?>
  body {background-image:url('<?php echo get_post_meta($post->ID, 'background_image', true); ?>');}
<?php endif; ?>
<?php if ( get_post_meta(get_the_ID(), 'background_color', true) ) : ?>
  .wrapper { background:<?php echo get_post_meta($post->ID, 'background_color', true); ?>;}
<?php endif; ?>
<?php if ( get_post_meta(get_the_ID(), 'link_color', true) ) : ?>
  a:hover, a:focus, .main-nav ul li.current-menu-item a { color:<?php echo get_post_meta($post->ID, 'link_color', true); ?>;}
<?php endif; ?>
</style>