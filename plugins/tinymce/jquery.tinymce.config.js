$(function() {

	var tinymce_options = {

		height : '154px',

		language : 'de',

		entity_encoding : "raw",

		style_formats : [
			{
				title : 'Sperrschrift',
				inline : 'span', 
				classes : 'text-sperrschrift'
			},
			{
		      title: 'Bild links',
		      selector: 'img',
					classes : 'image-left'
		    },
		    {
		      title: 'Bild rechts',
		      selector: 'img',
					classes : 'image-right'
		    }
		],

		statusbar: false,

		plugins : [ "responsivefilemanager,table,image,imagetools,charmap,link,code,textcolor,searchreplace,paste,visualchars" ],

		toolbar : "undo redo | styleselect | bold italic AddSpace | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image responsivefilemanager",
		
		content_css : [ "../../plugins/tinymce/css/text.css" ],

		formats: {
	       custom_format: {inline: 'span', attributes: {class: 'text-sperrschrift'}}
	    },

		setup: function(editor) {
	        editor.addButton('AddSpace', {
	            icon: 'space fa fa-fw fa-arrows-h',
	            tooltip: "Add Space",
	            onPostRender: function() {
				    var _this = this;   // reference to the button itself
				    editor.on('NodeChange', function(e) {
				        _this.active($( editor.selection.getNode() ).hasClass('text-sperrschrift'));
				    })
				},
	            onclick: function() {
	                tinymce.activeEditor.formatter.toggle('custom_format')
	            }

	        });
		}
	};

	$('textarea.texteditor').tinymce(tinymce_options);

});