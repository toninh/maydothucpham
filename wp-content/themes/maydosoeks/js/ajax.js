( function() {
	// Save current page
	if(typeof cactus.query_vars !== 'undefined'){
		_current_page = cactus.query_vars.paged;
	} else {
		_current_page = -1;
	}
	if(_current_page == 0) _current_page = 1;
	// flag to check if an ajax is executing
	_ajax_loading = false;
	
	jQuery(document).ready(function(){
		if(jQuery('#navigation-ajax').length > 0){
			jQuery('#navigation-ajax').live('click', function(e){
				  e.preventDefault();
				  if(_current_page > -1 && !_ajax_loading){
						item_template = jQuery(this).attr('data-template');
						
						data = 	{	
									action: 'load_more',
									page: _current_page,
									template: item_template,
									vars:cactus.query_vars
								};
						
						content_div = jQuery(this).attr('data-target');
						
						_ajax_loading = true;
					    jQuery.ajax({
							  type: 'POST',
							  url: cactus.ajaxurl,
							  cache: false,
							  data: data,
							  success: function(data, textStatus, XMLHttpRequest){
								if(data != ''){
									// do something fancy before appending data?
									
									// then append data
									jQuery(content_div).append(data);
									
									// increase current page
									_current_page = _current_page + 1;
								} else {
									_current_page = -1;
									// do something else when there is no more results
									alert('No more results. You should do something, like hiding this link button. Edit me in /js/ajax.js');
								}
								
								_ajax_loading = false;
							  },
							  error: function(MLHttpRequest, textStatus, errorThrown){
									alert(errorThrown);
									_ajax_loading = false;
							  }
						  });
					}

				});
		}
	});
}) ();