<?php
require_once "../dbCredentials.php";
$database = mysqli_connect(SERVER, USERNAME, PASSWD, DATABASE)  or die(mysqli_error($database));

// Define variables and initialize with empty values
$name = $animaltype = $sex = $breed = $desc = $tagnumber = $weight = $feedtype = $price = "";
$name_err = $animaltype_err = $sex_err = $breed_err = $desc_err = $tag_err = $weight_err = $feed_err = $price_err = "";

// Processing form data when form is submitted

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    $input_name = trim($_POST["name"]);
    $input_animaltype = trim($_POST["animaltype"]);
    $input_sex = trim($_POST["sex"]);
    $input_breed = trim($_POST["breed"]);
    $input_desc = trim($_POST["description"]);
    $input_tag = trim($_POST["tagnum"]);
    $input_weight = trim($_POST["weight"]);
    $input_feedtype = trim($_POST["feedtype"]);
    $input_price = trim($_POST["price"]);
    
    $name = $input_name;
    $animaltype = $input_animaltype;
    $sex = $input_sex;
    $breed = $input_breed;
    $desc = $input_desc;
    $tagnumber = $input_tag;
    $weight = $input_weight;
    $feedtype = $input_feedtype;
    $price = $input_price;
    
    // Prepare an update statement
    $sql = "UPDATE livestock SET name=?, animaltype=?, sex=?, breed=?, description=?, tagnumber=?, weight=?, feedtype=?, price=?  WHERE id=?";
        
    if($stmt = mysqli_prepare($database, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssssssssi", $param_name, $param_animaltype, $param_sex, $param_breed, $param_desc, $param_tagnum, $param_weight, $param_feedtype, $param_price, $param_id);
        
        // Set parameters
        $param_name = $name;
        $param_animaltype = $animaltype;
        $param_breed = $breed;
        $param_sex = $sex;
        $param_desc = $desc;
        $param_tagnum = $tagnumber;
        $param_weight = $weight;
        $param_feedtype = $feedtype;
        $param_price = $price;
        $param_id = $id;
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records updated successfully. Redirect to landing page
            header("location: livestock.php");
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
        $sql = "SELECT * FROM livestock WHERE id = ?";
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
                    $animaltype = $row["animaltype"];
                    $sex = $row["sex"];
                    $breed = $row["breed"];
                    $description = $row["description"];
                    $tagnumber = $row["tagnumber"];
                    $weight = $row["weight"];
                    $feedtype = $row["feedtype"];
                    $price = $row["price"];
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
                            <h2>Update Livestock</h2>
                        </div>
                        <p>Please edit the input values and submit to update the menu.</p>
                        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
        
                            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                                <span class="help-block"><?php echo $name_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($animaltype_err)) ? 'has-error' : ''; ?>">
                                <label>Animal type</label>
                                <input type="text" name="animaltype" class="form-control" value="<?php echo $animaltype; ?>">
                                <span class="help-block"><?php echo $animaltype_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($sex_err)) ? 'has-error' : ''; ?>">
                                <label>Sex</label>
                                <input type="text" name="sex" class="form-control" value="<?php echo $sex; ?>">
                                <span class="help-block"><?php echo $sex_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($breed_err)) ? 'has-error' : ''; ?>">
                                <label>Breed</label>
                                <input type="text" name="breed" class="form-control" value="<?php echo $breed; ?>">
                                <span class="help-block"><?php echo $breed_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($desc_err)) ? 'has-error' : ''; ?>">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" value="<?php echo $description; ?>">
                                <span class="help-block"><?php echo $desc_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($tag_err)) ? 'has-error' : ''; ?>">
                                <label>Tag Number</label>
                                <input type="text" name="tagnum" class="form-control" value="<?php echo $tagnumber; ?>">
                                <span class="help-block"><?php echo $tag_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($weight_err)) ? 'has-error' : ''; ?>">
                                <label>Weight</label>
                                <input type="text" name="weight" class="form-control" value="<?php echo $weight; ?>">
                                <span class="help-block"><?php echo $weight_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($feed_err)) ? 'has-error' : ''; ?>">
                                <label>Feed Type</label>
                                <input type="text" name="feedtype" class="form-control" value="<?php echo $feedtype; ?>">
                                <span class="help-block"><?php echo $feed_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
                                <span class="help-block"><?php echo $price_err; ?></span>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="livestock.php" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php

