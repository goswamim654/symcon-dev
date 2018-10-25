$(document).ready(function () {
	$('#dataTable').on('init.dt',function() {
        $("#dataTable").removeClass('table-loader').show();
	});
	$('#dataTable').DataTable({ 
		"responsive": true,
		"language": {
	       "url": absoluteUrl+"lang/dataTableGerman.json"
	   	}
	});
});