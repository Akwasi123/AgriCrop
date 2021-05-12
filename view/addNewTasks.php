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
                    <h2 class="mt-5">Add New Task</h2>
                    <p>Please fill this form and submit to add a new task record to the database.</p>
                    <form action="addNewTask.php" method="POST">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Due Date</label>
                            <input type="date" name="date" class="form-control ">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control ">
                        </div>
                        <div class="form-group">
                            <label>Associated To</label>
                            <input type="text" name="assignee" class="form-control">
                            
                        </div>
                        <input name="submit" type="submit" class="btn btn-primary" value="Submit">
                        <a href="task.php" class="btn btn-secondary ml-2">Cancel</a>
                        
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>