<?php

function tabs_body_rounded_top($post_id)
	{
		
		$tabs_bg_img = get_post_meta( $post_id, 'tabs_bg_img', true );
		$tabs_themes = get_post_meta( $post_id, 'tabs_themes', true );

		$tabs_default_bg_color = get_post_meta( $post_id, 'tabs_default_bg_color', true );	
		$tabs_active_bg_color = get_post_meta( $post_id, 'tabs_active_bg_color', true );
		
		$tabs_items_title_color = get_post_meta( $post_id, 'tabs_items_title_color', true );			
		$tabs_items_title_font_size = get_post_meta( $post_id, 'tabs_items_title_font_size', true );		

		$tabs_items_content_color = get_post_meta( $post_id, 'tabs_items_content_color', true );
		$tabs_items_content_font_size = get_post_meta( $post_id, 'tabs_items_content_font_size', true );

		
		$tabs_items_thumb_size = get_post_meta( $post_id, 'tabs_items_thumb_size', true );
		$tabs_items_thumb_max_hieght = get_post_meta( $post_id, 'tabs_items_thumb_max_hieght', true );
		
		$tabs_ribbon_name = get_post_meta( $post_id, 'tabs_ribbon_name', true );		
		
		$tabs_content_title = get_post_meta( $post_id, 'tabs_content_title', true );
		$tabs_content_title_icon = get_post_meta( $post_id, 'tabs_content_title_icon', true );
		$tabs_content_title_icon_custom = get_post_meta( $post_id, 'tabs_content_title_icon_custom', true );			
		$tabs_content_body = get_post_meta( $post_id, 'tabs_content_body', true );
		
		$tabs_active = get_post_meta( $post_id, 'tabs_active', true );

		$tabs_items_collapsible = get_post_meta( $post_id, 'tabs_items_collapsible', true );	
		$tabs_items_animation = get_post_meta( $post_id, 'tabs_items_animation', true );
		$tabs_items_animation_duration = get_post_meta( $post_id, 'tabs_items_animation_duration', true );		
		
		
		$tabs_body = '';
		$tabs_body = '<style type="text/css"></style>';
		
		
		
		$tabs_body .= '
		<div id="responsiveTabs-'.$post_id.'"  class="tabs-container tabs-rounded-top" style="background-image:url('.$tabs_bg_img.')">';
		$total_row = count($tabs_content_title);
		

		$tabs_body.= '<ul  id="tabs-'.$post_id.'" class="tabs-nav">';
		
		
		
		foreach ($tabs_content_title as $index => $tabs_title)
		{
			
			
			if(empty($tabs_content_title_icon_custom[$index]))
				{
					$icon_fa = $tabs_content_title_icon[$index];
					$icon = '<i class="fa fa-'.$icon_fa.'"></i>';
				}
			else
				{
					$icon_custom = $tabs_content_title_icon_custom[$index];
					$icon = '<span style="background-image:url('.$icon_custom.');width:'.$tabs_items_title_font_size.';height:'.$tabs_items_title_font_size.';" class="fa-custom"></span>';
				}
			
			
			
			
			
				$tabs_body.= '<li class="tabs-nav-items">';
				$tabs_body.= '<a style="color:'.$tabs_items_title_color.';font-size:'.$tabs_items_title_font_size.'" href="#tab-'.$post_id.'-'.$index.'">'.$icon.$tabs_title.'</a>';		
				$tabs_body.= '</li>';
			}					
		$tabs_body.= '</ul>';
		
		foreach ($tabs_content_body as $index => $tabs_content)
			{
				
				
				
				
				$tabs_body.= '<div style="color:'.$tabs_items_content_color.';font-size:'.$tabs_items_content_font_size.'" id="tab-'.$post_id.'-'.$index.'" class="tabs-content">';
				$tabs_body.= do_shortcode(wpautop($tabs_content));		
				$tabs_body.= '</div>';
			
			}
		
		
		
		
		



			
		$tabs_body .= '</div>';
		
		
		$tabs_body .= '<style type="text/css">
		
		#responsiveTabs-'.$post_id.' ul.tabs-nav li.tabs-nav-items,
		#responsiveTabs-'.$post_id.'  .r-tabs-accordion-title{
			
			background: '.$tabs_default_bg_color.';
			}
		
		
		#responsiveTabs-'.$post_id.' ul.tabs-nav li.r-tabs-state-active ,
		#responsiveTabs-'.$post_id.' div.r-tabs-state-active ,
		#responsiveTabs-'.$post_id.' .r-tabs-panel.r-tabs-state-active{
			
			background: '.$tabs_active_bg_color.';
			}
		
		#responsiveTabs-'.$post_id.'  .r-tabs-accordion-title a{
			
			color:'.$tabs_items_title_color.';
			
			}
		
		
		
		
		
		</style>';		
		
		
		
		$tabs_body .= "<script type='text/javascript'>
        jQuery(document).ready(function ($) {
			$('#responsiveTabs-".$post_id."').responsiveTabs({
				collapsible: ".$tabs_items_collapsible.",
				animation: '".$tabs_items_animation."',
				duration: ".$tabs_items_animation_duration.",
				active:".$tabs_active.",

			});


        });
    </script>";		

		
		
		return $tabs_body;
		
		    
		
		
		
		
		
		
		
		
		
		
		
		
	}