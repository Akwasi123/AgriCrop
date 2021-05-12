<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Task</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Add New Product</h2>
                    <p>Please fill this form and submit to add a new product to the database.</p>
                    <form action="addNewProduct.php" method="POST">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="pname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control ">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" name="status" class="form-control ">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                            
                        </div>
                        <input name="submit" type="submit" class="btn btn-primary" value="Submit">
                        <a href="store.php" class="btn btn-secondary ml-2">Cancel</a>
                        
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>