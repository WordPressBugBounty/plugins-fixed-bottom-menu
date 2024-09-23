<?php
/**
 * Fixed Bottom Menu Template File Old
 *
 * @package WordPress
 * @subpackage Fixed Bottom Menu
 * @since Fixed Bottom Menu 2.00
 * @version 1.02
 */

?>

.<?php echo esc_html( $text_class ); ?> {
  font-size: <?php echo esc_attr( $fontsize ); ?>;
}
ul.fixed-bottom-menu {
  background-color: <?php echo esc_attr( $backcolor ); ?>;
  height: <?php echo esc_attr( $height ); ?>;
  z-index: <?php echo esc_attr( $zindex ); ?>;
}
ul.fixed-bottom-menu li {
  width: <?php echo esc_attr( 100 / $columns ); ?>%;
}
.fixed-bottom-menu li a {
  color: <?php echo esc_attr( $color ); ?>;
  padding-top: <?php echo esc_attr( $padding_top_a ); ?>;
  line-height: <?php echo esc_attr( $height_a ); ?>;
}
.fixed-bottom-menu li a:hover {
  color: <?php echo esc_attr( $overcolor ); ?>;
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
