$(document).ready(function () {
    // login form validation

    $("#loginForm").validate({
        errorPlacement: function(error, element) {
            error.appendTo(element.prev("span"));
        },
        rules: {
            username: {
                required: true
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            username: {
                required: "Nutzername ist eine Pflichtangabe"
            },
            password: {
                required: "Passwort ist eine Pflichtangabe",
                minlength: "Das Passwort muss aus 6 Zeichen bestehen" 
            }
        }
    });
    $("#forgetPasswordForm").validate({
        errorPlacement: function(error, element) {
            error.appendTo(element.prev("span"));
        },
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            email: {
                required: "Nutzername ist eine Pflichtangabe",
                email: "Bitte geben Sie eine gültige Email-Adresse ein"
            }
        }
    });

     // remember me
    $('#rememberMe').click(function(){
        if ($(this).prop('checked')) {
            var username = $('#username').val();
            var password = $('#password').val();
            
            if(username.length != 0 && password.length != 0) {
                $.cookie('username', username);
                $.cookie('password', password);
                $('#rememberMe').attr('checked');
            } else {
                swal({
                    type: 'warning',
                    title: 'Warnung',
                    text: 'Bitte geben Sie zuerst Ihren Benutzernamen und Ihr Passwort ein'
                });
                $(this).prop("checked", false);
            }
        } else {
            $.cookie('username', '');
            $.cookie('password', '');
        }  
    });
});