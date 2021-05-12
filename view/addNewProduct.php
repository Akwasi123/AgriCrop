<?php

    require '../dbCredentials.php';

    //The session is started.
    session_start();

    //The database connection is initialized.

    $conn = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($conn));

// This checks if the users clicked on the button before landing here.
    if (isset($_POST['submit'])) {
        $prodname = trim(filter_input(INPUT_POST, 'pname'));
        $price = trim(filter_input(INPUT_POST, 'price'));
        $status = trim(filter_input(INPUT_POST, 'status'));
        $description = trim(filter_input(INPUT_POST, 'description'));


      //The query to insert into the product table in database
        $query = "INSERT INTO product (name, price, status, description)
        VALUES('$prodname', '$price', '$status', '$description')";

  	  // The query is executed.
        mysqli_query($conn, $query) or die(mysqli_error($conn));

      //check whether image upload is successful and has been moved to image path
        if ($query) {

            header('location: store.php');
        }else{
            $message = "There was an error.";
            echo $message;
        }

    }
?>
