// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_button', function(editor, url) {
		editor.addButton('cactus_button', {
			text: '',
			tooltip: 'Button',
			icon: 'icon-button',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Button',
					body: [
						{type: 'textbox', name: 'text', label: 'Button Text'},
						{type: 'textbox', name: 'href', label: 'Button Link', value:"#"},
						{type: 'textbox', name: 'bgcolor', label: 'Background Color', value:"#", id: 'newcolorpicker_buttonbg'},
					],
					onsubmit: function(e) {
						//var uID =  Math.floor((Math.random()*100)+1);
						// Insert content when the window form is submitted
						editor.insertContent('[button href="'+e.data.href+'" bg_color="'+e.data.bgcolor+'"]'+e.data.text+'[/button]');
					}
				});
			}
		});
	});
})();
