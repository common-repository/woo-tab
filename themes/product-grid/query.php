<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

	global $wp_query;
	
	if(($content_source=="recent"))
		{
		
			$wp_query = new WP_Query(
				array (
					'post_type' => 'product',
					'post_status' => 'publish',
					'order' => $query_order,
					'posts_per_page' => $total_items,
					
					) );

		}		
	else if(($content_source=="featured"))
		{
		
			$wp_query = new WP_Query(
				array (
					'post_type' => 'product',
					'post_status' => 'publish',
					'order' => $query_order,
					'meta_query' => array(
						array(
							'key' => '_featured',
							'value' => 'yes',
							)),
					'posts_per_page' => $total_items,
					
					) );

		}
	else if(($content_source=="on_sale"))
		{
		
			$wp_query = new WP_Query(
				array (
					'post_type' => 'product',
					'post_status' => 'publish',
					'order' => $query_order,
					'posts_per_page' => $total_items,
					'meta_query' => array(
							array(
							'key' => '_visibility',
							'value' => array('catalog', 'visible'),
							'compare' => 'IN'
							),
							array(
							'key' => '_sale_price',
							'value' => 0,
							'compare' => '>',
							'type' => 'NUMERIC'
							)
							) ));

		}		

	else
		{
			$wp_query = new WP_Query(
				array (
					'post_type' => 'product',
					'post_status' => 'publish',
					'order_by' => 'date',
					'order' => 'DESC',
					'posts_per_page' => $total_items,
					
					
					) );
		
		}