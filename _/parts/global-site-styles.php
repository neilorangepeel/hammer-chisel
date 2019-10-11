<?php global $tt_options;
  $tt_settings = get_option( 'tt_options', $tt_options ); 
?>

<style>
<?php if( $tt_settings['background-image'] != '' ) : ?>
  body { background-image: url('<?php echo $tt_settings['background-image']; ?>');}
<?php endif; ?>
<?php if( $tt_settings['background-color'] != '' ) : ?>
  .wrapper { background-color:<?php echo $tt_settings['background-color']; ?>;}
<?php endif; ?>
<?php if( $tt_settings['link-color'] != '' ) : ?>
  a:hover, a:focus, .main-nav ul li.current-menu-item a { color:<?php echo $tt_settings['link-color']; ?>;}
<?php endif; ?>
</style>