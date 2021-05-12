<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Home</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/ushome.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
    
</head>
<body>

    <!-- end of navigation bar -->

    <!-- page content -->
    <div class="page-content">
        <!-- sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="../assets/img/logo/Logo-black.png" alt="">
                <p>AgriCrop</p>
            </div>
            <!-- menu items -->

            <div class="menu">
                <img src="../assets/img/icons/icons8-todo-list-100.png" alt="">
                <p>Tasks</p>
            </div>

            <div class="menu">
                <img src="../assets/img/icons/icons8-buy-100.png" alt="">
                <p>Store</p>
            </div>

            <div class="menu">
                <img src="../assets/img/icons/icons8-increase-profits-100.png" alt="">
                <p>Activity</p>
            </div>

            <div class="menu">
                <img src="../assets/img/icons/icons8-cow-breed-100.png" alt="">
                <p>Livestock</p>
            </div>

            <div class="menu">
                <img src="../assets/img/icons/icons8-corn-100.png" alt="">
                <p>Crops</p>
            </div>
        </div>

        <!-- right content -->
        <div class="right-side">
            <!-- topbar -->
            <div class="topbar">
                <div class="settings">
                    <img src="../assets/img/icons/icons8-settings-100.png" alt="">
                </div>
            </div>

           <!-- tasks pane -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mt-5 mb-3 clearfix">
                            <h2 class="pull-left">Task Details</h2>
                            <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Task</a>
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
                                            echo "<th>Title</th>";
                                            echo "<th>Due Date</th>";
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

            <!-- animals statistics -->
            <div class="container-fluid">
                <div class="row my-3">
                    <div class="col">
                        <h2>Animals Available</h2>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-md-4 py-1">
                        <div class="card">
                            <div class="card-body">
                                <canvas class="chDonut1"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 py-1">
                        <div class="card">
                            <div class="card-body">
                                <canvas class="chDonut2"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 py-1">
                        <div class="card">
                            <div class="card-body">
                                <canvas class="chDonut3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- animals statistics -->
            <div class="container-fluid">
                <div class="row my-3">
                    <div class="col">
                        <h2>Fields Planted</h2>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-md-4 py-1">
                        <div class="card">
                            <div class="card-body">
                                <canvas class="chDonut4"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 py-1">
                        <div class="card">
                            <div class="card-body">
                                <canvas class="chDonut5"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 py-1">
                        <div class="card">
                            <div class="card-body">
                                <canvas class="chDonut6"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
        
    </div>
<script src="../js/charts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>