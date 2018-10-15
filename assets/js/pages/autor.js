$(document).ready(function () {
	//datepicker init
	$('#todesjahr, #geburtsjahr').datepicker(
	{
      	changeMonth: true,
			changeYear: true,
			dateFormat: 'dd/mm/yy'
		},
		$.datepicker.regional[ "de" ]
	);

	$('#todesjahr').change(function() {
		if ($('#geburtsjahr').val() !== '' && ($.datepicker.parseDate("dd/mm/yy",$('#geburtsjahr').val()) > $.datepicker.parseDate("dd/mm/yy",$('#todesjahr').val()))) {
			$('#todesjahr').val('');
			$('#geburtsjahr').val('');
			$('#geburtsjahr').focus();
			alert("geburtsjahr cannot be greater than todesjahr");
		}
	});

	$('#geburtsjahr').change(function() {
		if ($('#todesjahr').val() !== '' && ($.datepicker.parseDate("dd/mm/yy",$('#geburtsjahr').val()) > $.datepicker.parseDate("dd/mm/yy",$('#todesjahr').val()))) {
			$('#todesjahr').val('');
			$('#geburtsjahr').val('');
			$('#geburtsjahr').focus();
			alert("geburtsjahr cannot be greater than todesjahr");
		}
	});

	// form validation
	
    var validobj = $("#addAutorenForm").validate({
		errorPlacement: function(error, element) {
		error.appendTo(element.prev("span"));
		},
	 	rules: {
            'nachname': "required",
        },
        messages: {
            'nachname': "Nachname ist eine Pflichtangabe"
        }
	});

    $('#rowlinkModal').modal({
        keyboard: true,
        show:false,
        
    }, 5000).on('show.bs.modal', function(event) {
    	var $this = $(this);
    	var autor_id = $(event.relatedTarget).data('autor_id');
    	$.ajax({
		    url: absoluteUrl+'/ajax/autoren.php?autor_id='+autor_id,
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
					var vorname= '';
					var nachname='';
					var suchname='';
					var geburtsdatum='';
					var sterbedatum='';
					var kommentar='';
					var notAvailable = 'Nicht verfügba';
					$.each( responseData.content.data, function( key, value ) {
						if(key == 'vorname') vorname = value;
						if(key == 'nachname') nachname = value;
						if(key == 'suchname') suchname = value;
						if(key == 'geburtsdatum') geburtsdatum = value;
						if(key == 'sterbedatum') sterbedatum = value;
						if(key == 'kommentar') kommentar = value;
				    });
				    if(vorname == null || vorname == null) vorname = notAvailable;
			    	if(nachname == null || nachname == null) nachname = notAvailable;
			    	if(suchname == null || suchname == null) suchname = notAvailable;
			    	if(geburtsdatum == null || geburtsdatum == null) geburtsdatum = notAvailable;
			    	if(sterbedatum == null || sterbedatum == null) sterbedatum = notAvailable;
			    	if(kommentar == null || kommentar == '' ) kommentar = notAvailable;

			    	let autor = { 'Vorname':vorname, 'Nachname':nachname, 'Suchname':suchname, 'Geburtsjahr/ datum':geburtsdatum, 'Todesjahr/ datum':sterbedatum, 'Kommentar':kommentar };
			        let modalContents = '';
			        for(let key in autor) {
			        	modalContents += `<div class="row">
							<div class="col-xs-3"><label>${key}:</label></div>
							<div class="col-xs-9 autor-value">${autor[key]}</div>
						</div>`;
			        }
			        $this.find('.modal-title').html('Anzeigen Autor/ Herausgeber');
					$this.find('#rowlinkModalDetails').html(modalContents);
			        $this.find('.autor-value').each(function () {
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