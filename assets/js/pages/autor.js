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
        
    }, 5000).on('show.bs.modal', function(event) {
    	var $this = $(this);
    	var autorId = $(event.relatedTarget).data('autorid');
    	$.ajax({
		    url: absoluteUrl+'/ajax/autoren.php?autorId='+autorId,
			beforeSend:function() {
				$this.find('.modal-title').html('Loading...');
				var modalLoader = `<div class="overlay" style="height: 150px;">
				              	<i class="fa fa-refresh fa-spin"></i>
				            </div>`;
				$this.find('#rowlinkModalDetails').html(modalLoader);
			}
	    }).done(function(response) {
	      	var responseData = null;
	      	try {
	          	responseData = JSON.parse(response); 
	      	} catch (e) {
	          	responseData = response;
	      	}
			//console.log(responseData);
			var status = responseData.status;
			switch (status) { 
				case 1: 
					//console.log(responseData.message);
					$this.find('#rowlinkModalDetails').html(responseData.message);
					break;
				case 2:
					var Vorname= '';
					var Nachname='';
					var Suchname='';
					var Geburtsdatum='';
					var Sterbedatum='';
					var Kommentar='';
					var notAvailable = 'Nicht verfügba';
					$.each( responseData.content.data, function( key, value ) {
						if(key == 'Vorname') Vorname = value;
						if(key == 'Nachname') Nachname = value;
						if(key == 'Suchname') Suchname = value;
						if(key == 'Geburtsdatum') Geburtsdatum = value;
						if(key == 'Sterbedatum') Sterbedatum = value;
						if(key == 'Kommentar') Kommentar = value;
				    });
				    if(Vorname == null || Vorname == null) Vorname = notAvailable;
			    	if(Nachname == null || Nachname == null) Nachname = notAvailable;
			    	if(Suchname == null || Suchname == null) Suchname = notAvailable;
			    	if(Geburtsdatum == null || Geburtsdatum == null) Geburtsdatum = notAvailable;
			    	if(Sterbedatum == null || Sterbedatum == null) Sterbedatum = notAvailable;
			    	if(Kommentar == null || Kommentar == '' ) Kommentar = notAvailable;

			    	let autor = { Vorname:Vorname, Nachname:Nachname, Suchname:Suchname, Geburtsdatum:Geburtsdatum, Sterbedatum:Sterbedatum, Kommentar:Kommentar };
			        let modalContents = '';
			        for(let key in autor) {
			        	modalContents += `<div class="row">
							<div class="col-xs-2"><label>${key}:</label></div>
							<div class="col-xs-10">${autor[key]}</div>
						</div>`;
			        }
			        $this.find('.modal-title').html('Anzeigen Autor/ Herausgeber');
					$this.find('#rowlinkModalDetails').html(modalContents);
			        $this.find('.col-xs-10').each(function () {
			        	if($(this).html() === notAvailable) {
			        		$(this).css( "color", "#A1C180" );
			        	}
			    });
			}
		});
    }).on('hidden.bs.modal', function () {
    	$(this).find('#rowlinkModalDetails').html('');
	});
});