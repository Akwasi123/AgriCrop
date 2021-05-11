<?php

    require '../dbCredentials.php';

    //The session is started.
    session_start();

    //The database connection is initialized.

    $conn = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($conn));

// This checks if the users clicked on the button before landing here.
    if (isset($_POST['submit'])) {
        $name = trim(filter_input(INPUT_POST, 'name'));
        $plantspacing = trim(filter_input(INPUT_POST, 'plantspacing'));
        $rowspacing = trim(filter_input(INPUT_POST, 'rowspacing'));
        $plantingdepth = trim(filter_input(INPUT_POST, 'plantingdepth'));
        $plantdate = trim(filter_input(INPUT_POST, 'plantdate'));
        $harvestdate = trim(filter_input(INPUT_POST, 'harvestdate'));
        $harvestunit = trim(filter_input(INPUT_POST, 'harvestunit'));
        

      //The query to insert into the product table in database
        $query = "INSERT INTO crop (name, plantingspacing, rowspacing, plantingdepth, plantdate, harvestdate, harvestunit)
        VALUES('$name', '$plantspacing', '$rowspacing', '$plantingdepth', '$plantdate', '$harvestdate', '$harvestunit')";

  	  // The query is executed.
        mysqli_query($conn, $query) or die(mysqli_error($conn));

      //check whether image upload is successful and has been moved to image path
        if ($query) {

            header('location: crops.php');
        }else{
            $message = "There was an error.";
            echo $message;
        }

    }
?>
