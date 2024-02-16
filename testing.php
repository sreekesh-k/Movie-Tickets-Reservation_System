<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>
        Webleb
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            color: #666;
            background: #0f0c29;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #24243e, #302b63, #0f0c29);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            font: 16px/26px "Raleway", sans-serif;
        }

        a {
            color: #666;
            text-decoration: none;
        }

        a:hover {
            color: #313151;
        }

        input {
            font: 16px/26px "Raleway", sans-serif;
        }

        .form-wrap {
            background-color: #fff;
            width: 400px;
            height: 400px;
            margin: 3em auto;
            border-radius: 7px;
        }

        .form-wrap .tabs {
            overflow: hidden;
        }

        .form-wrap .tabs h3 {
            float: left;
            width: 50%;
        }

        .form-wrap .tabs h3 a {
            padding: 0.5em 0;
            text-align: center;
            font-weight: 400;
            background-color: #e6e7e8;
            display: block;
            color: #666;

        }

        .form-wrap .tabs h3 a.active {
            background-color: #fff;
        }

        .form-wrap .tabs-content {
            padding: 1.5em;
        }

        .form-wrap .tabs-content div[id$="tab-content"] {
            display: none;
        }

        .form-wrap .tabs-content .active {
            display: block !important;
        }

        .form-wrap form .input {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            color: inherit;
            font-family: inherit;
            padding: 0.8em 0 10px 0.8em;
            border: 1px solid #cfcfcf;
            outline: 0;
            display: inline-block;
            margin: 0 0 0.8em 0;
            padding-right: 2em;
            width: 100%;
            border-radius: 7px;
        }

        .form-wrap form .button {
            width: 100%;
            padding: 0.8em 0 10px 0.8em;
            background-color: #24243e;
            border: none;
            color: #fff;
            cursor: pointer;
            text-transform: uppercase;
            border-radius: 7px;
        }

        .form-wrap form .button:hover {
            background-color: #313151;
        }

        .form-wrap .help {
            margin-top: 0.6em;
        }

        .form-wrap .help p {
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>

<body style="display: flex; justify-content:center ; align-items: center;height: 100vh;overflow: hidden;">
    <div class="form-wrap">
        <div class="tabs">
            <h3 class="signup-tab"><a class="active" href="#signup-tab-content" style="border-top-left-radius: 7px;">Sign Up</a></h3>
            <h3 class="login-tab"><a href="#login-tab-content" style="border-top-right-radius: 7px;">Login</a></h3>
        </div>
        <div class="tabs-content">
            <div id="signup-tab-content" class="active">
                <form class="signup-form" action="" method="post">
                    <input type="email" class="input" id="user_email" autocomplete="off" placeholder="Email">
                    <input type="text" class="input" id="user_name" autocomplete="off" placeholder="Username">
                    <input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password">
                    <input type="submit" class="button" value="Sign Up">
                </form>
                <div class="help">
                    <p>By signing up, you agree to our</p>
                    <p><a href="https://www.web-leb.com/">Terms of service</a></p>
                </div>
            </div>
            <div id="login-tab-content">
                <form class="login-form" action="" method="post">
                    <input type="text" class="input" id="user_login" autocomplete="off" placeholder="Email or Username">
                    <input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password">
                    <input type="checkbox" class="checkbox" id="remember_me">
                    <label for="remember_me">Remember me</label>
                    <input type="submit" class="button" value="Login">
                </form>
                <div class="help">
                    <p><a href="https://www.web-leb.com/">Forget your password?</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            tab = $('.tabs h3 a');

            tab.on('click', function(event) {
                event.preventDefault();
                tab.removeClass('active');
                $(this).addClass('active');

                tab_content = $(this).attr('href');
                $('div[id$="tab-content"]').removeClass('active');
                $(tab_content).addClass('active');
            });
        });
    </script>
</body>

</html>