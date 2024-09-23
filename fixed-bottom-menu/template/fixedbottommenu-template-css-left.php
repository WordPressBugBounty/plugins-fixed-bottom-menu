<?php
/**
 * Fixed Bottom Menu Template File Left
 *
 * @package WordPress
 * @subpackage Fixed Bottom Menu
 * @since Fixed Bottom Menu 2.00
 * @version 1.00
 */

?>
#fixed-left-menu {
  line-height: <?php echo esc_attr( $height ); ?>;
  z-index: <?php echo esc_attr( $zindex ); ?>;
}
.<?php echo esc_html( $text_class ); ?> {
  font-size: <?php echo esc_attr( $fontsize ); ?>;
}
.fixed-left-menu-container {
  background-color: <?php echo esc_attr( $backcolor ); ?>;
}
.fixed-left-menu-item {
  -webkit-flex-basis: <?php echo esc_attr( $fontsize_num * 4 ); ?><?php echo esc_attr( $fontsize_unit ); ?>;
  -ms-flex-preferred-size: <?php echo esc_attr( $fontsize_num * 4 ); ?><?php echo esc_attr( $fontsize_unit ); ?>;
  flex-basis: <?php echo esc_attr( $fontsize_num * 4 ); ?><?php echo esc_attr( $fontsize_unit ); ?>;
}
.fixed-left-menu-item a {
  color: <?php echo esc_attr( $color ); ?>;
  padding: <?php echo esc_attr( $padding_top_a ); ?>;
  line-height: <?php echo esc_attr( $height_a ); ?>;
}
.fixed-left-menu-item a:hover {
  color: <?php echo esc_attr( $overcolor ); ?>;
}
<?php if ( $hide ) : ?>
	.#fixed-left-menu {
	  display: none !important;
	}
<?php endif; ?>
