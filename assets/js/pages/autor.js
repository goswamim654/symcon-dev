$(document).ready(function () {
	//datepicker date of birth init
	$('#Geburtsjahr').datepicker(
	{
      	changeMonth: true,
			changeYear: true,
			dateFormat: 'dd/mm/yy'
		},
		$.datepicker.regional[ "de" ]
	);

	//datepicker date of death init
	$('#Todesjahr').datepicker(
	{
      	changeMonth: true,
			changeYear: true,
			dateFormat: 'dd/mm/yy'
		},
		$.datepicker.regional[ "de" ]
	);

	$('#Todesjahr').change(function() {
		if ($.datepicker.parseDate("dd/mm/yy",$('#Geburtsjahr').val()) > $.datepicker.parseDate("dd/mm/yy",$('#Todesjahr').val())) {
			$('#Todesjahr').val('');
			$('#Geburtsjahr').val('');
			$('#Geburtsjahr').focus();
			alert("Geburtsjahr cannot be greater than Todesjahr");
		}
	});
    

	jQuery.validator.addMethod("validDate", function(value, element) {
        return this.optional(element) || moment(value,"DD/MM/YYYY").isValid();
    }, "Please enter a valid date in the format DD/MM/YYYY");

	// form validation
	$.extend($.validator.messages, {
		    required: '<i class = "icon-exclamation-sign"></i>'
	});
    var validobj = $("#addAutorenForm").validate({
		errorPlacement: function(error, element) {
		error.appendTo(element.prev("span"));
		},
	 	rules: {
            'Nachname': "required",
        },
        messages: {
            'Nachname': "Nachname ist eine Pflichtangabe"
        }
	});

    $('#rowlinkModal').modal({
        keyboard: true,
        backdrop: "static",
        show:false,
        
    }, 3000).on('show.bs.modal', function(event) {
    	var modalHeader = 'Anzeigen Autor/Herausgeber';
    	var autor_id = $(event.relatedTarget).data('autor_id');
    	var Vorname = $(event.relatedTarget).data('vorname');
    	var Nachname = $(event.relatedTarget).data('nachname');
    	var Suchname = $(event.relatedTarget).data('suchname');
    	var Geburtsdatum = $(event.relatedTarget).data('geburtsdatum');
    	var Sterbedatum = $(event.relatedTarget).data('sterbedatum');
    	var Kommentar = $(event.relatedTarget).data('kommentar');
        $(this).find('.modal-title').html(modalHeader);
        $(this).find('#rowlinkModalDetails').html($('<label>Vorname:</label> '+ Vorname +'<br><label>Nachname:</label> '+ Nachname +'<br><label>Suchname:</label> '+ Suchname +'<br><label>Geburtsdatum:</label> '+ Geburtsdatum +'<br><label>Sterbedatum:</label> '+ Sterbedatum + '<br><label>Kommentar:</label> '+ Kommentar +'<br>'));
    }).on('hidden.bs.modal', function () {
    	$(this).find('#rowlinkModalDetails').html('');
	});
});