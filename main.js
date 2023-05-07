function User_register() {
    jQuery('.field_error').html('');
    var Firstname = jQuery("#Firstname").val();
    var Lastname = jQuery("#Lastname").val();
    var Email = jQuery("#Email").val();
    var Password = jQuery("#Password").val();
    var Number = jQuery("#Number").val();
    var Package = jQuery("#Package").val();
    var Security_deposit = jQuery("#Security_deposit").val();
    var is_error = '';

    if (Firstname == "") {
        jQuery('#Firstname_error').html('Please enter Firstname');
        is_error = 'yes';
    }
    if (Lastname == "") {
        jQuery('#Lastname_error').html('Please enter Lastname');
        is_error = 'yes';
    }
    if (Email == "") {
        jQuery('#Email_error').html('Please enter Email Id');
        is_error = 'yes';
    }
    if (Password == "") {
        jQuery('#Password_error').html('Please enter Password');
        is_error = 'yes';
    }
    if (Number == "") {
        jQuery('#Number_error').html('Please enter Contact Number');
        is_error = 'yes';
    }
    if (Package == "") {
        jQuery('#Package_error').html('Please enter Package Details');
        is_error = 'yes';
    } else
    if (Package !== "999" && Package !== "1999" && Package !== "2999") {
        jQuery('#Package_error').html('We do not have such a package!');
        is_error = 'yes';
    } else
    if (Security_deposit == "") {
        jQuery('#Security_deposit_error').html('Please enter Security Deposit Details');
        is_error = 'yes';
    } else
    if (Security_deposit != Package) {
        jQuery('#Security_deposit_error').html('Please enter security deposit respective to your package!');
        is_error = 'yes';
    }
    if (is_error == '') {
        jQuery.ajax({
            type: "post",
            url: "register_submit.php",
            data: "Firstname=" + Firstname + "&Lastname=" + Lastname + "&Email=" + Email + "&Password=" + Password + "&Number=" + Number + "&Package=" + Package + "&Security_deposit=" + Security_deposit,
            success: function(result) {
                if (result == 'Email Id already exists!!') {
                    jQuery('#Email_error').html('Email Id already present!');
                }
                if (result == 'Insert') {
                    window.location.href = 'payment.php';

                }
            }
        });

    }

}


function user_login() {
    jQuery('.field_error').html('');
    var login_Email = jQuery("#login_Email").val();
    var login_Password = jQuery("#login_Password").val();
    var is_error = '';

    if (login_Email == "") {
        jQuery('#login_Email_error').html('Please enter Email Id');
        is_error = 'yes';
    }
    if (login_Password == "") {
        jQuery('#login_Password_error').html('Please enter Password');
        is_error = 'yes';
    }
    if (is_error == '') {
        jQuery.ajax({
            type: "post",
            url: "login_submit.php",
            data: "Email=" + login_Email + "&Password=" + login_Password,
            success: function(result) {
                if (result == 'wrong') {
                    jQuery('.login_msg p').html('Please enter valid log in detaiils.');
                }
                if (result == 'valid') {
                    window.history.go(-1);
                }
            }
        });

    }

}

function user_checkout_login() {
    jQuery('.field_error').html('');
    var login_Email = jQuery("#login_Email").val();
    var login_Password = jQuery("#login_Password").val();
    var is_error = '';

    if (login_Email == "") {
        jQuery('#login_Email_error').html('Please enter Email Id');
        is_error = 'yes';
    }
    if (login_Password == "") {
        jQuery('#login_Password_error').html('Please enter Password');
        is_error = 'yes';
    }
    if (is_error == '') {
        jQuery.ajax({
            type: "post",
            url: "login_submit.php",
            data: "Email=" + login_Email + "&Password=" + login_Password,
            success: function(result) {
                if (result == 'wrong') {
                    jQuery('.login_msg p').html('Please enter valid log in detaiils.');
                }
                if (result == 'valid') {
                    window.location.href = window.location.href;
                }
            }
        });

    }

}

function admin_login() {
    jQuery('.field_error').html('');
    var login_Email = jQuery("#login_Email").val();
    var login_Password = jQuery("#login_Password").val();
    var is_error = '';

    if (login_Email == "") {
        jQuery('#login_Email_error').html('Please enter Email Id');
        is_error = 'yes';
    }
    if (login_Password == "") {
        jQuery('#login_Password_error').html('Please enter Password');
        is_error = 'yes';
    }
    if (is_error == '') {
        jQuery.ajax({
            type: "post",
            url: "login_admin_submit.php",
            data: "Email=" + login_Email + "&Password=" + login_Password,
            success: function(result) {
                if (result == 'wrong') {
                    jQuery('.login_msg p').html('Please enter valid log in detaiils.');
                }
                if (result == 'valid') {
                    window.location.href = 'book_request.php';
                }
            }
        });

    }

}

function managecart(Book_id, type) {
    var qty = jQuery("#qty").val();
    jQuery.ajax({
        type: "post",
        url: "managecart.php",
        data: "Book_id" + Book_id + '&qty=' + qty + 'type=' + type,
        success: function(result) {
            jQuery('#cart').html(result);
        }
    });


}

function Admin_register() {
    jQuery('.field_error').html('');
    var Name = jQuery("#Name").val();
    var Email = jQuery("#Email").val();
    var Password = jQuery("#Password").val();
    var is_error = '';

    if (Name == "") {
        jQuery('#name_error').html('Please enter name');
        is_error = 'yes';
    }
    if (Email == "") {
        jQuery('#Email_error').html('Please enter Email Id');
        is_error = 'yes';
    }
    if (Password == "") {
        jQuery('#Password_error').html('Please enter Password');
        is_error = 'yes';
    }
    if (is_error == '') {
        jQuery.ajax({
            type: "post",
            url: "admin_register.php",
            data: "Name=" + Name + "&Email=" + Email + "&Password=" + Password,
            success: function(result) {
                if (result == 'Email Id already exists!!') {
                    jQuery('#Email_error').html('Email Id already present!');
                }
                if (result == 'Insert') {

                    alert("Registration is succesful. Please log in now.");
                    window.location.href = window.location.href;
                }
            }
        });

    }

}