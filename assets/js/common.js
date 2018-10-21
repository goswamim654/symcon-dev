$(document).ready(function () {
	$('.dropify').dropify({
	    messages: {
	        'default': 'Ziehen Sie eine Datei hierher und klicken Sie auf',
	        'replace': 'Drag & Drop oder Klick zum Ersetzen',
	        'remove':  'Löschen',
	        'error':   'Hoppla, etwas ist passiert.'
	    },
	    error: {
	        'imageFormat': 'Die Datei ist nicht erlaubt ({{ value }} nur).'
    	}
	});
	// extend juery validation rule
	$.extend($.validator.messages, {
		    required: '<i class = "icon-exclamation-sign"></i>'
	});    
	//  multiple select
	$('.select2').select2();

	//datepicker init
	$('#jahr').datepicker(
		{
	  		changeMonth: false,
			changeYear: true,
			dateFormat: 'yy'
		},
		$.datepicker.regional[ "de" ]
	);
	
	$('.normal-search a').click(function() {
		$(this).hide();
		$('.navbar-custom-menu').hide();
		$('input#navbar-search-input').show();
		$('.closeBtn').show();
	});
	$('.closeBtn').click( function() {
		$(this).hide();
		$('.navbar-custom-menu').show();
		$('input#navbar-search-input').hide();
		$('.normal-search a').show();
	});

	$(document).keydown(function(e) { 
	    if (e.keyCode == 27) { 
	        $("#rowlinkModal").modal('hide');
	    } 
	});

});