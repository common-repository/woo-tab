<?php
/*
* @Author: 		ParaTheme
* @Folder:		Team/Templates
* @version:		3.0.5

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'thumbnail' );
	$thumb_url = $thumb['0'];		

	$html .= '
	<div class="thumb">
		<img post_id="'.get_the_ID().'" src="'.$thumb_url.'" />
	</div >';	
	