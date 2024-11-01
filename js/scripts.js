
jQuery(document).ready(function($)
	{
		
		
		$(document).on('click', '.woo_tab-header', function()
			{	
				if($(this).parent().hasClass('active'))
					{
					$(this).parent().removeClass('active');
					}
				else
					{
						$(this).parent().addClass('active');
					}
				
			
			})	
		
		$(document).on('click', '#woo_tab_metabox .reset-active', function()
			{	
				$('input[name="woo_tab_active"]').prop('checked', false);
				
			
			})			
		
		
		
		
		
		
		
		
		$(document).on('click', '.woo_tabicon-custom', function()
			{
				var iconid = $(this).attr("iconid");
				var icon_url = prompt("Please insert icon url","");
				
				if(icon_url != null)
					{
	
						$(this).css("background-image",'url('+icon_url+')');
							
						$(".woo_tab_content_title_icon_custom"+iconid).val(icon_url);
					}
				
				
				})
				
				
		
		$(document).on('click', '.woo_tabicon', function()
			{

				$(".iconholder").fadeIn();
				
				var iconid = $(this).attr("iconid");

				$(".iconslist i").attr("iconid",iconid);

			})
		
		$(document).on('click', '.iconslist i', function()
			{

				var iconname = $(this).attr("iconname");
				var iconid = $(this).attr("iconid");
				
				
				$(".woo_tabicon"+iconid+" i").removeAttr('class');			
				$(".woo_tabicon"+iconid+" i").addClass("fa fa-"+iconname);
				$(".woo_tab_content_title_icon"+iconid).val(iconname);

				
				$(".iconholder").fadeOut();

			})		
		
		
		
		
		

		$(document).on('click', '.woo_tab-content-buttons .add-woo_tab', function()
			{	

				var row = $.now();
						
				//alert(row);

				
				$(".woo_tab-content").append('<tr  index="'+row+'" valign="top"><td class="section-dragHandle">*</td><td class="tab-new" style="vertical-align:middle;"><div class="removeTabs">X</div><div class="woo_tabicon woo_tabicon'+row+'" iconid="'+row+'"><i  class="fa fa-plane"></i><input  type="hidden" class="woo_tab_content_title_icon woo_tab_content_title_icon'+row+'" name="woo_tab_content_title_icon['+row+']" value="plane" /></div><div title="Custom Iocn." class="woo_tabicon-custom woo_tabicon-custom'+row+'" iconid="'+row+'"><input  type="hidden" class="woo_tab_content_title_icon_custom woo_tab_content_title_icon_custom'+row+'" name="woo_tab_content_title_icon_custom['+row+']" value="" /></div><br/><br/><input width="100%" placeholder="Tabs Header" type="text" name="woo_tab_content_title['+row+']" value="" /><br /><br /><textarea placeholder="Tabs Content" name="woo_tab_content_body['+row+']" ></textarea><br /><br /></td></tr>');
				
				
				
				setTimeout(function(){
					
					$(".woo_tab-content tr:last-child td").removeClass("tab-new");
					
					}, 300);
				
				
				
				
				
			})	
		
		
		
		$(document).on('click', '#woo_tab_metabox .removeTabs', function()
			{	
				if (confirm('Do you really want to delete this tab ?')) {
					
					$(this).parent().parent().parent().remove();
				}
				
				
				
				
				
			})	
	
 		

	});	

