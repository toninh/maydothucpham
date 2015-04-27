// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_tabs', function(editor, url) {
		editor.addButton('cactus_tabs', {
			text: '',
			tooltip: 'Tabs',
			icon: 'icon-tabs',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Tabs',
					body: [
						{type: 'textbox', name: 'number', label: 'Number of Tabs'},
					],
					onsubmit: function(e) {
						// Insert content when the window form is submitted
						var uID =  Math.floor((Math.random()*100)+1);
						var number = e.data.number;
						var shortcode = '[tabs id="tabs-' + uID + '"]<br class="cr"/>';
						shortcode += '[thead]';
						for(i=0;i<number;i++){
							j=i+1;
								shortcode += '<br class="cr"/>[tab id="tab-' + (uID + j) + '" title="Tab Title"]';
							}
						/*	shortcode +='<br class="cr"/>[dropdown title="title"]';
								for(i=0;i<number;i++){
									j=i+1;
									shortcode += '<br class="cr"/>[tab href="#" title="title"]';
								}
							shortcode +='<br class="cr"/>[/dropdown]';*/
							shortcode += '<br class="cr"/>[/thead]<br class="cr"/>[tcontents]';
						for(i=0;i<number;i++){
							j=i+1;
								shortcode += '<br class="cr"/>[tcontent id="tab-' + (uID + j) + '"] Tab Content [/tcontent]';
							}
						shortcode+= '<br class="cr"/>[/tcontents]<br class="cr"/>[/tabs]<br class="cr"/>';
						editor.insertContent(shortcode);
					}
				});
			}
		});
	});
})();
