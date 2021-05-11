<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriCrop - User</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/ushome.css">
    <link rel="stylesheet" href="../css/addNewTask.css">
    <link rel="stylesheet" href="../css/livestock.css">
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

            <div class="greeting">
                <p><a href="">Add new Crops</a></p>
            </div>

            <!-- tasks pane -->
            <div class="main-task">
            <div class="tasks-one">
                <div>Crop</div>
                <div>Plant Spacing</div>
                <div>Plant Date</div>
                <div>Harvest Date</div>
            </div>

 <?php
require '../dbCredentials.php';

//The database connection is created.

$database = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE) or die(mysqli_error($database));

//The query is being initiated.
$query = mysqli_query($database, "SELECT * FROM crop");

//This fetches all rows which match the query.
while ($row = mysqli_fetch_array($query)){
        echo '<div class="main-content-livestock">';
        echo '<div>';
        echo $row['name'].'</div>';

        echo '<div>';
        echo $row['plantingspacing'].'</div>';

        echo '<div>';
        echo $row['plantdate'].'</div>';

        echo '<div>';
        echo $row['harvestdate'].'</div>';
        echo '</div>';

}
?>

        </div>

            <!-- footer -->
            <div class="copyright">
                <img src="../assets/img/icons/Icon awesome-copyright.svg" alt="">
                <p>2021 AgriCrop</p>
            </div>
    </div>

</body>
</html>