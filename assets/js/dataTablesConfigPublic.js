$(document).ready(function () {
	$('#dataTable').on('init.dt',function() {
        $("#dataTable").removeClass('table-loader').show();
	});
	$('#dataTable').DataTable({ 
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"responsive": true,
		"language": {
	       "url": absoluteUrl+"lang/dataTableGerman.json"
	   	}
	});
});