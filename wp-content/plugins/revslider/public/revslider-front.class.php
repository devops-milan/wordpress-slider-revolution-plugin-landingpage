<?php
/**
 * @author    ThemePunch <info@themepunch.com>
 * @link      https://www.themepunch.com/
 * @copyright 2019 ThemePunch
 */

if(!defined('ABSPATH')) exit();

class RevSliderFront extends RevSliderFunctions {

	const TABLE_SLIDER			 = 'revslider_sliders';
	const TABLE_SLIDES			 = 'revslider_slides';
	const TABLE_STATIC_SLIDES	 = 'revslider_static_slides';
	const TABLE_CSS				 = 'revslider_css';
	const TABLE_LAYER_ANIMATIONS = 'revslider_layer_animations';
	const TABLE_NAVIGATIONS		 = 'revslider_navigations';
	const TABLE_SETTINGS		 = 'revslider_settings'; //existed prior 5.0 and still needed for updating from 4.x to any version after 5.x
	const CURRENT_TABLE_VERSION	 = '1.0.8';

	const YOUTUBE_ARGUMENTS		 = 'hd=1&amp;wmode=opaque&amp;showinfo=0&amp;rel=0';
	const VIMEO_ARGUMENTS		 = 'title=0&amp;byline=0&amp;portrait=0&amp;api=1';

	public function __construct(){		
		add_action('wp_enqueue_scripts', array('RevSliderFront', 'add_actions'));
	}
	
	
	/**
	 * START: DEPRECATED FUNCTIONS THAT ARE IN HERE FOR OLD ADDONS TO WORK PROPERLY
	 **/
	 
	/**
	 * old version of add_admin_bar();
	 **/
	public static function putAdminBarMenus(){
		return RevSliderFront::add_admin_bar();
	}
	
	/**
	 * END: DEPRECATED FUNCTIONS THAT ARE IN HERE FOR OLD ADDONS TO WORK PROPERLY
	 **/
	 
	/**
	 * Add all actions that the frontend needs here
	 **/
	public static function add_actions(){
		global $wp_version, $revslider_is_preview_mode;

		$func	 = new RevSliderFunctions();
		$css	 = new RevSliderCssParser();
		$rs_ver	 = apply_filters('revslider_remove_version', RS_REVISION);
		$global	 = $func->get_global_settings();
		$inc_global = $func->_truefalse($func->get_val($global, 'allinclude', true));
		
		$inc_footer = $func->_truefalse($func->get_val($global, array('script', 'footer'), false));
		$waitfor = array('jquery');
		$widget	 = is_active_widget(false, false, 'rev-slider-widget', true);
		
		$load	 = false;
		$load	 = apply_filters('revslider_include_libraries', $load);
		$load	 = ($revslider_is_preview_mode === true) ? true : $load;
		$load	 = ($inc_global === true) ? true : $load;
		$load	 = (self::has_shortcode('rev_slider') === true) ? true : $load;
		$load	 = ($widget !== false) ? true : $load;
		
		if($inc_global === false){
			$output = new RevSliderOutput();
			$output->set_add_to($func->get_val($global, 'includeids', ''));
			$add_to = $output->check_add_to(true);
			$load	= ($add_to === true) ? true : $load;
		}

		if($load === false) return false;
		
		wp_enqueue_style('rs-plugin-settings', RS_PLUGIN_URL . 'public/assets/css/rs6.css', array(), $rs_ver);

		/**
		 * Fix for WordPress versions below 3.7
		 **/
		$style_pre = ($wp_version < 3.7) ? '<style type="text/css">' : '';
		$style_post = ($wp_version < 3.7) ? '</style>' : '';
		$custom_css = $func->get_static_css();
		$custom_css = $css->compress_css($custom_css);
		$custom_css = (trim($custom_css) == '') ? '#rs-demo-id {}' : $custom_css;

		wp_add_inline_style('rs-plugin-settings', $style_pre . $custom_css . $style_post);
		wp_enqueue_script(array('jquery'));
		
		/**
		 * dequeue tp-tools to make sure that always the latest is loaded
		 **/
		global $wp_scripts;
		if(version_compare($func->get_val($wp_scripts, array('registered', 'tp-tools', 'ver'), '1.0'), RS_TP_TOOLS, '<')){
			wp_deregister_script('tp-tools');
			wp_dequeue_script('tp-tools');
		}
		
		wp_enqueue_script('tp-tools', RS_PLUGIN_URL . 'public/assets/js/revolution.tools.min.js', $waitfor, RS_TP_TOOLS, $inc_footer);
		
		if(!file_exists(RS_PLUGIN_PATH.'public/assets/js/rs6.min.js')){
			wp_enqueue_script('revmin', RS_PLUGIN_URL . 'public/assets/js/dev/rs6.main.js', 'tp-tools', $rs_ver, $inc_footer);
			//if on, load all libraries instead of dynamically loading them
			wp_enqueue_script('revmin-actions', RS_PLUGIN_URL . 'public/assets/js/dev/rs6.actions.js', 'tp-tools', $rs_ver, $inc_footer);
			wp_enqueue_script('revmin-carousel', RS_PLUGIN_URL . 'public/assets/js/dev/rs6.carousel.js', 'tp-tools', $rs_ver, $inc_footer);
			wp_enqueue_script('revmin-layeranimation', RS_PLUGIN_URL . 'public/assets/js/dev/rs6.layeranimation.js', 'tp-tools', $rs_ver, $inc_footer);
			wp_enqueue_script('revmin-navigation', RS_PLUGIN_URL . 'public/assets/js/dev/rs6.navigation.js', 'tp-tools', $rs_ver, $inc_footer);
			wp_enqueue_script('revmin-panzoom', RS_PLUGIN_URL . 'public/assets/js/dev/rs6.panzoom.js', 'tp-tools', $rs_ver, $inc_footer);
			wp_enqueue_script('revmin-parallax', RS_PLUGIN_URL . 'public/assets/js/dev/rs6.parallax.js', 'tp-tools', $rs_ver, $inc_footer);
			wp_enqueue_script('revmin-slideanims', RS_PLUGIN_URL . 'public/assets/js/dev/rs6.slideanims.js', 'tp-tools', $rs_ver, $inc_footer);
			wp_enqueue_script('revmin-video', RS_PLUGIN_URL . 'public/assets/js/dev/rs6.video.js', 'tp-tools', $rs_ver, $inc_footer);
		}else{
			wp_enqueue_script('revmin', RS_PLUGIN_URL . 'public/assets/js/rs6.min.js', 'tp-tools', $rs_ver, $inc_footer);
		}
		
		add_action('wp_head', array('RevSliderFront', 'add_meta_generator'));
		add_action('wp_head', array('RevSliderFront', 'js_set_start_size'), 99);
		add_action('admin_head', array('RevSliderFront', 'js_set_start_size'), 99);
		add_action('wp_footer', array('RevSliderFront', 'load_icon_fonts'));
		add_action('wp_footer', array('RevSliderFront', 'load_google_fonts'));

		//Async JS Loading
		if($func->_truefalse($func->get_val($global, array('script', 'defer'), false)) === true){
			add_filter('clean_url', array('RevSliderFront', 'add_defer_forscript'), 11, 1);
		}

		add_action('wp_before_admin_bar_render', array('RevSliderFront', 'add_admin_menu_nodes'));
		add_action('wp_footer', array('RevSliderFront', 'add_admin_bar'), 99);
	}
	
	
	/**
	 * Add Meta Generator Tag in FrontEnd
	 * @since: 5.0
	 */
	public static function add_meta_generator(){
		echo apply_filters('revslider_meta_generator', '<meta name="generator" content="Powered by Slider Revolution ' . RS_REVISION . ' - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />' . "\n");
	}

	/**
	 * Load Used Icon Fonts
	 * @since: 5.0
	 */
	public static function load_icon_fonts(){
		global $fa_var, $fa_icon_var, $pe_7s_var;
		$func	= new RevSliderFunctions();
		$global	= $func->get_global_settings();
		$ignore_fa = $func->_truefalse($func->get_val($global, 'fontawesomedisable', false));
		
		echo ($ignore_fa === false && ($fa_icon_var == true || $fa_var == true)) ? '<link rel="stylesheet" property="stylesheet" id="rs-icon-set-fa-icon-css" href="' . RS_PLUGIN_URL . 'public/assets/fonts/font-awesome/css/font-awesome.css" type="text/css" media="all" />'."\n" : '';
		echo ($pe_7s_var) ? '<link rel="stylesheet" property="stylesheet" id="rs-icon-set-pe-7s-css" href="' . RS_PLUGIN_URL . 'public/assets/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" type="text/css" media="all" />'."\n" : '';
	}
	
	
	/**
	 * Load Used Google Fonts
	 * add google fonts of all sliders found on the page
	 * @since: 6.0
	 */
	public static function load_google_fonts(){ 
		$func	= new RevSliderFunctions();
		$fonts	= $func->print_clean_font_import();
		if(!empty($fonts)){
			echo $fonts."\n";
		}
	}
	

	/**
	 * add admin menu points in ToolBar Top
	 * @since: 5.0.5
	 * @before: putAdminBarMenus()
	 */
	public static function add_admin_bar(){
		if(!is_super_admin() || !is_admin_bar_showing()){
			return;
		}

		?>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				if(jQuery('#wp-admin-bar-revslider-default').length > 0 && jQuery('rs-module-wrap').length > 0){
					var aliases = new Array();
					jQuery('rs-module-wrap').each(function(){
						aliases.push(jQuery(this).data('alias'));
					});
					
					if(aliases.length > 0){
						jQuery('#wp-admin-bar-revslider-default li').each(function(){
							var li = jQuery(this),
								t = jQuery.trim(li.find('.ab-item .rs-label').data('alias')); //text()
							
							if(jQuery.inArray(t,aliases)!=-1){
							}else{
								li.remove();
							}
						});
					}
				}else{
					jQuery('#wp-admin-bar-revslider').remove();
				}
			});
		</script>
		<?php
}

	/**
	 * add admin nodes
	 * @since: 5.0.5
	 */
	public static function add_admin_menu_nodes(){
		if(!is_super_admin() || !is_admin_bar_showing()){
			return;
		}

		self::_add_node('<span class="rs-label">Slider Revolution</span>', false, admin_url('admin.php?page=revslider'), array('class' => 'revslider-menu'), 'revslider'); //<span class="wp-menu-image dashicons-before dashicons-update"></span>

		//add all nodes of all Slider
		$sl = new RevSliderSlider();
		$sliders = $sl->get_slider_for_admin_menu();

		if(!empty($sliders)){
			foreach ($sliders as $id => $slider){
				self::_add_node('<span class="rs-label" data-alias="' . esc_attr($slider['alias']) . '">' . esc_html($slider['title']) . '</span>', 'revslider', admin_url('admin.php?page=revslider&view=slide&id=slider-'.$id), array('class' => 'revslider-sub-menu'), esc_attr($slider['alias'])); //<span class="wp-menu-image dashicons-before dashicons-update"></span>
			}
		}
	}

	/**
	 * add admin node
	 * @since: 5.0.5
	 */
	public static function _add_node($title, $parent = false, $href = '', $custom_meta = array(), $id = ''){
		if(!is_super_admin() || !is_admin_bar_showing()){
			return;
		}

		$id = ($id == '') ? strtolower(str_replace(' ', '-', $title)) : $id;
		
		//links from the current host will open in the current window
		$meta = (strpos($href, site_url()) !== false) ? array() : array('target' => '_blank'); //external links open in new tab/window
		$meta = array_merge($meta, $custom_meta);
		
		global $wp_admin_bar;
		$wp_admin_bar->add_node(array('parent'=> $parent, 'id' => $id, 'title' => $title, 'href' => $href, 'meta' => $meta));
	}

	/**
	 * adds async loading
	 * @since: 5.0
	 */
	public static function add_defer_forscript($url){
		if(strpos($url, 'rs6.min.js') === false && strpos($url, 'revolution.tools.min.js') === false){
			return $url;
		} elseif(is_admin()){
			return $url;
		}else{
			return $url . "' defer='defer";
		}
	}
	
	/**
	 * Add functionality to gutenberg, elementar, visual composer and so on
	 **/
	public static function add_post_editor(){
		/**
		 * Page Editor Extensions
		 **/
		if(function_exists('is_user_logged_in') && is_user_logged_in()){
			//only include gutenberg for production
			if(is_admin() && defined('ABSPATH')){
				include_once(ABSPATH . 'wp-admin/includes/plugin.php');
				if(function_exists('is_plugin_active') && !is_plugin_active('revslider-gutenberg/plugin.php')){
					require_once(RS_PLUGIN_PATH . 'admin/includes/shortcode_generator/gutenberg/gutenberg-block.php');
					new RevSliderGutenberg('gutenberg/');
				}
			}
			
			require_once(RS_PLUGIN_PATH . 'admin/includes/shortcode_generator/shortcode_generator.class.php');
			
			//Shortcode Wizard Includes
			add_action('vc_before_init', array('RevSliderShortcodeWizard', 'visual_composer_include')); //VC functionality
			add_action('admin_enqueue_scripts', array('RevSliderShortcodeWizard', 'enqueue_scripts'));
		}
		
		//Elementor Functionality
		require_once(RS_PLUGIN_PATH . 'admin/includes/shortcode_generator/elementor/elementor.class.php');
		add_action('init', array('RevSliderElementor', 'init'));
	}

	/**
	 * Add Meta Generator Tag in FrontEnd
	 * @since: 5.4.3
	 * @before: add_setREVStartSize()
		//NOT COMPRESSED VERSION
		function setREVStartSize(e){			
			try {								
				var pw = document.getElementById(e.c).parentNode.offsetWidth,
					newh;
				pw = pw===0 || isNaN(pw) ? window.innerWidth : pw;
				e.tabw = e.tabw===undefined ? 0 : parseInt(e.tabw);
				e.thumbw = e.thumbw===undefined ? 0 : parseInt(e.thumbw);
				e.tabh = e.tabh===undefined ? 0 : parseInt(e.tabh);
				e.thumbh = e.thumbh===undefined ? 0 : parseInt(e.thumbh);
				e.tabhide = e.tabhide===undefined ? 0 : parseInt(e.tabhide);
				e.thumbhide = e.thumbhide===undefined ? 0 : parseInt(e.thumbhide);
				e.mh = e.mh===undefined || e.mh=="" || e.mh==="auto" ? 0 : parseInt(e.mh,0);		
				if(e.layout==="fullscreen" || e.l==="fullscreen") 						
					newh = Math.max(e.mh,window.innerHeight);					
				else{					
					e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
					for (var i in e.rl) if (e.gw[i]===undefined || e.gw[i]===0) e.gw[i] = e.gw[i-1];					
					e.gh = e.el===undefined || e.el==="" || (Array.isArray(e.el) && e.el.length==0)? e.gh : e.el;
					e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
					for (var i in e.rl) if (e.gh[i]===undefined || e.gh[i]===0) e.gh[i] = e.gh[i-1];
										
					var nl = new Array(e.rl.length),
						ix = 0,						
						sl;					
					e.tabw = e.tabhide>=pw ? 0 : e.tabw;
					e.thumbw = e.thumbhide>=pw ? 0 : e.thumbw;
					e.tabh = e.tabhide>=pw ? 0 : e.tabh;
					e.thumbh = e.thumbhide>=pw ? 0 : e.thumbh;					
					for (var i in e.rl) nl[i] = e.rl[i]<window.innerWidth ? 0 : e.rl[i];
					sl = nl[0];									
					for (var i in nl) if (sl>nl[i] && nl[i]>0) { sl = nl[i]; ix=i;}															
					var m = pw>(e.gw[ix]+e.tabw+e.thumbw) ? 1 : (pw-(e.tabw+e.thumbw)) / (e.gw[ix]);					
					newh =  (e.gh[ix] * m) + (e.tabh + e.thumbh);
				}				
				if(window.rs_init_css===undefined) window.rs_init_css = document.head.appendChild(document.createElement("style"));					
				document.getElementById(e.c).height = newh;
				window.rs_init_css.innerHTML += "#"+e.c+"_wrapper { height: "+newh+"px }";				
			} catch(e){
				console.log("Failure at Presize of Slider:" + e)
			}					   
		  };
	 */
	public static function js_set_start_size(){
		$script = '<script type="text/javascript">';		
		$script .= 'function setREVStartSize(t){try{var h,e=document.getElementById(t.c).parentNode.offsetWidth;if(e=0===e||isNaN(e)?window.innerWidth:e,t.tabw=void 0===t.tabw?0:parseInt(t.tabw),t.thumbw=void 0===t.thumbw?0:parseInt(t.thumbw),t.tabh=void 0===t.tabh?0:parseInt(t.tabh),t.thumbh=void 0===t.thumbh?0:parseInt(t.thumbh),t.tabhide=void 0===t.tabhide?0:parseInt(t.tabhide),t.thumbhide=void 0===t.thumbhide?0:parseInt(t.thumbhide),t.mh=void 0===t.mh||""==t.mh||"auto"===t.mh?0:parseInt(t.mh,0),"fullscreen"===t.layout||"fullscreen"===t.l)h=Math.max(t.mh,window.innerHeight);else{for(var i in t.gw=Array.isArray(t.gw)?t.gw:[t.gw],t.rl)void 0!==t.gw[i]&&0!==t.gw[i]||(t.gw[i]=t.gw[i-1]);for(var i in t.gh=void 0===t.el||""===t.el||Array.isArray(t.el)&&0==t.el.length?t.gh:t.el,t.gh=Array.isArray(t.gh)?t.gh:[t.gh],t.rl)void 0!==t.gh[i]&&0!==t.gh[i]||(t.gh[i]=t.gh[i-1]);var r,a=new Array(t.rl.length),n=0;for(var i in t.tabw=t.tabhide>=e?0:t.tabw,t.thumbw=t.thumbhide>=e?0:t.thumbw,t.tabh=t.tabhide>=e?0:t.tabh,t.thumbh=t.thumbhide>=e?0:t.thumbh,t.rl)a[i]=t.rl[i]<window.innerWidth?0:t.rl[i];for(var i in r=a[0],a)r>a[i]&&0<a[i]&&(r=a[i],n=i);var d=e>t.gw[n]+t.tabw+t.thumbw?1:(e-(t.tabw+t.thumbw))/t.gw[n];h=t.gh[n]*d+(t.tabh+t.thumbh)}void 0===window.rs_init_css&&(window.rs_init_css=document.head.appendChild(document.createElement("style"))),document.getElementById(t.c).height=h,window.rs_init_css.innerHTML+="#"+t.c+"_wrapper { height: "+h+"px }"}catch(t){console.log("Failure at Presize of Slider:"+t)}};';
		$script .= '</script>' . "\n";
		echo apply_filters('revslider_add_setREVStartSize', $script);
	}
	
	/**
	 * sets the post saving value to true, so that the output echo will not be done
	 **/
	public static function set_post_saving(){
		global $revslider_save_post;
		$revslider_save_post = true;
	}
	
	/**
	 * check the current post for the existence of a short code
	 * @before: hasShortcode()
	 */  
	public static function has_shortcode($shortcode = ''){  
		$found = false; 
		
		if(empty($shortcode)) return false;
		if(!is_singular()) return false;
		
		$post = get_post(get_the_ID());  
		if(stripos($post->post_content, '[' . $shortcode) !== false) $found = true;  
		
		return $found;  
	}

	/**
	 * Create Tables
	 * @only_base needs to be false
	 *  it can only be true by fixing database issues
	 *  this protects that the _bkp tables are not filled after 
	 *  we are already on version 6.0
	 **/
	public static function create_tables($only_base = false){
		$table_version = get_option('revslider_table_version', '1.0.0');
		
		if(version_compare($table_version, self::CURRENT_TABLE_VERSION, '<')){
			global $wpdb;

			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

			$sql = "CREATE TABLE " . $wpdb->prefix . self::TABLE_SLIDER . " (
			  id int(9) NOT NULL AUTO_INCREMENT,
			  title tinytext NOT NULL,
			  alias tinytext,
			  params LONGTEXT NOT NULL,
			  settings text NULL,
			  type VARCHAR(191) NOT NULL DEFAULT '',
			  UNIQUE KEY id (id)
			);";
			dbDelta($sql);

			$sql = "CREATE TABLE " . $wpdb->prefix . self::TABLE_SLIDES . " (
			  id int(9) NOT NULL AUTO_INCREMENT,
			  slider_id int(9) NOT NULL,
			  slide_order int not NULL,
			  params LONGTEXT NOT NULL,
			  layers LONGTEXT NOT NULL,
			  settings text NOT NULL DEFAULT '',
			  UNIQUE KEY id (id)
			);";
			dbDelta($sql);

			$sql = "CREATE TABLE " . $wpdb->prefix . self::TABLE_STATIC_SLIDES . " (
			  id int(9) NOT NULL AUTO_INCREMENT,
			  slider_id int(9) NOT NULL,
			  params LONGTEXT NOT NULL,
			  layers LONGTEXT NOT NULL,
			  settings text NOT NULL,
			  UNIQUE KEY id (id)
			);";
			dbDelta($sql);

			$sql = "CREATE TABLE " . $wpdb->prefix . self::TABLE_CSS . " (
			  id int(9) NOT NULL AUTO_INCREMENT,
			  handle TEXT NOT NULL,
			  settings LONGTEXT,
			  hover LONGTEXT,
			  advanced LONGTEXT,
			  params LONGTEXT NOT NULL,
			  UNIQUE KEY id (id)
			);";
			dbDelta($sql);

			$sql = "CREATE TABLE " . $wpdb->prefix . self::TABLE_LAYER_ANIMATIONS . " (
			  id int(9) NOT NULL AUTO_INCREMENT,
			  handle TEXT NOT NULL,
			  params TEXT NOT NULL,
			  settings text NULL,
			  UNIQUE KEY id (id)
			);";
			dbDelta($sql);

			$sql = "CREATE TABLE " . $wpdb->prefix . self::TABLE_NAVIGATIONS . " (
			  id int(9) NOT NULL AUTO_INCREMENT,
			  name VARCHAR(191) NOT NULL,
			  handle VARCHAR(191) NOT NULL,
			  type VARCHAR(191) NOT NULL,
			  css LONGTEXT NOT NULL,
			  markup LONGTEXT NOT NULL,
			  settings LONGTEXT NULL,
			  UNIQUE KEY id (id)
			);";
			dbDelta($sql);

			//create CSS entries
			$result = $wpdb->get_row("SELECT COUNT( DISTINCT id ) AS NumberOfEntrys FROM " . $wpdb->prefix . self::TABLE_CSS);
			if(!empty($result) && $result->NumberOfEntrys == 0){
				$css_class = new RevSliderCssParser();
				$css_class->import_css_captions();
			}

			update_option('revslider_table_version', self::CURRENT_TABLE_VERSION);
			//$table_version = self::CURRENT_TABLE_VERSION;
		}
		
		
		/**
		 * check if table version is below 1.0.8.
		 * if yes, duplicate the tables into _bkp
		 * this way, we can revert back to v5 if any slider
		 * has issues in the v6 migration process
		 **/
		if(version_compare($table_version, '1.0.8', '<') && ($only_base === false || $only_base === '')){
			global $wpdb;
			
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			
			$sql = "CREATE TABLE IF NOT EXISTS ".$wpdb->prefix . self::TABLE_SLIDER."_bkp LIKE ".$wpdb->prefix . self::TABLE_SLIDER.";";
			dbDelta($sql);
			$result = $wpdb->get_row("SELECT EXISTS (SELECT 1 FROM ".$wpdb->prefix . self::TABLE_SLIDER."_bkp) AS `exists`;", ARRAY_A);
			if(!empty($result) && isset($result['exists']) && $result['exists'] === '0'){
				$sql = "INSERT ".$wpdb->prefix . self::TABLE_SLIDER."_bkp SELECT * FROM ".$wpdb->prefix . self::TABLE_SLIDER.";";
				$wpdb->query($sql);
			}
			
			$sql = "CREATE TABLE IF NOT EXISTS ".$wpdb->prefix . self::TABLE_SLIDES."_bkp LIKE ".$wpdb->prefix . self::TABLE_SLIDES.";";
			dbDelta($sql);
			$result = $wpdb->get_row("SELECT EXISTS (SELECT 1 FROM ".$wpdb->prefix . self::TABLE_SLIDES."_bkp) AS `exists`;", ARRAY_A);
			if(!empty($result) && isset($result['exists']) && $result['exists'] === '0'){
				$sql = "INSERT ".$wpdb->prefix . self::TABLE_SLIDES."_bkp SELECT * FROM ".$wpdb->prefix . self::TABLE_SLIDES.";";
				$wpdb->query($sql);
			}
			
			$sql = "CREATE TABLE IF NOT EXISTS ".$wpdb->prefix . self::TABLE_STATIC_SLIDES."_bkp LIKE ".$wpdb->prefix . self::TABLE_STATIC_SLIDES.";";
			dbDelta($sql);
			$result = $wpdb->get_row("SELECT EXISTS (SELECT 1 FROM ".$wpdb->prefix . self::TABLE_STATIC_SLIDES."_bkp) AS `exists`;", ARRAY_A);
			if(!empty($result) && isset($result['exists']) && $result['exists'] === '0'){
				$sql = "INSERT ".$wpdb->prefix . self::TABLE_STATIC_SLIDES."_bkp SELECT * FROM ".$wpdb->prefix . self::TABLE_STATIC_SLIDES.";";
				$wpdb->query($sql);
			}
			
			$sql = "CREATE TABLE IF NOT EXISTS ".$wpdb->prefix . self::TABLE_CSS."_bkp LIKE ".$wpdb->prefix . self::TABLE_CSS.";";
			dbDelta($sql);
			$result = $wpdb->get_row("SELECT EXISTS (SELECT 1 FROM ".$wpdb->prefix . self::TABLE_CSS."_bkp) AS `exists`;", ARRAY_A);
			if(!empty($result) && isset($result['exists']) && $result['exists'] === '0'){
				$sql = "INSERT ".$wpdb->prefix . self::TABLE_CSS."_bkp SELECT * FROM ".$wpdb->prefix . self::TABLE_CSS.";";
				$wpdb->query($sql);
			}
			
			$sql = "CREATE TABLE IF NOT EXISTS ".$wpdb->prefix . self::TABLE_LAYER_ANIMATIONS."_bkp LIKE ".$wpdb->prefix . self::TABLE_LAYER_ANIMATIONS.";";
			dbDelta($sql);
			$result = $wpdb->get_row("SELECT EXISTS (SELECT 1 FROM ".$wpdb->prefix . self::TABLE_LAYER_ANIMATIONS."_bkp) AS `exists`;", ARRAY_A);
			if(!empty($result) && isset($result['exists']) && $result['exists'] === '0'){
				$sql = "INSERT ".$wpdb->prefix . self::TABLE_LAYER_ANIMATIONS."_bkp SELECT * FROM ".$wpdb->prefix . self::TABLE_LAYER_ANIMATIONS.";";
				$wpdb->query($sql);
			}
			
			$sql = "CREATE TABLE IF NOT EXISTS ".$wpdb->prefix . self::TABLE_NAVIGATIONS."_bkp LIKE ".$wpdb->prefix . self::TABLE_NAVIGATIONS.";";
			dbDelta($sql);
			$result = $wpdb->get_row("SELECT EXISTS (SELECT 1 FROM ".$wpdb->prefix . self::TABLE_NAVIGATIONS."_bkp) AS `exists`;", ARRAY_A);
			if(!empty($result) && isset($result['exists']) && $result['exists'] === '0'){
				$sql = "INSERT ".$wpdb->prefix . self::TABLE_NAVIGATIONS."_bkp SELECT * FROM ".$wpdb->prefix . self::TABLE_NAVIGATIONS.";";
				$wpdb->query($sql);
			}
		}
	}
	
	
	/**
	 * get the images from posts/pages for yoast seo
	 **/
	public static function get_images_for_seo($url, $type, $user){
		if(in_array($type, array('user', 'term'), true)) return $url;
		if(!is_object($user) || !isset($user->ID)) return $url;
		
		$post = get_post($user->ID);
		if(is_a($post, 'WP_Post') && has_shortcode($post->post_content, 'rev_slider')){
			preg_match_all('/\[rev_slider.*alias=.(.*)"\]/', $post->post_content, $shortcodes);
			
			if(isset($shortcodes[1]) && $shortcodes[1] !== ''){
				foreach($shortcodes[1] as $s){
					if(!RevSliderSlider::alias_exists($s)) continue;
					
					$sldr = new RevSliderSlider();
					$sldr->init_by_alias($s);
					$sldr->get_slides();
					$imgs = $sldr->get_images();
					if(!empty($imgs)){
						if(!isset($url['images'])) $url['images'] = array();
						foreach($imgs as $v){
							$url['images'][] = $v;
						}
					}
				}
			}
		}
		
		return $url;
	}
	
}

?>