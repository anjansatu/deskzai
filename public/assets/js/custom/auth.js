(function ($) {
    "use strict";

    $("#showPassword").on('click', function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var type = $(this).hasClass("fa-eye-slash") ? "text" : 'password';
        $("#password").attr("type", type);
    });
    $("#showPassword2").on('click', function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
        $("#password").attr("type", type);
    });

    $(document).ready(function () {
        $('.alert-danger').fadeIn().delay(3000).fadeOut();
    });

    $('#adminCredentialShow').on('click', function () {
        $('#inputEmail').val('sadmin@gmail.com');
        $('#inputPassword').val('123456');
    });
    $('#userCredentialShow').on('click', function () {
        $('#inputEmail').val('admin@gmail.com');
        $('#inputPassword').val('123456');
    });
    $('#agentCredentialShow').on('click', function () {
        $('#inputEmail').val('agent@gmail.com');
        $('#inputPassword').val('123456');
    });
    $('#customerCredentialShow').on('click', function () {
        $('#inputEmail').val('customer@gmail.com');
        $('#inputPassword').val('123456');
    });
})(jQuery);
