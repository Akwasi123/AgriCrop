<?php
require_once "../dbCredentials.php";
$database = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($database));

// Define variables and initialize with empty values
$name = $plantspacing = $rowspacing = $plantingdepth = $plantdate = $harvestdate = $harvestunit = "";
$name_err = $plantspacing_err = $rowspacing_err = $plantingdepth_err = $plantdate_err = $harvestdate_err = $harvestunit_err = "";

// Processing form data when form is submitted

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    $input_name = trim($_POST["name"]);
    $input_plantspacing = trim($_POST["plantingspacing"]);
    $input_rowspacing = trim($_POST["rowspacing"]);
    $input_plantingdepth = trim($_POST["plantingdepth"]);
    $input_plantdate = trim($_POST["plantdate"]);
    $input_harvestdate = trim($_POST["harvestdate"]);
    $input_harvestunit = trim($_POST["harvestunit"]);
    
    
    $name = $input_name;
    $plantspacing = $input_plantspacing;
    $rowspacing = $input_rowspacing;
    $plantingdepth = $input_plantingdepth;
    $plantdate = $input_plantdate;
    $harvestdate = $input_harvestdate;
    $harvestunit = $input_harvestunit;
    
    
    // Prepare an update statement
    $sql = "UPDATE crop SET name=?, plantingspacing=?, rowspacing=?, plantingdepth=?, plantdate=?, harvestdate=?, harvestunit=? WHERE id=?";
        
    if($stmt = mysqli_prepare($database, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssssssi", $param_name, $param_plantspacing, $param_rowspacing, $param_plantingdepth, $param_plantdate, $param_harvestdate, $param_harvestunit, $param_id);
        
        // Set parameters
        $param_name = $name;
        $param_plantspacing = $plantspacing;
        $param_plantingdepth = $plantingdepth;
        $param_rowspacing = $rowspacing;
        $param_plantdate = $plantdate;
        $param_harvestdate = $harvestdate;
        $param_harvestunit = $harvestunit;
        $param_id = $id;
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records updated successfully. Redirect to landing page
            header("location: crops.php");
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
        $sql = "SELECT * FROM crop WHERE id = ?";
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
                    $name = $row["name"];
                    $plantspacing = $row["plantingspacing"];
                    $rowspacing = $row["rowspacing"];
                    $plantingdepth = $row["plantingdepth"];
                    $plantdate = $row["plantdate"];
                    $harvestdate = $row["harvestdate"];
                    $harvestunit = $row["harvestunit"];
                    
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
                            <h2>Update Crops</h2>
                        </div>
                        <p>Please edit the input values and submit to update the record.</p>
                        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
        
                            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                                <span class="help-block"><?php echo $name_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($plantspacing_err)) ? 'has-error' : ''; ?>">
                                <label>Plant Spacing</label>
                                <input type="text" name="plantingspacing" class="form-control" value="<?php echo $plantspacing; ?>">
                                <span class="help-block"><?php echo $plantspacing_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($rowspacing_err)) ? 'has-error' : ''; ?>">
                                <label>Row Spacing</label>
                                <input type="text" name="rowspacing" class="form-control" value="<?php echo $rowspacing; ?>">
                                <span class="help-block"><?php echo $rowspacing_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($plantingdepth_err)) ? 'has-error' : ''; ?>">
                                <label>Planting Depth</label>
                                <input type="text" name="plantingdepth" class="form-control" value="<?php echo $plantingdepth; ?>">
                                <span class="help-block"><?php echo $plantingdepth_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($plantdate_err)) ? 'has-error' : ''; ?>">
                                <label>Plant Date</label>
                                <input type="date" name="plantdate" class="form-control" value="<?php echo $plantdate; ?>">
                                <span class="help-block"><?php echo $plantdate_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($harvestdate_err)) ? 'has-error' : ''; ?>">
                                <label>Harvest Date</label>
                                <input type="date" name="harvestdate" class="form-control" value="<?php echo $harvestdate; ?>">
                                <span class="help-block"><?php echo $harvestdate_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($harvestunit_err)) ? 'has-error' : ''; ?>">
                                <label>Harvest Unit</label>
                                <input type="text" name="harvestunit" class="form-control" value="<?php echo $harvestunit; ?>">
                                <span class="help-block"><?php echo $harvestunit_err; ?></span>
                            </div>
                            
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="crops.php" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php

