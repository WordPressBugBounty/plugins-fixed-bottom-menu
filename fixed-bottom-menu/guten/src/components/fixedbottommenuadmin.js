import './fixedbottommenuadmin.css';
import { __ } from '@wordpress/i18n';
import apiFetch from '@wordpress/api-fetch';
import {
	Button,
	ColorPalette,
	RadioControl,
	RangeControl,
	SelectControl,
	TextControl,
	ToggleControl
} from '@wordpress/components';
import {
	useState,
	useEffect
} from '@wordpress/element';
import Credit from './credit';

const FixedBottomMenuAdmin = () => {

	const fixedbottommenu_options = JSON.parse( fixed_bottom_menu_settings_script_data.options );

	const fixedbottommenu_options_dash1 = fixedbottommenu_options.dash1;
	const [ daSh1, updatedaSh1 ] = useState( fixedbottommenu_options_dash1 );
	const fixedbottommenu_options_dash2 = fixedbottommenu_options.dash2;
	const [ daSh2, updatedaSh2 ] = useState( fixedbottommenu_options_dash2 );
	const fixedbottommenu_options_dash3 = fixedbottommenu_options.dash3;
	const [ daSh3, updatedaSh3 ] = useState( fixedbottommenu_options_dash3 );
	const fixedbottommenu_options_dash4 = fixedbottommenu_options.dash4;
	const [ daSh4, updatedaSh4 ] = useState( fixedbottommenu_options_dash4 );
	const fixedbottommenu_options_dash5 = fixedbottommenu_options.dash5;
	const [ daSh5, updatedaSh5 ] = useState( fixedbottommenu_options_dash5 );

	const fixedbottommenu_options_url1 = fixedbottommenu_options.url1;
	const [ uRl1, updateuRl1 ] = useState( fixedbottommenu_options_url1 );
	const fixedbottommenu_options_text1 = fixedbottommenu_options.text1;
	const [ teXt1, updateteXt1 ] = useState( fixedbottommenu_options_text1 );
	const fixedbottommenu_options_url2 = fixedbottommenu_options.url2;
	const [ uRl2, updateuRl2 ] = useState( fixedbottommenu_options_url2 );
	const fixedbottommenu_options_text2 = fixedbottommenu_options.text2;
	const [ teXt2, updateteXt2 ] = useState( fixedbottommenu_options_text2 );
	const fixedbottommenu_options_url3 = fixedbottommenu_options.url3;
	const [ uRl3, updateuRl3 ] = useState( fixedbottommenu_options_url3 );
	const fixedbottommenu_options_text3 = fixedbottommenu_options.text3;
	const [ teXt3, updateteXt3 ] = useState( fixedbottommenu_options_text3 );
	const fixedbottommenu_options_url4 = fixedbottommenu_options.url4;
	const [ uRl4, updateuRl4 ] = useState( fixedbottommenu_options_url4 );
	const fixedbottommenu_options_text4 = fixedbottommenu_options.text4;
	const [ teXt4, updateteXt4 ] = useState( fixedbottommenu_options_text4 );
	const fixedbottommenu_options_url5 = fixedbottommenu_options.url5;
	const [ uRl5, updateuRl5 ] = useState( fixedbottommenu_options_url5 );
	const fixedbottommenu_options_text5 = fixedbottommenu_options.text5;
	const [ teXt5, updateteXt5 ] = useState( fixedbottommenu_options_text5 );

	const fixedbottommenu_options_back_color = fixedbottommenu_options.back_color;
	const [ backColor, updatebackColor ] = useState( fixedbottommenu_options_back_color );

	const fixedbottommenu_options_color = fixedbottommenu_options.color;
	const [ coLor, updatecoLor ] = useState( fixedbottommenu_options_color );

	const fixedbottommenu_options_over_color = fixedbottommenu_options.over_color;
	const [ overColor, updateoverColor ] = useState( fixedbottommenu_options_over_color );

	const fixedbottommenu_options_min_width = fixedbottommenu_options.min_width;
	const [ minWidth, updateminWidth ] = useState( parseInt( fixedbottommenu_options_min_width ) );

	const fixedbottommenu_options_zindex = fixedbottommenu_options.zindex;
	const [ zIndex, updatezIndex ] = useState( parseInt( fixedbottommenu_options_zindex ) );

	const fixedbottommenu_options_footer_class = fixedbottommenu_options.footer_class;
	const [ footerClass, updatefooterClass ] = useState( fixedbottommenu_options_footer_class );

	const fixedbottommenu_options_font_size= fixedbottommenu_options.font_size;
	const [ fontSizeflag, updatefontSizeflag ] = useState( fixedbottommenu_options_font_size['flag'] );
	const [ fontSizepx, updatefontSizepx ] = useState( parseFloat( fixedbottommenu_options_font_size['px'] ) );
	const [ fontSizerem, updatefontSizerem ] = useState(parseFloat( fixedbottommenu_options_font_size['rem'] ) );
	const [ fontSizeem, updatefontSizeem ] = useState( parseFloat( fixedbottommenu_options_font_size['em'] ) );

	const fixedbottommenu_options_line_height= fixedbottommenu_options.line_height;
	const [ lineHeightflag, updatelineHeightflag ] = useState( fixedbottommenu_options_line_height['flag'] );
	const [ lineHeightpx, updatelineHeightpx ] = useState( parseFloat( fixedbottommenu_options_line_height['px'] ) );
	const [ lineHeightrem, updatelineHeightrem ] = useState( parseFloat( fixedbottommenu_options_line_height['rem'] ) );
	const [ lineHeightem, updatelineHeightem ] = useState( parseFloat( fixedbottommenu_options_line_height['em'] ) );

	const fixedbottommenu_options_line_height_a= fixedbottommenu_options.line_height_a;
	const [ lineHeightaflag, updatelineHeightaflag ] = useState( fixedbottommenu_options_line_height_a['flag'] );
	const [ lineHeightapx, updatelineHeightapx ] = useState( parseFloat( fixedbottommenu_options_line_height_a['px'] ) );
	const [ lineHeightarem, updatelineHeightarem ] = useState( parseFloat( fixedbottommenu_options_line_height_a['rem'] ) );
	const [ lineHeightaem, updatelineHeightaem ] = useState( parseFloat( fixedbottommenu_options_line_height_a['em'] ) );

	const fixedbottommenu_options_padding_top_a= fixedbottommenu_options.padding_top_a;
	const [ paddingTopaflag, updatepaddingTopaflag ] = useState( fixedbottommenu_options_padding_top_a['flag'] );
	const [ paddingTopapx, updatepaddingTopapx ] = useState( parseFloat( fixedbottommenu_options_padding_top_a['px'] ) );
	const [ paddingToparem, updatepaddingToparem ] = useState( parseFloat( fixedbottommenu_options_padding_top_a['rem'] ) );
	const [ paddingTopaem, updatepaddingTopaem ] = useState( parseFloat( fixedbottommenu_options_padding_top_a['em'] ) );

	const fixedbottommenu_columun = fixed_bottom_menu_settings_script_data.columun;
	const [ coLumun, updatecoLumun ] = useState( fixedbottommenu_columun );

	const fixedbottommenu_template = fixed_bottom_menu_settings_script_data.template;
	const [ temPlate, updatetemPlate ] = useState( fixedbottommenu_template );

	const fixedbottommenu_template_label_value = JSON.parse( fixed_bottom_menu_settings_script_data.template_label_value );

	const fixedbottommenu_template_overviews = JSON.parse( fixed_bottom_menu_settings_script_data.template_overviews );

	const fixedbottommenu_addon = fixed_bottom_menu_settings_script_data.add_on;
	const fixedbottommenu_add_on_set = JSON.parse( fixed_bottom_menu_settings_script_data.add_on_set );
	const fixedbottommenu_add_on_fontawesome = fixedbottommenu_add_on_set.fontawesome;
	const [ fontAwesome, updatefontAwesome ] = useState( fixedbottommenu_add_on_fontawesome );
	const fixedbottommenu_add_on_material_design_icons = fixedbottommenu_add_on_set.material_design_icons;
	const [ materialDesignicons, updatematerialDesignicons ] = useState( fixedbottommenu_add_on_material_design_icons );
	const fixedbottommenu_add_on_type = fixedbottommenu_add_on_set.type;
	const [ addonType, updateaddonType ] = useState( fixedbottommenu_add_on_type );
	const fixedbottommenu_add_on_fas1 = fixedbottommenu_add_on_set.fas['icon1'];
	const [ fAs1, updatefAs1 ] = useState( fixedbottommenu_add_on_fas1 );
	const fixedbottommenu_add_on_fas2 = fixedbottommenu_add_on_set.fas['icon2'];
	const [ fAs2, updatefAs2 ] = useState( fixedbottommenu_add_on_fas2 );
	const fixedbottommenu_add_on_fas3 = fixedbottommenu_add_on_set.fas['icon3'];
	const [ fAs3, updatefAs3 ] = useState( fixedbottommenu_add_on_fas3 );
	const fixedbottommenu_add_on_fas4 = fixedbottommenu_add_on_set.fas['icon4'];
	const [ fAs4, updatefAs4 ] = useState( fixedbottommenu_add_on_fas4 );
	const fixedbottommenu_add_on_fas5 = fixedbottommenu_add_on_set.fas['icon5'];
	const [ fAs5, updatefAs5 ] = useState( fixedbottommenu_add_on_fas5 );
	const fixedbottommenu_add_on_mdi1 = fixedbottommenu_add_on_set.mdi['icon1'];
	const [ mDi1, updatemDi1 ] = useState( fixedbottommenu_add_on_mdi1 );
	const fixedbottommenu_add_on_mdi2 = fixedbottommenu_add_on_set.mdi['icon2'];
	const [ mDi2, updatemDi2 ] = useState( fixedbottommenu_add_on_mdi2 );
	const fixedbottommenu_add_on_mdi3 = fixedbottommenu_add_on_set.mdi['icon3'];
	const [ mDi3, updatemDi3 ] = useState( fixedbottommenu_add_on_mdi3 );
	const fixedbottommenu_add_on_mdi4 = fixedbottommenu_add_on_set.mdi['icon4'];
	const [ mDi4, updatemDi4 ] = useState( fixedbottommenu_add_on_mdi4 );
	const fixedbottommenu_add_on_mdi5 = fixedbottommenu_add_on_set.mdi['icon5'];
	const [ mDi5, updatemDi5 ] = useState( fixedbottommenu_add_on_mdi5 );

	const [ cacheSubmitdelete, updatecacheSubmitdelete ] = useState( false );
	const [ cacheDeletemessage, updatecacheDeletemessage ] = useState( '' );

	useEffect( () => {
		apiFetch( {
			path: 'rf/fixedbottommenu_set_api/token',
			method: 'POST',
			data: {
				dash1: daSh1,
				dash2: daSh2,
				dash3: daSh3,
				dash4: daSh4,
				dash5: daSh5,
				url1: uRl1,
				text1: teXt1,
				url2: uRl2,
				text2: teXt2,
				url3: uRl3,
				text3: teXt3,
				url4: uRl4,
				text4: teXt4,
				url5: uRl5,
				text5: teXt5,
				back_color: backColor,
				color: coLor,
				over_color: overColor,
				min_width: minWidth,
				zindex: zIndex,
				footer_class: footerClass,
				font_size_flag: fontSizeflag,
				font_size_px: fontSizepx,
				font_size_rem: fontSizerem,
				font_size_em: fontSizeem,
				line_height_flag: lineHeightflag,
				line_height_px: lineHeightpx,
				line_height_rem: lineHeightrem,
				line_height_em: lineHeightem,
				line_height_a_flag: lineHeightaflag,
				line_height_a_px: lineHeightapx,
				line_height_a_rem: lineHeightarem,
				line_height_a_em: lineHeightaem,
				padding_top_a_flag: paddingTopaflag,
				padding_top_a_px: paddingTopapx,
				padding_top_a_rem: paddingToparem,
				padding_top_a_em: paddingTopaem,
				template: temPlate,
				menu_col: coLumun,
				add_on: fixedbottommenu_addon,
				fontawesome: fontAwesome,
				material_design_icons: materialDesignicons,
				addon_type: addonType,
				fas1: fAs1,
				fas2: fAs2,
				fas3: fAs3,
				fas4: fAs4,
				fas5: fAs5,
				mdi1: mDi1,
				mdi2: mDi2,
				mdi3: mDi3,
				mdi4: mDi4,
				mdi5: mDi5,
			}
		} ).then( ( response ) => {
			//console.log( response );
		} );
	}, [ daSh1, daSh2, daSh3, daSh4, daSh5, uRl1, teXt1, uRl2, teXt2, uRl3, teXt3, uRl4, teXt4, uRl5, teXt5, backColor, coLor, overColor, minWidth, zIndex, footerClass, fontSizeflag, fontSizepx, fontSizerem, fontSizeem, lineHeightflag, lineHeightpx, lineHeightrem, lineHeightem, lineHeightaflag, lineHeightapx, lineHeightarem, lineHeightaem, paddingTopaflag, paddingTopapx, paddingToparem, paddingTopaem, temPlate, coLumun, fontAwesome, materialDesignicons, addonType, fAs1, fAs2, fAs3, fAs4, fAs5, mDi1, mDi2, mDi3, mDi4, mDi5 ] );

	const items_addons = [];
	if ( ! fixedbottommenu_addon ) {
		items_addons.push(
			<details className="detailsStyle">
				<summary className="summaryStyle">{ __( 'Add on', 'fixed-bottom-menu' ) }</summary>
				<div className="detailsdivStyle">
					<h3>Fixed Bottom Menu Add On Icon</h3>
					<p className="description">
						{ __( 'Sell add-ons that add the following icons.', 'fixed-bottom-menu' ) }
					</p>
					<div className="inner-paragraph1">
						<Button
							variant = "secondary"
							href = "https://fontawesome.com/"
							target = "_blank"
							rel = "noopener noreferrer"
						>
						Font Awesome
						</Button>
						&nbsp;&nbsp;
						<Button
							variant = "secondary"
							href = "https://material.io/resources/icons/"
							target = "_blank"
							rel = "noopener noreferrer"
						>
						Google Material Icons
						</Button>
					</div>
					<div className="inner-paragraph2">
						<Button
							variant = "primary"
							href = { __( 'https://shop.riverforest-wp.info/fixed-bottom-menu-add-on-icon/', 'fixed-bottom-menu' ) }
							target = "_blank"
							rel = "noopener noreferrer"
						>
						{ __( 'BUY', 'fixed-bottom-menu' ) }
						</Button>
					</div>
				</div>
			</details>
		);
	} else {
		if ( typeof addonType !== 'undefined' ) {
			let type_text = '';
			switch ( addonType ) {
				case 'dash':
					type_text = 'Dashicons';
					break;
				case 'fas':
					type_text = 'Font Awesome';
					break;
				case 'mdi':
					type_text = 'Google Material Icons';
					break;
			}

			items_addons.push(
				<details className="detailsStyle">
					<summary className="summaryStyle">{ __( 'Icon type', 'fixed-bottom-menu' ) + ' : ' + type_text }</summary>
					<div className="detailsdivStyle">
						<div className="inner-paragraph3">
							<RadioControl
								selected = { addonType }
								options = { [
									{ label: "Dashicons", value: 'dash' },
									{ label: "Font Awesome", value: 'fas' },
									{ label: "Google Material Icons", value: 'mdi' },
								] }
								onChange = { ( value ) => updateaddonType( value ) }
							/>
						</div>
						<hr />
						<div className="inner-paragraph3">
							<strong>Dashicons</strong>
							<a className="aStyle" href="https://developer.wordpress.org/resource/dashicons/" target="_blank" rel="noopener noreferrer"><span class="dashicons dashicons-external"></span>
							</a>
						</div>
						<div className="inner-paragraph3">
							<strong>Font Awesome</strong>
							<a className="aStyle" href="https://fontawesome.com/" target="_blank" rel="noopener noreferrer"><span class="dashicons dashicons-external"></span>
							</a>
							<div className="inner-paragraph1">
								<TextControl
									label = "Kit"
									value = { fontAwesome }
									onChange = { ( value ) => updatefontAwesome( value ) }
									className = "icon_string"
								/>
								<p className="description">
								{ __( 'If you want to use Version 6, sign in to Font Awesome, go to your "Kits", select "Settings -> Version -> Latest 6.x" and "Save Changes".', 'fixed-bottom-menu' ) }
								</p>
							</div>
						</div>
						<div className="inner-paragraph3">
							<strong>Google Material Icons</strong>
							<a className="aStyle" href="https://material.io/resources/icons/" target="_blank" rel="noopener noreferrer"><span class="dashicons dashicons-external"></span>
							</a>
						</div>
					</div>
				</details>
			);
		}
	}

	const items_colums = [];
	if ( typeof coLumun !== 'undefined' ) {
		items_colums.push(
			<RadioControl
				selected = { coLumun }
				options = { [
					{ label: __( '1 : 1 to 1', 'fixed-bottom-menu' ), value: '1' },
					{ label: __( '2 : 1 to 2', 'fixed-bottom-menu' ), value: '2' },
					{ label: __( '3 : 1 to 3', 'fixed-bottom-menu' ), value: '3' },
					{ label: __( '4 : 1 to 4', 'fixed-bottom-menu' ), value: '4' },
					{ label: __( '5 : 1 to 5', 'fixed-bottom-menu' ), value: '5' },
				] }
				onChange = { ( value ) => updatecoLumun( value ) }
			/>
		);
	}

	const items_column1 = [];
	if ( typeof daSh1 !== 'undefined' &&
			typeof fAs1 !== 'undefined' &&
			typeof mDi1 !== 'undefined' &&
			typeof uRl1 !== 'undefined' &&
			typeof teXt1 !== 'undefined' &&
			typeof addonType !== 'undefined' ) {
		let items_icon = [];
		if ( fixedbottommenu_addon && 'fas' == addonType ) {
			items_icon.push(
				<>
					<>{ 'Font Awesome : ' + __( 'Icon class', 'fixed-bottom-menu' ) }</>
					<TextControl
						value = { fAs1 }
						onChange = { ( value ) => updatefAs1( value ) }
						className = "icon_string"
					/>
				</>
			);
		} else if ( fixedbottommenu_addon && 'mdi' == addonType ) {
			items_icon.push(
				<>
					<>{ 'Google Material Icons : ' + __( 'Icon name', 'fixed-bottom-menu' ) }</>
					<TextControl
						value = { mDi1 }
						onChange = { ( value ) => updatemDi1( value ) }
						className = "icon_string"
					/>
				</>
			);
		} else {
			items_icon.push(
				<>
					<a className="aStyle" href="https://developer.wordpress.org/resource/dashicons/" target="_blank" rel="noopener noreferrer">{ 'Dashicon : ' + __( 'Icon name', 'fixed-bottom-menu' ) }</a>
					<TextControl
						value = { daSh1 }
						onChange = { ( value ) => updatedaSh1( value ) }
						className = "icon_string"
					/>
				</>
			);
		}
		items_column1.push(
			<>
				{ items_icon }
				{ "URL" }
				<TextControl
					value = { uRl1 }
					onChange = { ( value ) => updateuRl1( value ) }
					className = "url_string"
				/>
				{ __( 'Text', 'fixed-bottom-menu' ) }
				<TextControl
					value = { teXt1 }
					onChange = { ( value ) => updateteXt1( value ) }
					className = "text_string"
				/>
			</>
		);
	}

	const items_column2 = [];
	if ( typeof daSh2 !== 'undefined' &&
			typeof fAs2 !== 'undefined' &&
			typeof mDi2 !== 'undefined' &&
			typeof uRl2 !== 'undefined' &&
			typeof teXt2 !== 'undefined' &&
			typeof addonType !== 'undefined' ) {
		let items_icon = [];
		if ( fixedbottommenu_addon && 'fas' == addonType ) {
			items_icon.push(
				<>
					<>{ 'Font Awesome : ' + __( 'Icon class', 'fixed-bottom-menu' ) }</>
					<TextControl
						value = { fAs2 }
						onChange = { ( value ) => updatefAs2( value ) }
						className = "icon_string"
					/>
				</>
			);
		} else if ( fixedbottommenu_addon && 'mdi' == addonType ) {
			items_icon.push(
				<>
					<>{ 'Google Material Icons : ' + __( 'Icon name', 'fixed-bottom-menu' ) }</>
					<TextControl
						value = { mDi2 }
						onChange = { ( value ) => updatemDi2( value ) }
						className = "icon_string"
					/>
				</>
			);
		} else {
			items_icon.push(
				<>
					<a className="aStyle" href="https://developer.wordpress.org/resource/dashicons/" target="_blank" rel="noopener noreferrer">{ 'Dashicon : ' + __( 'Icon name', 'fixed-bottom-menu' ) }</a>
					<TextControl
						value = { daSh2 }
						onChange = { ( value ) => updatedaSh2( value ) }
						className = "icon_string"
					/>
				</>
			);
		}
		items_column2.push(
			<>
				{ items_icon }
				{ "URL" }
				<TextControl
					value = { uRl2 }
					onChange = { ( value ) => updateuRl2( value ) }
					className = "url_string"
				/>
				{ __( 'Text', 'fixed-bottom-menu' ) }
				<TextControl
					value = { teXt2 }
					onChange = { ( value ) => updateteXt2( value ) }
					className = "text_string"
				/>
			</>
		);
	}

	const items_column3 = [];
	if ( typeof daSh3 !== 'undefined' &&
			typeof fAs3 !== 'undefined' &&
			typeof mDi3 !== 'undefined' &&
			typeof uRl3 !== 'undefined' &&
			typeof teXt3 !== 'undefined' &&
			typeof addonType !== 'undefined' ) {
		let items_icon = [];
		if ( fixedbottommenu_addon && 'fas' == addonType ) {
			items_icon.push(
				<>
					<>{ 'Font Awesome : ' + __( 'Icon class', 'fixed-bottom-menu' ) }</>
					<TextControl
						value = { fAs3 }
						onChange = { ( value ) => updatefAs3( value ) }
						className = "icon_string"
					/>
				</>
			);
		} else if ( fixedbottommenu_addon && 'mdi' == addonType ) {
			items_icon.push(
				<>
					<>{ 'Google Material Icons : ' + __( 'Icon name', 'fixed-bottom-menu' ) }</>
					<TextControl
						value = { mDi3 }
						onChange = { ( value ) => updatemDi3( value ) }
						className = "icon_string"
					/>
				</>
			);
		} else {
			items_icon.push(
				<>
					<a className="aStyle" href="https://developer.wordpress.org/resource/dashicons/" target="_blank" rel="noopener noreferrer">{ 'Dashicon : ' + __( 'Icon name', 'fixed-bottom-menu' ) }</a>
					<TextControl
						value = { daSh3 }
						onChange = { ( value ) => updatedaSh3( value ) }
						className = "icon_string"
					/>
				</>
			);
		}
		items_column3.push(
			<>
				{ items_icon }
				{ "URL" }
				<TextControl
					value = { uRl3 }
					onChange = { ( value ) => updateuRl3( value ) }
					className = "url_string"
				/>
				{ __( 'Text', 'fixed-bottom-menu' ) }
				<TextControl
					value = { teXt3 }
					onChange = { ( value ) => updateteXt3( value ) }
					className = "text_string"
				/>
			</>
		);
	}

	const items_column4 = [];
	if ( typeof daSh4 !== 'undefined' &&
			typeof fAs4 !== 'undefined' &&
			typeof mDi4 !== 'undefined' &&
			typeof uRl4 !== 'undefined' &&
			typeof teXt4 !== 'undefined' &&
			typeof addonType !== 'undefined' ) {
		let items_icon = [];
		if ( fixedbottommenu_addon && 'fas' == addonType ) {
			items_icon.push(
				<>
					<>{ 'Font Awesome : ' + __( 'Icon class', 'fixed-bottom-menu' ) }</>
					<TextControl
						value = { fAs4 }
						onChange = { ( value ) => updatefAs4( value ) }
						className = "icon_string"
					/>
				</>
			);
		} else if ( fixedbottommenu_addon && 'mdi' == addonType ) {
			items_icon.push(
				<>
					<>{ 'Google Material Icons : ' + __( 'Icon name', 'fixed-bottom-menu' ) }</>
					<TextControl
						value = { mDi4 }
						onChange = { ( value ) => updatemDi4( value ) }
						className = "icon_string"
					/>
				</>
			);
		} else {
			items_icon.push(
				<>
					<a className="aStyle" href="https://developer.wordpress.org/resource/dashicons/" target="_blank" rel="noopener noreferrer">{ 'Dashicon : ' + __( 'Icon name', 'fixed-bottom-menu' ) }</a>
					<TextControl
						value = { daSh4 }
						onChange = { ( value ) => updatedaSh4( value ) }
						className = "icon_string"
					/>
				</>
			);
		}
		items_column4.push(
			<>
				{ items_icon }
				{ "URL" }
				<TextControl
					value = { uRl4 }
					onChange = { ( value ) => updateuRl4( value ) }
					className = "url_string"
				/>
				{ __( 'Text', 'fixed-bottom-menu' ) }
				<TextControl
					value = { teXt4 }
					onChange = { ( value ) => updateteXt4( value ) }
					className = "text_string"
				/>
			</>
		);
	}

	const items_column5 = [];
	if ( typeof daSh5 !== 'undefined' &&
			typeof fAs5 !== 'undefined' &&
			typeof mDi5 !== 'undefined' &&
			typeof uRl5 !== 'undefined' &&
			typeof teXt5 !== 'undefined' &&
			typeof addonType !== 'undefined' ) {
		let items_icon = [];
		if ( fixedbottommenu_addon && 'fas' == addonType ) {
			items_icon.push(
				<>
					<>{ 'Font Awesome : ' + __( 'Icon class', 'fixed-bottom-menu' ) }</>
					<TextControl
						value = { fAs5 }
						onChange = { ( value ) => updatefAs5( value ) }
						className = "icon_string"
					/>
				</>
			);
		} else if ( fixedbottommenu_addon && 'mdi' == addonType ) {
			items_icon.push(
				<>
					<>{ 'Google Material Icons : ' + __( 'Icon name', 'fixed-bottom-menu' ) }</>
					<TextControl
						value = { mDi5 }
						onChange = { ( value ) => updatemDi5( value ) }
						className = "icon_string"
					/>
				</>
			);
		} else {
			items_icon.push(
				<>
					<a className="aStyle" href="https://developer.wordpress.org/resource/dashicons/" target="_blank" rel="noopener noreferrer">{ 'Dashicon : ' + __( 'Icon name', 'fixed-bottom-menu' ) }</a>
					<TextControl
						value = { daSh5 }
						onChange = { ( value ) => updatedaSh5( value ) }
						className = "icon_string"
					/>
				</>
			);
		}
		items_column5.push(
			<>
				{ items_icon }
				{ "URL" }
				<TextControl
					value = { uRl5 }
					onChange = { ( value ) => updateuRl5( value ) }
					className = "url_string"
				/>
				{ __( 'Text', 'fixed-bottom-menu' ) }
				<TextControl
					value = { teXt5 }
					onChange = { ( value ) => updateteXt5( value ) }
					className = "text_string"
				/>
			</>
		);
	}

	const items_appearance = [];
	if ( typeof backColor !== 'undefined' &&
			typeof coLor !== 'undefined' &&
			typeof overColor !== 'undefined' &&
			typeof minWidth !== 'undefined' &&
			typeof zIndex !== 'undefined' &&
			typeof footerClass !== 'undefined' &&
			typeof fontSizeflag !== 'undefined' &&
			typeof fontSizepx !== 'undefined' &&
			typeof fontSizerem !== 'undefined' &&
			typeof fontSizeem !== 'undefined' &&
			typeof lineHeightflag !== 'undefined' &&
			typeof lineHeightpx !== 'undefined' &&
			typeof lineHeightrem !== 'undefined' &&
			typeof lineHeightem !== 'undefined' &&
			typeof lineHeightaflag !== 'undefined' &&
			typeof lineHeightapx !== 'undefined' &&
			typeof lineHeightarem !== 'undefined' &&
			typeof lineHeightaem !== 'undefined' &&
			typeof paddingTopaflag !== 'undefined' &&
			typeof paddingTopapx !== 'undefined' &&
			typeof paddingToparem !== 'undefined' &&
			typeof paddingTopaem !== 'undefined' ) {
		let items_font_range = [];
		switch ( fontSizeflag ) {
			case 'px':
				items_font_range.push(
					<RangeControl
						max = { 20 }
						min = { 8 }
						step = { 0.1 }
						value = { fontSizepx }
						onChange = { ( value ) => updatefontSizepx( value ) }
						className = "range_bar"
					/>
				);
				break;
			case 'rem':
				items_font_range.push(
					<RangeControl
						max = { 3 }
						min = { 0.5 }
						step = { 0.1 }
						value = { fontSizerem }
						onChange = { ( value ) => updatefontSizerem( value ) }
						className = "range_bar"
					/>
				);
				break;
			case 'em':
				items_font_range.push(
					<RangeControl
						max = { 3 }
						min = { 0.5 }
						step = { 0.1 }
						value = { fontSizeem }
						onChange = { ( value ) => updatefontSizeem( value ) }
						className = "range_bar"
					/>
				);
				break;
		}
		let items_lineheight_range = [];
		switch ( lineHeightflag ) {
			case 'px':
				items_lineheight_range.push(
					<RangeControl
						max = { 60 }
						min = { 30 }
						step = { 0.1 }
						value = { lineHeightpx }
						onChange = { ( value ) => updatelineHeightpx( value ) }
						className = "range_bar"
					/>
				);
				break;
			case 'rem':
				items_lineheight_range.push(
					<RangeControl
						max = { 3 }
						min = { 0.5 }
						step = { 0.1 }
						value = { lineHeightrem }
						onChange = { ( value ) => updatelineHeightrem( value ) }
						className = "range_bar"
					/>
				);
				break;
			case 'em':
				items_lineheight_range.push(
					<RangeControl
						max = { 3 }
						min = { 0.5 }
						step = { 0.1 }
						value = { lineHeightem }
						onChange = { ( value ) => updatelineHeightem( value ) }
						className = "range_bar"
					/>
				);
				break;
		}
		let items_lineheighta_range = [];
		switch ( lineHeightaflag ) {
			case 'px':
				items_lineheighta_range.push(
					<RangeControl
						max = { 15 }
						min = { 5 }
						step = { 0.1 }
						value = { lineHeightapx }
						onChange = { ( value ) => updatelineHeightapx( value ) }
						className = "range_bar"
					/>
				);
				break;
			case 'rem':
				items_lineheighta_range.push(
					<RangeControl
						max = { 3 }
						min = { 0.5 }
						step = { 0.1 }
						value = { lineHeightarem }
						onChange = { ( value ) => updatelineHeightarem( value ) }
						className = "range_bar"
					/>
				);
				break;
			case 'em':
				items_lineheighta_range.push(
					<RangeControl
						max = { 3 }
						min = { 0.5 }
						step = { 0.1 }
						value = { lineHeightaem }
						onChange = { ( value ) => updatelineHeightaem( value ) }
						className = "range_bar"
					/>
				);
				break;
		}
		let items_paddingtopa_range = [];
		switch ( paddingTopaflag ) {
			case 'px':
				items_paddingtopa_range.push(
					<RangeControl
						max = { 10 }
						min = { 1 }
						step = { 0.1 }
						value = { paddingTopapx }
						onChange = { ( value ) => updatepaddingTopapx( value ) }
						className = "range_bar"
					/>
				);
				break;
			case 'rem':
				items_paddingtopa_range.push(
					<RangeControl
						max = { 1 }
						min = { 0.1 }
						step = { 0.05 }
						value = { paddingToparem }
						onChange = { ( value ) => updatepaddingToparem( value ) }
						className = "range_bar"
					/>
				);
				break;
			case 'em':
				items_paddingtopa_range.push(
					<RangeControl
						max = { 1 }
						min = { 0.1 }
						step = { 0.05 }
						value = { paddingTopaem }
						onChange = { ( value ) => updatepaddingTopaem( value ) }
						className = "range_bar"
					/>
				);
				break;
		}
		const colors = [
			{ name: __( 'Navy', 'fixed-bottom-menu' ), color: '#000080' },
			{ name: __( 'Green', 'fixed-bottom-menu' ), color: '#008000' },
			{ name: __( 'Yellow', 'fixed-bottom-menu' ), color: '#ffff00' },
			{ name: __( 'Red', 'fixed-bottom-menu' ), color: '#ff0000' },
			{ name: __( 'Brown', 'fixed-bottom-menu' ), color: '#8f6446' },
			{ name: __( 'Black', 'fixed-bottom-menu' ), color: '#000000' },
			{ name: __( 'White', 'fixed-bottom-menu' ), color: '#ffffff' },
		];
		const items_backcolor = [];
		const items_color = [];
		const items_overcolor = [];
		if ( typeof backColor !== 'undefined' ) {
			items_backcolor.push(
				<ColorPalette
					clearable = { false }
					colors = { colors }
					value = { backColor }
					onChange = { ( value ) => updatebackColor( value ) }
				/>
			);
		}
		if ( typeof coLor !== 'undefined' ) {
			items_color.push(
				<ColorPalette
					clearable = { false }
					colors = { colors }
					value = { coLor }
					onChange = { ( value ) => updatecoLor( value ) }
				/>
			);
		}
		if ( typeof overColor !== 'undefined' ) {
			items_overcolor.push(
				<ColorPalette
					clearable = { false }
					colors = { colors }
					value = { overColor }
					onChange = { ( value ) => updateoverColor( value ) }
				/>
			);
		}

		items_appearance.push(
			<table border="1" cellspacing="0" cellpadding="5" bordercolor="#000000">
				<tr>
				<th rowspan="2">{ __( 'Options', 'fixed-bottom-menu' ) }</th>
				<th colspan="2">{ __( 'Value', 'fixed-bottom-menu' ) }</th>
				<th rowspan="2">{ __( 'Filters', 'fixed-bottom-menu' ) }</th>
				</tr>
				<tr>
				<th>{ __( 'Value', 'fixed-bottom-menu' ) }</th>
				<th>{ __( 'Unit', 'fixed-bottom-menu' ) }</th>
				</tr>
				<tr>
				<td><strong>{ __( 'Font Sizes', 'fixed-bottom-menu' ) }</strong></td>
				<td>{ items_font_range }</td>
				<td>
					<RadioControl
						selected = { fontSizeflag }
						options = { [
							{ label: "px", value: 'px' },
							{ label: "rem", value: 'rem' },
							{ label: "em", value: 'em' },
						] }
						onChange = { ( value ) => updatefontSizeflag( value ) }
					/>
				</td>
				<td><code>fbm_fontsize</code></td>
				</tr>
				<tr>
				<td><strong>{ __( 'Menu Height', 'fixed-bottom-menu' ) }</strong></td>
				<td>{ items_lineheight_range }</td>
				<td>
					<RadioControl
						selected = { lineHeightflag }
						options = { [
							{ label: "px", value: 'px' },
							{ label: "rem", value: 'rem' },
							{ label: "em", value: 'em' },
						] }
						onChange = { ( value ) => updatelineHeightflag( value ) }
					/>
				</td>
				<td><code>fbm_height</code></td>
				</tr>
				<tr>
				<td><strong>{ __( 'Line Height', 'fixed-bottom-menu' ) }</strong></td>
				<td>{ items_lineheighta_range }</td>
				<td>
					<RadioControl
						selected = { lineHeightaflag }
						options = { [
							{ label: "px", value: 'px' },
							{ label: "rem", value: 'rem' },
							{ label: "em", value: 'em' },
						] }
						onChange = { ( value ) => updatelineHeightaflag( value ) }
					/>
				</td>
				<td><code>fbm_height_a</code></td>
				</tr>
				<tr>
				<td rowspan="2"><strong>{ __( 'Padding', 'fixed-bottom-menu' ) }</strong></td>
				<td>{ items_paddingtopa_range }</td>
				<td>
					<RadioControl
						selected = { paddingTopaflag }
						options = { [
							{ label: "px", value: 'px' },
							{ label: "rem", value: 'rem' },
							{ label: "em", value: 'em' },
						] }
						onChange = { ( value ) => updatepaddingTopaflag( value ) }
					/>
				</td>
				<td rowspan="2"><code>fbm_padding_top_a</code></td>
				</tr>
				<tr>
				<td colspan="2">
					<p className="description">
						{ __( 'If the menu is to be placed at the top or bottom, the value of padding-top will be used. If the menu is to be placed left or right, the value is the padding value. This is the case for Katsushi Kawamori\'s template.', 'fixed-bottom-menu' ) }
					</p>
				</td>
				</tr>
				<tr>
				<td rowspan="2"><strong>{ __( 'Class name', 'fixed-bottom-menu' ) }</strong></td>
				<td colspan="2">
					<TextControl
						value = { footerClass }
						onChange = { ( value ) => updatefooterClass( value ) }
						className = "text_string"
					/>
				</td>
				<td rowspan="2"><code>fbm_footer_class</code></td>
				</tr>
				<tr>
				<td colspan="2">
					<p className="description">
						{ __( 'Specify the header or footer class name of the theme if the menu is placed at the top or bottom and the header or footer overlaps the menu, making it difficult to see. This is the case for Katsushi Kawamori\'s template.', 'fixed-bottom-menu' ) }
					</p>
				</td>
				</tr>
				<tr>
				<td><strong>{ __( 'Background color', 'fixed-bottom-menu' ) }</strong></td>
				<td colspan="2">
					{ items_backcolor }
				</td>
				<td><code>fbm_backcolor</code></td>
				</tr>
				<tr>
				<td><strong>{ __( 'Text color', 'fixed-bottom-menu' ) }</strong></td>
				<td colspan="2">
					{ items_color }
				</td>
				<td><code>fbm_color</code></td>
				</tr>
				<tr>
				<td><strong>{ __( 'Overlay Color', 'fixed-bottom-menu' ) }</strong></td>
				<td colspan="2">
					{ items_overcolor }
				</td>
				<td><code>fbm_overcolor</code></td>
				</tr>
				<tr>
				<td><strong>{ __( 'Max Width', 'fixed-bottom-menu' ) }</strong></td>
				<td colspan="2">
					<RangeControl
						max = { 10000 }
						min = { 768 }
						step = { 1 }
						value = { minWidth }
						onChange = { ( value ) => updateminWidth( value ) }
						className = "range_bar"
					/>
				</td>
				<td><code>fbm_minwidth</code></td>
				</tr>
				<tr>
				<td><strong>{ __( 'Stacking order', 'fixed-bottom-menu' ) }</strong></td>
				<td colspan="2">
					<RangeControl
						max = { 100 }
						min = { -100 }
						step = { 1 }
						value = { zIndex }
						onChange = { ( value ) => updatezIndex( value ) }
						className = "range_bar"
					/>
				</td>
				<td><code>fbm_zindex</code></td>
				</tr>
			</table>
		);
	}

	const items_templates = [];
	if ( typeof temPlate !== 'undefined' ) {
		items_templates.push(
			<SelectControl
				value = { temPlate }
				options={ fixedbottommenu_template_label_value }
				onChange={  ( value ) => updatetemPlate( value ) }
				__nextHasNoMarginBottom
			/>
		);
	}

	const items_template_overview = [];
	if ( fixedbottommenu_template_overviews.hasOwnProperty( temPlate ) ) {
		items_template_overview.push(
			<ul>
				<li>{ __( 'Description', 'fixed-bottom-menu' ) } : { fixedbottommenu_template_overviews[ temPlate ]['description'] }</li>
				<li>{ __( 'Version', 'fixed-bottom-menu' ) } : { fixedbottommenu_template_overviews[ temPlate ]['version'] }</li>
				<li>{ __( 'Author', 'fixed-bottom-menu' ) } : <a className="aStyle" href={ fixedbottommenu_template_overviews[ temPlate ]['author_link'] } target="_blank" rel="noopener">{ fixedbottommenu_template_overviews[ temPlate ]['author'] }</a></li>
			</ul>
		);
	}

	return (
		<>
			<h2>Fixed Bottom Menu</h2>
			<Credit />
			<hr />
			<h2>{ __( 'Settings', 'fixed-bottom-menu' ) }</h2>
			{ items_addons }
			<details className="detailsStyle">
				<summary className="summaryStyle">{ __( 'Column Count', 'fixed-bottom-menu' ) }</summary>
				<div className="detailsdivStyle">
					{ items_colums }
				</div>
			</details>
			<details className="detailsStyle">
				<summary className="summaryStyle">1</summary>
				<div className="detailsdivStyle">
					{ items_column1 }
				</div>
			</details>
			<details className="detailsStyle">
				<summary className="summaryStyle">2</summary>
				<div className="detailsdivStyle">
					{ items_column2 }
				</div>
			</details>
			<details className="detailsStyle">
				<summary className="summaryStyle">3</summary>
				<div className="detailsdivStyle">
					{ items_column3 }
				</div>
			</details>
			<details className="detailsStyle">
				<summary className="summaryStyle">4</summary>
				<div className="detailsdivStyle">
					{ items_column4 }
				</div>
			</details>
			<details className="detailsStyle">
				<summary className="summaryStyle">5</summary>
				<div className="detailsdivStyle">
					{ items_column5 }
				</div>
			</details>
			<details className="detailsStyle">
				<summary className="summaryStyle">{ __( 'Appearance Settings', 'fixed-bottom-menu' ) }</summary>
				<div className="detailsdivStyle">
					{ items_appearance }
				</div>
			</details>
			<details className="detailsStyle">
				<summary className="summaryStyle">{ __( 'Live demo site with filters', 'fixed-bottom-menu' ) }</summary>
				<div className="detailsdivStyle">
					<Button
						variant = "secondary"
						href = "https://fbm.riverforest-wp.info"
						target = "_blank"
						rel = "noopener noreferrer"
					>
					{ __( 'Live demo site with filters', 'fixed-bottom-menu' ) }
					</Button>
				</div>
			</details>
			<details className="detailsStyle">
				<summary className="summaryStyle">{ __( 'Select template and CSS', 'fixed-bottom-menu' ) }</summary>
				<div className="detailsdivStyle">
					<div className="inner-paragraph3">
						{ items_templates }
					</div>
					<div className="inner-paragraph3">
					<div><strong>{ __( 'Overview of the selected template', 'fixed-bottom-menu' ) }</strong></div>
						{ items_template_overview }
						<p className="description">{ __( 'If you create a stylish template, please contact me. If i incorporate it into this plugin, i will consider you a contributor to the plugin.', 'fixed-bottom-menu' ) }</p>
						<div>{ __( 'Template files allow for flexible customization.', 'fixed-bottom-menu' ) } -> <a className="aStyle" href="https://github.com/katsushi-kawamori/Fixed-Bottom-Menu-Templates" target="_blank" rel="noopener noreferrer">{ __( 'Customize', 'fixed-bottom-menu' ) }</a></div>
					</div>
				</div>
			</details>
		</>
	);

};

export default FixedBottomMenuAdmin;
