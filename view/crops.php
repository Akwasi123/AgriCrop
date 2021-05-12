<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriCrop - Crops</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/ushome.css">
    <link rel="stylesheet" href="../css/addNewTask.css">
    <link rel="stylesheet" href="../css/livestock.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

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

            <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Crop Details</h2>
                        <a href="addNewCrops.html" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Crop</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "../dbCredentials.php";
                    $database = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE) or die(mysqli_error($database));
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM crop";
                    if($result = mysqli_query($database, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Crop</th>";
                                        echo "<th>Plant Spacing</th>";
                                        echo "<th>Plant Date</th>";
                                        echo "<th>Harvest Date</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['plantingspacing'] . "</td>";
                                        echo "<td>" . $row['plantdate'] . "</td>";
                                        echo "<td>" . $row['harvestdate'] . "</td>";
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

            <!-- footer -->
            <div class="copyright">
                <img src="../assets/img/icons/Icon awesome-copyright.svg" alt="">
                <p>2021 AgriCrop</p>
            </div>
    </div>

</body>
</html>