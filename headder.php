<?php
session_start();
include("db_connection.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <style>
        /* Hide scrollbar for Chrome, Safari, and Opera */
        ::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge, and Firefox */
        * {
            scrollbar-width: none;
        }

        body {
            font-family: Roboto, sans-serif;
            overflow-x: hidden;
            /* background-color: black; */
        }

        header {
            margin-top: 0px;
            background-color: rgb(255, 255, 255);
            height: 80px;
            width: 100vw;
            padding: 0px;
            align-items: center;
            position: relative;
            box-sizing: border-box;
            z-index: 100;

        }

        .navbar-box button:hover {
            background-color: rgba(56, 233, 68, 0.238);
            border-radius: 25px;
        }

        .navbar-box {
            height: 100%;
            width: 100vw;
            background-color: rgba(255, 255, 255, 0);
            display: flex;
            align-items: center;
            padding: 0 10px;
            box-sizing: border-box;
            z-index: 1;
            overflow: hidden;
        }

        .navbar {
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
        }

        .left-box,
        .center-box,
        .right-box {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0);
            box-sizing: border-box;
            margin: 0 5px;
        }

        .in-box {
            width: 98%;
            height: 50px;
            display: flex;
            background-color: rgba(255, 255, 255, 0);
            margin: 0 5px;
            box-sizing: border-box;
            text-align: center;
            align-items: center;
            justify-content: flex-start;
            padding: 0px 1px;
        }

        .in-box form {
            width: 100%;
            height: 100%;
            display: flex;
            box-sizing: border-box;
            text-align: center;
            align-items: center;
        }

        .logo-name {
            height: 100%;
            width: 100%;
            border: none;
            flex: 1;
            cursor: pointer;
            background-color: rgba(255, 255, 255, 0);
        }

        .logo-name img {
            height: 100%;
        }

        .searchbox {
            display: flex;
            width: 80%;
            height: 80%;
            background-color: rgba(255, 255, 255, 0);
            justify-content: flex-start;
            align-items: center;

        }

        .searchbox input {
            width: 100%;
            outline: none;
            height: 90%;
            border: solid 1px rgba(0, 0, 0, 0.167);
            box-sizing: border-box;
            border-radius: 5px;
        }

        .searchbutton {
            display: flex;
            margin-left: 1px;
            width: 19%;
            height: 80%;
            background-color: rgba(255, 255, 255, 0);
            justify-content: flex-start;
            align-items: center;
        }

        .searchbutton button {
            width: 70%;
            height: 90%;
            outline: none;
            border: solid 1px rgba(0, 0, 0, 0.167);
            box-sizing: border-box;
            border-radius: 5px;
            cursor: pointer;
            background-color: rgba(255, 255, 255, 0);
        }

        .searchbutton button img {
            height: 50%;
        }

        .lastbox {
            height: 100%;
            width: 100%;
            display: flex;
            text-align: center;
            justify-content: center;
            align-items: center;

        }

        .signin-btn {
            color: white;
            background-color: rgb(68, 248, 134);
            width: 15%;
            height: 59%;
            display: flex;
            border: solid 1px rgb(68, 248, 134);
            justify-content: center;
            align-items: center;
            border-radius: 6px;
            cursor: pointer;
        }

        .signin-btn a {
            text-decoration: none;
            color: white;
        }

        .login-box-container {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(35, 36, 35, 0.679);
            z-index: 1;
            align-items: center;
            justify-content: center;
            display: flex;
            overflow: hidden;
            transition: opacity 0.5s, visibility 0.5s;
            /* Transition for fading in and out */
            opacity: 0;
            /* Initially invisible */
            visibility: hidden;
            /* Initially hidden */
        }

        .login-box-container.show {
            opacity: 1;
            visibility: visible;
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
            box-shadow: 0px 5px 70px black;
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
            background-color: rgb(51, 199, 105);
            border: none;
            color: #fff;
            cursor: pointer;
            text-transform: uppercase;
            border-radius: 7px;
        }

        .form-wrap form .button:hover {
            background-color: rgb(47, 172, 93);
        }

        .menu-btn {
            margin-left: 15px;
            width: 10%;
            height: 59%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            cursor: pointer;
            border: solid 1px rgba(0, 0, 0, 0);
            border-radius: 5px;
            background-color: rgba(122, 122, 122, 0);
            align-items: center;
        }

        .line {
            margin: 3px 0px;
            width: 30%;
            height: 4px;
            background-color: #1f1e1ed6;
        }

        .menubar {
            background-color: rgb(255, 255, 255);
            height: 50px;
            width: 100vw;
            padding: 0px;
            align-items: center;
            position: relative;
        }

        .menubar-box {
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            padding: 0 10px;
            box-sizing: border-box;
            z-index: 1;
            overflow: hidden;
            background-color: rgba(69, 66, 66, 0.058);
        }

        .menubar-box button:hover {
            border-bottom: solid 3px rgba(56, 233, 68, 0.238);
            font-size: 1em;
        }

        .main1-box {
            width: 98%;
            height: 50px;
            display: flex;
            background-color: rgba(255, 255, 255, 0);
            margin: 0 5px;
            box-sizing: border-box;
            text-align: center;
            align-items: center;
            justify-content: flex-end;
            padding: 0px 1px;
        }

        .main2-box {
            width: 98%;
            height: 50px;
            display: flex;
            background-color: rgba(255, 255, 255, 0);
            margin: 0 5px;
            box-sizing: border-box;
            text-align: center;
            align-items: center;
            justify-content: flex-start;
            padding: 0px 1px;
        }

        .subbox {
            height: 100%;
            background-color: rgba(255, 255, 255, 0);
            width: 80%;
            display: flex;
            box-sizing: border-box;
            text-align: center;
            align-items: center;
        }

        .sub-btn {
            flex: 1;
            font-size: small;
            cursor: pointer;
            background-color: rgba(250, 235, 215, 0);
            border: none;
        }

        @keyframes shake {
            0% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-10px);
            }

            50% {
                transform: translateX(10px);
            }

            75% {
                transform: translateX(-5px);
            }

            100% {
                transform: translateX(0);
            }
        }

        .shake {
            animation: shake 0.5s ease;
        }

        .main {
            margin: 80px 170px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>

    <header>
        <div class="login-box-container" id="loginBoxContainer">
            <div class="form-wrap">
                <div class="close-btn" style="display:flex; align-items:flex-end;justify-content:flex-end;">
                    <button onclick="toggleLoginBox()" style="background-color:rgb(51, 199, 105); height:auto;width:50px;border:none;color:white;">X</button>
                </div>
                <div class="tabs">
                    <h3 class="signup-tab"><a class="active" href="#signup-tab-content" style="border-top-left-radius: 7px;">Sign Up</a></h3>
                    <h3 class="login-tab"><a href="#login-tab-content" style="border-top-right-radius: 7px;">Login</a></h3>
                </div>
                <div class="tabs-content">
                    <div id="signup-tab-content" class="active">
                        <form class="signup-form" action="" method="post">
                            <input type="email" class="input" id="user_email" name="email" autocomplete="off" placeholder="Email" required>
                            <input type="text" class="input" id="user_name" name="username" autocomplete="off" placeholder="Username" required>
                            <input type="password" class="input" id="user_pass" name="password" autocomplete="off" placeholder="Password" required>
                            <input type="submit" class="button" value="Sign Up" name="signup">
                        </form>
                        <?php
                        if (isset($_POST["signup"])) {
                            $username = $_POST["username"];
                            $email = $_POST["email"];
                            $password = $_POST["password"];
                            $query = "INSERT INTO users(username,password,emailid) VALUES ('{$username}','{$password}','{$email}')";
                            mysqli_query($conn, $query);
                        }
                        ?>
                    </div>
                    <div id="login-tab-content">
                        <form class="login-form" action="" method="post" onsubmit="login(event)">
                            <input type="text" class="input" id="user_login" name="username" autocomplete="off" placeholder="Email or Username" required>
                            <input type="password" class="input" id="user_pass" name="password" autocomplete="off" placeholder="Password" required>
                            <input type="submit" class="button" value="Login" name="login">
                            <div id="loginError" style="color: red; display: none;"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-box">
            <nav class="navbar">
                <div class="left-box">
                    <div class="in-box">
                        <button type="submit" class="logo-name">
                            <img src="Images/Logos/logo.png">
                        </button>
                    </div>

                </div>
                <div class="center-box">
                    <div class="in-box">
                        <form action="">
                            <div class="searchbox">
                                <input type="text" name="searcbox" placeholder="search movies">
                            </div>
                            <div class="searchbutton">
                                <button type="submit"> <img src="Images/search-icon.png" alt="Search"></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="right-box">
                    <div class="in-box">
                        <div class="lastbox">
                            <div></div>
                            <?php
                            if (isset($_SESSION["username"])) {
                                echo "<button class='signin-btn' ><a href='logout.php'>Sign Out</a></button>";
                            } else {
                                echo "<button class='signin-btn' onclick='toggleLoginBox()'>Sign in</button>";
                            }
                            if (isset($_POST['logout'])) {
                                $_SESSION = array();
                                session_destroy();
                                header("Location: {$_SERVER['PHP_SELF']}");
                                exit();
                            }
                            ?>
                            <button type="button" class="menu-btn">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </button>
                        </div>
                    </div>
                </div>

            </nav>

        </div>
        <div class="menubar">
            <div class="menubar-box">
                <nav class="navbar">
                    <div class="left-box">
                        <div class="main1-box">
                            <div class="subbox">
                                <button type="button" class="sub-btn">Offers</button>
                                <button type="button" class="sub-btn">GiftCard</button>
                                <button type="button" class="sub-btn">News</button>
                            </div>
                        </div>

                    </div>
                    <div class="center-box">
                        <div class="main-box">

                        </div>
                    </div>
                    <div class="right-box">
                        <div class="main2-box">
                            <div class="subbox">
                                <div class="sub-btn"></div>
                                <div class="sub-btn"></div>
                                <button type="button" class="sub-btn">Offers</button>
                                <button type="button" class="sub-btn">GiftCard</button>
                                <div class="sub-btn"></div>
                            </div>
                        </div>
                    </div>

                </nav>

            </div>
        </div>
    </header>
    <script>
        function toggleLoginBox() {
            const loginBoxContainer = document.getElementById('loginBoxContainer');
            loginBoxContainer.classList.toggle('show');
            // Toggle the overflow property of the body
            document.body.style.overflow = loginBoxContainer.classList.contains('show') ? 'hidden' : 'auto';
        }
    </script>
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
    <script>
        $(document).ready(function() {
            $('.login-form').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'validateuser.php',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            // Login successful, reload the page
                            window.location.reload();
                        } else {
                            // Login failed, display error message and add shake animation to login box
                            $('#loginError').text('Username or password is invalid.').show();
                            $('.form-wrap').addClass('shake');
                            setTimeout(function() {
                                $('.form-wrap').removeClass('shake');
                            }, 1000); // Adjust the delay as needed
                            setTimeout(function() {
                                $('#loginError').hide();
                            }, 3000); // Hide error message after 3 seconds
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX errors
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>


</body>

</html>