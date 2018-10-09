$(document).ready(function () {
	// extend juery validation rule
	$.extend($.validator.messages, {
		    required: '<i class = "icon-exclamation-sign"></i>'
	});    
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

	$('.alert-hide').fadeOut(5000);

});