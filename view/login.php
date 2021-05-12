<?php include ('validation.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>AgriCrop-Login</title>
    <script src="https://use.fontawesome.com/dfe99fdb12.js"></script>
</head>
<body>

    <!-- login form -->
    <div class="login-container">
        <!-- left side -->
        <div class="left">
            <!-- logo -->
            <div class="brand">
                <img src="../assets/img/logo/Layer 2.svg" alt="" width="50">
                <p>AgriCrop</p>
            </div>

            <!-- message -->
            <p class="log-msg">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda aspernatur illo commodi quis nisi vel ad id necessitatibus, quia blanditiis optio nulla vo
            </p>

            <!-- illustration -->
            <div class="ills">
                <img src="../assets/img/illustration/lg-ill.svg" alt="">
            </div>
        </div>

        <!-- right side -->
        <div class="right">

            <!-- navigation bar -->
            <div class="navbar nav-white">
                <!-- navbar content -->
                <div class="container">
                    <!-- navbar brand -->
                    <a href="index.html" class="navbar-brand black">
                        <!-- logo -->
                        <img src="../assets/img/logo/Logo-black.png" alt="" width="50" class="logo">
                        <!-- company name -->
                    </a>
                    <!-- end of navbar brand -->

                    <!-- hamburger menu -->
                    <div class="burger team">
                        <div class="line1"></div>
                        <div class="line2"></div>
                        <div class="line3"></div>
                    </div>

                    <!-- nav links -->
                    <nav>
                        <ul class="navlinks">
                            <li><a href="homepage.php" class="t-link">Home</a></li>
                            <li><a href="contact.php" class=" t-link">Contact Us</a></li>
                            <li><a href="login.php" class=" t-link">Login</a></li>
                            <li id="createacc"><a href="signup.php" class="t-link">Create account</a></li>
                        </ul>
                    </nav>
                    <!-- end of nav links -->
                </div>
                <!-- end of navbar content -->
            </div>
            <!-- end of navigation bar -->
            <!-- heading -->
            <div class="others">
                <p class="heading">
                    Sign in
                </p>
    
                <p class="sub-text"><strong>Login to enjoy the full agricultural experience</strong></p>
    
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat,<br class="break"> corrupti! Modi voluptate </p>
                <form action="" method="post">
                <?php include ('errors.php'); ?>

                    <div class="field">
                        <label for="">Username or email</label><br>
                        <input type="text" name="email" id="email">
                    </div>
    
                    <div class="field">
                        <label for="">Password</label><br>
                        <input type="password" name="Password" id="Password">
                    </div>
    
                    <div class="kp">
                        <input type="checkbox" name="" id="">
                        <p>Keep me logged in</p>
                    </div>
    
                    <!-- button -->
                    <div class="btn">
                        <input type="Submit" name="Login" id="Login" value="Login">
                    </div>
                    <p class="ask">Don't have an account? Create one <a href="signup.php">here</a></p>
                </form>
            </div>
            
        </div>
    </div>
<script src="../js/index.js"></script>
</body>
</html>