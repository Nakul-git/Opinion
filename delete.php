<?php

$server = "localhost";
$username = "root";
$con = mysqli_connect($server, $username);
$blog_id = $_POST["BLOG_ID"];
$delete = ("DELETE FROM `opinion`.`blog` WHERE `blog_id` = '$blog_id'");
if(mysqli_query($con,$delete)){
    header("location:home.php");
}else{
    die(mysqli_error($con));
}
?>