<?php
/**
 * Fixed Bottom Menu Template Right HTML File
 *
 * @package WordPress
 * @subpackage Fixed Bottom Menu
 * @since Fixed Bottom Menu 2.00
 * @version 1.00
 */

?>

<div id="fixed-right-menu">
	<div class="fixed-right-menu-container">
	<?php
	for ( $i = 1; $i <= $columns; $i++ ) {
		?>
		<div class="fixed-right-menu-item">
			<?php do_action( 'fbm_icon_display', $i, $icon_type ); ?>
		</div>
		<?php
	}
	?>
	</div>
</div>
<?php
