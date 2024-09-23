<?php
/**
 * Fixed Bottom Menu
 *
 * @package    Fixed Bottom Menu
 * @subpackage FixedBottomMenuAdmin Management screen
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

$fixedbottommenuadmin = new FixedBottomMenuAdmin();

/** ==================================================
 * Management screen
 */
class FixedBottomMenuAdmin {

	/** ==================================================
	 * Construct
	 *
	 * @since 1.00
	 */
	public function __construct() {

		add_action( 'init', array( $this, 'register_settings' ) );
		add_action( 'admin_menu', array( $this, 'plugin_menu' ) );
		add_filter( 'plugin_action_links', array( $this, 'settings_link' ), 10, 2 );

		add_action( 'rest_api_init', array( $this, 'register_rest' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ), 10, 1 );
	}

	/** ==================================================
	 * Add a "Settings" link to the plugins page
	 *
	 * @param  array  $links  links array.
	 * @param  string $file   file.
	 * @return array  $links  links array.
	 * @since 1.00
	 */
	public function settings_link( $links, $file ) {
		static $this_plugin;
		if ( empty( $this_plugin ) ) {
			$this_plugin = 'fixed-bottom-menu/fixedbottommenu.php';
		}
		if ( $file === $this_plugin ) {
			$links[] = '<a href="' . admin_url( 'options-general.php?page=fixedbottommenu' ) . '">' . __( 'Settings' ) . '</a>';
		}
			return $links;
	}

	/** ==================================================
	 * Settings page
	 *
	 * @since 1.00
	 */
	public function plugin_menu() {
		add_options_page(
			'Fixed Bottom Menu Options',
			'Fixed Bottom Menu',
			'manage_options',
			'fixedbottommenu',
			array( $this, 'plugin_options' )
		);
	}

	/** ==================================================
	 * For only admin style
	 *
	 * @since 1.00
	 */
	private function is_my_plugin_screen() {
		$screen = get_current_screen();
		if ( is_object( $screen ) && 'settings_page_fixedbottommenu' === $screen->id ) {
			return true;
		} else {
			return false;
		}
	}

	/** ==================================================
	 * Settings page
	 *
	 * @since 1.00
	 */
	public function plugin_options() {

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.' ) );
		}

		printf(
			'<div class="wrap" id="fixed-bottom-menu-settings">%s</div>',
			esc_html__( 'Loading…', 'fixed-bottom-menu' )
		);
	}

	/** ==================================================
	 * Load script
	 *
	 * @param string $hook_suffix  hook_suffix.
	 * @since 2.00
	 */
	public function admin_scripts( $hook_suffix ) {

		if ( 'settings_page_fixedbottommenu' !== $hook_suffix ) {
			return;
		}

		$asset_file = plugin_dir_path( __DIR__ ) . 'guten/build/index.asset.php';

		if ( ! file_exists( $asset_file ) ) {
			return;
		}

		$asset = include $asset_file;

		wp_enqueue_style(
			'fixed_bottom_menu_settings_style',
			plugin_dir_url( __DIR__ ) . 'guten/build/index.css',
			array( 'wp-components' ),
			'1.0.0',
		);

		wp_enqueue_script(
			'fixed_bottom_menu_settings_script',
			plugin_dir_url( __DIR__ ) . 'guten/build/index.js',
			$asset['dependencies'],
			$asset['version'],
			array(
				'in_footer' => true,
			)
		);

		$fixedbottommenu = new FixedBottomMenu();

		$templates = $fixedbottommenu->load_templates();
		$template_label_value = array();
		$template_overviews = array();
		foreach ( $templates as $key => $value ) {
			foreach ( $value as $value2 ) {
				$template_label_value[] = array(
					'label' => __( $value2['name'], 'fixed-bottom-menu' ),
					'value' => $value2['slug'],
				);
				$template_overviews[ $value2['slug'] ] = array(
					'description' => __( $value2['description'], 'fixed-bottom-menu' ),
					'version' => $value2['version'],
					'author' => $value2['author'],
					'author_link' => $value2['author_link'],
				);
			}
		}

		$fixedbottommenu_settings = get_option( 'fixedbottommenu_settings' );
		$fixedbottommenu_template = get_option( 'fixedbottommenu_template', 'default' );

		$add_on = false;
		$fixedbottommenu_add_on_icon_settings = get_option( 'fixedbottommenu_add_on_icon_settings' );
		if ( get_option( 'fixedbottommenu_add_on_icon_settings' ) && class_exists( 'FixedBottomMenuAddOnIcon' ) ) {
			$add_on = true;
			$add_on_set = wp_json_encode( $fixedbottommenu_add_on_icon_settings, JSON_UNESCAPED_SLASHES );
		} else {
			$null_settings = array(
				'fontawesome'           => null,
				'material_design_icons' => null,
				'type' => 'dash',
				'fas' => array(
					'icon1' => null,
					'icon2' => null,
					'icon3' => null,
					'icon4' => null,
					'icon5' => null,
				),
				'mdi' => array(
					'icon1' => null,
					'icon2' => null,
					'icon3' => null,
					'icon4' => null,
					'icon5' => null,
				),
			);
			$add_on_set = wp_json_encode( $null_settings, JSON_UNESCAPED_SLASHES );
		}

		wp_localize_script(
			'fixed_bottom_menu_settings_script',
			'fixed_bottom_menu_settings_script_data',
			array(
				'options' => wp_json_encode( $fixedbottommenu_settings, JSON_UNESCAPED_SLASHES ),
				'columun' => intval( get_option( 'fixedbottommenu_settings_col' ) ),
				'template' => $fixedbottommenu_template,
				'template_label_value' => wp_json_encode( $template_label_value, JSON_UNESCAPED_SLASHES ),
				'template_overviews' => wp_json_encode( $template_overviews, JSON_UNESCAPED_SLASHES ),
				'add_on' => boolval( $add_on ),
				'add_on_set' => $add_on_set,
			)
		);

		/* To be added to Glotpress */
		$tmp = __( 'Default template', 'fixed-bottom-menu' );
		$tmp = __( 'This is default template. Display at the bottom.', 'fixed-bottom-menu' );
		$tmp = __( 'Old template', 'fixed-bottom-menu' );
		$tmp = __( 'This is old template. Display at the bottom.', 'fixed-bottom-menu' );
		$tmp = __( 'Right template', 'fixed-bottom-menu' );
		$tmp = __( 'Display at the right.', 'fixed-bottom-menu' );
		$tmp = __( 'Top template', 'fixed-bottom-menu' );
		$tmp = __( 'Display at the top.', 'fixed-bottom-menu' );
		$tmp = __( 'Left template', 'fixed-bottom-menu' );
		$tmp = __( 'Display at the left.', 'fixed-bottom-menu' );
		$tmp = __( 'Bottom and Right template', 'fixed-bottom-menu' );
		$tmp = __( 'It is displayed at the bottom when the screen is narrow and at the right when the screen is wide. Switching depends on the value of [Max Width].', 'fixed-bottom-menu' );

		wp_set_script_translations( 'fixed_bottom_menu_settings_script', 'fixed-bottom-menu' );

		$this->credit( 'fixed_bottom_menu_settings_script' );
	}

	/** ==================================================
	 * Register Rest API
	 *
	 * @since 2.00
	 */
	public function register_rest() {

		register_rest_route(
			'rf/fixedbottommenu_set_api',
			'/token',
			array(
				'methods' => 'POST',
				'callback' => array( $this, 'api_save' ),
				'permission_callback' => array( $this, 'rest_permission' ),
			),
		);
	}

	/** ==================================================
	 * Rest Permission
	 *
	 * @since 2.00
	 */
	public function rest_permission() {

		return current_user_can( 'manage_options' );
	}

	/** ==================================================
	 * Rest API save
	 *
	 * @param object $request  changed data.
	 * @since 2.00
	 */
	public function api_save( $request ) {

		$args = json_decode( $request->get_body(), true );

		$fixedbottommenu_settings['dash1'] = sanitize_text_field( wp_unslash( $args['dash1'] ) );
		$fixedbottommenu_settings['dash2'] = sanitize_text_field( wp_unslash( $args['dash2'] ) );
		$fixedbottommenu_settings['dash3'] = sanitize_text_field( wp_unslash( $args['dash3'] ) );
		$fixedbottommenu_settings['dash4'] = sanitize_text_field( wp_unslash( $args['dash4'] ) );
		$fixedbottommenu_settings['dash5'] = sanitize_text_field( wp_unslash( $args['dash5'] ) );
		$fixedbottommenu_settings['url1'] = esc_url_raw( wp_unslash( $args['url1'] ) );
		$fixedbottommenu_settings['text1'] = sanitize_text_field( wp_unslash( $args['text1'] ) );
		$fixedbottommenu_settings['url2'] = esc_url_raw( wp_unslash( $args['url2'] ) );
		$fixedbottommenu_settings['text2'] = sanitize_text_field( wp_unslash( $args['text2'] ) );
		$fixedbottommenu_settings['url3'] = esc_url_raw( wp_unslash( $args['url3'] ) );
		$fixedbottommenu_settings['text3'] = sanitize_text_field( wp_unslash( $args['text3'] ) );
		$fixedbottommenu_settings['url4'] = esc_url_raw( wp_unslash( $args['url4'] ) );
		$fixedbottommenu_settings['text4'] = sanitize_text_field( wp_unslash( $args['text4'] ) );
		$fixedbottommenu_settings['url5'] = esc_url_raw( wp_unslash( $args['url5'] ) );
		$fixedbottommenu_settings['text5'] = sanitize_text_field( wp_unslash( $args['text5'] ) );
		$fixedbottommenu_settings['back_color'] = sanitize_text_field( wp_unslash( $args['back_color'] ) );
		$fixedbottommenu_settings['color'] = sanitize_text_field( wp_unslash( $args['color'] ) );
		$fixedbottommenu_settings['over_color'] = sanitize_text_field( wp_unslash( $args['over_color'] ) );
		$fixedbottommenu_settings['min_width'] = intval( $args['min_width'] );
		$fixedbottommenu_settings['zindex'] = intval( $args['zindex'] );
		$fixedbottommenu_settings['footer_class'] = sanitize_text_field( wp_unslash( $args['footer_class'] ) );

		$fixedbottommenu_settings['font_size'] = array(
			'flag' => sanitize_text_field( wp_unslash( $args['font_size_flag'] ) ),
			'px' => floatval( $args['font_size_px'] ),
			'rem' => floatval( $args['font_size_rem'] ),
			'em' => floatval( $args['font_size_em'] ),
		);
		$fixedbottommenu_settings['line_height'] = array(
			'flag' => sanitize_text_field( wp_unslash( $args['line_height_flag'] ) ),
			'px' => floatval( $args['line_height_px'] ),
			'rem' => floatval( $args['line_height_rem'] ),
			'em' => floatval( $args['line_height_em'] ),
		);
		$fixedbottommenu_settings['line_height_a'] = array(
			'flag' => sanitize_text_field( wp_unslash( $args['line_height_a_flag'] ) ),
			'px' => floatval( $args['line_height_a_px'] ),
			'rem' => floatval( $args['line_height_a_rem'] ),
			'em' => floatval( $args['line_height_a_em'] ),
		);
		$fixedbottommenu_settings['padding_top_a'] = array(
			'flag' => sanitize_text_field( wp_unslash( $args['padding_top_a_flag'] ) ),
			'px' => floatval( $args['padding_top_a_px'] ),
			'rem' => floatval( $args['padding_top_a_rem'] ),
			'em' => floatval( $args['padding_top_a_em'] ),
		);

		$fixedbottommenu_template = sanitize_text_field( wp_unslash( $args['template'] ) );

		update_option( 'fixedbottommenu_settings', $fixedbottommenu_settings );
		update_option( 'fixedbottommenu_settings_col', intval( $args['menu_col'] ) );
		update_option( 'fixedbottommenu_template', $fixedbottommenu_template );

		if ( $args['add_on'] ) {
			$fixedbottommenu_add_on_icon_settings['fontawesome'] = sanitize_text_field( wp_unslash( $args['fontawesome'] ) );
			$fixedbottommenu_add_on_icon_settings['material_design_icons'] = sanitize_text_field( wp_unslash( $args['material_design_icons'] ) );
			$fixedbottommenu_add_on_icon_settings['type'] = sanitize_text_field( wp_unslash( $args['addon_type'] ) );
			$fixedbottommenu_add_on_icon_settings['fas'] = array(
				'icon1' => sanitize_text_field( wp_unslash( $args['fas1'] ) ),
				'icon2' => sanitize_text_field( wp_unslash( $args['fas2'] ) ),
				'icon3' => sanitize_text_field( wp_unslash( $args['fas3'] ) ),
				'icon4' => sanitize_text_field( wp_unslash( $args['fas4'] ) ),
				'icon5' => sanitize_text_field( wp_unslash( $args['fas5'] ) ),
			);
			$fixedbottommenu_add_on_icon_settings['mdi'] = array(
				'icon1' => sanitize_text_field( wp_unslash( $args['mdi1'] ) ),
				'icon2' => sanitize_text_field( wp_unslash( $args['mdi2'] ) ),
				'icon3' => sanitize_text_field( wp_unslash( $args['mdi3'] ) ),
				'icon4' => sanitize_text_field( wp_unslash( $args['mdi4'] ) ),
				'icon5' => sanitize_text_field( wp_unslash( $args['mdi5'] ) ),
			);
			update_option( 'fixedbottommenu_add_on_icon_settings', $fixedbottommenu_add_on_icon_settings );
		}

		return new WP_REST_Response( $args, 200 );
	}

	/** ==================================================
	 * Credit
	 *
	 * @param string $handle  handle.
	 * @since 2.20
	 */
	private function credit( $handle ) {

		$plugin_name    = null;
		$plugin_ver_num = null;
		$plugin_path    = plugin_dir_path( __DIR__ );
		$plugin_dir     = untrailingslashit( wp_normalize_path( $plugin_path ) );
		$slugs          = explode( '/', $plugin_dir );
		$slug           = end( $slugs );
		$files          = scandir( $plugin_dir );
		foreach ( $files as $file ) {
			if ( '.' === $file || '..' === $file || is_dir( $plugin_path . $file ) ) {
				continue;
			} else {
				$exts = explode( '.', $file );
				$ext  = strtolower( end( $exts ) );
				if ( 'php' === $ext ) {
					$plugin_datas = get_file_data(
						$plugin_path . $file,
						array(
							'name'    => 'Plugin Name',
							'version' => 'Version',
						)
					);
					if ( array_key_exists( 'name', $plugin_datas ) && ! empty( $plugin_datas['name'] ) && array_key_exists( 'version', $plugin_datas ) && ! empty( $plugin_datas['version'] ) ) {
						$plugin_name    = $plugin_datas['name'];
						$plugin_ver_num = $plugin_datas['version'];
						break;
					}
				}
			}
		}

		wp_localize_script(
			$handle,
			'credit',
			array(
				'links'          => __( 'Various links of this plugin', 'fixed-bottom-menu' ),
				'plugin_version' => __( 'Version:' ) . ' ' . $plugin_ver_num,
				/* translators: FAQ Link & Slug */
				'faq'            => sprintf( __( 'https://wordpress.org/plugins/%s/faq', 'fixed-bottom-menu' ), $slug ),
				'support'        => 'https://wordpress.org/support/plugin/' . $slug,
				'review'         => 'https://wordpress.org/support/view/plugin-reviews/' . $slug,
				'translate'      => 'https://translate.wordpress.org/projects/wp-plugins/' . $slug,
				/* translators: Plugin translation link */
				'translate_text' => sprintf( __( 'Translations for %s' ), $plugin_name ),
				'facebook'       => 'https://www.facebook.com/katsushikawamori/',
				'twitter'        => 'https://twitter.com/dodesyo312',
				'youtube'        => 'https://www.youtube.com/channel/UC5zTLeyROkvZm86OgNRcb_w',
				'donate'         => __( 'https://shop.riverforest-wp.info/donate/', 'fixed-bottom-menu' ),
				'donate_text'    => __( 'Please make a donation if you like my work or would like to further the development of this plugin.', 'fixed-bottom-menu' ),
				'donate_button'  => __( 'Donate to this plugin &#187;' ),
			)
		);
	}

	/** ==================================================
	 * Settings register
	 *
	 * @since 1.00
	 */
	public function register_settings() {

		if ( ! get_option( 'fixedbottommenu_settings' ) ) {
			$fixedbottommenu_tbl = array(
				'dash1'      => 'admin-home',
				'dash2'      => 'calendar',
				'dash3'      => 'edit',
				'dash4'      => 'playlist-video',
				'dash5'      => 'location',
				'url1'       => home_url(),
				'text1'      => 'Home',
				'url2'       => null,
				'text2'      => 'Calendar',
				'url3'       => null,
				'text3'      => 'Blog',
				'url4'       => null,
				'text4'      => 'Gallery',
				'url5'       => null,
				'text5'      => 'Address',
				'back_color' => '#7db4e6',
				'color'      => '#ffffff',
				'over_color' => '#0000ff',
				'min_width'  => 1300,
				'zindex'     => 30,
				'footer_class' => null,
				'font_size'   => array(
					'flag' => 'px',
					'px' => 10,
					'rem' => 0.8,
					'em' => 0.8,
				),
				'line_height' => array(
					'flag' => 'rem',
					'px' => 45,
					'rem' => 2,
					'em' => 2,
				),
				'line_height_a' => array(
					'flag' => 'rem',
					'px' => 10,
					'rem' => 1,
					'em' => 1,
				),
				'padding_top_a' => array(
					'flag' => 'rem',
					'px' => 5,
					'rem' => 0.15,
					'em' => 0.15,
				),
			);
			update_option( 'fixedbottommenu_settings', $fixedbottommenu_tbl );
		} else {
			$fixedbottommenu_settings = get_option( 'fixedbottommenu_settings' );
			/* from ver 2.00 */
			if ( is_numeric( $fixedbottommenu_settings['font_size'] ) ) {
				$tmp = $fixedbottommenu_settings['font_size'];
				unset( $fixedbottommenu_settings['font_size'] );
				$fixedbottommenu_settings['font_size']['flag'] = 'px';
				$fixedbottommenu_settings['font_size']['px'] = $tmp;
				$fixedbottommenu_settings['font_size']['rem'] = 0.8;
				$fixedbottommenu_settings['font_size']['em'] = 0.8;
				update_option( 'fixedbottommenu_settings', $fixedbottommenu_settings );
			}
			if ( is_numeric( $fixedbottommenu_settings['line_height'] ) ) {
				$tmp = $fixedbottommenu_settings['line_height_old'];
				$tmp2 = $fixedbottommenu_settings['line_height'];
				unset( $fixedbottommenu_settings['line_height_old'], $fixedbottommenu_settings['line_height'] );
				if ( get_option( 'fixedbottommenu_settings_old' ) ) {
					$fixedbottommenu_settings['line_height']['flag'] = 'px';
				} else {
					$fixedbottommenu_settings['line_height']['flag'] = 'rem';
				}
				$fixedbottommenu_settings['line_height']['px'] = $tmp;
				$fixedbottommenu_settings['line_height']['rem'] = $tmp2;
				$fixedbottommenu_settings['line_height']['em'] = $tmp2;
				update_option( 'fixedbottommenu_settings', $fixedbottommenu_settings );
			}
			if ( is_numeric( $fixedbottommenu_settings['line_height_a'] ) ) {
				$tmp = $fixedbottommenu_settings['line_height_a_old'];
				$tmp2 = $fixedbottommenu_settings['line_height_a'];
				unset( $fixedbottommenu_settings['line_height_a_old'], $fixedbottommenu_settings['line_height_a'] );
				if ( get_option( 'fixedbottommenu_settings_old' ) ) {
					$fixedbottommenu_settings['line_height_a']['flag'] = 'px';
				} else {
					$fixedbottommenu_settings['line_height_a']['flag'] = 'rem';
				}
				$fixedbottommenu_settings['line_height_a']['px'] = $tmp;
				$fixedbottommenu_settings['line_height_a']['rem'] = $tmp2;
				$fixedbottommenu_settings['line_height_a']['em'] = $tmp2;
				update_option( 'fixedbottommenu_settings', $fixedbottommenu_settings );
			}
			if ( is_numeric( $fixedbottommenu_settings['padding_top_a'] ) ) {
				$tmp = $fixedbottommenu_settings['padding_top_a_old'];
				$tmp2 = $fixedbottommenu_settings['padding_top_a'];
				unset( $fixedbottommenu_settings['padding_top_a_old'], $fixedbottommenu_settings['padding_top_a'] );
				if ( get_option( 'fixedbottommenu_settings_old' ) ) {
					$fixedbottommenu_settings['padding_top_a']['flag'] = 'px';
				} else {
					$fixedbottommenu_settings['padding_top_a']['flag'] = 'rem';
				}
				$fixedbottommenu_settings['padding_top_a']['px'] = $tmp;
				$fixedbottommenu_settings['padding_top_a']['rem'] = $tmp2;
				$fixedbottommenu_settings['padding_top_a']['em'] = $tmp2;
				update_option( 'fixedbottommenu_settings', $fixedbottommenu_settings );
			}
		}

		if ( ! get_option( 'fixedbottommenu_settings_col' ) ) {
			update_option( 'fixedbottommenu_settings_col', 5 );
		}

		if ( ! get_option( 'fixedbottommenu_template' ) ) {
			if ( get_option( 'fixedbottommenu_settings_old' ) ) {
				update_option( 'fixedbottommenu_template', 'old' );
			} else {
				update_option( 'fixedbottommenu_template', 'default' );
			}
		}
	}
}
