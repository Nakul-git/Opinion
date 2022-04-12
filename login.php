<?php
session_start();
$server = "localhost";
$username = "root";

$con = mysqli_connect($server, $username);

$email = $_POST['email'];
$pass = $_POST['pass'];

$sql =("SELECT * FROM `opinion`.`users` WHERE email = '$email' AND `password` = '$pass';");
$op=mysqli_query($con,$sql);
$nfr = mysqli_num_rows($op);
if($op){
    if($nfr){
        $row = mysqli_fetch_array($op,MYSQLI_ASSOC);
        $_SESSION["username"] =  $row["first_name"];
        $_SESSION["user_email"] =  $row["email"];
    header("location:home.php");
    }
else{
    
}
}
?>