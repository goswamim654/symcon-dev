$("#addQuelleForm").validate({
	errorPlacement: function(error, element) {
		error.appendTo(element.prev("span"));
	},

	rules: {
	    code: "required",
	    Titel: "required",
	    Sprache: "required",
	    Jahr: "required",
	    Auflage: "required",
	    Verlag: "required"
	},
	messages: {
	    code: "Kurzel ist eine Pflichtangabe",
	    Titel: "Titel ist eine Pflichtangabe",
	    Sprache: 'Sprache ist eine Pflichtangabe',
	    Jahr: "Jahr ist eine Pflichtangabe",
	    Auflage: "Auflage ist eine Pflichtangabe",
	    Verlag: "Verlag ist eine Pflichtangabe"
	}
});