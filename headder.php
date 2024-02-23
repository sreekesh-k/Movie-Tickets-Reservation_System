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
    <link rel="stylesheet" href="style/headerrstyle.css">
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
                    <div id="signup-tab-content" class="active" onsubmit="Signin(event)">
                        <form class="signup-form" action="" method="post">
                            <input type="email" class="input" id="user_email" name="email" autocomplete="off" placeholder="Email" required>
                            <input type="text" class="input" id="user_name" name="username" autocomplete="off" placeholder="Username" required>
                            <input type="password" class="input" id="user_pass" name="password" autocomplete="off" placeholder="Password" required>
                            <input type="submit" class="button" value="Sign Up" name="signup">
                            <div id="signupError" style="color: red; display: none;"></div>
                            <div id="signupSuccess" style="color: green; display: none;"></div>
                        </form>
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
                        <a href="index.php" class="logo-name">
                            <button type="button" class="logo-name">
                                <img src="Images/Logos/logo.png">
                            </button>
                        </a>
                    </div>

                </div>
                <div class="center-box">
                    <div class="in-box">
                        <form action="movielist.php" method="get">
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
                                echo "<button class='signin-btn' id ='signinbtn' onclick='toggleLoginBox()'>Sign in</button>";
                            }
                            if (isset($_POST['logout'])) {
                                $_SESSION = array();
                                session_destroy();
                                header("Location: index.php");
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
            $('.signup-form').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'signupvalidation.php',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#signupError').hide();
                            $('#signupSuccess').text('Signup successfull.Now you can login').show();
                            window.location.reload();
                        } else {
                            $('#signupError').text('Username is already registered.').show();
                            $('#signupSuccess').hide();
                            $('.form-wrap').addClass('shake');
                            setTimeout(function() {
                                $('.form-wrap').removeClass('shake');
                            }, 1000); // Adjust the delay as needed
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