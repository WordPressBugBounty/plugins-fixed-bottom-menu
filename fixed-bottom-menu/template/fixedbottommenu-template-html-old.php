<?php
/**
 * Fixed Bottom Menu Template Old HTML File
 *
 * @package WordPress
 * @subpackage Fixed Bottom Menu
 * @since Fixed Bottom Menu 2.00
 * @version 1.02
 */

?>

<ul class="fixed-bottom-menu">
	<?php
	for ( $i = 1; $i <= $columns; $i++ ) {
		?>
		<li>
			<?php do_action( 'fbm_icon_display', $i, $icon_type ); ?>
		</li>
		<?php
	}
	?>
</ul>
<?php
