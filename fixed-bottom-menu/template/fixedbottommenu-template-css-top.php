<?php
/**
 * Fixed Bottom Menu Template CSS File Top
 *
 * @package WordPress
 * @subpackage Fixed Bottom Menu
 * @since Fixed Bottom Menu 2.00
 * @version 1.00
 */

?>

#fixed-top-menu {
  line-height: <?php echo esc_attr( $height ); ?>;
  z-index: <?php echo esc_attr( $zindex ); ?>;
}
.<?php echo esc_html( $text_class ); ?> {
  font-size: <?php echo esc_attr( $fontsize ); ?>;
}
.fixed-top-menu-container {
  background-color: <?php echo esc_attr( $backcolor ); ?>;
}
.fixed-top-menu-item {
  -webkit-flex-basis: <?php echo esc_attr( 100 / $columns ); ?>%;
  -ms-flex-preferred-size: <?php echo esc_attr( 100 / $columns ); ?>%;
  flex-basis: <?php echo esc_attr( 100 / $columns ); ?>%;
}
.fixed-top-menu-item a {
  color: <?php echo esc_attr( $color ); ?>;
  padding-top: <?php echo esc_attr( $padding_top_a ); ?>;
  line-height: <?php echo esc_attr( $height_a ); ?>;
}
.fixed-top-menu-item a:hover {
  color: <?php echo esc_attr( $overcolor ); ?>;
}
@media( min-width: <?php echo esc_attr( $minwidth ); ?>px ) {
  #fixed-top-menu {
	display: none;
  }
}
<?php if ( ! empty( $footer_class ) ) : ?>
	.<?php echo esc_attr( $footer_class ); ?> {
	  margin-top: <?php echo esc_attr( $height ); ?> !important;
	}
<?php endif; ?>
<?php if ( $hide ) : ?>
	.#fixed-top-menu {
	  display: none !important;
	}
<?php endif; ?>
