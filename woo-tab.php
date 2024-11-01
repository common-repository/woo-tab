<?php
/*
Plugin Name: Woo Tabs
Plugin URI: http://paratheme.com/items/tabs-html-css3-responsive-tabs-for-wordpress/
Description: Fully responsive and mobile ready content tabs grid for wordpress.
Version: 1.0.0
Author: projectWP
Author URI: http://paratheme.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

define('woo_tab_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('woo_tab_plugin_dir', plugin_dir_path( __FILE__ ) );
define('woo_tab_wp_url', 'http://wordpress.org/plugins/timeline-ultimate' );
define('woo_tab_wp_reviews', 'http://wordpress.org/support/view/plugin-reviews/woo_tab' );
define('woo_tab_pro_url', 'http://paratheme.com/items/woo_tab-html-css3-responsive-woo_tab-for-wordpress/' );
define('woo_tab_demo_url', 'http://paratheme.com' );
define('woo_tab_conatct_url', 'http://paratheme.com/contact' );
define('woo_tab_qa_url', 'http://paratheme.com/qa/' );
define('woo_tab_plugin_name', 'Woo Tabs' );
define('woo_tab_share_url', 'https://wordpress.org/plugins/woo_tab/' );
define('woo_tab_tutorial_video_url', '//www.youtube.com/embed/8OiNCDavSQg?rel=0' );

require_once( plugin_dir_path( __FILE__ ) . 'includes/tabs-meta.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/tabs-functions.php');


//Themes php files
require_once( plugin_dir_path( __FILE__ ) . 'themes/flat/index.php');



function woo_tab_init_scripts()
	{
		wp_enqueue_script('jquery');
		wp_enqueue_script('woo_tab_js', plugins_url( '/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_enqueue_script('jquery.responsiveTabs', plugins_url( '/js/jquery.responsiveTabs.js' , __FILE__ ) , array( 'jquery' ));	
					
		wp_enqueue_style('woo_tab_style', woo_tab_plugin_url.'css/style.css');
		wp_enqueue_style('responsive-tabs', woo_tab_plugin_url.'css/responsive-tabs.css');		

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'woo_tab_color_picker', plugins_url('/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		
		wp_enqueue_style('font-awesome', woo_tab_plugin_url.'css/font-awesome.css');

		//ParaAdmin
		wp_enqueue_style('ParaAdmin', woo_tab_plugin_url.'ParaAdmin/css/ParaAdmin.css');
		//wp_enqueue_style('ParaIcons', woo_tab_plugin_url.'ParaAdmin/css/ParaIcons.css');		
		wp_enqueue_script('ParaAdmin', plugins_url( 'ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));


		// Style for themes
		wp_enqueue_style('woo_tab-style-flat', woo_tab_plugin_url.'themes/flat/style.css');			
		wp_enqueue_style('woo_tab-style-woocommerce', woo_tab_plugin_url.'themes/product-grid/style.css');	
	}
add_action("init","woo_tab_init_scripts");





	function woo_tab_display($atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'id' => "",
			), $atts);

		$post_id = $atts['id'];
		$woo_tab_themes = get_post_meta( $post_id, 'woo_tab_themes', true );
		$html = '';
		
		$html.= woo_tab_body_flat($post_id);
	
		return $html;
			

	}
	add_shortcode('woo_tab', 'woo_tab_display');

	
	function woo_tab_grid_display($atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'id' => "",
				'content_source' => "recent",
				'total_items' => 10,
			), $atts);

		$post_id = $atts['id'];
		$content_source = $atts['content_source'];
		$total_items = $atts['total_items'];
		

		
		$query_order = 'ASC';
		
		$html = '' ;
		
		
		include plugin_dir_path( __FILE__ ) . 'themes/product-grid/index.php';
		
		return $html;
	}
	add_shortcode('woo_tab_grid', 'woo_tab_grid_display');




