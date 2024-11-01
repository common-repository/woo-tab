<?php


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