<?php
require_once "../dbCredentials.php";
$database = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($database));

// Define variables and initialize with empty values
$title = $duedate = $description = $status = $assignee = "";
$title_err = $duedate_err = $description_err = $status_err = $assignee_err = "";

// Processing form data when form is submitted

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    $input_title = trim($_POST["title"]);
    $input_duedate = trim($_POST["duedate"]);
    $input_description = trim($_POST["description"]);
    $input_status = trim($_POST["status"]);
    $input_assignee = trim($_POST["assignee"]);
    
    
    $title = $input_title;
    $duedate = $input_duedate;
    $description = $input_description;
    $status = $input_status;
    $assignee = $input_assignee;
    
    
    // Prepare an update statement
    $sql = "UPDATE task SET title=?, duedate=?, description=?, status=?, assignee=? WHERE id=?";
        
    if($stmt = mysqli_prepare($database, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssssi", $param_title, $param_duedate, $param_description, $param_status, $param_assignee, $param_id);
        
        // Set parameters
        $param_title = $title;
        $param_duedate = $duedate;
        $param_status = $status;
        $param_description = $description;
        $param_assignee = $assignee;
        $param_id = $id;
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records updated successfully. Redirect to landing page
            header("location: task.php");
            exit();
        } else{
            echo "Something went wrong. Please try again later.";
        }
    }
        
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($database);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM task WHERE id = ?";
        if ($stmt = mysqli_prepare($database, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $title = $row["title"];
                    $duedate = $row["duedate"];
                    $description = $row["description"];
                    $status = $row["status"];
                    $assignee = $row["assignee"];
                    
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($database);
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Update Record</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            .wrapper {
                width: 500px;
                margin: 0 auto;
            }
        </style>
    </head>

    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h2>Update Task</h2>
                        </div>
                        <p>Please edit the input values and submit to update the record.</p>
                        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
        
                            <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
                                <span class="help-block"><?php echo $title_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($duedate_err)) ? 'has-error' : ''; ?>">
                                <label>Due Date</label>
                                <input type="date" name="duedate" class="form-control" value="<?php echo $duedate; ?>">
                                <span class="help-block"><?php echo $duedate_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" value="<?php echo $description; ?>">
                                <span class="help-block"><?php echo $description_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($status_err)) ? 'has-error' : ''; ?>">
                                <label>Status</label>
                                <input type="text" name="status" class="form-control" value="<?php echo $status; ?>">
                                <span class="help-block"><?php echo $status_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($assignee_err)) ? 'has-error' : ''; ?>">
                                <label>Assigned To</label>
                                <input type="text" name="assignee" class="form-control" value="<?php echo $assignee; ?>">
                                <span class="help-block"><?php echo $assignee_err; ?></span>
                            </div>
                            
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="task.php" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php

