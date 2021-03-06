<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/navbar.css">
    <title>AgriCrop</title>
</head>
<body>
    <!-- navigation bar -->
    <div class="navbar">
        <!-- navbar content -->
        <div class="container">
            <!-- navbar brand -->
            <a href="index.html" class="navbar-brand">
                <!-- logo -->
                <img src="/assets/img/logo/Layer 2.svg" alt="" width="50">
                <!-- company name -->
                <p class="brand">AgriCrop</p>
            </a>
            <!-- end of navbar brand -->

            <!-- hamburger menu -->
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>

            <!-- nav links -->
            <nav>
                <ul class="navlinks">
                    <li><a href="view/homepage.php" class="links">Home</a></li>
                    <li><a href="view/about.php" class="links">About Us</a></li>
                    <li><a href="view/services.php" class="links">Services</a></li>
                    <li><a href="view/team.php" class="links">Team</a></li>
                    <li><a href="view/contact.php" class="links">Contact Us</a></li>
                    <li><a href="view/login.php" class="links">Login</a></li>
                    <li id="createacc"><a href="view/signup.php" class="links">Create account</a></li>
                </ul>
            </nav>
            <!-- end of nav links -->
        </div>
        <!-- end of navbar content -->
    </div>
    <!-- end of navigation bar -->

    <!-- main content -->
    <main>
        <section class="presentation">
            <!-- intro text -->
            <div class="intro-header">
                <p class="large">A Way of Revolutionizing Agriculture</p>
            </div>

            <!-- illustration -->
            <div class="illustration">
                <img src="/assets/img/illustration/Layer 2.svg" alt="" width="620">
            </div>

            <!-- closing text -->
            <div class="c-text">
                <p class="medium medium-left">Enabling stakeholders across the agriculture value chain to connect and gain a competitive advantage using disruptive technologies.</p>
                <input type="button" value="Learn more" onclick="document.location.href='view/homepage.php'">
            </div>
        </section>
    </main>

<script src="/js/index.js"></script>
</body>
</html>