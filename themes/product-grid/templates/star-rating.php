<?php
/*
* @Author: 		ParaTheme
* @Folder:		Team/Templates
* @version:		3.0.5

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


	global $product;
	$rating = $product->get_average_rating();
	$rating = (($rating/5)*100);
	
	 
	if( $rating > 0 )
		$html .= '<div class="woocommerce rating"><div class="woocommerce-product-rating"><div class="star-rating" style="color:#333333; padding-bottom:10px;" title="'.__('Rated','woo_tab').' '.$rating.'"><span style="width:'.$rating.'%;"></span></div></div></div>';