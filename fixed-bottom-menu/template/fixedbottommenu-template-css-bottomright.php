<?php
/**
 * Fixed Bottom Menu Template Bottom and Right CSS File
 *
 * @package WordPress
 * @subpackage Fixed Bottom Menu
 * @since Fixed Bottom Menu 2.00
 * @version 1.00
 */

?>

#fixed-bottomright-menu {
  line-height: <?php echo esc_attr( $height ); ?>;
  z-index: <?php echo esc_attr( $zindex ); ?>;
}
.<?php echo esc_html( $text_class ); ?> {
  font-size: <?php echo esc_attr( $fontsize ); ?>;
}
.fixed-bottomright-menu-container {
  background-color: <?php echo esc_attr( $backcolor ); ?>;
}
.fixed-bottomright-menu-item a {
  color: <?php echo esc_attr( $color ); ?>;
  line-height: <?php echo esc_attr( $height_a ); ?>;
}
.fixed-bottomright-menu-item a:hover {
  color: <?php echo esc_attr( $overcolor ); ?>;
}
@media( min-width: <?php echo esc_attr( $minwidth ); ?>px ) {
  #fixed-bottomright-menu {
	right: 2%;
	top: 50%;
	transform: translateX(-2%) translateY(-50%);
  }
  .fixed-bottomright-menu-container {
	border-radius: 5px;
	flex-flow: column;
  }
  .fixed-bottomright-menu-item {
	-webkit-flex-basis: <?php echo esc_attr( $fontsize_num * 4 ); ?><?php echo esc_attr( $fontsize_unit ); ?>;
	-ms-flex-preferred-size: <?php echo esc_attr( $fontsize_num * 4 ); ?><?php echo esc_attr( $fontsize_unit ); ?>;
	flex-basis: <?php echo esc_attr( $fontsize_num * 4 ); ?><?php echo esc_attr( $fontsize_unit ); ?>;
  }
  .fixed-bottomright-menu-item a {
	padding: <?php echo esc_attr( $padding_top_a ); ?>;
  }
}
@media( max-width: <?php echo esc_attr( $minwidth ); ?>px ) {
  #fixed-bottomright-menu {
	left: 0;
	bottom: 0;
	width: 100%;
	margin: 0;
	padding: 0;
  }
  .fixed-bottomright-menu-container {
	flex-diretion: row;
  }
  .fixed-bottomright-menu-item {
	-webkit-align-self: baseline;
	-ms-flex-item-align: baseline;
	align-self: baseline;
  }
  .fixed-bottomright-menu-item {
	-webkit-flex-basis: <?php echo esc_attr( 100 / $columns ); ?>%;
	-ms-flex-preferred-size: <?php echo esc_attr( 100 / $columns ); ?>%;
	flex-basis: <?php echo esc_attr( 100 / $columns ); ?>%;
  }
  .fixed-bottomright-menu-item a {
	padding-top: <?php echo esc_attr( $padding_top_a ); ?>;
	padding-bottom: env(safe-area-inset-bottom);
 }
<?php if ( ! empty( $footer_class ) ) : ?>
	.<?php echo esc_attr( $footer_class ); ?> {
	  margin-bottom: <?php echo esc_attr( $height ); ?>;
	}
<?php endif; ?>
}
<?php if ( $hide ) : ?>
	.#fixed-bottomright-menu {
	  display: none !important;
	}
<?php endif; ?>
