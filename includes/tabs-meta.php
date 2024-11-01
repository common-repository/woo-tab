<?php


function woo_tab_posttype_register() {
 
        $labels = array(
                'name' => __('Woo Tab', 'woo_tab'),
                'singular_name' => __('Woo Tab', 'woo_tab'),
                'add_new' => __('New Woo Tab', 'woo_tab'),
                'add_new_item' => __('New Woo Tab'),
                'edit_item' => __('Edit Woo Tab'),
                'new_item' => __('New Woo Tab'),
                'view_item' => __('View Woo Tab'),
                'search_items' => __('Search Woo Tab'),
                'not_found' =>  __('Nothing found'),
                'not_found_in_trash' => __('Nothing found in Trash'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title'),
				'menu_icon' => 'dashicons-media-spreadsheet',
				
          );
 
        register_post_type( 'woo_tab' , $args );

}

add_action('init', 'woo_tab_posttype_register');





/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function meta_boxes_woo_tab()
	{
		$screens = array( 'woo_tab' );
		foreach ( $screens as $screen )
			{
				add_meta_box('woo_tab_metabox',__( 'Woo Tab Options','woo_tab' ),'meta_boxes_woo_tab_input', $screen);
			}
	}
add_action( 'add_meta_boxes', 'meta_boxes_woo_tab' );


function meta_boxes_woo_tab_input( $post ) {
	
	global $post;
	wp_nonce_field( 'meta_boxes_woo_tab_input', 'meta_boxes_woo_tab_input_nonce' );
	
	
	$woo_tab_bg_img = get_post_meta( $post->ID, 'woo_tab_bg_img', true );
	$woo_tab_themes = get_post_meta( $post->ID, 'woo_tab_themes', true );
	
	
	$woo_tab_default_bg_color = get_post_meta( $post->ID, 'woo_tab_default_bg_color', true );	
	$woo_tab_active_bg_color = get_post_meta( $post->ID, 'woo_tab_active_bg_color', true );
	
	$woo_tab_items_title_color = get_post_meta( $post->ID, 'woo_tab_items_title_color', true );	
	$woo_tab_items_title_font_size = get_post_meta( $post->ID, 'woo_tab_items_title_font_size', true );
	
	$woo_tab_items_content_color = get_post_meta( $post->ID, 'woo_tab_items_content_color', true );	
	$woo_tab_items_content_font_size = get_post_meta( $post->ID, 'woo_tab_items_content_font_size', true );		
	
	$woo_tab_content_title = get_post_meta( $post->ID, 'woo_tab_content_title', true );
	$woo_tab_content_title_icon = get_post_meta( $post->ID, 'woo_tab_content_title_icon', true );
	$woo_tab_content_title_icon_custom = get_post_meta( $post->ID, 'woo_tab_content_title_icon_custom', true );	
	$woo_tab_content_body = get_post_meta( $post->ID, 'woo_tab_content_body', true );
	
	$woo_tab_active = get_post_meta( $post->ID, 'woo_tab_active', true );	
 
	$woo_tab_items_collapsible = get_post_meta( $post->ID, 'woo_tab_items_collapsible', true );	
	$woo_tab_items_animation = get_post_meta( $post->ID, 'woo_tab_items_animation', true );
	$woo_tab_items_animation_duration = get_post_meta( $post->ID, 'woo_tab_items_animation_duration', true );


?>




    <div class="para-settings">
        <div class="option-box">
            <p class="option-title">Shortcode</p>
            <p class="option-info">Copy this shortcode and paste on page or post where you want to display woo_tab, Use PHP code to your themes file to display woo_tab.</p>
        	<textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" >[woo_tab <?php echo ' id="'.$post->ID.'"';?> ]</textarea>
        <br />
        PHP Code:<br />
        <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[woo_tab id='; echo "'".$post->ID."' ]"; echo '"); ?>'; ?></textarea>  
        </div>
        
        
        
        <ul class="tab-nav"> 
            <li nav="2" class="nav2 active">Tabs Style</li>
            <li nav="3" class="nav3">Tabs Content</li>
            
        </ul> <!-- tab-nav end -->
        
		<ul class="box">

            <li style="display: block;" class="box2 tab-box active">
				<div class="option-box">
                    <p class="option-title">Themes</p>
                    <p class="option-info"></p>
                    <select name="woo_tab_themes"  >
                    <option  value="flat" <?php if($woo_tab_themes=="flat")echo "selected"; ?>>Flat</option>

                    </select>
                </div>
                
             
				<div class="option-box">
                    <p class="option-title">Background Image</p>
                    <p class="option-info"></p>

					<script>
                    jQuery(document).ready(function(jQuery)
                        {
                                jQuery(".woo_tab_bg_img_list li").click(function()
                                    { 	
                                        jQuery('.woo_tab_bg_img_list li.bg-selected').removeClass('bg-selected');
                                        jQuery(this).addClass('bg-selected');
                                        
                                        var woo_tab_bg_img = jQuery(this).attr('data-url');
                    
                                        jQuery('#woo_tab_bg_img').val(woo_tab_bg_img);
                                        
                                    })	
                    
                                        
                        })
                    
                    </script>
                    
                    
                    

					<?php
                    
                    
                    
                        $dir_path = woo_tab_plugin_dir."css/bg/";
                        $filenames=glob($dir_path."*.png*");
                    
                    
                        $woo_tab_bg_img = get_post_meta( $post->ID, 'woo_tab_bg_img', true );
                        
                        if(empty($woo_tab_bg_img))
                            {
                            $woo_tab_bg_img = "";
                            }
                    
                    
                        $count=count($filenames);
                        
                    
                        $i=0;
                        echo "<ul class='woo_tab_bg_img_list' >";
                    
                        while($i<$count)
                            {
                                $filelink= str_replace($dir_path,"",$filenames[$i]);
                                
                                $filelink= woo_tab_plugin_url."css/bg/".$filelink;
                                
                                
                                if($woo_tab_bg_img==$filelink)
                                    {
                                        echo '<li  class="bg-selected" data-url="'.$filelink.'">';
                                    }
                                else
                                    {
                                        echo '<li   data-url="'.$filelink.'">';
                                    }
                                
                                
                                echo "<img  width='70px' height='50px' src='".$filelink."' />";
                                echo "</li>";
                                $i++;
                            }
                            
                        echo "</ul>";
                        
                        echo "<input style='width:100%;' value='".$woo_tab_bg_img."'    placeholder='Please select image or left blank' id='woo_tab_bg_img' name='woo_tab_bg_img'  type='text' />";
                    
                    
                    
                    ?>  

                    
                    
                </div>
                
                
				<div class="option-box">
                    <p class="option-title">Default Background Color</p>
                    <p class="option-info"></p>
                    <input type="text" name="woo_tab_default_bg_color" id="woo_tab_default_bg_color" value="<?php if(!empty($woo_tab_default_bg_color)) echo $woo_tab_default_bg_color; else echo "#3b9cf7"; ?>" />
                </div>
                
				<div class="option-box">
                    <p class="option-title">Active Background Color</p>
                    <p class="option-info"></p>
                    <input type="text" name="woo_tab_active_bg_color" id="woo_tab_active_bg_color" value="<?php if(!empty($woo_tab_active_bg_color)) echo $woo_tab_active_bg_color; else echo "#2687e1"; ?>" />
                </div>
                                
				<div class="option-box">
                    <p class="option-title">Tabs Header Font Color</p>
                    <p class="option-info"></p>
                    <input type="text" name="woo_tab_items_title_color" id="woo_tab_items_title_color" value="<?php if(!empty($woo_tab_items_title_color)) echo $woo_tab_items_title_color; else echo "#ffffff"; ?>" />
                </div>                  
                
                
				<div class="option-box">
                    <p class="option-title">Tabs Header Font Size</p>
                    <p class="option-info"></p>
                    <input type="text" name="woo_tab_items_title_font_size" placeholder="ex:14px number with px" id="woo_tab_items_title_font_size" value="<?php if(!empty($woo_tab_items_title_font_size)) echo $woo_tab_items_title_font_size; else echo "14px"; ?>" />
                </div>                    
                
                
				<div class="option-box">
                    <p class="option-title">Tabs Content Font Color</p>
                    <p class="option-info"></p>
					<input type="text" name="woo_tab_items_content_color" id="woo_tab_items_content_color" value="<?php if(!empty($woo_tab_items_content_color)) echo $woo_tab_items_content_color; else echo "#333333"; ?>" />
                </div>                  
                
                
                
				<div class="option-box">
                    <p class="option-title">Tabs Content Font Size</p>
                    <p class="option-info"></p>
                    <input type="text" name="woo_tab_items_content_font_size" id="woo_tab_items_content_font_size" value="<?php if(!empty($woo_tab_items_content_font_size)) echo $woo_tab_items_content_font_size; else echo "13px"; ?>" />
                </div>                  


				<div class="option-box">
                    <p class="option-title">Tabs collapsible</p>
                    <p class="option-info"></p>
                    <select name="woo_tab_items_collapsible">
                    <option <?php if($woo_tab_items_collapsible=='true') echo 'selected'; ?> value="true">True </option>
                    <option <?php if($woo_tab_items_collapsible=='false') echo 'selected'; ?> value="false">False </option>
                    </select>

                </div>  


				<div class="option-box">
                    <p class="option-title">Tabs animation</p>
                    <p class="option-info"></p>
                    <select name="woo_tab_items_animation">
                    <option <?php if($woo_tab_items_animation=='fade') echo 'selected'; ?> value="fade">Fade </option>
                    <option <?php if($woo_tab_items_animation=='slide') echo 'selected'; ?> value="slide">Slide </option>
                    </select>
                </div>                 
                
				<div class="option-box">
                    <p class="option-title">Tabs animation duration</p>
                    <p class="option-info"></p>
                    <input type="text" name="woo_tab_items_animation_duration" id="woo_tab_items_animation_duration" value="<?php if(!empty($woo_tab_items_animation_duration)) echo $woo_tab_items_animation_duration; else echo "500"; ?>" />
                </div> 

                
            </li> 
            
            <li style="display: none;" class="box3 tab-box active">
            
				<div class="option-box">
                    <p class="option-title">Tabs Content</p>
                    <p class="option-info"></p>
                    <div class="woo_tab-content-buttons" >
                        <div class="button add-woo_tab">Add</div>
                        <div class="button reset-active">Reset Active</div>                        
                        <br />
                    </div>
                    
                    
                    
                    <table class="woo_tab-content" width="100%">
                        
                        <?php
                        //$total_row = count($woo_tab_content_title);
                        
                        if(empty($woo_tab_content_title))
                            {
                                $woo_tab_content_title = array(
															'0'=>'Recent',
															'1'=>'Featured',
															'2'=>'On Sale',																	
															);
                            }
							
							
                        if(empty($woo_tab_content_title_icon))
                            {
                                $woo_tab_content_title_icon = array(
																	'0'=>'bolt',
																	'1'=>'bookmark',																	
																	'2'=>'dot-circle-o',																	
																	
																	
																	);
                            }	
							
                        if(empty($woo_tab_content_body))
                            {
                                $woo_tab_content_body = array(
															'0'=>'[woo_tab_grid content_source="recent"]',
															'1'=>'[woo_tab_grid content_source="featured"]',
															'2'=>'[woo_tab_grid content_source="on_sale"]',															
																													
															);
                            }							
							
                        if(empty($woo_tab_content_title_icon_custom))
                            {
                                $woo_tab_content_title_icon_custom = array('0'=>'');
                            }														
							
							
							
						$i = 0;
                        foreach ($woo_tab_content_title as $index => $woo_tab_title)
                            {
        
                            
                            ?>
                            <tr index='<?php echo $index; ?>' valign="top">
        						<td class="section-dragHandle">*</td>
                                <td style="vertical-align:middle;">
                                
                                <div class="woo_tab-header">
                                <div class="title"><?php echo $woo_tab_title; ?></div>
                                	
                                    
                                	<input type="radio" <?php if($woo_tab_active ==$i ) echo 'checked'; ?> title="Active tab" class="woo_tab_active" name="woo_tab_active" value="<?php echo $i; ?>" />
                                
                                
                                    <div title="Delete This Tab." class="removeTabs">X</div>
                                    <div title="Font Awesome Iocns." class="woo_tabicon woo_tabicon<?php echo $index; ?>" iconid="<?php echo $index; ?>"><i  class="fa fa-<?php echo $woo_tab_content_title_icon[$index]; ?>"></i> 
                                    <input  type="hidden" class="woo_tab_content_title_icon woo_tab_content_title_icon<?php echo $index; ?>" name="woo_tab_content_title_icon[<?php echo $index; ?>]" value="<?php if(!empty($woo_tab_content_title_icon[$index])) echo $woo_tab_content_title_icon[$index]; ?>" />
                                    </div>
                                    <div title="Custom Iocn."  style=" background-image:url(<?php echo $woo_tab_content_title_icon_custom[$index]; ?>);" class="woo_tabicon-custom woo_tabicon-custom<?php echo $index; ?>" iconid="<?php echo $index; ?>"> 
                                    <input  type="hidden" class="woo_tab_content_title_icon_custom woo_tab_content_title_icon_custom<?php echo $index; ?>" name="woo_tab_content_title_icon_custom[<?php echo $index; ?>]" value="<?php if(!empty($woo_tab_content_title_icon_custom[$index])) echo $woo_tab_content_title_icon_custom[$index]; ?>" />
                                    </div>
                                    
                                </div>
								<div class="woo_tab-panel">
                                <input width="100%" placeholder="Tabs Header" type="text" name="woo_tab_content_title[<?php echo $index; ?>]" value="<?php if(!empty($woo_tab_title)) echo $woo_tab_title; ?>" />
                                
								<?php wp_editor( stripslashes($woo_tab_content_body[$index]), 'woo_tab_content_body'.$index, $settings = array('textarea_name'=>'woo_tab_content_body['.$index.']','tinymce' => true) );

?>

                                </div>


                                
                                </td>           
                            </tr>
                            <?php
                            
							$i++;
                            }
                        
                        ?>

        
                             
                         </table>
                         
                         

                         
 <script>
 jQuery(document).ready(function($)
	{
$(function() {
$( ".woo_tab-content tbody" ).sortable();
//$( ".items-container" ).disableSelection();
});

})

</script>                       
                         
<?php

	$fa_icons = array(
		'none' => 'No Icon',
		'fa-adjust' => 'adjust',
		'fa-anchor' => 'anchor',
		'fa-archive' => 'archive',
		'fa-arrows' => 'arrows',
		'fa-arrows-h' => 'arrows-h',
		'fa-arrows-v' => 'arrows-v',
		'fa-asterisk' => 'asterisk',
		'fa-automobile' => 'automobile',
		'fa-ban' => 'ban',
		'fa-bank' => 'bank',
		'fa-bar-chart-o' => 'bar-chart-o',
		'fa-barcode' => 'barcode',
		'fa-bars' => 'bars',
		'fa-beer' => 'beer',
		'fa-bell' => 'bell',
		'fa-bell-o' => 'bell-o',
		'fa-bolt' => 'bolt',
		'fa-bomb' => 'bomb',
		'fa-book' => 'book',
		'fa-bookmark' => 'bookmark',
		'fa-bookmark-o' => 'bookmark-o',
		'fa-briefcase' => 'briefcase',
		'fa-bug' => 'bug',
		'fa-building' => 'building',
		'fa-building-o' => 'building-o',
		'fa-bullhorn' => 'bullhorn',
		'fa-bullseye' => 'bullseye',
		'fa-cab' => 'cab',
		'fa-calendar' => 'calendar',
		'fa-calendar-o' => 'calendar-o',
		'fa-camera' => 'camera',
		'fa-camera-retro' => 'camera-retro',
		'fa-car' => 'car',
		'fa-caret-square-o-down' => 'caret-square-o-down',
		'fa-caret-square-o-left' => 'caret-square-o-left',
		'fa-caret-square-o-right' => 'caret-square-o-right',
		'fa-caret-square-o-up' => 'caret-square-o-up',
		'fa-certificate' => 'certificate',
		'fa-check' => 'check',
		'fa-check-circle' => 'check-circle',
		'fa-check-circle-o' => 'check-circle-o',
		'fa-check-square' => 'check-square',
		'fa-check-square-o' => 'check-square-o',
		'fa-child' => 'child',
		'fa-circle' => 'circle',
		'fa-circle-o' => 'circle-o',
		'fa-circle-o-notch' => 'circle-o-notch',
		'fa-circle-thin' => 'circle-thin',
		'fa-clock-o' => 'clock-o',
		'fa-cloud' => 'cloud',
		'fa-cloud-download' => 'cloud-download',
		'fa-cloud-upload' => 'cloud-upload',
		'fa-code' => 'code',
		'fa-code-fork' => 'code-fork',
		'fa-coffee' => 'coffee',
		'fa-cog' => 'cog',
		'fa-cogs' => 'cogs',
		'fa-comment' => 'comment',
		'fa-comment-o' => 'comment-o',
		'fa-comments' => 'comments',
		'fa-comments-o' => 'comments-o',
		'fa-compass' => 'compass',
		'fa-credit-card' => 'credit-card',
		'fa-crop' => 'crop',
		'fa-crosshairs' => 'crosshairs',
		'fa-cube' => 'cube',
		'fa-cubes' => 'cubes',
		'fa-cutlery' => 'cutlery',
		'fa-dashboard' => 'dashboard',
		'fa-database' => 'database',
		'fa-desktop' => 'desktop',
		'fa-dot-circle-o' => 'dot-circle-o',
		'fa-download' => 'download',
		'fa-edit' => 'edit',
		'fa-ellipsis-h' => 'ellipsis-h',
		'fa-ellipsis-v' => 'ellipsis-v',
		'fa-envelope' => 'envelope',
		'fa-envelope-o' => 'envelope-o',
		'fa-envelope-square' => 'envelope-square',
		'fa-eraser' => 'eraser',
		'fa-exchange' => 'exchange',
		'fa-exclamation' => 'exclamation',
		'fa-exclamation-circle' => 'exclamation-circle',
		'fa-exclamation-triangle' => 'exclamation-triangle',
		'fa-external-link' => 'external-link',
		'fa-external-link-square' => 'external-link-square',
		'fa-eye' => 'eye',
		'fa-eye-slash' => 'eye-slash',
		'fa-fax' => 'fax',
		'fa-female' => 'female',
		'fa-fighter-jet' => 'fighter-jet',
		'fa-file-archive-o' => 'file-archive-o',
		'fa-file-audio-o' => 'file-audio-o',
		'fa-file-code-o' => 'file-code-o',
		'fa-file-excel-o' => 'file-excel-o',
		'fa-file-image-o' => 'file-image-o',
		'fa-file-movie-o' => 'file-movie-o',
		'fa-file-pdf-o' => 'file-pdf-o',
		'fa-file-photo-o' => 'file-photo-o',
		'fa-file-picture-o' => 'file-picture-o',
		'fa-file-powerpoint-o' => 'file-powerpoint-o',
		'fa-file-sound-o' => 'file-sound-o',
		'fa-file-video-o' => 'file-video-o',
		'fa-file-word-o' => 'file-word-o',
		'fa-file-zip-o' => 'file-zip-o',
		'fa-film' => 'film',
		'fa-filter' => 'filter',
		'fa-fire' => 'fire',
		'fa-fire-extinguisher' => 'fire-extinguisher',
		'fa-flag' => 'flag',
		'fa-flag-checkered' => 'flag-checkered',
		'fa-flag-o' => 'flag-o',
		'fa-flash' => 'flash',
		'fa-flask' => 'flask',
		'fa-folder' => 'folder',
		'fa-folder-o' => 'folder-o',
		'fa-folder-open' => 'folder-open',
		'fa-folder-open-o' => 'folder-open-o',
		'fa-frown-o' => 'frown-o',
		'fa-gamepad' => 'gamepad',
		'fa-gavel' => 'gavel',
		'fa-gear' => 'gear',
		'fa-gears' => 'gears',
		'fa-gift' => 'gift',
		'fa-glass' => 'glass',
		'fa-globe' => 'globe',
		'fa-graduation-cap' => 'graduation-cap',
		'fa-group' => 'group',
		'fa-hdd-o' => 'hdd-o',
		'fa-headphones' => 'headphones',
		'fa-heart' => 'heart',
		'fa-heart-o' => 'heart-o',
		'fa-history' => 'history',
		'fa-home' => 'home',
		'fa-image' => 'image',
		'fa-inbox' => 'inbox',
		'fa-info' => 'info',
		'fa-info-circle' => 'info-circle',
		'fa-institution' => 'institution',
		'fa-key' => 'key',
		'fa-keyboard-o' => 'keyboard-o',
		'fa-language' => 'language',
		'fa-laptop' => 'laptop',
		'fa-leaf' => 'leaf',
		'fa-legal' => 'legal',
		'fa-lemon-o' => 'lemon-o',
		'fa-level-down' => 'level-down',
		'fa-level-up' => 'level-up',
		'fa-life-bouy' => 'life-bouy',
		'fa-life-ring' => 'life-ring',
		'fa-life-saver' => 'life-saver',
		'fa-lightbulb-o' => 'lightbulb-o',
		'fa-location-arrow' => 'location-arrow',
		'fa-lock' => 'lock',
		'fa-magic' => 'magic',
		'fa-magnet' => 'magnet',
		'fa-mail-forward' => 'mail-forward',
		'fa-mail-reply' => 'mail-reply',
		'fa-mail-reply-all' => 'mail-reply-all',
		'fa-male' => 'male',
		'fa-map-marker' => 'map-marker',
		'fa-meh-o' => 'meh-o',
		'fa-microphone' => 'microphone',
		'fa-microphone-slash' => 'microphone-slash',
		'fa-minus' => 'minus',
		'fa-minus-circle' => 'minus-circle',
		'fa-minus-square' => 'minus-square',
		'fa-minus-square-o' => 'minus-square-o',
		'fa-mobile' => 'mobile',
		'fa-mobile-phone' => 'mobile-phone',
		'fa-money' => 'money',
		'fa-moon-o' => 'moon-o',
		'fa-mortar-board' => 'mortar-board',
		'fa-music' => 'music',
		'fa-navicon' => 'navicon',
		'fa-paper-plane' => 'paper-plane',
		'fa-paper-plane-o' => 'paper-plane-o',
		'fa-paw' => 'paw',
		'fa-pencil' => 'pencil',
		'fa-pencil-square' => 'pencil-square',
		'fa-pencil-square-o' => 'pencil-square-o',
		'fa-phone' => 'phone',
		'fa-phone-square' => 'phone-square',
		'fa-photo' => 'photo',
		'fa-picture-o' => 'picture-o',
		'fa-plane' => 'plane',
		'fa-plus' => 'plus',
		'fa-plus-circle' => 'plus-circle',
		'fa-plus-square' => 'plus-square',
		'fa-plus-square-o' => 'plus-square-o',
		'fa-power-off' => 'power-off',
		'fa-print' => 'print',
		'fa-puzzle-piece' => 'puzzle-piece',
		'fa-qrcode' => 'qrcode',
		'fa-question' => 'question',
		'fa-question-circle' => 'question-circle',
		'fa-quote-left' => 'quote-left',
		'fa-quote-right' => 'quote-right',
		'fa-random' => 'random',
		'fa-recycle' => 'recycle',
		'fa-refresh' => 'refresh',
		'fa-reorder' => 'reorder',
		'fa-reply' => 'reply',
		'fa-reply-all' => 'reply-all',
		'fa-retweet' => 'retweet',
		'fa-road' => 'road',
		'fa-rocket' => 'rocket',
		'fa-rss' => 'rss',
		'fa-rss-square' => 'rss-square',
		'fa-search' => 'search',
		'fa-search-minus' => 'search-minus',
		'fa-search-plus' => 'search-plus',
		'fa-send' => 'send',
		'fa-send-o' => 'send-o',
		'fa-share' => 'share',
		'fa-share-alt' => 'share-alt',
		'fa-share-alt-square' => 'share-alt-square',
		'fa-share-square' => 'share-square',
		'fa-share-square-o' => 'share-square-o',
		'fa-shield' => 'shield',
		'fa-shopping-cart' => 'shopping-cart',
		'fa-sign-in' => 'sign-in',
		'fa-sign-out' => 'sign-out',
		'fa-signal' => 'signal',
		'fa-sitemap' => 'sitemap',
		'fa-sliders' => 'sliders',
		'fa-smile-o' => 'smile-o',
		'fa-sort' => 'sort',
		'fa-sort-alpha-asc' => 'sort-alpha-asc',
		'fa-sort-alpha-desc' => 'sort-alpha-desc',
		'fa-sort-amount-asc' => 'sort-amount-asc',
		'fa-sort-amount-desc' => 'sort-amount-desc',
		'fa-sort-asc' => 'sort-asc',
		'fa-sort-desc' => 'sort-desc',
		'fa-sort-down' => 'sort-down',
		'fa-sort-numeric-asc' => 'sort-numeric-asc',
		'fa-sort-numeric-desc' => 'sort-numeric-desc',
		'fa-sort-up' => 'sort-up',
		'fa-space-shuttle' => 'space-shuttle',
		'fa-spinner' => 'spinner',
		'fa-spoon' => 'spoon',
		'fa-square' => 'square',
		'fa-square-o' => 'square-o',
		'fa-star' => 'star',
		'fa-star-half' => 'star-half',
		'fa-star-half-empty' => 'star-half-empty',
		'fa-star-half-full' => 'star-half-full',
		'fa-star-half-o' => 'star-half-o',
		'fa-star-o' => 'star-o',
		'fa-suitcase' => 'suitcase',
		'fa-sun-o' => 'sun-o',
		'fa-support' => 'support',
		'fa-tablet' => 'tablet',
		'fa-tachometer' => 'tachometer',
		'fa-tag' => 'tag',
		'fa-tags' => 'tags',
		'fa-tasks' => 'tasks',
		'fa-taxi' => 'taxi',
		'fa-terminal' => 'terminal',
		'fa-thumb-tack' => 'thumb-tack',
		'fa-thumbs-down' => 'thumbs-down',
		'fa-thumbs-o-down' => 'thumbs-o-down',
		'fa-thumbs-o-up' => 'thumbs-o-up',
		'fa-thumbs-up' => 'thumbs-up',
		'fa-ticket' => 'ticket',
		'fa-times' => 'times',
		'fa-times-circle' => 'times-circle',
		'fa-times-circle-o' => 'times-circle-o',
		'fa-tint' => 'tint',
		'fa-toggle-down' => 'toggle-down',
		'fa-toggle-left' => 'toggle-left',
		'fa-toggle-right' => 'toggle-right',
		'fa-toggle-up' => 'toggle-up',
		'fa-trash-o' => 'trash-o',
		'fa-tree' => 'tree',
		'fa-trophy' => 'trophy',
		'fa-truck' => 'truck',
		'fa-umbrella' => 'umbrella',
		'fa-university' => 'university',
		'fa-unlock' => 'unlock',
		'fa-unlock-alt' => 'unlock-alt',
		'fa-unsorted' => 'unsorted',
		'fa-upload' => 'upload',
		'fa-user' => 'user',
		'fa-users' => 'users',
		'fa-video-camera' => 'video-camera',
		'fa-volume-down' => 'volume-down',
		'fa-volume-off' => 'volume-off',
		'fa-volume-up' => 'volume-up',
		'fa-warning' => 'warning',
		'fa-wheelchair' => 'wheelchair',
		'fa-wrench' => 'wrench',
		'fa-file' => 'file',
		'fa-file-archive-o' => 'file-archive-o',
		'fa-file-audio-o' => 'file-audio-o',
		'fa-file-code-o' => 'file-code-o',
		'fa-file-excel-o' => 'file-excel-o',
		'fa-file-image-o' => 'file-image-o',
		'fa-file-movie-o' => 'file-movie-o',
		'fa-file-o' => 'file-o',
		'fa-file-pdf-o' => 'file-pdf-o',
		'fa-file-photo-o' => 'file-photo-o',
		'fa-file-picture-o' => 'file-picture-o',
		'fa-file-powerpoint-o' => 'file-powerpoint-o',
		'fa-file-sound-o' => 'file-sound-o',
		'fa-file-text' => 'file-text',
		'fa-file-text-o' => 'file-text-o',
		'fa-file-video-o' => 'file-video-o',
		'fa-file-word-o' => 'file-word-o',
		'fa-file-zip-o' => 'file-zip-o',
		'fa-circle-o-notch' => 'circle-o-notch',
		'fa-cog' => 'cog',
		'fa-gear' => 'gear',
		'fa-refresh' => 'refresh',
		'fa-spinner' => 'spinner',
		'fa-check-square' => 'check-square',
		'fa-check-square-o' => 'check-square-o',
		'fa-circle' => 'circle',
		'fa-circle-o' => 'circle-o',
		'fa-dot-circle-o' => 'dot-circle-o',
		'fa-minus-square' => 'minus-square',
		'fa-minus-square-o' => 'minus-square-o',
		'fa-plus-square' => 'plus-square',
		'fa-plus-square-o' => 'plus-square-o',
		'fa-square' => 'square',
		'fa-square-o' => 'square-o',
		'fa-bitcoin' => 'bitcoin',
		'fa-btc' => 'btc',
		'fa-cny' => 'cny',
		'fa-dollar' => 'dollar',
		'fa-eur' => 'eur',
		'fa-euro' => 'euro',
		'fa-gbp' => 'gbp',
		'fa-inr' => 'inr',
		'fa-jpy' => 'jpy',
		'fa-krw' => 'krw',
		'fa-money' => 'money',
		'fa-rmb' => 'rmb',
		'fa-rouble' => 'rouble',
		'fa-rub' => 'rub',
		'fa-ruble' => 'ruble',
		'fa-rupee' => 'rupee',
		'fa-try' => 'try',
		'fa-turkish-lira' => 'turkish-lira',
		'fa-usd' => 'usd',
		'fa-won' => 'won',
		'fa-yen' => 'yen',
		'fa-align-center' => 'align-center',
		'fa-align-justify' => 'align-justify',
		'fa-align-left' => 'align-left',
		'fa-align-right' => 'align-right',
		'fa-bold' => 'bold',
		'fa-chain' => 'chain',
		'fa-chain-broken' => 'chain-broken',
		'fa-clipboard' => 'clipboard',
		'fa-columns' => 'columns',
		'fa-copy' => 'copy',
		'fa-cut' => 'cut',
		'fa-dedent' => 'dedent',
		'fa-eraser' => 'eraser',
		'fa-file' => 'file',
		'fa-file-o' => 'file-o',
		'fa-file-text' => 'file-text',
		'fa-file-text-o' => 'file-text-o',
		'fa-files-o' => 'files-o',
		'fa-floppy-o' => 'floppy-o',
		'fa-font' => 'font',
		'fa-header' => 'header',
		'fa-indent' => 'indent',
		'fa-italic' => 'italic',
		'fa-link' => 'link',
		'fa-list' => 'list',
		'fa-list-alt' => 'list-alt',
		'fa-list-ol' => 'list-ol',
		'fa-list-ul' => 'list-ul',
		'fa-outdent' => 'outdent',
		'fa-paperclip' => 'paperclip',
		'fa-paragraph' => 'paragraph',
		'fa-paste' => 'paste',
		'fa-repeat' => 'repeat',
		'fa-rotate-left' => 'rotate-left',
		'fa-rotate-right' => 'rotate-right',
		'fa-save' => 'save',
		'fa-scissors' => 'scissors',
		'fa-strikethrough' => 'strikethrough',
		'fa-subscript' => 'subscript',
		'fa-superscript' => 'superscript',
		'fa-table' => 'table',
		'fa-text-height' => 'text-height',
		'fa-text-width' => 'text-width',
		'fa-th' => 'th',
		'fa-th-large' => 'th-large',
		'fa-th-list' => 'th-list',
		'fa-underline' => 'underline',
		'fa-undo' => 'undo',
		'fa-unlink' => 'unlink',
		'fa-angle-double-down' => 'angle-double-down',
		'fa-angle-double-left' => 'angle-double-left',
		'fa-angle-double-right' => 'angle-double-right',
		'fa-angle-double-up' => 'angle-double-up',
		'fa-angle-down' => 'angle-down',
		'fa-angle-left' => 'angle-left',
		'fa-angle-right' => 'angle-right',
		'fa-angle-up' => 'angle-up',
		'fa-arrow-circle-down' => 'arrow-circle-down',
		'fa-arrow-circle-left' => 'arrow-circle-left',
		'fa-arrow-circle-o-down' => 'arrow-circle-o-down',
		'fa-arrow-circle-o-left' => 'arrow-circle-o-left',
		'fa-arrow-circle-o-right' => 'arrow-circle-o-right',
		'fa-arrow-circle-o-up' => 'arrow-circle-o-up',
		'fa-arrow-circle-right' => 'arrow-circle-right',
		'fa-arrow-circle-up' => 'arrow-circle-up',
		'fa-arrow-down' => 'arrow-down',
		'fa-arrow-left' => 'arrow-left',
		'fa-arrow-right' => 'arrow-right',
		'fa-arrow-up' => 'arrow-up',
		'fa-arrows' => 'arrows',
		'fa-arrows-alt' => 'arrows-alt',
		'fa-arrows-h' => 'arrows-h',
		'fa-arrows-v' => 'arrows-v',
		'fa-caret-down' => 'caret-down',
		'fa-caret-left' => 'caret-left',
		'fa-caret-right' => 'caret-right',
		'fa-caret-square-o-down' => 'caret-square-o-down',
		'fa-caret-square-o-left' => 'caret-square-o-left',
		'fa-caret-square-o-right' => 'caret-square-o-right',
		'fa-caret-square-o-up' => 'caret-square-o-up',
		'fa-caret-up' => 'caret-up',
		'fa-chevron-circle-down' => 'chevron-circle-down',
		'fa-chevron-circle-left' => 'chevron-circle-left',
		'fa-chevron-circle-right' => 'chevron-circle-right',
		'fa-chevron-circle-up' => 'chevron-circle-up',
		'fa-chevron-down' => 'chevron-down',
		'fa-chevron-left' => 'chevron-left',
		'fa-chevron-right' => 'chevron-right',
		'fa-chevron-up' => 'chevron-up',
		'fa-hand-o-down' => 'hand-o-down',
		'fa-hand-o-left' => 'hand-o-left',
		'fa-hand-o-right' => 'hand-o-right',
		'fa-hand-o-up' => 'hand-o-up',
		'fa-long-arrow-down' => 'long-arrow-down',
		'fa-long-arrow-left' => 'long-arrow-left',
		'fa-long-arrow-right' => 'long-arrow-right',
		'fa-long-arrow-up' => 'long-arrow-up',
		'fa-toggle-down' => 'toggle-down',
		'fa-toggle-left' => 'toggle-left',
		'fa-toggle-right' => 'toggle-right',
		'fa-toggle-up' => 'toggle-up',
		'fa-arrows-alt' => 'arrows-alt',
		'fa-backward' => 'backward',
		'fa-compress' => 'compress',
		'fa-eject' => 'eject',
		'fa-expand' => 'expand',
		'fa-fast-backward' => 'fast-backward',
		'fa-fast-forward' => 'fast-forward',
		'fa-forward' => 'forward',
		'fa-pause' => 'pause',
		'fa-play' => 'play',
		'fa-play-circle' => 'play-circle',
		'fa-play-circle-o' => 'play-circle-o',
		'fa-step-backward' => 'step-backward',
		'fa-step-forward' => 'step-forward',
		'fa-stop' => 'stop',
		'fa-youtube-play' => 'youtube-play',
		'fa-adn' => 'adn',
		'fa-android' => 'android',
		'fa-apple' => 'apple',
		'fa-behance' => 'behance',
		'fa-behance-square' => 'behance-square',
		'fa-bitbucket' => 'bitbucket',
		'fa-bitbucket-square' => 'bitbucket-square',
		'fa-bitcoin' => 'bitcoin',
		'fa-btc' => 'btc',
		'fa-codepen' => 'codepen',
		'fa-css3' => 'css3',
		'fa-delicious' => 'delicious',
		'fa-deviantart' => 'deviantart',
		'fa-digg' => 'digg',
		'fa-dribbble' => 'dribbble',
		'fa-dropbox' => 'dropbox',
		'fa-drupal' => 'drupal',
		'fa-empire' => 'empire',
		'fa-facebook' => 'facebook',
		'fa-facebook-square' => 'facebook-square',
		'fa-flickr' => 'flickr',
		'fa-foursquare' => 'foursquare',
		'fa-ge' => 'ge',
		'fa-git' => 'git',
		'fa-git-square' => 'git-square',
		'fa-github' => 'github',
		'fa-github-alt' => 'github-alt',
		'fa-github-square' => 'github-square',
		'fa-gittip' => 'gittip',
		'fa-google' => 'google',
		'fa-google-plus' => 'google-plus',
		'fa-google-plus-square' => 'google-plus-square',
		'fa-hacker-news' => 'hacker-news',
		'fa-html5' => 'html5',
		'fa-instagram' => 'instagram',
		'fa-joomla' => 'joomla',
		'fa-jsfiddle' => 'jsfiddle',
		'fa-linkedin' => 'linkedin',
		'fa-linkedin-square' => 'linkedin-square',
		'fa-linux' => 'linux',
		'fa-maxcdn' => 'maxcdn',
		'fa-openid' => 'openid',
		'fa-pagelines' => 'pagelines',
		'fa-pied-piper' => 'pied-piper',
		'fa-pied-piper-alt' => 'pied-piper-alt',
		'fa-pied-piper-square' => 'pied-piper-square',
		'fa-pinterest' => 'pinterest',
		'fa-pinterest-square' => 'pinterest-square',
		'fa-qq' => 'qq',
		'fa-ra' => 'ra',
		'fa-rebel' => 'rebel',
		'fa-reddit' => 'reddit',
		'fa-reddit-square' => 'reddit-square',
		'fa-renren' => 'renren',
		'fa-share-alt' => 'share-alt',
		'fa-share-alt-square' => 'share-alt-square',
		'fa-skype' => 'skype',
		'fa-slack' => 'slack',
		'fa-soundcloud' => 'soundcloud',
		'fa-spotify' => 'spotify',
		'fa-stack-exchange' => 'stack-exchange',
		'fa-stack-overflow' => 'stack-overflow',
		'fa-steam' => 'steam',
		'fa-steam-square' => 'steam-square',
		'fa-stumbleupon' => 'stumbleupon',
		'fa-stumbleupon-circle' => 'stumbleupon-circle',
		'fa-tencent-weibo' => 'tencent-weibo',
		'fa-trello' => 'trello',
		'fa-tumblr' => 'tumblr',
		'fa-tumblr-square' => 'tumblr-square',
		'fa-twitter' => 'twitter',
		'fa-twitter-square' => 'twitter-square',
		'fa-vimeo-square' => 'vimeo-square',
		'fa-vine' => 'vine',
		'fa-vk' => 'vk',
		'fa-wechat' => 'wechat',
		'fa-weibo' => 'weibo',
		'fa-weixin' => 'weixin',
		'fa-windows' => 'windows',
		'fa-wordpress' => 'wordpress',
		'fa-xing' => 'xing',
		'fa-xing-square' => 'xing-square',
		'fa-yahoo' => 'yahoo',
		'fa-youtube' => 'youtube',
		'fa-youtube-play' => 'youtube-play',
		'fa-youtube-square' => 'youtube-square',
		'fa-ambulance' => 'ambulance',
		'fa-h-square' => 'h-square',
		'fa-hospital-o' => 'hospital-o',
		'fa-medkit' => 'medkit',
		'fa-plus-square' => 'plus-square',
		'fa-stethoscope' => 'stethoscope',
		'fa-user-md' => 'user-md',
		'fa-wheelchair' => 'wheelchair',
	);

?>
                         
                         
                         
                         <div class="iconholder">
                         	<div class="iconslist">
                            <?php
                            foreach ($fa_icons as $key => $value)
								{
									echo '<i title="'.$value.'" iconname="'.$value.'" class="fa fa-'.$value.'"></i>';
								}
							
							
							?>


                            </div>
                         </div>
                    
                    
                    
                    
                    
                </div>  
            
            </li>
            
                
            
        </ul>
        

        
    </div>



<?php


	
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function meta_boxes_woo_tab_save( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['meta_boxes_woo_tab_input_nonce'] ) )
    return $post_id;

  $nonce = $_POST['meta_boxes_woo_tab_input_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'meta_boxes_woo_tab_input' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;



  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
	$woo_tab_bg_img = sanitize_text_field( $_POST['woo_tab_bg_img'] );	
	$woo_tab_themes = sanitize_text_field( $_POST['woo_tab_themes'] );


	$woo_tab_default_bg_color = sanitize_text_field( $_POST['woo_tab_default_bg_color'] );	
	$woo_tab_active_bg_color = sanitize_text_field( $_POST['woo_tab_active_bg_color'] );


	$woo_tab_items_title_color = sanitize_text_field( $_POST['woo_tab_items_title_color'] );	
	$woo_tab_items_title_font_size = sanitize_text_field( $_POST['woo_tab_items_title_font_size'] );	

	$woo_tab_items_content_color = sanitize_text_field( $_POST['woo_tab_items_content_color'] );	
	$woo_tab_items_content_font_size = sanitize_text_field( $_POST['woo_tab_items_content_font_size'] );	
	
	$woo_tab_content_title = stripslashes_deep( $_POST['woo_tab_content_title'] );
	$woo_tab_content_title_icon = stripslashes_deep( $_POST['woo_tab_content_title_icon'] );
	$woo_tab_content_title_icon_custom = stripslashes_deep( $_POST['woo_tab_content_title_icon_custom'] );	
	$woo_tab_content_body = stripslashes_deep( $_POST['woo_tab_content_body'] );		
	
	if(isset($_POST['woo_tab_active'])){
		
		$woo_tab_active = sanitize_text_field( $_POST['woo_tab_active'] );
		}
	else{
		$woo_tab_active = '999999';
		}
		
		
	$woo_tab_items_collapsible = sanitize_text_field( $_POST['woo_tab_items_collapsible'] );		
	$woo_tab_items_animation = sanitize_text_field( $_POST['woo_tab_items_animation'] );	
	$woo_tab_items_animation_duration = sanitize_text_field( $_POST['woo_tab_items_animation_duration'] );			


  // Update the meta field in the database.
	update_post_meta( $post_id, 'woo_tab_bg_img', $woo_tab_bg_img );	
	update_post_meta( $post_id, 'woo_tab_themes', $woo_tab_themes );


	update_post_meta( $post_id, 'woo_tab_default_bg_color', $woo_tab_default_bg_color );
	update_post_meta( $post_id, 'woo_tab_active_bg_color', $woo_tab_active_bg_color );


	update_post_meta( $post_id, 'woo_tab_items_title_color', $woo_tab_items_title_color );
	update_post_meta( $post_id, 'woo_tab_items_title_font_size', $woo_tab_items_title_font_size );

	update_post_meta( $post_id, 'woo_tab_items_content_color', $woo_tab_items_content_color );
	update_post_meta( $post_id, 'woo_tab_items_content_font_size', $woo_tab_items_content_font_size );
	
	update_post_meta( $post_id, 'woo_tab_content_title', $woo_tab_content_title );
	update_post_meta( $post_id, 'woo_tab_content_title_icon', $woo_tab_content_title_icon );
	update_post_meta( $post_id, 'woo_tab_content_title_icon_custom', $woo_tab_content_title_icon_custom );	
	update_post_meta( $post_id, 'woo_tab_content_body', $woo_tab_content_body );	
	
	update_post_meta( $post_id, 'woo_tab_active', $woo_tab_active );	

	update_post_meta( $post_id, 'woo_tab_items_collapsible', $woo_tab_items_collapsible );
	update_post_meta( $post_id, 'woo_tab_items_animation', $woo_tab_items_animation );
	update_post_meta( $post_id, 'woo_tab_items_animation_duration', $woo_tab_items_animation_duration );	

}
add_action( 'save_post', 'meta_boxes_woo_tab_save' );


























?>