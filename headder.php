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
    <script src="scripts/toggleloginbox.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts/login-signup.js"></script>
    <script src="scripts/login-signupValidation.js"></script>
    <script src="scripts/menu.js"></script>
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

                            echo "<button type='button' class='menu-btn' onclick='toggleSlideMenu()'>
                                <span class='line'></span>
                                <span class='line'></span>
                                <span class='line'></span>
                                </button>";

                            ?>
                        </div>
                    </div>
                </div>
                <div id="slide-menu" class="slide-menu">
                    <button class="close-btn" onclick="toggleSlideMenu()">
                        <span>&times;</span>
                    </button>
                    <!-- Menu items go here -->
                    <ul>
                        <li><a href="#">Menu Item 1</a></li>
                        <li><a href="#">Menu Item 2</a></li>
                        <li><a href="#">Menu Item 3</a></li>
                    </ul>
                </div>

            </nav>

        </div>
        <div class="menubar">
            <div class="menubar-box">
                <nav class="navbar">
                    <div class="left-box">
                        <div class="main1-box">
                            <div class="subbox">
                                <a href="movielist.php?r_date=2019-01-01" class="sub-btn">BookNow</a>
                                <?php
                                if (isset($_SESSION["username"])) {
                                    echo " 
                                    <a href='userspage.php' class='sub-btn'>MyTickets</a>";
                                } else {
                                    echo " <a href='#' class='sub-btn' onclick='toggleLoginBox()'>MyTickets</a>";
                                }
                                ?>

                                <a href="html/news.html" class="sub-btn">News</a>
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
                                <a href="html/notyet.html" class="sub-btn">Offers</a>
                                <a href="html/notYet.html" class="sub-btn">GiftCard</a>
                                <div class="sub-btn"></div>
                            </div>
                        </div>
                    </div>

                </nav>

            </div>
        </div>
    </header>
</body>

</html>