<?php 
/*
Plugin Name: WOOEXIM - WooCommerce Export Import Plugin
Plugin URI: http://wooexim.com
Description: Export products, orders, categories, customers and coupons with all the meta informations of your store out of WooCommerce into a CSV Spreadsheet file. And Import products from any CSV file.
Version: 5.0.0
Author: WOOEXIM.COM
Author URI: http://wooexim.com
License: GPL2
*/

define ( 'WOOEXIM_PATH' , plugin_dir_url( __FILE__ ) );
define ( 'WOOEXIM_INC_APP_PATH' , plugin_dir_url( __FILE__ )."inc/" );
define ( 'WOOEXIM_INC_PATH' , "inc/" );
define ( 'WOOEXIM_CSS_URL' , "css/" );
define ( 'WOOEXIM_JS_URL' , "js/" );
define ( 'WOOEXIM_IMG_URL' , plugin_dir_url( __FILE__ ) . "img/" );
define ( 'WOOEXIM_EXPORT_DIR' , '' );
define ( 'WOOEXIM_TEXTDOMAIN' , 'wooexim-import' );
define ( 'WOOEXIM_PLUGIN_SITE' , 'http://wooexim.com/' );
$url = get_admin_url().'admin.php?page=wooexim-export';
define ( 'WOOEXIM_EXPORT_ADMIN_URL' , $url );
$path = wp_upload_dir();
$wooexim_export = substr($path['path'], 0, -7) . "WOOEXIM_EXPORT";
if(!is_dir($wooexim_export))
	mkdir( $wooexim_export );
define ( 'WOOEXIM_EXPORT_PATH' , $wooexim_export );
define ( 'WOOEXIM_DOWNLOAD_PATH' ,substr($path['url'], 0, -7) . "WOOEXIM_EXPORT/" );

function get_dynamic_position($start, $increment = 0.1){
	foreach ($GLOBALS['menu'] as $key => $menu) {
		$menus_positions[] = $key;
	}
	if (!in_array($start, $menus_positions)) return $start;
	
	while (in_array($start, $menus_positions)) {
		$start += $increment;
	}
	return $start;
}

class WOOEXIM_Import {
	
	public function __construct() {
		add_action( 'init', array( 'WOOEXIM_Import', 'translations' ), 1 );
		add_action('admin_menu', array('WOOEXIM_Import', 'admin_menu'));
		add_action('wp_ajax_wooexim-import-ajax', array('WOOEXIM_Import', 'render_ajax_action'));
	}

	public function translations() {
		load_plugin_textdomain( WOOEXIM_TEXTDOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
	}

	public function admin_menu() {
		$menu_place = get_dynamic_position(28.1 , .1);
		add_menu_page( 'WOOEXIM', 'WOOEXIM', 'manage_options', 'wooexim-dashboard', '', WOOEXIM_IMG_URL.'/wooexim.png',(string)$menu_place);
		add_submenu_page( 'wooexim-dashboard', 'WOOEXIM Dashboard', 'Dashboard', 'manage_options', 'wooexim-dashboard', array('WOOEXIM_Import', 'wooexim_page_dashboard'));
		add_submenu_page( 'wooexim-dashboard', 'WOOEXIM Import Product', 'Import', 'manage_options', 'wooexim-import', array('WOOEXIM_Import', 'render_admin_action'));
	}

	public function wooexim_page_dashboard(){
		include( WOOEXIM_INC_PATH.'/dashboard.php' );
	}
	
	public	function wooexim_get_product_category(){
		$query_args = array(
						'taxonomy'   => 'product_cat',
						'hide_empty' => false,
						'number' 	=> 2000,
						'orderby' => 'id',
						'order' => 'ASC'
					);
		$product_category = get_terms('product_cat',$query_args);
		return $product_category;
	}
	
	public function wooexim_get_product(){
		$query_args = array(
						'posts_per_page' 	=> 2000,
						'post_type'   		=> 'product',
						'orderby' 			=> 'post_date',
						'order' 			=> 'ASC',
					);
		$product_results = new WP_Query( $query_args );
		$product_list = $product_results->get_posts();
		return $product_list;
	}
	
	
	public function render_admin_action() {
		$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'upload';
		require_once(plugin_dir_path(__FILE__).'inc/wooexim-import-common.php');
		require_once(plugin_dir_path(__FILE__)."inc/wooexim-import-{$action}.php");
	}
	
	public function render_ajax_action() {
		require_once(plugin_dir_path(__FILE__)."inc/wooexim-import-ajax.php");
		die(); // this is required to return a proper result
	}
}

function hide_update_notice_to_all_but_admin_users() 
{
    remove_action( 'admin_notices', 'update_nag', 3 );
}

$wooexim_import = new WOOEXIM_Import();	

require_once( WOOEXIM_INC_PATH.'class_wooexim_export.php' );
require_once( WOOEXIM_INC_PATH.'wooexim-export.php' );
require_once( WOOEXIM_INC_PATH.'wooexim-save-settings.php' );
require_once( WOOEXIM_INC_PATH.'wooexim-spreadsheet.php' );
require_once( WOOEXIM_EXPORT_DIR.'lib/PHPExcel.php' );

$wooexim_import_export = new wooexim_import_export();
$wooexim_export  = new Woo_wooexim_export();
?>