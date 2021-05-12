<?php include ('validation.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>AgriCrop-Sign Up</title>
    <script src="https://use.fontawesome.com/dfe99fdb12.js"></script>

    <script type="text/javascript">
        function valid(){
            var email=document.getElementById("email");
            var password_1=document.getElementById("password_1");
            var password_2=document.getElementById("password_2");

            if (email.value.trim()==("")){
            alert("Fill Email");
            return false;
            }
            else if (! email.value.match(/^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)$/)) {
            alert("gmail only");
            return false;
            }

            else if (password_1.value.trim()==("")){
            alert("Fill Password");
            return false;
            }
            else if (! password_1.value.match(/^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{6,}$/)){
            alert("Password must contain at least one letter, at least one number, and be longer than six charaters");
            return false;
            }
            else if (password_2.value.trim()==("")){
            alert("Repeat Password");
            return false;
            }
            
            else{  
                return true;
            }
        }
        
    
        </script>
    
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
                            <li><a href="homepage.html" class="t-link">Home</a></li>
                            <li><a href="about.html" class="t-link">About Us</a></li>
                            <li><a href="services.html" class=" t-link">Services</a></li>
                            <li><a href="team.html" class=" t-link">Team</a></li>
                            <li><a href="contact.html" class=" t-link">Contact Us</a></li>
                            <li><a href="login.html" class=" t-link">Login</a></li>
                            <li id="createacc"><a href="signup.html" class="t-link">Create account</a></li>
                        </ul>
                    </nav>
                    <!-- end of nav links -->
                </div>
                <!-- end of navbar content -->
            </div>
            <!-- end of navigation bar -->
            <!-- heading -->
            <div class="others su">
                <p class="heading">
                    Sign Up
                </p>
    
                <p class="sub-text"><strong>Login to enjoy the full agricultural experience</strong></p>
    
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat,<br class="break"> corrupti! Modi voluptate </p>
                <form onsubmit="return valid()"  action="" method="post">  
                <?php include ('errors.php'); ?>
                 <div class="field">
                        <label for="">Email</label><br>
                        <input type="text" name="email" id="email">
                    </div>
    
                    <div class="field">
                        <label for="">Password</label><br>
                        <input type="password" name="password_1" id="password_1">
                    </div>

                    <div class="field">
                        <label for="">Confirm Password</label><br>
                        <input type="password" name="password_2" id="password_2">
                    </div>
    
                    <div class="kp">
                        <input type="checkbox" name="" id="">
                        <p>Keep me logged in</p>
                    </div>
    
                    <!-- button -->
                    <div class="btn">
                        <input type="Submit" name="Submit" id="Submit" value="Sign Up">
                    </div>
                    <p class="ask">Don't have an account? Create one <a href="">here</a></p>
                </form>
            </div>
            
        </div>
    </div>
<script src="../js/index.js"></script>
</body>
</html>