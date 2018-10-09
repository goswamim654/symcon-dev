$(document).ready(function () {
	$('#autoren').on('init.dt',function() {
        $("#autoren").removeClass('table-loader').show();
	});
	setTimeout(function() {
		var table = $('#autoren').DataTable({
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
		'order': [[1, 'asc']],
		"aoColumns": [
				{ "bSortable": false },
				null,
				null,
				null,
			{ "bSortable": false }
		]
    	});
	}, 2000);
	//datatable init quellen
	// var table = $('#quellen').DataTable({
	// 	//'ajax': 'https://api.myjson.com/bins/1us28',  
	// 	"responsive": true,
 //    	"language": {
 //           "url": absoluteUrl+"lang/dataTableGerman.json"
 //       	},
	// 	'columnDefs': [{
	// 	 'targets': 0,
	// 	 'searchable': false,
	// 	 'orderable': false,
	// 	 'className': 'dt-body-center',
	// 	 'render': function (data, type, full, meta){
	// 	     return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
	// 	 }
	// 	}],
	// 	'order': [[1, 'asc']],
	// 	"aoColumns": [
	// 			{ "bSortable": false },
	// 			null,
	// 			null,
	// 			null,
	// 			null,
	// 			null,
	// 		{ "bSortable": false }
	// 	]
 //    });


 //    //datatable init zeitschriften

	// var table = $('#zeitschriften').DataTable({
	// 	//'ajax': 'https://api.myjson.com/bins/1us28',  
	// 	"responsive": true,
 //    	"language": {
 //           "url": absoluteUrl+"lang/dataTableGerman.json"
 //       	},
	// 	'columnDefs': [{
	// 	 'targets': 0,
	// 	 'searchable': false,
	// 	 'orderable': false,
	// 	 'className': 'dt-body-center',
	// 	 'render': function (data, type, full, meta){
	// 	     return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
	// 	 }
	// 	}],
	// 	'order': [[1, 'asc']],
	// 	"aoColumns": [
	// 			{ "bSortable": false },
	// 			null,
	// 			null,
	// 			null,
	// 			null,
	// 			null,
	// 			null,
	// 			null,
	// 		{ "bSortable": false }
	// 	]
 //    });

 //    //datatable init arzneien
    
	// var table = $('#arzneien').DataTable({
	// 	//'ajax': 'https://api.myjson.com/bins/1us28',  
	// 	"responsive": true,
 //    	"language": {
 //           "url": absoluteUrl+"lang/dataTableGerman.json"
 //       	},
	// 	'columnDefs': [{
	// 	 'targets': 0,
	// 	 'searchable': false,
	// 	 'orderable': false,
	// 	 'className': 'dt-body-center',
	// 	 'render': function (data, type, full, meta){
	// 	     return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
	// 	 }
	// 	}],
	// 	'order': [[1, 'asc']],
	// 	"aoColumns": [
	// 			{ "bSortable": false },
	// 			null,
	// 			null,
	// 			null,
	// 		{ "bSortable": false }
	// 	]
 //    });


    //datatable init arzneien
    
	


    // Handle click on "Select all" control
	// $('#example-select-all').on('click', function(){
	// 	// Get all rows with search applied
	// 	var rows = table.rows({ 'search': 'applied' }).nodes();
	// 	// Check/uncheck checkboxes for all rows in the table
	// 	$('input[type="checkbox"]', rows).prop('checked', this.checked);
	// });

	// Handle click on checkbox to set state of "Select all" control
	$('#example tbody').on('change', 'input[type="checkbox"]', function(){
		// If checkbox is not checked
		if(!this.checked) {
			// var el = $('#example-select-all').get(0);
			// // If "Select all" control is checked and has 'indeterminate' property
			// if(el && el.checked && ('indeterminate' in el)){
			// 	// Set visual state of "Select all" control
			// 	// as 'indeterminate'
			// 	el.indeterminate = true;
			// }
		}
	});

	$('#frm-example').on('submit', function(e) {
		var form = this;

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
				         .attr('name', this.name)
				         .val(this.value)
				   );
				}
			//} 
	  });

	  // FOR TESTING ONLY
	  
	  // Output form data to a console
	  // $('#example-console').text($(form).serialize()); 
	  //console.log("Form submission", $(form).serialize()); 
	   
	  // Prevent actual form submission
	  e.preventDefault();
	});
});