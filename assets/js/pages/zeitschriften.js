$(document).ready(function () {
	$.extend($.validator.messages, {
		    required: '<i class = "icon-exclamation-sign"></i>'
	});
     var validobj = $("#addZeitschriftForm").validate({
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
            'Titel': "required",
            'Jahr': "required",
            'Autor_Herausgeber[]': "required"
        },
        messages: {
            'code': "Kurzel ist eine Pflichtangabe",
            'Titel': "Titel ist eine Pflichtangabe",
            'Jahr': "Jahr ist eine Pflichtangabe",
            'Autor_Herausgeber[]': "Autor/ Herausgeber ist eine Pflichtangabe"
        }
	});

    $(document).on("change", ".select2-hidden-accessible", function () {
        if (!$.isEmptyObject(validobj.submitted)) {
            validobj.form();
        }
    });
     $(document).on("select2-opening", function (arg) {
        var elem = $(arg.target);
        if ($(".select2-selection__rendered").hasClass("error")) {
            //jquery checks if the class exists before adding.
            $(".select2-drop ul").addClass("error");
        } else {
            $(".select2-drop ul").removeClass("error");
        }
    });
});