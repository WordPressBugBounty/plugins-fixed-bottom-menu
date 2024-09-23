<?php
/**
 * Fixed Bottom Menu Template Top HTML File
 *
 * @package WordPress
 * @subpackage Fixed Bottom Menu
 * @since Fixed Bottom Menu 2.00
 * @version 1.00
 */

?>

<div id="fixed-top-menu">
	<div class="fixed-top-menu-container">
		<?php
		for ( $i = 1; $i <= $columns; $i++ ) {
			?>
			<div class="fixed-top-menu-item">
				<?php do_action( 'fbm_icon_display', $i, $icon_type ); ?>
			</div>
			<?php
		}
		?>
	</div>
</div>
<?php
