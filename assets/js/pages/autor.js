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
    	//console.log(autorId);
    	var request = $.ajax({
		    url: "https://www.alegralabs.com/hemanta/symcom/api/public/v1/autor/view?autorId="+autorId,
		    headers: {
		        "Authorization" : "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImFlOGJkMWVjMGU2ZjEzZDI5NDhlNmQ2YjQyZGQ0MDA5MGMwMjk0OWEyZTliYjM1YjUzNWZiMjUyYWZjY2JmZTAzNWZlOGRhZDQ0ODhiMWZmIn0.eyJhdWQiOiIyIiwianRpIjoiYWU4YmQxZWMwZTZmMTNkMjk0OGU2ZDZiNDJkZDQwMDkwYzAyOTQ5YTJlOWJiMzViNTM1ZmIyNTJhZmNjYmZlMDM1ZmU4ZGFkNDQ4OGIxZmYiLCJpYXQiOjE1Mzg2NDUyMzQsIm5iZiI6MTUzODY0NTIzNCwiZXhwIjoxNTcwMTgxMjM0LCJzdWIiOiIxIiwic2NvcGVzIjpbIioiXX0.TD6-FmgI_tX3S-UYWlS2Uz8uxCtgIqpCb2g-cX4RwggLbuFNz6nc-GZF80NO3VUkSVNXhf4QLF-whZvHwjfPuXxgLKr7Zk_tNZcFKb2uLsH08STim9GjiPXg5b9rHgk8rytP7n5tn8liYFDg2_8GrZIAHwG8Fhm9UwVsb4irUV0jEIBE3j61mOo_LTbWw-ut15hF6_zfsoYNCpR1nxItRjqo_AxjLk5e99hNCi0ox8B2zVTyLn8C2y0j5S3rAlAfI6kZ6h5LUof-y4BXhGCTr_1UZ6uokTPlBOnh1MY6AeBANWcy_RxkQb_jiqx-4I_HE__SB4hem5T0jC__yh5EXPGwmgFaz9o-DlISokcgwbCS_BJaDwkArz226cTUm6NmKVYclwCi9H9dspGJlhS9g2vRgMi80N2Jzntt0Q87EfsHkdG1OxTdYurE74sF_CM_u_QFTAdtoPxJCmEe0Arqdlv9jzsjUa85kLQrYp6qQq6cBnecQzsRbmEGiqkOEe3BwlvFFrY-gnd1oMvviXhvz5cqzEth_v6ODlDWEZvmvzYr3oSa1PCZe7Lm3h3tCLvhB9nCRG6hpwNAj1O4aYUOVxZXtrycsR2cusOIPhlxI77Md3h1JSOK5g5Y2reBHe5Ua3jjEWwdiBQ6qL79GaXyxyTcKw-XjhoxKGg-lm2_drw"
			},
			type: "GET",
			// data: {
			//   'username' : 'harry',
			//   'password' : 'guest!@#'
			// },
			beforeSend:function() {
				$this.find('.modal-title').html('Loading...');
				var loader = `<div class="overlay" style="height: 150px;">
				              	<i class="fa fa-refresh fa-spin"></i>
				            </div>`;
				$this.find('#rowlinkModalDetails').html(loader);
			},
			complete:function(jqXHR, status){
				//$this.find('#rowlinkModalDetails').html('');
			}
	    });
	    request.done(function(response) {
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
					console.log(responseData.message);
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