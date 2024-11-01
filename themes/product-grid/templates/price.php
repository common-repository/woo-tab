<?php
/*
* @Author: 		ParaTheme
* @Folder:		Team/Templates
* @version:		3.0.5

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


	global $product;
	$is_product = get_post_type( get_the_ID() );
	$active_plugins = get_option('active_plugins');
	
	if(in_array( 'woocommerce/woocommerce.php', (array) $active_plugins ) && $is_product=='product')
	{
		$price = $product->get_price_html();

		$html .= '<div class="price">'.$price.'</div>';

	
	}
