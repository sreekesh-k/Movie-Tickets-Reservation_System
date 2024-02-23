$(document).ready(function () {
    $('.login-form').submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'validateuser.php',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Login successful, reload the page
                    window.location.reload();
                } else {
                    // Login failed, display error message and add shake animation to login box
                    $('#loginError').text('Username or password is invalid.').show();
                    $('.form-wrap').addClass('shake');
                    setTimeout(function () {
                        $('.form-wrap').removeClass('shake');
                    }, 1000); // Adjust the delay as needed
                    setTimeout(function () {
                        $('#loginError').hide();
                    }, 3000); // Hide error message after 3 seconds
                }
            },
            error: function (xhr, status, error) {
                // Handle AJAX errors
                console.error(xhr.responseText);
            }
        });
    });
    $('.signup-form').submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'signupvalidation.php',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('#signupError').hide();
                    $('#signupSuccess').text('Signup successfull.Now you can login').show();
                    window.location.reload();
                } else {
                    $('#signupError').text('Username is already registered.').show();
                    $('#signupSuccess').hide();
                    $('.form-wrap').addClass('shake');
                    setTimeout(function () {
                        $('.form-wrap').removeClass('shake');
                    }, 1000); // Adjust the delay as needed
                }
            },
            error: function (xhr, status, error) {
                // Handle AJAX errors
                console.error(xhr.responseText);
            }
        });
    });
});