<?php
/*
* @Author: 		ParaTheme
* @Folder:		Team/Templates
* @version:		3.0.5

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 



	$is_product = get_post_type( get_the_ID() );
	$active_plugins = get_option('active_plugins');
	
	if(in_array( 'woocommerce/woocommerce.php', (array) $active_plugins ) && $is_product=='product')
	{

		$cart = do_shortcode('[add_to_cart id="'.get_the_ID().'"]');
		$html .= '<div class="cart">'.$cart.'</div>';

	
	}
