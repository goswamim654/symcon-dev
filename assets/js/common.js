$(document).ready(function () {
		    
	//  multiple select
	$('.select2').select2();

	//datepicker init
	$('#Jahr').datepicker(
		{
	  	changeMonth: true,
			changeYear: true,
			dateFormat: 'dd/mm/yy'
		},
		$.datepicker.regional[ "de" ]
	);

	// Quelle form validation

	$.extend($.validator.messages, {
	    required: '<i class = "icon-exclamation-sign"></i>'
	});
	
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

	$('.alert-hide').fadeOut( 'slow');

});