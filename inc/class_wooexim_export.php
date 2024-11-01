<?php

if (!defined('ABSPATH'))
    die("Can't load this file directly");
	
class wooexim_import_export{

	function wooexim_import_export()
	{
		global $woocommerce;
    	
		$plugins = get_option('active_plugins');
		
		if(!function_exists('is_plugin_active_for_network'))
		{
			require_once(ABSPATH.'wp-admin/includes/plugin.php');
		}
	
		$required_woo_plugin = 'woocommerce/woocommerce.php';
			
		if (in_array( $required_woo_plugin , $plugins ) || is_plugin_active_for_network($required_woo_plugin)) {
		
			if( class_exists( 'Woocommerce' ) ){
				$this->wooexim_set_action();
			}else{
				add_action( 'woocommerce_loaded', array( &$this, 'wooexim_set_action' ) );
			}
		}
		
	}
	
	function wooexim_set_action()
	{
		add_action( 'admin_enqueue_scripts', array( &$this, 'wooexim_set_admin_css' ),10);
		add_action( 'admin_enqueue_scripts', array( &$this, 'wooexim_set_admin_js' ),10);
		add_action( 'admin_head',  array($this, 'wooexim_hide_all_notice_to_admin_side'), 10000 );
  	} 
	
	function wooexim_set_admin_css()
	{
		wp_register_style( 'wooexim_admin_css', plugins_url('../css/wooexim.css', __FILE__) );
		wp_register_style( 'wooexim_style_css', plugins_url('../css/style.css', __FILE__) );
		wp_register_style( 'wooexim_colorbox_css', plugins_url('../css/colorbox.css', __FILE__) );
		wp_enqueue_style( 'wooexim_admin_css' );
		wp_enqueue_style( 'wooexim_style_css' );
		wp_enqueue_style( 'wooexim_colorbox_css' );
	}
	function wooexim_set_admin_js()
	{
		wp_register_script( 'wooexim_js_custom', plugins_url('../js/custom.js', __FILE__));
		wp_register_script( 'wooexim_js_bpopup', plugins_url('../js/jquery.bpopup.min.js', __FILE__));
		wp_register_script( 'wooexim_js_colorbox', plugins_url('../js/jquery.colorbox.js', __FILE__));

		if(isset($_REQUEST['page']) &&  ($_REQUEST['page'] == 'wooexim-export'))
		{
			wp_enqueue_script( 'wooexim_js_custom' );
			wp_enqueue_script( 'wooexim_js_bpopup' );
			wp_enqueue_script( 'wooexim_js_colorbox' );
		}
	}

	function wooexim_hide_all_notice_to_admin_side()
	{
 		if(isset($_REQUEST['page']) &&  ($_REQUEST['page'] == 'wooexim-dashboard' || $_REQUEST['page'] == 'wooexim-export' || $_REQUEST['page'] == 'wooexim-archive' || $_REQUEST['page'] == 'wooexim-import' || $_REQUEST['page'] == 'wooexim-settings'))
		{
			remove_all_actions( 'admin_notices',10000 );
			remove_all_actions( 'all_admin_notices',10000 );
			remove_all_actions( 'network_admin_notices',10000 );
			remove_all_actions( 'user_admin_notices',10000 );
			add_action( 'admin_head', 'hide_update_notice_to_all_but_admin_users', 1 );
			
		}
	}
}
?>