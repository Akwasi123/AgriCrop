<?php
session_start();
$Name="";
$Email="";
$errors=array();

include 'dbconnection.php';

if(isset($_POST['Submit'])){
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    if (empty($email)) {
        array_push($errors, "Fill email");
    }
    if (empty($password_1)) {
        array_push($errors, "Fill password");
    }
    if ($password_1 != $password_2) {
        array_push($errors,"Password do not match"); 
    }
    else {
        $password=md5($password_1);
        $sql="INSERT INTO user (email,Password) VALUES ('$email','$password')";

        mysqli_query($link,$sql);
        header('location:login.php');
        
        
    }
}

if(isset($_POST['Login'])){
    $email = $_POST['email'];
    $password = $_POST['Password'];

    if (empty($email)) {
        array_push($errors, "<span style='color: red;'>" .'Username Required'. "</span>");
    }
    if (empty($password)) {
        array_push($errors, "<span style='color: red;'>" .'Password Required'. "</span>");
    }
    
    if (count($errors)==0) { 
        $password=md5($password);
        $query="SELECT * FROM user WHERE email='$email' AND Password='$password'";
        
        $results1= mysqli_query($link,$query);

        
        if ($row=mysqli_fetch_array($results1)) {
            $_SESSION['email'] = $email;
            header('location:homepage.html');
        }
        else{
            array_push($errors,"<span style='color: red;'>" .'Wrong username or password'. "</span>");
            // header('location: index.php');
        }
    
    }
}
?>

