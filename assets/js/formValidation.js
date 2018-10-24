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
            password: {
                required: true,
                minlength: 6
            },
            password_confirmation: {
                required: true,
                minlength: 6,
                equalTo : "#password"
            }
        },     
        messages: {
            current_password: {
                required: "Derzeitiges Passwort ist eine Pflichtangabe",
                minlength: "Ihr aktuelles Passwort muss aus 6 Zeichen bestehen" 
            },
            password: {
                required: "Neues Passwort ist eine Pflichtangabe",
                minlength: "Ihr aktuelles Passwort muss aus 6 Zeichen bestehen" 
            },
            password_confirmation: {
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

    var addZeitschriftForm = $("#addZeitschriftForm").validate({
        errorPlacement: function(error, element) {
        error.appendTo(element.prev("span"));
        },
        // view.
        highlight: function (element, errorClass, validClass) {
            var elem = $(element);
            if (elem.hasClass("select2-hidden-accessible")) {
                $(".select2-selection__rendered").addClass(errorClass);
            } else {
                elem.addClass(errorClass);
            }
        },

        //When removing make the same adjustments as when adding
        unhighlight: function (element, errorClass, validClass) {
            var elem = $(element);
            if (elem.hasClass("select2-hidden-accessible")) {
                $(".select2-selection__rendered").removeClass(errorClass);
            } else {
                elem.removeClass(errorClass);
            }
        },
         rules: {
            'code': "required",
            'titel': "required",
            'jahr': "required",
            'autor_id[]': "required"
        },
        messages: {
            'code': "Kurzel ist eine Pflichtangabe",
            'titel': "Titel ist eine Pflichtangabe",
            'jahr': "Jahr ist eine Pflichtangabe",
            'autor_id[]': "Autor/ Herausgeber ist eine Pflichtangabe"
        }
    });

    $(document).on("change", "#addZeitschriftForm .select2-hidden-accessible", function () {
        if (!$.isEmptyObject(addZeitschriftForm.submitted)) {
            addZeitschriftForm.form();
        }
    });
     $(document).on("#addZeitschriftForm select2-opening", function (arg) {
        var elem = $(arg.target);
        if ($("#addZeitschriftForm .select2-selection__rendered").hasClass("error")) {
            //jquery checks if the class exists before adding.
            $("#addZeitschriftForm .select2-drop ul").addClass("error");
        } else {
            $("#addZeitschriftForm .select2-drop ul").removeClass("error");
        }
    });

    var addArzneiForm = $("#addArzneiForm").validate({
        errorPlacement: function(error, element) {
        error.appendTo(element.prev("span"));
        },
        rules: {
            'titel': "required",
        },
        messages: {
            'titel': "Arznei ist eine Pflichtangabe"
        }
    });

});