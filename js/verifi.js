/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function($) {
    "use strict";
// Login Form
//----------------------------------------------
// Validation
$("#login-form").validate({
    rules: {
        lg_username: "required",
        lg_password: "required",
    },
    errorClass: "form-invalid"
});
//register
// Validation
$("#register-form").validate({
    rules: {
        reg_username: "required",
        reg_password: {
            required: true,
            minlength: 5
        },
        reg_password_confirm: {
            required: true,
            minlength: 5,
            equalTo: "#register-form [name=reg_password]"
        },
        reg_email: {
            required: true,
            email: true
        },
        reg_agree: "required",
    },
    errorClass: "form-invalid",
    errorPlacement: function (label, element) {
        if (element.attr("type") === "checkbox" || element.attr("type") === "radio") {
            element.parent().append(label); // this would append the label after all your checkboxes/labels (so the error-label will be the last element in <div class="controls"> )
        } else {
            label.insertAfter(element); // standard behaviour
        }
    }
});

})(jQuery);