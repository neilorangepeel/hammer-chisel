<?php global $tt_options;
  $tt_settings = get_option( 'tt_options', $tt_options ); 
?>

<section class="social-icons">
  <?php if( $tt_settings['twitter_url'] != '' ) : ?>
  <a href="<?php echo $tt_settings['twitter_url']; ?>" title="Twitter"><i aria-hidden="true" data-icon="t"></i><span>Twitter</span></a>
  <?php endif; ?>

  <?php if( $tt_settings['facebook_url'] != '' ) : ?>
  <a href="<?php echo $tt_settings['facebook_url']; ?>" title="Facebook"><i aria-hidden="true" data-icon="f"></i><span>Facebook</span></a>
  <?php endif; ?>

  <?php if( $tt_settings['google_url'] != '' ) : ?>
  <a href="<?php echo $tt_settings['google_url']; ?>" title="Google+"><i aria-hidden="true" data-icon="g"></i><span>Google+</span></a>
  <?php endif; ?>

  <?php if( $tt_settings['vimeo_url'] != '' ) : ?>
  <a href="<?php echo $tt_settings['vimeo_url']; ?>" title="Vimeo"><i aria-hidden="true" data-icon="v"></i><span>Vimeo</span></a>
  <?php endif; ?>

  <?php if( $tt_settings['youtube_url'] != '' ) : ?>
  <a href="<?php echo $tt_settings['youtube_url']; ?>" title="YouTube"><i aria-hidden="true" data-icon="y"></i><span>YouTube</span></a>
  <?php endif; ?>

  <?php if( $tt_settings['instagram_url'] != '' ) : ?>
  <a href="<?php echo $tt_settings['instagram_url']; ?>" title="Instagram"><i aria-hidden="true" data-icon="i"></i><span>Instagram</span></a>
  <?php endif; ?>

  <?php if( $tt_settings['flickr_url'] != '' ) : ?>
  <a href="<?php echo $tt_settings['flickr_url']; ?>" title="Flickr"><i aria-hidden="true" data-icon="r"></i><span>Flickr</span></a>
  <?php endif; ?>

  <?php if( $tt_settings['dribbble_url'] != '' ) : ?>
  <a href="<?php echo $tt_settings['dribbble_url']; ?>" title="Dribbble"><i aria-hidden="true" data-icon="d"></i><span>Dribbble</span></a>
  <?php endif; ?>

  <?php if( $tt_settings['pinterest_url'] != '' ) : ?>
  <a href="<?php echo $tt_settings['pinterest_url']; ?>" title="Pinterest"><i aria-hidden="true" data-icon="p"></i><span>Pinterest</span></a>
  <?php endif; ?>

  <?php if( $tt_settings['github_url'] != '' ) : ?>
  <a href="<?php echo $tt_settings['github_url']; ?>" title="GitHub"><i aria-hidden="true" data-icon="h"></i><span>GitHub</span></a>
  <?php endif; ?>

  <?php if( $tt_settings['linkedin_url'] != '' ) : ?>
  <a href="<?php echo $tt_settings['linkedin_url']; ?>" title="LinkedIN"><i aria-hidden="true" data-icon="l"></i><span>LinkedIN</span></a>
  <?php endif; ?>
</section>