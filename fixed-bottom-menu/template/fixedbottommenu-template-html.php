<?php
/**
 * Fixed Bottom Menu Template Default HTML File
 *
 * @package WordPress
 * @subpackage Fixed Bottom Menu
 * @since Fixed Bottom Menu 2.00
 * @version 1.02
 */

?>

<div id="fixed-bottom-menu">
	<div class="fixed-bottom-menu-container">
		<?php
		for ( $i = 1; $i <= $columns; $i++ ) {
			?>
			<div class="fixed-bottom-menu-item">
				<?php do_action( 'fbm_icon_display', $i, $icon_type ); ?>
			</div>
			<?php
		}
		?>
	</div>
</div>
<?php
