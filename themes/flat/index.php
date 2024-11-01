<?php

function woo_tab_body_flat($post_id)
	{
		
		
		
		$woo_tab_bg_img = get_post_meta( $post_id, 'woo_tab_bg_img', true );
		$woo_tab_themes = get_post_meta( $post_id, 'woo_tab_themes', true );

		$woo_tab_default_bg_color = get_post_meta( $post_id, 'woo_tab_default_bg_color', true );	
		$woo_tab_active_bg_color = get_post_meta( $post_id, 'woo_tab_active_bg_color', true );
		
		$woo_tab_items_title_color = get_post_meta( $post_id, 'woo_tab_items_title_color', true );			
		$woo_tab_items_title_font_size = get_post_meta( $post_id, 'woo_tab_items_title_font_size', true );		

		$woo_tab_items_content_color = get_post_meta( $post_id, 'woo_tab_items_content_color', true );
		$woo_tab_items_content_font_size = get_post_meta( $post_id, 'woo_tab_items_content_font_size', true );

		
		$woo_tab_items_thumb_size = get_post_meta( $post_id, 'woo_tab_items_thumb_size', true );
		$woo_tab_items_thumb_max_hieght = get_post_meta( $post_id, 'woo_tab_items_thumb_max_hieght', true );
		
		$woo_tab_ribbon_name = get_post_meta( $post_id, 'woo_tab_ribbon_name', true );		
		
		$woo_tab_content_title = get_post_meta( $post_id, 'woo_tab_content_title', true );
		$woo_tab_content_title_icon = get_post_meta( $post_id, 'woo_tab_content_title_icon', true );
		$woo_tab_content_title_icon_custom = get_post_meta( $post_id, 'woo_tab_content_title_icon_custom', true );			
		$woo_tab_content_body = get_post_meta( $post_id, 'woo_tab_content_body', true );
		
		$woo_tab_active = get_post_meta( $post_id, 'woo_tab_active', true );

		$woo_tab_items_collapsible = get_post_meta( $post_id, 'woo_tab_items_collapsible', true );	
		$woo_tab_items_animation = get_post_meta( $post_id, 'woo_tab_items_animation', true );
		$woo_tab_items_animation_duration = get_post_meta( $post_id, 'woo_tab_items_animation_duration', true );	
		
		$html = '';

		$html .= '<div id="responsiveTabs-'.$post_id.'"  class="woo_tab-container woo_tab-'.$woo_tab_themes.'" style="background-image:url('.$woo_tab_bg_img.')">';
		$total_row = count($woo_tab_content_title);
		

		$html.= '<ul  id="woo_tab-'.$post_id.'" class="woo_tab-nav">';
		
		
		
		foreach ($woo_tab_content_title as $index => $woo_tab_title)
		{

			
			if(empty($woo_tab_content_title_icon_custom[$index]))
				{
					$icon_fa = $woo_tab_content_title_icon[$index];
					$icon = '<i class="fa fa-'.$icon_fa.'"></i>';
				}
			else
				{
					$icon_custom = $woo_tab_content_title_icon_custom[$index];
					$icon = '<span style="background-image:url('.$icon_custom.');width:'.$woo_tab_items_title_font_size.';height:'.$woo_tab_items_title_font_size.';" class="fa-custom"></span>';
				}
			
				$html.= '<li class="woo_tab-nav-items">';
				$html.= '<a style="color:'.$woo_tab_items_title_color.';font-size:'.$woo_tab_items_title_font_size.'" href="#tab-'.$post_id.'-'.$index.'">'.$icon.$woo_tab_title.'</a>';		
				$html.= '</li>';
			}					
		$html.= '</ul>';
		
		foreach ($woo_tab_content_body as $index => $woo_tab_content)
			{
				$html.= '<div style="color:'.$woo_tab_items_content_color.';font-size:'.$woo_tab_items_content_font_size.'" id="tab-'.$post_id.'-'.$index.'" class="woo_tab-content">';
				$html.= do_shortcode(wpautop($woo_tab_content));		
				$html.= '</div>';
			
			}
		
		
		
		
		



			
		$html .= '</div>';
		
		
		$html .= '<style type="text/css">
		
		#responsiveTabs-'.$post_id.' ul.woo_tab-nav li.woo_tab-nav-items,
		#responsiveTabs-'.$post_id.'  .r-tabs-accordion-title{
			
			background: '.$woo_tab_default_bg_color.';
			}
		
		
		#responsiveTabs-'.$post_id.' ul.woo_tab-nav li.r-tabs-state-active ,
		#responsiveTabs-'.$post_id.' div.r-tabs-state-active ,
		#responsiveTabs-'.$post_id.' div.woo_tab-content ,		
		#responsiveTabs-'.$post_id.' .r-woo_tab-panel.r-tabs-state-active{
			
			background: '.$woo_tab_active_bg_color.';
			}
		
		#responsiveTabs-'.$post_id.'  .r-tabs-accordion-title a{
			
			color:'.$woo_tab_items_title_color.';
			
			}
		
		
		
		
		
		</style>';		
		
		
		
		$html .= "<script type='text/javascript'>
        jQuery(document).ready(function ($) {
			$('#responsiveTabs-".$post_id."').responsiveTabs({
				collapsible: ".$woo_tab_items_collapsible.",
				animation: '".$woo_tab_items_animation."',
				duration: ".$woo_tab_items_animation_duration.",
				active:".$woo_tab_active.",

			});


        });
    </script>";		

		
		
		return $html;
		
		    
		
		
		
		
		
		
		
		
		
		
		
		
	}