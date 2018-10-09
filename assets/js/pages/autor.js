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

	$('#Geburtsjahr').change(function() {
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
        show:false,
        
    }, 3000).on('show.bs.modal', function(event) {
    	var notAvailable = 'Nicht verfügba';
    	var modalHeader = 'Anzeigen Autor/ Herausgeber';
    	var autor_id = $(event.relatedTarget).data('autor_id');
    	var Vorname = $(event.relatedTarget).data('vorname');
    	if(Vorname === '') Vorname = notAvailable;
    	var Nachname = $(event.relatedTarget).data('nachname');
    	if(Nachname === '') Nachname = notAvailable;
    	var Suchname = $(event.relatedTarget).data('suchname');
    	if(Suchname === '') Suchname = notAvailable;
    	var Geburtsdatum = $(event.relatedTarget).data('geburtsdatum');
    	if(Geburtsdatum === '') Geburtsdatum = notAvailable;
    	var Sterbedatum = $(event.relatedTarget).data('sterbedatum');
    	if(Sterbedatum === '') Sterbedatum = notAvailable;
    	var Kommentar = $(event.relatedTarget).data('kommentar');
    	if(Kommentar === '') Kommentar = notAvailable;
        $(this).find('.modal-title').html(modalHeader);
        $(this).find('#rowlinkModalDetails').html('<div class="row"><div class="col-xs-2"><label>Vorname:</label></div><div class="col-xs-10">'+ Vorname +'</div></div><div class="row"><div class="col-xs-2"><label>Nachname:</label></div><div class="col-xs-10">'+ Nachname +'</div></div><div class="row"><div class="col-xs-2"><label>Suchname:</label></div><div class="col-xs-10">'+ Suchname +'</div></div><div class="row"><div class="col-xs-2"><label>Geburtsdatum:</label></div><div class="col-xs-10">'+ Geburtsdatum +'</div></div><div class="row"><div class="col-xs-2"><label>Sterbedatum:</label></div><div class="col-xs-10">'+ Sterbedatum + '</div></div><div class="row"><div class="col-xs-2"><label>Kommentar:</label></div><div class="col-xs-10">'+ Kommentar +'</div></div>');
        var value = $(this).find('.col-xs-10').each(function () {
        	if($(this).html() === notAvailable) {
        		$(this).css( "color", "#A1C180" );
        	}
        });
    }).on('hidden.bs.modal', function () {
    	$(this).find('#rowlinkModalDetails').html('');
	});
});