$(function() {


	var tinymce_options = {

		height : '150px',

		language : 'de',

		toolbar : " bold italic underline AddSpace ",

		content_css : [ "../../plugins/tinymce/css/text.css" ],

		menubar:false,

    	statusbar: false,

		formats: {
	       custom_format: {inline: 'span', attributes: {class: 'text-sperrschrift'}}
	    },

		setup: function(editor) {
	        editor.addButton('AddSpace', {
	            icon: 'space fa fa-fw fa-arrows-h',
	            //image: '../../plugins/tinymce/icons/icons8-add-white-space-30.png',
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