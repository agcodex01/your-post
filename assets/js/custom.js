/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";
$(document).ready(function() {

    function checkPasswordMatch() {
        var password = $("#password");
        var confirmPassword = $("#password2");

        if (password.val() != confirmPassword.val()) {
            confirmPassword.closest('.form-control').removeClass('is-valid').addClass('is-invalid')
            confirmPassword.closest('form').removeClass('was-validated')
            confirmPassword.setCustomValidity("Invalid field.")
        } else {
            confirmPassword.closest('.form-control').removeClass('is-invalid').addClass('is-valid')
            confirmPassword.closest('form').addClass('was-validated')

        }
    }
    $("#password, #password2").keyup(checkPasswordMatch);


});