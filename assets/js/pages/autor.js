$(document).ready(function () {
	//datepicker init
	$('#Todesjahr, #Geburtsjahr').datepicker(
	{
      	changeMonth: true,
			changeYear: true,
			dateFormat: 'dd/mm/yy'
		},
		$.datepicker.regional[ "de" ]
	);

	$('#Todesjahr').change(function() {
		if ($('#Geburtsjahr').val() !== '' && ($.datepicker.parseDate("dd/mm/yy",$('#Geburtsjahr').val()) > $.datepicker.parseDate("dd/mm/yy",$('#Todesjahr').val()))) {
			$('#Todesjahr').val('');
			$('#Geburtsjahr').val('');
			$('#Geburtsjahr').focus();
			alert("Geburtsjahr cannot be greater than Todesjahr");
		}
	});

	$('#Geburtsjahr').change(function() {
		if ($('#Todesjahr').val() !== '' && ($.datepicker.parseDate("dd/mm/yy",$('#Geburtsjahr').val()) > $.datepicker.parseDate("dd/mm/yy",$('#Todesjahr').val()))) {
			$('#Todesjahr').val('');
			$('#Geburtsjahr').val('');
			$('#Geburtsjahr').focus();
			alert("Geburtsjahr cannot be greater than Todesjahr");
		}
	});

	// form validation
	
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
    	$(this).find('.modal-title').html('Anzeigen Autor/ Herausgeber');
    	var notAvailable = 'Nicht verfügba';
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

    	let autor = { Vorname: Vorname, Nachname: Nachname, Suchname:Suchname, Geburtsdatum: Geburtsdatum, Sterbedatum: Sterbedatum, Kommentar: Kommentar};
        let modalContents = '';
        for(let key in autor) {
        	modalContents += `<div class="row">
				<div class="col-xs-2"><label>${key}:</label></div>
				<div class="col-xs-10">${autor[key]}</div>
			</div>`;
        }
		$(this).find('#rowlinkModalDetails').html(modalContents);
        $(this).find('.col-xs-10').each(function () {
        	if($(this).html() === notAvailable) {
        		$(this).css( "color", "#A1C180" );
        	}
        });
    }).on('hidden.bs.modal', function () {
    	$(this).find('#rowlinkModalDetails').html('');
	});
});