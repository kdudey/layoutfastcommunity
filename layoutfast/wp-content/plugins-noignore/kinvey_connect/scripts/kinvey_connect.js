// wordpress jquery does not have $ defined as jQuery to avoid conflicts
var $j = jQuery.noConflict();

function kinveyInit() {
    return Kinvey.initialize({
        apiHostname: 'https://se-baas.kinvey.com',
        appKey: 'kid_eVFNDfuo-O',
        appSecret: '1e8eca61bce54964b367a394d44babe8'
    });
}

function onLoadUserNotLoggedIn() {
    kinveyInit().then(function (activeUser) {
        // TODO change this to use the dialog box on the real page...
        if (activeUser === null) {
            displayLoginModal();
        } else {
            WpRedirect(activeUser);
        }
    }, function (error) {
        alert("initialization error");
    });
}

function onLoadUserLoggedIn(kinvey_id) {
    kinveyInit().then(function (activeUser) {
        // TODO change this to use the dialog box on the real page...
        if (activeUser === null) {
            // kinvey user logged out, must logout wp user
            wp_logout_from_js();
        } else {
            if (activeUser._id === kinvey_id) {
                // ok, kinvey user is still logged in
                displayKinveyUserInfo(activeUser);
            } else {
                wp_logout_from_js();
            }
        }
    }, function (error) {
        alert("initialization error");
    });
}

function onLoadAdminUserLoggedIn() {
}

function onLoadBackendLoginFailed()
{
    kinveyInit().then(function (activeUser) {
        // TODO change this to use the dialog box on the real page...
        if (activeUser === null) {
            // no kinvey user, nothing to do
        } else {
            Kinvey.User.logout();
        }
        alert("there was an error with wordpress login");
        displayLoginModal();
    }, function (error) {
        alert("initialization error");
    });
}

function displayKinveyUserInfo(activeUser) {
    var imgloc = $j('user_avatar_top');
    if (!imgloc.length) { return; }
    if (activeUser.data.image !== null && activeUser.data.image !== undefined) {
        var promise = Kinvey.Files.stream(activeUser.data.image)
                .then(function (file) {
                    imgloc.attr('src', file._downloadURL);
                })
                .catch(function (error) {
                    // error getting img?
                });
    } else {
        // no user img?
    }
}

/* -------------------------------------------------------------------------------
Login
----------------------------------------------------------------------------------*/
function loginKinvey() {
    var loginID = $j('#login-email').val();
    var loginPassword = $j('#login-password').val();

    Kinvey.User.login(loginID, loginPassword).then(function(user) {
        var activeKinveyUser = Kinvey.User.getActiveUser();
        WpRedirect(user);
        $j('#modal-login').parent().css('display', 'none');
    })
    .catch(function(error) {
        console.log("Login error: " + error);
    });
}

function WpRedirect(the_user) {
    var form = $j('<form method="post" style="display:none"><input type="text" id="tokenfield" name="kinvey_token" value="" /></form>');
    $j('body').append(form);
    $j("#tokenfield").val(the_user._kmd.authtoken);
    form.submit();
}

//Displays Login Modal, assuming it is php-included on the page
function displayLoginModal(modalName) {
    $j('.modal').css('display', 'none');
    $j('#modal-login').parent().css('display', 'flex');
}

/* -------------------------------------------------------------------------------
Forgot Password
----------------------------------------------------------------------------------*/
function resetKinveyPassword() {
    var username = $j("#forgotpass-email").val();

    var resetKinveyUser = Kinvey.User.resetPassword(username)
    .then(function() {
        $j('#forgotPasswordMsg').html("Look in your Inbox for an email explaining how to reset your password.");
    }).catch(function(error) {
        console.log(error);
    });
}

function displayForgotPasswordModal() {
    $j('.modal').css('display', 'none');
    $j('#modal-forgotpassword').parent().css('display', 'flex');
}

/* -------------------------------------------------------------------------------
Registration 
----------------------------------------------------------------------------------*/
function signupNewUser() {
/*    var signupKinveyUser = Kinvey.User.signup({
        username: $j("#signup-email").val(),
        email: $j("#signup-email").val(),
        password: $j("#signup-password").val(),
        first_name: $j("#signup-fname").val(),
        last_name: $j("#signup-lname").val(),
        company: $j("#signup-company").val(),
        workfield: $j("#signup-workfield").val(),
        position: $j("#signup-position").val(),
        zipcode: $j("#signup-zipcode").val(),
        country: $j("#signup-country").val(),
        language: $j("#signup-language").val()
    })
    .then(function(signupKinveyUser) {
        $j('#signupMsg').html("We sent you an email to confirm your Registration");
        logoutKinvey();
    })
    .catch(function(error) {
        console.log(error);
    });
    */
    alert('signup clicked... not yet implemented');
}

function displaySignupModal() {
    $j('.modal').css('display', 'none');
    $j('#modal-signup').parent().css('display', 'flex');
}

