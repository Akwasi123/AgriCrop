<?php

    require '../dbCredentials.php';

    //The session is started.
    session_start();

    //The database connection is initialized.

    $conn = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($conn));

// This checks if the users clicked on the button before landing here.
    if (isset($_POST['submit'])) {
        $name = trim(filter_input(INPUT_POST, 'name'));
        $animaltype = trim(filter_input(INPUT_POST, 'animaltype'));
        $sex = trim(filter_input(INPUT_POST, 'sex'));
        $breed = trim(filter_input(INPUT_POST, 'breed'));
        $description = trim(filter_input(INPUT_POST, 'description'));
        $tagnumber = trim(filter_input(INPUT_POST, 'tagnumber'));
        $weight = trim(filter_input(INPUT_POST, 'weight'));
        $feedtype = trim(filter_input(INPUT_POST, 'feedtype'));
        $price = trim(filter_input(INPUT_POST, 'price'));


      //The query to insert into the product table in database
        $query = "INSERT INTO livestock (name, animaltype, sex, breed, description, tagnumber, weight, feedtype, price)
        VALUES('$name', '$animaltype', '$sex', '$breed', '$description', '$tagnumber', '$weight', '$feedtype', '$price')";

  	  // The query is executed.
        mysqli_query($conn, $query) or die(mysqli_error($conn));

      //check whether image upload is successful and has been moved to image path
        if ($query) {

            header('location: livestock.php');
        }else{
            $message = "There was an error.";
            echo $message;
        }

    }
?>
