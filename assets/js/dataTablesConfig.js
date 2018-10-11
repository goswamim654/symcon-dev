$(document).ready(function () {
	var table= '';
	$('#autoren').on('init.dt',function() {
        $("#autoren").removeClass('table-loader').show();
	});
	setTimeout(function() {
		table = $('#autoren').DataTable({
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
		}],
		'order': [],
		"aoColumns": [
				{ "bSortable": false },
				null,
				null,
				null,
			{ "bSortable": false }
		]
    	});
	}, 2000);

	// Handle click on checkbox 
	$('#custom-table input[type="checkbox"]').change( function() {
		alert('checked')
	});

	$('#listViewForm').on('submit', function(e) {
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
				         .attr('name', 'autorId[]')
				         .val(this.value)
				   );
				   count++;
				} 
			//} 
	  	});
		if(count == 0) {
			e.preventDefault();
		}
	});
});