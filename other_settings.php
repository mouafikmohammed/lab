<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

   # ------------- code for Table --------------------
   $res= mysqli_query($con,"select * from expired");
   $date="";

   if(isset($_POST['date'])){
      $date = $_POST['date'];
   }
   #--------add date---------------
   $sqls='';
   if(isset($_POST['add'])){
      $sqls = "INSERT INTO expired (expired) value('$date')";
      mysqli_query($con,$sqls);
      header("location: other_settings.php");
   }
   #--------delete date---------------
   if(isset($_POST['del'])){
      $sqls= "DELETE from expired where expired='$date'";
      mysqli_query($con,$sqls);
      header("location: other_settings.php");
   }
   #--------update date---------------
   if(isset($_POST['update'])){
      $sqls= "UPDATE expired SET expired=$date WHERE 1";
      mysqli_query($con,$sqls);
      header("location: other_settings.php");
   }

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Business Management</title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/settings.css">
   <link rel="icon" type="image/x-icon" href="img/logo.png" />
</head>

<body>
   <div id="background">
      <img src="img/backgroud.jpg" class="stretch" alt="" />
   </div>
   <div class="wrapper">
      <div class="sidebar">
         <!-- <a href="#"><img class="logo" src="img/logo.png"></a> -->
         <ul>
            <li><a  href="index.php"><img class="fas"src="icons/back.svg">Go Back</a></li>
            <li><a  href="settings.php"><b>></b> Connect Gmail</a></li>
            <li  class="active"><a href="other_settings.php"><b>></b> Others</a></li>
         </ul> 
      </div>
      <div class="main_content">
         <div class="header">settings</div>
         <!--add email and password-->
         <form method='post'>
            <aside>
               <div id="buy">
                  <h3>Expired time</h3>
                  <br>
                  <label>Enter number (Days) : </label><br>
                  <input type="number" min="1" name="date" required>
                  <?php
                     $row = mysqli_fetch_array($res);
                     $a= mysqli_num_rows($res);
                     if($a == 0){
                        echo '
                           <div class="expired-not">
                              Please add how many days.
                           </div>';
                     }else{
                        echo '
                           <div class="expired-p">
                              The products will expired in :<br> '.$row['expired'].' Days
                           </div>';
                     }
                  ?>
                  <?php

                  if($a == 0){
                     echo '<button name="add">ADD</button>';
                     echo ' ';
                     echo '<button name="del">Delete</button>';
                  }else{
                     echo '<button name="update">Update</button>';
                     echo ' ';
                     echo '<button name="del">Delete</button>';
                  }
                  ?>
               </div>
            </aside>
         </form>
         <!-------------------------------------------->
      </div>
   </div>
</body>
</html>