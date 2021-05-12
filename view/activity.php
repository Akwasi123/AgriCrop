<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Activity</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/ushome.css">
    <link rel="stylesheet" href="../css/spec-footer.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

    <!-- end of navigation bar -->

    <!-- page content -->
    <div class="page-content">
        <!-- sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="../assets/img/logo/Logo-black.png" alt="">
                <a href="userhome.php">AgriCrop</a>
            </div>
            <!-- menu items -->

            <a href="task.php" class="menu">
                <img src="../assets/img/icons/icons8-todo-list-100.png" alt="">
                <p>Tasks</p>
            </a>

            <a href="store.php" class="menu">
                <img src="../assets/img/icons/icons8-buy-100.png" alt="">
                <p>Store</p>
            </a>

            <a href="activity.php" class="menu">
                <img src="../assets/img/icons/icons8-increase-profits-100.png" alt="">
                <p>Activity</p>
            </a>

            <a href="livestock.php" class="menu">
                <img src="../assets/img/icons/icons8-cow-breed-100.png" alt="">
                <p>Livestock</p>
            </a>

            <a href="crops.php" class="menu">
                <img src="../assets/img/icons/icons8-corn-100.png" alt="">
                <p>Crops</p>
            </a>
        </div>

        <!-- right content -->
        <div class="right-side">

            <!-- navigation bar -->
            <div class="navbar">
                <!-- navbar content -->
                <div class="container">
                    <!-- navbar brand -->
                    <a href="index.html" class="navbar-brand">
                        <!-- logo -->
                        <img src="../assets/img/logo/Layer 2.svg" alt="" width="50">
                        <!-- company name -->
                        <!-- <p class="brand">AgriCrop</p> -->
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

           
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mt-5 mb-3 clearfix">
                            <h2 class="pull-left">Transaction and Orders</h2>
                            <!-- <a href="addNewTask.html" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Task</a> -->
                        </div>
                        <?php
                        // Include config file
                        require_once "../dbCredentials.php";
                        $database = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE) or die(mysqli_error($database));
                        
                        // Attempt select query execution
                        $sql = "SELECT * FROM task";
                        if($result = mysqli_query($database, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo '<table class="table table-bordered table-striped">';
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Name</th>";
                                            echo "<th>Order ID</th>";
                                            echo "<th>Total</th>";
                                            echo "<th>Status</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['title'] . "</td>";
                                            echo "<td>" . $row['duedate'] . "</td>";
                                            echo "<td>" . $row['status'] . "</td>";
                                            echo "<td>";
                                                echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                                echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                                echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                            }
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
    
                        // Close connection
                        mysqli_close($database);
                        ?>
                    </div>
                </div>        
            </div>
        </div>
        
        <!-- footer -->
        <div class="copyright">
            <img src="../assets/img/icons/Icon awesome-copyright.svg" alt="">
            <p>2021 AgriCrop</p>
        </div>
    </div>

</body>
</html>