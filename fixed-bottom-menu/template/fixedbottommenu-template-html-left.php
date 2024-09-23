<?php
/**
 * Fixed Bottom Menu Template Left HTML File
 *
 * @package WordPress
 * @subpackage Fixed Bottom Menu
 * @since Fixed Bottom Menu 2.00
 * @version 1.00
 */

?>

<div id="fixed-left-menu">
	<div class="fixed-left-menu-container">
	<?php
	for ( $i = 1; $i <= $columns; $i++ ) {
		?>
		<div class="fixed-left-menu-item">
			<?php do_action( 'fbm_icon_display', $i, $icon_type ); ?>
		</div>
		<?php
	}
	?>
	</div>
</div>
<?php
