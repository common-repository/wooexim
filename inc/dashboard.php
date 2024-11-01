<?php
	if (!defined('ABSPATH'))
    die("Can't load this file directly");

	global $wooexim_import;

	$product_cat = $wooexim_import -> wooexim_get_product_category();
	$product_cat_total = count($product_cat)<1000?count($product_cat):'1000+';

	$product_list = $wooexim_import -> wooexim_get_product();
	$product_total = count($product_list)<1000?count($product_list):'1000+';

?>

<div class="wooexim-wrapper">
	<div class="banner">
		<div class="logo">
			<img src="<?php echo WOOEXIM_IMG_URL . '/thumb.jpg'; ?>" />
			<h3><?php _e('WOOEXIM - WooCommerce Export Import Plugin',WOOEXIM_TEXTDOMAIN);?></h3>
		</div>
	</div>
	<div class="blocks">
		<div class="block pro-block">
			<h4><?php _e('WOOEXIM Pro',WOOEXIM_TEXTDOMAIN);?></h4>
			<p><?php _e('with all features listed bellow',WOOEXIM_TEXTDOMAIN);?></p>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="pro-feature" target="_blank"><?php _e('Download',WOOEXIM_TEXTDOMAIN);?></a>
		</div>
		<div class="block">
			<h4><?php _e('Product Export',WOOEXIM_TEXTDOMAIN);?></h4>
			<p><?php _e('Export products to CSV with multiple filters and export options. Supports all types of products, custom fields, attributes and more.',WOOEXIM_TEXTDOMAIN);?></p>
			<a href="<?php echo admin_url('admin.php?page=wooexim-export');?>" class="goto"><?php _e('Export',WOOEXIM_TEXTDOMAIN);?></a>
			<span class="count"><?php echo $product_total;?></span>
		</div>

		<div class="block">
			<h4><?php _e('Product Import',WOOEXIM_TEXTDOMAIN);?></h4>
			<p><?php _e('Import products from CSV with multiple import options. Supports all types of products, status, create or update and more.',WOOEXIM_TEXTDOMAIN);?></p>
			<a href="<?php echo admin_url('admin.php?page=wooexim-import');?>" class="goto"><?php _e('Import',WOOEXIM_TEXTDOMAIN);?></a>
		</div>

		<div class="block">
			<h4><?php _e('Configuration',WOOEXIM_TEXTDOMAIN);?></h4>
			<p><?php _e('Set your preffered upload folder, csv file separator, category hierarchy separator, export archive parameters here.',WOOEXIM_TEXTDOMAIN);?></p>
			<a href="<?php echo admin_url('admin.php?page=wooexim-settings');?>" class="goto"><?php _e('Configure',WOOEXIM_TEXTDOMAIN);?></a>
		</div>

		<div class="block">
			<h4><?php _e('Export Archive',WOOEXIM_TEXTDOMAIN);?></h4>
			<p><?php _e('Manage all your export archive from here. You download your expotrted csv file from here and delete them.',WOOEXIM_TEXTDOMAIN);?></p>
			<a href="<?php echo admin_url('admin.php?page=wooexim-archive');?>" class="goto"><?php _e('Archive',WOOEXIM_TEXTDOMAIN);?></a>
		</div>

		<div class="block">
			<h4><?php _e('Order Export',WOOEXIM_TEXTDOMAIN);?></h4>
			<p><?php _e('Export orders to CSV with multiple filters and export options. Supports all types of orders, custom fields, attributes and more.',WOOEXIM_TEXTDOMAIN);?></p>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="pro-feature" target="_blank"><?php _e('Pro Feature',WOOEXIM_TEXTDOMAIN);?></a>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="goto" target="_blank"><?php _e('Get Pro',WOOEXIM_TEXTDOMAIN);?></a>
			<span class="count">530</span>
		</div>
		<div class="block">
			<h4><?php _e('Order Import',WOOEXIM_TEXTDOMAIN);?></h4>
			<p><?php _e('Import orders from CSV with multiple import options. Supports all types of orders, status, create or update and more.',WOOEXIM_TEXTDOMAIN);?></p>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="pro-feature" target="_blank"><?php _e('Pro Feature',WOOEXIM_TEXTDOMAIN);?></a>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="goto" target="_blank"><?php _e('Get Pro',WOOEXIM_TEXTDOMAIN);?></a>
		</div>
		<div class="block">
			<h4><?php _e('Customer Export',WOOEXIM_TEXTDOMAIN);?></h4>
			<p><?php _e('Export customers to CSV with multiple group and export options. Supports all group of users, custom fields and more.',WOOEXIM_TEXTDOMAIN);?></p>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="pro-feature" target="_blank"><?php _e('Pro Feature',WOOEXIM_TEXTDOMAIN);?></a>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="goto" target="_blank"><?php _e('Get Pro',WOOEXIM_TEXTDOMAIN);?></a>
			<span class="count">119</span>
		</div>
		<div class="block">
			<h4><?php _e('Customer Import',WOOEXIM_TEXTDOMAIN);?></h4>
			<p><?php _e('Import customers from CSV with multiple import options. Supports all groups of users, status, create or update and more.',WOOEXIM_TEXTDOMAIN);?></p>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="pro-feature" target="_blank"><?php _e('Pro Feature',WOOEXIM_TEXTDOMAIN);?></a>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="goto" target="_blank"><?php _e('Get Pro',WOOEXIM_TEXTDOMAIN);?></a>
		</div>
		<div class="block">
			<h4><?php _e('Category Export',WOOEXIM_TEXTDOMAIN);?></h4>
			<p><?php _e('Export product categories to CSV with product hierarchy and export options. Supports all types of product categories.',WOOEXIM_TEXTDOMAIN);?></p>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="pro-feature" target="_blank"><?php _e('Pro Feature',WOOEXIM_TEXTDOMAIN);?></a>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="goto" target="_blank"><?php _e('Get Pro',WOOEXIM_TEXTDOMAIN);?></a>
			<span class="count"><?php echo $product_cat_total;?></span>
		</div>
		<div class="block">
			<h4><?php _e('Category Import',WOOEXIM_TEXTDOMAIN);?></h4>
			<p><?php _e('Import product categories from CSV with categ hierarchy and multiple import options. Supports all types of product categories.',WOOEXIM_TEXTDOMAIN);?></p>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="pro-feature" target="_blank"><?php _e('Pro Feature',WOOEXIM_TEXTDOMAIN);?></a>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="goto" target="_blank"><?php _e('Get Pro',WOOEXIM_TEXTDOMAIN);?></a>
		</div>
		<div class="block">
			<h4><?php _e('Coupon Export',WOOEXIM_TEXTDOMAIN);?></h4>
			<p><?php _e('Export coupons to CSV with multiple export options. Supports all types coupons.',WOOEXIM_TEXTDOMAIN);?></p>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="pro-feature" target="_blank"><?php _e('Pro Feature',WOOEXIM_TEXTDOMAIN);?></a>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="goto" target="_blank"><?php _e('Get Pro',WOOEXIM_TEXTDOMAIN);?></a>
			<span class="count">7</span>
		</div>
		<div class="block">
			<h4><?php _e('Coupon Import',WOOEXIM_TEXTDOMAIN);?></h4>
			<p><?php _e('Import coupons from CSV with multiple import options. Supports all types of coupons.',WOOEXIM_TEXTDOMAIN);?></p>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="pro-feature" target="_blank"><?php _e('Pro Feature',WOOEXIM_TEXTDOMAIN);?></a>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="goto" target="_blank"><?php _e('Get Pro',WOOEXIM_TEXTDOMAIN);?></a>
		</div>
		<div class="block">
			<h4><?php _e('Scheduele Export',WOOEXIM_TEXTDOMAIN);?></h4>
			<p><?php _e('You can create scheduled export of products, categories, coupons and customers in a single click and the period can be daily or monthly or yearly.',WOOEXIM_TEXTDOMAIN);?></p>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="pro-feature" target="_blank"><?php _e('Pro Feature',WOOEXIM_TEXTDOMAIN);?></a>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="goto" target="_blank"><?php _e('Get Pro',WOOEXIM_TEXTDOMAIN);?></a>
		</div>
		<div class="block">
			<h4><?php _e('Export to Email',WOOEXIM_TEXTDOMAIN);?></h4>
			<p><?php _e('Create export schedule of products, categories, coupons and customers and set the email where it will send.',WOOEXIM_TEXTDOMAIN);?></p>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="pro-feature" target="_blank"><?php _e('Pro Feature',WOOEXIM_TEXTDOMAIN);?></a>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="goto" target="_blank"><?php _e('Get Pro',WOOEXIM_TEXTDOMAIN);?></a>
		</div>
		<div class="block">
			<h4><?php _e('Customize Field',WOOEXIM_TEXTDOMAIN);?></h4>
			<p><?php _e('You always can customize the fields and assign the field name beautifully for export file header.',WOOEXIM_TEXTDOMAIN);?></p>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="pro-feature" target="_blank"><?php _e('Pro Feature',WOOEXIM_TEXTDOMAIN);?></a>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="goto" target="_blank"><?php _e('Get Pro',WOOEXIM_TEXTDOMAIN);?></a>
		</div>
		<div class="block">
			<h4><?php _e('Export Preview',WOOEXIM_TEXTDOMAIN);?></h4>
			<p><?php _e('Before downloading the export file you can have a export preview window.',WOOEXIM_TEXTDOMAIN);?></p>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="pro-feature" target="_blank"><?php _e('Pro Feature',WOOEXIM_TEXTDOMAIN);?></a>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="goto" target="_blank"><?php _e('Get Pro',WOOEXIM_TEXTDOMAIN);?></a>
		</div>
		<div class="block">
			<h4><?php _e('Import Preview',WOOEXIM_TEXTDOMAIN);?></h4>
			<p><?php _e('You can see a preview of data when importing and make your choices.',WOOEXIM_TEXTDOMAIN);?></p>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="pro-feature" target="_blank"><?php _e('Pro Feature',WOOEXIM_TEXTDOMAIN);?></a>
			<a href="<?php echo WOOEXIM_PLUGIN_SITE;?>" class="goto" target="_blank"><?php _e('Get Pro',WOOEXIM_TEXTDOMAIN);?></a>
		</div>

	</div>
</div>
