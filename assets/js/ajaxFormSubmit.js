$(document).ready(function(e){
    $(".content-form").on('submit', function(e) {
    	e.preventDefault();
    	var form = $(this);
    	var url = '';
    	var actionType = form.data('action');
    	var sourceType = form.data('source');
    	
    	if(actionType == 'add') {
    		url = baseApiURL+sourceType+'/'+actionType;
    	} else if(actionType == 'update') {
    		var sourceIdValue = form.data('source_id_value');
    		var sourceIdName = form.data('source_id_name');
    		if(sourceIdName == 'id') {
    			url = baseApiURL+sourceType+'/'+actionType+'?'+sourceIdName+'='+sourceIdValue;
    			sourceType = 'Benutzer';
    		} else {
    			url = baseApiURL+sourceType+'/'+actionType+'?'+sourceIdName+'_id='+sourceIdValue;
    		}
    	} else {
    		url = baseApiURL+sourceType+'/'+actionType;
    	}
    	
        if(! form.valid()) return false;
        var request = $.ajax({
            type: 'POST',
            url: url,
            headers: {
		       "Authorization" : "Bearer "+token
		    },
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend:function(){
				$.blockUI({ message: '<h4><i class="fa fa-refresh fa-spin"></i> Einen Augenblick...</h4>' }); 

			},
			complete:function(jqXHR, status){
				$.unblockUI();
			}
        });
        request.done(function(response) {
        	function jsUcfirst(string) 
			{
    			return string.charAt(0).toUpperCase() + string.slice(1);
			}
			var responseData = null;
			try {
				responseData = JSON.parse(response); 
			} catch (e) {
				responseData = response;
			}
			var status = responseData.status;
			switch (status) { 
				case 1: 
					console.log(responseData.message);
					break;
				case 2:
					console.log(responseData.content);
					var message = '';
					if(actionType == 'add') {
						$("#reset").trigger('click');
						$('.dropify-clear').trigger('click');
						$(".select2").val('').trigger('change');
						message = jsUcfirst(sourceType) + ' erfolgreich erstellt';
					} else if(actionType == 'update') { 
						message = jsUcfirst(sourceType) +' wurde erfolgreich aktualisiert';
					} else if(actionType == 'change-password') {
						$("#reset").trigger('click');
						message = 'das Passwort wurde erfolgreich geändert';
					} else {
						message = jsUcfirst(sourceType)+'erfolgreich erstellt';
					}
					swal({
						type: 'success',
						title: 'Glückwunsch',
						text: message,
					});
					break;
				case 3:
					$("#reset").trigger('click');
					var errorMessage = '';
					for(let key in responseData.content) { 
						errorMessage += `<p>${responseData.content[key]}</p>`;
					}
					swal({
						type: 'error',
						title: 'Hoppla...',
						html: errorMessage,
					}); 
					console.log(errorMessage);
					console.log(responseData.message);
					break;
				case 4: 
					var errorMessage = responseData.message;
					swal({
						type: 'error',
						title: 'Hoppla...',
						html: errorMessage,
					});
					console.log(responseData.message);
					break;
				case 5: 
					var errorMessage = responseData.message;
					swal({
						type: 'error',
						title: 'Hoppla...',
						html: errorMessage,
					});
					console.log(responseData.message);
					break;
				case 6: 
					var errorMessage = responseData.message;
					swal({
						type: 'error',
						title: 'Hoppla...',
						html: errorMessage,
					});
					console.log(responseData.message);
					break;
				default:
					console.log('Unexpected errors');
			}
		});

		request.fail(function(jqXHR, textStatus) {
			var errorData = null;
			try {
			  errorData = JSON.parse(jqXHR); 
			} catch (e) {
			  errorData = jqXHR;
			}
			swal({
				type: 'error',
				title: 'Hoppla...',
				html: errorData,
			});
			console.log("Error : "+errorData);
		});
      });
});