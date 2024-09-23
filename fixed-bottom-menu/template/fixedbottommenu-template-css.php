<?php
/**
 * Fixed Bottom Menu Template CSS File
 *
 * @package WordPress
 * @subpackage Fixed Bottom Menu
 * @since Fixed Bottom Menu 2.00
 * @version 1.02
 */

?>

#fixed-bottom-menu {
  line-height: <?php echo esc_attr( $height ); ?>;
  z-index: <?php echo esc_attr( $zindex ); ?>;
}
.<?php echo esc_html( $text_class ); ?> {
  font-size: <?php echo esc_attr( $fontsize ); ?>;
}
.fixed-bottom-menu-container {
  background-color: <?php echo esc_attr( $backcolor ); ?>;
}
.fixed-bottom-menu-item {
  -webkit-flex-basis: <?php echo esc_attr( 100 / $columns ); ?>%;
  -ms-flex-preferred-size: <?php echo esc_attr( 100 / $columns ); ?>%;
  flex-basis: <?php echo esc_attr( 100 / $columns ); ?>%;
}
.fixed-bottom-menu-item a {
  color: <?php echo esc_attr( $color ); ?>;
  padding-top: <?php echo esc_attr( $padding_top_a ); ?>;
  line-height: <?php echo esc_attr( $height_a ); ?>;
}
.fixed-bottom-menu-item a:hover {
  color: <?php echo esc_attr( $overcolor ); ?>;
}
@media( min-width: <?php echo esc_attr( $minwidth ); ?>px ) {
  #fixed-bottom-menu {
	display: none;
  }
}
<?php if ( ! empty( $footer_class ) ) : ?>
	.<?php echo esc_attr( $footer_class ); ?> {
	  margin-bottom: <?php echo esc_attr( $height ); ?>;
	}
<?php endif; ?>
<?php if ( $hide ) : ?>
	.#fixed-bottom-menu {
	  display: none !important;
	}
<?php endif; ?>
