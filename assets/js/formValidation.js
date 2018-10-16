$(document).ready(function () {
    // form validation
    
    var addAutorenForm = $("#addAutorenForm").validate({
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
	var changePassword = $("#changePassword").validate({
		errorPlacement: function(error, element) {
		error.appendTo(element.prev("span"));
		},
		rules: {
            current_password: {
                required: true,
                minlength: 6
            },
            new_password: {
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                minlength: 6,
                equalTo : "#new_password"
            }
        },     
        messages: {
            current_password: {
                required: "Derzeitiges Passwort ist eine Pflichtangabe",
                minlength: "Ihr aktuelles Passwort muss aus 6 Zeichen bestehen" 
            },
            new_password: {
                required: "Neues Passwort ist eine Pflichtangabe",
                minlength: "Ihr aktuelles Passwort muss aus 6 Zeichen bestehen" 
            },
            confirm_password: {
                required: "Bestätige neues Passwort Passwort ist eine Pflichtangabe",
                minlength: "Ihr aktuelles Passwort muss aus 6 Zeichen bestehen" ,
                equalTo : "Passwort stimmt nicht überein !!!"
            } 
        }
	});

	var changeEmail = $("#changeEmail").validate({
		errorPlacement: function(error, element) {
		error.appendTo(element.prev("span"));
		},
		rules: {
            admin_email: {
                required: true,
                email: true
            }
        },     
        messages: {
            admin_email: {
                required: "Email ist eine Pflichtangabe",
                email: "Bitte geben Sie eine gültige Email-Adresse ein" 
            }
        }
	});

    var addHerkunftForm = $("#addHerkunftForm").validate({
        errorPlacement: function(error, element) {
        error.appendTo(element.prev("span"));
        },
        rules: {
            code: {
                required: true
            },
            titel: {
                required: true
            }
        },     
        messages: {
            code: {
                required: "Code ist eine Pflichtangabe"
            },
            titel: {
                required: "Titel ist eine Pflichtangabe"
            }
        }
    });

    var addVerlageForm = $("#addVerlageForm").validate({
        errorPlacement: function(error, element) {
        error.appendTo(element.prev("span"));
        },
        rules: {
            titel : {
                required: true
            },
            email: {
                email: true
            }
        },     
        messages: {
            titel : {
                required: "Titel ist eine Pflichtangabe"
            },
            email: {
                email: "Bitte geben Sie eine gültige Email-Adresse ein" 
            }
        }
    });

    var addQuelleForm = $("#addQuelleForm").validate({
        errorPlacement: function(error, element) {
            error.appendTo(element.prev("span"));
        },

        rules: {
            code: "required",
            titel: "required",
            sprache: "required",
            jahr: "required",
            auflage: "required",
            verlag_id: "required"
        },
        messages: {
            code: "Kurzel ist eine Pflichtangabe",
            titel: "Titel ist eine Pflichtangabe",
            sprache: 'Sprache ist eine Pflichtangabe',
            jahr: "Jahr ist eine Pflichtangabe",
            auflage: "Auflage ist eine Pflichtangabe",
            verlag_id: "Verlag ist eine Pflichtangabe"
        }
    });

});