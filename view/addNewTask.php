<?php

    require '../dbCredentials.php';

    //The session is started.
    session_start();

    //The database connection is initialized.

    $conn = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($conn));

// This checks if the users clicked on the button before landing here.
    if (isset($_POST['submit'])) {
        $title = trim(filter_input(INPUT_POST, 'title'));
        $duedate = trim(filter_input(INPUT_POST, 'date'));
        $assignee = trim(filter_input(INPUT_POST, 'assignee'));
        $description = trim(filter_input(INPUT_POST, 'description'));


      //The query to insert into the product table in database
        $query = "INSERT INTO task (title, duedate, description, status, assignee)
        VALUES('$title', '$duedate', '$description', 'Not completed', '$assignee')";

  	  // The query is executed.
        mysqli_query($conn, $query) or die(mysqli_error($conn));

      //check whether image upload is successful and has been moved to image path
        if ($query) {

            header('location: task.php');
        }else{
            $message = "There was an error.";
            echo $message;
        }

    }
?>
