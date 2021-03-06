<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <title>Contact Us</title>
</head>
<body>
    <!-- navigation bar -->
    <div class="navbar">
        <!-- navbar content -->
        <div class="container">
            <!-- navbar brand -->
            <a href="index.html" class="navbar-brand">
                <!-- logo -->
                <img src="../assets/img/logo/Layer 2.svg" alt="" width="50">
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
                    <li><a href="homepage.php" class="links">Home</a></li>
                    <li><a href="contact.php" class=" links">Contact Us</a></li>
                    <li><a href="login.php" class=" links">Login</a></li>
                    <li id="createacc"><a href="signup.php" class="links">Create account</a></li>
                </ul>
            </nav>
            <!-- end of nav links -->
        </div>
        <!-- end of navbar content -->
    </div>
    <!-- end of navigation bar -->

    <main>
        <section class="contact">
            <div class="left">
                <p class="get">Get in touch with us.</p>
                <p class="c-greet">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                
                <div class="pnum">
                    <img src="../assets/img/icons/Icon feather-phone.svg" alt="">
                    <p>+233 203398768</p>
                </div>

                <div class="mail">
                    <img src="../assets/img/icons/Icon ionic-md-mail-green.svg" alt="">
                    <p>agcrop@gmail.com</p>
                </div>

                <div class="socials">
                    <img src="../assets/img/icons/Icon awesome-facebook-white.svg" alt="" width="20">
                    <img src="../assets/img/icons/Icon awesome-twitter-white.svg" alt="">
                    <img src="../assets/img/icons/Icon awesome-instagram-white.svg" alt="">
                </div>
            </div>

            <!-- contact form -->
            <div class="right">
                <form action="">
                    <div class="field">
                        <label for="">Your name</label>
                        <i></i>
                        <input type="text" name="" id="" placeholder="Name">
                    </div>
                    
                    <div class="field">
                        <label for="">Mail</label>
                        <i></i>
                        <input type="text" name="" id="" placeholder="Email address">
                    </div>

                    <div class="field">
                        <label for="">Message</label>
                        <textarea name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
                    </div>
                    
                    <!-- button -->
                    <input type="button" value="Send message">

                </form>
            </div>
        </section>
    </main>
<script src="../js/index.js"></script>
</body>
</html>