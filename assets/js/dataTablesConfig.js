$(document).ready(function () {
	var table= '';
	$('#dataTable').on('init.dt',function() {
        $("#dataTable").removeClass('table-loader').show();
	});
	setTimeout(function() {
		table = $('#dataTable').DataTable({
			//'ajax': 'https://api.myjson.com/bins/1us28',  
			"responsive": true,
	    	"language": {
	           "url": absoluteUrl+"lang/dataTableGerman.json"
	       	},
			'columnDefs': [{
			 'targets': 0,
			 'searchable': false,
			 'orderable': false,
			 'className': 'dt-body-center',
			 'render': function (data, type, full, meta){
			     return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
			 }
			}]
    	});
	}, 2000);

	// Handle click on checkbox 
	$('#custom-table input[type="checkbox"]').change( function() {
		alert('checked')
	});

	$('#listViewForm').on('submit', function(e) {
		e.preventDefault();
		var form = this;
		var count = 0;
		// Iterate over all checkboxes in the table
		table.$('input[type="checkbox"]').each(function() {
			// If checkbox doesn't exist in DOM
			//if(!$.contains(document, this)){
				// If checkbox is checked
				if(this.checked) {
					//console.log('checked');
				   // Create a hidden element 
				   $(form).append(
				      $('<input>')
				         .attr('type', 'hidden')
				         .attr('name', 'delete_array_id[]')
				         .val(this.value)
				   );
				   count++;
				} 
			//} 
	  	});
		if(count == 0) {
			e.preventDefault();
		} else {
			swal({
			  title: 'Bist du sicher?',
			  text: "Sie können dies nicht rückgängig machen!",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Ja, lösche es!',
			  cancelButtonText: 'Stornieren',
			}).then((result) => {
			  if (result.value) {
			  	form.submit();
			   } 
			})
		}
		
	});
});