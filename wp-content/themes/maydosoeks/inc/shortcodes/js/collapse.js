// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_collapse', function(editor, url) {
		editor.addButton('cactus_collapse', {
			text: '',
			tooltip: 'Collapse',
			icon: 'icon-collapse',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Collapse',
					body: [
						{type: 'textbox', name: 'number', label: 'Number of Collapse'},
					],
					onsubmit: function(e) {
						// Insert content when the window form is submitted
						var uID =  Math.floor((Math.random()*100)+1);
						var number = e.data.number;
						var shortcode = '[collapse]<br class="cr"/>';
						for(i=0;i<number;i++){
							j=i+1;
								shortcode += '[citem title="title"]<br class="cr"/> Collapse Content <br class="cr"/>[/citem]<br class="cr"/>';
							}
						shortcode+= '[/collapse]<br class="cr"/>';
						editor.insertContent(shortcode);
					}
				});
			}
		});
	});
})();
