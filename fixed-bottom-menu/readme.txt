=== Fixed Bottom Menu ===
Contributors: Katsushi Kawamori
Donate link: https://shop.riverforest-wp.info/donate/
Tags: fixed, menu
Requires at least: 6.6
Requires PHP: 8.0
Tested up to: 6.7
Stable tag: 2.11
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add a fixed menu. The basic menu is at the bottom, but it can also be displayed on the top, left, and right.

== Description ==

Add a fixed menu. The basic menu is at the bottom, but it can also be displayed on the top, left, and right.

= Links =
* Five link destinations can be specified.
* Provides filters for icons, URLs, and text for each link.

= Options =
* Can specify the number of columns from 1 to 5.
* Can specify the font size with px, rem and em.
* Can specify the menu height with px, rem and em.
* Can specify the line height with px, rem and em.
* Can specify the padding with px, rem and em.
* Can specify their class to remove the overlap for headers and footers overlap.
* Can specify the color of text, buttons, and overlay.
* Can specify the upper limit of the display width.
* Can specify the stack order of css elemental.
* The above options filters are provided.

= Other filters =
* Provide a filter to erase the menu.

= How it works =
[youtube https://youtu.be/gmTUhSOPw9c]

= Live Demo =
* [Fixed Bottom Menu Live](https://fbm.riverforest-wp.info/)

= Icons =
* [Dashicons](https://developer.wordpress.org/resource/dashicons/) can be specified.

= Customize =
* Template files allow for flexible [customization](https://github.com/katsushi-kawamori/Fixed-Bottom-Menu-Templates).
* The default template file is `template/fixedbottommenu-template-html.php` and `template/fixedbottommenu-template-css.php`. Using this as a reference, you can specify a separate template file using the filters below.
~~~
/** ==================================================
 * Filter for template file of html.
 *
 */
add_filter(
	'fixed_bottom_menu_generate_template_html_file',
	function () {
		$wp_uploads = wp_upload_dir();
		$upload_dir = wp_normalize_path( $wp_uploads['basedir'] );
		$upload_dir = untrailingslashit( $upload_dir );
		return $upload_dir . '/tmp/fixedbottommenu-template-html.php';
	},
	10,
	1
);
~~~
~~~
/** ==================================================
 * Filter for template file of css.
 *
 */
add_filter(
	'fixed_bottom_menu_generate_template_css_file',
	function () {
		$wp_uploads = wp_upload_dir();
		$upload_dir = wp_normalize_path( $wp_uploads['basedir'] );
		$upload_dir = untrailingslashit( $upload_dir );
		return $upload_dir . '/tmp/fixedbottommenu-template-css.php';
	},
	10,
	1
);
~~~

* CSS files can be set separately. Please see the filters below.
~~~
/** ==================================================
 * Filter for CSS file.
 *
 */
add_filter(
	'fixed_bottom_menu_css_url',
	function () {
		$wp_uploads = wp_upload_dir();
		$upload_url = $wp_uploads['baseurl'];
		if ( is_ssl() ) {
			$upload_url = str_replace( 'http:', 'https:', $upload_url );
		}
		$upload_url = untrailingslashit( $upload_url );
		return $upload_url . '/tmp/fixedbottommenu.css';
	},
	10,
	1
);
~~~

== Installation ==

1. Upload `fixed-bottom-menu` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

none

== Screenshots ==

1. View
2. Settings
3. Edit settings

== Changelog ==

= [2.11] 2024/11/13 =
* Fix - Management screen display issue.

= [2.10] 2024/11/11 =
* Fix - Management screen display issue.

= [2.09] 2024/11/10 =
* Fix - Rebuilt javascript.

= [2.08] 2024/04/21 =
* Fix - Translation.

= [2.07] 2024/04/21 =
* Fix - Translation.

= [2.06] 2024/04/21 =
* Tweak - About the template overview display.

= [2.05] 2024/04/20 =
* Added - "Bottom and Right" Template.

= [2.04] 2024/04/19 =
* Change - Changed the number of columns from 3 to 5 to 1 to 5.
* Change - readme.txt.

= [2.03] 2024/04/18 =
* Added - Top,Right,Left Display Template.
* Added - Numeric and unit variables for fonts.
* Tweak - Addition of description on the admin page.

= [2.02] 2024/04/17 =
* Fix - Simplification of templates.

= [2.01] 2024/04/17 =
* Fix - Simplification of templates.

= [2.00] 2024/04/16 =
* Added - Customization by template files.
* Change - The management screen was converted to React.

= 1.30 =
Supported WordPress 6.4.
PHP 8.0 is now required.

= 1.29 =
Fixed problem with adding columns.

= 1.28 =
Supported WordPress 5.7.

= 1.27 =
Fixed uninstall.

= 1.26 =
Supported WordPress 5.6.

= 1.25 =
Updates related to add-ons.

= 1.24 =
Updates related to add-ons.

= 1.23 =
A link to the demo site has been posted.
[Fixed Bottom Menu Live](https://fbm.riverforest-wp.info/)

= 1.22 =
Added footer class option.
Changed color picker.

= 1.21 =
Fixed an error related to add-ons.

= 1.20 =
Added filter for erase menu.
Added filter for z-index.

= 1.19 =
Added filter for values in columns.

= 1.18 =
Removed unnecessary code.

= 1.17 =
Added several options.
Added several filter.

= 1.16 =
Fixed a problem with the iOS home bar being covered.

= 1.15 =
Can specify the number of columns from 3 to 5.

= 1.14 =
Fixed translation.

= 1.13 =
Fixed translation.

= 1.12 =
Fixed url link problem.

= 1.11 =
Old settings (ver1.01) can now be selected.

= 1.10 =
The setting screen has been changed.

= 1.04 =
Fixed problem of CSS.

= 1.03 =
Fixed issue "Max Width".

= 1.02 =
Fixed problem of CSS.

= 1.01 =
Fixed link to the setting page.

= 1.00 =
Initial release.

== Upgrade Notice ==

= 1.00 =
Initial release.
