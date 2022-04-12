<?php
session_start();
$server = "localhost";
$username = "root";

$con = mysqli_connect($server, $username);

$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['pass'];

$sql = ("INSERT INTO `opinion`.`users` VALUES ('$firstname','$lastname', '$email', '$password');");


if(mysqli_query($con,$sql)){
    header("Location:login.html");
}else{
    header("location:signup.html");
}
?>