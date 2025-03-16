<?php
/**
 * Fixed Bottom Menu
 *
 * @package    Fixed Bottom Menu
 * @subpackage Fixed Bottom Menu Main function
/*
	Copyright (c) 2019- Katsushi Kawamori (email : dodesyoswift312@gmail.com)
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; version 2 of the License.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

$fixedbottommenu = new FixedBottomMenu();

/** ==================================================
 * Main Functions
 */
class FixedBottomMenu {

	/** ==================================================
	 * Settings
	 *
	 * @var $fixedbottommenu_settings  fixedbottommenu_settings.
	 */
	private $fixedbottommenu_settings;

	/** ==================================================
	 * Columun
	 *
	 * @var $column  column.
	 */
	private $column;

	/** ==================================================
	 * Construct
	 *
	 * @since 1.00
	 */
	public function __construct() {

		$this->fixedbottommenu_settings = get_option( 'fixedbottommenu_settings' );
		$this->column = get_option( 'fixedbottommenu_settings_col', 5 );

		add_action( 'wp_enqueue_scripts', array( $this, 'load_icons' ) );

		add_action( 'wp_footer', array( $this, 'load_localize_styles' ) );
		add_action( 'wp_footer', array( $this, 'bottom_menu' ) );
		add_action( 'fbm_icon_display', array( $this, 'icon_display' ), 10, 2 );

		add_action( 'wp_head', array( $this, 'safe_area' ) );
	}

	/** ==================================================
	 * Menu
	 *
	 * @since 1.02
	 */
	public function bottom_menu() {

		$hide = false;
		$hide = apply_filters( 'fbm_hide', $hide );

		if ( ! $hide ) {
			list( $template_html_file_name, $template_css_file_name, $css_file_name ) = $this->select_template( get_option( 'fixedbottommenu_template', 'default' ) );

			$template_html_file = apply_filters( 'fixed_bottom_menu_generate_template_html_file', plugin_dir_path( __DIR__ ) . 'template/' . $template_html_file_name );

			$icon_type = $this->icon_filters();

			$this->column = apply_filters( 'fbm_column', $this->column );
			$columns = $this->column;

			ob_start();
			include $template_html_file;
			$contents = ob_get_contents();
			ob_end_clean();

			echo wp_kses_post( $contents );
		}
	}

	/** ==================================================
	 * Icons display
	 *
	 * @param int    $i  column count.
	 * @param string $icon_type  icon_type.
	 * @since 2.01
	 */
	public function icon_display( $i, $icon_type ) {

		$column_value = $this->colmun_filters( $i, $icon_type );

		?>
		<a href="<?php echo esc_url( $column_value['url'] ); ?>">
		<?php if ( 'dash' === $column_value['icon_type'] ) : ?>
			<span class="dashicons dashicons-<?php echo esc_attr( $column_value['icon'] ); ?>"></span>
		<?php else : ?>
			<?php do_action( 'fbm_icon_view', $column_value['icon'], $column_value['icon_type'] ); ?>
		<?php endif; ?>
		<br>
		<span class="fixed-bottom-menu-text"><?php echo esc_html( $column_value['text'] ); ?></span>
		</a>
		<?php
	}

	/** ==================================================
	 * Load Localize Style
	 *
	 * @since 1.02
	 */
	public function load_localize_styles() {

		$hide = false;
		$hide = apply_filters( 'fbm_hide', $hide );

		if ( ! $hide ) {
			list( $template_html_file_name, $template_css_file_name, $css_file_name ) = $this->select_template( get_option( 'fixedbottommenu_template', 'default' ) );

			$css_url = apply_filters( 'fixed_bottom_menu_css_url', plugin_dir_url( __DIR__ ) . 'template/' . $css_file_name );
			wp_enqueue_style( 'fixed-bottom-menu', $css_url, array(), '1.00' );

			list( $fontsize, $fontsize_num, $fontsize_unit, $backcolor, $color, $overcolor, $minwidth, $zindex, $height, $height_a, $padding_top_a, $footer_class ) = $this->option_filters();

			$this->column = apply_filters( 'fbm_column', $this->column );
			$columns = $this->column;
			$text_class = 'fixed-bottom-menu-text';

			$template_css_file = apply_filters( 'fixed_bottom_menu_generate_template_css_file', plugin_dir_path( __DIR__ ) . 'template/' . $template_css_file_name );

			ob_start();
			include $template_css_file;
			$contents = ob_get_contents();
			ob_end_clean();

			wp_add_inline_style( 'fixed-bottom-menu', $contents );
		}
	}

	/** ==================================================
	 * Column filters
	 *
	 * @since 1.24
	 */
	private function icon_filters() {

		$icon_type = 'dash';
		if ( class_exists( 'FixedBottomMenuAddOnIcon' ) ) {
			if ( get_option( 'fixedbottommenu_add_on_icon_settings' ) ) {
				$addonicon = get_option( 'fixedbottommenu_add_on_icon_settings' );
				$icon_type = $addonicon['type'];
			}
		}

		$icon_type = apply_filters( 'fbm_icon_type', $icon_type );

		return $icon_type;
	}

	/** ==================================================
	 * Column filters
	 *
	 * @param int    $i  column count.
	 * @param string $icon_type  icon_type.
	 * @since 1.19
	 */
	private function colmun_filters( $i, $icon_type ) {

		$column_value = array();
		if ( array_key_exists( 'url' . $i, $this->fixedbottommenu_settings ) ) {
			$column_value['url'] = $this->fixedbottommenu_settings[ 'url' . $i ];
		}

		$icon_type = apply_filters( 'fbm_column_icon_type_' . $i, $icon_type );
		$column_value['icon_type'] = $icon_type;

		if ( array_key_exists( 'dash' . $i, $this->fixedbottommenu_settings ) ) {
			$column_value['icon'] = $this->fixedbottommenu_settings[ 'dash' . $i ];
		}
		if ( 'dash' <> $icon_type ) {
			if ( class_exists( 'FixedBottomMenuAddOnIcon' ) ) {
				if ( get_option( 'fixedbottommenu_add_on_icon_settings' ) ) {
					$addonicon = get_option( 'fixedbottommenu_add_on_icon_settings' );
					if ( array_key_exists( 'icon' . $i, $addonicon[ $icon_type ] ) ) {
						$column_value['icon'] = $addonicon[ $icon_type ][ 'icon' . $i ];
					}
				}
			}
		}
		if ( array_key_exists( 'text' . $i, $this->fixedbottommenu_settings ) ) {
			$column_value['text'] = $this->fixedbottommenu_settings[ 'text' . $i ];
		}

		$column_value = apply_filters( 'fbm_column_value_' . $i, $column_value );

		return $column_value;
	}

	/** ==================================================
	 * Option filters
	 *
	 * @since 1.17
	 */
	private function option_filters() {

		$backcolor = $this->fixedbottommenu_settings['back_color'];
		$backcolor = apply_filters( 'fbm_backcolor', $backcolor );
		$color = $this->fixedbottommenu_settings['color'];
		$color = apply_filters( 'fbm_color', $color );
		$overcolor = $this->fixedbottommenu_settings['over_color'];
		$overcolor = apply_filters( 'fbm_overcolor', $overcolor );
		$minwidth = $this->fixedbottommenu_settings['min_width'];
		$minwidth = apply_filters( 'fbm_minwidth', $minwidth );
		$zindex = $this->fixedbottommenu_settings['zindex'];
		$zindex = apply_filters( 'fbm_zindex', $zindex );
		$footer_class = $this->fixedbottommenu_settings['footer_class'];
		$footer_class = apply_filters( 'fbm_footer_class', $footer_class );

		$fontsize_unit = $this->fixedbottommenu_settings['font_size']['flag'];
		$fontsize = $this->fixedbottommenu_settings['font_size'][ $fontsize_unit ] . $fontsize_unit;
		$fontsize_num = $this->fixedbottommenu_settings['font_size'][ $fontsize_unit ];
		$height = $this->fixedbottommenu_settings['line_height'][ $this->fixedbottommenu_settings['line_height']['flag'] ] . $this->fixedbottommenu_settings['line_height']['flag'];
		$height_a = $this->fixedbottommenu_settings['line_height_a'][ $this->fixedbottommenu_settings['line_height_a']['flag'] ] . $this->fixedbottommenu_settings['line_height_a']['flag'];
		$padding_top_a = $this->fixedbottommenu_settings['padding_top_a'][ $this->fixedbottommenu_settings['padding_top_a']['flag'] ] . $this->fixedbottommenu_settings['padding_top_a']['flag'];

		$fontsize_unit = apply_filters( 'fbm_fontsize_unit', $fontsize_unit );
		$fontsize = apply_filters( 'fbm_fontsize', $fontsize );
		$fontsize_num = apply_filters( 'fbm_fontsize_num', $fontsize_num );
		$height = apply_filters( 'fbm_height', $height );
		$height_a = apply_filters( 'fbm_height_a', $height_a );
		$padding_top_a = apply_filters( 'fbm_padding_top_a', $padding_top_a );

		return array( $fontsize, $fontsize_num, $fontsize_unit, $backcolor, $color, $overcolor, $minwidth, $zindex, $height, $height_a, $padding_top_a, $footer_class );
	}

	/** ==================================================
	 * Icon style
	 *
	 * @since 1.00
	 */
	public function load_icons() {

		wp_enqueue_style( 'dashicons' );
		do_action( 'fbm_icon_enqueue_style' );
	}

	/** ==================================================
	 * Meta tag for Viewport(Apple iPhone Safe Area)
	 *
	 * @since 1.16
	 */
	public function safe_area() {

		$insert = '<meta name="viewport" content="initial-scale=1, viewport-fit=cover">' . "\n";
		$allowed_insert_html = array(
			'meta'  => array(
				'name' => array(),
				'content' => array(
					'initial-scale' => array(),
					'viewport-fit'  => array(),
				),
			),
		);
		echo wp_kses( $insert, $allowed_insert_html );
	}

	/** ==================================================
	 * Select Template & CSS
	 *
	 * @param string $slug  slug.
	 * @return array $template_file_name, $css_file_name  filename.
	 * @since 2.00
	 */
	private function select_template( $slug ) {

		$templates = $this->load_templates();

		$template_html_file_name = $templates['templates'][0]['files']['template_html'];
		$template_css_file_name = $templates['templates'][0]['files']['template_css'];
		$css_file_name = $templates['templates'][0]['files']['css'];
		foreach ( $templates as $key => $value ) {
			foreach ( $value as $value2 ) {
				if ( $slug === $value2['slug'] ) {
					if ( ! empty( $value2['files']['template_html'] ) ) {
						$template_html_file_name = $value2['files']['template_html'];
					}
					if ( ! empty( $value2['files']['template_css'] ) ) {
						$template_css_file_name = $value2['files']['template_css'];
					}
					if ( ! empty( $value2['files']['css'] ) ) {
						$css_file_name = $value2['files']['css'];
					}
				}
			}
		}

		return array( $template_html_file_name, $template_css_file_name, $css_file_name );
	}

	/** ==================================================
	 * Load Templates
	 *
	 * @return array $templates  templates.
	 * @since 2.00
	 */
	public function load_templates() {

		require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php';
		require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php';
		$wp_filesystem = new WP_Filesystem_Direct( false );

		$json = $wp_filesystem->get_contents( plugin_dir_path( __DIR__ ) . 'template/templates.json' );
		$templates = json_decode( $json, true );

		return $templates;
	}
}
