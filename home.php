<?php
  session_start();
  if (!isset($_SESSION["username"])) {
    header("location:login.html");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <script src="main.js"></script>
   <link rel="stylesheet" href="home.css">
   <title>Opinion</title>
</head>
<body>
   <div class="user">
     <?php
     echo $_SESSION["username"];
     ?>
     <br>
     <button onclick="newblog(this,'newone')" id="post" style="margin-right: 89%;"> + New Blog</button>
     <button id="logout" onclick="window.location='logout.php';" >Logout</button>
   </div>
   <div class="blog">
     <div class="newblog d-none" id="newblog">
        <form action="home.php" method="post">
        <input type="text" style="font-size: 30px;" placeholder="Enter Title" name="title"><br><br>
        <textarea cols="30" rows="10" name="blog"></textarea><br><br>
        <button id="blogpost" name="submit">Submit</button>
        <button class="del">Delete</button>
      </form>
      <?php
          $server = "localhost";
          $username = "root";

          $con = mysqli_connect($server, $username);

          if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $blog = $_POST['blog'];
            $email =  $_SESSION["user_email"];
            $sql = ("INSERT INTO `opinion`.`blog`(title,blog,email) VALUES ('$title','$blog','$email');");
            mysqli_query($con,$sql);
          }
        ?>

</div>
</div>
  <div class="savedblog">
      <?php
        $email =  $_SESSION["user_email"];
        $saved = ("SELECT * from  `opinion`.`blog` where email = '$email'");
        $res = mysqli_query($con,$saved);
        while($row = mysqli_fetch_array($res,MYSQLI_NUM)){
          echo '<div class="blogCard"><form action="delete.php" method="post">';
          echo "<h1>$row[0]</h1><br>";
          echo "<p>$row[1]</p><br>";
          echo "<input type='hidden' value='$row[2]' name='BLOG_ID'>";
          echo '<button class="postdel" type="submit">Delete</button><br>';
          echo "</form></div>";
         
        }
      ?>
  </div>  
</body>
</html>